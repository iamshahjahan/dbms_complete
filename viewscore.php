<?php 
    require_once('header1.php');
    require_once('checklogin.php');
   
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['username'];

    $result = mysqli_query($dbc,"SELECT user_question.user_id,user_question.qid,user_question.answer_key,question.permission FROM `user_question`join question WHERE user_question.qid = question.qid and user_question.user_id = $user_id")
    or die("Error in fetching the value.");
    $a_easy = $q_easy = $a_med = $q_med = $a_high = $q_high = $a_online = $q_online = $un_att=0 ;

    while ( $row = mysqli_fetch_array($result))
    {
        // echo $row['qid'];
        $k = $row['qid'];
        $result2 = mysqli_query($dbc,"SELECT lvl from question where qid = '$k'")
        or die("Error in selection");
        $row2= mysqli_fetch_array($result2);
        if( $row2['lvl'] == 'O')
        {
            $q_online ++ ;
            if ( $row['answer_key'] == '1')
            {
                $a_online++;
            }
        }
         if( $row2['lvl'] == 'E' && $row['answer_key'] != 2)
        {
            $q_easy ++ ;
            if ( $row['answer_key'] == '1' )
            {
                $a_easy++;
            }
        }

         else if( $row2['lvl'] == 'M' && $row['answer_key'] != 2)
        {
            $q_med ++ ;
            if ( $row['answer_key'] == '1')
            {
                $a_med++;
            }
        }

        else if ( $row2['lvl'] == 'H' && $row['answer_key'] != 2 ) 
        {
            $q_high ++ ;
            if ( $row['answer_key'] == '1')
            {
                $a_high++;
            }
        }
        else
        {
            $un_att++;
            // echo '<br>';
        }
    }
    
    $total_score = $a_easy + 2 * $a_med + 4 * $a_high + 10 * $a_online;

    $total_ques = $q_med + $q_easy + $q_high + $q_online;

    $total_ans = $a_easy + $a_high + $a_med +$a_online;

    $result = mysqli_query($dbc,"update user set score = '$total_score' where user_id = '$user_id'")
    or die ( "Error in updation of score");
    // 
?>


<!DOCTYPE html>
<html>
<head>
    <title>
        Leaderboard
    </title>
    <style>
        .progress {
   /* background:transparent !important;*/
    box-shadow:none !important;
}
table .progress {
    margin-bottom: 0;
}
.progress-bar {
    border-radius:4px !important;
}


    </style>
</head>
<body class="tpad">
    <div class="container"> 
    <div class="row">
    <div class="col=xs-12"> 
        <h1 style="text-align: center;padding:20px;" class="btn-success"> <i>Your Score</i></h1>
    </div> 
    <div class="col-xs-12">
        <table class="table table-striped">
        <tr class="danger">
        
            <th>Level</th>
            <th>Question</th>
            <th>Correct</th>
            <th>Score</th>
        <!-- <th</th> -->
            </tr>
    
                    <tr>
                        <td >
                            <?php
                            echo 'Online';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $q_online;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $a_online;
                           ?>
                        </td>
                        <td>
                            <?php
                            echo 10 * $a_online;
                           ?>
                        </td>
                    </tr>                     

                
                    <tr>
                        <td >
                            <?php
                            echo 'Easy';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $q_easy;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $a_easy;
                           ?>
                        </td>
                        <td>
                            <?php
                            echo $a_easy;
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <?php
                            echo 'Med';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $q_med;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $a_med;
                           ?>
                        </td>
                        <td>
                            <?php
                            echo 2 * $a_med;
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <?php
                            echo 'High';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $q_high;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $a_high;
                           ?>
                        </td>
                        <td>
                            <?php
                            echo 4 * $a_high;
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <?php
                            echo 'Total';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $q_easy + $q_med + $q_high;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $a_easy + $a_med + $a_high;
                           ?>
                        </td>
                        <td>
                            <?php
                            echo $total_score;
                           ?>
                        </td>
                    </tr>
        </table>
    </div>
    </div>
    </div>

<a href="quizscore.php"><button class="btn center-block  btn-warning btn-lg">Visit Quiz's Score </button></a>
<div class="fpad"></div>


<?php require_once('footer.php');?>)
</body>
</html>