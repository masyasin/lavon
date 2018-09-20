<?= $this->template->load_view('partials/homepage/stop-press.php') ?>
<div class="container animsition">
    <div class="col-md-9 col-no-gutter">

<link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/magnific-popup/magnific-popup.min3f0d.css?v2.2.0">

  <script src="<?=site_url('public/assets/themes')?>/global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

     
      <?= empty($popup_session)?$this->template->load_view('partials/homepage/popup-image.php'):'' ?>
      <?= $this->template->load_view('partials/homepage/article-caraousel.php') ?>
      <br/>
      <section class="latest-topics listing col-md-7 col-lg-7 col-no-gutter" id="latestTopicL">
          <ul class="media-list main-list">
            <li class="media" v-for="article in articles">
              <a class="thumb pull-left" href="{{article.link}}">
              <img alt="{{article.image}}" class="media-object lazy" v-bind:data-src="article.imagurl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
              </a>
              <div class="media-body">
              <span class="date">
                <a href="{{article.category_link}}">
                {{article.category}}<i class="ic ic-paper"></i>
                </a>
              </span>
              <h4 class="media-heading"><a v-bind:href="article.link">{{article.title}}</a></h4>
              </div>
            </li>
          </ul>
        </section>



        <section class="latest-indepths col-sm-12 col-md-5 col-lg-5 col-no-gutter" id="latestTopicR">
          <div class="thumbnail col-sm-6 col-md-12" v-for="article in articles">
              <a href="{{article.category_link}}"><span class="label">{{article.category}}</span></a>
              <a href="{{article.link}}">
              <img class="pull-right lazy" v-bind:data-src="article.imagurl" alt="{{article.image}}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
              <div class="caption">
              <h4></h4>
              <h3>{{article.title}}</h3>
              </div>
              </a>
          </div>
        </section>  
      <!-- 7-section.php -->
      <br>
      <?= $this->template->load_view('partials/homepage/latest-video.php')?>
      <!-- 8-section.php -->
      <!-- 9-section.php -->
      <!-- 10-section.php -->
      <!-- 11-section.php -->
      
      <!-- 12-section.php -->

    </div>
    <div class="col-md-3 sidebar">

      <?= $this->template->load_view('partials/homepage/sidetabs-popular-posts.php')?>
      <br>
      <?= $this->template->load_view('partials/homepage/jadwal-sholat-container.php')?>
        <br>

      
      <?= $this->template->load_view('partials/homepage/polling.php')?>
      <br>
      <?= $this->template->load_view('partials/homepage/links.php')?>

      <br>
      <!-- 13-sidetabs.php -->
      
      
      
      <!-- 14-infografik.php -->
      <!-- 15-topic-hashtag.php -->
      <!-- 16-socialbox.php -->
    </div>
</div>

<?= $this->template->load_view('partials/homepage/latest-galeri.php')?>

<script type="text/javascript">
$(document).ready(function(){
   new Vue({
      el: '#latestTopicL',
      data: {
        articles : <?= json_encode($latest_posts['left'])?>
      }
   });

   new Vue({
      el: '#latestTopicR',
      data: {
        articles : <?= json_encode($latest_posts['right'])?>
      }
   }); 
});
</script>
<style type="text/css">
.mfp-zoom-out-cur{
  cursor: inherit;
}
  .mfp-bg.mfp-ready{
    display: none;
  }
  .sidebar .form-group{
    margin-left: 0;
    margin-right: 0;
  }
</style>