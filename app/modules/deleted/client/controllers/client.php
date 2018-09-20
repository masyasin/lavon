<?php 
class Client extends CMS_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		echo "This is client index\n";
	}
	public function console($cmd='',$a='',$b='',$c='',$d='',$e='')
	{
		$method = str_replace(':', '_', $cmd);

		if(method_exists($this, $method)){
			return $this->{$method}($a,$b,$c,$d,$e);
		}

		echo ('Unexistent command'."\n");
	}

	public function do_something()
	{
		$this->cms_guard_page('client.do_something');
		echo "do_something() is called.\n";
	}
}