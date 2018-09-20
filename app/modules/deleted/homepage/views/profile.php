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
      <a itemprop="item" href="{{ base_url }}profile">
        <span itemprop="name">PROFILE</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter">
    <article class="headline-news-single withsubtitle" t="profile" slug="<?=$profile->slug?>">
      <header>
        <h1 class="title"><?=$profile->judul?></h1>
      </header>
      <figure class="hero">
        <?if(! $profile->hide_gambar ):?>
        <img class="img-responsive lazy" style="width:100%" data-src="<?=$profile->gambar?>" 
             src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" 
             alt="<?=$profile->keterangan_gambar?>" 
             title="<?=$profile->keterangan_gambar?>">
        <?endif?>
        <figcaption>
          <?if(! $profile->hide_gambar ):?>
          <?=$profile->keterangan_gambar?>
        <?endif?>

          <div class="share-this-horizontal">
            <span class="totalcount"><?= share_counter_text() ?></span>
            <a href="javascript:void(0);" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
            <a href="javascript:void(0);" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
            <a href="mailto:?subject=<?=$profile->judul?>&amp;body=<?=current_url()?>">
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
        
        <?=$profile->konten?>
      </div>
      <?if(!empty($related)):?>
  <section class="related-news berita-terkait">
    <h3 class="label-section">KONTEN TERKAIT</h3>
    <hr>
    <ul class="row">
      <?foreach($related as $r):?>
      <li class="col-md-3">
        <a href="{{ base_url }}profile/<?=$r->slug?>" class="thumbnail">
          <img class="lazy img-responsive" data-src="<?=$r->gambar?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?=$r->judul?>">
          <h3><?=$r->judul?></h3>
        </a>
      </li>
      <?endforeach?>
    </ul>
  </section>
<?endif?>
    </article>
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
article[slug=pejabat-bkpp-tangerang-selatan] .avatar-lg {
  width: 200px;
}
article[slug=pejabat-bkpp-tangerang-selatan] .avatar > img{
  border-radius: 2%;
  height: 270px;
  width: auto;
} 
article[slug=pejabat-bkpp-tangerang-selatan] .content-text-editor > .col-md-12:first{
      border: solid 1px aliceblue;
    padding: 2em 1em;
 
}
</style>

<script type="text/javascript">
  $(document).ready(function(){
    var img = $('.content-text-editor p img:first');

    if(img.length > 0){
      img.wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom();
    }
  });
</script>