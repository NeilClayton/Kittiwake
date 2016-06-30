<!DOCTYPE html>
<html>
	<head>
	<title><?php $this->get_data('page_title'); ?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="resources/css/style.css" media="all" rel="stylesheet" type="text/css">
	</head>
	
	<body class="<?php $this->get_data('page_class');?>">
		<div id="wrapper">
			<div class="secondarynav">
				<strong>
				<?php
					$items = $this->get_data('cart_total_items', FALSE);
					$price = $this->get_data('cart_total_cost', FALSE);
					if ($items == 1)
					{
						echo $items . ' item (&#163;' .$price. ') in cart';
					}
					else
					{
						echo $items . ' items (&#163;' .$price. ') in cart';
					}?>
				</strong> &nbsp;|&nbsp;
				<a href="<?php echo SITE_PATH;?>cart.php">Shopping Cart</a>
				<?php
				if (isset($_SESSION['login']))
				{
					echo '<a href="login.php?q=logout">log out</a>';
				}
				else
				{
					echo '<a href="login.php">log in</a>';
				}
				?>
				
			</div>
			
			<h1><?php echo SITE_NAME; ?></h1>
			
			<ul class="nav">
				<?php $this->get_data('page_nav'); ?>
			</ul>
	

