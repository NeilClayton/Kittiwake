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
	       $Template->redirect(SITE_PATH . 'cart.php');
		   $Template->set_alert('Welcome back');
	    } 
		else 
		{
	        # Login Failed
			$Template->set_alert('Incorect Password');
	    }
	}

	$Template->load('app/views/v_public_login.php');

