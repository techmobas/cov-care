<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>

<!doctype html>

<html lang="en">
  <head>
  	<title>Home - CoV Care | Your Number 1 Covid Health Solution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/modified-bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script>
      fetch("https://corona.lmao.ninja/v2/countries/indonesia")
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    document.getElementById("flag").src = data.countryInfo.flag;
    document.getElementById("country").innerHTML = data.country;
    document.getElementById("Active_Cases").innerHTML = data.active;
    document.getElementById("Total_Cases").innerHTML = data.cases;
    document.getElementById("Critical_Cases").innerHTML = data.critical;
    document.getElementById("Total_Death").innerHTML = data.deaths;
    document.getElementById("Recovered_Cases").innerHTML = data.recovered;
    document.getElementById("Total_Test_Done").innerHTML = data.tests;
  });

    </script>
  </head>

  
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.html" class="logo">Logo</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#">CoV-Care</a>
	          <li>
	              <a href="index.php">Home</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="covid-news.php">COVID News</a>
                </li>
                <li>
                    <a href="vaccine-news.php">Vaccination News</a>
                </li>
                <li>
                    <a href="#">Symptom Checker</a>
                </li>
              </ul>
	          </li>
            <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
            <li>
              <a href="/logout.php">Log out</a>
            </li>
            <?php } else { ?>
	          <li>
              <a href="login.php">Login</a>
	          </li>
            <li>
              <a href="register.php">Register</a>
            </li>
            <?php } ?>

            
	          <li>
              <a href="#">FAQ</a>
	          </li>
	        </ul>

	        <div class="mb-5">

					</div>

	        <p>&nbsp;</p>
          <p>&nbsp;</p>
	        <div class="footer">
            <p style="color:  #690514; font-size: 14px;">&copy; CoV-Care |  Your Number 1 Covid Health Solution. All Rights Reserved</p>
	        </div>


	      </div>
    	</nav>


      <!-- Page Content  -->

      <div id="content" class="p-4 p-md-5 pt-5">
      
        


      <!-- Secondary Nav -->

      <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php
 
            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
            
              <li class="nav-item">
              <a class="nav-link" href="login.php"><?php echo htmlspecialchars($_SESSION["username"]); ?></span></a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Log out</span></a>
              </li>
            <?php
            ;} else { 
              ?>

            <li class="nav-item">
            <a class="nav-link" href="login.php">Login</span></a>
            </li>
            <li>&nbsp;&nbsp;</li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            
            <?php ;}
            ?>
            
          </ul>
        </div>
      </nav>