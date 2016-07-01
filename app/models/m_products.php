<?php 

# Product Class (Handles all tasks related to retrieving and displaying products)

class Products
{
	private $Database;
	private $db_table = 'tbl_products';
	
	function __construct()
	{
		global $Database;
		$this->Database = $Database;
	}
	
	# Getters / Setters
	
	/**
	*
	*Retrieving product information from database
	*
	*@access - public
	*@param  - int (optional)
	*@return - array
	*/
	public function get($id = NULL)
	{
		$data = array();
		
		if (is_array($id))
		{
			# get products based on array of ids
			$items ='';
			foreach ($id as $item)
			{
				if ($items != '') 
				{ 
					$items .=','; 
				}
				$items .= $item;
			}
			
			if ($result = $this->Database->query("SELECT id, name, description, price, image FROM $this->db_table WHERE id IN ($items) ORDER BY name"))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $result->fetch_array())
					{
						$data[]= array(
							'id' => $row['id'],
							'name' => $row['name'],
							'description' => $row['description'],
							'price' => $row['price'],
							'image' => $row['image']
							);
					}
				}
			}
		}
		else if ($id != NULL)
		{
			# get one spesific products
			if ($stmt = $this->Database->prepare("SELECT 
			$this->db_table.id,
			$this->db_table.name,
			$this->db_table.description,
			$this->db_table.price,
			$this->db_table.image,
			tbl_categories.name AS category_name
			FROM $this->db_table, tbl_categories
			WHERE $this->db_table.id = ? AND $this->db_table.category_id = 
			tbl_categories.id"))
			{
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($prod_id, $prod_name, $prod_description, $prod_price, $prod_image, $cat_name);
				$stmt->fetch();
				
				if ($stmt->num_rows > 0)
				{
					$data = array('id' => $prod_id, 'name' => $prod_name, 'description' => $prod_description, 'price' => $prod_price, 'image' => $prod_image, 'category_name' => $cat_name);
				}
				$stmt->close();
			}
		}
		else
		{
			# get a list of all products
			if ($result = $this->Database->query("SELECT * FROM " . $this->db_table . " ORDER BY name ASC"))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $result->fetch_array())
					{
						$data[] = array('id'=> $row['id'], 'name'=> $row['name'], 'price'=> $row['price'], 'image'=> $row['image']);
						
					}
				}
			}
		}
		return $data;
	}
	
	# obtaining products for spesific categories 
	
	/**
	*
	*retrive product data from database from all products in a spesified category. 
	*
	*@access - public
	*@param  - int 
	*@return - string
	*/
	public function get_in_category($id)
	{
		$data = array();
		if ($stmt = $this->Database->prepare("SELECT id, name, price, image FROM " . $this->db_table . " WHERE category_id = ? ORDER BY name"))
		{
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->store_result();
			
			$stmt->bind_result($prod_id, $prod_name, $prod_price, $prod_image);
			while ($stmt->fetch())
			{
				$data[] = array(
					'id' => $prod_id,
					'name' => $prod_name,
					'price' => $prod_price,
					'image' => $prod_image);
			}
			$stmt->close();
		}
		return $data;
	}
	
	/**
	*
	* Return and array of price info for spesificed ids
	*
	*@access - public
	*@param  - array
	*@return - array
	*/
	public function get_prices($ids)
	{
		$data = '';
		
		#create a comma sepearated list
		$items = '';
		foreach($ids as $id)
		{
			if ($items != '')
			{
				$items .= ',';
			}
			$items .= $id;
		}
		
		#get multiple product info based on their ids
		if ($result = $this->Database->query("SELECT id, price FROM $this->db_table WHERE id IN ($items) ORDER BY name"))
		{
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_array())
				{
					$data[] = array(
					'id' => $row['id'],
					'price' => $row['price'],
					);
				}
			}
		}
		return $data;
	}
	
	# checks if the products exists in the database
	
	/**
	*
	* Check to ensure product exists
	*
	*@access - public
	*@param  - int 
	*@return - bool
	*/
	public function product_exists($id)
	{
		if ($stmt = $this->Database->prepare("SELECT id FROM $this->db_table WHERE id = ?" ))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id);
			$stmt->fetch();
			
			if($stmt->num_rows > 0)
			{
				$stmt->close();
				return TRUE;
			}
			$stmt->close();
			return FALSE;
		}
	}
	
	# creation of page elements 
	
	/**
	*
	*Creating a Product Table using data from database
	*
	*@access - public
	*@param  - int (optional), int (optional)
	*@return - string
	*/
	public function create_product_table($cols = 4, $category = NULL)
	{
		#Retrieving Products
		if ($category != NULL)
		{
			#get products from a spesific category
			$products = $this->get_in_category($category);
		}
		else
		{
			$products = $this->get();
		}
		$data = '';
		#loop through each product
		if (! empty($products))
		{
			$i = 1;
			foreach ($products as $product)
			{
				$data .= '<div class="product"';
				if ($i == $cols) 
				{
					$data .= ' class="last"';
					$i = 0;
				}
				$data .= '><a href="' . SITE_PATH . 'product.php?id=' . $product['id'] . '">';
				$data .= '<img src="' . IMAGE_PATH . $product['image'] . '" alt="' . $product['name'] . '" class="img-responsive center-block" width="160" height="160">';
				$data .= '<p>' . $product['name'] . '</a><br>£ ' .  $product['price'] . '</p>';
				$data .= '<a class="add-cart" href="' . SITE_PATH . 'cart.php?id=' . $product['id'] . '" role="button">Add To Basket</a></div>';
				$i++;
			}
		}
		return $data;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}