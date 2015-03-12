<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Students extends MY_Model {

	function __construct(){
		parent::__construct();
	}	
	
	private $table_students = 'students';
	private $table_teachers = 'teachers';

}