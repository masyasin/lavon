<? 
$pd = bkpp_m('get_polling'); 
$poll_data = bkpp_m('get_poll_data',$pd['poll']['id']); 
$already = $pd['already'];
$pds=array_values($pd['polling_data']);
$hints = implode(',', $pds);
?> 
<div class="poll-wrap margin-sm-0" id="wgPolling">
	<h4 class="example-title"><i class="icon wb-flag"></i> Jajak Pendapat / Polling</h4>
	<p><?=$pd['poll']['judul']?></p>

	<?if(!$already):?>
	<div class="expRate">
		

		<div class="rating" 
			 data-plugin="rating" 
			 data-target="#exampleHintTarget" 
			 data-hints="<?=$hints?>" 
			 data-click="onRatePoll"
			 data-number="<?=count($pds)?>"
			 
			 style="cursor: pointer;">
		</div>
	 		<br><div class="rating-hint" id="exampleHintTarget"></div><br/>
		
	</div>
	<?endif?>
	<div class="" id="cartPoll">
      <div class="contextual-progress" v-for="p in poll_data.data" v-if="already">
        <div class="clearfix">
          <div class="progress-title">{{ p.title }}</div>
          <div class="progress-label">{{ p.percentage }} %</div>
        </div>
        <div class="progress" data-goal="{{ p.total }}" data-plugin="progress">
          <div class="progress-bar progress-bar-success" aria-valuemin="0" aria-valuemax="{{ poll_data.total }}" aria-valuenow="{{ p.percentage }}" role="progressbar" v-bind:style="'width:'+ p.percentage +'%'">
            <span class="progress-label">{{ p.percentage }} %</span>
          </div>
        </div>
      </div>
      
    </div>
	
</div>


<style type="text/css">
	.rating-hint{displplay:inline-block;margin:.5em 0;vertical-align:sub}
</style>

<script type="text/javascript">
$(document).ready(function(){
	var vm = new Vue({
		el:'#cartPoll',
		data:{
			poll_data: <?=json_encode($poll_data)?>,
			already: <?=!$already?'0':'1'?>
		}
	});

	

	window.onRatePoll = function (score, evt) {
 	 
		$.post(base_url()+'app/pool',{
			'<?=$this->security->get_csrf_token_name()?>': '<?=$this->security->get_csrf_hash()?>',
			parent:'<?=$pd['poll']['id']?>',
			value:score
		},function(o){
			if(o.status){
				vm.poll_data = o.poll_data;
				vm.already = true;

				$('.expRate').remove();
			}else{
				alert('We are sorry cant push polling for you right now');
			}
		},'json');
	}
	
});
</script>