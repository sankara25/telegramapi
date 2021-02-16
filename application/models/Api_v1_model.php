<?php

class Api_v1_model extends CI_Model
{    
    function __construct()
    {
		parent::__construct();
    }
	
	function add_bot($bot_token = NULL, $bot_name = NULL, $bot_username = NULL)
	{
		$sql = "SELECT * FROM telegram_api WHERE bot_token = '".$bot_token."'";
		$query = $this->db->query($sql);
		if($query->num_rows() == 0)
		{
			$sql = "INSERT INTO telegram_api ( bot_token, first_name, username) VALUES 
					(".$this->db->escape($bot_token).", ".$this->db->escape($bot_name).", ".$this->db->escape($bot_username).")";
			$query = $this->db->query($sql);
			if($query)
			{
				$query =  json_encode(array("status"=>"200","response"=>"Bot Successfully Added."));
			}
			else
			{
				$query = json_encode(array("status"=>"400","response"=>"Bot does not Added."));
			}
		}
		else
		{
			$query = json_encode(array("status"=>"200","response"=>"Already Bot Exists."));
		}
		return $query;
	}
	
	function get_telegram_bot()
	{
	    $sql = "SELECT * FROM `telegram_api`";
	    $query = $this->db->query($sql);
	    return $query;
	    
	}
	
	function get_telegram_token($telegram_bot = NULL)
	{
	    $sql = "SELECT * FROM `telegram_api` WHERE username = '".$telegram_bot."'";
	    $query = $this->db->query($sql);
	    return $query;
	    
	}
	
	
}
