<?php require_once('header1.php');?>
<?php require_once('checklogin.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Choose
    </title>
    <style>
        h1 {
            font-family: "Abel", Arial, sans-serif;
            font-weight: 400;
            font-size: 35px;
        }

    </style>
</head>
<body class="tpad">
    <div class="row"> 
        <div class="col-sm-4 col-sm-offset-4 text-primary page-header">
            <h1> Choose your level </h1>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-4">
                <!-- <img src="img/cr1.jpg" alt="..." class="img-circle img-responsive">
                <button type="button" class="btn btn-primary">Primary</button>
                <div class="item active">  -->
                <img src="img/cr1.jpg" class="img-circle img-responsive">
                    <div class="container active">
                        <div class ="carousel-caption"> 
                            <p> <a data-toggle="modal" href="#myModal" class="btn btn-success btn-large">Easy</a></p>
                        </div>
                    </div>
            </div>
            
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Thank you for submitting</h3>
                    </div>
                    <div class="modal-body">
                        <p>The questions in this level are very easy. You need to be careful for that.</p>
                        <p>The Islamic Quiz</p>
                    </div>
                    <div class="modal-footer">
                        <a href="playquiz.php?level=E"  class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div>
        
        </div>



            <div class="col-sm-4">
                <!-- <img src="img/cr1.jpg" alt="..." class="img-circle img-responsive">
                <button type="button" class="btn btn-primary">Primary</button>
                <div class="item active">  -->
                <img src="img/cr1.jpg" class="img-circle img-responsive">
                    <div class="container active">
                        <div class ="carousel-caption"> 
                            <p> <a href="playquiz.php?level=M" class="btn btn-success btn-large">Medium</a></p>
                        </div>
                    </div>
            </div>
            <div class="col-sm-4">
                <!-- <img src="img/cr1.jpg" alt="..." class="img-circle img-responsive">
                <button type="button" class="btn btn-primary">Primary</button>
                <div class="item active">  -->
            
                <img src="img/cr1.jpg" class="img-circle img-responsive">
                    <div class="container active">
                        <div class ="carousel-caption"> 
                            <p> <a href="playquiz.php?level=H" class="btn btn-success btn-large">Hard</a></p>
                        </div>
                    </div>
            </div>
               
            
           
        </div>
        <div class="tpad"> </div>
<?php require_once('footer.php');?>

</body>
</html>