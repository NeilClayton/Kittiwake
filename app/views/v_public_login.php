<?php include("includes/public_header.php"); ?>

<div id ="content">
	<h2>Login</h2>
	
	<ul class="alerts">
		<?php $this->get_alerts();?> 
	</ul>
	
		<form action="" method="post" name="login">
			<table>
				<tr>
					<th>Username or Email:</th>
					<td><input type="text" name="emailusername" required></td>
				</tr>
				<tr>
					<th>Password:</th>
					<td><input type="password" name="password" required></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><a href="register.php">Sign Up!</a></td>
				</tr>	
			</table>
		</form>
		
</div>
<?php include("includes/public_footer.php"); ?>