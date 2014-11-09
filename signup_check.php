<?php
  require_once('connectvars.php');
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
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
?>

<?php require_once('header1.php');?>
<div id="contentContainer" class="container">
  
    <div class="row">
        <div id="realContent" class="col-xs-9">
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
                                    <div class="col-xs-12"><h3>Sign Up Old School</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form id="signupForm" method="POST" action="#hahaha" accept-charset="UTF-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input id="username" class="form-control input-lg" placeholder="User Name" required="required" maxlength="100" type="text" name="username" value="">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                                <input id="pass1" class="form-control input-lg" placeholder="Password" required="required" maxlength="60" type="password" name="password1"><span id="strength"></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                                <input id="pass2" class="form-control input-lg" placeholder="Confirm Password" required="required" maxlength="60" type="password" name="password2"><span id = "match"></span><br />
                                            </div>
                                                <div class="form-group">
                                                <button type="submit" id="btn-signup" class="btn btn-block btn-primary btn-lg">Sign Up</button>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="topCushion">Not registered yet? <a href="signup.php">Sign Up</a></div>
                                        </div>
                                        
                                    </div><!-- end of column -->
                                </div><!-- end of row -->
                            </div><!-- end of column 2 -->
                        </div><!-- end of well row -->
                    </div><!-- end of well -->
                </section>
            </div><!-- end of row -->
        </div>
    </div>  
</div>

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
</body>
</html>