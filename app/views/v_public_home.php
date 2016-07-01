<?php include("includes/public_header.php"); ?>

	<ul class="alerts">
		<?php $this->get_alerts();?> 
	</ul>

	<div class="container-fluid">
		<div class="row intro">
			<div class="col-md-10 col-md-offset-1">
				<h1>Hand crafted greetings cards</h1>
				<p>We make and sell greetings cards for a whole variety of occasions.</p>
				<a role="button" class="h-button" href="category.php">View Products</a>
			</div>
		</div>
		<div class="row products">
			<div class="col-md-10 col-md-offset-1">
				<h2>Just a few of our products</h2>
				<?php $this->get_data('products');?>
			</div>
			<!--<a role="button" href="category.php">View More</a>-->
		</div>
		<div class="row our-promise row-centered">
			<h2>Why choose us?</h2>
			<div class="col-md-3 col-centered">
				<h3>High Quality</h3>
				<p>Because all of our cards are hand made you can be sure of their quality. We always use high quality materials to produce high quality products.</p>
			</div>
			<div class="col-md-3 col-centered">
				<h3>Personal Touch</h3>
				<p>Want to show someone just how much you care? You can personalise your card with a message, to show that loved one or friend how much they mean to you.</p>
			</div>
			<div class="col-md-3 col-centered">
				<h3>Other Benefit</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non felis vel tellus placerat ornare vel sit amet magna. Suspendisse interdum nec mi nec sagittis.</p>
			</div>
		</div>
		<div class="row cards">
			<div class="col-md-8 col-md-offset-2">
				<p><i class="fa fa-quote-left" aria-hidden="true"></i>Giving someone a card is more than just a gesture, it is a symbol of friendship or love. Let's make that symbol one that they won't quickly forget. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
			</div>
		</div>
	</div>
</div>
<?php include("includes/public_footer.php"); ?>