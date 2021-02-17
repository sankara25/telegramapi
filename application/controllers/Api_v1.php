<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_v1 extends CI_Controller {

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
	    $this->load->model('api_v1_model');
	    $data['get_telegram_bot'] = $this->api_v1_model->get_telegram_bot();
	    
		$this->load->view('common/header.tpl');
		$this->load->view('api/v1.tpl',$data);
		$this->load->view('common/footer.tpl');
		
	}
	
	public function add_bot()
	{
	    $this->load->model('api_v1_model');
	    $data['get_telegram_bot'] = $this->api_v1_model->get_telegram_bot();
	    
		$this->load->view('common/header.tpl');
		$this->load->view('api/add_bot.tpl',$data);
		$this->load->view('common/footer.tpl');
	}
	
	public function bot($page = NULL)
	{
		if($page == 'add')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('bot_token', 'Bot Token', 'required');
			$this->form_validation->set_rules('bot_name', 'Bot name', 'required');
			$this->form_validation->set_rules('bot_username', 'Bot Username', 'required');
			$this->form_validation->set_message('required', 'Please Enter %s');
			
			if($this->form_validation->run() === FALSE)
			{
				$message = validation_errors();
				echo json_encode(array("status"=>"200","response"=>$message));
			}
			else
			{
				$bot_token = $_POST['bot_token'];
				$bot_name = $_POST['bot_name'];
				$bot_username = $_POST['bot_username'];
				
				$this->load->model('api_v1_model');
				$add_bot = $this->api_v1_model->add_bot($bot_token,$bot_name,$bot_username);
				echo $add_bot;
				
				
			}
			
		}
		elseif($page == 'getme')
		{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('telegram_bot', 'Bot', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$message = validation_errors();
				echo json_encode(array("status"=>"200","response"=>$message));
			}
			else
			{
			    $telegram_bot = $_POST['telegram_bot'];
			    $method_type = $_POST['method_type'];
			    $this->load->model('api_v1_model');
			    $bot_token = '';
				$get_telegram_token = $this->api_v1_model->get_telegram_token($telegram_bot);
				if($get_telegram_token->num_rows() > 0)
				{
				    $bot_token = $get_telegram_token->row()->bot_token;
				}
				
				echo $this->go_to_url($bot_token,$method_type); 
			}
		}
		
		elseif($page == 'setWebhook')
		{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('telegram_bot', 'Bot', 'required');
			$this->form_validation->set_rules('webhook_url', 'Webhook Url', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$message = validation_errors();
				echo json_encode(array("status"=>"200","response"=>$message));
			}
			else
			{
			    $telegram_bot = $_POST['telegram_bot'];
			    $method_type = $_POST['method_type'];
			    $webhook_url = $_POST['webhook_url'];
			    $this->load->model('api_v1_model');
			    $bot_token = '';
				$get_telegram_token = $this->api_v1_model->get_telegram_token($telegram_bot);
				if($get_telegram_token->num_rows() > 0)
				{
				    $bot_token = $get_telegram_token->row()->bot_token;
				}
				
				$data_json = json_encode(array('url'=>$webhook_url));
				
				echo $this->go_to_url($bot_token,$method_type,$data_json); 
			}
		}
	}
	
	public function go_to_url($bot_token = NULL, $method_type = NULL, $data_json = NULL)
	{
	    $url = 'https://api.telegram.org/bot'.$bot_token.'/'.$method_type;
	    $curl = curl_init($url);   
        
        if(isset($data_json))
        {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
	}
	
}
