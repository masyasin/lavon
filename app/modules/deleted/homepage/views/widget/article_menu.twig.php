<div class="submenu-content col-md-12 row">
	<div class="thumbs-content">
		{% for item in results %}
		<figure class="thumb col-md-4">
		{% set imagurl= 'public/assets/uploads/files/article_images/' ~ item.alt_image %}	
		{% set imagurl= site_url()  ~ 'files/thumb/' ~ s_encrypt(imagurl) ~ '/300/225/fit' %}
		<a href="{{site_url()}}konten/artikel/{{item.article_url}}" class="selected">
		<img class="img-responsive" src="{{imagurl}}" alt="">
		<figcaption>{{item.article_title}}</figcaption>
		</a>
		</figure>
		{% endfor %}
	</div>
</div>