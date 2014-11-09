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
        <h1 style="text-align: center;padding:20px;" class="btn-success"> <i>Quiz Score</i></h1>
    </div> 
     <div class="col-xs-12">
        <table class="table table-striped">
        <tr class="danger">
    
            <th>User Name</th>
            <th>Score</th>
        <tr>

<?php 
    require_once('header1.php');
    require_once('checklogin.php');
   
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['username'];





    $result1 = mysqli_query($dbc,"select distinct(quiz_name) as quiz from user_question,user,quiz where answer_key = 1 and user_question.quiz_id > 0 and user_question.quiz_id = quiz.quiz_id and user_question.user_id = user.user_id group by user_question.user_id , user_question.quiz_id")
    or die("Error in fetching the value.");

    while ( $row1 = mysqli_fetch_array($result1))
    { 
        $quiz_name = $row1['quiz'];
    
        $result = mysqli_query($dbc,"select username,count(answer_key) as correct_answer from user_question,user,quiz where answer_key = 1 and user_question.quiz_id > 0 and user_question.quiz_id = quiz.quiz_id and user_question.user_id = user.user_id and quiz_name = '$quiz_name' group by user_question.user_id , user_question.quiz_id order by correct_answer desc")
            or die("Error in fetching the value.");
            $i = 0 ;
            while ( $row = mysqli_fetch_array($result))
            { 
                if ( $i == 0 )
                {
                    ?>
                    <button class="btn center btn-primary center-block btn-lg"> Quiz Name: <?php echo $quiz_name;?></button>
                    <div class="fpad"></div>

                    <?php
                }
                $i++;
            ?>
                <body class="tpad">
                <div class="container"> 
                <div class="row">
                <div class="col=xs-12"> 
                </div> 
                 <div class="col-xs-12">
                    <table class="table table-striped">
                    
                                <tr class="danger">
                                    <td>
                                        <?php
                                        echo $row['username'];
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo $row['correct_answer'];
                                       ?>
                                    </td>
                                </tr>                         
                            
                    </table>
                </div>
                <?php
            }
        }
     ?>

                </div>
                </div>
                        <a href="viewscore.php"><button class="btn center-block btn-warning btn-lg">Visit Your Score </button></a>
                    <div class="fpad"></div>

<?php require_once('footer.php');?>)
</body>
</html>