


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
      <a itemprop="item" href="{{ base_url }}pencarian">
        <span itemprop="name">PENCARIAN</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter top-page">
    <article class="headline-news-single withsubtitle">
     
      
      <div class="row" style="display: none">
        
      </div>
      <div class="blurb fullwidth">
      </div>
      <div class="content-text-editor" style="margin-top: 0">
      <div class="panel" id="appSearch">
        <div class="panel-body" style="padding:15px 0">
          <form class="page-search-form" role="search" method="post" v-bind:action="action+q">
            <?=form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>

            <div class="input-search input-search-dark">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input v-model="q" type="text" class="form-control" id="inputSearch" name="q" placeholder="Ketik yang anda cari.." value="{{info.query}}">
              <button type="button" class="input-search-close icon wb-close" aria-label="Close" @click="clear()"></button>
            </div>
          </form>
          <div v-if="info.show" style="margin-top: 1em">

          <h1 class="page-search-title">Hasil Pencarian "{{info.query}}"</h1>
          <p class="page-search-count">Sekitar
            <span>{{info.jumlah}}</span> hasil (
            <span>{{info.waktu}}</span> detik )</p>
          <figure class="hero" style="display: none;">
        <figcaption>
          <div class="share-this-horizontal">
            <span class="totalcount"><?= share_counter_text() ?></span>
            <a href="javascript:void(0);" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
            <a href="javascript:void(0);" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
            <a href="mailto:?subject=<?=$akg['judul']?>&amp;body=<?=current_url()?>">
              <i class="fa fa-envelope"></i>
            </a>
          </div>
        </figcaption>
      </figure>
          <ul class="list-group list-group-full list-group-dividered">
            <li class="list-group-item" v-for="r in results">
              <h4 class="result-title"><a href="{{r.link}}">{{r.judul}}</a></h4>
              <a class="search-result-link" href="{{r.link}}">{{r.link}}</a>
              <p>{{r.preview}}.</p>
            </li>
            
          </ul> 

              <div class="" v-if="info.jumlah">
                 <div class="page-info">Laman {{pagination.current_page}} dari {{pagination.last_page}}</div>
                 <nav>
                <ul class="pager" v-bind:class="{'disabled':!pagination.prev_page_url}"> 
                  <li class="previous"> <a @click="fetchData(pagination.prev_page_url)">
                    <span aria-hidden="true">←</span> Sebelumnya
                </a></li>
               
                <li class="next" v-bind:class="{'disabled':!pagination.next_page_url}">
                  <a @click="fetchData(pagination.next_page_url)">Selanjutnya  <span aria-hidden="true">→</span>
                </a>
                </li>
                </ul>
               </nav> 
                
                
              </div>
            </div>
        </div>
      </div>
        

       
      </div>
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
.panel .panel-body ul{
  padding-left: 0;

}
.content-text-editor .list-group-item {
  border: none;
}
article figure.hero .share-this-horizontal{
  left: 0;
  /*display: none;*/
}
.headline-news-single .next, 
.headline-news-single .prev{
  position: relative;
  font-size: inherit;
}

.page-info{
  padding: 1em;
  text-align: center;
}
.panel.bordered{
  border: solid 1px beige;
}
.search-result-link{
  font-size:90%;
}
h4.result-title{
  font-weight: normal;
  font-size: 20px;
  font-family: proxima_novalight !important;
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


 

<script type="text/javascript">
  
    var db = {
      bts: function (){
        return $.parseJSON(LZW.decompress([<?=LZW::compress(json_encode($search))?>])) ;
      } 
       
    };

    

    var page = 1;
    var perPage = 5;
    var pager = new Paginate(db.bts().data,perPage);
 
    new Vue({
        el: '#appSearch',
        data: {
            results: [],
            pagination: {},
            info: db.bts().info,
            action: '<?=site_url('pencarian')?>?q='
            
        },
        ready: function () {
            this.fetchData()
        },
        methods: {
            fetchData: function (pageNum) {
                var vm = this;
                 
                pageNum = pageNum || page;
                page = pageNum;
               
                vm.makePagination(pager);
                vm.$set('results', pager.page(pageNum));
            
                if(page != 1){
                  $('.top-page').attr('id','laman-'+page)
                  $('html, body').animate({
                scrollTop: $("#laman-"+page).offset().top
            }, 1500);
                }
                
            },
            makePagination: function(pg){
              // page += 1;
                var pagination = {
                    current_page: page,
                    last_page: pg.totalPages,
                    next_page_url: ((page >= pg.totalPages) ? page : page+1),
                    prev_page_url: page-1
                }
                this.$set('pagination', pagination)
            },
            clear: function(){
              this.$set('info', {
                query:'',
                show:false
              });
              $('#inputSearch').focus();
            }
        }
    });
</script>