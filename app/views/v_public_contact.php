<?php include("includes/public_header.php"); ?>
	<ul class="alerts">
	<?php $this->get_alerts();?> 
	</ul>
	
	<div class="container-fluid">
		<div class="">
			<form>
				<div class="form-group">
					<label for="name" class="sr-only">Name&nbsp;<b class="asterisk">*</b></label>
					<input type="text" class="form-control" id="name" placeholder="Who are you?" required>
				</div>
				<div class="form-group">
					<label for="email-address" class="sr-only">Email&nbsp;<b class="asterisk">*</b></label>
					<input type="email" id="email-address" class="form-control" placeholder="Please enter your e-mail address" required>
				</div>
				<div class="form-group">
					<label for="mobile-number" class="sr-only">Mobile No</label>
					<input type="text" id="mobile-number" class="form-control" placeholder="Please enter your mobile number">

				</div>
				<div class="form-group">
					<label for="subject" class="sr-only">Subject&nbsp;<b class="asterisk">*</b></label>
					<select class="form-control" id="subject" required>
						<option value="">...</option>
						<option value="Enquiry">New Enquiry</option>
						<option value="Existing">Existing Solution</option>
					</select>
				</div>
				<div class="form-group">
					<label for="message" class="sr-only">Message</label>
					<textarea class="form-control" id="message" rows="7" cols="100" maxlength="600" required placeholder="Please enter your message"></textarea>
					<p id="countleft"></p><br>
				</div>
				<div class="form-group">
					<label>
						<input type="checkbox" required>&nbsp;&nbsp;I agree to the <a href="terms.html" target="_blank">Terms and Conditions</a>
					</label>
				</div>
				<button type="submit" class="btn btn-success">Submit&nbsp;&nbsp;<i class="fa fa-send"></i></button>
			</form>
		</div>
	</div>
	
<?php include("includes/public_footer.php"); ?>