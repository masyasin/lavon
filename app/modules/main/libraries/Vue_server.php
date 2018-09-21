<?php

/**
* 
*/
class Vue_server 
{
	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}
}