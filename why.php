 <?php 



  require_once('header1.php');
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $result = mysqli_query($dbc,"select * from discussion order by time_of_submission desc");
    // $row = mysqli_fetch_array($result);

    
    // echo $row1['username'];    
      ?>
        <!-- End navigation -->
  <div class="intro-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <img class="img-responsive tpad" src="img/cr1.jpg">
            </div>
            <div class="col-xs-9 tpad">
                <h1>ILM <span class="text-muted">&raquo; Discuss</span></h1>
                <p class="lead">A place to discuss current issues of Ummah</p>
            </div>
        </div>
    </div>    
</div>
<!-- End Intro Text -->
<div class="container padded">
    <div class="row">
        <div class="col-sm-10 blog">
            <section>
              <?php
              while ( ($row=mysqli_fetch_array($result)))
             {
              $user_id = $row['user_id'];
              $result1 = mysqli_query($dbc,"select username from user where user_id = $user_id ");
              $row1 = mysqli_fetch_array($result1);
               ?>
                <h1><a href="#"><?php echo $row['topic'];?></a></h1>
                <p class="lead"><a href="index.php">Posted by <?php echo $row1['username'];?></a></p>
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['time_of_submission'];?></p>
                <!-- <hr>
                <img src="img/cr1.jpg" class="img-responsive">
                <hr> -->
                <p><?php echo $row['comments'];?></p>
                
                <hr>
            </section>
            

                         <?php
                            @session_start();
                              if(isset($_SESSION['username']))
                              {
                                ?>
                                <section>
                                 
                          
                                  <form class="form-horizontal fpad" role="form" method="POST" action="comment.php">
                                        
                                        <div class="form-group  fpad">
                                            <label for="comment" class="col-lg-2 control-label">Comment</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" name="comments" rows="6" id="comment" placeholder="Comment..."></textarea>
                                            </div>
                                        </div>
                                        <h3> Topic </h3>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="check_list[]" value="Namaz">Namaz</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="check_list[]" value="Roza">Roza</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="check_list[]" value="Hajj">Hajj</label>
                                        </div>
                                        <div class="form-group  fpad">
                                          <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                      </div>
                                    <?php
                                     }
                                      else
                                      {
                                       ?>
                                      <h3> Please <a href="login.php">login </a> to comment</h3>    
                                    <?php
                                     }
                                   ?>
                                </form>
            </section>
            <?php
          }
            ?>

    </div>    
</div>     
    
        <!-- End intro text -->

          
          <!-- End page -->
<?php require_once("footer.php"); ?>            
      
    
  </body>
</html>