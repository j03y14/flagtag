  <html>
 <!DOCTYPE html>
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
   include_once "./model/dbConnect.php";
   include_once "./model/roundoff.php";
   include_once "./model/constructRoutine.php";
   date_default_timezone_set('Asia/Seoul');

   //user 정보를 가져오는 부분
   $SendUserRoutineSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift
                         FROM user
                         WHERE user_id='$_SESSION[user_id]'";
   $routineSqlResult = mysqli_query($flagtagdb,$SendUserRoutineSql);
   $user_information = mysqli_fetch_array($routineSqlResult);
   if($routineSqlResult===false){
     echo "user 루틴 이름을 가져오는 과정에서 문제가 생겼습니다.<br>";
     echo mysqli_error($flagtagdb)."<br><br>";
   }



   //루틴을 db에서 가져오는 함수

   $SendRoutineMax = "SELECT maxweek,maxday
                         FROM RoutineInfo
                         WHERE name='$user_information[0]'";
   $routineSqlMax = mysqli_query($flagtagdb,$SendRoutineMax);
   $max_routine = mysqli_fetch_array($routineSqlMax);
   if($routineSqlMax===false){
     echo "user 루틴 이름을 가져오는 과정에서 문제가 생겼습니다.<br>";
     echo mysqli_error($flagtagdb)."<br><br>";
   }
   $maxDay = $max_routine['day'];
   $maxWeek = $max_routine['week'];
   $thisWeek = 1;
   $thisDay = 1;
   $thisDate = 10*$thisWeek + $thisDay;

   echo "<h1>".$thisWeek."-".$thisDay."</h1><br>";


   $userRoutine = $user_information['user_routine'];
   $SendRoutineInfo = "SELECT *
                         FROM $userRoutine
                         WHERE week = $thisWeek && day = $thisDay";
   $routineSql = mysqli_query($flagtagdb,$SendRoutineInfo);
   $routine_information = mysqli_fetch_array($routineSql);
   for($i=3;$i<count($routine_information)/2;$i+=3){
     if($routine_information[$i]!=$routine_information[$i-3]){
       echo "<h3>".$routine_information[$i]."</h3><br>";
     }
     else{}
     echo final_weight($routine_information[$i],$routine_information[$i+1]).$routine_information[$i+2]."<br>";
   }

   ?>
