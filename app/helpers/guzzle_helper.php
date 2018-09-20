<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Cookie\FileCookieJar;
use GuzzleHttp\Cookie\SessionCookieJar;



function guzzle_ajax_http_headers($host, $ua = 'Android', $keep_alive = true){
	return array(
        'User-Agent'		=> $ua,
        'Host'				=> $host,
        'Connection'		=> 'keep-alive',
        'Accept-Encoding'	=> 'gzip, deflate, br',
        'Accept-Language'	=> 'en-US,en;q=0.8',
        'X-Requested-With'	=> 'XMLHttpRequest',
        // 'Content-Length' => '32'
	);
}

function guzzle_web_http_headers($host, $ua = 'Android'){
	return array(
        'User-Agent'		=> $ua,
        'Host'				=> $host,
        'Connection'		=> 'keep-alive',
        'Accept-Encoding'	=> 'gzip, deflate, br',
        'Accept-Language'	=> 'en-US,en;q=0.8',
	);
}


function guzzle_http_client($cookie_dir, $cookie_filename, $copy_cookie=false){
	$cookie_file_path = $cookie_dir . $cookie_filename;	
	
	if(file_exists($cookie_file_path)){
		$new_path = str_replace('.txt',date('dmYHis').'.txt',$cookie_file_path);
		if($copy_cookie){
			copy($cookie_file_path, $new_path);
		}
	}
	else{
		$new_path = $cookie_file_path;
	}
	if(!$copy_cookie){
		$new_path = $cookie_file_path;
	}
	$jar = new FileCookieJar($new_path, TRUE);
 	
 	$options = ['cookies' => $jar];

 	if(is_localserver()){
 		// $options['proxy'] = 'socks5://127.0.0.1:1080';
 	}
	return new Client($options);
}

function guzzle_fetch_http($url , $method='GET', $custom_headers=array(), $is_ajax = false, $debug = false){
 
	$http = guzzle_http_client();
	$orig_method_param = $method;
	if(is_array($method)){
		$method = array_keys($method);
		$method = $method[0];
	}
 	$host = parse_url($url, PHP_URL_HOST);
 	$ua   = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36';

	$options = array(
		'headers' => ($is_ajax? guzzle_ajax_http_headers($host,$ua,true) : guzzle_web_http_headers($host,$ua,true)), 
		'debug'   => $debug
	);

	$options['headers'] = array_merge($options['headers'],$custom_headers);


	if(is_array($orig_method_param)){
		if(is_array($orig_method_param[$method])){
			$form_data = $orig_method_param[$method];
			$options['form_params'] = $form_data;
		}
	}

	$http_response = $http->request($method, $url, $options);
	

	return $http_response;
}

function guzzle_http_client_request(&$http_client,$url , $method='GET', $custom_headers=array(), $is_ajax = false,  $debug = false){
 
 	$host = parse_url($url, PHP_URL_HOST);
 	$ua   = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36';

 	$orig_method_param = $method;
	if(is_array($method)){
		$method = array_keys($method);
		$method = $method[0];
	}
	$options = array(
		'headers' => ($is_ajax? guzzle_ajax_http_headers($host,$ua,true) : guzzle_web_http_headers($host,$ua,true)), 
		'debug'   => $debug
	);
	$options['headers'] = array_merge($options['headers'],$custom_headers);
	
	if(is_array($orig_method_param)){
		if(is_array($orig_method_param[$method])){
			$form_data = $orig_method_param[$method];
			$options['form_params'] = $form_data;
		}
	}
	try{
		$http_response = $http_client->request($method, $url, $options);

		return $http_response;
	}
	catch(Exception $e){
		return $e->getMessage();
	}

	return '';
	
}