<div class="link-wrap">
	<h4 class="example-title"><i class="icon wb-link"></i> LINKS</h4>
	<div id="wgLinks" class="list-group">
		<a v-for="ln in links" v-bind:href="ln.url" target="_blank" class="list-group-item" v-bind:alt="ln.keterangan" v-bind:title="ln.keterangan">
			<figure>
				<img v-bind:data-src="ln.gambar" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="213" height="73"  class="lazy"/>
			</figure>
		</a>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var links = <?= json_encode(bkpp_m('get_links')) ?>

    new Vue({
      el:'#wgLinks',
      data: {
        links : links
      }
    });
  });
</script>

<style type="text/css">
	#wgLinks .list-group-item{
		border: none;
		padding: 0;
		margin: 1em 0;
	}
	#wgLinks .list-group-item img{
		width: 100%;
		border-radius: 2%;
	}
</style>