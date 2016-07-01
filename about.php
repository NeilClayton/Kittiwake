<?php

include('app/init.php');
$Template->set_data('page_class', 'about');
	
	#get category nav
	$category_nav = $Categories->create_category_nav('home');
	$Template->set_data('page_nav', $category_nav);

	$Template->load('app/views/v_public_about.php', 'Welcome');
