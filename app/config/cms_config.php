<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['cms_table_prefix'] = '';
$config['max_menu_depth'] = 10;

$config['site_language'] = 'indonesian';
$config['site_theme'] = 'neutral';
$config['cms_google_analytic_property_id'] = '';
$config['site_favicon'] = '{{ base_url }}public/assets/themes/favicon/favicon.png';
$config['site_footer'] = 'Situs BKPP Tangerang © 2017';
$config['site_logo'] = '{{ base_url }}public/assets/themes/favicon/favicon.png';
$config['site_name'] = 'BKPP';
$config['site_slogan'] = 'BKPP Tangerang Selatan';
$config['site_layout'] = 'default';
$config['cms_email_reply_address'] = 'no-reply@bkpp.tangerangselatan.go.id';
$config['cms_email_forgot_subject'] = 'Re-activate your account at BKPP';
$config['cms_email_bcc_batch_mode'] = 'FALSE';
$config['image_cache_dir'] = 'public/assets/caches/';
$config['konsultan_group'] = array(4,11,12,5,9,15,18,14,17,86,6 );
$config['subject_konsultasi'] = array(
	''  => '-- PILIH BAGIAN/SUB/SEKSI --',
	'4' => 'Seksi Program dan Pengembangan',
	'11' => 'Seksi Pengangkatan dan Pemindahan',
	'12' => 'Seksi Kepangkatan dan Pemberhentian',
	'5' => 'Subbagian Umum, Kepegawaian dan Keuangan',
	'9' => 'Seksi Data dan Informasi',
	'15' => 'Seksi Manajemen Kinerja',
	//'8' => 'Seksi Formasi',
	'18' => 'Seksi Teknis dan Fungsional',
	'14' => 'Seksi Pembinaan',
	'17' => 'Seksi Penjenjangan dan Manajemen ',
	'6' => 'Subbagian Perencanaan',
	'86'=>'Seksi Perencanaan dan Formasi'

);

$config['share_ids'] = array(
	'facebook' => 1,
	'twitter' => 2,
);

$config['polling_data'] = array(
	'1'=>'Kurang Baik',	'2'=>'Cukup Baik','3'=>'Baik','4'=>'Sangat Baik','5'=>'Memuaskan','6'=>'Pelayanan Prima',
);