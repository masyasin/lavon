<div class="menu col-md-10 row row-no-gutter visible-xs">
        <div id="navbarMobile" class="navbar-collapse collapse row">
          <ul class="nav navbar-nav col-md-10 row row-no-gutter">
            <li class="col-md-3 col-no-gutter dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Profile
                <span class="tags">Sejarah, Visi &amp; Misi</span>
                <span class="caret"></span>
                <span class="sr-only">(current)</span>
              </a>
              <ul class="nav navbar-nav dropdown-menu">
                <? $menus = config_item('menu_profile');?>
                <? $tabs = $menus['tabs'];?>
                <?foreach($tabs[0]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
                <?foreach($tabs[1]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
                <?foreach($tabs[2]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
              </ul>
            </li>
            <li class="col-md-3 dropdown">
             <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Layanan
                <span class="tags">Jabatan &amp; Fungsional</span> 
				<span class="caret"></span>
                <span class="sr-only">(current)</span>
              </a> 
			  <ul class="nav navbar-nav dropdown-menu">
                <? $menus = config_item('menu_layanan');?>
                <? $tabs = $menus['tabs'];?>
                <?foreach($tabs[0]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
                <?foreach($tabs[1]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
                <?foreach($tabs[2]['contents'] as $item):?>
                  <li>
                    <a href="{{ base_url }}<?=$item['link']?>"><?=$item['title']?></a>
                  </li>
                <?endforeach?>
              </ul>
            </li>
            <li class="col-md-3 dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Konten
                <span class="tags">Artikel, Galeri, Download</span>
                <span class="caret"></span>
              </a>
              <ul class="nav navbar-nav dropdown-menu">
                <? $menus = config_item('menu_konten');?>
                <? $tabs = $menus['tabs'];?>
                <?foreach($tabs as $tab):?>
                  <li>
                    <a href="{{ base_url }}<?=$tab['link']?>"><?=$tab['title']?></a>
                  </li>
                <?endforeach?> 
              </ul>
            </li>
            <li class="col-md-3 dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Info
                <span class="tags">Info Dinas, Agenda</span>
                <span class="caret"></span>
              </a>
              <ul class="nav navbar-nav dropdown-menu">
                <? $menus = config_item('menu_info');?>
                <? $tabs = $menus['tabs'];?>
                <?foreach($tabs as $tab):?>
                  <li>
                    <a href="{{ base_url }}<?=$tab['link']?>"><?=$tab['title']?></a>
                  </li>
                <?endforeach?> 
              </ul>
            </li>
            <li class="col-md-3 dropdown">
              <a href="{{ base_url }}konsultasi" role="button" >
                Konsultasi
              </a> 
            </li><li class="col-md-3 dropdown">
              <a href="{{ base_url }}buku-tamu"  role="button">
                Buku Tamu
              </a> 
            </li>
            <li class="col-md-3 dropdown">
              <a href="{{ base_url }}pencarian"  role="button">
                Cari
              </a> 
            </li>
          </ul>
          
        </div>
      </div>