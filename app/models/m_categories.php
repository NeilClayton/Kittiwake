<?php

#Categories Class (handles all tasks related to retriving and displaying categories)

class Categories
{
	private $Database;
	private $db_table = 'tbl_categories';
	
	function __construct()
	{
		global $Database;
		$this->Database = $Database;
	}
	
	# Set/Get Categories from database
	
	/**
	*
	*Return an array with category information
	*
	*@access - public
	*@param  - int (optional)
	*@return - array
	*/
	public function get_categories($id = NULL)
	{
		$data = array();
		if ($id != NULL)
		{
			#get spesific category
			if ($stmt = $this->Database->prepare ("SELECT id, name FROM " . $this->db_table . " WHERE id = ? LIMIT 1"))
			{
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->store_result();
				
				$stmt->bind_result($cat_id, $cat_name);
				$stmt->fetch();
				
				if ($stmt->num_rows > 0)
				{
					$data = array ('id' => $cat_id, 'name' => $cat_name);
				}
				$stmt->close();
			}
		}
		else
		{
			#get all catagory
			if ($result = $this->Database->query("SELECT * FROM " . $this->db_table . " ORDER BY name"))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $result->fetch_array())
					{
						$data[] = array('id' => $row['id'], 'name' => $row['name']); 
					}
				}
			}
			
		}
		return $data;
	}
	
	
	# creation of page parts. 
	
	/**
	*
	*Return an unordered list of links to all category pages
	*
	*@access - public
	*@param  - string (optional)
	*@return - string
	*/
	
	public function create_category_nav($active = NULL)
	{
		#getting all categories
		$categories = $this->get_categories();
		
		# set up 'all' item
		$data = '<nav class="navbar navbar-default navbar-static-top" data-spy="affix" data-offset-top="150">
					<div class="container-fluid">
					        <div class="navbar-header">
            					<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" role="button" aria-haspopup="true">
                					<span class = "icon-bar"></span>
                					<span class = "icon-bar"></span>
                					<span class = "icon-bar"></span>
            					</a>
        					</div>
        			<div class="collapse navbar-collapse" id="navbar">
        				<ul class="nav navbar-nav">
        					<li><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products&nbsp;<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li';
								$data .= '><a href="' . SITE_PATH . '">View All</a></li>';


								# loop through each category
								if ( ! empty($categories))
								{
									foreach($categories as $category)
									{
										$data .= '<li';
											if (strtolower($active) == strtolower($category['name']))
											{
												$data .= ' class ="active"';
											}
											$data .= '><a href="' . SITE_PATH . 'index.php?id=' . $category['id'] . '">' . $category['name'] . '</a></li>';
									}
									$data .= '</ul></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Contact</a></li>
						</ul>
					</div>
					</div>
				</nav>';
								}
								return $data;
	}
}
