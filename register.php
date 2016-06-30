<?php		
include('app/init.php');
$Template->set_data('page_class', 'register');
	
    if (isset($_REQUEST['submit']))
	{
        extract($_REQUEST);
        $register = $User->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) 
		{
           # Successful Registration
		   $Template->set_alert(' Registration  successful <a href="login.php">Click here</a>" to login');
        } 
		else 
		{
           # Registration Failed
		   $Template->set_alert('Registration failed. Email or Username already exits please try again');
        }
	}

	$Template->load('app/views/v_public_register.php');

