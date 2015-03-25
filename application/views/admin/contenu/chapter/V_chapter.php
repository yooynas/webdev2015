

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gestion des chapitres
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Liste des chapitre</h3>
        <div class="box-body">
          <a href="<?=base_url().'index.php/admin/chapter/add_new_chapter'; ?>" class="btn btn-danger" style="margin-bottom: 10px;">Ajouter un chapitre</a>
          <table id="website" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Date de début</th>
                <th>Numéro du chapitre</th>
                <th>Cours</th>
                <th>Edition</th>
                <th>Suppression</th>
                
              </tr>
            </thead>
            <tbody>
	        	<?php foreach($myLessons as $myLesson): ?>
				<tr>
					<td><?=$myLesson->id_chapter;?></td>
					<td><?=$myLesson->name_chapter?></td>
					<td><?=$myLesson->begin_chapter?></td>
					<td><?=$myLesson->num_chapter?></td>
					<td><?=$myLesson->name_lesson?></td>
					<td><a href="<?= base_url().'index.php/admin/chapter/edit/'.$myLesson->id_chapter; ?>">Editer</a></td>
					<td><a href="<?= base_url().'index.php/admin/chapter/delete/'.$myLesson->id_chapter; ?>">Suppression</a></td>
					
  				</tr>	
	        	<?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Date de début</th>
                <th>Numéro du chapitre</th>
                <th>Cours</th>
                <th>Edition</th>
                <th>Suppression</th>
              </tr>
            </tfoot>
          </table>
    </div>
    <div class="box-body">
    
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

