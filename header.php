<?php
include "config.php";

session_start();
$result = mysqli_query($link, "SELECT vaccine FROM users");
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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  media="all" type="text/css"/>
		<link rel="stylesheet" href="css/modified-bootstrap.css">
    <link rel="stylesheet" href="css/style.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  media="all" type="text/css"/>
	  <link rel="icon" href="image/logo16" type="image/gif" sizes="16x16">
    <style>
    body {
      font-family: "Bebas Neue", sans-serif;
      font-size: 24px;
      background: #fafafa;
    }

    #flag{border: 1px solid black;}

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
        background: #da0000;
        border-color: #da0000; }

    .btn-primary:focus {color:#ffffff;}

    .btn.btn-secondary {
        background: #da0000;
        border-color: #da0000;
        color: #ffffff; }
    .btn:hover, .btn.btn-secondary:focus {
      background: #6b0000;
        border-color: #6b0000 }

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

  <script>
      fetch("https://dekontaminasi.com/api/id/covid19/hospitals")
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    document.getElementById("Nama_RS").innerHTML = data.name;
    document.getElementById("Alamat_RS").innerHTML = data.address;
    document.getElementById("Region_RS").innerHTML = data.region;
    document.getElementById("Phone_RS").innerHTML = data.phone;
    document.getElementById("Province_RS").innerHTML = data.province;
  });

    </script>
  </head>

  
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-secondary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo"><img src="image/logo.png" alt="CoV-Care" width="150px"></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li>
	              <a href="index.php">Home</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">COVID - 19</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="covid-news.php">COVID - 19 News</a>
                </li>
                <li>
                    <a href="vaccine-news.php">Vaccine News</a>
                </li>
                <li>
                    <a href="symptom.php">General Symptom</a>
                </li>
              </ul>
	          </li>
            <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
            <li>
              <a href="logout.php">Log out</a>
            </li>
            <?php } else { ?>
	          <li>
              <a href="login.php">Login</a>
	          </li>
            <li>
              <a href="register.php">Register</a>
            </li>
            <?php } ?>
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
