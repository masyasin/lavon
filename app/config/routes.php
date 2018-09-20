<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'main';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
*/


$route['files/(:any)/(:any)'] 					= 'www_static/files/$1/$2';
$route['files/(:any)/(:any)/(:any)'] 			= 'www_static/files/$1/$2/$3';
$route['files/(:any)/(:any)/(:any)/(:any)'] 	= 'www_static/files/$1/$2/$3/$4';
$route['files/(:any)/(:any)/(:any)/(:any)/(:any)'] 	= 'www_static/files/$1/$2/$3/$4/$5';

$route['profile'] 		= 'homepage/profile';
$route['profile/(:any)'] 		= 'homepage/profile/$1';
$route['profile/(:any)/(:any)'] = 'homepage/profile/$1/$2';

$route['layanan'] 		= 'homepage/layanan';
$route['layanan/(:any)'] 		= 'homepage/layanan/$1';
$route['layanan/(:any)/(:any)'] = 'homepage/layanan/$1/$2';

$route['konten/(:any)'] 					= 'homepage/konten/$1';
$route['konten/(:any)/(:any)'] 					= 'homepage/konten/$1/$2';
$route['konten/(:any)/(:any)/(:any)'] 			= 'homepage/konten/$1/$2/$3';
$route['konten/(:any)/(:any)/(:any)/(:any)'] 	= 'homepage/konten/$1/$2/$3/$4';

$route['informasi/(:any)'] 					= 'homepage/informasi/$1';
$route['informasi/(:any)/(:any)'] 					= 'homepage/informasi/$1/$2';
$route['informasi/(:any)/(:any)/(:any)'] 			= 'homepage/informasi/$1/$2/$3';
$route['informasi/(:any)/(:any)/(:any)/(:any)'] 	= 'homepage/informasi/$1/$2/$3/$4';

$route['informasi'] 	= 'homepage/informasi';

$route['buku-tamu'] 	= 'homepage/buku-tamu';
$route['pencarian'] 	= 'homepage/pencarian';
$route['konsultasi'] 	= 'homepage/konsultasi';

$route['admin/image-slider'] 				= 'admin/image_slider';
$route['admin/image-slider(:any)'] 			= 'admin/image_slider/$1';
$route['admin/image-slider(:any)/(:any)'] 	= 'admin/image_slider/$1/$2';
$route['admin/image-slider(:any)/(:any)/(:any)'] 	= 'admin/image_slider/$1/$2/$3';
$route['admin/image-slider(:any)/(:any)/(:any)/(:any)'] 	= 'admin/image_slider/$1/$2/$3/$4';

$route['admin/download'] 				= 'admin/download';
$route['admin/download(:any)'] 			= 'admin/download/$1';
$route['admin/download(:any)/(:any)'] 	= 'admin/download/$1/$2';
$route['admin/download(:any)/(:any)/(:any)'] 	= 'admin/download/$1/$2/$3';
$route['admin/download(:any)/(:any)/(:any)/(:any)'] 	= 'admin/download/$1/$2/$3/$4';

$route['admin/artikel'] 				= 'admin/artikel';
$route['admin/artikel(:any)'] 			= 'admin/artikel/$1';
$route['admin/artikel(:any)/(:any)'] 	= 'admin/artikel/$1/$2';
$route['admin/artikel(:any)/(:any)/(:any)'] 	= 'admin/artikel/$1/$2/$3';
$route['admin/artikel(:any)/(:any)/(:any)/(:any)'] 	= 'admin/artikel/$1/$2/$3/$4';

$route['admin/galeri'] 				= 'admin/galeri';
$route['admin/galeri(:any)'] 			= 'admin/galeri/$1';
$route['admin/galeri(:any)/(:any)'] 	= 'admin/galeri/$1/$2';
$route['admin/galeri(:any)/(:any)/(:any)'] 	= 'admin/galeri/$1/$2/$3';
$route['admin/galeri(:any)/(:any)/(:any)/(:any)'] 	= 'admin/galeri/$1/$2/$3/$4';

$route['admin/video'] 				= 'admin/video';
$route['admin/video(:any)'] 			= 'admin/video/$1';
$route['admin/video(:any)/(:any)'] 	= 'admin/video/$1/$2';
$route['admin/video(:any)/(:any)/(:any)'] 	= 'admin/video/$1/$2/$3';
$route['admin/video(:any)/(:any)/(:any)/(:any)'] 	= 'admin/video/$1/$2/$3/$4';

$route['admin/polling'] 				= 'admin/polling';
$route['admin/polling(:any)'] 			= 'admin/polling/$1';
$route['admin/polling(:any)/(:any)'] 	= 'admin/polling/$1/$2';
$route['admin/polling(:any)/(:any)/(:any)'] 	= 'admin/polling/$1/$2/$3';
$route['admin/polling(:any)/(:any)/(:any)/(:any)'] 	= 'admin/polling/$1/$2/$3/$4';

$route['admin/links'] 				= 'admin/links';
$route['admin/links(:any)'] 			= 'admin/links/$1';
$route['admin/links(:any)/(:any)'] 	= 'admin/links/$1/$2';
$route['admin/links(:any)/(:any)/(:any)'] 	= 'admin/links/$1/$2/$3';
$route['admin/links(:any)/(:any)/(:any)/(:any)'] 	= 'admin/links/$1/$2/$3/$4';

$route['admin/bkpp/konsultasi'] 				= 'admin/bkpp/konsultasi';
$route['admin/bkpp/konsultasi(:any)'] 			= 'admin/bkpp/konsultasi/$1';
$route['admin/bkpp/konsultasi(:any)/(:any)'] 	= 'admin/bkpp/konsultasi/$1/$2';
$route['admin/bkpp/konsultasi(:any)/(:any)/(:any)'] 	= 'admin/bkpp/konsultasi/$1/$2/$3';
$route['admin/bkpp/konsultasi(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/konsultasi/$1/$2/$3/$4';

$route['admin/bkpp/buku-tamu'] 				= 'admin/bkpp/buku_tamu';
$route['admin/bkpp/buku-tamu(:any)'] 			= 'admin/bkpp/buku_tamu/$1';
$route['admin/bkpp/buku-tamu(:any)/(:any)'] 	= 'admin/bkpp/buku_tamu/$1/$2';
$route['admin/bkpp/buku-tamu(:any)/(:any)/(:any)'] 	= 'admin/bkpp/buku_tamu/$1/$2/$3';
$route['admin/bkpp/buku-tamu(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/buku_tamu/$1/$2/$3/$4';

$route['admin/bkpp/agenda'] 				= 'admin/bkpp/agenda';
$route['admin/bkpp/agenda(:any)'] 			= 'admin/bkpp/agenda/$1';
$route['admin/bkpp/agenda(:any)/(:any)'] 	= 'admin/bkpp/agenda/$1/$2';
$route['admin/bkpp/agenda(:any)/(:any)/(:any)'] 	= 'admin/bkpp/agenda/$1/$2/$3';
$route['admin/bkpp/agenda(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/agenda/$1/$2/$3/$4';

$route['admin/bkpp/info-dinas'] 				= 'admin/bkpp/info_dinas';
$route['admin/bkpp/info-dinas(:any)'] 			= 'admin/bkpp/info_dinas/$1';
$route['admin/bkpp/info-dinas(:any)/(:any)'] 	= 'admin/bkpp/info_dinas/$1/$2';
$route['admin/bkpp/info-dinas(:any)/(:any)/(:any)'] 	= 'admin/bkpp/info_dinas/$1/$2/$3';
$route['admin/bkpp/info-dinas(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/info_dinas/$1/$2/$3/$4';

$route['admin/bkpp/profile'] 				= 'admin/bkpp/profile';
$route['admin/bkpp/profile(:any)'] 			= 'admin/bkpp/profile/$1';
$route['admin/bkpp/profile(:any)/(:any)'] 	= 'admin/bkpp/profile/$1/$2';
$route['admin/bkpp/profile(:any)/(:any)/(:any)'] 	= 'admin/bkpp/profile/$1/$2/$3';
$route['admin/bkpp/profile(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/profile/$1/$2/$3/$4';

$route['admin/bkpp/layanan'] 				= 'admin/bkpp/layanan';
$route['admin/bkpp/layanan(:any)'] 			= 'admin/bkpp/layanan/$1';
$route['admin/bkpp/layanan(:any)/(:any)'] 	= 'admin/bkpp/layanan/$1/$2';
$route['admin/bkpp/layanan(:any)/(:any)/(:any)'] 	= 'admin/bkpp/layanan/$1/$2/$3';
$route['admin/bkpp/layanan(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/layanan/$1/$2/$3/$4';

$route['admin/bkpp/pengumuman'] 				= 'admin/bkpp/pengumuman';
$route['admin/bkpp/pengumuman(:any)'] 			= 'admin/bkpp/pengumuman/$1';
$route['admin/bkpp/pengumuman(:any)/(:any)'] 	= 'admin/bkpp/pengumuman/$1/$2';
$route['admin/bkpp/pengumuman(:any)/(:any)/(:any)'] 	= 'admin/bkpp/pengumuman/$1/$2/$3';
$route['admin/bkpp/pengumuman(:any)/(:any)/(:any)/(:any)'] 	= 'admin/bkpp/pengumuman/$1/$2/$3/$4';

$route['default_controller'] = 'homepage/beranda';
$route['404_override'] = '';

$route['admin/pengaturan/situs'] = "main/config";
$route['admin/dashboard'] = "main/management";
$route['login'] = "main/login";
