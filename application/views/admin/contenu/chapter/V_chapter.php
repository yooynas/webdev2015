<body>
<?php
foreach ($chapter as $i)
{
?>
<div class="num" style="display:inline-block"><?= $i['num_chapter']; ?></div>
<div class="name" style="display:inline-block"><?= $i['name_chapter']; ?></div>
<div class="begin"><?= $i['begin_chapter']; ?></div>
<a href="<?= base_url().'index.php/chapter/edit/'.$i['id_chapter'] ?>">Edition</a> |
<a href="<?= base_url().'index.php/chapter/delete/'.$i['id_chapter'] ?>">Suprimer</a>
<?php 
	
}
?>
<div><a href="<?= base_url().'index.php/chapter/add_new_chapter' ?>">Ajouter un nouveaux chapitre</a></div>
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
          <a href="<?=base_url.'index.php/chapter/add_new_chapter'; ?>" class="btn btn-danger" style="margin-bottom: 10px;">Ajouter une leçon</a>
          <table id="website" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date</th>
                <th>Catégorie</th>
                <th>Professeur</th>
              </tr>
            </thead>
            <tbody>
	        	<?php foreach($lessons as $lesson): ?>
				<tr>
					<td><?=$lesson->id_lesson?></td>
					<td><?=$lesson->name_lesson?></td>
					<td><?=$lesson->description_lesson?></td>
					<td><?=$lesson->begin_lesson.' au '.$lesson->end_lesson?></td>
					<td><?=$lesson->name_category?></td>
					<td><?=$lesson->firstname_teacher.' '.$lesson->lastname_teacher?></td>
  				</tr>	
	        	<?php endforeach ?>
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

