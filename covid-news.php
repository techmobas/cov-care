<?php include "header.php" ?>

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
              <h4>Detik.com</h4>
              <rssapp-list id="ul6O5mobD947juRr"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
              </div>

              <div class="col-sm-12">
              <h4>Kompas</h4>
              <rssapp-list id="kcloGezdZ75Pryrf"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
              </div>

              <div class="col-sm-12">
              <h4>International</h4>
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
