<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        /*
        if ($this->session->userdata('access') != 'admin') {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
        */
        $this->load->model('admin/M_courses');
        $this->load->library('table');
    }
    public function Index() {
        $get = $this->M_courses->get();
        // Génération d'un tableau formaté pour la librairie "HTML Table" de CodeIgniter
        $table_data = array(
            array_keys($get[0]) // Génère le <thead>
        );
        foreach ($get as $entry) {
            // Pour chaque entrée, on créé une ligne
            $row = array();
            foreach($entry as $key => $value) {
                $row[] = $value;
            }
            $table_data[] = $row;
        }   
        $data["contenu"] = 'admin/home/index';
        $data["courses_table"] = $this->table->generate($table_data);
        $this->load->view('templates/base', $data);
    }
}