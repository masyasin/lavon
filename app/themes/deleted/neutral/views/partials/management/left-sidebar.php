<div class="site-menubar">
    <div class="site-menubar-header">
      <div class="cover overlay">
        <img class="cover-image" src="{{ base_url }}public/assets/themes/center/assets/examples/images/dashboard-header.jpg" alt="...">
        <div class="overlay-panel vertical-align overlay-background">
          <div class="vertical-align-middle">
            <a class="avatar avatar-lg" href="javascript:void(0)">
              <img src="<?=  'http://www.gravatar.com/avatar/'.md5($this->m_cms->cms_user_email()).'?s=32&r=pg&d=identicon'; ?>" alt="">
            </a>
            <div class="site-menubar-info">
              <h5 class="site-menubar-user"><?=  $this->m_cms->cms_user_real_name()?></h5>
              <p class="site-menubar-email"><?=  $this->m_cms->cms_user_email()?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-item active open">
              <a href="{{ base_url }}admin/dashboard">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                <!-- <div class="site-menu-badge">
                  <span class="badge badge-success">3</span>
                </div> -->
              </a>
            
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Konten</span>
                <span class="site-menu-arrow"></span>
              </a>

              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="{{ base_url }}admin/image-slider">
                    <span class="site-menu-title">Popup Image</span>
                  </a>
                </li>
                
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/artikel')?>">
                    <span class="site-menu-title">Artikel</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/download')?>">
                    <span class="site-menu-title">Download</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/galeri')?>">
                    <span class="site-menu-title">Galeri</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/video')?>">
                    <span class="site-menu-title">Video</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/polling')?>">
                    <span class="site-menu-title">Polling</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/links')?>">
                    <span class="site-menu-title">Links</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-desktop" aria-hidden="true"></i>
                <span class="site-menu-title">BKPP</span>
                <span class="site-menu-arrow"></span>
              </a>

              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/profile')?>">
                    <span class="site-menu-title">Profil</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/layanan')?>">
                    <span class="site-menu-title">Layanan</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/info-dinas')?>">
                    <span class="site-menu-title">Info Dinas</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/agenda')?>">
                    <span class="site-menu-title">Agenda</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/konsultasi')?>">
                    <span class="site-menu-title">Konsultasi</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/buku-tamu')?>">
                    <span class="site-menu-title">Buku Tamu</span>
                  </a>
                </li>
                
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('admin/bkpp/pengumuman')?>">
                    <span class="site-menu-title">Pengumuman</span>
                  </a>
                </li>
                
                
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                <span class="site-menu-title">Pengaturan</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/navigation')?>">
                    <span class="site-menu-title">Menu</span>
                  </a>
                </li>
				<li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/menu')?>">
                    <span class="site-menu-title">Admin Menu</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/config')?>">
                    <span class="site-menu-title">Situs</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/group')?>">
                    <span class="site-menu-title">Group</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-user-trigger">
                  <a href="<?=  site_url('main/user')?>">
                    <span class="site-menu-title">User</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/privilege')?>">
                    <span class="site-menu-title">Role</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?=  site_url('main/layout')?>">
                    <span class="site-menu-title">Layoutssss</span>
                  </a>
                </li>
              </ul>
            </li>
            
                
          </ul>
        </div>
      </div>
    </div>
  </div>