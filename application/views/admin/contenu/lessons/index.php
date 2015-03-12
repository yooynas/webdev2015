<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gestion des leçons
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<?php foreach($lessons as $lesson): ?>
	  	<div class="col-sm-6 col-md-4">
	    	<div class="thumbnail">
	      		<div class="caption">
	        		<h3><?=$lesson->name_lesson?></h3>
	        		<p><?=$lesson->description_lesson?></p>
	        		<p>Date : <?=$lesson->begin_lesson.' au '.$lesson->end_lesson?></p>
	        		<p>Categorie : <?=$lesson->name_category?></p>
	        		<p>Professeur : <?=$lesson->firstname_teacher.' '.$lesson->lastname_teacher?></p>
	        		<p>
	        			<a href="<?=site_url("chapter")?>/" class="btn btn-primary" role="button">Voir</a> 
						<a href="<?=site_url("lessons")?>/edit/<?=$lesson->id_lesson?>" class="btn btn-warning" role="button">Edition</a>
	        			<a href="<?=site_url("lessons")?>/delete/<?=$lesson->id_lesson?>" class="btn btn-danger" role="button">Supprimer</a>
	        		</p>
	      		</div>
	    	</div>
	    </div>
    <?php endforeach; ?>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
