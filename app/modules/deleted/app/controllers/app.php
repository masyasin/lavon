<?php
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class App extends CMS_Controller
{
	protected $theme = 'neutral';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('homepage/bkpp_m');
		// $this->load->library('twig');
		$modules_dir = APPPATH.'modules/app/views/';

		// $this->twig->getEnv()->getLoader()->addPath($modules_dir);
		$this->theme = $this->cms_get_config('site_theme');
		$this->template->set_theme($this->theme);

		// unset($this->session);
	}

	

	public function pool(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$success = 0;
		if($this->input->method() == 'post'){
			
			
			if ($this->form_validation->run('push_polling') != FALSE){

				$r = bkpp_m('push_polling');
			 	echo json_encode($r);
			 	exit();
			}
			echo json_encode(array(
				'status'=>false,
				'message' => validation_errors_array()
			));
			exit();
		}
	}

	public function widget_proxy_data($widget='',$cmd='',$a='',$b='',$c='',$d=''){
		switch ($widget) {
			case 'sholat':
				$this->load->library('sholat');
				switch ($cmd) {
					case 'get_kota_lintang':
						$q = $this->input->post('q');
						if(!empty($q)){
							$data = $this->sholat->get_kota_select_data($q);
							$this->load->helper('form');
							$default = array_search ('KOTA TANGERANG SELATAN', $data);
							echo form_dropdown('wgs_city', $data, $default,'class="form-control"');
						}
						break;
					case 'get_waktu_sholat':
						$data = $this->sholat->get_waktu_sholat();
						echo json_encode($data);
						break;
					default:
						$html = $this->template->load_view('partials/homepage/jadwal-sholat.php');
						echo $html;
						break;
				}
				break;
			case 'polling':
				switch ($cmd) {
					case 'wg_poll_admin':
						$this->session->set_userdata('polling_id',$a);
						$html = $this->template->load_view('partials/homepage/polling.php');
						echo $html;
						break;
					
					default:
						# code...
						break;
				}
				break;
		}
	}
}