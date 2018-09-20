<nav class=" navbar navbar-inverse navbar-fixed-top navbar-mega" role="navigation" id="topnav">
      <div class="container-fluid" style="padding: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle hamburger hamburger-close collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
          </button>
          <a href="<?php echo site_url('');?>" style="display: block;padding: 5px 8px;background: #fff;">
            <img class="navbar-brand-logo-homepage" src="{{ base_url }}public/assets/themes/images/navbar-brand.png" title="BKPP Tangsel">
          </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav" style="">
            <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Profile
              <i class="icon wb-triangle-down" aria-hidden="true"></i>
              <i class="icon wb-triangle-up" aria-hidden="true" style="display: none;"></i>
              <span class="tags">Sejarah, Visi &amp; Misi</span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <div class="mega-content">
                    
                    <div class="nav-tabs-vertical">
                      <ul class="nav nav-tabs " data-plugin="nav-tabs" role="tablist" data-toggle="tab-hover">
                        <li class="active" role="presentation"><a data-toggle="tab" href="#tabProfile" aria-controls="tabProfile" role="tab" aria-expanded="true">PROFILE</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" href="#tabTentang" aria-controls="tabTentang" role="tab" aria-expanded="false">Tentang</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" href="#tabBkpp" aria-controls="tabBkpp" role="tab" aria-expanded="false">BKPP Tangsel</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" href="#tabKontak" aria-controls="tabKontak" role="tab" aria-expanded="false">Kontak</a></li>
                        
                      </ul>
                      <div class="tab-content" style="">
                        <div class="tab-pane active" id="tabProfile" role="tabpanel">
                          <div class="submenu-content col-md-12 row">
                            <div class="thumbs-content">
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/kantor-walikota-tangsel-thumb.jpg" alt="">
                                  <figcaption>Profile Kota Tangerang Selatan</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/sejarah-kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/sejarah.jpg" alt="">
                                  <figcaption>Sejarah Kota Tangerang Selatan</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/visi-dan-misi-kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/visi-misi.jpg" alt="">
                                  <figcaption>Visi &amp; Misi</figcaption>
                                </a>
                              </figure>
                            </div>
                          </div>
                          
                        </div>
                        <div class="tab-pane" id="tabTentang" role="tabpanel">
                          <div class="submenu-content col-md-12 row">
                            <div class="thumbs-content">
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/batas-wilayah-kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/batas-wilayah.jpg" alt="">
                                  <figcaption>Batas Wilayah Kota Tangerang Selatan</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/jumlah-penduduk-kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/jumlah-penduduk.jpg" alt="">
                                  <figcaption>Jumlah Penduduk Kota Tangerang Selatan</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/peta-demografis-kota-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/peta-demografis.jpg" alt="">
                                  <figcaption>Peta &amp; Demografis</figcaption>
                                </a>
                              </figure>
                            </div>
                          </div>
                          
                        </div>
                        <div class="tab-pane" id="tabBkpp" role="tabpanel">
                          
                          <div class="submenu-content col-md-12 row">
                            <div class="thumbs-content">
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/pejabat-bkpp-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/pejabat-bkpp.jpg" alt="">
                                  <figcaption>Pejabat BKPP Kota Tangerang Selatan</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/tupoksi-bkpp-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/tupoksi.jpg" alt="">
                                  <figcaption>Tugas Pokok Dan Fungsi</figcaption>
                                </a>
                              </figure>
                              <figure class="thumb col-md-4">
                                <a href="<?=site_url('profile/struktur-organisasi-bkpp-tangerang-selatan')?>" class="selected">
                                  <img class="img-responsive" src="<?=site_url('public/assets/themes')?>/images/struktur-organisasi.jpg" alt="">
                                  <figcaption>Struktur Organisasi</figcaption>
                                </a>
                              </figure>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tabKontak" role="tabpanel">
                          <div class="m-content-bg" style="padding: 1px">
                            <div class="map-container">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7931.065830781413!2d106.673845!3d-6.324909!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8cd7b42c05bf5c91!2sKantor+BKPP+Kota+Tangerang+Selatan!5e0!3m2!1sen!2sus!4v1510851976408" width="100%" height="271px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </li>
              </ul>
            </li>
            
            <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Layanan <i class="icon wb-triangle-down" aria-hidden="true"></i><i class="icon wb-triangle-up" aria-hidden="true" style="display: none;"></i><span class="tags">Jabatan &amp; Fungsional</span></a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <div class="mega-content">
                  <div class="m-content-bg">
                    <div class="row" style="margin: 0">
                      <div class="col-xs-4 mcnone">
                        
                        <h4 class="example-title">Layanan</h4>
                        <ul class="list-icons">
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/bidang-pendayagunaan')?>">Bidang Pendayagunaan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/bidang-mutasi')?>">Bidang Mutasi</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/bidang-pendidikan-dan-pelatihan')?>">Bidang Pendidikan dan Pelatihan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/sekretariat')?>">Sekretariat</a></li>
                        </ul>
                        
                      </div>
                      <div class="col-xs-4 mcnone">
                        <h4 class="example-title">Jabatan &amp; Fungsional</h4>
                        <ul class="list-icons">
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/kelompok-jabatan-fungsional')?>">Kelompok Jabatan Fungsional</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-program-dan-pengembangan')?>">Seksi Program Dan Pengembangan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/subbag-perencanaan')?>">Subbag Perencanaan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/subbag-umum-kepegawaian-dan-keuangan')?>">Subbag Umum, Kepegawaian dan Keuangan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-formasi')?>">Seksi Formasi</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-data-dan-informasi')?>">Seksi Data Dan Informasi</a></li>
                        </ul>
                      </div>
                      <div class="col-xs-4 mcnone">
                        <h4 class="example-title">&nbsp;</h4>
                        <ul class="list-icons">
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-pengangkatan-dan-pemindahan')?>">Seksi Pengangkatan Dan Pemindahan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-kepangkatan-dan-pemberhentian')?>">Seksi Kepangkatan dan Pemberhentian</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-pembinaan')?>">Seksi Pembinaan</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-manajemen-kinerja')?>">Seksi Manajemen Kinerja</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-penjenjangan-dan-manajemen')?>">Seksi Penjenjangan Dan Manajemen</a></li>
                          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="<?=site_url('layanan/jabatan-fungsional/seksi-teknis-dan-fungsional')?>">Seksi Teknis dan fungsional</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            
            <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Konten <i class="icon wb-triangle-down" aria-hidden="true"></i><i class="icon wb-triangle-up" aria-hidden="true" style="display: none;"></i><span class="tags">Artikel, Galeri, Download</span></a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <div class="mega-content">
                  <div class="nav-tabs-vertical">
                    <ul class="nav nav-tabs " data-plugin="nav-tabs" role="tablist" data-toggle="tab-hover">
                      <li class="active" role="presentation"><a data-toggle="tab" href="#tabArtikel" aria-controls="tabArtikel" role="tab" aria-expanded="true">Artikel</a></li>
                      <li role="presentation" class=""><a data-toggle="tab" href="#tabGaleri" aria-controls="tabGaleri" role="tab" aria-expanded="false">Galeri</a></li>
                      <li role="presentation" class=""><a data-toggle="tab" href="#tabDownload" aria-controls="tabDownload" role="tab" aria-expanded="false">Download</a></li>
                      
                    </ul>
                    <div class="tab-content " style="">
                      <div class="tab-pane active" id="tabArtikel" role="tabpanel">
                        {{ widget_name:article_menu }}
                      </div>
                      <div class="tab-pane" id="tabGaleri" role="tabpanel">
                        {{ widget_name:galeri_menu }}
                      </div>
                      
                      <div class="tab-pane" id="tabDownload" role="tabpanel">
                        {{ widget_name:download_menu }}
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              </li>
            </ul>
          </li>
          
          <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Informasi <i class="icon wb-triangle-down" aria-hidden="true"></i><i class="icon wb-triangle-up" aria-hidden="true" style="display: none;"></i><span class="tags">Info Dinas, Agenda Kegiatan</span></a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <div class="mega-content">
                
                <div class="nav-tabs-vertical">
                  <ul class="nav nav-tabs " data-plugin="nav-tabs" role="tablist"  data-toggle="tab-hover">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#tabInfoDinas" aria-controls="tabInfoDinas" role="tab" aria-expanded="false">Info Dinas</a></li>
                    <li role="presentation" class=""><a data-toggle="tab" href="#tabAgendaKegiatan" aria-controls="tabAgendaKegiatan" role="tab" aria-expanded="false">Agenda Kegiatan</a></li>
                    
                  </ul>
                  <div class="tab-content" style="">
                    
                    <div class="tab-pane active" id="tabInfoDinas" role="tabpanel">
                      {{ widget_name:info_dinas_menu }}
                    </div>
                    
                    <div class="tab-pane" id="tabAgendaKegiatan" role="tabpanel">
                      {{ widget_name:agenda_kegiatan_menu }}
                    </div>
                  </div>
                </div>
                
              </div>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-toolbar" id="rMenu">
        <li>
          <a href="<?=site_url('pencarian')?>"><i class="icon wb-search" aria-hidden="true"></i> Pencarian</a>
          <a href="<?=site_url('buku-tamu')?>"><i class="icon wb-library" aria-hidden="true"></i> Buku Tamu</a>
          <a href="<?=site_url('konsultasi')?>"><i class="icon wb-emoticon" aria-hidden="true"></i> Konsultasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>