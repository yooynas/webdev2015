<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Etudiants
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Liste des étudiants</h3>
        <div class="box-body">
          <a href="<?=base_url('proprietaires/ajouter')?>" class="btn btn-danger" style="margin-bottom: 10px;">Ajouter un étudiant</a>
          <table id="website" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Edition</th>
              </tr>
            </thead>
            <tbody>
	        	<?php foreach ($students as $student): ?>
				<tr>
					<td><?=$student->id_student?></td>
					<td><?=$student->firstname_student?></td>
					<td><?=$student->lastname_student?></td>
					<td><?=$student->email_student?></td>
					<td></td>
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
