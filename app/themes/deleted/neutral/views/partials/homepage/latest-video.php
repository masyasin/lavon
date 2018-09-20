<section class="latest-videos" id="wgLatesVideo">
	<div class="row" v-for="v in vlist" v-if="$index==0">
		<div class="video-caption col-sm-6 col-md-6">
			<i class="ic-video"></i>
			<h3 class="title"><a v-bind:href="v.link">{{v.judul}}</a></h3>
			<p>{{ v.keterangan }}</p>
			<div class="share-this-horizontal">
				<span>Bagikan</span>
				<a href="javascript:void(0);" data-img="{{v.thumb}}" data-url="{{v.link}}" data-desc="{{v.keterangan}}" data-type="facebook" onclick="Share.create(this);"><i class="fa fa-facebook"></i></a>
				<a href="javascript:void(0);" data-shorturl="{{ v.link }}" data-desc="{{v.keterangan}}" data-type="twitter" onclick="Share.create(this);"><i class="fa fa-twitter"></i></a>
				
			</div>
		</div>
		<div class="video col-sm-6 col-md-6 col-no-gutter">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item lazy" v-bind:data-src="v.yt_embed_url"></iframe>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4" v-for="v in vlist" v-if="$index>0">
			<div class="thumbnail">
				<i class="ic-video"></i>
				<a v-bind:href="v.link">
					<img class="pull-right lazy" v-bind:data-src="v.thumb" v-bind:alt="v.keterangan" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="212" height="159">
					<div class="caption">
						<h3>{{v.judul}}</h3>
					</div>
				</a>
			</div>
		</div>
		
	</div>
</section>

<?
$vlist = bkpp_m('get_latest_video',4);
foreach ($vlist as &$v) {
	$video_id = getYoutubeIdFromUrl($v['url']);
	$v['yt_embed_url'] = '//www.youtube.com/embed/'.$video_id;
	$v['thumb'] = "http://img.youtube.com/vi/".$video_id."/0.jpg";
	$v['link'] = site_url('konten/galeri/video/' . my_simple_crypt($v['id']) . '/' . slugify($v['judul']) );
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    var vlist = <?= json_encode($vlist) ?>;

    new Vue({
      el:'#wgLatesVideo',
      data: {
        vlist : vlist
      }
    });

     

  });
</script>