<?php

include('app/init.php');
$Template->set_data('page_class', 'home');

#When the user clicks the log out button
if (isset($_GET['q']))
{
	$user->user_logout();
	$Template->redirect(SITE_PATH . 'login.php');
}

else
{
	#get all products.
	
	#get category nav
	$category_nav = $Categories->create_category_nav('home');
	$Template->set_data('page_nav', $category_nav);

	# get products
	$products = $Products->create_product_table();
	$Template->set_data('products', $products);

	$Template->load('app/views/v_public_home.php', 'Welcome');

}
