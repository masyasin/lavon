  <script src="{{ base_url }}public/assets/themes/global/vendor/masonry/masonry.pkgd.min.js"></script>
  <script src="{{ base_url }}public/assets/themes/global/js/components/masonry.min.js"></script>
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
        <span itemprop="name">ARTIKEL</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <i class="fa fa-angle-right"></i>
      <a itemprop="item" href="javascript:void(0)">
        <span itemprop="name"><?= $category->name ?></span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
    <div class="col-md-9 col-no-gutter">
      
      <?= $this->template->load_view('partials/homepage/article-caraousel.php' ) ?>
      <br/>
      

   <div id="latestTopicL" class=" container-fluid">     
   
  <div class="g-loading">
                <!-- <h4 class="example-title">Media List</h4>
                <p>A list item can contain an image, user name and description.</p> -->
                <ul class="list-group list-group-full">
                  <li class="list-group-item" v-for="a in articles">
                    <div class="media">
                      <div class="media-left">
                        <a v-bind:href="'{{ base_url }}konten/artikel/'+a.slug" class="avatar-lg">
                          <img class="lazy img-responsive" v-bind:data-src="a.gambar" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" v-bind:alt="a.judul"><i></i></a>
                      </div>
                      <div class="media-body">
                        <a class="nu" v-bind:href="'{{ base_url }}konten/artikel/'+a.slug"><h2 class="media-heading" style="font-size: 20pt">{{a.judul}}</h2></a>
                        <p>{{{a.preview}}}</p>
                      </div>
                    </div>
                  </li>
                  
                </ul>
              </div>  
</div>
         
      <!-- 7-section.php -->
      <br>
     
      <!-- 8-section.php -->
      <!-- 9-section.php -->
      <!-- 10-section.php -->
      <!-- 11-section.php -->
      
      <!-- 12-section.php -->

    </div>
    <div class="col-md-3 sidebar">

     <?= $this->template->load_view('partials/homepage/article_categories.php' ) ?>
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
a.nu:hover{
  text-decoration: none;
}
footer{
  margin-top: 0;
}
</style>

<script type="text/javascript">


Artikel={
  page:1,
  loadMoreData:function(){
    console.log(this.page);
    this.page++;
  },
};
Artikel.data=<?= json_encode($articles)?>;

$(document).ready(function(){
   Artikel.vm=new Vue({
      el: '#latestTopicL',
      data: {
        articles : Artikel.data
      },
      ready:function(){
        this.$nextTick(function(){
          
          $(".lazy").Lazy({
              onFinishedAll: function() {
                  var container = $('#latestTopicL > section >ul.row' );
                  container.imagesLoaded(function(){
                    container.masonry({
                          gutterWidth: 20
                    });
                  });
              }
          });
        });
      }
   });

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
            var url = site_url() + 'homepage/artikel_kategori/<?=$category->category_id?>/<?=$category->category_name?>/'+(page+1);
            if(!isLoading){
             // $('.g-loading').ploading({action: 'show'});
              $.get(url,function(result){
                
                //$('.g-loading').ploading({action: 'destroy'});
                if(result.status){
                  ;
                  Artikel.vm.$set('articles',Artikel.data.concat(result.data));
                  Artikel.vm.$nextTick(function(){$('img.lazy').Lazy()});
                  page += 1;
                  isLoading=false;
                }
                
              },'json');
            }
            
        }
    });
});
</script>