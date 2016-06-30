<?php include("includes/public_header.php"); ?>

<div id ="content">

	<img src="<?php $this->get_data('prod_image'); ?>" alt="<?php $this->get_data('prod_name'); ?>" class="prod_image">
	<h2><?php $this->get_data('prod_name'); ?></h2>
	<div class="prod_price">&#163;<?php   $this->get_data('prod_price'); ?></div>
	<div class="prod_description"><?php $this->get_data('prod_description');?></div>
	
	<a href="cart.php?id=<?php $this->get_data('prod_id');?>" class="add-cart" role="button">Add to cart</a>

		
</div>
<?php include("includes/public_footer.php"); ?>