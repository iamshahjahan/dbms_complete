<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Islamic Quiz</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="islamic.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet"/>
    <link rel="stylesheet" href="flipclock.css">
    
    
    <style>
     html,body
     {
          height: 1500px;
     }
    .grey
      {
        background-color: #ccc;
        padding: 20px;
      }
    </style>
  </head>
  <body>
        <!-- We are going to make this page for navigation purpose -->

        <nav class="navbar navbar-inverse navbar-fixed-top" role = "navigation">
               <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon-bar"> </span>
                         <span class="icon-bar"> </span>
                         <span class="icon-bar"> </span>

                    </button>
                     <a class="navbar-brand" href="index.php">ILM</a>
               </div>

               <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                         <li ><a href="index.php">Home</a></li>
                         <li ><a href="choice.php"> Practice </b></a></li>
                         <li ><a href="play_online.php"> Online Quiz </b></a></li>
                         <li ><a href="leaderboard.php">Leader Board</a></li>
                         <li ><a href="why.php">Discuss</a></li>
                         <li ><a href="aboutus.php">About Us</a></li>
                         <li ><a href="contacts.php">Contact</a></li>
                         <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> User Section <b class="caret"> </b></a>
                          <ul class="dropdown-menu">
                            <?php
                            @session_start();
                              if(!isset($_SESSION['username']))
                              {
                                ?>
                                <li> <a href="login.php">Log In</a></li>
                                <li> <a href="signup.php">Sign Up</a></li>
                            <?php
                              }
                              else
                              {
                                ?>
                                  <li> <a href="viewscore.php">View Your Score</a></li>
                                  <li> <a href="view_profile.php">View Your Profile</a></li>
                                  <li> <a href="editprofile.php">Edit Your Profile</a></li>
                                  <li> <a href="submit_question.php">Submit a question</a></li>
                                  <li> <a href="logout.php">Log Out</a></li>
                            <?php
                              }
                            ?>
                            
                           
                          </ul>
                          </li>
                    </ul>
               </div>
        </nav>
