<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$data['contenu'] = 'modules/module_6';
		$this->load->view('templates/base', $data);
	}   
}