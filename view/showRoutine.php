<?php
  include "../model/dbConnect.php";
  session_start();

  $purpose = $POST['purpose'];
  $place=$_POST['place'];
  $wodpw=$_POST['workoutDayPerWeek'];
  $time = $_POST['hour'];
  $career=$_POST['career'];
  $sex=$_POST['calculator_sex'];
  $age=$_POST['calculator_age'];

  $ageMark = 0;
  if($age<40){
    $ageMark = 0;
  }
  else if($age<60){
    $ageMark = 1;
  }
  else{
    $ageMark = 2;
  }
  $routineIndex = 0;

 $routines = array();
 $routines['MadCow'] = 2231;
 $routines['JimWendler'] = 2241;
 $routines['StartingStrengthBasic'] = 2231;
 $routines['StartingStrengthAdvanced'] = 2231;
 $routines['StrongLifting'] = 2235;


  $MadCow = 2231000;
  $JimWendler = 2242000;
  $StartingStrengthBasic = 2232000;
  $StartingStrengthAdvanced = 2233000;
  $StrongLifting = 2235000;

  $choseCode = $purpose*1000000 + $place*100000 + $wodpw*10000 + $time*1000 + $career*100 + $sex*10 + $ageMark*1;
  $CCC =$purpose*1000 + $place*100 + $wodpw*10 + $time*1;




  while($element = each($routines)) {
    if($element['value']>$CCC){
    echo $element['key']?><br><?php;}
}
  ?>
  <html>
  <head>
  </head>
  <body>
  These are our recomended routines

  </body>
</html>
