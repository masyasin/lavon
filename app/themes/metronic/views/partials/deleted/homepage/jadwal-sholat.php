<?
$this->load->library('sholat');
$select_data_kota = $this->sholat->get_kota_select_data();

?>
<div class="sholat-wrap margin-sm-0" id="wgSholat">
	<h4 class="example-title"><i class="icon wb-time"></i> JADWAL SHOLAT</h4>
	<form class="form-horizontal" action="<?=site_url('konsultasi')?>" method="post" v-if="!success">
		<div class="form-group">
			
		</div>
		<div class="form-group select-kota">
			<?= form_dropdown('wgs_kota',$select_data_kota,'274','class="form-control"') ?>
		</div>
		<div class="form-group selact-date">
			<div class="input-group">
			    <span class="input-group-addon">
			      <i class="icon wb-calendar" aria-hidden="true"></i>
			    </span>
			    <input type="text" name="sdate" class="form-control" value="<?=date('d/m/Y')?>">
			  </div>
			</div>
		<?=form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash());?>
	</form>
	<div id="wgjds_vm">
		<div v-if="s" class="">
		<table class="table table-hover table-striped table-bordered">
			<tbody> 
				<tr><th>Subuh</th><td>{{s.subuh}}</td></tr>
				<tr><th>Dzuhur</th><td>{{s.dzuhur}}</td></tr>
				<tr><th>Ashar</th><td>{{s.ashar}}</td></tr>
				<tr><th>Maghrib</th><td>{{s.maghrib}}</td></tr>
				<tr><th>Isya</th><td>{{s.isya}}</td></tr>

			</tbody>
		</table>
		<span><i>Sumber : <a target="_blank" href="http://jadwalsholat.pkpu.or.id">http://jadwalsholat.pkpu.or.id</i></a></span>
		</div>
	</div>
</div>

<script type="text/javascript">
	var wgjds_vm = new Vue({
		el:'#wgjds_vm',
		data:{
			s:{}
		}
	});
	function updateJadwalSholatUi(){
		var lokasi = $('select[name=wgs_kota]').val();
		var date = $('input[name=sdate]').datepicker('getDate');
		
		var tahun  = date.getFullYear(); 
		var bulan  = date.getMonth();
		var tanggal = date.getDate();

		var formData = {
			'<?=$this->security->get_csrf_token_name()?>': '<?=$this->security->get_csrf_hash()?>',
			lokasi : lokasi,
			bulan: (bulan+1),
			tahun: tahun,
			tanggal: tanggal
		};

		$.post(site_url()+'app/widget_proxy_data/sholat/get_waktu_sholat',formData,function(json){
			// console.log(json)
			wgjds_vm.s = json;
		},'json');
	}
	$(document).ready(function(){
		
		$('select[name=wgs_province]').change(function(){
			var q = $('select[name=wgs_province]').val();
			$.post(site_url()+'app/widget_proxy_data/sholat/get_kota_lintang',{'<?=$this->security->get_csrf_token_name()?>': '<?=$this->security->get_csrf_hash()?>',q:q},function(r){
				$('.select-kota').empty().html(r);

				setTimeout(function(){
					$('select[name=wgs_city]').change(updateJadwalSholatUi);
				},500);
			});
		}).change();

		$('input[name=sdate]').datepicker({
			format:'dd/mm/yyyy'
		}).on('changeDate', function(e) {
	        updateJadwalSholatUi();
	    });

	    setTimeout(function(){
	    	$('input[name=sdate]').trigger('changeDate');
	    },3000);
	});
</script>