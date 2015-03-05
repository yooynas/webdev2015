<div class="page-header">
  <h1>EfoSup <small>Les leçons</small></h1>
</div>
<div class="row">
	<?=(isset($flash))?'<div class="alert alert-success" role="alert">'.$flash.'</div>':''?>
	<?php foreach($lessons as $lesson): ?>
	  	<div class="col-sm-6 col-md-4">
	    	<div class="thumbnail">
	      		<div class="caption">
	        		<h3><?=$lesson['name_lesson']?></h3>
	        		<p><?=$lesson['description_lesson']?></p>
	        		<p>Date : <?=$lesson['begin_lesson'].' au '.$lesson['end_lesson']?></p>
	        		<p>
	        			<a href="<?=base_url("chapter")?>/" class="btn btn-primary" role="button">Voir</a> 
	        			<a href="<?=site_url("lessons")?>/delete/<?=$lesson['id_lesson']?>" class="btn btn-danger" role="button">Supprimer</a>
	        		</p>
	      		</div>
	    	</div>
	    </div>
    <?php endforeach; ?>
    <?php //print_r($lessons); ?>
</div>