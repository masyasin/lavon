<nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <img class="navbar-brand-logo" src="<?php echo site_url('assets/themes');?>/images/bkpp-tangsel.png" title="Remark">
      </div>
      <!-- <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button> -->
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
     
         
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
      
       <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?php echo site_url('assets/themes');?>/global/portraits/5.jpg" alt="...">
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
              </li>
              
              <li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
              </li>
              <li class="divider" role="presentation"></li>
              <li role="presentation">
                <a href="<?php echo site_url('main/logout')?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </li>
            </ul>
          </li> 
          
          
        </ul>
        <!-- End Navbar Toolbar Right -->

        <div class="navbar-brand navbar-brand-center">
          <a href="<?php echo site_url('assets/themes/center');?>/index-2.html">
            <img class="navbar-brand-logo" src="<?php echo site_url('assets/themes');?>/images/bkpp.png" title="Remark">
          </a>
        </div>
      </div>
      <!-- End Navbar Collapse -->

      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-header">
      <div class="cover overlay">
        <img class="cover-image" src="<?php echo site_url('assets/themes/center');?>/assets/examples/images/dashboard-header.jpg" alt="...">
        <div class="overlay-panel vertical-align overlay-background">
          <div class="vertical-align-middle">
            <a class="avatar avatar-lg" href="javascript:void(0)">
              <img src="<?php echo site_url('assets/themes');?>/global/portraits/1.jpg" alt="">
            </a>
            <div class="site-menubar-info">
              <h5 class="site-menubar-user"><?php echo $this->m_cms->cms_user_real_name()?></h5>
              <p class="site-menubar-email"><?php echo $this->m_cms->cms_user_email()?></p>
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
              <a href="<?php echo site_url('main/management')?>">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                <!-- <div class="site-menu-badge">
                  <span class="badge badge-success">3</span>
                </div> -->
              </a>
            
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Konten</span>
                <span class="site-menu-arrow"></span>
              </a>

              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/comments')?>">
                    <span class="site-menu-title">Komentar</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/blog')?>">
                    <span class="site-menu-title">Download</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/blog')?>">
                    <span class="site-menu-title">Berita</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/galeri')?>">
                    <span class="site-menu-title">Galeri</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">BKPP</span>
                <span class="site-menu-arrow"></span>
              </a>

              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/konsultasi')?>">
                    <span class="site-menu-title">Konsultasi</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/agenda')?>">
                    <span class="site-menu-title">Agenda</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/buku_tamu')?>">
                    <span class="site-menu-title">Buku Tamu</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/informasi')?>">
                    <span class="site-menu-title">Informasi</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/event')?>">
                    <span class="site-menu-title">Event</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/profile')?>">
                    <span class="site-menu-title">Profil</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/layanan')?>">
                    <span class="site-menu-title">Layanan</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/bkpp/tupoksi')?>">
                    <span class="site-menu-title">Tupoksi</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Pengaturan</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/navigation')?>">
                    <span class="site-menu-title">Menu</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/config')?>">
                    <span class="site-menu-title">Situs</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/group')?>">
                    <span class="site-menu-title">Group</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-user-trigger">
                  <a href="<?php echo site_url('main/user')?>">
                    <span class="site-menu-title">User</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/privilege')?>">
                    <span class="site-menu-title">Role</span>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Management</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/module_management')?>">
                    <span class="site-menu-title">Modules</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/widget')?>">
                    <span class="site-menu-title">Widget</span>
                  </a>
                </li>
                <li class="site-menu-item hidden-xs site-group-trigger">
                  <a href="<?php echo site_url('main/layout')?>">
                    <span class="site-menu-title">Layout</span>
                  </a>
                </li>
              </ul>
            </li>    
          </ul>
        </div>
      </div>
    </div>
  </div>
