<?php 
  include "header.php"
  $result = mysqli_query($link, "SELECT vaccine FROM users");
?>
        
    
        <div class="container text-center">
          <h1 class="">Covid-19 Cases In <span id="city"></span> <br><img src="" alt="" id="flag" width="60px"></h1>


          <div class="row text-center">

          <div class="col-md-2">
            <div class="card">
              <div class="card-body bg-light text-light rounded">
                <h5 class="card-title"><i class="fas fa-tachometer-alt fa-2x"></i></h5>
                <h4 class="card-text">Active <br> Cases</h4>
                <p class="card-text text-dark text-danger badge badge-outline-light" id="Active_Cases">0</p>
              </div>
            </div>
          </div>

          <div class="col-md-2">   
            <div class="card">
              <div class="card-body bg-light text-danger rounded">
                <h5 class="card-title"><i class="fas fa-list fa-2x"></i></h5>
                <h4 class="card-text">Total <br> Cases</h4>
                <p class="card-text text-dark badge badge-outline-light" id="Total_Cases">21</p>
              </div>
            </div>
           </div>

          <div class="col-md-2"> 
            <div class="card">
              <div class="card-body bg-light text-light rounded">
                <h5 class="card-title"><i class="fas fa-times-circle fa-2x"></i></h5>
                <h4 class="card-text">Critical <br> Cases</h4>
                <p class="card-text text-dark badge badge-outline-light" id="Critical_Cases">21</p>
              </div>
            </div>
          </div>

          <div class="col-md-2"> 
            <div class="card">
              <div class="card-body bg-light text-light rounded">
                <h5 class="card-title"><i class="fa fa-times fa-2x"></i></h5>
                <h4 class="card-text">Total <br> Death</h4>
                <p class="card-text text-dark badge badge-outline-light" id="Total_Death">21</p>
              </div>
            </div>
          </div>


          <div class="col-md-2"> 
            <div class="card">
              <div class="card-body bg-light text-light rounded">
                <h5 class="card-title"><i class="fas fa-check-square fa-2x"></i></h5>
                <h4 class="card-text">Recovered <br> Cases</h4>
                <p class="card-text text-dark badge badge-outline-light" id="Recovered_Cases">21</p>
              </div>
            </div>
          </div>


          <div class="col-md-2"> 
            <div class="card">
              <div class="card-body bg-light text-light rounded">
                <h5 class="card-title"><i class="fas fa-eye fa-2x"></i></h5>
                <h4 class="card-text">Total Test <br> Done</h4>
                <p class="card-text text-dark badge badge-outline-light" id="Total_Test_Done">21</p>
              </div>
            </div>
          </div>
        </div>
          </h2>
      </div>
      
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              

      <div class="container text-center">  
        <h1>REMEMBER <span style="font-size: 60px;">3M!</span></h1>
        <h4>Untuk Mencegah Penularan COVID-19</h4>
        <p>To Prevent the spread of Covid-19</p>
        <p></p>
        <div class="row" style="text-align: center;">
          <div class = "col-lg-4">
            <img src="image/man.png" alt="Flaticon" width="200px;">
            <h2 style="color: black;"><span style="color: #da0000; font-size: 40px;">M</span>EMAKAI MASKER</h2>
            <p>Use Face Mask</p>
          </div>
          <div class = "col-lg-4">
            <img src="image/hand-wash.png" alt="Flaticon" width="200px;">
            <h2 style="color: black;"><span style="color: #da0000; font-size: 40px;">M</span>ENCUCI TANGAN</h2>
            <p>Wash your hands</p>
          </div>
          <div class = "col-lg-4">
            <img src="image/social-distancing.png" alt="Flaticon" width="200px;">
            <h2 style="color: black;"><span style="color: #da0000; font-size: 40px;">M</span>ENJAGA JARAK</h2>
            <p>Keep your distance from others</p>
          </div>
    </div>
    </div>

            <p>&nbsp;</p>
              <p>&nbsp;</p>

          <div class="row text-center">
            <div class="col-sm-12">
            <?php

                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
                
                <br><h3 class="mb-4">Welcome, <span style="color:#000000;"><?php echo htmlspecialchars($_SESSION["username"]); ?>! 
                    </span> &nbsp; We hope you styed safe during this pandemic.</h3> 
                  <p>Here's the latest news for you.</p>
                  
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>

                  <?php  
                  while ($row = mysqli_fetch_array($result)) {?>
                  <h1 class="mb-4">VACCINATION NEWS</h1>
                  <p>Here's the news for <span style="color:#000000;"><?php echo $row['vaccine']?></span></p>                 
                <?php 
                    if ($row['vaccine'] == "AstraZeneca"){
                      echo '<rssapp-magazine id="RRIeAguZFLeNDTL7"></rssapp-magazine><script src="https://widget.rss.app/v1/magazine.js" type="text/javascript" async></script>';
                    }
                    else if($row['vaccine'] == "Sinovac"){
                      echo '<rssapp-magazine id="6IsSIItZflzMvQCR"></rssapp-magazine><script src="https://widget.rss.app/v1/magazine.js" type="text/javascript" async></script>';
                    }
                    else if($row['vaccine'] == "Pfizer"){
                      echo '<rssapp-magazine id="VEFw7ugo2bIXLnhr"></rssapp-magazine><script src="https://widget.rss.app/v1/magazine.js" type="text/javascript" async></script>';
                    }
                  }
                } 
                
                else { 
                  
                }?>

                <h1 class="mb-4">COVID-19 NEWS</h1>
                <p>Your region is <span style="color:#000000;"></span></p>

              <div class="col-sm-12">
              <h4></h4>
              <!-- Sesuai Geolocation -->
              </div>
            </div>
            </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    jQuery.get("https://ipapi.co/json", function(e){
        console.log(e)
        document.getElementById("city").innerHTML=e.city;
    },"json")
    
  </script>

  </body>
</html>
