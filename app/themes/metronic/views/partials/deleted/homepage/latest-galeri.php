

<section class="latest-photos">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <!-- START LOOP -->
            <div class="item" v-for="gi in lgi_list" v-bind:class="{'active':$index===0}">
              <i class="ic-photo count">{{gi.jumlah_gambar}}</i>
              <div class="thumbnail hero-full">
                <figure class="col-md-12">
                  <a v-bind:href="gi.link">
                    <img v-bind:alt="gi.judul" class="img-responsive lazy" v-bind:data-src="gi.gambar" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="974" height="548">
                    <figcaption>
                    <h3>{{gi.judul}}</h3>
                    <div class="description">{{{ gi.keterangan }}}</div>
                    </figcaption>
                  </a>
                </figure>
              </div>
            </div>
            <!-- END LOOP -->
          </div>
          <a class="left carousel-control bigphoto" href="#carousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control bigphoto" href="#carousel" role="button" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
        <div class="clearfix">
          <div id="thumbcarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <!-- START LOOP CARAOUSEL THUMB DIVIDE BY FOUR ITEMS-->
              <div class="item" v-for="tc in tc_list" v-bind:class="{'active':$index===0}">
                <!-- START LOOP FOUR TIMES -->
                <div class="thumb img-responsive" v-for="gi in tc">
                  <i class="ic-photo count">{{gi.jumlah_gambar}}</i>
                  <a v-bind:href="gi.link">
                    <img v-bind:alt="gi.judul" v-bind:data-src="gi.thumb" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="194" height="194" class="lazy">
                  </a>
                </div>
                <!-- END LOOP FOR ITEMS -->
              </div>
              <!-- END LOOP FOR ITEMS -->
            </div>
            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?
$lgi_list = bkpp_m('get_latest_galeri');



/*-----------------------------------------------------------------------------------------------------------------*/
$caraousel_item = array_slice($lgi_list, 0, 3); 
foreach ($caraousel_item as &$gi) {
	$path = 'public/assets/uploads/files/galery_images/' . underscorize($gi['slug']) . '/' . $gi['file']; 
	$gi['gambar'] = site_url('files/thumb') . '/' . my_simple_crypt($path,'e') . '/974/548';
	if(empty($gi['keterangan'])){
		$gi['keterangan'] = $gi['judul'];

	}
	$gi['link'] = site_url('konten/galeri/' . $gi['slug']);
}

/*-----------------------------------------------------------------------------------------------------------------*/
$max_walk = 1;
$walk = 0;
$tc_list = array();

$offset = 3;
while($walk < $max_walk){

	$caraousel_thumb_item = array_slice($lgi_list, $offset, 4);
	foreach ($caraousel_thumb_item as &$gx) {
		$path = 'public/assets/uploads/files/galery_images/' . underscorize($gx['slug']) . '/' . $gx['file']; 
		$gx['thumb'] = site_url('files/thumb') . '/' . my_simple_crypt($path,'e') . '/266/266';
		if(empty($gx['keterangan'])){
			$gx['keterangan'] = $gx['judul'];

		}
		$gx['link'] = site_url('konten/galeri/' . $gx['slug']);
	}
	$tc_list[] = $caraousel_thumb_item;

	$offset += 3;
	$walk++;
}

/*-----------------------------------------------------------------------------------------------------------------*/
// print_r($caraousel_item);
?>

<script type="text/javascript">
  $(document).ready(function(){
    var caraousel_item = <?= json_encode($caraousel_item) ?>;

    new Vue({
      el:'#carousel',
      data: {
        lgi_list : caraousel_item
      }
    });

    var tc_list = <?= json_encode($tc_list) ?>;

    new Vue({
      el:'#thumbcarousel',
      data: {
        tc_list : tc_list
      }
    });

  });
</script>