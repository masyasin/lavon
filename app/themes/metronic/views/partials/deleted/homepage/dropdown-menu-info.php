<div class="row row-no-gutter dropdown-menu menu-five" id="ddi_info">
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
          <img class="img-responsive lazy" v-bind:data-src="'{{ base_url }}files/thumb/'+item.image+'/300/225'" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
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
$menu_info  = ci_config_item('menu_info');

$id_menu = bkpp_m('get_info_dinas_menu_list',3);
$tab_contents = array();

foreach ($id_menu as $id) {
  $tab_contents[] = array(
    'title' => $id['judul'],
    'link'  => 'informasi/info-dinas/' . $id['slug'],
    'image' => my_simple_crypt('public/assets/uploads/files/info_dinas/' . $id['gambar'],'e'),
    'image_alt' => $id['gambar']
  );
}
$menu_info['tabs'][0]['contents'] = $tab_contents;

/*-----------------------------------------------------------------------------------------*/
$agk_menu = bkpp_m('get_agenda_kegiatan_menu_list',3);
$tab_contents = array();

foreach ($agk_menu as $ak) {
  $tab_contents[] = array(
    'title' => substr($ak['judul'],0,80),
    'link'  => 'informasi/agenda-kegiatan/' . $ak['slug'],
    'image' => my_simple_crypt('public/assets/uploads/files/agenda_kegiatan/'.  $ak['gambar'],'e'),
    'image_alt' => $ak['gambar']
  );
}
$menu_info['tabs'][1]['contents'] = $tab_contents;

?>
<script type="text/javascript">
  $(document).ready(function(){


    var menu_info = <?= json_encode($menu_info) ?>

    new Vue({
      el:'#ddi_info',
      data: {
        menu : menu_info
      }
    });
  });
</script>
