<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Library to wrap Twig layout engine. Originally from Bennet Matschullat.
 * Code cleaned up to CodeIgniter standards by Erik Torsner
 *
 * PHP Version 5.3
 *
 * @category Layout
 * @package  Twig
 * @author   Bennet Matschullat <bennet@3mweb.de>
 * @author   Erik Torsner <erik@torgesta.com>
 * @license  Don't be a dick http://www.dbad-license.org/
 * @link     https://github.com/bmatschullat/Twig-Codeigniter
 */

/**
 * Main (and only) class for the Twig wrapper library
 * 
 * @category Layout
 * @package  Twig
 * @author   Bennet Matschullat <hello@bennet-matschullat.com>
 * @author   Erik Torsner <erik@torgesta.com>
 * @license  Don't be a dick http://www.dbad-license.org/
 * @link     https://github.com/bmatschullat/Twig-Codeigniter
 */
class Twig {
    const 		TWIG_CONFIG_FILE = 'twig';

	/**
	 * Path to templates. Usually application/views.
	 * 
	 * @var string
	 */
	protected $template_dir;

	/**
	 * Path to cache.  Usually applcation/cache.
	 * 
	 * @var string
	 */
	protected $cache_dir;

	/**
	 * Reference to code CodeIgniter instance.
	 * 
	 * @var CodeIgniter object
	 */
	private $_ci;

	/**
	 * Twig environment see http://twig.sensiolabs.org/api/v1.8.1/Twig_Environment.html.
	 * 
	 * @var Twig_Envoronment object
	 */
	private $_twig_env;

	/**
	 * constructor of twig ci class
	 */
	public function __construct() 
	{
		$this->_ci = & get_instance();
		$this->_ci->config->load(self::TWIG_CONFIG_FILE); // load config file
		// set include path for twig
		// ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'third_party/Twig/lib/Twig');
		// require_once (string)'Autoloader.php';
		// register autoloader
		//Twig_Autoloader::register();
		log_message('debug', 'twig autoloader loaded');
		// init paths
		$template_dir = $this->_ci->config->item('twig_template_dir');
		$cache_dir = $this->_ci->config->item('twig_cache_dir');
		// load environment
		$loader = new Twig_Loader_Filesystem($template_dir);
		$this->_twig_env = new Twig_Environment($loader, array(
			'cache' => $cache_dir,
			'auto_reload' => TRUE));
		$this->ci_function_init();
	}
	public function getEnv(){
		return $this->_twig_env;
	}
	/**
	 * render a twig template file
	 * 
	 * @param string  $template template name
	 * @param array   $data	    contains all varnames
	 * @param boolean $render   render or return raw?
	 *
	 * @return void
	 * 
	 */
	public function render($template, $data = array(), $render = TRUE) 
	{
		$template = $this->_twig_env->loadTemplate($template);
		log_message('debug', 'twig template loaded');
		return ($render) ? $template->render($data) : $template;
	}

	/**
	 * Execute the template and send to CI output
	 * 
	 * @param string $template Name of template
	 * @param array  $data     Parameters for template
	 * 
	 * @return void
	 * 
	 */
	public function display($template, $data = array()) 
	{
		$template = $this->_twig_env->loadTemplate($template);
		$this->_ci->output->set_output($template->render($data));
	}

	/**
	 * Entry point for controllers (and the likes) to register
	 * callback functions to be used from Twig templates
	 * 
	 * @param string                 $name     name of function
	 * @param Twig_FunctionInterface $function Function pointer
	 * 
	 * @return void
	 * 
	 */
	public function register_function($name, Twig_FunctionInterface $function) 
	{
		$this->_twig_env->addFunction($name, $function);
	}

	/**
	 * Initialize standard CI functions
	 * 
	 * @return void
	 */
	public function ci_function_init() 
	{
		$this->_twig_env->addFunction(new Twig_SimpleFunction('base_url',function($path){
			return base_url($path);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('site_url',function($path){
			return site_url($path);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('current_url',function($path){
			return current_url();
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_datepicker',function($date){
			return format_datepicker($date);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_tanggal_khusus_indo',function($date){
			if($date == false)
				$date = date('Y-m-d');
			return format_tanggal_khusus_indo($date);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_tanggal',function($date){
			return format_tanggal($date);
		}));
		
		$this->_twig_env->addFunction(new Twig_SimpleFunction('nl2br',function($date){
			return nl2br($date);
		}));

		$this->_twig_env->addFunction(new Twig_SimpleFunction('count',function($date){
			return count($date);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('form_dropdown',function($a,$b,$c,$d){
			return form_dropdown($a,$b,$c,$d);
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_jam_2',function($a ){
			return format_jam_2($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_tanggal_hari',function($a ){
			return format_tanggal_hari($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('round',function($a ){
			return round($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_tanggal_khusus',function($a ){
			return format_tanggal_khusus($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('convert_number',function($a ){
			return convert_number($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_uang',function($a ){
			return convert_number($a );
		}));

		$this->_twig_env->addFunction(new Twig_SimpleFunction('slugify',function($a ){
			return slugify($a );
		}));

		$this->_twig_env->addFunction(new Twig_SimpleFunction('cklen',function($a ,$len){
			$slen = strlen($a);

			if($slen > $len){
				return substr($a, 0,$len) ;
			}
			return $a;
		}));

		$this->_twig_env->addFunction(new Twig_SimpleFunction('underscorize',function($a ){
			return underscorize($a );
		}));
		
		$this->_twig_env->addFunction(new Twig_SimpleFunction('menu_token',function($a ){
			return menu_token($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('format_uang',function($a ){
			return format_uang($a );
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('s_encrypt',function($a ){
			return my_simple_crypt($a ,'e');
		}));
		$this->_twig_env->addFunction(new Twig_SimpleFunction('s_decrypt',function($a ){
			return my_simple_crypt($a ,'d');
		}));

		$this->_twig_env->addFunction(new Twig_SimpleFunction('gravatar_url',function($a,$s=32 ){
			return 'http://www.gravatar.com/avatar/'.md5($a).'?s='.$s.'&r=pg&d=identicon';
		}));
		//gravatar_url
		// form functions
		// $this->_twig_env->addFunction('form_open', new Twig_Function_Function('form_open'));
		// $this->_twig_env->addFunction('form_hidden', new Twig_Function_Function('form_hidden'));
		// $this->_twig_env->addFunction('form_input', new Twig_Function_Function('form_input'));
		// $this->_twig_env->addFunction('form_password', new Twig_Function_Function('form_password'));
		// $this->_twig_env->addFunction('form_upload', new Twig_Function_Function('form_upload'));
		// $this->_twig_env->addFunction('form_textarea', new Twig_Function_Function('form_textarea'));
		// $this->_twig_env->addFunction('form_dropdown', new Twig_Function_Function('form_dropdown'));
		// $this->_twig_env->addFunction('form_multiselect', new Twig_Function_Function('form_multiselect'));
		// $this->_twig_env->addFunction('form_fieldset', new Twig_Function_Function('form_fieldset'));
		// $this->_twig_env->addFunction('form_fieldset_close', new Twig_Function_Function('form_fieldset_close'));
		// $this->_twig_env->addFunction('form_checkbox', new Twig_Function_Function('form_checkbox'));
		// $this->_twig_env->addFunction('form_radio', new Twig_Function_Function('form_radio'));
		// $this->_twig_env->addFunction('form_submit', new Twig_Function_Function('form_submit'));
		// $this->_twig_env->addFunction('form_label', new Twig_Function_Function('form_label'));
		// $this->_twig_env->addFunction('form_reset', new Twig_Function_Function('form_reset'));
		// $this->_twig_env->addFunction('form_button', new Twig_Function_Function('form_button'));
		// $this->_twig_env->addFunction('form_close', new Twig_Function_Function('form_close'));
		// $this->_twig_env->addFunction('form_prep', new Twig_Function_Function('form_prep'));
		// $this->_twig_env->addFunction('set_value', new Twig_Function_Function('set_value'));
		// $this->_twig_env->addFunction('set_select', new Twig_Function_Function('set_select'));
		// $this->_twig_env->addFunction('set_checkbox', new Twig_Function_Function('set_checkbox'));
		// $this->_twig_env->addFunction('set_radio', new Twig_Function_Function('set_radio'));
		// $this->_twig_env->addFunction('form_open_multipart', new Twig_Function_Function('form_open_multipart'));
	}
}

/* End of file Twig.php */
/* Location: ./libraries/Twig.php */
