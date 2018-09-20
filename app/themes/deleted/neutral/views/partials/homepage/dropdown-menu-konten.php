<div class="row row-no-gutter dropdown-menu menu-four" id="ddi_konten">
  <div class="submenu col-md-3">
    <ul>
      <li v-for="tab in menu.tabs" v-bind:class="{ 'active': $index == 0 }">
        <a href="{{ base_url }}{{ tab.link }}">{{{ tab.title }}}</a>
      </li>
    </ul>
  </div>
  <div class="submenu-content col-md-9 row">
    <div class="thumbs-content" v-for="tab in menu.tabs" v-bind:class="{ 'active': $index == 0 }">
      <figure class="thumb col-md-4" v-for="item in tab.contents" v-if="tab.type == '3c'">
        <a href="{{ base_url }}{{ item.link }}">
          <img class="img-responsive lazy" v-bind:data-src="'{{ base_url }}files/thumb/'+item.image+'/300/225'" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="{{item.image_alt}}" class="lazy">
          <figcaption>{{{ item.title }}}</figcaption>
        </a>
      </figure>
      <div v-for="item in tab.contents" v-if="tab.type == '1c'">
        {{{ item.html }}}
      </div>
       <h2 class="tab-title"  v-if="tab.type == 'list'" >{{{tab.title}}}</h2>
      <div class="ucnt height-250" v-if="tab.type == 'list'" data-plugin="">
        <div data-role="container">
          <div data-role="content">  
            <ul class="list-icons white-bg tl lsr" >
              <li v-for="item in tab.contents" >
              <a href="{{ base_url }}{{item.link}}"><i class="icon wb-user" aria-hidden="true"></i> {{{ item.title }}}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>
<?
$menu_konten  = ci_config_item('menu_konten');

$artikel_menu = bkpp_m('get_article_menu_list',3);
$tab_contents = array();

foreach ($artikel_menu as $am) {
  $tab_contents[] = array(
    'title' => $am['article_title'],
    'link'  => 'konten/artikel/' . $am['article_url'],
    'image' => my_simple_crypt('public/assets/uploads/files/article_images/' . $am['alt_image'],'e'),
    'image_alt' => $am['alt_image']
  );
}
$menu_konten['tabs'][0]['contents'] = $tab_contents;

/*-----------------------------------------------------------------------------------------*/
$galeri_menu = bkpp_m('get_galeri_menu_list',3);
$tab_contents = array();

foreach ($galeri_menu as $gm) {
  $tab_contents[] = array(
    'title' => substr($gm['judul'],0,80),
    'link'  => 'konten/galeri/' . $gm['slug'],
    'image' => my_simple_crypt('public/assets/uploads/files/galery_images/'.underscorize($gm['slug']) .'/'. $gm['gambar'],'e'),
    'image_alt' => $gm['alt_image']
  );
}
$menu_konten['tabs'][1]['contents'] = $tab_contents;

/*-----------------------------------------------------------------------------------------*/
$download_menu = bkpp_m('get_download_menu_list',false);
$tab_contents = array();

foreach ($download_menu as $dm) {
  $tab_contents[] = array(
    'title' => substr($dm['judul'],0,60),
    'link'  => 'konten/download/' . my_simple_crypt($dm['id'],'e') . '/' . slugify($dm['judul']),
  );
}
$menu_konten['tabs'][2]['contents'] = $tab_contents;
?>
<script type="text/javascript">
  $(document).ready(function(){


    var menu_konten = <?= json_encode($menu_konten) ?>

    new Vue({
      el:'#ddi_konten',
      data: {
        menu : menu_konten
      }
    });
  });
</script>
