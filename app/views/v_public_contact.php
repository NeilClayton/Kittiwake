<?php include("includes/public_header.php"); ?>
	<div class="container-fluid">
		<div class="row intro">
			<div class="col-md-10 col-md-offset-1">
				<h1>Contact Us</h1>
				<p>If you wish to contact us, please do so using the form provided below.</p>
			</div>
		</div>
		<div class="row contact">
			<div class="col-sm-10 col-md-8 col-md-offset-2">
				<form>
					<div class="form-group">
						<label for="name">Name<b class="asterisk">*</b></label>
						<input type="text" class="form-control" id="name" placeholder="Please enter your full name" required>
					</div>
					<div class="form-group">
						<label for="email-address">Email<b class="asterisk">*</b></label>
						<input type="email" id="email-address" class="form-control" placeholder="Please enter your e-mail address" required>
					</div>
					<div class="form-group">
						<label for="mobile-number">Mobile No</label>
						<input type="text" id="mobile-number" class="form-control" placeholder="Please enter your mobile number">

					</div>
					<div class="form-group">
						<label for="subject">Subject<b class="asterisk">*</b></label>
						<select class="form-control" id="subject" required>
							<option value="">...</option>
							<option value="General">General Issue</option>
							<option value="Payment">Transaction Issue</option>
							<option value="Product">Product Issue</option>
							<option value="Delivery">Delivery Issue</option>
							<option value="User">User Account Issue</option>

						</select>
					</div>
					<div class="form-group">
						<label for="message">Message<b class="asterisk">*</b></label>
						<textarea class="form-control" id="message" rows="7" cols="100" maxlength="600" required placeholder="Please explain the nature of your enquiry"></textarea>
					</div>
					<div class="form-group">
						<label>
							<input type="checkbox" required>&nbsp;&nbsp;I agree to the <a href="terms.html" target="_blank">Terms and Conditions</a>
						</label>
					</div>
					<button type="submit" class="btn btn-success" name="submit">Submit&nbsp;&nbsp;<i class="fa fa-send"></i></button>
				</form>
			</div>
		</div>
	</div>
	
<?php include("includes/public_footer.php"); ?>