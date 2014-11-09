<?php 
require_once('header1.php');?>
<?php require_once('set_session.php');?>
          
        <!-- End navigation -->
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
<!-- success -->          </ol>
            <div class="carousel-inner"> 
            <div class="item active"> 
              <img src="img/cr1.jpg">
                <div class="container active">
                  <div class ="carousel-caption"> 
                  <?php include('login_text.php'); ?>
                  
                  </div>
                </div>
            </div>
            <div class="item"> 
              <img src="img/cr2.jpg">
                <div class="container">
                  <div class ="carousel-caption"> 
                  <?php include('login_text.php'); ?>
 
                  
                  </div>
                </div>
            </div>
            
            <div class="item"> 
              <img src="img/c3.jpg">
                <div class="container">
                  <div class ="carousel-caption"> 
                  <?php include('login_text.php'); ?>
                 
                 
                  </div>
                </div>
            </div>
            </div>

             <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
             <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
       <!-- End carousel-->
        <div class="introblock">
            <div class="container">
              <div class="row">
                <div class="col-xs-3">
                  <img class="img-responsive padding"  src="img/c4.jpg"> 
                </div>
                  <div class="c0l-xs-9">
                      <h1> Islamic Quiz <span class="textmuted"></span></h1>
                      <p class="lead"> Islamic Quiz is an online platform where you can show your skills online to know how much knowledge do you have about Islam.The first online site for online islamic quiz, where you can participate and win exciting prizes...
                      </p> 
                  </div>
                  
              </div>

            </div>
        </div>
        <!-- End intro text -->

          <div class="container">
              <div class="row">
                <div class="container padded">
                      <div class="row">
                          <div class="col-lg-12"><h2>PLAY</h2><hr></div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12 col-md-4">
                              <img class="img-circle img-responsive" src="img/cr1.jpg">
                              <h3>Practice</h3>
                              <p> It is said that Practise makes a man perfect. This section of ILM site gives you a platform where you can practise and judge whether you should visit other levels or not.</p>
                              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
                          </div>
                          <div class="col-xs-12 col-md-4">
                              <img class="img-circle img-responsive" src="img/cr1.jpg">
                              <h3>Play - Online</h3>
                              <p> The purpose of developing the site was to provide a platform, where you can play online islamic quiz and win exciting prizes. In this section we need to log in. Just log in and dive in the world of Islamic Quiz.</p>
                              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>

                          </div>
                          <div class="clearfix hidden-md hidden-lg"></div>
                          <div class="col-xs-12 col-md-4">
                              <img class="img-circle img-responsive" src="img/cr1.jpg">
                              <h3>Play - Offline</h3>
                              <p> Islamic Quiz conducts offline Islamic quizes also in various colleges. Only students can participate in such offline Islamic quizes. The offline Islamic Quiz is conducted regularly in Jamia Millia Islamia.</p>
                              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
                          </div>
                      </div>  
              </div>    
          </div>
        </div>
          <!-- End page -->
<?php require_once('footer.php'); ?>
  
    <script>
$(function (){
    $('.carousel').carousel({
        interval: 2000
    });
})    
    
</script>
   
  </body>
</html>