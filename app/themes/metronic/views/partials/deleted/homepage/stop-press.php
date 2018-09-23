<section class="stop-press">
	<div class="container">
		<h3 id="stopPressApp">
		INFO
		<span id="telex"></span>
		<div class="topbar">
			<nav class="topbar-social">
				<div class="share-this-horizontal">
					<span>Ikuti Kami</span>
					<a target="_blank" href="https://facebook.com/{{ fb_id }}"><i class="fa fa-facebook"></i></a>
					<a target="_blank" href="https://twitter.com/{{ twitter_id }}"><i class="fa fa-twitter"></i></a>
					<a target="_blank" href="https://instagram.com/{{ instagram_id }}"><i class="fa fa-instagram"></i></a>
					<!-- <a target="_blank" href="https://www.youtube.com/c/{{ youtube_id }}"><i class="fa fa-youtube"></i></a> -->
					<!-- <a target="_blank" href="https://plus.google.com/{{ google_id }}/"><i class="fa fa-google-plus"></i></a> -->
					<!-- <a target="_blank" href="https://www.linkedin.com/company/{{ linked_in }}"><i class="fa fa-linkedin"></i></a> -->
				</div>
			</nav>
		</div>
	</div>
</section>
<? $msgs = bkpp_m('get_ptelex',10); ?>
<script type="text/javascript">
	$(document).ready(function(){
		new Vue({
			el:'#stopPressApp',
			data:{
				sp:{
					caption: 'INFO',
					title: 'BERITA YANG PALING HOT',
					link: ''
				}
			}
		});

		$('#telex').telex({
	        messages: <?= json_encode($msgs)?> ,
	        delay: 1000,
	        duration: 15000,
	        pauseOnHover: true,
	    });
	});
</script>

<style type="text/css">
#telex{	    
	display: inline-block;
    width: 70%;
    background: none;
 	line-height: 2.2em;
    color: #000;
}
</style>

<script type="text/javascript" src="{{ base_url }}app/themes/neutral/assets/default/telex.js"></script>