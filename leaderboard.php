<?php require_once('header1.php');?>
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
    <table class="table table-striped">
    <tr class="danger">
        <th>#</th>
        <th>Rank</th>
        <th>Name</th>
        <th>Score</th>
        <!-- <th</th> -->
    </tr>
     <?php 
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $result = mysqli_query($dbc,"select * from user order by score desc,join_date desc limit 10");
    $result1 = mysqli_query($dbc,"select max(score) from user");
    $row1 = mysqli_fetch_array($result1);
    // echo $row1[0];
    // echo "Top 5 ranker are: <br>";
    $i = 1 ;
    // the color list for the table
    $list_color = array('success','primary','info','warning','danger');
    // echo $list_color[ $i % count(list_color)];
   
    while ( ($row=mysqli_fetch_array($result)))
    {
      ?>
  
    <tr class="<?php echo $list_color[  $i % count($list_color)];?>">
        <td><?php
                            echo $i;
                            ?>
        </td>
        <td>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="<?php echo $row1[0];?>" style="width: <?php echo $row['score'] / $row1[0] * 100;?>%;"> <span class="sr-only">60% Complete</span>

                </div>
            </div>
        </td>
        <td><?php
                            echo $row['username'];
                            ?></td>
        <td><?php
                            echo $row['score'];
                           ?></td>
   
    </tr>
      <?php    
                $i++;
                
      }

 ?>
    
</table>
<?php require_once('footer.php');?>)
</body>
</html>