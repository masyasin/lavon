<?php

class Galeri_m extends CI_Model
{
	
	public function get_video_list($page,$limit=10,$exclude_id='')
	{
		if(!empty($exclude_id)){
			$this->db->where('id !=',$exclude_id);
		}
		$videos = $this->db->limit($limit,($page-1)*$limit)
						->order_by('tgl_dibuat','desc')
						->get('bkpp_galery_video_items')
						->result();

		foreach ($videos as &$v) {
			$video_id = getYoutubeIdFromUrl($v->url);
			$v->yt_embed_url = '//www.youtube.com/embed/'.$video_id;
			$v->thumb = "http://img.youtube.com/vi/".$video_id."/0.jpg";
			$v->link = site_url('konten/galeri/video/' . my_simple_crypt($v->id) . '/' . slugify($v->judul) );
			
		}

		return $videos;
	}

	public function get_video($pk)
	{
		$v = $this->db->limit($limit,($page-1)*$limit)->where('id',$pk)
						->order_by('tgl_dibuat','desc')
						->get('bkpp_galery_video_items')
						
						->row();
		if(!empty($v)){

			$video_id = getYoutubeIdFromUrl($v->url);
			$v->yt_embed_url = '//www.youtube.com/embed/'.$video_id;
			$v->thumb = "http://img.youtube.com/vi/".$video_id."/0.jpg";
			$v->link = site_url('konten/galeri/video/' . my_simple_crypt($v->id) . '/' . slugify($v->judul) );
		}
			
		return $v;
	}

	public function get_related_video($gv,$page=1,$limit=4)
	{
		$videos = $this->db->limit($limit,($page-1)*$limit)
						->order_by('tgl_dibuat','desc')
						->where('galery_id',$gv->galery_id)
						->where('id !=',$gv->id)
						->get('bkpp_galery_video_items')
						->result();

		foreach ($videos as &$v) {
			$video_id = getYoutubeIdFromUrl($v->url);
			$v->yt_embed_url = '//www.youtube.com/embed/'.$video_id;
			$v->thumb = "http://img.youtube.com/vi/".$video_id."/0.jpg";
			$v->link = site_url('konten/galeri/video/' . my_simple_crypt($v->id) . '/' . slugify($v->judul) );
			
		}

		return $videos;
	}
}