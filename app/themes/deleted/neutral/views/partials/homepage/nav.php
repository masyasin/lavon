<style type="text/css">
  .navbar-bkpp #navbar li.col-md-3.dropdown{
    max-height: 74.062px;
  }
  .navbar-toggle .icon-bar {

     background: #fff; 
}
#navbarMobile.navbar-collapse.in{
  overflow: inherit;
} 
.navbar-bkpp #navbarMobile .dropdown-menu li a{
  color: #fff;
}
.navbar-bkpp #navbarMobile .dropdown-menu li a:hover{
  text-decoration: underline;
}
.navbar-bkpp #navbarMobile .dropdown-menu{
  height: auto;
}
.nav>li>a:focus, .nav>li>a:hover{
  background-color: none !important;
}
</style>
<nav class="navbar navbar-bkpp" role="navigation">
  <div class="container">
    <div class="row wrapper">
      <div class="navbar-header col-md-2">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarMobile" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand ">
          <a href="{{ base_url }}" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ base_url }}{{ image_brand }}"  width="160" height="74" alt="{{ image_brand_alt }}" class="lazy"></a>
          <!-- dropdown-menu-brand -->
        </div>
      </div>
      <?=$this->template->load_view('partials/homepage/mobile-nav')?>
      <div class="menu col-md-10 row row-no-gutter">
        <div id="navbar" class="navbar-collapse collapse row">
          <ul class="nav navbar-nav col-md-10 row row-no-gutter">
            <li class="col-md-3 col-no-gutter dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Profile
                <span class="tags">Sejarah, Visi &amp; Misi</span>
                <span class="caret"></span>
                <span class="sr-only">(current)</span>
              </a>
              <?= $this->template->load_view('partials/homepage/dropdown-menu-profile.php')?>
            </li>
            <li class="col-md-3 dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Layanan
                <span class="tags">Jabatan &amp; Fungsional</span>
                <span class="caret"></span>
              </a>
              <?= $this->template->load_view('partials/homepage/dropdown-menu-layanan.php')?>
              
            </li>
            <li class="col-md-3 dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Konten
                <span class="tags">Artikel, Galeri, Download</span>
                <span class="caret"></span>
              </a>
               <?= $this->template->load_view('partials/homepage/dropdown-menu-konten.php')?>
            </li>
            <li class="col-md-3 dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Info
                <span class="tags">Info Dinas, Agenda</span>
                <span class="caret"></span>
              </a>
              <?= $this->template->load_view('partials/homepage/dropdown-menu-info.php')?>
            </li>
          </ul>
          <div class="search-toggle col-xs-12 col-md-2">
            
            <a href="{{ base_url }}konsultasi" class="link-indeks m-up"><i class="icon wb-emoticon" aria-hidden="true"></i> Konsultasi</a>
            <a href="{{ base_url }}buku-tamu" class="link-indeks"><i class="icon wb-library" aria-hidden="true"></i> Buku Tamu</a>
            <a href="javascript:void(0)" class="btn-search"><i class="wb icon wb-search" aria-hidden="true" data-toggle="collapse" data-target="#mainsearch"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="mainsearch" class="collapse out">
    <div class="container">
      <form class="navbar-form row" action="{{ base_url }}pencarian" method="post" role="search">
        <?=form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
        <div class="form-group col-md-10">
          <input type="text" name="q" class="form-control" placeholder="Cari di situs ini">
        </div>
        <div class="col-md-2 pull-right">
          <button type="submit" class="btn btn-default col-md-3">Cari</button>
        </div>
      </form>
    </div>
  </div>
</nav>

<style type="text/css">
  .navbar-bkpp .search-toggle a.link-indeks.m-up{
    bottom: 32px !important;
  }
  .navbar-bkpp .search-toggle a.link-indeks{
    bottom: 7px;
  }
  .navbar-bkpp .search-toggle .wb {
      line-height: 74px;
      margin-right: 10px;
  }
  .menu-address-wrap{
    padding: .5em 2em;
    background: #fff;
    color: #333;
  }
  .menu-address-wrap a{
    color: #333;
    text-transform: none;
  }
</style>