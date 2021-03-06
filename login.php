<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="icon" href="image/logo16.png" type="image/gif" sizes="16x16">
  <style>
    body {
      font-family: "Bebas Neue", sans-serif;
      font-size: 24px;
      background: #fafafa;
    }

    h1, h2, h3, h4, h5, h6{
      font-family: "Bebas Neue", sans-serif;
      color: #da0000;
    }

    p{
      font-size: 18px;
    }

    #sidebar{
      background-color: #fff;
      background-image: linear-gradient(#ffffff, #ffffff);
    }

    #sidebar ul li a{color: #40394a; font-size: 21px;}
    #sidebar ul li a:hover {color: #e62c48; }
    #sidebar ul li.active > a {
      background: transparent;
      color: #da0000; }
    #sidebar ul li.active > a:hover {
      background: transparent;
      color: #810000; }

    #sidebar .custom-menu .btn.btn-primary {
      background: #ffffff;
      border-color: #ffffff;
    }

    #sidebar .custom-menu .btn.btn-primary:hover, #sidebar .custom-menu .btn.btn-primary:focus {
      background: #da0000;
      border-color: #da0000; 
      color: #ffffff;
    }

    .btn.btn-primary {
        background: #da0000;
        border-color: #da0000;
        color: #ffffff; 
      }
    .btn:hover, .btn.btn-primary:focus {
        background: #da0000;
        border-color: #da0000; }

    .btn-primary:focus {color:#ffffff;}
    
    .btn.btn-secondary {
        background: #da0000;
        border-color: #da0000;
        color: #ffffff; }
    .btn:hover, .btn.btn-secondary:focus {
      background: #6b0000;
        border-color: #6b0000; }

    .btn-secondary:focus {color:#ffffff;}

    .bg-green{
      background-color: #da0000;
    }

    .news {
      width: 100%;
      height: 900px;
    }

    @media screen and (min-width: 769px) and (max-width: 1023px){
      .news {
        width: 100%;
      }
    }

    @media screen and (max-width: 767px){
      .news {
        width: 100%;
      }
    }
    </style>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="image/logins.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">

              </div>
              <p class="login-card-description">LOGIN</p>
              <p>Please fill in your credentials to login.</p>
              <?php 
              if(!empty($login_err)){
                  echo '<div class="alert alert-danger">' . $login_err . '</div>';
              }        
              ?>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                  <span class="invalid-feedback"><?php echo $username_err; ?></span>
                  </div>
                  <div class="form-group mb-4">
                   <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                     <span class="invalid-feedback"><?php echo $password_err; ?></span>
                  </div>
                  <input type="submit" class="btn btn-block login-btn mb-4" value="Login">
                </form>
                <a href="register.php" class="forgot-password-link">Sign Up</a>
                <p class="login-card-footer-text"><a href="index.php" class="text-reset">Back</a></p>
                <nav class="login-card-footer-nav">
                  <!-- Additional Cards -->
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
