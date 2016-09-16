<!DOCTYPE html>
<html>
	<head>
	<title><?php $this->get_data('page_title'); ?></title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="./JS/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/71ebc9e44c.js"></script>
		<link href="./css/styles.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Jacques+Francois' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body class="<?php $this->get_data('page_class');?>">
	<nav class="navbar-static-top top-nav">
		<div class="container-fluid">
			<ul class="pull-right">
				<?php
				if (isset($_SESSION['login']))
				{
					echo '<a class="sign-in" href="login.php?q=logout"><i class="fa fa-user" aria-hidden="true"></i>Log out</a>';
				}
				else
				{
					echo '<a class="sign-in" href="login.php"><i class="fa fa-user" aria-hidden="true"></i>Sign in</a>';
				}
				?>
				<?php
					$items = $this->get_data('cart_total_items', FALSE);
					$price = $this->get_data('cart_total_cost', FALSE);
					if ($items == 1)
					{
						echo '<li>' . $items . ' item (&#163;' .$price. ') in your';
					}
					else
					{
						echo '<li>' . $items . ' items (&#163;' .$price. ') in your';
					}?>
				<a href="<?php echo SITE_PATH;?>cart.php">basket</a></li>
				<li>
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" placeholder="Search" autofocus>
				</li>
			</ul>
		</div>
		<header>
			<h2><?php echo SITE_NAME; ?></h2>
		</header>
	</nav>

				<?php $this->get_data('page_nav'); ?>
	

