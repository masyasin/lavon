<?php


class Shares extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		//url=http%3A%2F%2Fpwnd.pwn%2Fbkpp%2Fkonten%2Fartikel%2Fpersyaratan-untuk-penyesuaian-ijazah-dan-ujian-dinas&shareTo=facebook
		$url = $this->input->get('url');
		$to  = $this->input->get('shareTo');
		
		$share_ids = ci_config_item('share_ids');

		
		if(!empty($url) && !empty($to) && in_array($to, array_keys($share_ids))){
			$path = str_replace(base_url(), '', $url);

			$hash = md5($path);

			$t = $share_ids[$to];
			/*--------------------------------------------------------------------------------------*/
			$existing_data = $this->db->where('hash',$hash)->where('t',$t)->get('shares');
			$cx = 1;
			$record_exist = 0;	
			$row = array();

			if($existing_data->num_rows() > 0){
				$row = $existing_data->row_array();
				$cx += $row['cx'];

				$record_exist = 1;

				if(time() - strtotime($row['ts']) < 8600){
					echo json_encode(array('error'=> 'Unable to save share date, You have share it once upon a while.'));
					exit();
				}
			}
			/*--------------------------------------------------------------------------------------*/	

			$share_data = array(
				'hash' => $hash,
				'cx'   => $cx,
				't'    => $t,
				'ts'   => date('Y-m-d H:i:s')
			);

			if($record_exist){
				$this->db->where('id',$row['id'])->update('shares',$share_data);
				$share_data['id'] = $row['id'];
				echo json_encode($share_data);
				exit();
			}
			$this->db->insert('shares',$share_data);
			$share_data['id'] = $this->db->insert_id();
			echo json_encode($share_data);
			exit();

		}else{
			echo "BLANK";
		}
	}

	public function count()
	{
		
	}
}