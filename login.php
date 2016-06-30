<?php		
include('app/init.php');
$Template->set_data('page_class', 'login');


	if (isset($_REQUEST['submit'])) 
	{ 
		extract($_REQUEST); 
	    $login = $User->check_login($emailusername, $password);
	    if ($login) 
		{
	        # Login Success
			$Template->set_alert('Welcome back');
			$Template->redirect(SITE_PATH . 'cart.php');
	    } 
		else 
		{
	        # Login Failed
			$Template->set_alert('Sorry you have entered incorrect login details please try again');
	    }
	}
	if (isset($_GET['q']))
	{
		$User->user_logout();
		header("location:login.php");
    }

$Template->load('app/views/v_public_login.php');

