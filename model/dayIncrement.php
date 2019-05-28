<?php
  session_start();
  include_once "dbConnect.php";
  $maxDay = (int)$_GET['maxDay'];
  $thisWeek =  (int)$_GET['thisWeek'];
  $thisDay =  (int)$_GET['thisDay'];
  $routineID = (int)$_GET['routineID'];
  $totalDay = (int)$_GET['totalDay'];
  $today = date("Y-m-d",time());

  echo $totalDay."<br>";
  $totalDay= $totalDay+1;
  echo $totalDay;
  $insertCompleteDaySql = "INSERT INTO CompleteDay(user_number, routineID,day,date) VALUES({$_SESSION['user_number']},$routineID,$totalDay,'$today') ON DUPLICATE KEY UPDATE date='$today'";
  if(mysqli_query($flagtagdb,$insertCompleteDaySql)===false){
    echo "CompleteDay를 저장하는 과정에서 문제가 생겼습니다.<br>";
      echo mysqli_error($flagtagdb)."<br><br>";
  }


  if($maxDay< $thisDay+1){
    $thisWeek++;
    $thisDay=1;
  }else{
    $thisDay++;
  }
  $UpdateWeekDaySql = "UPDATE user
                        SET week=$thisWeek, day=$thisDay,totalDay=$totalDay
                        WHERE user_id='$_SESSION[user_id]'";
  $UpdateWeekDaySql = mysqli_query($flagtagdb,$UpdateWeekDaySql);
  if($routineSqlResult===false){
    echo "week와 day를 업데이트 하는 과정에서 문제가 생겼습니다.<br>";
    echo mysqli_error($flagtagdb)."<br><br>";
  }

  header('Location: ../index.php?menu=main');
 ?>
