<?php

 use GDText\Box;
use GDText\Color;
use Imagine\Image\ImageInterface;

class Www_static extends CI_Controller{

	public function assets($key)
	{


		// $key  	= $_GET['t'];
		$keys 	= explode('.', $key);

		$module = $keys[0]; 
		$ext 	= $keys[1];

		
		
		$config_key = 'assets_' . $module . '_' . $ext;
		$cache_path =  APPPATH ."cache/assets/".$key;
		
		
		$expire = 50;

		if ($expire)
		{
			header("Pragma: public");
			header("Cache-Control: public");
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expire) . ' GMT');
		}

		if ( ! file_exists($cache_path) OR (filemtime($cache_path) < filemtime($cache_path)))
		{
			require_once APPPATH . 'config/assets.php';
			$files = $config[$config_key];
			$buffer = combine_assets($files, $ext);

			file_put_contents($cache_path, $buffer);
		}
		else if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
			(strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime($cache_path)) &&
				$expire )
		{
			// Send 304 back to browser if file has not beeb changed
			header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($cache_path)).' GMT', true, 304);
			exit();
		}
		
		header("Content-Type: text/" . ($ext == 'css' ? 'css' : 'javascript'));
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($cache_path)) . ' GMT');
		ob_clean();
		echo file_get_contents($cache_path);
		exit();


	}
	public function js($filename)
	{ 
		// error_reporting(E_ALL);

		$tmu = "app/themes/metronic/assets/";
		
		$js_code = "var gc={exclude_js:['jquery-ui-1.10.3.custom.min.js']};var site_url=function(){return '".site_url()."'};var base_url=function(){return '".base_url()."'};var gbs=function(){return '".base_url()."';};var tmu=function(){return '".site_url($tmu)."/';}";
		$cache_path =  APPPATH ."cache/assets/".$filename;

		$expire = 30*60*60;

		if ($expire)
		{
			header("Pragma: public");
			header("Cache-Control: public");
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expire) . ' GMT');
		}

		if ( ! file_exists($cache_path) OR (filemtime($cache_path) < filemtime($cache_path)))
		{
			

			file_put_contents($cache_path, $js_code);
		}
		else if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
			(strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime($cache_path)) &&
				$expire )
		{
			// Send 304 back to browser if file has not beeb changed
			header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($cache_path)).' GMT', true, 304);
			exit();
		}
		
		header('Content-Type: text/javascript');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($cache_path)) . ' GMT');
		ob_clean();
		echo file_get_contents($cache_path);
		exit();
	}
	public function _drawEmptyImage($width,$height)
	{
		$cache_dir = $this->config->item('image_cache_dir') . 'image_files/';
		$cache = $cache_dir . "empty-image-${width}x${height}.png";

		if(file_exists(FCPATH . $cache)){
			redirect(site_url($cache));
			exit;
		}

		$im = imagecreatetruecolor($width, $height);
		$backgroundColor = imagecolorallocate($im, 200, 200, 200);
		imagefill($im, 0, 0, $backgroundColor);

		$box = new Box($im);
		$box->setFontFace(FCPATH .'www_static/assets/fonts/ProximaNovaBold/proximanova-bold-webfont.ttf'); 
		$box->setFontColor(new Color(255, 255, 255));
	
		$box->setFontSize($height/10);
		$box->setBox(0, 0, $width, $height);
		$box->setTextAlign('center', 'center');
		$box->draw("$width x $height");

		header("Content-type: image/png");
		imagepng($im,FCPATH.$cache);

		redirect(site_url($cache));
	
	}
	public function thumb($encrypted_path='',$width = 100, $height = 100, $mode = NULL){
		$no_image_path =  'public/assets/themes/images/no-image-2.png';
		$path =  my_simple_crypt($encrypted_path,'d');
		
		if(is_dir($path)){
			$path = 'invalid';
		}
	 
		if( !file_exists($path))
		{
			return $this->_drawEmptyImage($width,$height);
			$path = $no_image_path; 
		}

		

		$data = getimagesize($path);
		$_end = end(explode('.', $path));
		$ext = '.'.$_end;
		$file = (object)array();
		$file->width 		= $data[0];
		$file->height 		= $data[1];
		$file->filename 	= basename($path);
		$file->extension 	= $ext;
		$file->mimetype 	= $data['mime'];

		$cache_dir = $this->config->item('image_cache_dir') . 'image_files/';

		if ( ! is_dir($cache_dir))
		{
			mkdir($cache_dir, 0777, TRUE);
		}
		$image_thumb = $cache_dir . md5($file->filename) . "${width}x${height}" . $file->extension;
 		
 		if(file_exists($image_thumb)){
 			redirect($image_thumb );
 			exit();
 		}
		$expire = 60;

		if ($expire)
		{
			header("Pragma: public");
			header("Cache-Control: public");
			header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expire) . ' GMT');
		}

		if ( ! file_exists($cache_path) OR (filemtime($cache_path) < filemtime($cache_path)))
		{

			thumb_image($path,$image_thumb,$width,$height);

		}
		else if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
			(strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime($image_thumb)) &&
				$expire )
		{
			// Send 304 back to browser if file has not beeb changed
			header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($image_thumb)).' GMT', true, 304);
			exit();
		}
		
		header('Content-type: ' . $file->mimetype);
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($image_thumb)) . ' GMT');
		ob_clean();
		echo file_get_contents($image_thumb);
		exit();

	}
	public function files($type='',$a='',$b='',$c='',$d='')
	{
		$avail_kontens = array('thumb','large','404');

		if(in_array($type, $avail_kontens)){
			$method = str_replace('-','_', $type);
			return $this->{$method}($a,$b,$c,$d);
		}
	}
	public function _show_404()
	{
		$file_no_image = FCPATH . 'public/assets/themes/images/no-image.png';
		header('Content-type: ' . 'image/png');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file_no_image)) . ' GMT');
		ob_clean();
		echo file_get_contents($file_no_image);
		// echo file_exists($file_no_image);
		die();
	}
	
	
	public function large($encrypted_path='',$width = NULL, $height = NULL, $mode = NULL)
	{
		return $this->thumb($encrypted_path, $width, $height, $mode);
	}
}