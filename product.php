<?php

include('app/init.php');
$Template->set_data('page_class', 'product');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	#show product
	
	#check validity of product
	$product = $Products->get($_GET['id']);
	
	if ( ! empty($product))
	{
		#pass data to the view
		$Template->set_data('prod_id', $_GET['id']);
		$Template->set_data('prod_name', $product['name']);
		$Template->set_data('prod_description', $product['description']);
		$Template->set_data('prod_price', $product['price']);
		$Template->set_data('prod_image', IMAGE_PATH . $product['image']);
		
		#show other products
		$products = $Products->create_five_product_table();
		$Template->set_data('products', $products);
		
		#create category nav
		$category_nav = $Categories->create_category_nav($product['category_name']);
		$Template->set_data('page_nav', $category_nav);
		
		#diplay view
		$Template->load('app/views/v_public_product.php', $product['name']);
	}
	else
	{
		#show error
		$Template->redirect(SITE_PATH);
	}
}
else
{
	#show error
	$Template->redirect(SITE_PATH);
}