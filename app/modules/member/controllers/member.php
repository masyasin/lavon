<?php 
class Member extends CMS_Controller{
	public function index()
	{
		# code...
	}
	public function entry()
	{
		$config=array(
			'title'=>'Entry Card/Member Detail'
		);
		$this->view('member_details', $output, 'navi',$config);
	}
}