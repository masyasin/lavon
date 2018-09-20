
<template id="template-konsultasi">
	<div class="comment media">
      <div class="media-left">
        <a class="avatar avatar-lg" href="javascript:void(0)">
          <img v-bind:data-src="konsultasi.email|gravatar_url" alt="{{konsultasi.email}}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="lazy">
        </a>
      </div>
      <div class="media-body">
        <div class="comment-body">
          <a class="comment-author" href="javascript:void(0)">{{konsultasi.pengirim}}</a>
          <div class="comment-meta">
            <span class="date">{{konsultasi.tanggal_ta}}</span>
          </div>
          <div class="comment-content">
            <p>{{konsultasi.pertanyaan}}</p>
          </div>
        </div>
        <div class="comments" v-if="konsultasi.jawaban">
          <div class="comment media">
            <div class="media-left">
              <a class="avatar avatar-sm" href="javascript:void(0)">
                <img  v-bind:data-src="'{{ base_url }}'+'public/assets/themes/images/bkpp256x256.png'" alt="{{ konsultasi.untuk | subject }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="lazy">
              </a>
            </div>
            <div class="comment-body media-body">
              <a class="comment-author" href="javascript:void(0)">{{ konsultasi.untuk | subject }} </a>
              <div class="comment-meta">
                <span class="date">{{konsultasi.tanggal_dijawab_ta}}</span>
              </div>
              <div class="comment-content">
                <p>{{konsultasi.jawaban}}</p>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
</template>




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
      <a itemprop="item" href="{{ base_url }}konsultasi">
        <span itemprop="name">KONSULTASI</span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
  <div class="col-md-9 col-no-gutter top-page">
    <article class="headline-news-single withsubtitle">
      <header>
        <!-- <h1 class="title">Konsultasi</h1> -->
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
        
        <div class="panel bordered">
        
          <div class="panel-body">

            <div class="comments margin-horizontal-20" id="btlist">
              <konsultasi v-for="konsultasi in konsultasis" is="konsultasi" :konsultasi="konsultasi"></konsultasi>
              
                    
              <div class="">
                 <div class="page-info">Laman {{pagination.current_page}} dari {{pagination.last_page}}</div>
                 <nav>
                <ul class="pager" v-bind:class="{'disabled':!pagination.prev_page_url}"> 
                  <li class="previous"> <a @click="fetchKonsultasis(pagination.prev_page_url)">
                    <span aria-hidden="true">←</span> Sebelumnya
                </a></li>
               
                <li class="next" v-bind:class="{'disabled':!pagination.next_page_url}">
                  <a @click="fetchKonsultasis(pagination.next_page_url)">Selanjutnya  <span aria-hidden="true">→</span>
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
  

<div class="col-md-3 sidebar">
  <div id="frmKonsultasi" class=" ">
              <div class="toast-example" id="exampleToastrSuccess" aria-live="polite" data-plugin="toastr" data-message="<strong>Terima Kasih!</strong> Pesan anda telah dikirim." data-container-id="toast-top-right" data-position-class="toast-top-right" data-icon-class="toast-just-text toast-success" role="alert"  v-if="success">
                  <div class="toast toast-just-text toast-success" >
                      <button type="button" class="toast-close-button" aria-label="Tutup" @click="closeToastr()">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="toast-message">
                        <strong>Terima Kasih!</strong> konsultasi anda telah dikirim.</div>
                    </div>
                 </div>
                 
                  <form class="form-horizontal" action="<?=site_url('konsultasi')?>" method="post" v-if="!success">
                     <div class="form-group">
                 <h3>FORM KONSULTASI</h3>
               </div>
                    <?=form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
                    <div class="form-group" v-bind:class="{'has-error':verr.pengirim}">
                      <label class=" control-label">Nama Lengkap </label>
                      <div class="">
                        <input value="<?=set_value('pengirim')?>" type="text" autocomplete="off" placeholder="Nama Lengkap" name="pengirim" class="form-control">
                        <small style="" class="help-block" v-if="verror.pengirim">{{verror.pengirim}}</small>
                      </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':verr.untuk}">
                      <label class=" control-label">Kepada </label>
                      <div class="">
                        <?= form_dropdown('untuk',$subject,set_value('untuk'),'class="form-control"')?>
                        <small style="" class="help-block" v-if="verror.email">{{verror.untuk}}</small>

                      </div>
                    </div>

                    <div class="form-group" v-bind:class="{'has-error':verr.email}">
                      <label class=" control-label">Email </label>
                      <div class="">
                        <input value="<?=set_value('email')?>" type="email" autocomplete="off" placeholder="@email.com" name="email" class="form-control">
                        <small style="" class="help-block" v-if="verror.email">{{verror.email}}</small>

                      </div>
                    </div>

                    <div class="form-group"  v-bind:class="{'has-error':verr.pertanyaan}">
                      <label class="control-label">Pertanyaan </label>
                      <div class="">
                        <textarea placeholder="Pertanyaan" class="form-control" name="pertanyaan"><?=set_value('pertanyaan')?></textarea>
                        <small style="" class="help-block" v-if="verror.pertanyaan">{{verror.pertanyaan}}</small>

                      </div>
                    </div>
                    <div class="form-group">
                      <div>
                        <input class="btn btn-primary" type="submit" value="Kirim Konsultasi" />
                      </div>
                    </div>
                  </form>
                </div>
 <?= $this->template->load_view('partials/homepage/links.php')?>
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
.avatar-sm > img{
/*  width: 96px;
  height: 96px;*/
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
article figure.hero .share-this-horizontal{
  left: 0;
}
.totalcount{
  color: #000;
}
.comment-meta span.date{
    font-size: 80%;
    font-style: italic;
}
.panel.bordered{
  border: solid 1px beige;
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
    Vue.filter('subject',function(id){
      var subjects = <?=json_encode($subject)?>;
      return subjects[id];
    });
    Vue.component('konsultasi', {
        template: '#template-konsultasi',
        props: ['konsultasi'],
    });
    var db = {
  		bts: function (){
  			return $.parseJSON(LZW.decompress([<?=LZW::compress(json_encode($bt))?>])) ;
  		}
  	};
    var page = 1;
    var perPage = 5;
	var pager = new Paginate(db.bts(),perPage);

    new Vue({
        el: '#btlist',
        data: {
            konsultasis: [],
            pagination: {},
            
        },
        ready: function () {
            this.fetchKonsultasis()
        },
       
        methods: {
            fetchKonsultasis: function (pageNum) {
                var vm = this;
                 
                pageNum = pageNum || page;
                page = pageNum;
               
                vm.makePagination(pager);
                vm.$set('konsultasis', pager.page(pageNum));
                vm.$nextTick(function () {
                    console.log('MOUNTED'); //empty!!!!
                    $('.lazy').Lazy({
                        // your configuration goes here
                        scrollDirection: 'vertical',
                        effect: 'fadeIn',
                        // visibleOnly: true,
                        onError: function(element) {
                            console.log('error loading ' + element.data('src'));
                        }
                    });
                });
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
            }
        }
    });

    var verror = <?=json_encode(validation_errors_array())?>;
    var verr = {};

    $.each(verror,function(i,msg){
      verr[i] = true;
    });
    new Vue({
      el:'#frmKonsultasi',
      data: {
        verr: verr,
        verror: verror,
        success: <?=$success?>
      },
      methods:{
        closeToastr: function(){
          document.location.href="<?=site_url('konsultasi')?>";
        }
      }
    });
</script>