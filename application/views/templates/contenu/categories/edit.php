<div class="page-header">
  <h1>Editer la catégorie <?=$content[0]['name_category']?></h1>
</div>
<?php //var_dump($content); ?>

<form class="form-horizontal" method="POST" action="<?=base_url()?>index.php/category/edit">
  <div class="form-group">
    <input type="hidden" value="<?=$content[0]['id_category']?>" name="id_category">
    <label for="titre_category" class="col-sm-2 control-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="titre_category" placeholder="Titre de votre leçon" value="<?=(isset($content[0]['name_category']))?$content[0]['name_category']:''?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Editer</button>
    </div>
  </div>
</form>

<?php echo $this->uri->segment(2);?>