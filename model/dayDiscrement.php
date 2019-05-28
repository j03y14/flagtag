<?php
  session_start();
  include_once "dbConnect.php";
  $maxDay = (int)$_GET['maxDay'];
  $thisWeek =  (int)$_GET['thisWeek'];
  $thisDay =  (int)$_GET['thisDay'];
  $routineID = (int)$_GET['routineID'];
  $totalDay = (int)$_GET['totalDay'];



  $deleteCompleteDaySql = "DELETE FROM CompleteDay WHERE user_number=$_SESSION[user_number] and day=$totalDay";
  if(mysqli_query($flagtagdb,$deleteCompleteDaySql)===false){
      echo "CompleteDay를 삭제하는 과정에서 문제가 생겼습니다.<br>";
      echo mysqli_error($flagtagdb)."<br><br>";
  }

  if($thisWeek==1&& $thisDay==1){}
    else{
    if($thisDay-1<=0){
      $thisWeek--;
      $thisDay=$maxDay;}
    else if($thisWeek==0){
      $thisWeek=1;
      $thisDay=1;
    }else{
      $thisDay--;
    }
  $totalDay--;
  $UpdateWeekDaySql = "UPDATE user
                        SET week=$thisWeek, day=$thisDay,totalDay=$totalDay
                        WHERE user_id='$_SESSION[user_id]'";
  $UpdateWeekDaySql = mysqli_query($flagtagdb,$UpdateWeekDaySql);
  if($routineSqlResult===false){
    echo "week와 day를 업데이트 하는 과정에서 문제가 생겼습니다.<br>";
    echo mysqli_error($flagtagdb)."<br><br>";
  }
}
  header('Location: ../index.php?menu=main');
 ?>
