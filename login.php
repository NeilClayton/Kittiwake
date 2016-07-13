<?php		
include('app/init.php');
$Template->set_data('page_class', 'login');


	if (isset($_REQUEST['submit'])) 
	{ 
		extract($_REQUEST); 
	    $login = $User->check_login($emailusername, $password);
	    if ($login) 
		{
			$name = $User->get_fullname($_SESSION['login']);
	        # Login Success
			$Template->set_alert('<p class="text-success">Welcome back</p>');
			$Template->redirect(SITE_PATH . 'cart.php');
	    } 
		else 
		{
	        # Login Failed
			$Template->set_alert('<p class="text-danger">Sorry you have entered incorrect login details please try again</p>');
	    }
	}
	if (isset($_GET['q']))
	{
		$User->user_logout();
		header("location:login.php");
    }

$Template->load('app/views/v_public_login.php');

