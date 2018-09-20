<?php


class Artikel_m extends CI_Model
{
	
	public function get_cat_with_list()
	{
		$this->db->simple_query('SET SESSION group_concat_max_len=15000');
		$sql_cat_with_list = " SELECT
							UPPER(bc.category_name) category_name,
							bc.category_id,
							CONCAT('[',GROUP_CONCAT(
							'{',
							'\"judul\":\"',ba.article_title,'\",',
							'\"slug\":\"',ba.article_url,'\",',
							'\"date\":\"',ba.date,'\",',
							'\"alt_image\":\"',ba.alt_image,'\"',

							'}'
							),']') article_items

							FROM blog_category bc

							LEFT JOIN (
								SELECT DISTINCT bca.category_id,bca.article_id,
									@rn := if(@category_id = category_id, @rn+1, if(@category_id := category_id, 1, 1)) seqnum
								FROM blog_category_article bca

								CROSS JOIN (SELECT @rn := 0, @category_id := NULL) x
								
								ORDER BY bca.category_id, bca.article_id DESC
								
								) bca ON bc.category_id = bca.category_id AND bca.seqnum <= 4

							LEFT JOIN blog_article ba ON ba.article_id = bca.article_id

							GROUP BY bc.category_id ORDER BY COUNT(ba.article_id) DESC";
		$rs_cwl = $this->db->query($sql_cat_with_list);
		$rs_cwl_count = $rs_cwl->num_rows();
		$rs_cwl_result = $rs_cwl->result();

		foreach ($rs_cwl_result as &$row) {
			$row->category_slug = slugify($row->category_name);
			$article_items = json_decode($row->article_items);
			$row->article_items=array();
			$i = 1;
			foreach ($article_items as $artikel) {
				$artikel->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $artikel->alt_image,'e'); 	

				$artikel->gambar = site_url('files/thumb/'.$artikel->gambar  . '/199/149');
				$artikel->tanggal  = tanggal_indo($artikel->date,1);

				if($i++ >= 5){
					break;
				}
				$row->article_items[]= $artikel;
			}
			 
		}
		return array('count'=>$rs_cwl_count,'rows'=>$rs_cwl_result);
	}
	
	public function get_most_sv($category_id='')
	{
		$condition = "";
		if (!empty($category_id)) {
			$condition=" WHERE bca.category_id = '${category_id}'";
		}
		$sql="SELECT
				ba.article_id,
				@ahash:=(MD5(CONCAT('konten/artikel/',ba.article_url))) ahash,
				ba.view,
				(SELECT @shcx:=(SUM(sh.cx)) FROM shares sh WHERE sh.hash = @ahash ) share_count 
				FROM
				blog_category_article bca
				INNER JOIN blog_article ba ON bca.article_id = ba.article_id ${condition} ORDER BY ba.view DESC";	
		
		$rs = $this->db->query($sql);

		$most_view_ids  = array();
		$most_share_ids = array();

		$i = 0;
		foreach ($rs->result() as $row) {
			if((0+$row->share_count) > 0 ){
				$most_share_ids[] = sprintf("%08d_%d",$row->share_count,$row->article_id); 
			} 
			if($i <= 5){
				$most_view_ids[]=sprintf("%d_%d",$row->view,$row->article_id);
			}
			$i++;
		}
		rsort($most_share_ids);
		return array(
			'v' => $most_view_ids,
			's' => $most_share_ids 
		);
	}

	public function get_by_ids($ids)
	{
		foreach ($ids as $article_id) {
			$this->db->where("publish",1)->where('article_id',$article_id);
		}

		return $this->db->get('blog_article')->result();
	}
	public function get_by_id($article_id)
	{
		$artikel =  $this->db->select("ba.article_title judul,
								  ba.article_url slug,
								  ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  UPPER(bc.category_name) kategori,
								  bc.category_id")
								 ->where("ba.article_id",$article_id)
								 ->where("ba.publish",1)
								 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
								 ->join("blog_article ba","ba.article_id=bca.article_id")
								 ->join("blog_category bc","bc.category_id=bca.category_id")
								 ->limit(1)
								 ->get('blog_category_article bca')
								 ->row();

		return $artikel;
	}
	public function get_by_slug($slug)
	{
		$this->db->where('ba.article_url',$slug);
		$artikel = $this->db->select("ba.article_title judul,
								  ba.article_url slug,ba.article_id,
								  ba.allow_comment,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.publish_date,
								  ba.content konten,
								  UPPER(bc.category_name) kategori,
								  bc.category_id")
								 ->where("ba.publish",1)
								 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
								 ->join("blog_article ba","ba.article_id=bca.article_id")
								 ->join("blog_category bc","bc.category_id=bca.category_id")
								 ->limit(1)
								 ->get('blog_category_article bca')->row();

								 
		if(empty($artikel)){
			return array();
		}						 
		$artikel->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $artikel->alt_image,'e'); 	

		$artikel->gambar = site_url('files/thumb/'.$artikel->gambar  . '/1024/683');
		$artikel->tanggal  = tanggal_indo($artikel->date,1);
		$artikel->kategori_slug = slugify($artikel->kategori);
		

		// update view
		$preview_mode = $this->input->get('preview');
		if(empty($preview_mode)){
			$this->db->where('article_url',$slug)->update('blog_article',array('view'=>($artikel->view+1)));
		}
		return $artikel;
	}
	public function get_prev_next_by_artikel($artikel)
	{

		if(empty($artikel)){
			return array();
		}
		$artikel_id = $artikel->article_id;
		$kategori_id = $artikel->category_id;
		$date = $artikel->date;

		$prev_artikel = $this->db->select("ba.article_title judul,
								  ba.article_url slug,ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id")
								 ->where('bca.category_id',$kategori_id)
								 ->where("ba.article_id != ",$artikel_id)
								 ->where("ba.article_id <= ",$date)
								 ->where("ba.publish",1)
								 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
								 ->join("blog_article ba","ba.article_id=bca.article_id")
								 ->join("blog_category bc","bc.category_id=bca.category_id")
								 ->limit(1)
								 ->get('blog_category_article bca')
								 ->row();
		if(!empty($prev_artikel)){
			$this->db->where("ba.article_id != ",$prev_artikel->article_id);
		}
		$next_artikel = $this->db->select("ba.article_title judul,
								  ba.article_url slug,ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id")
								 ->where('bca.category_id',$kategori_id)
								 ->where("ba.article_id != ",$artikel_id)
								 ->where("ba.date >= ",$date)
								 ->where("ba.publish",1)
								 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
								 ->join("blog_article ba","ba.article_id=bca.article_id")
								 ->join("blog_category bc","bc.category_id=bca.category_id")
								 ->limit(1)
								 ->get('blog_category_article bca')
								 ->row();

		return array(
			'p' => $prev_artikel,
			'n' => $next_artikel
		);
	}
	
	public function get_related_by_artikel($artikel,$exclude_ids,$limit=4)
	{
		if(empty($artikel)){
			return array();
		}
		$artikel_id = $artikel->article_id;
		$kategori_id = $artikel->category_id;
		$date = $artikel->date;
		foreach ($exclude_ids as $article_id) {
			$this->db->where('ba.article_id != ',$article_id);
		}
		$related = $this->db->select("ba.article_title judul,
								  ba.article_url slug,
								  ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id")
						 ->where("ba.article_id != ",$artikel_id)
						 ->where('bca.category_id',$kategori_id)
						 ->where("ba.publish",1)
						 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
						 ->join("blog_article ba","ba.article_id=bca.article_id")
						 ->join("blog_category bc","bc.category_id=bca.category_id")
						 ->limit($limit)
						 ->order_by("ba.date","desc")
						 ->get('blog_category_article bca')
						 ->result();

		foreach ($related as &$artikel) {
			$artikel->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $artikel->alt_image,'e'); 	

			$artikel->gambar = site_url('files/thumb/'.$artikel->gambar  . '/199/149');
			$artikel->tanggal  = tanggal_indo($artikel->date,1);
			$artikel->kategori_slug = slugify($artikel->kategori);
			

		}
		return $related;
	}
	public function get_careausel_by_category($category_id)
	{
		$sql_popular_kategori_artikel = "SELECT 
										ba.article_title judul,
								  ba.article_url slug,
								  ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id
 FROM blog_article ba
										
										join  blog_category_article bca on bca.article_id = ba.article_id 
										join blog_category bc on bca.category_id = bc.category_id 
										
										WHERE bc.category_id = '$category_id' and ba.publish=1 and ba.publish_date <='".date("Y-m-d H:i:s")."'

										order by ba.date desc

										LIMIT 5";
		$rs_pka = $this->db->query($sql_popular_kategori_artikel);
		$rs_pka_count  = $rs_pka->num_rows();
		$rs_pka_result = $rs_pka->result();
		// get share count

		foreach ($rs_pka_result as &$a) {
			$a->link = site_url('konten/artikel/'.$a->slug);
			$a->hash = md5($a->link);
			$a->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $a->alt_image,'e'); 	

			$a->gambar = site_url('files/thumb/'.$a->gambar  . '/1024/683');
			$a->tanggal  = tanggal_indo($a->date,1);
			$a->kategori_slug = slugify($a->kategori);
		}

		return array(
			'count'=>$rs_pka_count,
			'rows' => $rs_pka_result
		);
	}
	public function get_category($category_id)
	{
		return $this->db->select("UPPER(category_name) name,category_name,category_id" )->where('category_id',$category_id)->get('blog_category')->row();
	}
	public function get_caraousel()
	{
		$sql_popular_kategori_artikel = "SELECT 
										ba.article_title judul,
								  ba.article_url slug,
								  ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id

										FROM blog_category_article bca

										join blog_category bc on bca.category_id = bc.category_id 
										join blog_article ba on bca.article_id = ba.article_id 

										group by bc.category_id 

										order by ba.date desc

										LIMIT 5";
		$rs_pka = $this->db->query($sql_popular_kategori_artikel);
		$rs_pka_count  = $rs_pka->num_rows();
		$rs_pka_result = $rs_pka->result();
		// get share count

		foreach ($rs_pka_result as &$a) {
			$a->link = site_url('konten/artikel/'.$a->slug);
			$a->hash = md5($a->link);
			$a->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $a->alt_image,'e'); 	

			$a->gambar = site_url('files/thumb/'.$a->gambar  . '/1024/683');
			$a->tanggal  = tanggal_indo($a->date,1);
			$a->kategori_slug = slugify($a->kategori);
			$this->db->or_where('hash',$a->hash);
		}

		$rs_share = $this->db->select("hash,SUM(cx) share_count")->from('shares')->group_by('hash')->get()->result();

		//print_r($rs_share);

		$rs_share_data = array();

		foreach ($rs_share as $sh) {
			$rs_share_data[$sh->hash] = $sh->share_count;
		}

		foreach ($rs_pka_result as &$a) { 
			$a->share_count = 0 
			+ $rs_share_data[$a->hash]; 
		}

		return array(
			'count'=>$rs_pka_count,
			'rows' => $rs_pka_result
		);

	}

	public function get_recent_comments()
	{
		$rc = $this->db->select('bc.*,ba.article_title,ba.article_url article_slug')
					   ->from('blog_comment bc')
					   ->where('bc.publish','1')
					   ->join('blog_article ba','ba.article_id=bc.article_id')
					   ->limit(5)
					   ->get()->result();
		foreach ($rc as &$c) {
			$c->date_ta = time_ago(strtotime($c->date));
		}
		return $rc;
	}

	public function get_by_category($category_id,$page=1,$limit=10)
	{
		
		$articles = $this->db->select("ba.article_title judul,
								  ba.article_url slug,
								  ba.article_id,
								  ba.date,
								  ba.file,
								  ba.view,
								  ba.alt_image,
								  ba.content konten,
								  bc.category_name kategori,
								  bc.category_id")
						 ->where('bca.category_id',$category_id)
						 ->where("ba.publish",1)
						 ->where("ba.publish_date <= '".date("Y-m-d H:i:s")."'")
						 ->join("blog_article ba","ba.article_id=bca.article_id")
						 ->join("blog_category bc","bc.category_id=bca.category_id")
						 ->limit($limit,($page-1)*$limit)
						 ->order_by("ba.date","desc")
						 ->get('blog_category_article bca')
						 ->result();

		foreach ($articles as &$artikel) {
			$artikel->gambar = my_simple_crypt('public/assets/uploads/files/article_images/' . $artikel->alt_image,'e'); 	

			$artikel->gambar = site_url('files/thumb/'.$artikel->gambar  . '/199/149');
			$artikel->tanggal  = tanggal_indo($artikel->date,1);
			$artikel->kategori_slug = slugify($artikel->kategori);
			$artikel->preview = html2text(substr($artikel->konten, 0,200));

		}
		return $articles;
	}
	public function get_category_articles($exclude_id='')
	{
		if(!empty($exclude_id)){
			$this->db->where('category_id !=',$exclude_id);
		}
		$categories = $this->db->select("UPPER(category_name) category_name, category_id")->get('blog_category')->result();
		return $categories;
	}
}