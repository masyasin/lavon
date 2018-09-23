<div class="row row-no-gutter dropdown-menu menu-two" id="ddi_profile">
  <div class="submenu col-md-3">
    <ul>
      <li v-for="tab in menu.tabs" v-bind:class="{ 'active': $index == 0 }">
        <a href="javascript:void(0)">{{{ tab.title }}}</a>
      </li>
    </ul>
  </div>
  <div class="submenu-content col-md-9 row">
    <div class="thumbs-content" v-for="tab in menu.tabs" v-bind:class="{ 'active': $index == 0 }">
      <figure class="thumb col-md-4" v-for="item in tab.contents" v-if="tab.type == '3c'">
        <a href="{{ base_url }}{{ item.link }}">
          <img class="img-responsive lazy" v-bind:data-src="'{{ base_url }}public/assets/themes/images/'+item.image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="  alt="{{item.image_alt}}">
          <figcaption>{{{ item.title }}}</figcaption>
        </a>
      </figure>
      <div v-for="item in tab.contents" v-if="tab.type == '1c'">
        {{{ item.html }}}
      </div>
      
    </div>
  
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var menu_profile = <?= json_encode(ci_config_item('menu_profile')) ?>

    new Vue({
      el:'#ddi_profile',
      data: {
        menu : menu_profile
      }
    });
  });
</script>