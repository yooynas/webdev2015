<div class="page-header">
  <h1>Ajouter une leçon</h1>
</div>
<?php// var_dump($content); ?>
<form class="form-horizontal" method="POST" action="<?=base_url()?>index.php/lessons/test">

  <div class="form-group">
    <label for="titre_lesson" class="col-sm-2 control-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="titre_lesson" placeholder="Titre de votre leçon" value="<?=(isset($content['name_lesson']))?$content['name_lesson']:''?>">
    </div>
  </div>

  <div class="form-group">
    <label for="contenu_lesson" class="col-sm-2 control-label">Contenu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="contenu_lesson"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="categorie_lesson" class="col-sm-2 control-label">Categorie</label>
    <div class="col-sm-10">
    <select class="form-control">
      <?php if($categories): ?>
        <?php foreach($categories as $key => $cat):?>
          <option <?=($categories[$key]['id_category']==$this->uri->segment(4))?'selected':''?> value="<?=$categories[$key]['id_category']?>"><?=$categories[$key]['name_category']?></option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default">Ajouter</button>
    </div>
  </div>
</form>
