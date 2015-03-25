

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
          <?php
            $this->table->set_heading('#', 'Nom', 'Date de début','Numéro du chapitre','Cours','Édition','Suppression');
            foreach($myLessons as $myLesson) {
                $this->table->add_row(
                    $myLesson->id_chapter,
                    $myLesson->name_chapter,
                    $myLesson->begin_chapter,
                    $myLesson->num_chapter,
                    $myLesson->name_lesson,
                    anchor('/admin/chapter/edit/'.$myLesson->id_chapter, 'Editer'),
                    anchor('/admin/chapter/delete/'.$myLesson->id_chapter, 'Supprimmer')
                );
            } 
            $this->table->add_row('#', 'Nom', 'Date de début','Numéro du chapitre','Cours','Édition','Suppression');
            echo $this->table->generate();
          ?>
          
    </div>
    <div class="box-body">
    
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

