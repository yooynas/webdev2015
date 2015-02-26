<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct() {
		
		//	Obligatoire
		parent::__construct();
		
		// J'inclus mon modèle, mes librairies, mes helpers, fichiers de langues etc...
		$this->load->database();
		
		$this->load->model('auth_model', 'AuthManager');
		
		$this->load->library(array('session','encrypt'));
		
		$this->load->helper(array('url','form'));
		
	}

	public function index() {
		
		echo 'Yeah !';
		
	}
	
	public function registration() {
	    
	}
	
	public function activation($username = '', $activation_key = '') {
		
	}
	
	public function login() {	
	    
	}
	
	public function logout() {
	    
	}
	
}