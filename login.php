<?php
  require_once('connectvars.php');
  require_once('header1.php');

  // require_once('div.php');

  // Start the session
  @session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT user_id, username FROM user WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          ?>
            <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
<!-- dialog body -->
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      Thank You for logIn. Now you can play and judge yourself in the world of Islamic Quiz.
                      </div>
                  <!-- dialog buttons -->
                  <div class="modal-footer">
                        <a href="index.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div> 
        </div>      
          <?php
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = '<p class="padded">Sorry, you must enter a valid username and password to log in.</p>';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = '<p class="padded">Sorry, you must enter your username and password to log in.</p>';
      }
    }
  }
?>

<?php
  // require_once('header1.php');
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id']))  {
    echo '<p class="">' . $error_msg . '</p>';
   
?>
   <div class="container login"> 
    <div class="row">
      <div id="realContent" class="col-xs-10 col-xs-offset-1">
            <!-- <div class="row padded">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-9 col-sm-offset-0">
                  <h1>Log In </h1>
                </div>
            </div> -->
            <div class="row  padded">
                <section class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-9 col-sm-offset-0 padded_login">
                    <div class="well well-lg ">
                        <div class="row padded">
                            
                            <div class="col-sm-12 col-xs-6">
                                <div class="row">
                                    <div class="col-xs-12"><h3>Log In</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form id="signupForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="UTF-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input id="username" class="form-control input-lg" placeholder="User Name" required="required" maxlength="100" type="text" name="username" value="">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                                <input id="pass1" class="form-control input-lg" placeholder="Password" autocomplete="off" required="required" maxlength="60" type="password" name="password"><span id="strength"></span>
                                            </div>
              
                                                <div class="form-group">
                                                <button type="submit" id="btn-signup" name="submit" class="btn btn-block btn-primary btn-lg">Log In</button>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="topCushion">Not registered yet? <a href="signup.php">Sign Up</a></div>
                                        </div>
                                       <?php
                                            }
                                          ?>
                                    </div><!-- end of column -->
                           
                        </div><!-- end of well row -->
                    </div><!-- end of well -->
              </section>
          </div><!-- end of row -->
      </div>
    </div>
  </div>


<?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
   
?>

  
   
<?php
  }
  
require_once('footer.php'); ?>

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
