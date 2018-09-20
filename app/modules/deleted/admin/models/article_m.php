<?php

/**
* 
*/
class Article_m extends CMS_Model
{
	
	function get_list($limit,$offset)
	{
		$order_by = array(
			'judul' => 'ba.article_title',
			'category' => 'bc.category_name',
			'view' => 'ba.view'
		);

		$ob 	= $this->input->get('ob');
		$odesc 	= $this->input->get('odesc');

		$category_id = $this->input->get('category');
		$keywords = $this->input->get('keywords');
		// $category_id += 0;

		if(!empty($category_id)){
			$this->db->where('bc.category_id',$category_id);
		}
		if(!empty($keywords)){
			$this->db->like('ba.article_title',$keywords);
		}
		if(!empty($order_by[$ob])){
			$this->db->order_by($order_by[$ob],$odesc=='asc'?'asc':'desc');
		}

		$records = $this->db->select('ba.*,bc.category_name category,bc.category_id,COUNT(bco.comment_id) comment_count')
							->from('blog_article ba')
							->join('blog_category_article bca','bca.article_id=ba.article_id')
							->join('blog_category bc','bc.category_id=bca.category_id')
							->join('blog_comment bco','ba.article_id=bco.article_id','left')
							->group_by('ba.article_id')
							->limit($limit)
							->offset($offset)
							->get()
							->result_array();
		return $records;
	}

	public function get_count($where = array())
	{
		if(!empty($where)){
			$this->db->where($where);
		}
		$category_id = $this->input->get('category');
		$keywords 	 = $this->input->get('keywords');
		// $category_id += 0;

		if(!empty($category_id)){
			$this->db->where('bc.category_id',$category_id);
		}
		if(!empty($keywords)){
			$this->db->like('ba.article_title',$keywords);
		}
		return $this->db->select('COUNT(ba.article_id) as cx')
						->from('blog_article ba')
						->join('blog_category_article bca','bca.article_id=ba.article_id')
						->join('blog_category bc','bc.category_id=bca.category_id')
						->get()
						->row()
						->cx;
	}

	public function get_row($pk)
	{
		$record = $this->db->select('ba.*,bc.category_name category,bc.category_id')
							->from('blog_article ba')
							->join('blog_category_article bca','bca.article_id=ba.article_id')
							->join('blog_category bc','bc.category_id=bca.category_id')
							->where('ba.article_id',$pk)
							// ->offset($offset)
							->get()
							->row_array();
		return $record;
	}

	public function get_blog_categories($selected)
	{
		$rs = $this->db->select("bc.*,COUNT(bca.article_id) cx")
					   ->from('blog_category bc')
					   ->join('blog_category_article bca','bca.category_id = bc.category_id','left')
					   ->group_by('bc.category_id')
					   ->order_by('bc.category_name','asc')
					   ->get()
					   ->result_array();
		$blog_categories = array();
		foreach ($rs as $cat) {
			$blog_categories[$cat['category_id']] = $cat['category_name'] . " (<span class='catid cat-".$cat['category_id']."'".">".$cat['cx']."</span>)";
		}
		return $blog_categories;
	}

	public function delete($id)
	{
		return $this->db->where('article_id',$id)->delete('blog_article');
	}

	public function add_category()
	{
		$result = array(
			'status' => false,
			'msg' => 'Terjadi kesalahan',
			'data' => array()
		);
		$category_name = $this->input->post('category_name');
		if(!empty($category_name)){

			if($this->db->where('category_name',$category_name)->get('blog_category')->num_rows() > 0 ){
				$result['msg'] = "Nama kategori sudah ada silahkan ganti yang lainya !";
				return $result;
			}

			$category = array(
				'category_name' => $category_name,
				'description' => $category_name	
			);

			$this->db->insert('blog_category',$category);
			$category['category_id'] = $this->db->insert_id();

			return array('status'=>true,'data' => $category);
		}
		return $result;
	}

	public function set_category()
	{
		$result = array(
			'status' => false,
			'msg' => 'Terjadi kesalahan',
			'data' => array()
		);

		$article_id = $this->input->post('article_id');
		$category_id = $this->input->post('category_id');

		if(is_numeric($article_id) && is_numeric($category_id)){
			if($this->db->where('article_id',$article_id)->where('category_id',$category_id)->get('blog_category_article')->num_rows() > 0){
				$result['msg'] = "Nama kategori sudah dikaitkan sebelumnya !";
				return $result;
			}else{
				$data = array(
					'category_id' => $category_id,
					'article_id' => $article_id
				);
				$this->db->insert('blog_category_article',$data);
				$data['category_article_id'] = $this->db->insert_id();

				return array('status'=>true,'data' => $data);
			}
		}
	}
	
	public function insert($data){
		$data["author_user_id"] = $this->cms_user_id();
		$data["date"] 			= date("Y-m-d H:i:s");
		$data["publish"] 		= 0;
		if($this->db->insert('blog_article',$data)){
			$_POST['article_id'] = $this->db->insert_id();
			$category = $this->set_category();
			if(isset($category["status"])){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function update($data){
		$data["author_user_id"] = $this->cms_user_id();
		$data["date"] 			= date("Y-m-d H:i:s");
		$data["publish"] 		= 0;
		$id = $_POST["article_id"];
		unset($data["article_id"]);
		if($this->db->update('blog_article',$data, array("article_id"=>$id))){
			$this->db->delete('blog_category_article',array("article_id"=>$id));
			$_POST['article_id'] = $id;
			$category = $this->set_category();
		if(isset($category["status"])){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function publish($id,$publish)
	{
		return $this->db->update('blog_article',$publish, array("article_id"=>$id));
	}
}