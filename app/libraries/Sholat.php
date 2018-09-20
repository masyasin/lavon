<?php
 

class Sholat {
	protected $CI;
	protected $web_api_source_url;
	protected $cookie_dir;
	protected $cookie_path;

	protected $cookie_filename;
	protected $http_client;

	public function __construct(){
		$this->CI =& get_instance();

		$this->setup();
	}

	private function setup(){

		$this->cookie_filename  	= md5('jadwalsholat.pkpu.or.id').'.txt';
		$this->web_api_source_url 	= 'http://jadwalsholat.pkpu.or.id/';
		$this->cookie_dir 			= APPPATH . 'cache/cookies/';

		if(!is_dir($this->cookie_dir)){
			mkdir($this->cookie_dir);
		}

		$this->cookie_path  = $this->cookie_dir  . $this->cookie_filename;
		@unlink($this->cookie_path);
		$this->CI->load->helper('guzzle');		
		$this->http_client = guzzle_http_client($this->cookie_dir, $this->cookie_filename);
	}
	public function get_provice_select_data(){
		
		// $http_response = guzzle_http_client_request($this->http_client,$this->web_api_source_url,'GET',array(),false,0);
		// if(is_string($http_response)){
		// 	return $http_response;
		// }
		// if( $http_response->getStatusCode() == 200 ){
		 
			 
		// 	$http_body 	= $http_response->getBody()->getContents();
		// 	$dom 		= pQuery::parseStr($http_body);

		// 	$options 	= $dom->query('#opt_lokasi_provinsi > option');

		// 	$select_data = array();
			
		// 	foreach ($options as $option) {
		// 		$k = $option->attr('value');
		// 		$v = $option->text();

		// 		$select_data[$k] = $v;
		// 	}

		// 	return $select_data;
		// }
	}

	public function get_kota_select_data($province){
		
		$url = 'http://jadwalsholat.pkpu.or.id';	
		$http_response = guzzle_http_client_request(
			$this->http_client,
			$url,
			#array('GET'=>array('q' => $province)),
			array('Referer' => $this->web_api_source_url),
			true,
			0
		);
		if(is_string($http_response)){
			return $http_response;
		}
		if( $http_response->getStatusCode() == 200 ){
		 
			 
			$http_body 	= $http_response->getBody()->getContents();
			$dom 		= pQuery::parseStr($http_body);
			// echo $http_body;
			$options = $dom->query('select.inputcity > option');

			$select_data = array();
			
			foreach ($options as $option) {
				$k = $option->attr('value');
				$v = $option->text();

				$select_data[$k] = $v;
			}

			return $select_data;
			
		}
	}

	public function get_waktu_sholat(){
		//http://jadwalsholat.pkpu.or.id/monthly.php?vv=e5383d21f0&type=2&id=274&m=11&y=2017
			
		$referer = 'http://jadwalsholat.pkpu.or.id/';

		$postData = array(
			'bulan' => $this->CI->input->post('bulan'),
			'tahun' => $this->CI->input->post('tahun'),
			'lokasi' => $this->CI->input->post('lokasi'),
			'h' => '0'
		);
		
		$url = 'http://jadwalsholat.pkpu.or.id/monthly.php?vv='.md5(microtime()).'&type=2&id='.$postData['lokasi'].'&m='.$postData['bulan'].'&y='.$postData['tahun'];
		$http_response = guzzle_http_client_request(
			$this->http_client,
			$url,
			array('POST'=> $postData ),
			array('Referer' => $referer),
			true,
			0
		);

		if(is_string($http_response)){
			return $http_response;
		}
		$tanggal = $this->CI->input->post('tanggal');
		if( $http_response->getStatusCode() == 200 ){	 
			$http_body 	= $http_response->getBody()->getContents();
			//$data = json_decode($http_body,1);
			//table_adzan
			$dom 		= pQuery::parseStr($http_body);
			$trs = $dom->query('tr.table_light,tr.table_dark,tr.table_highlight');
			$maps=array('tanggal','subuh','dzuhur','ashar','maghrib','isya');
			$output=array();

//print_r($trs);
			foreach ($trs as $tr) {
				$tds = $tr->query('td');
				$row = array();
				foreach ($tds as $index=>$td) {
					$value = $td->text();
					$key = $maps[$index];
					if($key=='tanggal'){
						$value = preg_replace('/^0/', '', $value);
					}
					$row[$key]=$value;
				}
				$output[$row['tanggal']] = $row;
			}
			
			// if($data['status']){
			// 	$key = "$postData[tahun]-$postData[bulan]-" . ($tanggal < 10 ? '0'.$tanggal:$tanggal);
			// 	// echo $key;
			// 	$data = $data['data'][$key];
			// 	$data['tanggal'] = tanggal_indo($key,1);

			// 	return $data;
			// }
		}
		// print_r($output);
		return $output[$tanggal];
	}
}