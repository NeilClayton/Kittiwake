<?php 

#User tasks to handle all tasks related to the user

class User
{
	private $Database;
	private $db_table = 'tbl_users';
	
	function __construct() 
	{
		global $Database;
		$this->Database = $Database;
	}

	
		public function reg_user($name,$username,$password,$email)
		{
			$password = md5($password);
			$sql="SELECT * FROM $this->db_table WHERE uname='$username' OR uemail='$email'";
			
			#checking if the username or email is available in db
			$check =  $this->Database->query($sql) ;
			$count_row = $check->num_rows;

			#if the username is not in db then insert to the table
			if ($count_row == 0)
			{
				$sql1="INSERT INTO $this->db_table SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
				$result = mysqli_query($this->Database,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else 
			{
				return false;
			}
		}
		
		public function check_login($emailusername, $password)
		{
        	
        	$password = md5($password);
			$sql2="SELECT uid FROM $this->db_table WHERE uname='$emailusername' and upass='$password' OR uemail='$emailusername' and upass='$password'";
			
			#checking if the username is available in the table
        	$result = mysqli_query($this->Database,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) 
			{
	            $_SESSION['login'] = true; 
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
	        else
			{
			    return false;
			}
    	}
		
    	public function get_fullname($uid)
		{
    		$sql3="SELECT fullname FROM $this->db_table WHERE uid = $uid";
	        $result = mysqli_query($this->Database,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}
		
	    public function get_session()
		{    
	        return $_SESSION['login'];
	    }
	    public function user_logout() 
		{
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}