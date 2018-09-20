<?php

class Bkpp_m extends CI_Model{
	public function get_layanan_by_slug($slug)
	{
		return $this->db->where('slug',$slug)->get('bkpp_layanan')->row();
	}

	public function get_profile_by_slug($slug)
	{
		$data = $this->db->where('slug',$slug)->get('bkpp_profile')->row();

		$path_gambar = 'public/assets/uploads/files/profile_images/' . $data->gambar;

		$data->gambar = site_url('files/thumb/'.my_simple_crypt($path_gambar).'/1024/648/fill');
		
		if(empty($data->keterangan_gambar)){
			$data->keterangan_gambar = $data->judul;
		}

		return $data;
	}
	public function get_related_profile_konten($profile,$rebase=false)
	{
		if(!$rebase){
			$this->db->where('date >=',$profile->date);
		}
		$data = $this->db->order_by('date','desc')->select('slug,judul,keterangan_gambar,gambar')->limit(4)->where('slug  !=',$profile->slug)->get('bkpp_profile')->result();

		foreach ($data as &$item) {
			$path_gambar = 'public/assets/uploads/files/profile_images/' . $item->gambar;

			$item->gambar = site_url('files/thumb/'.my_simple_crypt($path_gambar).'/1024/648/fill');
			
			if(empty($item->keterangan_gambar)){
				$item->keterangan_gambar = $item->judul;
			}
		}
		if(empty($data)){
			$data = $this->get_related_profile_konten($profile,1);
		}
		// print_r($data);
		return $data;
	}

	public function get_info_dinas_by_slug($slug)
	{
		$data =  $this->db->where('slug',$slug)->get('bkpp_info_dinas')->row_array();

		$path = my_simple_crypt('public/assets/uploads/files/info_dinas/'.$data['gambar'],'e');		
		$data['gambar'] = site_url('files/thumb/'.$path.'/1024/684/fill');

		return $data;
	}

	public function get_related_info_dinas($slug)
	{
		$data =  $this->db->order_by('date','desc')->where('slug !=',$slug)->get('bkpp_info_dinas')->result();
		foreach ($data as &$i) {
			$path = my_simple_crypt('public/assets/uploads/files/info_dinas/'.$i->gambar,'e');		
			$i->gambar = site_url('files/thumb/'.$path.'/199/144');
		}
		

		return $data;
	}

	public function get_info_dinas_menu_list($limit=3)
	{
		$data = $this->db->limit($limit)->order_by('date','desc')->get('bkpp_info_dinas')->result_array();

		return $data;
	}
	public function fetch_article_detail($slug)
	{
		$data = $this->db->select("UPPER(blog_category.category_name) category,
			blog_article.article_url,
			blog_article.alt_image,
			blog_article.content,
			blog_article.view,
			blog_article.date,
			blog_article.file,
			blog_article.article_title title,
			blog_category_article.category_id,
			blog_category_article.article_id,
			blog_article.alt_image image,
			blog_article.description")
			->where('blog_article.publish','1')
			->where('article_url',$slug)
			->from("blog_article")
			->join("blog_category_article","blog_category_article.article_id = blog_article.article_id")
			->join("blog_category","blog_category_article.category_id = blog_category.category_id")
			->get()
			->row_array();
		
		$data['image'] = my_simple_crypt('public/assets/uploads/files/article_images/' . $data['image'],'e'); 	

		$data['image'] = site_url('files/thumb/'.$data['image'] . '/1024/683/fill');
		$data['date_id'] = tanggal_indo($data['date'],1);

		$doc = new DOMDocument();
		@$doc->loadHTML($data['content']);
		$data['content'] = $doc->saveHTML();

		// update view
		$preview_mode = $this->input->get('preview');
		if(empty($preview_mode)){
			$this->db->where('article_url',$slug)->update('blog_article',array('view'=>($data['view']+1)));
		}
		
		return $data;	
	}
	public function get_gi($slug)
	{
		$data = $this->db->select("bkpp_galery_images.*,bkpp_galery_image_items.file,bkpp_galery_image_items.judul judul_gambar,bkpp_galery_image_items.file gambar,bkpp_galery_image_items.keterangan keterangan_gambar")
				 ->join('bkpp_galery_image_items','bkpp_galery_images.id = bkpp_galery_image_items.galery_id','left')
				 ->from('bkpp_galery_images' )
				 ->where("bkpp_galery_images.slug",$slug)
				 ->order_by('bkpp_galery_image_items.tgl_dibuat','desc')
				 //->group_by('bkpp_galery_images.id')
				 ->get()
				 ->result_array();
		$loop = 0;		 
		foreach ($data as &$i) {


			$path = 'public/assets/uploads/files/galery_images/'.underscorize($slug).'/'.$i['file'];
		 	$i['link']  = site_url($path);
		 	$i['thumb'] = site_url('files/thumb/'.my_simple_crypt($path,'e').'/410/273/fit');
		 	if($loop == 0){
				$i['big_thumb'] = site_url('files/thumb/'.my_simple_crypt($path,'e').'/960/640/fit');
			}
		 	$loop++;
		}		 
		return $data;
	}
	public function get_related_gi($gi,$rebase=false)
	{
		// print_r($gi);
		if($rebase){
			$this->db->where("bkpp_galery_images.tgl_dibuat !=",$gi['tgl_dibuat']);
		}else{
			$this->db->where("bkpp_galery_images.tgl_dibuat >=",$gi['tgl_dibuat']);
		}
		$data = $this->db->select("bkpp_galery_images.*,bkpp_galery_image_items.file,bkpp_galery_image_items.judul judul_gambar,bkpp_galery_image_items.file gambar,bkpp_galery_image_items.keterangan keterangan_gambar")
				 ->join('bkpp_galery_image_items','bkpp_galery_images.id = bkpp_galery_image_items.galery_id','left')
				 ->from('bkpp_galery_images' )
				 ->where("bkpp_galery_images.slug !=",$gi['slug'])
				 
				 ->order_by('bkpp_galery_image_items.tgl_dibuat','desc')
				 ->group_by('bkpp_galery_images.slug')
				 ->limit(4)
				 ->get()
				 ->result();
		$loop = 0;		 
		foreach ($data as &$i) {
			// $slug = slugify($i->judul);

			$path = 'public/assets/uploads/files/galery_images/'.underscorize($i->slug).'/'.$i->file;
		 	$i->link  = site_url($path);
		 	$i->thumb = site_url('files/thumb/'.my_simple_crypt($path,'e').'/410/273/fit');
		 	if($loop == 0){
				$i->big_thumb = site_url('files/thumb/'.my_simple_crypt($path,'e').'/960/640/fit');
			}
		 	$loop++;
		}	

		// print_r($data);

		if(empty($data)){
			$data = $this->get_related_gi($gi,1);
		}	 
		return $data;
	}
	public function fetch_akg($slug)
	{
		$data =  $this->db->where('slug',$slug)->get('bkpp_agenda_kegiatan')->row_array();
		$path = my_simple_crypt('public/assets/uploads/files/agenda_kegiatan/'.$data['gambar'],'e');		
		$data['gambar'] = site_url('files/thumb/'.$path.'/1024/684/fill');

		$ts = strtotime($data['date']); 

		$data['tanggal_txt'] = tanggal_indo($data['date'],1);
		$data['waktu'] = date("H.i",$ts);

		return $data;
	}
	public function get_agenda_kegiatan_menu_list($limit=3)
	{
		$data = $this->db->limit($limit)->order_by('date','desc')->get('bkpp_agenda_kegiatan')->result_array();

		return $data;
	}
	public function get_related_agenda_kegiatan($slug)
	{
		$data =  $this->db->order_by('date','desc')->where('slug !=',$slug)->get('bkpp_agenda_kegiatan')->result();
		foreach ($data as &$i) {
			$path = my_simple_crypt('public/assets/uploads/files/agenda_kegiatan/'.$i->gambar,'e');		
			$i->gambar = site_url('files/thumb/'.$path.'/199/144');
		}
		
		// print_r($data);
		return $data;
	}
	public function get_galeri_menu_list($limit=3)
	{
		$data = $this->db->select("bkpp_galery_images.*,bkpp_galery_image_items.judul judul_gambar,bkpp_galery_image_items.file gambar")
				 ->join('bkpp_galery_image_items','bkpp_galery_images.id = bkpp_galery_image_items.galery_id','left')
				 ->from('bkpp_galery_images' )
				 ->limit($limit)
				 ->order_by('bkpp_galery_image_items.tgl_dibuat','desc')
				 ->group_by('bkpp_galery_images.id')
				 ->get()
				 ->result_array();
				 // echo $this->db->last_query();
				 // die();
		return $data;
	}
	public function get_galeri_list($page=1,$limit=10)
	{
		$page = $page-1;
		$data = $this->db->select("DATE(bkpp_galery_images.tgl_dibuat) date,bkpp_galery_images.*,bkpp_galery_image_items.judul judul_gambar,bkpp_galery_image_items.file gambar")
				 ->join('bkpp_galery_image_items','bkpp_galery_images.id = bkpp_galery_image_items.galery_id','left')
				 ->from('bkpp_galery_images' )
				 ->limit($limit,$page * $limit)
				 ->order_by('bkpp_galery_image_items.tgl_dibuat','desc')
				 ->group_by('bkpp_galery_images.id')
				 ->get()
				 ->result_array();
				 
		return $data;
	}
	public function get_download_menu_list($limit=3)
	{
		$data = $this->db->limit($limit)->order_by('date','desc')->get('bkpp_download')->result_array();

		return $data;
	}
	public function get_article_menu_list($limit=3)
	{
		$data = $this->db->limit($limit)->order_by('date','desc')->get('blog_article')->result_array();

		return $data;
	}

	public function get_latest_posts($limit=15,$article_mode=false)
	{
		
		$latest = array('left'=>array(),'right'=>array());
		if(!$article_mode){
			$this->db->group_by('blog_category.category_id');
		}
		$data = $this->db->select("UPPER(blog_category.category_name) category,
			blog_article.article_url,
			blog_article.content,
			blog_article.article_title title,
			blog_category_article.category_id,
			blog_category_article.article_id,
			blog_article.alt_image image,
			blog_article.description")
			->where('blog_article.publish','1')
			->where("blog_article.publish_date <=curdate()")
			->from("blog_category_article")
			->join("blog_category","blog_category_article.category_id = blog_category.category_id")
			->join("blog_article","blog_category_article.article_id = blog_article.article_id")
			
			->order_by('blog_article.date','desc')
			->order_by('blog_category.category_name','asc')
			->limit($limit)
			->get()
			->result_array();

		$i = 0;	
		if( !$article_mode ){
			foreach ($data as &$e ){
				$resize = "355/355";
				if($i>4){
					$resize="170/170";
				}
				$path = 'public/assets/uploads/files/article_images/' . (empty($e['image'])?'':$e['image']);

				$e['imagurl'] =  site_url('files/thumb/' . my_simple_crypt($path,'e').'/' .$resize . '/fit');
				$e['link'] = site_url('konten/artikel/'.$e['article_url']);
				$e['title'] = ucwords(strtolower(substr($e['title'], 0,68)));
				$e['category_link'] = site_url('konten/artikel/kategori/'.$e['category_id'].'/'.slugify($e['category']));

				if($i> 4){
					$latest['left'][]=$e;
				}else{
					
					$latest['right'][] = $e;
				}
				$i++;
			}
		}else{
			$i = 1;
			$latest['top'] = array();

			foreach ($data as &$e ){
				if($i <= 5){
					$resize = "730/487";
				}else{
					$resize="170/170";
				}
				$path = 'public/assets/uploads/files/article_images/' . (empty($e['image'])?'':$e['image']);

				$e['imagurl'] =  site_url('files/thumb/' . my_simple_crypt($path,'e').'/' .$resize . '');
				$e['link'] = site_url('konten/artikel/'.$e['article_url']);
				$e['title'] = ucwords(strtolower(substr($e['title'], 0,68)));
				$e['preview'] = html2text(substr($e['content'], 0,300));
			
				if($i <= 5){
					$latest['top'][]=$e;
				}else{
					$latest['left'][]=$e;
				
				}
				$i++;
			}
		}
		
		// print_r($latest);
		// die();

		return $latest;
	}

	public function get_popular_posts($limit=6)
	{
		
		// $latest = array('left'=>array(),'right'=>array());

		$data = $this->db->select("UPPER(blog_category.category_name) category,
			blog_article.article_url,
			blog_article.article_title title,
			blog_category_article.category_id,
			blog_category_article.article_id,
			blog_article.alt_image image,
			blog_article.description")
			->where('blog_article.publish','1')
			->where("blog_article.publish_date <=curdate()")
			->from("blog_category_article")
			->join("blog_category","blog_category_article.category_id = blog_category.category_id")
			->join("blog_article","blog_category_article.article_id = blog_article.article_id")
			->group_by('blog_category.category_id')
			->order_by('blog_article.view','desc')
			->limit($limit)
			->get()
			->result_array();

 
		foreach ($data as &$e ){
			$resize = "178/105"; 
			$path = 'public/assets/uploads/files/article_images/' . (empty($e['image'])?'':$e['image']);

			$e['imagurl'] =  site_url('files/thumb/' . my_simple_crypt($path,'e').'/' .$resize . '/fit');
			$e['link'] = site_url('konten/artikel/'.$e['article_url']);
			$e['title'] = ucwords(strtolower(substr($e['title'], 0,68)));

			 
		}

		return $data;
	}

	public function get_bt()
	{
		$bt = $this->db->where('publish','1')->order_by('tanggal','desc')->get('bkpp_buku_tamu')->result_array();

		foreach ($bt as &$b) {
			$b['tanggal_ta'] = time_ago(strtotime($b['tanggal']),$b['tanggal']);
			$b['tanggal_dijawab_ta'] = time_ago(strtotime($b['tanggal_dijawab']));
		}
		return $bt;
	}
	public function get_konsultasi()
	{
		$ks = $this->db->where('publish','1')->where('publish_date <=curdate()')->where("jawaban != ''")->order_by('tanggal','desc')->get('bkpp_konsultasi')->result_array();
		foreach ($ks as &$b) {
			$b['tanggal_ta'] = time_ago(strtotime($b['tanggal']));
			$b['tanggal_dijawab_ta'] = time_ago(strtotime($b['tanggal_dijawab']));
		}
		return $ks;
	}

	public function get_search()
	{
		
		// $this->output->enable_profiler(true);
		$this->benchmark->mark('search_start');

		$q = $this->input->get('q');
		if(empty($q)){
			$q = $this->input->post('q');
		}
		if(empty($q)  ){
			return array(
				'info' => array(
					'waktu'  => 0,
					'jumlah' => 0,
					'query' => "",
					'show' => false
					
				),
				'data' => array()
			);
		}
		// SEARCH
		// 1. bkpp_profile
		$maxstr = 300;
		$s = (object)array(
			'pr' => "slug,judul,SUBSTRING(konten, 1, $maxstr) konten",
			'id' => "slug,judul,SUBSTRING(isi, 1, $maxstr) isi,file",
			'ga' => "slug,judul,SUBSTRING(keterangan, 1, $maxstr) keterangan",
			'ar' => "article_url,article_title,SUBSTRING(content, 1, $maxstr) content",
			'ly' => "slug,judul,SUBSTRING(konten, 1, $maxstr) konten",
			'dl' => "id,judul,SUBSTRING(keterangan, 1, $maxstr) keterangan,file",
			'ag' => "slug,judul,tempat,SUBSTRING(keterangan, 1, $maxstr) keterangan",
			'ko' => "id id,pengirim,SUBSTRING(pertanyaan, 1, $maxstr) pertanyaan,SUBSTRING(jawaban, 1, $maxstr) jawaban",
			'bt' => "id id,nama,SUBSTRING(isi, 1, $maxstr) isi,SUBSTRING(jawaban, 1, $maxstr) jawaban",
		);
		$search = array(
			'q' => $q,
			'results' => array(
				'total' => array(
					'all' => 0,
					'profile' => 0,
					'info_dinas' => 0,
					'galeri'=> 0,
					'artikel' => 0,
					'layanan' => 0,
					'download'=> 0,
					'agenda_kegiatan' =>0,
					'konsultasi' => 0,
					'buku_tamu' => 0,
				),
				'data' => array(
					'profile' => array(),
					'info_dinas' => array(),
					'galeri'=> array(),
					'artikel' => array(),
					'layanan' => array(),
					'download'=> array(),
					'agenda_kegiatan' => array(),
					'konsultasi' => array(),
					'buku_tamu' => array(),
				)
			) 
		);

		$db = $this->db->select($s->pr,false)->or_like('judul',$q)->or_like('konten',$q)->get('bkpp_profile');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['profile'] += $db->num_rows();
		$search['results']['data']['profile'] = html2textA($db->result_array(),array('konten'));

		// echo $this->db->last_query();

		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->ar,false)->where('publish','1')
											 ->where('publish_date <=curdate()')
											 ->group_start()
											 ->or_like('article_title',$q)->or_like('content',$q)->or_like('file',$q)
											 ->group_end()
											 ->get('blog_article');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['artikel'] += $db->num_rows();
		$search['results']['data']['artikel'] = html2textA($db->result_array(),array('content'));
		
		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->ly,false)->or_like('judul',$q)->or_like('konten',$q)->get('bkpp_layanan');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['layanan'] += $db->num_rows();
		$search['results']['data']['layanan'] = html2textA($db->result_array(),array('konten'));

		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->dl,false)->or_like('judul',$q)->or_like('keterangan',$q)->like('file',$q)->get('bkpp_download');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['download'] += $db->num_rows();
		$search['results']['data']['download'] = html2textA($db->result_array(),array('keterangan'));

		//------------------------------------------------------------------------------------/
		$db = $this->db->select($s->id,false)->or_like('judul',$q)->or_like('isi',$q)->or_like('file',$q)->get('bkpp_info_dinas');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['info_dinas'] += $db->num_rows();
		$search['results']['data']['info_dinas'] = html2textA($db->result_array(),array('isi'));
		//------------------------------------------------------------------------------------/
		$db = $this->db->select($s->ag,false)->or_like('judul',$q)->or_like('tempat',$q)->or_like('keterangan',$q)->get('bkpp_agenda_kegiatan');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['agenda_kegiatan'] += $db->num_rows();
		$search['results']['data']['agenda_kegiatan'] = html2textA($db->result_array(),array('keterangan'));
		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->ga,false)->or_like('judul',$q)->or_like('keterangan',$q)->get('bkpp_galery_images');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['galeri'] += $db->num_rows();
		$search['results']['data']['galeri'] = html2textA($db->result_array(),array('keterangan'));

		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->ko,false)->or_like('pengirim',$q)->or_like('pertanyaan',$q)->or_like('jawaban',$q)->get('bkpp_konsultasi');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['konsultasi'] += $db->num_rows();
		$search['results']['data']['konsultasi'] = html2textA($db->result_array(),array('jawaban'));

		//------------------------------------------------------------------------------------/

		$db = $this->db->select($s->bt,false)->or_like('nama',$q)->or_like('isi',$q)->or_like('jawaban',$q)->get('bkpp_buku_tamu');
		$search['results']['total']['all'] += $db->num_rows();
		$search['results']['total']['buku_tamu'] += $db->num_rows();
		$search['results']['data']['buku_tamu'] = html2textA($db->result_array(),array('jawaban'));

	

		$search_data = array();
		foreach ($search['results']['data'] as $module => $data) {
			foreach ($data as $d) {
				$item = array();

				switch ($module) {
					case 'profile':
					case 'layanan':

						$item['judul'] = $d['judul'];
						$item['link']  = site_url($module.'/'.$d['slug']);
						$item['preview'] = $d['konten'];

						break;
					case 'artikel':
						$item['judul'] = $d['article_title'];
						$item['link']  = site_url('konten/artikel/'.$d['article_url']);
						$item['preview'] = $d['content'];
						break;

					case 'download':
						$item['judul'] = $d['judul'];
						$item['link']  = site_url('konten/download/'.my_simple_crypt($d['id']).'/'.slugify($d['judul']) );
						$item['preview'] = $d['file'].' '.$d['keterangan'];
						break;
					case 'info_dinas':

						$item['judul'] = $d['judul'];
						$item['link']  = site_url('informasi/info-dinas/'.$d['slug']);
						$item['preview'] = $d['isi'];
						break;
					case 'agenda_kegiatan':

						$item['judul'] = $d['judul'];
						$item['link']  = site_url('informasi/agenda-kegiatan/'.$d['slug']);
						$item['preview'] = $d['tempat'].' '.$d['keterangan'];
						break;

					case 'galeri':

						$item['judul'] = $d['judul'];
						$item['link']  = site_url('konten/galeri/'.$d['slug']);
						$item['preview'] = $d['keterangan'];
						break;
					case 'konsultasi':

						$item['judul'] = 'Konsultasi';
						$item['link']  = site_url('konsultasi#/'.base64_encode($d['id']));
						$item['preview'] = $d['pengirim'] . $d['pertanyaan']. (!empty($d['jawaban'])?','. $d['jawaban']:'') ;
						break;

					case 'buku_tamu':

						$item['judul'] = 'Buku Tamu';
						$item['link']  = site_url('buku-tamu#/'.base64_encode($d['id']) );
						$item['preview'] = $d['nama'] . $d['pertanyaan']. (!empty($d['jawaban'])?','. $d['jawaban']:'') ;
						break;
					default:
						# code...
						break;
				}
				$search_data[] = $item;
			}
		}

		$this->benchmark->mark('search_end');

		$bts = array(
			'info' => array(
				'waktu'  => $this->benchmark->elapsed_time('search_start', 'search_end'),
				'jumlah' => $search['results']['total']['all'],
				'query' => $q,
				'show' => true
				
			),
			'data' => $search_data
		);

		return $bts;
	}
	public function insert_bt()
	{
		$bt = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'isi' => $this->input->post('pesan'),
			'tanggal' => date('Y-m-d H:i:s')
		);

		$this->db->insert('bkpp_buku_tamu',$bt);
	}

	public function insert_konsultasi()
	{
		$kon = array(
			'pengirim' => $this->input->post('pengirim'),
			'email' => $this->input->post('email'),
			'untuk' => $this->input->post('untuk'),
			'pertanyaan' => $this->input->post('pertanyaan'),
			'tanggal' => date('Y-m-d H:i:s')
		);

		$this->db->insert('bkpp_konsultasi',$kon);
	}

	public function get_dl($id)
	{
		return $this->db->where('id',$id)->get('bkpp_download')->row_array();
	}

	public function get_banner($limit='10')
	{
		$rs =  $this->db->limit($limit)->order_by('date','desc')->where('publish','1')->get('bkpp_banner')->result_array();

		foreach ($rs as &$r) {
			$r['encrypted_image'] = my_simple_crypt('public/assets/uploads/files/banners/'.$r['gambar'],'e');
		}

		return $rs;
	}

	public function get_ptelex($limit='10')
	{
		$rs = $this->db->limit($limit)->order_by('date','desc')->where('publish','1')->get('bkpp_pengumuman')->result_array();
		$ptelex = array();

		foreach ($rs as $r) {
			$ptelex[] = array('content' => $r['text'] );
		}
		return $ptelex;
	}

	public function get_links($limit=50)
	{
		$data = $this->db->limit(50)->order_by('order','asc')->get('bkpp_links')->result_array();

		foreach ($data as &$ln) {
			$path = 'public/assets/uploads/files/links/' . $ln['gambar'];
			$ln['gambar'] = site_url('files/thumb').'/'.my_simple_crypt($path,'e').'/175/60';
		}

		return $data;
	}

	public function get_data_interaksi()
	{
		$data = array(
			'buku_tamu' => $this->db->count_all('bkpp_buku_tamu'),
			'konsultasi' => $this->db->count_all('bkpp_konsultasi'),
			'terjawab' => ($this->db->select("COUNT(id) cx")->where("jawaban != ''")->get('bkpp_buku_tamu')->row()->cx ) + ($this->db->select("COUNT(id) cx")->where("jawaban != ''")->get('bkpp_konsultasi')->row()->cx ),
			'belum_terjawab' => ($this->db->select("COUNT(id) cx")->where("jawaban = ''")->get('bkpp_buku_tamu')->row()->cx ) + ($this->db->select("COUNT(id) cx")->where("jawaban = ''")->get('bkpp_konsultasi')->row()->cx ),
		);

		return $data;
	}

	public function get_polling()
	{
		$polling_id = $this->session->userdata('polling_id');
		$always_alredy = false;

		if(!empty($polling_id)){
			$always_alredy = true;
			$this->db->where('id',$polling_id);
			$this->session->unset_userdata('polling_id');
		}

		$poll = $this->db->order_by('date','desc')->get('pollings')->row_array();
		$already = $this->db->where('parent',$poll['id'])->where('ip',$this->input->ip_address())->get('polling_data')->num_rows() > 0;
		return array(
			'poll' => $poll,
			'polling_data' => $this->config->item('polling_data'),
			'already' => $always_alredy? true : $already
		);
	}
	public function push_polling(){
		$parent = $this->input->post('parent');
		$already = $this->db->where('parent',$parent)->where('ip',$this->input->ip_address())->get('polling_data')->num_rows() > 0;
		if($already){
			return array(
				'status' => false,
				'message' => array(''=>'You already push this pooling')
			);
		}
		
		$data = array(
			'parent' => $parent,
			'value'=>$this->input->post('value'),
			'ip'=>$this->input->ip_address(),
			'date' => date('Y-m-d H:i:s',time())
		);

		$this->db->insert('polling_data',$data);
		$data['id'] = $this->db->insert_id();

		return array(
			'status' => true,
			'data' => $data,
			'poll_data' => $this->get_poll_data($parent)
		);
	}

	public function get_poll_data($pk){
 
		$poll_data = $this->db->where('parent',$pk)->get('polling_data')->result_array();

		$pd = array();
		$real_poll_data = array(
			'total' => 0,
			'data' => array()
		);
		$polling_data = $this->config->item('polling_data');
		foreach ($polling_data as $score => $title) {
			$pd[$title] = $score;
			$real_poll_data['data'][$score] = array(
				
				'total' => 0,
				'percentage' => 0		
			);
		}
		foreach ($poll_data as $p) {
			$real_poll_data['total'] += 1;
			$real_poll_data['data'][$p['value']]['total'] += 1;
		}

		foreach ($real_poll_data['data'] as $score => &$data) {
			$data['title'] = $polling_data[$score];
			$data['percentage'] = floor(($data['total'] / $real_poll_data['total']) * 100); 
		}
		return $real_poll_data;
	}

	public function get_latest_galeri()
	{	
		$sql = "SELECT
				bkpp_galery_images.judul,
				bkpp_galery_images.slug,
				bkpp_galery_images.keterangan,
				bkpp_galery_image_items.file,
				bkpp_galery_image_items.tgl_dibuat,
				(SELECT COUNT(id) FROM bkpp_galery_image_items WHERE galery_id=bkpp_galery_images.id) jumlah_gambar
				FROM
				bkpp_galery_images
				INNER JOIN bkpp_galery_image_items ON bkpp_galery_image_items.galery_id = bkpp_galery_images.id
				WHERE bkpp_galery_images.publish=1 AND bkpp_galery_images.publish_date <= curdate()
				GROUP BY
				bkpp_galery_images.id
				ORDER BY
				bkpp_galery_images.tgl_dibuat DESC
				LIMIT 11";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	function get_latest_video($limit=5,$exclude_id = false){
		if($exclude_id != false){
			$this->db->where("id != '${exclude_id}'" );
		}
		return $this->db->limit($limit)->order_by('tgl_dibuat','desc')->get('bkpp_galery_video_items')->result_array();
		
	}

	public function get_article_comments($article_id)
	{
		// $comments = array();
		$comments = $this->db->where('publish','1')->where('article_id',$article_id)->get('blog_comment')->result_array();

		foreach ($comments as &$c) {
			$c['date_ta'] = time_ago(strtotime($c['date']));
		}

		return $comments;
	}
	public function send_article_comment()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'content' => $this->input->post('content'),
			'article_id' => $this->input->post('article_id'),
			'date'=>date('Y-m-d H:i:s',time()),
			'publish'=>'1'
		);
		$this->db->insert('blog_comment',$data);
		$data['comment_id'] = $this->db->insert_id();

		return array('status'=>true,'data'=>$data);
	}

	public function get_layanan($kategory=NULL)
	{
		$layanan= array(
			'layanan' => array(),
			'jabatan-fungsional' => array()
		);
		
		if($kategory!=NULL){
			$this->db->where(array("kategori"=>$kategory));
		}

		$rs = $this->db->order_by('judul','asc')->get('bkpp_layanan')->result_array();

		foreach ($rs as $l) {
			$layanan[$l['kategori']][] = $l;
		}

		return $layanan;
	}
	public function get_related_layanan($slug)
	{
		$layanan= array(
			'layanan' => array(),
			'jabatan-fungsional' => array()
		);

		$rs = $this->db->order_by('judul','asc')->where('slug !=',$slug)->get('bkpp_layanan')->result_array();

		foreach ($rs as $l) {
			$layanan[$l['kategori']][] = $l;
		}

		return $layanan;
	}
}
