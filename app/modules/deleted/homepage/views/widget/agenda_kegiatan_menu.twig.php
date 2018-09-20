<div class="submenu-content col-md-12 row">
	<div class="thumbs-content">
		{% for item in results %}
		<figure class="thumb col-md-4">
		{% set imagurl= 'public/assets/uploads/files/agenda_kegiatan/' ~ item.gambar %}	
		{% set imagurl= site_url()  ~ 'files/thumb/' ~ s_encrypt(imagurl) ~ '/300/225/fit' %}
		<a href="{{site_url()}}informasi/agenda-kegiatan/{{item.slug}}" class="selected">
		<img class="img-responsive" src="{{imagurl}}" alt="">
		<figcaption>{{item.judul}}</figcaption>
		</a>
		</figure>
		{% endfor %}
	</div>
</div>