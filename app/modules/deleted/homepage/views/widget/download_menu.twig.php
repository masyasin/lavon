<div class="m-content-bg"> 
  <div class="row" style="margin: 0">
    <div class="col-xs-12 mcnone">
   
        <!-- <h4 class="example-title">Layanan</h4> -->

        <ul class="list-icons">
          {% for item in results %}
          <li><i class="wb-chevron-right-mini" aria-hidden="true"></i><a href="{{site_url()}}konten/download/{{s_encrypt(item.id)}}/{{slugify(item.judul)}}">{{ item.judul }}</a></li>
          {% endfor %}
          
        </ul>
        
      </div>
  </div>
</div>