
<ul class="blocks blocks-100 blocks-xlg-4 blocks-md-3 blocks-sm-2 hidden"  data-filterable="true"  id="glistpopup" >
        <li data-type="animal"  v-for="b in banners" v-bind:class="{'hidden':$index==0}">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img v-bind:data-src="'{{ base_url }}files/thumb/'+ b.encrypted_image + '/960/640'" alt="{{ b.judul }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="960" height="640" class="lazy">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" v-bind:href="'{{ base_url }}files/thumb/'+ b.encrypted_image + '/960/640'" v-bind:index="$index"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">{{b.judul}}</h4>
          </div>
        </li>
        
      </ul>

<?
$banner_list = bkpp_m('get_banner','10');

?>
<script type="text/javascript">
  $(document).ready(function(){
    new Vue({
      el:'#glistpopup',
      data:{
        banners: <?= json_encode($banner_list)?>        
      },ready:function(){
        this.$nextTick(function(){

$("#glistpopup .wb-search").magnificPopup({
            type: "image",
            closeOnContentClick: !0,
            //mainClass: "mfp-fade",
            // gallery: {
            //     enabled: !0,
            //     navigateByImgClick: !0,
            //     preload: [0, 1]
            // }
        });

          setTimeout(function(){
            $('a.icon[index=0]').click();
          },1000);
          
        });
      }
    });

   

  });
</script>
<style type="text/css">
  .ca-title{
    color: #fff !important;
  }
</style>