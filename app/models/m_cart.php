<?php 

#cart class to handle all tasks related to showing/modifying all items in cart
#The cart automatically keeps track of user selected items using a developed session variable.
#the session variable will hold an array containing the id's and num of selected items. 


#$_SESSION['cart']['product_ID'] 

class Cart
{
	function __construct() {}
	
	
	#Getters and Setters
	
	/**
	*
	*returns an array including all product info
	*
	*@access - public
	*@param  
	*@return - array, null
	*/
	public function get()
	{
		if (isset($_SESSION['cart']))
		{
			#get all product ids of items in the cart
			$ids = $this->get_ids();
			
			# use the list of ids to get product information
			global $Products;
			return $Products->get($ids);
		}
		return NULL;
	}
	
	/**
	*
	*returns an array of all product ids in cart
	*
	*@access - public
	*@param  
	*@return 
	*/
	public function get_ids()
	{
		if (isset($_SESSION['cart']))
		{
			return array_keys($_SESSION['cart']);
		}
		return NULL;
	}
	
	/**
	*
	*Adds item to the cart
	*
	*@access - public
	*@param  - int, int
	*@return - null
	*/
	public function add($id, $num = 1)
	{
		$cart = array();#retrive or set the cart. 
		if (isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart'];
		}
		if (isset($cart[$id]))#check if the item is already in the cart 
		{
			#if the item is in the cart. 
			$cart[$id] = $cart[$id] + $num;
		}
		else
		{
			#if the item is not in the cart
			$cart[$id] = $num;
		}
		$_SESSION['cart'] = $cart;
	}
	
	/**
	*
	*Update the quantity of a spesifc item
	*
	*@access - public
	*@param  - int, int
	*@return - null
	*/
	public function update($id, $num)
	{
		if ($num == 0 OR $num <= 0 )
		{
			unset($_SESSION['cart'][$id]);
			if (empty($_SESSION['cart'])) 
			{ 
				unset($_SESSION['cart']); 
			} 
		}
		else 
		{
			$_SESSION['cart'][$id] = $num; 
		}
	}
	
	/**
	*
	*Empties all items from cart
	*
	*@access - public
	*@param  
	*@return - null
	*/
	public function empty_cart()
	{
		unset($_SESSION['cart']);
	}
	
	/**
	*
	*returns a total number of all items in cart
	*
	*@access - public
	*@param  
	*@return - int
	*/
	public function get_total_items()
	{
		$num = 0;
		
		if (isset($_SESSION['cart']))
		{
			foreach($_SESSION['cart'] as $item)
			{
				$num = $num + $item;
			}
		}
		return $num;
	}
	
	/**
	*
	*return the total cost of all items in cart
	*
	*@access - public
	*@param  
	*@return - int
	*/
	public function get_total_cost()
	{
		$num = '0.00';
		if (isset($_SESSION['cart']))
		{
			#if there are items to display 
			
			#get product ids
			$ids = $this->get_ids();
			
			#get product prices
			global $Products;
			$prices = $Products->get_prices($ids);
			
			#loop throih adding the cost of each item and timesing it by the number of item in the cart. 
			if($prices != NULL)
			{
				foreach($prices as $price)
				{
					$num += doubleval($price['price'] * $_SESSION['cart'][$price['id']]);
				}
			}
		}
		return $num;
	}
	
	/**
	*
	*return shipping cost based on cost of items
	*
	*@access - public
	*@param  - double
	*@return - double
	*/
	public function get_shipping_cost($total)
	{
		if ($total > 20)
		{
			return 2.00;
		}
		else if ($total > 50)
		{
			return 0.00;
		}
	}
	
	# Create page parts 
	/**
	*
	*returns a string containing list items for each product in cart
	*
	*@access - public
	*@param  
	*@return - string
	*/
	public function create_cart()
	{
		#get products currently in cart
		$products = $this->get();
		
		$data = '';
		$total = 0;
		
		$data .= '<div class="cart-1"><li class="header_row"><div class="col1">Product Name:</div><div class="col2">Quantity:</div><div class="col3">Product Price:</div><div class="col4">Total Price:</div></li>';
		
		
		if ($products != '')
		{
			#products to display
			$line = 1;
			$shipping = 0; 
			
			foreach($products as $product)
			{
				#create a new item in the cart
				$data .= '<li';
				if ($line % 2 == 0)
				{
					$data .= ' class="alt"';
				}
				$data .= '><div class="col1">' . $product['name'] . '</div>';
				$data .= '<div class="col2"><input name="product' . $product['id'] . '" value="' . $_SESSION['cart'][$product['id']] .'"></div>';
				$data .= '<div class="col3">&#163;' . $product['price'] . '</div>';
				$data .= '<div class="col4">&#163;' . $product['price'] * $_SESSION['cart'][$product['id']] . '</div></li>';
				
				$shipping += ($this->get_shipping_cost($product['price']) * $_SESSION['cart'][$product['id']]);
				
				$total += $product['price'] * $_SESSION['cart'][$product['id']];
				$line++;
			}
			#add subtotal row
			$data .= '<li class="subtotal_row"><div class="col1">Subtotal:</div><div class="col2">&#163;' . $total . ' </div></li>';
		
			#add shipping row
			$data .= '<li class="shipping_row"><div class="col1">Shipping cost:</div><div class="col2">&#163;' . number_format($shipping, 2) . ' </div></li>';
		
			#add tax row
			if (SHOP_TAX > 0)
			{
				$data .= '<li class="taxes_row"><div class="col1">VAT: (' .(SHOP_TAX * 100) . '%):</div><div class="col2">&#163;' . number_format(SHOP_TAX *  $total, 2) . '</div></li>';
			}
		
			#add total row
			$data .= '<li class="total_row"><div class="col1">Total:</div><div class="col2">&#163;' . $total . ' </div></li>';
		}
		else
		{
			#no products to display
			$data .= '<li><strong>No items are in the cart!</strong></li></div>';
		
			#add subtotal row
			$data .= '<div class="cart2"><li class="subtotal_row"><div class="col1">Subtotal:</div><div class="col2">&#163;0.00</div></li>';
		
			#add shipping row
			$data .= '<li class="shipping_row"><div class="col1">Shipping cost:</div><div class="col2">&#163;0.00 </div></li>';
			
			#add tax row
			if (SHOP_TAX > 0)
			{
				$data .= '<li class="taxes_row"><div class="col1">VAT: (' .(SHOP_TAX * 100) . '%):</div><div class="col2">&#163;0.00</div></li></div>';
			}
			
			
			#add total row
			$data .= '<li class="total_row"><div class="col1">Total:</div><div class="col2">&#163;0.00</div></li>';
		}
		
		
		
		return $data;
	}
}
