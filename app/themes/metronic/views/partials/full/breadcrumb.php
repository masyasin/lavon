
<ul class="page-breadcrumb" id="page_breadcrumbs">
    <li>
        <a href="{{ base_url }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li v-for="b in breadcrumbs">
        <span v-if="b.uri==''||!b.uri">{{b.name}}</span>
        <a v-if="b.uri!=''" v-bind:href="b.uri">{{{b.name}}}</a>
        <i v-if="$index != (breadcrumbs.length-1)" class="fa fa-circle"></i>
    </li>
</ul>
<script type="text/javascript">
	$(document).ready(function(){
		var breadcrumb=new Vue({
			el:'#page_breadcrumbs',
			data:{
				breadcrumbs:<?=json_encode($this->template->get_breadcrumbs())?>
			}
		});
	});
</script>