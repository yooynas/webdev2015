
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="#" /></a>
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
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-gear"></i> Mon compte<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=site_url('users/infos')?>"><i class="fa fa-user"></i> Mes infos</a></li>
            <?php if ($this->session->userdata('admin') == 1) : ?>
            	<li class="divider"></li>
	            <li><a href="<?=site_url('admin/home')?>"><i class="fa fa-dashboard"></i> Administration</a></li>
	        <?php endif; ?>
            <li class="divider"></li>
            <li><a href="<?=site_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Se deconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
