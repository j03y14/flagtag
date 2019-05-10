<?php
  include "dbConnect.php";
  session_start();

  $purpose = $POST['purpose'];
  $place=$_POST['place'];
  $wodpw=$_POST['workoutDayPerWeek'];
  $career=$_POST['career'];
  $sex=$_POST['calculator_sex'];
  $age=$_POST['calculator_age'];
  $ageMark = 0;
  if($age<40){
    $ageMark = 0;
  }
  if else($age<60){
    $ageMark = 1;
  }
  else{
    $ageMark = 2;
  }
  $routineIndex = 0;

  $MadCow = 2231000;
  $JimWendler = 2242000;
  $StartingStrenthBasic = 2232000;
  $StartingStrenthAdvanced = 2233000;
  $StrongLifting = 2235000;

  $chosedCode = $purpose*1000000 + $place*100000 + $wodpw*10000 + $career*1000 + $sex*100 + $ageMark*10;
  if($chosedCode >2000000)


?>
