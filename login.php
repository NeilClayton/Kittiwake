<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kittiwake Cards - Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="JS/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="https://use.fontawesome.com/71ebc9e44c.js"></script>
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Jacques+Francois' rel='stylesheet' type='text/css'>
</head>
<body id="login">
    <form method="post" action="#" autocomplete="off">
        <div class="form-group">
            <label class="sr-only" for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required autofocus>
        </div>
        <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <p>Not registered? <a href="register.php">Create an account</a></p>
    </form>
</body>
</html>