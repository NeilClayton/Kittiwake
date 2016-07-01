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
	</div>
</div>
<?php include("includes/public_footer.php"); ?>