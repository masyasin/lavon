<?php

class Vue_server {
	protected $ci;

	public function __construct()
	{
		# code...
	}

	public function get_cmd()
	{
		return $this->ci->input->post('cmd');
	}

	public function get_param()
	{
		return $this->ci->input->post('param');
		# code...
	}
}