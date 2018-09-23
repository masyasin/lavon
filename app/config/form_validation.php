<?php

$config = array(
	'buku_tamu' => array(
		array('field' => 'nama','label'=>'Nama','rules'=>'required|min_length[4]'),
		array('field' => 'email','label'=>'Email','rules'=>'required|min_length[6]|valid_email'),
		array('field' => 'pesan','label'=>'Pesan','rules'=>'required|min_length[20]'),
	),
	'konsultasi' => array(
		array('field' => 'pengirim','label'=>'Nama','rules'=>'required|min_length[4]'),
		array('field' => 'untuk','label'=>'Kepada','rules'=>'required|min_length[1]'),
		array('field' => 'email','label'=>'Email','rules'=>'required|min_length[6]|valid_email'),
		array('field' => 'pertanyaan','label'=>'pertanyaan','rules'=>'required|min_length[20]'),
	),
	'push_polling' => array(
		array('field' => 'parent','label'=>'POLID','rules'=>'required|numeric'),
		array('field' => 'value','label'=>'POLV','rules'=>'required|numeric'),
	),
	'blog_comments' => array(
		array('field' => 'article_id','label'=>'AID','rules'=>'required|numeric'),
		array('field' => 'name','label'=>'Nama','rules'=>'required|min_length[4]'),
		array('field' => 'email','label'=>'Email','rules'=>'required|min_length[6]|valid_email'),
		array('field' => 'website','label'=>'Website','rules'=>'required|min_length[6]|valid_url'),
		array('field' => 'content','label'=>'Komentar','rules'=>'required|min_length[20]'),
	),
);