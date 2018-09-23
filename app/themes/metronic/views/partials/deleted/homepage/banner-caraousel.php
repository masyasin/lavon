
<section class="headline-news">
  <div id="bCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#bCarousel" 
          data-slide-to="{{ $index }}" 
          v-bind:class="{ 'active': $index == 0 }"
          v-for="b in banners">
        
      </li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <figure class="item"
              v-bind:class="{ 'active': $index == 0 }"
              v-for="b in banners">

        <a href="javascript:void(0)">
          <img v-bind:data-src="'{{ base_url }}files/thumb/'+ b.encrypted_image + '/960/640'" alt="{{ b.judul }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="960" height="640" class="lazy">
          <figcaption><h1 class="ca-title">{{{ b.judul }}}</h1></figcaption>
        </a>
        <!-- <ul class="tokoh light" id="tokoh1">
          <li>
            <a class="pic" href="{{ rel.link }}">
              <i class="likemeter-text">tiMeter: +{{ rel.share }}</i>
              <img src="{{ rel.image }}" onerror="this.onerror=null;this.src='{{ rel.image }}';" alt="rel.image_alt">
              <h5 class="name">{{ rel.title }}</h5>
            </a>
            <div class="likemeter">
              <div class="likemeter-bar"></div>
              <div class="likemeter-bar-arrow" style="top: -{{ rel.like }} %"><span></span></div>
            </div>
          </li>
         
        </ul> -->
      </figure>
      
    </div>
  </div>
</section>
<?
$banner_list = bkpp_m('get_banner','10');

?>
<script type="text/javascript">
  $(document).ready(function(){
    new Vue({
      el:'#bCarousel',
      data:{
        banners: <?= json_encode($banner_list)?>        
      }
    });

   

  });
</script>
<style type="text/css">
  .ca-title{
    color: #fff !important;
  }
</style>