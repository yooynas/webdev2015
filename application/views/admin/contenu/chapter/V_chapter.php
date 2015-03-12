

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
          <a href="<?=base_url().'index.php/chapter/add_new_chapter'; ?>" class="btn btn-danger" style="margin-bottom: 10px;">Ajouter un chapitre</a>
          <table id="website" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Date de début</th>
                <th>Numéro du chapitre</th>
                <th>Cours</th>
                
              </tr>
            </thead>
            <tbody>
	        	<?php foreach($chapter as $chapter): ?>
				<tr>
					<td><?=$chapter['id_chapter']?></td>
					<td><?=$chapter['name_chapter']?></td>
					<td><?=$chapter['begin_chapter']?></td>
					<td><?=$chapter['num_chapter']?></td>
					<td><?//=$chapter->name_category?></td>
					
  				</tr>	
	        	<?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Edition</th>
              </tr>
            </tfoot>
          </table>
    </div>
    <div class="box-body">
      Hello world !
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

