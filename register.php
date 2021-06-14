<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    $selectoption = $_POST["vaccineSelect"];

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, vaccine) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_select);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_select = $selectoption;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
        color: #ffffff; }

    .btn:hover, .btn.btn-primary:focus {
        background: #6b0000;
        border-color: #6b0000; }

    .btn-primary:focus {color:#ffffff;}


    .btn.btn-secondary {
        background: #da0000;
        border-color: #da0000;
        color: #ffffff; }
    .btn:hover, .btn.btn-secondary:focus {
        background: #da0000;
        border-color: #da0000; }

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
            <img src="image/register.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">

              </div>
              <p class="login-card-description">SIGN UP</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" >
                <label style="font-size:18px">Please choose the type of Vaccine you wish to follow!</label>
                <select name="vaccineSelect">
                    <option value="Sinovac">Sinovac</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer">Pfizer</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </form>
                
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
