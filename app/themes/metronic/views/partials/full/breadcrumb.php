
<ul class="page-breadcrumb" id="page_breadcrumbs">
    <li>
        <a href="{{ base_url }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li v-for="b in breadcrumbs">
        <span v-if="b.uri==''||!b.uri" v-text="b.name"></span>
        <a v-if="b.uri!=''" v-bind:href="b.uri"><span v-text="b.name"></span></a>
        <i v-if="$index != (breadcrumbs.length-1)" v-bind:class="{'fa':1, 'fa-circle':1}"></i>
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