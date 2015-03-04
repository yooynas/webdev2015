<div class="page-header">
  <h1>EfoSup <small>Les leçons</small></h1>
</div>
<div class="row">
	<?php foreach($lessons as $lesson): ?>
	  	<div class="col-sm-6 col-md-4">
	    	<div class="thumbnail">
	      		<div class="caption">
	        		<h3><?=$lesson['name_lesson']?></h3>
	        		<p><?=$lesson['description_lesson']?></p>
	        		<p><a href="<?=base_url("chapter")?>/<?=$lesson['id_lesson']?>/<?=$lesson['fk_category_lesson']?>" class="btn btn-primary" role="button">Voir</a></p>
	      		</div>
	    	</div>
	    </div>
    <?php endforeach; ?>
</div>