<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
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
 * @package     CodeIgniter
 * @author      EllisLab Dev Team
 * @copyright   Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license     http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link        http://codeigniter.com
 * @since       Version 1.0
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
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|   $route['default_controller'] = 'main';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
*/
$route['manajemen/unit-poin']               = 'manajemen/unit_poin';
$route['manajemen/unit-poin/(:any)']         = 'manajemen/unit_poin/$1';



$route['transaksi/histori-redeem-poin']               = 'transaksi/histori_redeem_poin';
$route['transaksi/histori-redeem-poin/(:any)']         = 'transaksi/histori_redeem_poin/$1';

$route['transaksi/histori-check-inout']               = 'transaksi/histori_check_inout';
$route['transaksi/histori-check-inout/(:any)']         = 'transaksi/histori_check_inout/$1';

$route['transaksi/histori-transaksi-poin']               = 'transaksi/histori_transaksi_poin';
$route['transaksi/histori-transaksi-poin/(:any)']         = 'transaksi/histori_transaksi_poin/$1';



$route['transaksi/fasilitas-unit']               = 'transaksi/fasilitas_unit';
$route['transaksi/fasilitas-unit/(:any)']         = 'transaksi/fasilitas_unit/$1';

$route['transaksi/redeem-poin']               = 'transaksi/redeem_poin';
$route['transaksi/redeem-poin/(:any)']         = 'transaksi/redeem_poin/$1';

$route['transaksi/details-card-numbers-fetch-unit-row-json']               = 'transaksi/details_card_numbers_fetch_unit_row_json';
$route['transaksi/details-card-numbers-fetch-unit-row-json/(:any)']         = 'transaksi/details_card_numbers_fetch_unit_row_json/$1';


$route['transaksi/details-card-numbers-save']               = 'transaksi/details_card_numbers_save';
$route['transaksi/details-card-numbers-save/(:any)']         = 'transaksi/details_card_numbers_save/$1';
$route['transaksi/details-card-numbers']               = 'transaksi/details_card_numbers';

$route['default_controller'] = 'dashboard';
