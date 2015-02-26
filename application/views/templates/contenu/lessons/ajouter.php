<div class="page-header">
  <h1>Ajouter une leçon</h1>
</div>

<form class="form-horizontal">

  <div class="form-group">
    <label for="titre_lesson" class="col-sm-2 control-label">Titre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="titre_lesson" placeholder="Titre de votre leçon" value="<?=(isset($categories->name_lesson))?$categories->name_lesson:'kjh'?>">
    </div>
  </div>

  <div class="form-group">
    <label for="contenu_lesson" class="col-sm-2 control-label">Contenu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" id="contenu_lesson"><?=(isset($content))?$content->description_lesson:''?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="categorie_lesson" class="col-sm-2 control-label">Categorie</label>
    <div class="col-sm-10">
		<select class="form-control">
			<?php foreach($categories as $cat):?>
		  		<option><?=$cat->name_category?></option>
		  	<?php endforeach; ?>
		</select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Ajouter</button>
    </div>
  </div>
</form>

<?php var_dump($categories); ?>