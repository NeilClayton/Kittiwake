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
		<form action="#" method="post" name="login" autocomplete="off">
			<h2>Sign in</h2>
			<div class="form-group">
				<label for="email" class="sr-only">Email</label>
				<input type="email" class="form-control" id="email" name="emailusername" placeholder="Enter your email" required autofocus>
			</div>
			<div class="form-group">
				<label for="password" class="sr-only">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
			</div>
			<button type="submit">Submit</button>
			<p>Not registered? <a href="register.php">Create an account</a></p>
		</form>
</body>
</html>