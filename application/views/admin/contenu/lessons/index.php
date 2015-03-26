<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gestion des leçons
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Liste des leçons</h3>
        <div class="box-body">
          <a href="<?=site_url('admin/lessons/add')?>" class="btn btn-danger" style="margin-bottom: 10px;">Ajouter une leçon</a>
          
          <?php
            $this->table->set_heading('#', 'Nom', 'Description','Date','Catégorie','Professeur','Edition');
            foreach($lessons as $lesson) {
                $this->table->add_row(
                    $lesson->id_lesson,
                    $lesson->name_lesson,
                    $lesson->description_lesson,
                    $lesson->begin_lesson.' au '.$lesson->end_lesson,
                    $lesson->name_category,
                  	$lesson->firstname_teacher.' '.$lesson->lastname_teacher,
                    '<a href="'.site_url('admin/lessons/edit/'.$lesson->id_lesson).'"><i class="fa fa-pencil-square-o"></i></a> - <a href="'.site_url('admin/lessons/delete/'.$lesson->id_lesson).'" onclick="return confirm("Are you sure you want to delete?")"><i class="fa fa-times"></i></a>'
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

