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
						<a role="button" class="button" href="products.php"><i class="fa fa-shopping-basket"></i>Continue Shopping</a>
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
				<form action="#" method="post" class="checkout">
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