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
      <a itemprop="item" href="{{ base_url }}konten/artikel">
        <span itemprop="name">ARTIKEL</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <i class="fa fa-angle-right"></i>
      <a itemprop="item" href="{{ base_url }}konten/artikel/kategori/<?= $artikel->category_id ?>/<?= $artikel->kategori_slug ?>">
        <span itemprop="name"><?= $artikel->kategori ?></span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter">
    <article class="headline-news-single withsubtitle">
      <header>
        <h1 class="title"><?=$artikel->judul?></h1>
      </header>
      <figure class="hero">
        <img class="img-responsive lazy" style="width:100%" data-src="<?=$artikel->gambar?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?=$artikel->judul?>" title="<?=$article['title']?>">
        <figcaption>
        <?=$artikel->judul?><div class="share-this-horizontal">
          <span class="totalcount"><?= share_counter_text() ?></span>
          <a href="javascript:void(0);" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
          <a href="javascript:void(0);" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
          <a href="mailto:?subject=<?=$artikel->judul?>&amp;body={{ base_url }}konten/artikel/<?=$artikel->article_url?>">
            <i class="fa fa-envelope"></i>
          </a>
        </div>
        </figcaption>
      </figure>
      <div class="row" style="display: none">
      <div class="meta-content col-md-12">
       <!--  <div class="reporter">
          Reporter: <a href="{{ author_url }}"><?=$article['author']?></a> </div> -->
          <div class="date">
            <?= $artikel->tanggal ?> <i class="dibaca">
            <!-- dibaca normal 2:30 menit -->
            </i>
          </div>
        </div>
        
        <div class="blurb col-md-12">
      
        </div>
      </div>
   <div class="blurb fullwidth">
      </div>  
      <div class="content-text-editor">
        <strong>
        <a href="{{ base_url }}">{{ hostname }}</a>
        - <?= $artikel->tanggal ?> ,
        </strong>
        <?= $artikel->konten ?>
    
        
          <?= !empty($artikel->file) ? '<div class="attachments">Lampiran : <a class="" target="_blank" href="'.site_url('public/assets/uploads/files/attachments').'/'.$artikel->file.'"><i class="icon wb-download"></i> '.$artikel->file.'</a></div>' : '' ?>
    
        <?if(!empty($pn_artikel['p'])):?>
        <br>
        <strong>Baca juga <a href="{{ base_url }}konten/artikel/<?=$pn_artikel['p']->slug?>"  rel="noopener"><?=$pn_artikel['p']->judul?></a></strong>
     
        <?endif?>
        <?if(!empty($pn_artikel['n'])):?>
        <br>
        <strong>Baca juga <a href="{{ base_url }}konten/artikel/<?=$pn_artikel['n']->slug?>" rel="noopener"><?=$pn_artikel['n']->judul?></a></strong>
        <?endif?>
        <br>
        <strong>Baca juga</strong>
        artikel terkait <strong> <a href="{{ base_url }}konten/artikel/kategori/<?= $artikel->category_id ?>/<?= $artikel->kategori_slug ?>"><?= $artikel->kategori ?></a></strong>
      </div>
    </article>
<?if(!empty($related)):?>
  <section class="related-news berita-terkait">
    <h3 class="label-section">ARTIKEL TERKAIT</h3>
    <hr>
    <ul class="row">
      <?foreach($related as $r):?>
      <li class="col-md-3">
        <a href="{{ base_url }}konten/artikel/<?=$r->slug?>" class="thumbnail">
          <img class="lazy img-responsive" data-src="<?=$r->gambar?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?=$r->judul?>">
          <h3><?=$r->judul?></h3>
        </a>
      </li>
      <?endforeach?>
    </ul>
  </section>
  <?endif?>
  </div>
  

<div class="col-md-3 sidebar">
  <!-- 13-sidetabs.php -->
  <!-- 14-infografik.php -->
  <!-- 15-topic-hashtag.php -->
  <!-- 16-socialbox.php -->
  <?if($artikel->allow_comment):?>
  <?= $this->template->load_view('partials/homepage/article_comment.php',array('article'=>$article))?>
      <br>
  <?endif?>    
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
    setTimeout(function(){
      $('.content-text-editor table').removeAttr('cellpadding').removeAttr('cellspacing').removeAttr('style').removeAttr('border').addClass('table table-hover');
    },1000);
  });
</script>