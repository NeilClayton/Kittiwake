<!DOCTYPE html>
<html>
<head>
    <title><?php $this->get_data('page_title'); ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="./JS/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/71ebc9e44c.js"></script>
    <link href="./css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jacques+Francois' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="login">
	<form action="#" method="post" name="reg">
        <h2>Create an account</h2>
		<ul class="alerts">
		<?php $this->get_alerts();?> 
		</ul>
        <div class="form-group">
            <label for="fullname" class="sr-only">Fullname:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your name" required autofocus>
        </div>
        <div class="form-group">
            <label for="username" class="sr-only">Username:</label>
            <input type="text" class="form-control" id="username" name="uname" placeholder="Enter a username" required>
        </div>
        <div class="form-group">
            <label for="email" class="sr-only">Email Address:</label>
            <input type="email" class="form-control" id="email" name="uemail" placeholder="Enter your email address" required>
        </div>
        <div class="form-group">
            <label for="password1" class="sr-only">Password:</label>
            <input type="password" class="form-control" id="password" name="upass" placeholder="Enter a password" required>
        </div>
       <!-- <div class="form-group">
            <label for="password2" class="sr-only">Confirm Password:</label>
            <input type="password" class="form-control" id="password2" name="upass2" placeholder="Confirm the password" required>
        </div>-->
        <button type="submit" name="submit">Register</button>
        <p>Already have an account? <a href="login.php">Log in!</a></p>
    </form>

</body>
</html>