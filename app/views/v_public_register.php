<?php include("includes/public_header.php"); ?>

<div id ="content">
	<h2>Sign Up</h2>
	
	<ul class="alerts">
		<?php $this->get_alerts();?> 
	</ul>
	
	<form action="" method="post" name="reg">
                <table>
                    <tr>
                        <th>Full Name:</th>
                        <td><input type="text" name="fullname" required></td>
                    </tr>
                    <tr>
                        <th>User Name:</th>
                        <td><input type="text" name="uname" required></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><input type="text" name="uemail" required></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td><input type="password" name="upass" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Register"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>You're already signed up! <a href="login.php">Click Here!</a></td>
                    </tr> 
                </table>
            </form>
		
</div>
<?php include("includes/public_footer.php"); ?>