
<link rel="stylesheet" href="<?=site_url('public/assets/themes')?>/global/vendor/magnific-popup/magnific-popup.min3f0d.css?v2.2.0">

  <script src="<?=site_url('public/assets/themes')?>/global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>






<!--  -->

<script type="text/javascript" src="{{ base_url }}app/themes/neutral/assets/default/jquery.zoom.min.js"></script>
<div class="container animsition">
  <ol itemscope="" class="breadcrumbs" itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <a itemprop="item" href="{{ base_url }}">
        <span itemprop="name">HOME</span>
      </a>
      <meta itemprop="position" content="1">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <i class="fa fa-angle-right"></i>
      <a itemprop="item" href="{{ base_url }}konten/galeri">
        <span itemprop="name">GALERI</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter" id="glist">
    <article class="headline-news-single withsubtitle">
      <header>
        <h1 class="title"><?=$gi[0]['judul']?></h1>
      </header>
      <figure class="hero">
        
    
         <img class="img-responsive lazy" style="width:100%" 
              v-bind:data-src="items[0].big_thumb" 
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" 
              v-bind:alt="items[0].judul_gambar" 
              v-bind:title="items[0].judul_gambar">
        <figcaption>
        <b>{{items[0].judul_gambar}}</b><br>{{items[0].keterangan_gambar}}

          <div class="share-this-horizontal">
            <span class="totalcount"><?= share_counter_text() ?></span>
            <a href="javascript:void(0);" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
            <a href="javascript:void(0);" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
            <a href="mailto:?subject=<?=$layanan->judul?>&amp;body=<?=current_url()?>">
              <i class="fa fa-envelope"></i>
            </a>
          </div>
        </figcaption>
      </figure>
      <div class="row" style="display: none">
        <div class="meta-content col-md-12">
          
        </div>
        
        <div class="blurb col-md-12">
          
        </div>
      </div>
      <div class="blurb fullwidth">
      </div>
      <div class="content-text-editor">
        
 
      <ul class="blocks blocks-100 blocks-xlg-4 blocks-md-3 blocks-sm-2"  data-filterable="true" >
        <li data-type="animal" v-for="i in items" v-bind:class="{'hidden':$index==0}">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale lazy" v-bind:data-src="i.thumb" alt="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" v-bind:href="i.link" v-bind:index="$index"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">{{i.judul_gambar}}</h4>
          </div>
        </li>
        
      </ul>
  
      </div>
    </article>

<?if(!empty($related)):?>
  <section class="related-news berita-terkait">
    <h3 class="label-section">GALERI TERKAIT</h3>
    <hr>
    <ul class="row">
      <?foreach($related as $r):?>
      <li class="col-md-3">
        <a href="{{ base_url }}konten/galeri/<?=$r->slug?>" class="thumbnail">
          <img class="lazy img-responsive" data-src="<?=$r->thumb?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?=$r->judul?>">
          <h3><?=$r->judul?></h3>
        </a>
      </li>
      <?endforeach?>
    </ul>
  </section>
<?endif?>
  </div>
  
</div>
<div class="col-md-3 sidebar">
  <!-- 13-sidetabs.php -->
  <!-- 14-infografik.php -->
  <!-- 15-topic-hashtag.php -->
  <!-- 16-socialbox.php -->
</div>
</div>
<style type="text/css">
.autocomplete-suggestions{border:1px solid #999;background:#FFF;overflow:auto} .autocomplete-suggestion{padding:2px 5px 2px 10px;white-space:nowrap;overflow:hidden} .autocomplete-selected{background:#F0F0F0;cursor:default}.autocomplete-suggestions strong{font-weight:700} .autocomplete-group{padding:2px 5px} .autocomplete-group strong{display:block;border-bottom:1px solid #000}
ol.breadcrumbs {list-style: none;margin: 15px 0 0 0; padding: 5px 0; border-top: solid 1px #f9f9f9; border-bottom: solid 1px #f9f9f9;}
ol.breadcrumbs li {display: inline;}
.sidetabs .cart ul li .text {margin-top: -3px;display: inline-block;line-height: 100%;font-size: 11px;}
.sidetabs .cart ul li .count {display: inline-block;font-family: "proxima_novabold";font-size: 24px;line-height: 100%;}
header.header2 .wrapper .title-hl {font-style: italic;float: left;margin: 0;font-family: "proxima_novabold";font-size: 32px;}
.bold {font-weight: bold;font-family: arial;}
.content-text-editor p{
/*display: inline-block;*/
}
.content-text-editor div.attachments {
padding: .2em 1em;
text-align: right;
border-top: solid 1px #ddd;
margin-top: 1em;
border-bottom: solid 1px #ddd;
}
</style>

<script type="text/javascript">
  $(document).ready(function(){
  
 
  new Vue({
      el: '#glist',
      data: {
        items : <?= json_encode($gi)?>
      },
      ready:function(){
        this.$nextTick(function(){
          setTimeout(function(){
            $('a.icon[index=0]').click();
          },1000);
          
        });
      }
   });
  Vue.nextTick(function () {
    $("#glist .wb-search").magnificPopup({
            type: "image",
            closeOnContentClick: !0,
            mainClass: "mfp-fade",
            gallery: {
                enabled: !0,
                navigateByImgClick: !0,
                preload: [0, 1]
            }
        });
  });
     
});

 
</script>