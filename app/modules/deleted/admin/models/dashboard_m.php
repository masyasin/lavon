<?php

class Dashboard_m extends CMS_Model
{
	
	public function article_statistic($user_id='')
	{
		if(!empty($user_id)){
			$this->db->where('ba.author_user_id',$user_id);
		}
		$all = 0+$this->db->select("count(ba.article_id) cx")->get('blog_article ba')->row()->cx;
		if(!empty($user_id)){
			$this->db->where('ba.author_user_id',$user_id);
		}
		$draft = 0+$this->db->where('publish !=','1')->select("count(ba.article_id) cx")->get('blog_article ba')->row()->cx;
		if(!empty($user_id)){
			$this->db->where('ba.author_user_id',$user_id);
		}
		$publish = 0+$this->db->where('publish','1')->select("count(ba.article_id) cx")->get('blog_article ba')->row()->cx;
		if(!empty($user_id)){
			$this->db->where('ba.author_user_id',$user_id);
		}
		$comments = 0+$this->db->select("count(bc.comment_id) cx")->from('blog_comment bc')->join('blog_article ba','ba.article_id=bc.article_id')->get()->row()->cx;

		return array(
			'all'=>$all,
			'draft'=>$draft,
			'publish'=>$publish,
			'comments'=>$comments
		);
	}
	public function layanan_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_layanan')->row()->cx;
	}
	public function galeri_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_galery_images')->row()->cx;
	}
	public function konsultasi_statistic()
	{
		
		$q1 = "select count(id) as cx FROM bkpp_konsultasi where untuk IN(".$this->cms_group_layanan()["layanan"][0].")";
		$q2 = "select count(id) as cx FROM bkpp_konsultasi where untuk IN(".$this->cms_group_layanan()["layanan"][0].") AND jawaban = '' ";
		$q3 = "select count(id) as cx FROM bkpp_konsultasi where untuk IN(".$this->cms_group_layanan()["layanan"][0].") AND jawaban <> '' ";
		
		$all 		= 0+$this->db->query($q1)->row()->cx;
		$belum 		= 0+$this->db->query($q2)->row()->cx;
		$terjawab 	= 0+$this->db->query($q3)->row()->cx;

		return array('all'=>$all,'belum'=>$belum,'terjawab'=>$terjawab);
	}
	public function download_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_download')->row()->cx;
	}
	public function profile_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_profile')->row()->cx;
	}
	public function info_dinas_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_info_dinas')->row()->cx;
	}
	public function agenda_kegiatan_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_agenda_kegiatan')->row()->cx;
	}
	public function link_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_links')->row()->cx;
	}
	public function pengumuman_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_pengumuman')->row()->cx;
	}
	public function popup_image_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_banner')->row()->cx;
	}
	public function polling_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('pollings')->row()->cx;
	}
	public function buku_tamu_statistic()
	{
		$all = 0+$this->db->select("count(id) cx")->get('bkpp_buku_tamu')->row()->cx;
		$belum = 0+$this->db->where(array("jawaban"=>""))->select("count(id) cx")->get('bkpp_buku_tamu')->row()->cx;
		$terjawab = 0+$this->db->where("jawaban !=","")->select("count(id) cx")->get('bkpp_buku_tamu')->row()->cx;

		return array('all'=>$all,'belum'=>$belum,'terjawab'=>$terjawab);
	}
	public function video_statistic()
	{
		return 0+$this->db->select("count(id) cx")->get('bkpp_galery_video_items')->row()->cx;
	}
	public function recent_articles($user_id='')
	{
		$condition = "";
		if(!empty($user_id)){
			$condition = " where ba.author_user_id = '$user_id'";
		}
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
								  bc.category_id,
								  mu.real_name penulis,
								  mu.email user_email

										FROM blog_category_article bca

										join blog_category bc on bca.category_id = bc.category_id 
										join blog_article ba on bca.article_id = ba.article_id 
										left join main_user mu on ba.author_user_id = mu.user_id 
$condition
										group by bc.category_id 

										order by ba.date desc

										LIMIT 5";
		$rs_pka = $this->db->query($sql_popular_kategori_artikel);
		$articles = $rs_pka->result();
		foreach ($articles as &$article) {
			$article->t_ago = time_ago(strtotime($article->date));
		}
		return $articles;
	}
	public function recent_comments($user_id='')
	{
		if(!empty($user_id)){
			$this->db->where('ba.author_user_id',$user_id);
		}
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
	public function recent_buku_tamu()
	{
		$bts =  $this->db->limit(5)->order_by('tanggal','desc')->get('bkpp_buku_tamu')->result();
		foreach ($bts as &$bt) {
			$bt->t_ago = time_ago(strtotime($bt->tanggal));
		}
		return $bts;
	}
	public function recent_konsultasi($group_id='')
	{
		if(!empty($group_id)){
			$this->db->where('untuk',$user_id);
		}

		$kepada = $this->config->item('subject_konsultasi');
		$bts = $this->db->limit(5)->order_by('tanggal','desc')->get('bkpp_konsultasi')->result();
		foreach ($bts as &$bt) {
			$bt->t_ago = time_ago(strtotime($bt->tanggal));
			$bt->kepada = $kepada[$bt->untuk];
		}
		return $bts;
	}
	public function poll_results($polling="")
	{
		if(empty($polling)){
			$polling =  $this->db->order_by('date','desc')->limit(1)->get('pollings')->row();
		}
		$pk = $polling->id;
		$poll_data = $this->db->where('parent',$pk)->get('polling_data')->result_array();

		$pd = array();
		$real_poll_data = array(
			'judul'=>$polling->judul,
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

	public function get_dashboard_data()
	{
		$user_id = '';
		$group_id = '';
		return array(
			'statistics' => (object)array(
				'article' => (object)$this->article_statistic($user_id),
				'layanan' => $this->layanan_statistic(),
				'galeri' => $this->galeri_statistic(),
				'konsultasi'=>(object) $this->konsultasi_statistic(),
				'download'=> $this->download_statistic(),
				'profile'=>$this->profile_statistic(),
				'info_dinas'=>$this->info_dinas_statistic(),
				'agenda_kegiatan'=>$this->agenda_kegiatan_statistic(),
				'buku_tamu'=>(object)$this->buku_tamu_statistic(),
				'video'=>$this->video_statistic() ,
				'pengumuman' => $this->pengumuman_statistic(),
				'polling' => $this->polling_statistic(),
				'popup_image' => $this->popup_image_statistic()
			),
			'recents'=>(object)array(
				'articles' => $this->recent_articles($user_id),
				'comments' => $this->recent_comments($user_id),
				'buku_tamu' => $this->recent_buku_tamu(),
				'konsultasi'=>$this->recent_konsultasi($group_id) 

			),
			'poll_results' => $this->poll_results()
		);
	}
}