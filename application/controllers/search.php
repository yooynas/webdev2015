<?php
    class search extends CI_Controller 
    {
    	function __construct()
		{
    		parent::__construct();
    		$this->load->model('M_search');
		}
    	public function mysearch()
		{
			$this->form_validation->set_rules('search','terme', 'required');
         

         	if ($this->form_validation->run() === FALSE )
         	{
            	
            	redirect('chapter');
            
         	} 
        	else 
         	{
				$words = $this->input->post('search');
				$data['contenu'] = '/search/V_search';
				$data['search'] = $words;
				$get = $this->M_search->get_posts_by_search($words);
				$data['finds'] = $get;
				$this->load->view('templates/base',$data);			
				
			}
		}
	}