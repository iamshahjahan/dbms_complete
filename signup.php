

<?php
  // require_once('appvars.php');
  require_once('connectvars.php');
  require_once('header1.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
        mysqli_query($dbc, $query)
        or die("Error in connectin.");

        // Confirm success with the user
        echo '<p class="padded" style="font-size:30px;border: 2px black; text-align:center;color:red;">Your new account has been successfully created. You\'re now ready to <a href="login.php" style="text-decoration:none;"> log in</a>.</p>';
        ?>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
<!-- dialog body -->
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      Thank You for sign up. Just log in and dive in the world of Islamic Quiz.
                      </div>
                  <!-- dialog buttons -->
                  <div class="modal-footer">
                        <a href="login.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div>
          </div>
        <?php 
        mysqli_close($dbc);
        // exit();
      }
      else {
        ?>

        // An account already exists for this username, so display an error message
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
<!-- dialog body -->
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      An account exist for the name plz try again.
                      </div>
                  <!-- dialog buttons -->
                  <div class="modal-footer">
                        <a href="signup.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div> 
        </div>       
<?php
            $username = "";
      }
    }
    else {
      ?>
      <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
<!-- dialog body -->
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
Check the password                      </div>
                  <!-- dialog buttons -->
                  <div class="modal-footer">
                        <a href="signup.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div> 
        </div>
        <?php
    }
  }

  // mysqli_close($dbc);
?>

<div id="contentContainer" class="container">
  
    <div class="row">
        <div id="realContent" class="col-xs-8 fpad">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-9 col-sm-offset-0">
                  <h1>Sign Up</h1>
                </div>
            </div>
            <div class="row">
                <section class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-9 col-sm-offset-0">
                    <div class="well well-lg">
                        <div class="row">
                            
                            <div class="col-sm-12 col-xs-6">
                                <div class="row">
                                    <div class="col-xs-12"><h3>Sign Up Ilm</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form id="signupForm" method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?> accept-charset="UTF-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input id="username" class="form-control input-lg" placeholder="User Name" required="required" maxlength="100" type="text" name="username" value="">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                                <input id="pass1" class="form-control input-lg" placeholder="Password" autocomplete="off" required="required" maxlength="60" type="password" name="password1">
                                            </div>
                                            <div class="input-group">
                                              <span id="strength" ></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                                <input id="pass2" class="form-control input-lg" placeholder="Confirm Password" autocomplete="off" required="required" maxlength="60" type="password" name="password2">
                                            </div>
                                            <div class="input-group">
                                              <span id="match"></span>
                                            </div>
                                                <div class="form-group">
                                                <button type="submit" name="submit" id="btn-signup" class="btn btn-block btn-primary btn-lg">Sign Up</button>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="topCushion">Already a member? <a href="login.php">Login</a></div>
                                        </div>
                                        <div class="form-group">
                                            <p>By clicking on "Sign Up", you agree to the <a href="#terms-of-service" target="_blank">Terms of Service</a> and the <a href="#privacy" target="_blank">Privacy Policy</a>.</p>
                                        </div>
                                    </div><!-- end of column -->
                                </div><!-- end of row -->
                            </div><!-- end of column 2 -->
                        </div><!-- end of well row -->
                    </div><!-- end of well -->
                </section>
            </div><!-- end of row -->
        </div>
        <div class="col-sm-4 padded tpad">
            <img class="img-circle img-responsive" src="img/cr1.jpg">
        </div>
    </div>  
</div>
<?php require_once('footer.php');?>
<script type="text/javascript" src="custom.js"></script>

<script>
  $(document).ready(function () {
    $('form input').tooltip({
      placement: 'top',
      trigger: 'focus',
      title: function (){
        return $(this).attr('placeholder');
      }
    });
});
</script>
<script>
$("#myModal").on("show", function() { // wire up the OK button to dismiss the modal when shown
$("#myModal a.btn").on("click", function(e) {
console.log("button pressed"); // just as an example...
$("#myModal").modal('hide'); // dismiss the dialog
});
});
 
$("#myModal").on("hide", function() { // remove the event listeners when the dialog is dismissed
$("#myModal a.btn").off("click");
});
$("#myModal").on("hidden", function() { // remove the actual elements from the DOM when fully hidden
$("#myModal").remove();
});
$("#myModal").modal({ // wire up the actual modal functionality and show the dialog
"backdrop" : "static",
"keyboard" : true,
"show" : true // ensure the modal is shown immediately
});
</script>
</body>
</html>