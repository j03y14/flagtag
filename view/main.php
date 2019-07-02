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
   <link rel="stylesheet" href="/css/main.css">
   <script type="text/javascript">

   function showWeek(week){
     weekRoutineClass = ".week"+week;
     $(weekRoutineClass).toggle();
   }
   function checkboxClick(set){
     if($("#checkboxIcon"+set).hasClass('fa-square')){
       timerStart();
     }
     $("#checkboxIcon"+set).toggleClass('fa-square');
     $("#checkboxIcon"+set).toggleClass('fa-check-square');
   }
   </script>

 </head>
 <body>
 <?php
   include_once "./model/dbConnect.php";
   include_once "./model/roundoff.php";
   include_once "./model/constructRoutine.php";
   date_default_timezone_set('Asia/Seoul');

   //user 정보를 가져오는 부분
   $SendUserRoutineSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift,week,day,totalDay
                         FROM user
                         WHERE user_id='$_SESSION[user_id]'";
   $routineSqlResult = mysqli_query($flagtagdb,$SendUserRoutineSql);
   $user_information = mysqli_fetch_array($routineSqlResult);
   if($routineSqlResult===false){
     echo "user 루틴 이름을 가져오는 과정에서 문제가 생겼습니다.<br>";
     echo mysqli_error($flagtagdb)."<br><br>";
   }
   $totalDay = $user_information['totalDay'];


   //루틴을 db에서 가져오는 함수

   $SendRoutineMax = "SELECT maxweek,maxday,routineID
                         FROM RoutineInfo
                         WHERE name='$user_information[0]'";
   $routineSqlMax = mysqli_query($flagtagdb,$SendRoutineMax);
   $max_routine = mysqli_fetch_array($routineSqlMax);
   $routineID = $max_routine['routineID'];
   if($routineSqlMax===false){
     echo "user 루틴 이름을 가져오는 과정에서 문제가 생겼습니다.<br>";
     echo mysqli_error($flagtagdb)."<br><br>";
   }

   $maxWeek = $max_routine['maxweek'];
   $maxDay = $max_routine['maxday'];
   $thisWeek = $user_information['week'];
   $thisDay = $user_information['day'];

   if($maxWeek<$thisWeek){

     echo "<h3><a href='?menu=routine'>루틴 완료! 루틴 새로 선택하러 가기</a> ";
   }else{
     echo "<div class='container todayRoutine justify-content-center'>";
     echo "<h1>Week ".$thisWeek."- Day ".$thisDay."</h1><br>";

     include "view/timer.php";


     $userRoutine = $user_information['user_routine'];
     $SendRoutineInfo = "SELECT *
                           FROM $userRoutine
                           WHERE week = $thisWeek && day = $thisDay";
     $routineSql = mysqli_query($flagtagdb,$SendRoutineInfo);
     $routine_information = mysqli_fetch_array($routineSql);
     //내일은 쉬는날인지 정보 가져오는 부분
     $SendBreakInfo = "SELECT *
                           FROM $userRoutine
                           WHERE days = $routine_information[days]+1 ";
     $breakSql = mysqli_query($flagtagdb,$SendBreakInfo);
     $break_information = mysqli_fetch_array($breakSql);

     for($i=3;$i<count($routine_information)/2;$i+=3){
       if($routine_information[$i]==NULL) continue;
       if($routine_information[$i]!=$routine_information[$i-3]){

         if(!is_numeric($routine_information[$i-3])){
           echo "</div>";
           echo "<h3><p>".$routine_information[$i]."</p></h3><hr>";
           echo "<div class='row todayRow equal 1justify-content-center'>";
         }else{
           echo "<h3><p>".$routine_information[$i]."</p></h3><hr>";
          echo "<div class='row todayRow equal 1justify-content-center'>";
         }


       }
       //무게 X 횟수
       echo "<div class = 'col-8'>";
       echo final_weight($routine_information[$i],$routine_information[$i+1]).$routine_information[$i+2]."<br>";
       echo "</div>";
       //체크박스
       echo '<div class="col-4">';
       echo "<button class='checkboxButton'onclick='checkboxClick($i)'><i class='far fa-square' id='checkboxIcon$i'></i></button>";
       echo "</div>";


    }
    echo "</div>";
    echo "<p>";
     echo "<a href='model/dayIncrement.php?maxDay=$maxDay&thisWeek=$thisWeek&thisDay=$thisDay&routineID=$routineID&totalDay=$totalDay'>
       <input class='btn btn-secondary' type='button' value='complete' >
     </a>";

     echo "<a href='model/dayDiscrement.php?maxDay=$maxDay&thisWeek=$thisWeek&thisDay=$thisDay&routineID=$routineID&totalDay=$totalDay'
     ";
     if($thisWeek==1&&$thisDay==1) echo "disabled='disabled'";
     echo ">
       <input class='btn btn-secondary' type='button' value='Back'
       ";
     if($thisWeek==1&&$thisDay==1) echo "disabled='disabled'";
     echo ">
     </a>";
    echo "</p>";
     if($break_information[day]==0){
       echo "<br><br>"."내일은 쉬는 날 입니다.";
     }
     echo "</div>";
     ?>
     <!--주 루틴 부분-->
     <div class="container">
       <?php
       //$a는 week를 의미
       for($a=1; $a<=$maxWeek;$a++){
       ?>
          <div class="week<?php echo $a;?>Container">
            <button type="button" class="btn btn-light weekRoutineToggle" id="week<?php echo $a;?>Button" onclick="showWeek(<?php echo $a;?>)" name="button">
              <?php echo "Week $a"; ?>
            </button>
            <div class="row weekRow equal justify-content-center">
              <?php
              //$b는 day를 의미
                for($b=1; $b<=$maxDay;$b++){
                  $SendRoutineInfo = "SELECT *
                                        FROM $userRoutine
                                        WHERE week = $a && day = $b";
                  $routineSql = mysqli_query($flagtagdb,$SendRoutineInfo);
                  $routine_information = mysqli_fetch_array($routineSql);
                  //echo "<pre>";
                  //var_dump($routine_information);
                  //echo "</pre>";
                  if($routineSql===false){
                    echo "문제가 생겼습니다.<br>";
                    echo mysqli_error($flagtagdb)."<br><br>";
                  }
                  echo "<div class='col-md-6 col-lg-3 weekRoutine week$a'>";
                  echo "<h3>Week$a-Day$b</h3>";
                  echo "<hr>";
                  for($c=3;$c<count($routine_information)/2;$c+=3){
                    if($routine_information[$c]==NULL) continue;
                    if($routine_information[$c]!=$routine_information[$c-3]){

                      if(!is_numeric($routine_information[$c-3])){
                        echo "</div>";
                        echo "<h3><p>".$routine_information[$c]."</p></h3>";
                        echo "<div class='row equal 1justify-content-center'>";
                      }else{
                        echo "<h3><p>".$routine_information[$c]."</p></h3>";
                       echo "<div class='row equal 1justify-content-center'>";
                      }


                    }
                    echo "<div class = 'col-12'>";
                    echo final_weight($routine_information[$c],$routine_information[$c+1]).$routine_information[$c+2]."<br>";
                    echo "</div>";
                  }
                  echo "</div>";
                  echo "</div>";
                }

               ?>
            </div>


          </div>
       <?php
       }
        ?>
     </div>


     <?php
   }



   ?>
