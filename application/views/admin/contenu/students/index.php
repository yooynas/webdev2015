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
         
          <?php
            $this->table->set_heading('#', 'Prénom', 'Nom','Email','Édition');
            foreach($students as $student) {
                $this->table->add_row(
                    $student->id_student,
                    $student->firstname_student,
                    $student->lastname_student,
                    $student->email_student,
                    anchor('/admin/chapter/edit/'.$student->id_student, 'Editer')
                    
                );
            } 
            
            echo $this->table->generate();
          ?>
    </div>
    <div class="box-body">
      
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
