<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller
{
	
	public function __construct() {
		
		//	Obligatoire
		parent::__construct();
		
		// J'inclus mon modèle, mes librairies, mes helpers, fichiers de langues etc...
		$this->load->database();
		$this->load->model('M_Users', 'UsersManager');
		$this->load->library(array('session','encrypt','form_validation'));
		$this->load->helper(array('url','form'));
		
		// Si aucune session n'existe, je rediriger vers le formulaire de connexion
		if (!$this->session->userdata('id')) { redirect('auth/login','refresh'); }
		
	}

	public function index() {
			
		$this->infos();
		
	}
	
	public function infos() {
		
		$data['infos_account'] = $this->UsersManager->get_infos($this->session->userdata('id'));
				
		$data['contenu'] = 'users/infos';
		$this->load->view('templates/base', $data);
		
	}
	
	public function update_infos() {
		
		$data = array(
		        'email' => $this->input->post('email'),
		        'nickname' => $this->input->post('nickname')
		);
		
		// Je définis les délimiteurs pour l'affichage des erreurs
		$this->form_validation->set_error_delimiters('<p style="color:#ad4442">', '</p>');
		
		$this->form_validation->set_data($data);
			
		// Je définis les règles de mes champs
		$this->form_validation->set_rules('email', '"Adresse email"', 'trim|required|max_length[255]|valid_email');
		$this->form_validation->set_rules('nickname', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[55]');
		
		// Si le formulaire est correctement rempli
		if($this->form_validation->run()) {
			
			// Je met à jours les informations du compte
			$this->UsersManager->update_infos($this->session->userdata('id'), $this->input->post('email'), $this->input->post('nickname'));
			
			// Je redirige vers la page infos du compte
			redirect('users/infos','refresh');
			
		}
		else {
			
			// J'affiche les infos du comptes
			$this->infos();
			
		}
		
	}
	
}