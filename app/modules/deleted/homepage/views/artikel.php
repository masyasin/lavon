
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
  </ol>
    <div class="col-md-9 col-no-gutter">
      
      <?= $this->template->load_view('partials/homepage/article-caraousel.php' ) ?>
      <br/>
      

   <div id="latestTopicL">     
   <section class="related-news berita-terkait" v-for="c in cats">
    <h3 class="label-section"><a v-bind:href="'{{ base_url }}konten/artikel/kategori/'+c.category_id+'/'+c.category_slug">{{c.category_name}}</a> </h3>
   
    <ul class="row">
      <li class="col-md-3" v-for="a in c.article_items">
        <a v-bind:href="'{{ base_url }}konten/artikel/'+a.slug" class="thumbnail">
          <img class="lazy img-responsive" v-bind:data-src="a.gambar" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" v-bind:alt="a.judul">
          <h3>{{a.judul}}</h3>
        </a>
      </li>
    </ul>
  </section>  
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

      <?= $this->template->load_view('partials/homepage/recent_comments.php' ) ?>
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


Artikel={
  page:1,
  loadMoreData:function(){
    console.log(this.page);
    this.page++;
  },
};
Artikel.data=<?= json_encode($acwl['rows'])?>;

$(document).ready(function(){
   Artikel.vm=new Vue({
      el: '#latestTopicL',
      data: {
        cats : Artikel.data
      }
   });

   var img = $('.content-text-editor p img:first');

    if(img.length > 0){
      img.wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom();
    }

    
    // var page = 1;
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            
    //         Artikel.loadMoreData();
    //     }
    // });
});
</script>