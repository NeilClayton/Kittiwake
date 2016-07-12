<?php include("includes/public_header.php"); ?>

<div class="container-fluid">
	<div class="row intro">
		<div class="col-md-10 col-md-offset-1">
			<h1><?php $this->get_data('prod_name');?></h1>
			<p>Hover over the card to open it, change the text inside to see what your card will look like.</p>
			<a role="button" class="h-button" href="category.php"><i class="fa fa-chevron-left" aria="hidden=true"></i>Products</a>
		</div>
	</div>
	<div class="row products">
		<div class="col-md-12">
			<div class="l-product">
				<div class="card">
					<div class="front face">
						<img src="<?php $this->get_data('prod_image'); ?>" alt="<?php $this->get_data('prod_name'); ?>" class="img-responsive" width="290" height="290">
					</div>
					<div class="back face">
						<p><input type="text" value="To Joe Bloggs">,</p>
						<h3><textarea cols="25" rows="5">Message here</textarea></h3>
						<h4> <input type="text" value="Love, Sarah"></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row details">
		<div class="col-md-12">
			<h2><?php $this->get_data('prod_name');?></h2>
			<p><?php $this->get_data('prod_description');?></p>
			<h5>&#163;<?php  $this->get_data('prod_price'); ?></h5>
			<a href="cart.php?id=<?php $this->get_data('prod_id');?>" role="button" class="a-button"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Add To Basket</a>
		</div>
	</div>
</div>
<?php include("includes/public_footer.php"); ?>