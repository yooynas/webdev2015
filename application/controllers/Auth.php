<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct() {
		
		//	Obligatoire
		parent::__construct();
		
		// J'inclus mon modèle, mes librairies, mes helpers, fichiers de langues etc...
		$this->load->database();
		$this->load->model('M_Auth', 'AuthManager');
		$this->load->library(array('session','encrypt','form_validation'));
		$this->load->helper(array('url','form'));
		
	}

	public function index() {
		
		// Si aucune session n'existe, je rediriger vers les formulaires
		if (!$this->session->userdata('id_user')) {
			
			$this->login();
			
		}
		
	}
	
	public function activation($activation_key = '') {
		
		// Je vérifie que les infos nécessaire à l'activation sont bien présents
		if (!empty($activation_key)) {
		
			$data['key'] = htmlspecialchars($activation_key);
			
			// Je définis les délimiteurs pour l'affichage des erreurs
			$this->form_validation->set_error_delimiters('<p style="color:#ad4442">', '</p>');
				
			// Je définis les règles de mes champs
			$this->form_validation->set_rules('email', 'Adresse email', 'trim|required|max_length[100]|valid_email');
			$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('confirm_password', 'Confirmez le mot de passe', 'trim|required|min_length[5]|max_length[50]|matches[password]');

			// Si le formulaire est correctement rempli
			if($this->form_validation->run()) {
				
				// Je stock les infos de l'utilisateur dans des variables
				$data = array();
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->encrypt->encode($this->input->post('password'));
				$data['key'] = htmlspecialchars($activation_key);
				
				$check_account = $this->AuthManager->check_activation_account($data['email'], $data['key']);
				
				// Je vérifie sur la clé et le mail match
				if (!empty($check_account)) {
					
					// J'enregistre l'utilisateur dans la base de donnée
					$this->AuthManager->activated_account($data['email'], $data['password']);
					
					// Je prépare le message de succès et je redirige vers la liste des pizzas
					$this->session->set_flashdata('alert', 'Compte validé ! Vous pouvez vous connecter !');
					redirect('/auth/login', 'refresh');
					
				}
				else {
					$data['contenu'] = 'auth/forbidden';
					$this->load->view('templates/base', $data);
				}
				
			}
				
			$data['contenu'] = 'auth/register';
			$this->load->view('templates/base', $data);
			
		}
		else {
			$data['contenu'] = 'auth/forbidden';
			$this->load->view('templates/base', $data);
		}
		
	}
	
	public function login() {	
		
		// Je définis les délimiteurs pour l'affichage des erreurs
		$this->form_validation->set_error_delimiters('<p style="color:#ad4442">', '</p>');
			
		// Je définis les règles de mes champs
		$this->form_validation->set_rules('email', '"email"', 'trim|required|max_length[255]|valid_email');
		$this->form_validation->set_rules('password', '"password"', 'trim|required|min_length[8]|max_length[55]|alpha_dash');
		
		// Si le formulaire est correctement rempli
		if($this->form_validation->run()) {
			
			// Je stock les infos de l'utilisateur dans des variables
			$data = array();
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			
			// Je récupère les infos du compte avec l'adresse email
			$db_check_account = $this->AuthManager->check_account($data['email']);
						
			$userData = array(
			                   'id'  	   => $db_check_account->id_student,
			                   'firstname'  => $db_check_account->firstname_student,
			                   'lastname'  => $db_check_account->lastname_student,
			                   'access'     => 'student',
			                   'logged_in' => TRUE
			               );
			
			$this->session->set_userdata($userData);
			
			redirect('chapter');
			
		}
		
		$data['contenu'] = 'auth/login';
		$this->load->view('templates/base', $data);
	    
	}
	
	public function logout() {
		  
		$this->session->sess_destroy();
		
		redirect('auth/login', 'refresh');
	    
	}
	
}