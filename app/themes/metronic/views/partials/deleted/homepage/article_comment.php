<?
$comments = bkpp_m('get_article_comments',$artikel->article_id);
?>
<div class="comments comment-box">
  <h3>Komentar</h3>
  <div  id="articleComments">
  <div class="comment media" v-for="c in comments">
    <div class="media-left">
      <a class="avatar avatar-lg" href="javascript:void(0)">
        <img v-bind:data-src="c.email|gravatar_url" v-bind:alt="c.email" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="lazy">
      </a>
    </div>
    <div class="comment-body media-body">
      <a class="comment-author" href="javascript:void(0)">{{ c.name }}</a>
      <div class="comment-meta">
        <span class="date">{{ c.date_ta }}</span>
      </div>
      <div class="comment-content">
        <p>{{ c.content }}</p>
      </div>
      
    </div>
  </div>
  <div class="comment" v-if="comments.length==0">
    <div class="comment-body media-body">
      <div class="comment-content">
        <p>Belum ada komentar.</p>
      </div>
    </div>
  </div>
  </div>
  <form class="comments-add margin-top-35" action="<?=site_url('konten/artikel/komentar')?>" method="post" id="commentForm">
    <?=form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
    <?=form_hidden('article_id',$artikel->article_id);?>
    <h3 class="margin-bottom-35">Berikan Komentar</h3>
    <div class="form-group" v-bind:class="{'has-error':verror.name}">
      <input type="text" class="form-control" name="name" placeholder="Nama">
      <small style="" class="help-block" v-if="verror.name">{{verror.name}}</small>
    </div>
    <div class="form-group" v-bind:class="{'has-error':verror.email}">
      <input type="email" class="form-control" name="email" placeholder="Email">
      <small style="" class="help-block" v-if="verror.email">{{verror.email}}</small>
    </div>
    <div class="form-group" v-bind:class="{'has-error':verror.website}">
      <input type="text" class="form-control" name="website" placeholder="Website" value="http://">
      <small style="" class="help-block" v-if="verror.website">{{verror.website}}</small>
    </div>
    <div class="form-group" v-bind:class="{'has-error':verror.content}">
      <textarea class="form-control" rows="5" placeholder="Komentar anda" name="content"></textarea>
      <small style="" class="help-block" v-if="verror.content">{{verror.content}}</small>
    </div>
    <div class="form-group">
      <input type="button" class="btn btn-primary pull-right" value="Kirim Komentar" @click="sendComment()"> 
      <div style="clear: both"></div>
    </div>
  </form>
</div>

<style type="text/css">
  .comment-box{
    margin-left: -10px;
    margin-right: 8px;
  }
</style>

<script type="text/javascript">
Comment={};
  $(document).ready(function(){
    $('#commentForm').submit(function(){
      return false;
    });
    Comment.list = new Vue({
      el:'#articleComments',
      data:{
        comments : <?= json_encode($comments)?>
      }
    });
    var article_id='<?=$artikel->article_id?>';
    Comment.form = new Vue({
      el:'#commentForm',
      data:{
        comment : {},
        verr:{},
        verror:{}
      },
      methods: {
        sendComment: function(){
          console.log('sendComment');
          var data = $("#commentForm").serialize();
          var url = $('#commentForm').attr('action')+'?uuidv4='+uuidv4();
          $('#commentForm').ploading({action: 'show'});
          $.ajax({
              url: url,
              type: "POST",
              data: data,
              dataType:'json',
              complete:function(){
                $('#commentForm').ploading({action: 'hide'});
              },
              success: function(r){

                  if(r.status){
                    $('#articleComments').ploading({action: 'show'});
                    $.get(site_url()+'konten/artikel/komentar?pk='+article_id+'&uuidv4='+uuidv4(),function(r){
                    $('#articleComments').ploading({action: 'hide'});
                      
                      Comment.list.comments = r;
                      Comment.list.$nextTick(function () {
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
                      $("#commentForm").find('input[type=text],textarea,input[type=email]').val('');
                      $("#commentForm").find('input[name=website]').val('http://');
                      $("#commentForm").slideUp();
                    },'json');
                  }else{
                    if(typeof r.verror != 'undefined'){
                      Comment.form.verror = r.verror;
                    }
                  }
              }
          });
        }
      }
    });
  });
</script>