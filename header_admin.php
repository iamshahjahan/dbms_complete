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
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
     html,body
     {
          height: 1500px;
          background-color: #acf;
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
                     <a class="navbar-brand" href="admin.php">ILM</a>
               </div>

               <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                         <li ><a href="admin.php">Log In</a></li>
                          <li ><a href="quiz_start.php">Start A Quiz</a></li>
                          <li ><a href="user_records.php">Manage Users</a></li>
                         <li ><a href="question_records.php"> Manage Question </b></a></li>
                         <li ><a href="submit_question_admin.php"> Submit a Question </b></a></li>
                         
                        
                         <li ><a href="logout_admin.php">Logout </a></li>
                         
                    </ul>
               </div>
        </nav>
        <div class="fpad">
        </div>
</body>
</html>