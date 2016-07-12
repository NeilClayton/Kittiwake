<?php include("includes/public_header.php"); ?>
	<div class="container-fluid">
		<div class="row intro">
			<div class="col-md-10 col-md-offset-1">
				<h1>Browse Products</h1>
				<p>Below you can browse greetings cards either all or by category.</p>
			</div>
		</div>
		<div class="row products">
			<div class="col-md-10 col-md-offset-1">
				<h2>Browse our products</h2>
				
				<?php $this->get_data('products');?>
			</div>
		</div>
		<div class="row pagnav">
			<div class="col-md-6 col-md-offset-1">
				<form action="#" method="post" name="items_on_page">
					<select name="items_per_page" id="select_cat">
						<option selected disabled>Show items per page</option>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
					</select>
					<button type="submit" name="show" id="update_cat" disabled>Update</button>
				</form>
			</div>
			<div class="col-md-4">
				<?php $this->get_data('page_navigation');?>
			</div>
		</div>
	</div>
<?php include("includes/public_footer.php"); ?>