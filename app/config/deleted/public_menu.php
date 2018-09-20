<?php

$config['menu_info'] = array(
	'title' => 'Info',
	'hint'  => 'Info Dinas, Agenda',
	'link'  => 'informasi',
	'image' => '',

	'tabs' => array(
		array(
			'title' => 'Info Dinas',
			'link'  => 'informasi/info-dinas',
			'type'  => '3c',
			'contents' => array(
				
			)
		),
		array(
			'title' => 'Agenda Kegiatan',
			'link'  => 'informasi/agenda-kegiatan',
			'type'  => '3c',
			'contents' => array(
				
			)
		),
	)
);


$config['menu_konten'] = array(
	'title' => 'Konten',
	'hint'  => 'Artikel, Galeri, Unduh',
	'link'  => 'konten',
	'image' => '',

	'tabs' => array(
		array(
			'title' => 'Artikel',
			'link'  => 'konten/artikel',
			'type'  => '3c',
			'contents' => array(
				
			)
		),
		array(
			'title' => 'Galeri',
			'link'  => 'konten/galeri',
			'type'  => '3c',
			'contents' => array(
				
			)
		),
		array(
			'title' => 'Unduhan',
			'link'  => 'konten/download',
			'type'  => 'list',
			'contents' => array(
				
			)
		),
	)
);

$config['menu_layanan'] = array(
	'title' => 'Layanan',
	'hint'  => 'Jabatan &amp; Fungsional',
	'link'  => 'layanan',
	'image' => '',

	'tabs' => array(
		array(
			'title' => 'Layanan',
			'link'  => 'layanan',
			'type'  => 'list',
			'contents' => array(
				array('link' => 'layanan/bidang-pendayagunaan','title' => ' Bidang Pendayagunaan'),
				array('link' => 'layanan/bidang-mutasi','title' => ' Bidang Mutasi'),
				array('link' => 'layanan/bidang-pendidikan-dan-pelatihan','title' => ' Bidang Pendidikan dan Pelatihan'),
				array('link' => 'layanan/sekretariat','title' => ' Sekretariat'),
			)
		),
		array(
			'title' => 'Jabatan Fungsional',
			'link'  => 'layanan/jabatan-fungsional',
			'type'  => 'list',
			'contents' => array(
				array('link' => 'layanan/jabatan-fungsional/kelompok-jabatan-fungsional','title' => ' Kelompok Jabatan Fungsional'),
				array('link' => 'layanan/jabatan-fungsional/seksi-program-dan-pengembangan','title' => ' Seksi Program Dan Pengembangan'),
				array('link' => 'layanan/jabatan-fungsional/subbag-perencanaan','title' => ' Subbag Perencanaan'),
				array('link' => 'layanan/jabatan-fungsional/subbag-umum-kepegawaian-dan-keuangan','title' => ' Subbag Umum, Kepegawaian dan Keuangan'),
				array('link' => 'layanan/jabatan-fungsional/seksi-formasi','title' => ' Seksi Formasi'),
				array('link' => 'layanan/jabatan-fungsional/seksi-data-dan-informasi','title' => ' Seksi Data Dan Informasi'),

				array('link' => 'layanan/jabatan-fungsional/seksi-pengangkatan-dan-pemindahan','title' => 'Seksi Pengangkatan Dan Pemindahan'),
				array('link' => 'layanan/jabatan-fungsional/seksi-kepangkatan-dan-pemberhentian','title' => 'Seksi Kepangkatan dan Pemberhentian'),
				array('link' => 'layanan/jabatan-fungsional/seksi-pembinaan','title' => 'Seksi Pembinaan'),
				array('link' => 'layanan/jabatan-fungsional/seksi-manajemen-kinerja','title' => 'Seksi Manajemen Kinerja'),
				array('link' => 'layanan/jabatan-fungsional/seksi-penjenjangan-dan-manajemen','title' => 'Seksi Penjenjangan Dan Manajemen'),
				array('link' => 'layanan/jabatan-fungsional/seksi-teknis-dan-fungsional','title' => 'Seksi Teknis dan fungsional'),
			)
		),
	)
);
$config['menu_profile'] = array(
	'title' => 'Profile',
	'hint'  => 'Sejarah, Visi &amp; Misi',
	'link'  => 'profile',
	'image' => '',

	'tabs' => array(
		array(
			'title' => 'Profile',
			'link'  => 'profile',
			'type'  => '3c',
			'contents' => array(
				array(
					'title' => 'Profile Kota Tangerang Selatan',
					'image' => 'kantor-walikota-tangsel-thumb.jpg',
					'image_alt' => '',
					'link' => 'profile/kota-tangerang-selatan',

				),
				array(
					'title' => 'Sejarah Kota Tangerang Selatan',
					'image' => 'sejarah.jpg',
					'image_alt' => '',
					'link' => 'profile/sejarah-kota-tangerang-selatan',

				),
				array(
					'title' => 'Visi &amp; Misi',
					'image' => 'visi-misi.jpg',
					'image_alt' => '',
					'link' => 'profile/visi-dan-misi-kota-tangerang-selatan',

				),
			)
		),
		array(
			'title' => 'Tentang',
			'link'  => 'profile/tentang',
			'type'  => '3c',
			'contents' => array(
				array(
					'title' => 'Batas Wilayah Kota Tangerang Selatan',
					'image' => 'batas-wilayah.jpg',
					'image_alt' => '',
					'link' => 'profile/batas-wilayah-kota-tangerang-selatan',

				),
				array(
					'title' => 'Jumlah Penduduk Kota Tangerang Selatan',
					'image' => 'jumlah-penduduk.jpg',
					'image_alt' => '',
					'link' => 'profile/jumlah-penduduk-kota-tangerang-selatan',

				),
				array(
					'title' => 'Peta &amp; Demografis',
					'image' => 'peta-demografis.jpg',
					'image_alt' => '',
					'link' => 'profile/peta-demografis-kota-tangerang-selatan',

				),
			)
		),
		array(
			'title' => 'BKPP Kota TangSel',
			'link'  => 'profile/bkpp-tangsel',
			'type'  => '3c',
			'contents' => array(
				array(
					'title' => 'Pejabat BKPP Kota Tangerang Selatan',
					'image' => 'pejabat-bkpp.jpg',
					'image_alt' => '',
					'link' => 'profile/pejabat-bkpp-tangerang-selatan',

				),
				array(
					'title' => 'Tugas Pokok Dan Fungsi',
					'image' => 'tupoksi.jpg',
					'image_alt' => '',
					'link' => 'profile/tupoksi-bkpp-tangerang-selatan',

				),
				array(
					'title' => 'Struktur Organisasi',
					'image' => 'struktur-organisasi.jpg',
					'image_alt' => '',
					'link' => 'profile/struktur-organisasi-bkpp-tangerang-selatan',

				),
			)
		),
		array(
			'title'   => 'Kontak Kami',
			'link'    => 'profile/kontak',
			'type'    => '1c',
			'contents' => array(
				array(
					'html' => '<div class="menu-address-wrap">
    <h4 class="example-title">Alamat</h4>
    
    <address>
      <strong>Balai Kota Tangerang Selatan Gedung SKPD II Lt. I.</strong>
      <br> Jl. Maruga Raya No. 1 Serua
      <br> Ciputat Kota Tangerang 15414
      <br>
      <abbr title="Phone">P:</abbr> (021) 27598907
    </address>
    <address>
     
      Email : <a href="mailto:bkpp@tangerangselatankota.go.id">bkpp@tangerangselatankota.go.id</a>
    </address>
  </div>'
		
				)
			)
		)
	)
);