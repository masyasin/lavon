<?php

class MY_Security extends CI_Security{
	/**
	 * Show CSRF Error
	 *
	 * @return	void
	 */
	public function csrf_show_error()
	{
		
	    header('Location: ' .  $_SERVER['HTTP_REFERER']);
	    exit;
		
		show_error('The action you have requested is not allowed.');
	}

}