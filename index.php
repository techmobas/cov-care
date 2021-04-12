<?php 
  include "header.php"
?>

        <div class="container text-center">
          <h1 class="">Covid-19 Cases In <span id="country"></span> <br><img src="" alt="" id="flag" width="60px"></h1>


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

                <br><h4 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! We hope you're staying safe during this pandemic. <br>
                  Here's the latest news for you.</h5>

                <?php } else { ?>

                <h1 class="mb-4">COVID-19 NEWS</h1>
            <?php
            }
            ?>
              
              <div class="col-sm-12">
              <h4>Detik.com</h3>
              <iframe class="news" src="https://rss.app/embed/v1/wall/2yR0NgIrZV4tnymd" frameBorder="0"></iframe>
              </div>

              <div class="col-sm-12">
              <h4>Kompas</h3>
              <iframe class="news" src="https://rss.app/embed/v1/wall/87uuEsfLsUYqSahO" frameBorder="0"></iframe>
              </div>

              <div class="col-sm-12">
              <h4>International</h3>
              <iframe class="news" src="https://rss.app/embed/v1/wall/RMCmX5NHmsTUFdQ7" frameBorder="0"></iframe>
              </div>
              
            </div>
            </div>
         
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
