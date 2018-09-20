
<div class="example-wrap">
	<h4 class="example-title"><i aria-hidden="true" class="icon wb-tag"></i> KATEGORI ARTIKEL</h4>
	<p></p>
	<div class="list-group bg-blue-grey-100 bg-inherit">
	  
	  <? foreach ($categories as $c): ?>

		<a href="{{ base_url }}konten/artikel/kategori/<?=$c->category_id?>/<?=slugify($c->category_name)?>" class="list-group-item blue-grey-500">
	    <?= $c->category_name ?>
	  </a>
	<? endforeach ?>
	</div>
	</div>