<?php
session_start();
?>
<!---
Site : http:www.smarttutorials.net
Author :muni
--->
 
<?php
require 'connectvars.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
 
    </head>
    <body>
        <header>
            <p class="text-center">
                Welcome <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>
            </p>
        </header>
        <div class="container">
            <div class="row">
                <!-- <div class="col-xs-14 col-sm-7 col-lg-7">
                    <div class='image'>
                        <img src="img/cr1.jpg" class="img-responsive"/>
                    </div>
                </div> -->
                <div class="col-xs-10 col-sm-5 col-lg-5">
                    <div class="intro">
                            <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                            <div class="form-group text-center">
                                <select class="form-control" name="category" id="category">
                                    <option value="">Choose your category</option>
                                  <option value="1">Sports</option>
                                  <option value="2">HTML</option>
                                  <option value="3">PHP</option>
                                  <option value="4">CSS</option>                                
                                </select>
                                <span class="help-block"></span>
                            </div>
 
                            <br>
                            <button class="btn btn-success btn-block" type="submit">
                                Kiss Me!!!
                            </button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p class="text-center" id="foot">
                &copy; <a href="http://smarttutorials.net/" target="_blank">Smart Tutorials </a>2013
            </p>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>
 
        <script>
            $(document).ready(function() {
                $("#signin").validate({
                    submitHandler : function() {
                        console.log(form.valid());
                        if (form.valid()) {
                            alert("sf");
                            return true;
                        } else {
                            return false;
                        }
 
                    },
                    rules : {
                        name : {
                            required : true,
                            minlength : 3,
                            remote : {
                                url : "check_name.php",
                                type : "post",
                                data : {
                                    username : function() {
                                        return $("#name").val();
                                    }
                                }
                            }
                        },
                        category:{
                            required : true
                        }
                    },
                    messages : {
      
                        category:{
                            required : "Please choose your category to start Quiz"
                        }
                    },
                    errorPlacement : function(error, element) {
                        $(element).closest('.form-group').find('.help-block').html(error.html());
                    },
                    highlight : function(element) {
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success : function(element, lab) {
                        var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
                        var num = Math.floor(Math.random() * 6);
                        $(lab).closest('.form-group').find('.help-block').text(messages[num]);
                        $(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
                    }
                });
            });
        </script>
 
    </body>
</html>