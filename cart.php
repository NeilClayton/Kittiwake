<?php

include('app/init.php');
$Template->set_data('page_class', 'shoppingcart');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	#check vadility of item.
	if( ! $Products->product_exists($_GET['id']))
	{
		$Template->set_alert('<p class="text-danger">Sorry, the item you have selected is invalid.</p>');
		$Template->redirect(SITE_PATH . 'cart.php');
	}

	#adding the item to the cart
	if (isset($_GET['num']) && is_numeric($_GET['num']))
	{
		$Cart->add($_GET['id'], $_GET['num']);
		$Template->set_alert('<p class="text-success">The items have been successfully added to your basket!</p>');
	}
	else
	{
		$Cart->add($_GET['id']);
		$Template->set_alert('<p class="text-success">This item has been successfully added to your basket!</p>');
	}
	$Template->redirect(SITE_PATH . 'cart.php');
}

if (isset($_GET['empty']))
{
	$Cart->empty_cart();
	$Template->set_data('cart_total_items', 0);
	$Template->set_data('cart_total_cost', 0.00);
	$Template->set_alert('<p class="text-info">Your basket is now empty.</p>');
	$Template->redirect(SITE_PATH . 'cart.php');
}

if (isset($_POST['update']))
{
	#get all ids of products in cart
	$ids = $Cart->get_ids();
	#ensure there are id to work with
	if ($ids != NULL)
	{
		foreach ($ids as $id)
		{
			if (is_numeric($_POST['product' . $id]))
			{
				$Cart->update($id, $_POST['product' . $id]);
			}
		}
	}
	#alert that everything was completed successfully
	$Template->set_data('cart_total_items', $Cart->get_total_items());
	$Template->set_data('cart_total_cost', $Cart->get_total_cost());
	$Template->set_alert('<p class="text-info">The number of items in the cart have been updated.</p>');

}

#get items in cart
$display = $Cart->create_cart();
$Template->set_data('cart_rows', $display[0]);
$Template->set_data('cart_paypal', $display[1]);

#get category nav
$category_nav = $Categories->create_category_nav('');
$Template->set_data('page_nav', $category_nav);

$Template->load('app/views/v_public_cart.php', 'Shopping Cart');