<?php

include('app/init.php');
$Template->set_data('page_class', 'category');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	#get products from a spesific category. 
	
	$category = $Categories->get_categories($_GET['id']);
	
	#create a name variable for the category
	
	#check validity of category ID
	if ( ! empty($category))
	{
		if (! isset($_GET['page']))
			{
				$Template->redirect(SITE_PATH . 'category.php?id=' . $_GET['id'] . '&page=1');
			}
			
		#get category nav
		$category_nav = $Categories->create_category_nav($category['name']);
		$Template->set_data('page_nav', $category_nav);
		
		#get all product from that category
		$products = $Products->get_in_category($_GET['id']);
		
		if (!isset($_REQUEST['show']))
		{
			$products_per_page = 10;
		}
		else
		{
			extract($_REQUEST);
			if ($_POST['items_per_page'] != 0)
			{
				$products_per_page = $_POST['items_per_page'];
			}
		}

		$numbers = ($Pagination->paginate($products, $products_per_page));
		$result = $Pagination->fetch_results();
		$combined_data = "";
		
		foreach ($result as $res)
		{
			$prod_id = "";
			$prod_name = "";
			$prod_value = "";
			
			foreach ($res as $key => $value) 
			{
				
				switch ($key) 
				{
					case "id";
						$prod_id = $value;
						break;
					case "name":
						$prod_name = $value;
						break;
					case "price":
						$prod_value = $value;
						break;
					case "image":
						$data = '<div class="product">';
						$data .= '<img src="' . IMAGE_PATH . $value . '" alt="' . $value . '" class="img-responsive center-block" width="160" height="160">';
						$data .= '<a href="' . SITE_PATH . 'product.php?id=' . $prod_id . '">';
						$data .= '<p>' . $prod_name . '</a><br>£ ' . $prod_value . '</p>';
						$data .= '<a class="add-cart" href="' . SITE_PATH . 'cart.php?id=' . $prod_id . '" role="button"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Add To Basket</a>';
						$data .='</div>';
						$combined_data .= $data;
						break;
				}
			}
		}
		
		$cat_products = $combined_data;
		
		if ( ! empty($cat_products))
		{
			$Template->set_data('products', $cat_products);
			
			$page_navigation = "<nav><ul class='pagination'>";
			$cat = $_GET['id'];
			$page= $_GET['page'];
			$prev = $page -1;
			$next = $page +1;
					
				if ($prev >= 1)
				{
					$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?id=' . $cat . '&page=' . $prev . '">&#8592;</a></li>';
				}
				foreach ($numbers as $num)
				{
					if ($page == $num)
					{
						$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?id=' . $cat . '&page=' . $num . '" class="active"> '. $num .' </a></li>';
					}
					else
					{
						$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?id=' . $cat . '&page=' . $num . '"> '. $num .' </a></li>';
					}
				}
				if ($next <= $num)
				{
					$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?id=' . $cat . '&page=' . $next . '">&#8594;</a></li>';
				}				
			echo "</ul></nav>";
			$Template->set_data('page_navigation', $page_navigation);
		}
		else
		{
			$Template->set_data('products', '<li>No products exist in this category</li>');
			
		}
		$Template->load('app/views/v_public_category.php', $category['name']);
	}
	else
	{
		#if categories isn't valid
		$Template->redirect(SITE_PATH);
	}
}
else 
{

#get all products.
	$products = $Products->get();
	
	if (!isset($_REQUEST['show']))
	{
		$products_per_page = 10;
	}
	else
	{
		extract($_REQUEST);
		if ($_POST['items_per_page'] != 0)
		{
			$products_per_page = $_POST['items_per_page'];
		}
	}

	$numbers = ($Pagination->paginate($products, $products_per_page));
	$result = $Pagination->fetch_results();
	$combined_data = "";
	
	foreach ($result as $res)
	{
		$prod_id = "";
		$prod_name = "";
		$prod_value = "";
		foreach ($res as $key => $value) 
		{
			switch ($key) 
			{
				case "id";
					$prod_id = $value;
					break;
				case "name":
					$prod_name = $value;
					break;
				case "price":
					$prod_value = $value;
					break;
				case "image":
					$data = '<div class="product">';
					$data .= '<img src="' . IMAGE_PATH . $value . '" alt="' . $value . '" class="img-responsive center-block" width="160" height="160">';
					$data .= '<a href="' . SITE_PATH . 'product.php?id=' . $prod_id . '">';
					$data .= '<p>' . $prod_name . '</a><br>£ ' . $prod_value . '</p>';
					$data .= '<a class="add-cart" href="' . SITE_PATH . 'cart.php?id=' . $prod_id . '" role="button"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Add To Basket</a>';
					$data .='</div>';
					$combined_data .= $data;
					break;
			}
		}
	}
			$products = $combined_data;
			$Template->set_data('products', $products);

			$page_navigation = "<nav><ul class='pagination'>";
			if (! isset($_GET['page']))
			{
				$Template->redirect(SITE_PATH . 'category.php?page=1');
			}
			$page= $_GET['page'];
			$prev = $page -1;
			$next = $page +1;
			
			if ($prev >= 1)
			{
				$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?page=' . $prev. '">&#8592;</a><li>';
			}	
			foreach ($numbers as $num)
			{
				if($page == $num)
				{
					$page_navigation .= '<li><a  href="' . SITE_PATH . 'category.php?page=' . $num . '" class="active"> '. $num .' </a><li>';
				}
				else
				{
					$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?page=' . $num . '"> '. $num .' </a><li>';
				}
			}		
			if ($next <= $num)
			{
				$page_navigation .= '<li><a href="' . SITE_PATH . 'category.php?page=' . $next. '">&#8594;</a><li>';
			}
			
			echo "</ul></nav>";

			
	$Template->set_data('page_navigation', $page_navigation);

	#get category nav
	$category_nav = $Categories->create_category_nav();
	$Template->set_data('page_nav', $category_nav);


	$Template->load('app/views/v_public_category.php', 'View All');
}