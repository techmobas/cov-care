<?php include "header.php" 


?>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

          <div class="row text-center">
            <div class="col-sm-12">
            <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

                <br><h4 class="mb-4">We got you covered, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h5>

                <?php } else { ?>

                <h1 class="mb-4">COVID-19 NEWS</h1>
            <?php
            }
            ?>              

              <div class="col-sm-12">
              <h4>Kompas</h4>
              <rssapp-magazine id="SRoWU77cAKbE2hqo"></rssapp-magazine><script src="https://widget.rss.app/v1/magazine.js" type="text/javascript" async></script>
              </div>
              
              <p>&nbsp;</p>

              <div class="col-sm-12">
              <h4>Internasional</h4>
              <rssapp-magazine id="Tigfb36YvPD5gXeo"></rssapp-magazine><script src="https://widget.rss.app/v1/magazine.js" type="text/javascript" async></script>
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
