<?php

class Theming extends CMS_Controller{
	public function __construct()
	{
		parent::__construct();
//		$this->load->model('bkpp_m');
		// $this->load->library('twig');
		// $modules_dir = APPPATH.'modules/homepage/views/';

		// $this->twig->getEnv()->getLoader()->addPath($modules_dir);
//		$this->load->driver('session');
//		$this->theme = $this->cms_get_config('site_theme');
//		$this->template->set_theme($this->theme);
		
	}
	public function index()
	{
		/*
		 * 
		 $view_config = array(
			'title' => "Artikel"
		);
		$this->view('homepage/artikel', $data, 'homepage_konten',$view_config);
		 */
		//$this->template->set_layout('theming/design');
		$data = array();
		$view_config = array(
			'title' => "Artikel"
		);
		//$this->load->view('theming/d')
		$this->view('theming/login', $data, '',$view_config);
//		$this->template->render();
	}
}