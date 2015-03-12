<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends MY_Model {

	function __construct(){
		parent::__construct();
	}	
	
	private $table_students = 'students';
	private $table_teachers = 'teachers';
	
	public function check_activation_account($email, $key) {

		return $this->db
				->select('id_student')
				->from($this->table_students)
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
				->update($this->table_students, $updateData);
	}
	
	public function check_account($email) {

		return $this->db
				->select('*')
				->from($this->table_students)
				->where('email_student', $email)
				->get()
				->row();
	}
	
	public function check_pass($email) {

		return $this->db
				->select('pass_student')
				->from($this->table_students)
				->where('email_student', $email)
				->get()
				->row();
	}
	
	public function check_account_teacher($email) {

		return $this->db
				->select('*')
				->from($this->table_teachers)
				->where('email_teacher', $email)
				->get()
				->row();
	}
	
	public function check_pass_teacher($email) {

		return $this->db
				->select('pass_teacher')
				->from($this->table_teachers)
				->where('email_teacher', $email)
				->get()
				->row();
	}

}