


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
      <a itemprop="item" href="javascript:void(0)">
        <span itemprop="name">GALERI</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter">
    <article class="headline-news-single withsubtitle">
      <header>
        <h1 class="title">GALERI</h1>
      </header>
      <figure class="hero">
        <figcaption>
          <div class="share-this-horizontal">
            
            <a href="javascript:void(0);" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
            <a href="javascript:void(0);" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
            <a href="mailto:?subject=<?=$id['judul']?>&amp;body=<?=current_url()?>">
         
              <i class="fa fa-envelope"></i>
            </a>
            &nbsp;<span class="totalcount"><?= share_counter_text() ?></span>
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
       <!--  -->
<ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2 g-loading" id="gicnt">
  <?foreach($akg as $i ):?>
    <? $imagurl = base_url(). 'files/thumb/'.$i['image'].'/300/225';?>
        <li class="widget">
          <div class="cover overlay overlay-hover">
            <img class="cover-image overlay-scale" src="<?=$imagurl?>" alt="<?=$i['image_alt']?>">
            <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <div class="widget-time widget-divider">
                  <span><?=$i['date']?></span>
                </div>
                <h3 class="widget-title margin-bottom-20"><?=$i['title']?></h3>
                <a href="<?=site_url().$i['link']?>" class="btn btn-outline btn-inverse"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
        </li>
       <?endforeach?>  
       
      </ul>
       <!--  -->
       
        
      </div>
    </article>
  </div>
  

<div class="col-md-3 sidebar">
  <?= $this->template->load_view('partials/homepage/video_list_sb.php' ) ?>
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
}article figure.hero .share-this-horizontal {
    left: 0;
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


    var page = <?=$page?>;
    var isLoading = false;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var url = site_url() + 'homepage/galeri/page/'+(page+1);
            if(!isLoading){
              $('.g-loading').ploading({action: 'show'});
              $.get(url,function(r){
                //console.log(r);
                $('#gicnt').append(r);
                $('.g-loading').ploading({action: 'destroy'});
                page += 1;
                isLoading=false;
              });
            }
            
        }
    });
  });
</script>