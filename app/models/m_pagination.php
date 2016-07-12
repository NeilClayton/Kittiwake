<?php 

#used to paginate the website products. 
class Pagination
{
	var $data;
	
	public function paginate($values, $per_page)
	{
		$total_values = count($values);
		
		if(isset($_GET['page']))
		{
			$current_page = $_GET['page'];
		}
		else
		{
			$current_page = 1;
		}
		$counts = ceil($total_values / $per_page);
		
		$parami1 = ($current_page - 1) * $per_page;
		$this->data = array_slice($values, $parami1, $per_page);
		
		for ($x=1; $x<= $counts; $x++)
		{
			$numbers[] = $x;
		}
		return $numbers;
	}
	
	public function fetch_results()
	{
		$result = $this->data;
		return $result;
	}
	
}
?>
