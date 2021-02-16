<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }
    
    function _remap($method)
    {
      $param_offset = 2;
      if ( ! method_exists($this, $method))
      {
        $param_offset = 1;
        $method = 'index';
      }

      $params = array_slice($this->uri->rsegment_array(), $param_offset);
      call_user_func_array(array($this, $method), $params);
    }
	
	public function index($page = NULL)
	{
		if($page == '')
		{
			$this->load->view('common/header.tpl');
			$this->load->view('install/install.tpl');
			$this->load->view('common/footer.tpl');
		}
		elseif($page == 'settings')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('database_url', 'Database URL', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('database_name', 'Database Name', 'required');
			$this->form_validation->set_message('required', 'Please Enter <b>%s</b>');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			if($this->form_validation->run() === FALSE)
			{
				$message = '<div class="alert alert-danger"><ul>';
				$message .= validation_errors();
				$message .= '</ul></div>';
				echo '0|'.$message;
			}
			else
			{
				$this->load->model('install_model');
				$add_db_details = $this->install_model->add_db_details($_POST['database_url'],$_POST['username'],$_POST['password'],$_POST['database_name'] );
			}

		}
		
	}
	
}