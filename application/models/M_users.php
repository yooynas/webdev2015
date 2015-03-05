<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends MY_Model {

	function __construct(){
		parent::__construct();
	}	
	
	private $table_users = 'students';
	
	public function get_infos($id) {

		return $this->db
				->select('nickname_student, email_student')
				->from($this->table_users)
				->where('id_student', $id)
				->get()
				->row();
	}
	
	public function update_infos($id, $email, $nickname) {
		
		$updateData = array(
		    'email_student' => $email,
		    'nickname_student' => $nickname
		);
		
		return $this->db
				->where('id_student', $id)
				->update($this->table_users, $updateData);
	}
	
	public function check_pass($id) {

		return $this->db
				->select('pass_student')
				->from($this->table_users)
				->where('id_student', $id)
				->get()
				->row();
	}
	
	public function update_pass($id, $password) {
		
		$updateData = array(
		    'pass_student' => $password
		);
		
		return $this->db
				->where('id_student', $id)
				->update($this->table_users, $updateData);
	}

}