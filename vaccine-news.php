<?php include "header.php" ?>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

          <div class="row text-center">
            <div class="col-sm-12">
            <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

                <br><h4 class="mb-4">We got you covered, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h5>

                <?php } else { ?>

                <h1 class="mb-4">COVID-19 VACCINE NEWS</h1>
            <?php
            }
            ?>
              
              <div class="col-sm-12">
              <h4>detik.com</h4>
              <rssapp-list id="eJeAEeX5ZQHAv3iz"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
              </div>
              <div class="col-sm-12">
              <h4>Kompas</h4>
              <rssapp-list id="xIPJCWvqvH0KxZDH"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
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
