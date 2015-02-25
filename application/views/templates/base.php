<!DOCTYPE html>
<?php 
	$this->load->view('/templates/parties/page_header');
?>
	<body>
			<nav class="navbar navbar-default">
				<?php 
					$this->load->view('/templates/parties/page_nav');
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
