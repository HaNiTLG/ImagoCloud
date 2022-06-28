<?php
/* Start the session */
session_start();
 
/* Need to check if the user already logged in. If yes, send to the webinterface */
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /webinterface/index.php");
    exit;
}
 
/* Database data */
require_once "config.php";
 
/* Initialize variables with empty values */
$username = $password = "";
$username_error = $password_error = $login_error = "";
 
/* Getting the submitted form from the login and processing the request */
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    /* Is username empty? */
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    /* Is password empty? */
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    /*If not empty, checking the given valuse with the SQL database */
    if(empty($username_err) && empty($password_error)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM useraccounts WHERE username = ?";
        
        if($stmt = mysqli_prepare($databaselinking, $sql)){
            /* Bind variables to the prepared statement as parameters */
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            /* Set parameter username */
            $param_username = $username;
            
            /* Attempt to execute the prepared statement */
            if(mysqli_stmt_execute($stmt)){
                /* Storing the received results */
                mysqli_stmt_store_result($stmt);
                
                /* Now we can check if username exists, if yes, we receive 1 (true) */
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    /* if true then bind the result variables */
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
						/* Is the password correct? If yes, start a new session */
                        if(password_verify($password, $hashed_password)){
                            session_start();
							/* After we started a new session, we can store the data in the session */
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            /* Now let the user to the ImagoCloud webinterface */
                            header("location: /webinterface/index.php");
                        } else{
                            /* Else if the password is not correct, display the error message */ 
                            $login_error = "Invalid username or password.";
                        }
                    }
                } else{
                    /* Else if username has been not found in the SQL database, display the error message */
                    $login_error = "Invalid username or password.";
                }
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
