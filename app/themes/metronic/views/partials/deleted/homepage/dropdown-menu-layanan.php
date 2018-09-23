<div class="row row-no-gutter dropdown-menu menu-three" id="ddi_layanan">
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
          <img class="img-responsive lazy" v-bind:data-src="'{{ base_url }}public/assets/themes/images/'+item.image" alt="{{item.image_alt}}">
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

<script type="text/javascript">
  $(document).ready(function(){
    var menu_layanan = <?= json_encode(ci_config_item('menu_layanan')) ?>

    new Vue({
      el:'#ddi_layanan',
      data: {
        menu : menu_layanan
      }
    });
  });
</script>
