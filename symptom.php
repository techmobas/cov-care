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

                <h1 class="mb-4">COVID-19 GENERAL SYMPTOMS</h1>
            <?php
            }
            ?>
              
              <div class="col-sm-12">
              <h2>Most Common Symptoms : </h2>
                Fever <br />
                Dry Cough <br />
                Tiredness <br />
              </div>

              <p>&nbsp;</p>
              <p>&nbsp;</p>

              <div class="col-sm-12">
              <h2>Less Common Symptoms : </h2>
                aches and pains<br />
                sore throat<br />
                diarrhoea<br />
                conjunctivitis<br />
                headache<br />
                loss of taste or smell<br />
                a rash on skin, or discolouration of fingers or toes<br />
              </div>

              <p>&nbsp;</p>
              <p>&nbsp;</p>

              <div class="col-sm-12">
              <h2>Serious Symptoms : </h2>
                difficulty breathing or shortness of breath<br />
                chest pain or pressure<br />
                loss of speech or movement<br />
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
