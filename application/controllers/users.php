<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller
{
	
	public function __construct() {
		
		//	Obligatoire
		parent::__construct();
		
		// J'inclus mon modèle, mes librairies, mes helpers, fichiers de langues etc...
		$this->load->database();
		$this->load->model('M_Users', 'UsersManager');
		$this->load->model('M_Auth', 'AuthManager');
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
	
	public function update_pass() {
		
		// Je vérifie que le mot de passe actuel est correct 
		$check_pass = $this->UsersManager->check_pass($this->session->userdata('id'));
	        	        	        
	    if (!empty($this->input->post('old_password') == $this->encrypt->decode($check_pass->pass_student))) {
		
			$data = array(
			        'password' => $this->input->post('password'),
			        'confirm_password' => $this->input->post('confirm_password')
			);
			
			// Je définis les délimiteurs pour l'affichage des erreurs
			$this->form_validation->set_error_delimiters('<p style="color:#ad4442">', '</p>');
			
			$this->form_validation->set_data($data);
				
			// Je définis les règles de mes champs
			$this->form_validation->set_rules('password', '"nouveau mot de passe"', 'trim|required|min_length[5]|max_length[55]');
			$this->form_validation->set_rules('confirm_password', '"confirmez"', 'trim|required|min_length[5]|max_length[55]|matches[password]');
			
			// Si le formulaire est correctement rempli
			if($this->form_validation->run()) {
				
				// Je met à jours le mot de passe
				$password = $this->encrypt->encode($this->input->post('password'));
				
				$this->UsersManager->update_pass($this->session->userdata('id'), $password);
				
				$this->session->set_flashdata('alert', '<p style="color:#ad4442">Mot de passe modifié avec succès !</p>');
				
				// Je redirige vers la page infos du compte
				redirect('users/infos','refresh');
				
			}
			else {
				
				// J'affiche les infos du comptes
				$this->infos();
				
			}
			
		}
		else {
			
			$this->session->set_flashdata('error', '<p style="color:#ad4442">Mot de passe actuel incorrect !</p>');
			redirect('users/infos','refresh');
			
		}
		
		
	}
	
}