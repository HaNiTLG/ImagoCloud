<!DOCTYPE html>
<html>
<?php 
include("login-backend.php"); 
?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Log In</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<header>
    <a class="title" href="/"><h1>IMAGO CLOUD</h1></a>
    <div class=" header">
        <a class="btn" href="/">HOME</a>
    </div>
</header>

<body class="body">
	<!-- Send error message if login failed -->
    <?php 
    if(!empty($login_error)){
        echo '<div class="alert alert-danger">' . $login_error . '</div>';
    }        
    ?>
	<!-- Check given values (username and password), if not correct, display error message -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="card">
		<label>Username<br></label>
		<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <br><span class="invalid-feedback"><?php echo $username_error; ?></span>
        <br>
        <br>
            <div class="form-group">
                <label><br>Password<br></label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>">
                <br><span class="invalid-feedback"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
	</form>
    </div>
</body>
</html>