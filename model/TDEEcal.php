<?php
  $flagtagdb = mysqli_connect("localhost", "flagtag", "john6549", "flagtag");

  var_dump($_POST);
  echo "<br><br>";


  $calculator_height=$_POST['calculator_height'];
  $calculator_weight=$_POST['calculator_height'];
  $calculator_sex=$_POST['calculator_sex'];
  $calculator_age=$_POST['calculator_age'];
  $calculator_workoutdayperweek=$_POST['calculator_height'];
  $calculator_goalweight=$_POST['calculator_height'];
  $calculator_goalperiod=$_POST['calculator_height'];

  if ($calculator_sex=male){
    $BMR=66+(13.8 * $calculator_weight)+(5 * calculator_height)-(6.8 * calculator_age);
  }
  else{
    $BMR=655+(9.6 * $calculator_weight)+(1.8 * calculator_height)-(4.7 * calculator_age);
  }
  $TDEE= $BMR * $calculator_workoutdayperweek;
  $DIETcalorie_per_day = abs([$calculator_weight - $calculator_goalweight]) / $calculator_workoutdayperweek;

 echo '<meta charset="utf-8"> BMR(기초대사량):';$BMR
 echo'<br><meta charset="utf-8"> TDEE(하루필요열량):';$TDEE
 echo'<br><meta charset="utf-8"> 목표 체중에 따르는 하루 섭취열량:';$DIETcalorie_per_day
 echo'<br><br> <a href="logout.php">홈</a>';
?>
