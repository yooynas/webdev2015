<div class="page-header">
  <h1>EfoSup <small>Les catégories</small></h1>
</div>
<div class="row">
	<?php foreach($categories as $cat): ?>
	  	<div class="col-sm-6 col-md-4">
	    	<div class="thumbnail">
	      		<div class="caption">
	        		<h3><?=$cat['name_category']?></h3>
	        		<p>
	        			<a href="<?=site_url("lessons")?>/<?=$cat['id_category']?>" class="btn btn-primary" role="button">Voir</a> 
						<a href="<?=site_url("lessons")?>/edit/" class="btn btn-warning" role="button">Edition</a>
	        			<a href="<?=site_url("lessons")?>/delete/" class="btn btn-danger" role="button">Supprimer</a>
	        		</p>
	      		</div>
	    	</div>
	    </div>
    <?php endforeach; ?>
    <?php //var_dump($infos); ?>
</div>