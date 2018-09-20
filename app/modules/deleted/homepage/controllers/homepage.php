<?php

class Homepage extends CMS_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bkpp_m');
		// $this->load->library('twig');
		// $modules_dir = APPPATH.'modules/homepage/views/';

		// $this->twig->getEnv()->getLoader()->addPath($modules_dir);
		$this->load->driver('session');
		$this->theme = $this->cms_get_config('site_theme');
		$this->template->set_theme($this->theme);
		
	}

	public function beranda()
	{
		$this->load->model('artikel_m');
		$artikel_caraosel_data = $this->artikel_m->get_careausel_by_category($this->config->item("category_article_slider"));
		
		$popup_session = $this->session->userdata('popup_session');

		if(empty($popup_session)){
			$this->session->set_userdata('popup_session',true);
		}

		$data = array(
			'popup_session' => $popup_session,
			'acd'=>$artikel_caraosel_data,
			'latest_posts' => $this->bkpp_m->get_latest_posts()
		);
        $this->view('homepage/beranda', $data, 'homepage_beranda',$view_config);
	}
	/*-----------------------------------------------------------------------*/

	public function konsultasi($value='')
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$success = 0;
		if($this->input->method() == 'post'){
			
			
			if ($this->form_validation->run('konsultasi') != FALSE){

				$this->bkpp_m->insert_konsultasi();
				$success = 1;
			}
			
		}

		$bt = $this->bkpp_m->get_konsultasi($slug);
		$data = array('bt'=>$bt,'subject'=>$this->config->item('subject_konsultasi'),'success'=>$success);
		$view_config = array(
			'title' => 'Konsultasi'
		);
		$this->view('homepage/konsultasi', $data, 'homepage_konten',$view_config);
	}
	/*-----------------------------------------------------------------------*/

	public function pencarian($a='',$b='',$c='')
	{
		$search = $this->bkpp_m->get_search();
		$data = array(
			'q'=> $search['info']['query'],
			'search' => $search
		);
		$view_config = array(
			'title' => (empty($data['q'])?"Pencarian" : "Hasil Pencarian &quot;$data[q] &quot;")
		);
		$this->view('homepage/pencarian', $data, 'homepage_konten',$view_config);
	}
	/*-----------------------------------------------------------------------*/

	public function buku_tamu($a='',$b='',$c='')
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$success = 0;
		if($this->input->method() == 'post'){
			
			
			if ($this->form_validation->run('buku_tamu') != FALSE){

				$this->bkpp_m->insert_bt();
				$success = 1;
			}
			
		}
		$bt = $this->bkpp_m->get_bt($slug);
		$data = array('bt'=>$bt,'success'=>$success);
		$view_config = array(
			'title' => 'Buku Tamu'
		);
		$this->view('homepage/buku_tamu', $data, 'homepage_konten',$view_config);
	}
	public function profile($slug='',$b='',$c='')
	{

		$profile = $this->bkpp_m->get_profile_by_slug($slug);
		if(empty($profile)){
			redirect(site_url());
			exit;
		}
		$related = $this->bkpp_m->get_related_profile_konten($profile);
		$data = array('profile'=>$profile,'related'=>$related);
		$view_config = array(
			'title' => $profile->judul
		);
		$this->view('homepage/profile', $data, 'homepage_profile',$view_config);
	}
	/*-----------------------------------------------------------------------*/

	public function layanan($slug='',$a='',$b='',$c='')
	{
		if($slug == 'jabatan-fungsional'){
			return $this->jabatan_fungsional($a,$b,$c);
		}
		if(!empty($slug)){
			
			$layanan = $this->bkpp_m->get_layanan_by_slug($slug);
			if (empty($layanan)) {
				redirect('layanan');
				exit;
			}
			$related = $this->bkpp_m->get_related_layanan($slug);

			$data = array('layanan'=>$layanan,'related'=>$related);
			$view_config = array(
				'title' => $layanan->judul
			);
			return $this->view('homepage/layanan_detail', $data, 'homepage_layanan',$view_config);
		}
		$layanan = $this->bkpp_m->get_layanan("layanan");
		$data = array('layanan'=>$layanan);
		$view_config = array(
			'title' => 'Layanan'
		);
		return $this->view('homepage/layanan', $data, 'homepage_layanan',$view_config);
	}

	public function jabatan_fungsional($slug='',$b='',$c='')
	{
		if(!empty($slug)){
			
			$layanan = $this->bkpp_m->get_layanan_by_slug($slug);
			if (empty($layanan)) {
				redirect('layanan');
				exit;
			}
			$related = $this->bkpp_m->get_related_layanan($slug);

			$data = array('layanan'=>$layanan,'related'=>$related);
			$view_config = array(
				'title' => $layanan->judul
			);
			return $this->view('homepage/layanan_detail', $data, 'homepage_layanan',$view_config);
		}
		$layanan = $this->bkpp_m->get_layanan("jabatan-fungsional");
		$data = array('layanan'=>$layanan);
		$view_config = array(
			'title' => 'Layanan'
		);
		return $this->view('homepage/layanan', $data, 'homepage_layanan',$view_config);

	}
	/*-----------------------------------------------------------------------*/



	/*-----------------------------------------------------------------------*/

	public function konten($type='',$a='',$b='',$c='')
	{
		$avail_kontens = array('galeri','artikel','download');

		if(in_array($type, $avail_kontens)){
			$method = $type;
			return $this->{$method}($a,$b,$c);
		}
	}

	public function galeri($slug='',$b='',$c='',$d='')
	{
		if($slug=='video'){
			return $this->galeri_video($b,$c,$d);
		}
		if(!empty($slug) && $slug != 'page'){
			return $this->galeri_detail($slug);
		}
		$page = $this->input->get('page');
		$page = 0+$page;
		if(empty($page)){
			$page = -1;
		}
		if($slug=='page'){
			$page=$b;
		}
		
		$page = $page <= 0 ? 1:$page;
		$galeri_menu = bkpp_m('get_galeri_list',$page,10);
		$tab_contents = array();

		foreach ($galeri_menu as $gm) {
		  $tab_contents[] = array(
		    'title' => substr($gm['judul'],0,80),
		    'link'  => 'konten/galeri/' . $gm['slug'],
		    'image' => my_simple_crypt('public/assets/uploads/files/galery_images/'.underscorize($gm['slug']) .'/'. $gm['gambar'],'e'),
		    'image_alt' => $gm['alt_image'],
		    'desc' => $gm['keterangan'],
		    'date'=>tanggal_indo($gm['date'],1)
		  );
		}
		$this->load->model('galeri_m');
		$videos = $this->galeri_m->get_video_list(1);
		$data = array('akg'=>$tab_contents,'page'=>$page,'videos'=>$videos);

		if ($this->input->is_ajax_request()) {
		   return $this->load->view('homepage/galeri_ajax',$data);
		   exit();
		}
		$view_config = array(
			'title' =>  'Galeri'
		);
		$this->view('homepage/galeri', $data, 'homepage_konten',$view_config);
	}
	public function galeri_detail($slug='',$b='',$c='')
	{
		$gi = $this->bkpp_m->get_gi($slug);

		if(empty($gi)){
			redirect('konten/galeri/page/1');
			exit;
		}
		$related = $this->bkpp_m->get_related_gi($gi[0]);

		$data = array('gi'=>$gi,'related'=>$related);
		$view_config = array(
			'title' =>  $data['gi'][0]['judul']
		);
		$this->view('homepage/galeri_detail', $data, 'homepage_konten',$view_config);
	}
	public function galeri_video($epk='',$slug='',$c='')
	{
		$this->load->model('galeri_m');
		$id = my_simple_crypt($epk,'d');
		$gv = $this->galeri_m->get_video($id);

		if(empty($gv)){
			redirect('konten/galeri/page/1');
			exit;
		}
		$related = $this->galeri_m->get_related_video($gv);

		$data = array('gv'=>$gv,'related'=>$related,'videos'=>$this->galeri_m->get_video_list(1,10,$gv->id));
		$view_config = array(
			'title' =>  $gv->judul
		);
		$this->view('homepage/galeri_video', $data, 'homepage_konten',$view_config);
	}
	public function artikel($cmd='',$a='',$b='',$c='')
	{
		// if ($this->input->is_ajax_request()) {
		//    exit('No direct script access allowed');
		// }
		$fns=array('kategori','komentar');
		if(!empty($cmd)){
			if(!in_array($cmd,$fns)){
				return $this->artikel_detail($cmd,$a,$b,$c);
			}else{
				$method = "artikel_" . $cmd;
				return $this->{$method}($a,$b,$c);
			}
		}
		$this->load->model('artikel_m');
		$artikel_caraosel_data = $this->artikel_m->get_caraousel();
		$artikel_cat_with_list = $this->artikel_m->get_cat_with_list();
		$artikel_most_shares = $this->artikel_m->get_most_sv();
		$artikel_recent_comments = $this->artikel_m->get_recent_comments();

		$data = array(
			'acd'=>$artikel_caraosel_data,
			'acwl'=>$artikel_cat_with_list,
			'ams'=>$artikel_most_shares,
			'arc'=>$artikel_recent_comments
		);
		
		$view_config = array(
			'title' => "Artikel"
		);
		$this->view('homepage/artikel', $data, 'homepage_konten',$view_config);
	}
	public function artikel_komentar($a,$b,$c)
	{
		if($this->input->method() == 'post'){
			if ($this->form_validation->run('blog_comments') != FALSE){
				$results = $this->bkpp_m->send_article_comment();
				echo json_encode($results);
			}else{
				echo json_encode(array('status'=>false,'verror'=>validation_errors_array()));
			}
		}else{
			$article_id = $this->input->get('pk');
			echo json_encode($this->bkpp_m->get_article_comments($article_id));
		}
		
		exit;
	}
	public function artikel_kategori($category_id,$slug,$page=1)
	{
		$page = 0+$page;
		if(empty($page)){
			$page = -1;
		}
		
		$page = $page <= 0 ? 1:$page;
		$this->load->model('artikel_m');
		$category = $this->artikel_m->get_category($category_id);
		if(empty($category)){
			redirect('konten/artikel');
			exit();
		}
		$articles = $this->artikel_m->get_by_category($category_id,$page,12);
		if ($this->input->is_ajax_request()) {
		   echo json_encode(array('status'=>1,'category'=>$category,'data'=>$articles));
		   exit();
		}
		$caraousel = $this->artikel_m->get_careausel_by_category($category_id);
		$categories = $this->artikel_m->get_category_articles($category->category_id);
		$data= array(
			'page' => $page,
			'categories'=>$categories,
			'category'=> $category,
			'articles' => $articles,
			'acd' =>$caraousel
		);

		$view_config = array(
			'title' => "Artikel Kategori ".ucwords(str_replace('-', ' ', $slug))
		);
		$this->view('homepage/artikel_kategori', $data, 'homepage_konten',$view_config);
	}
	public function artikel_detail($slug)
	{
		$this->load->model('artikel_m');

		$artikel = $this->artikel_m->get_by_slug($slug);
		if(empty($artikel)){
			return redirect('konten/artikel');
		}	
		$pn_artikel = $this->artikel_m->get_prev_next_by_artikel($artikel);
		$exclude_ids = array();
		if(!empty($pn_artikel['p'])){
			$exclude_ids[]=$pn_artikel['p']->article_id;
		}
		if(!empty($pn_artikel['n'])){
			$exclude_ids[]=$pn_artikel['n']->article_id;
		}
		$related = $this->artikel_m->get_related_by_artikel($artikel,$exclude_ids);

		$data = array(
			'artikel'=>$artikel,
			'pn_artikel'=>$pn_artikel,
			'related'=>$related
		);
		$view_config = array(
			'title' =>  $artikel->judul
		);
		$this->view('homepage/artikel_detail', $data, 'homepage_konten',$view_config);
	}
	public function download($slug='',$b='',$c='')
	{
		$id = my_simple_crypt($slug,'d');

		if(is_numeric($id)){
			$dl = $this->bkpp_m->get_dl($id);
			if(!empty($dl)){
				$this->load->helper('download');
				$file = FCPATH .'public/assets/uploads/files/attachments/' . $dl['file'];
				// echo $file;
				if(file_exists($file)){
					force_download($file, NULL);
					exit;
				}
			}
			// print_r($dl);
			echo "UNEXISTENT :  $file\n";

			exit();
		}
		$download = $this->bkpp_m->get_download_menu_list(1000);
		$data = array('download'=>$download);
		$view_config = array(
			'title' =>  'Unduhan'
		);
		$this->view('homepage/download', $data, 'homepage_konten',$view_config);
	}
	/*-----------------------------------------------------------------------*/



	/*-----------------------------------------------------------------------*/

	public function informasi($type='',$a='',$b='',$c='')
	{
		$avail_kontens = array('info-dinas','agenda-kegiatan');

		if(in_array($type, $avail_kontens)){
			$method = str_replace('-','_', $type);
			return $this->{$method}($a,$b,$c);
		}
	}


	public function agenda_kegiatan($slug='',$b='',$c='')
	{
		if(!empty($slug)){

			$akg = $this->bkpp_m->fetch_akg($slug);
			if (empty($akg)) {
				redirect('informasi/info-dinas');
				exit;
			}
			$related = $this->bkpp_m->get_related_agenda_kegiatan($slug);
			$data = array('akg'=>$akg,'related'=>$related);
			$view_config = array(
				'title' =>  $data['akg']['judul']
			);
			return $this->view('homepage/agenda_kegiatan_detail', $data, 'homepage_konten',$view_config);
		}
		$agk_menu = $this->bkpp_m->get_agenda_kegiatan_menu_list(1000);
		$tab_contents = array();

		foreach ($agk_menu as $ak) {
		  $tab_contents[] = array(
		    'title' => substr($ak['judul'],0,80),
		    'link'  => 'informasi/agenda-kegiatan/' . $ak['slug'],
		    'image' => my_simple_crypt('public/assets/uploads/files/agenda_kegiatan/'.  $ak['gambar'],'e'),
		    'image_alt' => $ak['gambar'],
		    'desc'=>$ak['keterangan']
		  );
		}

		$data = array('akg'=>$tab_contents);
		$view_config = array(
			'title' =>  'Agenda Kegiatan'
		);
		return $this->view('homepage/agenda_kegiatan', $data, 'homepage_konten',$view_config);
	}

	public function info_dinas($slug='',$b='',$c='')
	{
		if(!empty($slug)){
			$id = $this->bkpp_m->get_info_dinas_by_slug($slug);
			if (empty($id)) {
				redirect('informasi/info-dinas');
				exit;
			}
			$related = $this->bkpp_m->get_related_info_dinas($slug);
			$data = array('id'=>$id,'related'=>$related);
			$view_config = array(
				'title' =>  $data['id']['judul']
			);
			return $this->view('homepage/info_dinas_detail', $data, 'homepage_konten',$view_config);
		}
		$id = $this->bkpp_m->get_info_dinas_by_slug($slug);
			
		$data = array('id'=>$this->bkpp_m->get_info_dinas_menu_list(1000));
		$view_config = array(
			'title' =>  "Info Dinas"
		);
		return $this->view('homepage/info_dinas', $data, 'homepage_konten',$view_config);	
	}
	/*-----------------------------------------------------------------------*/
	public function widget($name='')
	{
		# code...
	}
	public function widget_galeri_menu()
	{
		$galeri = $this->bkpp_m->get_galeri_menu_list();

		return $this->twig->render('widget/galeri_menu.twig.php',array('results'=>$galeri));
	}
	public function widget_article_menu()
	{
		$article = $this->bkpp_m->get_article_menu_list();

		return $this->twig->render('widget/article_menu.twig.php',array('results'=>$article));
	}
	public function widget_info_dinas_menu()
	{
		$info_dinas = $this->bkpp_m->get_info_dinas_menu_list();

		return $this->twig->render('widget/info_dinas_menu.twig.php',array('results'=>$info_dinas));
	}
	public function widget_download_menu()
	{
		$download = $this->bkpp_m->get_download_menu_list(10);

		return $this->twig->render('widget/download_menu.twig.php',array('results'=>$download));
	}
	public function widget_agenda_kegiatan_menu($value='')
	{
		$agenda_kegiatan = $this->bkpp_m->get_agenda_kegiatan_menu_list();

		return $this->twig->render('widget/agenda_kegiatan_menu.twig.php',array('results'=>$agenda_kegiatan));
	}

	/*-----------------------------------------------------------------------*/


	

	/*-----------------------------------------------------------------------*/
	public function vue_server()
	{
		$this->load->library('vue_server');
		return $this->vue_server->serve_response();
	}
}
