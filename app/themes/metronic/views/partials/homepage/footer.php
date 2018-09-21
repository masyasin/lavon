<footer>
<div class="container">
  <div class="row" style="">
    <div class="nav col-md-2">
      <div class="menu">PROFILE</div>
      <ul>
        <li><a href="{{ base_url }}profile/kota-tangerang-selatan">Profile Tangsel</a></li>
    </div>
    <div class="nav col-md-2">
      <div class="menu">LAYANAN</div>
      <ul>
        <li><a href="{{ base_url }}layanan">Layanan</a></li>
      </ul>
    </div>
    <div class="nav col-md-2">
      <div class="menu">KONTEN</div>
      <ul>
        <li><a href="{{ base_url }}konten/artikel">Artikel</a></li> 
        <li><a href="{{ base_url }}konten/galeri">Galeri</a></li> 
        <li><a href="{{ base_url }}konten/download">Unduhan</a></li> 
      </ul>
    </div>
    <div class="nav col-md-2">
      <div class="menu">INFORMASI</div>
      <ul>
        <li><a href="{{ base_url }}informasi/info-dinas">Info Dinas</a></li> 
        <li><a href="{{ base_url }}informasi/agenda-kegiatan">Agenda Keg</a></li> 
      </ul>
    </div>
    <div class="nav col-md-2">
      <div class="menu">APLIKASI</div>
      <ul>
        <li><a href="{{ base_url }}buku-tamu">Buku Tamu</a></li>
        <li><a href="{{ base_url }}konsultasi">Konsultasi</a></li>
        <li><a href="{{ base_url }}pencarian">Pencarian</a></li>
      </ul>
    </div>
  </div>
  <hr style="border-color: #e0e0e0;">
  <div class="foot-menu">
    <a href="{{ base_url }}profile/tentang">TENTANG KAMI</a>
    <a href="{{ base_url }}profile/kontak">KONTAK KAMI</a>
  </div>
  <div class="copyright">&copy; <?=date('Y')?> {{ hostname }} - All Rights Reserved.</div>
</div>
</footer>

<style type="text/css">
  .foot-menu{
    display: none;
  }

</style>