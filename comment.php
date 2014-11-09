<?php
    @session_start();
    // require_once('header.php');
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ( isset($_POST['submit']))
    {
        
        $user_id = $_SESSION['user_id'];
        if ( !empty($_POST['comments']) )
        {
         
          if(!empty($_POST['check_list']))
          {
                        // Loop to store and display values of individual checked checkbox.
              foreach($_POST['check_list'] as $selected)
              {
                  $comments = $_POST['comments'];
                  $id = $_SESSION['user_id'];
                   $query = "insert into discussion(comments,user_id,topic,time_of_submission) values ('$comments','$id','$selected',NOW())";
                   // $query = "insert into question (sawal,user_id,a,b,c,d,lvl,answer,type) values ('$question','$user_id','$a','$b','$c','$d','$level','$answer','P') ";

                   $result = mysqli_query($dbc,$query)
                   or die("error in insertion");
              }
              header('location: '.'why.php');
          }
          else
          {
            echo "please fill all the lists";
          }
                                    

        //           

        //            echo 'Thanks for the question Mr.'.$_SESSION['username'];
        //            echo ' Want to add more questions. Click <a href="submit_ques.php"> here </a>';
        //            $question = "";
        //             $a ="" ;
        //             $b ="" ;
        //             $c ="" ;
        //             $d ="" ;
        //             $answer ="";
        //             $level = "";

        //             exit();
        //            mysqli_close($dbc);
        //         }   
        //     // }

        // }

        }
    }
    else
    {
      echo "Submit is not set";
    }
?>
