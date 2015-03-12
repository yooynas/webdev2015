<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Etudiants
    <small>Liste</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        	<h3 class="box-title">Liste des étudiants</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <a href="<?=base_url('proprietaires/ajouter')?>" class="btn btn-primary">Ajouter un étudiant</a>
          <table id="website" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Edition</th>
              </tr>
            </thead>
            <tbody>
	        	<?php foreach ($students as $student): ?>
				<tr>
					<td><?=$student->id;?></td>
					<td><?=$student->nom;?></td>
					<td><?=$student->email;?></td>
					<td><a href="<?=base_url('proprietaires/editer/'.$proprietaire->id)?>"><i class="fa fa-pencil-square-o"></i></a> <a href="<?=base_url('proprietaires/supprimer/'.$proprietaire->id)?>" onclick="return confirm('Supprimer <?=$proprietaire->nom?> ?');" style="padding-left:10px;"><i class="fa fa-minus-square"></i></a></td>
  				</tr>	
	        	<?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Edition</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

</section>