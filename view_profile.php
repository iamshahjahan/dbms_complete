
<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>

<?php require_once('header1.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>
    View Your profile
  </title>
  <style>
          .user-row {
          margin-bottom: 14px;
      }

      .user-row:last-child {
          margin-bottom: 0;
      }

      .dropdown-user {
          margin: 13px 0;
          padding: 5px;
          height: 100%;
      }

      .dropdown-user:hover {
          cursor: pointer;
      }

      .table-user-information > tbody > tr {
          border-top: 1px solid rgb(221, 221, 221);
      }

      .table-user-information > tbody > tr:first-child {
          border-top: 0;
      }
  </style>
</head>
<body>
  
  <div class="container tpad">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info ">
            <div class="panel-heading">
              

<?php
  // require_once('appvars.php');
  require_once('connectvars.php');
  require_once('checklogin.php');

  // Make sure the user is logged in before going any further.
  
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Grab the profile data from the database
  if (!isset($_GET['user_id'])) {
    $query = "SELECT username, first_name, last_name, gender, birthdate, city, state FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'";
  }
  else {
    $query = "SELECT username, first_name, last_name, gender, birthdate, city, state FROM user WHERE user_id = '" . $_GET['user_id'] . "'";
  }
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // The user row was found so display the user data
    $row = mysqli_fetch_array($data);
    ?>
   	 <h3 class="panel-title"><?php if (!empty($row['username'])) {
      echo $row['username'];
    }?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                
          
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name: </td>
                        <td><?php if (!empty($row['first_name'])) {
						      echo $row['first_name'];
						    }?>
						    <?php if (!empty($row['last_name'])) {
						      echo $row['last_name'];
						    }?></h3></td>
                      </tr>
                      <tr>
                        <td>Gender: </td>
                        <td><?php if (!empty($row['gender'])) {
      echo $row['gender'];
    }?></h3></td>
                      </tr>
                      <tr>
                        <td>City: </td>
                        <td><?php if (!empty($row['city'])) {
      echo $row['city'];
    }?></h3></td>
                      </tr>
                   
       
                  
                        
                    </tbody>
                  </table>
                  
                  <a href="#" class=" pull-right btn btn-primary">My Facebook Profile</a>
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                               <A href="editprofile.php" class="btn btn-success btn-large" >Edit Profile</A>

                               <A href="logout.php"  class="btn btn-success btn-large">Logout</A>
                        </span>
                    </div>
            
          </div>
        </div>

      </div>
    </div>
<?php require_once('footer.php');
}
     // End of check for a single row of user results
  else {
    echo '<p class="error">There was a problem accessing your profile.</p>';
  }

  mysqli_close($dbc);
?>
    <script>
      $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
    </script>
</body>
</html>
</body> 
</html>
