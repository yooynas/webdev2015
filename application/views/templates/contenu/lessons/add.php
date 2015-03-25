<div class="page-header">
  <h1>Ajouter une leçon</h1>
</div>


<form class="form-horizontal" method="POST" action="<?=base_url()?>index.php/lessons/add">
  <div class="form-group">
    <label for="titre_lesson" class="col-sm-2 control-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="titre_lesson" placeholder="Titre de votre leçon" value="<?=(isset($content[0]['name_lesson']))?$content[0]['name_lesson']:''?>">
    </div>
  </div>

  <div class="form-group">
    <label for="contenu_lesson" class="col-sm-2 control-label">Contenu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="contenu_lesson"><?=(isset($content[0]['description_lesson']))?$content[0]['description_lesson']:''?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="begin_lesson" class="col-sm-2 control-label">Date début</label>
    <div class="col-sm-10">
       <input type="date" class="form-control" rows="3" name="begin_lesson" value="<?=(isset($content[0]['begin_lesson']))?$content[0]['begin_lesson']:''?>">
    </div>
  </div>

  <div class="form-group">
    <label for="end_lesson" class="col-sm-2 control-label">Date de fin</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" rows="3" name="end_lesson" value="<?=(isset($content[0]['end_lesson']))?$content[0]['end_lesson']:''?>">
    </div>
  </div>

  <div class="form-group">
    <label for="categorie_lesson" class="col-sm-2 control-label">Categorie</label>
    <div class="col-sm-10">
    <select class="form-control" name="cat_lesson">
      <?php if($categories): ?>
        <?php foreach($categories as $key => $cat):?>
          <?php if(isset($content)): ?>
            <option <?=($categories[$key]['id_category']==$content[0]['fk_category_lesson'])?'selected':''?> value="<?=$categories[$key]['id_category']?>"><?=$categories[$key]['name_category']?></option>
          <?php else: ?>
            <option value="<?=$categories[$key]['id_category']?>"><?=$categories[$key]['name_category']?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Ajouter</button>
    </div>
  </div>
</form>

<?php echo $this->uri->segment(2);?>