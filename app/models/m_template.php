<?php

# Template Class which handles all templating tasks. Displaying views, alerts, errors and view data

class Template
{
	private $data;
	private $alert_types = array('success', 'alert', 'error');
	
	function __construct() {}
	
	/**
	*
	*Loads Spesific URL
	*
	*@access - public
	*@param  - string, string
	*@return - null
	*/
	public function load($url, $title = '')
	{
		if ($title != '') { $this->set_data('page_title', $title); }
		include($url);
	}
	/**
	*
	*Redirects to Spesifc URL
	*
	*@access - public
	*@param  - string
	*@return - null
	*/
	public function redirect ($url)
	{
		header ("Location: $url");
		exit;
	}
	
	#Get/Set data
	
	/**
	*
	*Saves provided data for use by the view later
	*
	*@access - public
	*@param  - string, string, bool
	*@return - null
	*/
	public function set_data($name, $value, $clean = FALSE)
	{
		if ($clean == TRUE)
		{
			$this->data[$name] = htmlentities($value, ENT_QUOTES);
		}
		else 
		{
			$this->data[$name] = $value;
		}
	}
	
	/**
	*
	*Retrives data based on name provided for access by view
	*
	*@access - public
	*@param  - string, bool
	*@return - string
	*/
	public function get_data($name, $echo = TRUE)
	{
		if (isset($this->data[$name]))
		{
			if ($echo)
			{
				echo $this->data[$name];
			}
			else
			{
				return $this->data[$name];
			}
		}
		return '';
	}
	
	#Get/Set alerts
	
	/**
	*
	*Sets an alert message stored within a session
	*
	*@access - public
	*@param  - string, string (Optional)
	*@return - null
	*/
	public function set_alert($value, $type = 'success')
	{
		$_SESSION[$type][] = $value;
	}
	
	/**
	*
	*Returns string containg multiple list items of alerts
	*
	*@access - public
	*@param 
	*@return - string
	*/
	public function get_alerts()
	{
		$data = '';
		foreach($this->alert_types as $alert)
		{
			if (isset($_SESSION[$alert]))
			{
				foreach($_SESSION[$alert] as $value)
				{
					$data .= '<p class="' . $alert . '">' . $value . '</p>';
				}
				unset($_SESSION[$alert]);
			}
		}
		echo $data;
	}
}