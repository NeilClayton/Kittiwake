<?php include("includes/public_header.php"); ?>
<div class="container-fluid">
	<div class="row cart">
		<div class="col-md-10 col-md-offset-1">
			<h2>Shopping Cart</h2>
			<ul class="alerts">
				<?php $this->get_alerts();?>
			</ul>
			<ul>
			<?php $this->get_data('products');?>
			</ul>
			<form action="#" method="post">
				<ul class="cart"><?php $this->get_data('cart_rows');?>
				</ul>
				<div class="buttons_row">
					<a role="button" class="button" href="?empty"><i class="fa fa-shopping-cart"></i>Empty Cart</a>
					<button type="submit" name="update" class="button"><i class="fa fa-shopping-cart"></i>Update Cart</button>
				</div>
			</form>
			<form action="#" method="post">
				<div class="submit_row">
					<input type="submit" name="submit" class="button" value="Pay with PayPal">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include("includes/public_footer.php"); ?>