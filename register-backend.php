<?php
/* Start the session */
require_once "config.php";
 
/* Initialize variables with empty values */
$username = $password = $confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";
 
/* Getting the submitted form from the register and processing the request */
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    /* Is username empty or has it invalid chracters? */
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_error = "Username can only contain letters, numbers, and underscores.";
    } else{
        /* Prepare a select statement from the databse */
        $sql = "SELECT id FROM useraccounts WHERE username = ?";
        
        if($stmt = mysqli_prepare($databaselinking, $sql)){
            /* Bind variables to the prepared statement as parameters */
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            /* Set parameters */
            $param_username = trim($_POST["username"]);
            
            /* Attempt to execute the prepared statement */
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_error = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            /* Closing the statement */
            mysqli_stmt_close($stmt);
        }
    }
    
    /* Is password empty? */
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    /* Checking if confirm password is not empty and if the password match */
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Password did not match.";
        }
    }
    
    /* Check if inputs are emtpy or any imput errors before storing in the SQL database */
    if(empty($username_err) && empty($password_error) && empty($confirm_password_error)){
        
        /* Prepare an insert statement to the databse */
        $sql = "INSERT INTO useraccounts (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($databaselinking, $sql)){
            /* Bind variables to the prepared statement as parameters */
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            /* Setting the parameters now */
            $param_username = $username;
			/* Important: password must be hashed for extra security layer! Never store a plain password! */
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            /* Attempt to execute the prepared statement */
            if(mysqli_stmt_execute($stmt)){
                /* As soon as register was successful, redirect to the ImagoCloud login page */
                header("location: login.php");
            } else{
				/* Else if there is an issue with the database, let the user know to try again later. */
                echo "Oops! Something went wrong. Please try again later.";
            }

            /* Closing the statement */
            mysqli_stmt_close($stmt);
        }
    }
    
    /* Close connection (important to avoid too many SQL connections */
    mysqli_close($databaselinking);
}
?>
 