<!DOCTYPE html>
<?php 
	$this->load->view('/templates/parties/page_header');
?>
	<body class="quentin">
			<nav class="navbar navbar-default">
				<?php 
					// J'affiche une navigation en fonction de si l'utilisateur est connecté ou non
					if (!$this->session->userdata('id')) { 
						$this->load->view('/templates/parties/page_nav');
					}
					else {
						$this->load->view('/templates/parties/page_nav_logged');
					}
				?>
			</nav>
		<div class="container">
			<?php 
				$this->load->view('/templates/contenu/'.$contenu);
			?>
		</div>
<?php 
	$this->load->view('/templates/parties/page_footer');
?>
