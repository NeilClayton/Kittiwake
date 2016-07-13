<?php include("includes/public_header.php"); ?>
<div class="container-fluid">
	<div class="row intro">
		<div class="col-md-10 col-md-offset-1">
			<h1>Your shopping cart</h1>
			<p>Below is a list of the item/s you wish to purchase.</p>
		</div>
	</div>
	<div class="row cart">
		<div class="col-md-10 col-md-offset-1">
			<ul class="alerts">
				<?php $this->get_alerts();?>
			</ul>
			<ul>
			<?php $this->get_data('products');?>
			</ul>
				<form action="#" method="post">
					<ul class="cart"><?php $this->get_data('cart_rows');?>
					</ul>
					<div class="buttons">
						<a role="button" class="button" href="category.php"><i class="fa fa-shopping-basket"></i>Continue Shopping</a>
						<a role="button" class="a-button" href="?empty"><i class="fa fa-shopping-basket"></i>Empty Basket</a>
						<button type="submit" name="update"><i class="fa fa-shopping-basket"></i>Update Basket</button>
					</div>
				</form>
				<?php
				if (!isset($_SESSION['login']))
				{
					echo '<a role="button" class="button" href="login.php"><i class="fa fa-shopping-bag"></i>Login and Checkout</a>';
				}
				else
				{
				?>
				<form action="<?php echo SHOP_SUBMIT_URL; ?>" method="post" class="checkout">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="business" value="<?php echo SHOP_BUSINESS; ?>">
					<input type="hidden" name="lc" value="GB">
					<input type="hidden" name="currency_code" value="GBP">
					<input type="hidden" name="button_subtype" value="products">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="no_shipping" value="2">
					<input type="hidden" name="rm" value="1">
					<input type="hidden" name="upload" value="1">
					
					<input type="hidden" name="return" value="<?php echo SHOP_SUCCESS_URL; ?>">
					<input type="hidden" name="cancel_return" value="<?php echo SHOP_CANCEL_URL; ?>">
					<input type="hidden" name="notify_url" value="<?php echo SHOP_NOTIFY; ?>"">
					
					<?php $this->get_data('cart_paypal');?>
					
					<img alt="" border="0" src="<?php echo SHOP_PIXEL; ?>" width="1" height="1">
					

					<button type="submit" name="submit" class="button"><i class="fa fa-shopping-paypal"></i>Pay with PayPal</button>
				</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php include("includes/public_footer.php"); ?>