<?php 
class Member extends CMS_Controller{
	public function index()
	{
		# code...
	}
	public function tr()
	{
		$config=array(
			'title'=>'Member Detail'
		);
		$this->view('member_details', $output, 'navi',$config);
	}
}