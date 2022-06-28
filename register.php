<!DOCTYPE html>
<html>
<?php 
include("register-backend.php"); 
?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign Up</title>
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
	<!-- Send error message if register failed -->
    <?php 
    if(!empty($login_error)){
        echo '<div class="alert alert-danger">' . $login_error . '</div>';
    }        
    ?>
	<!-- Check given values (username and password), if not correct (i.e. username has been already used or password does not match), display error message -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="card">
        <label>Username<br></label>
        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <br><span class="invalid-feedback"><?php echo $username_error; ?></span>
        <br>
        <br>
            <div class="form-group">
                <label>Password<br></label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <br><span class="invalid-feedback"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <label><br>Confirm Password<br></label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <br><span class="invalid-feedback"><?php echo $confirm_password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sign Up">
            </div>
			<p>Already have an account? <a href="login.php">Login here</a>.</p>
	</form>
    </div>
</body>
</html>