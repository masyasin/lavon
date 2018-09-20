<div class="submenu-content col-md-12 row">
	<div class="thumbs-content">
		{% for item in results %}
		<figure class="thumb col-md-4">
		{% set slug = slugify(item.judul) %}	
		{% set imagurl= 'public/assets/uploads/files/galery_images/' ~ underscorize(item.judul) ~ '/' ~ item.gambar %}	
		{% set imagurl= site_url()  ~ 'files/thumb/' ~ s_encrypt(imagurl) ~ '/300/225/fit' %}
		<a href="{{site_url()}}konten/galeri/{{slug}}" class="selected">
		<img class="img-responsive" src="{{imagurl}}" alt="{{item.gambar}}">
		<figcaption>{{cklen(item.judul,80)}}</figcaption>
		</a>
		</figure>
		{% endfor %}
	</div>
</div>