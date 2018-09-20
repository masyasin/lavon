
<section class="headline-news">
  <div id="bCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#bCarousel" 
          data-slide-to="{{ $index }}" 
          v-bind:class="{ 'active': $index == 0 }"
          v-for="a in articles">
        
      </li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <figure class="item"
              v-bind:class="{ 'active': $index == 0 }"
              v-for="a in articles">

        <a v-bind:href="a.link">
          <img v-bind:data-src="a.gambar" alt="{{ a.judul }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="960" height="640" class="lazy">
          <figcaption><h1 class="ca-title">{{{ a.judul }}}</h1></figcaption>
        </a>
       
      </figure>
      
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function(){
    new Vue({
      el:'#bCarousel',
      data:{
        articles: <?= json_encode($acd['rows'])?>        
      }
    });

   

  });
</script>
<style type="text/css">
  .ca-title{
    color: #fff !important;
  }
</style>