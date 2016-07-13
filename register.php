<?php		
include('app/init.php');
$Template->set_data('page_class', 'register');
if (isset($_REQUEST['submit']))
{
	extract($_REQUEST);
	if ($upass != $upass2)
	{
		# Incorrect Password 
		$Template->set_alert('<p class="text-danger">The passwords inserted do not match. Please check the passwords and register again</p>');
	}
	else
	{
		$register = $User->reg_user($fullname, $uname, $upass, $uemail);
		if ($register) 
		{
			# Successful Registration
			$Template->set_alert('<p class="text-success">Registration  successful <a href="login.php">Click here</a> to login</p>');
		} 
		else 
		{
			# Registration Failed
			$Template->set_alert('<p class="text-danger">Registration failed. Email or Username already exits please try again</p>');
		}

	}
}

$Template->load('app/views/v_public_register.php');
