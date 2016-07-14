<?php include("includes/public_header.php"); ?>

	<ul class="alerts">
		<?php $this->get_alerts();?> 
	</ul>

<div class="container-fluid">
	<div class="row intro">
		<div class="col-md-10 col-md-offset-1">
			<h1>Thank you!</h1>
			<p>Thank you for having purchased at Kittiwake Cards.</p>
		</div>
	</div>
	<div class="row thankyou">
		<div class="col-md-10 col-md-offset-1">
			<h2>You could recommend us to a friend.</h2>
			<div class="icons">
				<a href="#" class="icon facebook">
					<i class="fa fa-facebook" aria-hidden="true"></i>
				</a>
				<a href="#" class="icon twitter">
					<i class="fa fa-twitter" aria-hidden="true"></i>
				</a>
				<a href="#" class="icon youtube">
					<i class="fa fa-youtube" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row products">
		<div class="col-md-10 col-md-offset-1">
			<h2>Or continue browsing...</h2>
			<?php $this->get_data('products');?>
		</div>
	</div>
	<div class="row s-contact">
		<div class="col-md-10 col-md-offset-1">
			<h2>Your order</h2>
			<p>If you would like to contact us regarding your order, click the button below.</p>
			<a role="button" href="contact.php">Contact Page</a>
		</div>
	</div>
</div>
<?php include("includes/public_footer.php"); ?>