<?php
  session_start();
  include_once "dbConnect.php";
  $maxDay = (int)$_GET['maxDay'];
  $thisWeek =  (int)$_GET['thisWeek'];
  $thisDay =  (int)$_GET['thisDay'];


  if($maxDay< $thisDay-1){
    $thisWeek--;
    $thisDay=$maxDay;}
    elseif($thisDay ==0){
      $thisDay--
  }else{
    $thisDay--;
  }
  $UpdateWeekDaySql = "UPDATE user
                        SET week=$thisWeek, day=$thisDay
                        WHERE user_id='$_SESSION[user_id]'";
  $UpdateWeekDaySql = mysqli_query($flagtagdb,$UpdateWeekDaySql);
  if($routineSqlResult===false){
    echo "week와 day를 업데이트 하는 과정에서 문제가 생겼습니다.<br>";
    echo mysqli_error($flagtagdb)."<br><br>";
  }

  header('Location: ../index.php?menu=main');
 ?>
