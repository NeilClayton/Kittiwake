<?php

# INIT basic configuration settings

#connecting to database
$server = 'localhost';
$db_username = 'kennyadmin';
$db_password = 'soddit';
$db = 'db_shopping_cart';
$Database = new mysqli($server, $db_username, $db_password, $db);

#error reporting
mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

#set up constants (things that will be used constantly)
define('SITE_NAME', 'Kittiwake Cards');
define('SITE_PATH', 'http://localhost:8080/Kittiwake/');
define('IMAGE_PATH', 'http://localhost:8080/Kittiwake/resources/images/');

define('SHOP_TAX', 0.21);

#Include Objects
include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_products.php');
include('app/models/m_cart.php');

#Instatiating Objects
$Template = new Template();
$Categories = new Categories();
$Products = new Products();
$Cart = new Cart();

session_start();

#global 
$Template->set_data('cart_total_items', $Cart->get_total_items());
$Template->set_data('cart_total_cost', $Cart->get_total_cost());

?>