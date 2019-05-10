<html>


<?php
  include "./model/calculateDate.php";
  include "./model/dbConnect.php";
  include "./model/roundoff.php";
  $getUserSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift
                        FROM user
                        WHERE user_id='$_SESSION[user_id]'";
  $getUserSqlResult = mysqli_query($flagtagdb,$getUserSql);
  $user_information = mysqli_fetch_array($getUserSqlResult);
  $user_routine_startday = date("Y-n-j",strtotime($user_information['user_routine_startday']."-1 days"));



  function whatDate($i){
    $var;
    switch ($i) {
      case "1":
        $var="(월)";
        break;
      case "2":
        $var= "(화)";
        break;
      case "3":
        $var= "(수)";
        break;
      case "4":
        $var= "(목)";
        break;
      case "5":
        $var= "(금)";
        break;
      case "6":
        $var= "(토)";
        break;
      case "0":
        $var= "(일)";
        break;
    }
    return $var;
  }
 ?>

<!DOCTYPE html>
<html lang="kor">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    font.holy {font-family: tahoma;font-size: 20px;color: #FF6C21;}
    font.blue {font-family: tahoma;font-size: 20px;color: #0000FF;}
    font.black {font-family: tahoma;font-size: 20px;color: #000000;}
  </style>
  <link rel="stylesheet" href="/css/week_calander.css">

</head>
<body>

          <?php
          $today = date_create(date("Y-n-j"));
          $Nthday= date_diff($today, date_create($user_routine_startday));
          $user_routine=$user_information[user_routine];
            $getRoutineSql = "SELECT *
                              FROM $user_routine
                              WHERE days='$Nthday->days'";
            $getRoutineSqlResult = mysqli_query($flagtagdb,$getRoutineSql);
            $routine = mysqli_fetch_array($getRoutineSqlResult);
        ?><p><?php
        for($i=1;$i<64;$i++){
          if($i%3==1){?><br><?php
            echo $routine[$i];?>&nbsp;<?php
            if($i!=1||$i!=9||$i!=12||$i!=16||){}
            if ($routine[$i] == "squat"){
             echo roundoff($routine[$i+1]*$user_information['1RM_squat']);?>&nbsp;<?php
           }
           else if ($routine[$i] == "benchpress"){
             echo roundoff($routine[$i+1]*$user_information['1RM_benchpress']);?>&nbsp;<?php
           }
           else if ($routine[$i] == "deadlift"){
             echo roundoff($routine[$i+1]*$user_information['1RM_deadlift']);?>&nbsp;<?php
           }
           else if ($routine[$i] == "ohp"){
             echo roundoff($routine[$i+1]*$user_information['1RM_benchpress']*0.7);?>&nbsp;<?php
           }
           else if ($routine[$i] == "incline_benchpress"){
             echo roundoff($routine[$i+1]*$user_information['1RM_benchpress']*0.7);?>&nbsp;<?php
           }
           else if ($routine[$i] == "stiffleg_deadlift"){
             echo roundoff($routine[$i+1]*$user_information['1RM_deadlift']*0.8);?>&nbsp;<?php
           }
           else if ($routine[$i] == "front_squat"){
             echo roundoff($routine[$i+1]*$user_information['1RM_squat']*0.7);?>&nbsp;<?php
           }
           else if ($routine[$i] == "close_grip_benchpress"){
             echo roundoff($routine[$i+1]*$user_information['1RM_benchpress']*0.9);?>&nbsp;<?php
           }
           else if ($routine[$i] == "free_training1"||"free_training2"){
             echo "10RM";?>&nbsp;<?php
           }?>kg X <?php
          }
          else if($i%3==0){?>&nbsp;<?php echo $routine[$i];
          }
                }
                ?></p>


</body>

</html>
</html>
