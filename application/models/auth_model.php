<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}	
	
	private $table_users = 'students';
	
	public function check_activation_account($email, $key) {

		return $this->db
				->select('id_student')
				->from($this->table_users)
				->where('email_student', $email)
				->where('activationkey_student', $key)
				->get()
				->row();
	}
	
	public function activated_account($email, $password) {
		
		$updateData = array(
		    'pass_student' => $password,
		    'activationkey_student' => ''
		);
		
		return $this->db
				->where('email_student', $email)
				->update($this->table_users, $updateData);
	}

}