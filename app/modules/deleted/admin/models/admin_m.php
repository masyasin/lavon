<?php

class Admin_m extends CI_Model{
	
	public function cb_auto_date_slug($post_array,$pk)
	{

		$post_array['date'] = date('Y-m-d',time());
		$post_array['slug'] = slugify($post_array['judul']);


		return $post_array;
	}

	public function cb_auto_date($post_array,$pk)
	{
		$post_array['date'] = date('Y-m-d',time());
		return $post_array;
	}
	public function cb_auto_tgl($post_array,$pk)
	{
		$post_array['tgl_dibuat'] = date('Y-m-d',time());
		return $post_array;
	}
	public function cb_auto_slug($post_array,$pk)
	{
		$post_array['slug'] = slugify($post_array['judul']);
		return $post_array;
	}

	public function get_polling($pk)
	{
		return $this->db->where('id',$pk)->get('pollings')->row();
	}

	public function del_poll_data($pk)
	{
		return $this->db->where('parent',$pk)->delete('polling_data');
	}

	public function get_galeri($id)
	{
		return $this->db->where('id',$id)->get('bkpp_galery_images')->row();
	}

	public function get_video($id)
	{
		return $this->db->where('id',$id)->get('bkpp_galery_videos')->row();
	}
}