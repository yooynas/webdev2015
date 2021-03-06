
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://www.ifosupwavre.be/" target="_blank"><img src="<?= img_url('logo_ifosup.jpg') ?>" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=site_url('site/index')?>">Accueil</a></li> 
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i> Afficher les catégories <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Catégorie 1</a></li>
                <li><a href="#">Catégorie 2</a></li>
                <li><a href="#">Catégorie 3</a></li>
            </ul>
        </li>
      </ul>
      <div class="nav navbar-nav navbar-right">
          <?=form_open('search/mysearch',$attr = array('class'=>'nav navbar-nav navbar-right')); ?>
            <div class="form-group">
              <?php
              $data = array(
              'classe' => 'input-sm form-control col-lg-3',
              'placeholder' => 'Recherche',
              'name' => 'search',
              'type' => 'search'
              ); 
              echo form_input($data);
              $data2 = array(
              'type' => 'submit',
              'class' => 'btn btn-default btn-sm',
              'name' => 'submit',
              'content' => '<span class="fa fa-search"></span>'
              );
              echo form_button($data2);
              ?>
              
            </div>
          <?= form_close();?>

    </div><!-- /input-group -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->