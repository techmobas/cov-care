<?php 
  include "header.php" 
?>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

          <div class="row text-center">
            <div class="col-sm-12">
            <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

                <br><h4 class="mb-4">We got you covered, <span style="color:#000000;"><?php echo htmlspecialchars($_SESSION["username"]); ?>! 
                    </span></h5>
                
                  
                <?php  
                  while ($row = mysqli_fetch_array($result)) {?>
                  <h1 class="mb-4">VACCINATION NEWS</h1>
                  <p>Here's the news for <span style="color:#000000; font-size:28px;"><?php echo $row['vaccine']?></span></p>                 
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
                  ?>
                    <h4>Vaccine News only available for <a href="login.php">Member</a>.</h4>
                  <?php
                }?>  
            
            </div>
            </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
