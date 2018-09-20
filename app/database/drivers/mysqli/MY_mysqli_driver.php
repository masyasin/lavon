<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class MY_DB_mysqli_driver extends CI_DB_mysqli_driver
{
	protected $__cache_key = '';
	protected function _execute($sql)
	{
		$minified_sql = preg_replace("/(\n|\s+)/",' ',$sql);
		// my_simple_log( $minified_sql );
		//$this->__cache_key = md5( crc32($minified_sql) );
		
		//my_simple_log(  $this->__cache_key );
		//$this->__init_cache_file($minified_sql);
		return parent::_execute($minified_sql);
	}

	protected function __init_cache_file($sql){
		$data = array(
			'sql' => $sql,
			'num_rows' 	=> 0,
			'fecth_row'	=> array(),

		);
		$cache_path = APPPATH.'cache/query/'.$this->__cache_key;
		file_put_contents($cache_path, Yaml::dump($data));
	}

	public function getCacheKey()
	{
		return $this->__cache_key;
	}
}