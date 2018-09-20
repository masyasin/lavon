<div id="wgSholat"><i>Memuat widget...</i></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('div.container.animsition').on('animsition.inEnd', function(){
			console.log('load sholat')
       		$.get(site_url()+'app/widget_proxy_data/sholat?uuidv4='+uuidv4(),function(html){
				$('#wgSholat').replaceWith(html);
			});
    	});

		 
	});
</script>