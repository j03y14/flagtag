<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/routine.css">
  </head>
  <body>
    <h1>Select Routine</h1>
    <form action="/model/send_routine.php" method="post">
      <select name="choosed_routine">
        <option value="JimWendler">JimWendler</option>
        <option value="StartingStrength">StartingStrength</option>
        <option value="MadCow">MadCow</option>
        <option value="StrongLifting">StrongLifting</option>
      </select>
      <input type="submit" name="확인" value="루틴시작"></input>
    </form>
    <table>

        <?php
        include "./model/dbConnect.php";
        date_default_timezone_set('Asia/Seoul');
        $SendUserRoutineSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift
                              FROM user
                              WHERE user_id='$_SESSION[user_id]'";
        $routineSqlResult = mysqli_query($flagtagdb,$SendUserRoutineSql);
        $user_information = mysqli_fetch_array($routineSqlResult);


        $today = date_create(date("Y-n-j")); // 0을 포함하지 않는 일
        //var_dump($today);

        $user_routine_startday = date_create($user_information['user_routine_startday']);
        //var_dump($user_routine_startday);
        $todayIsNthDay = date_diff($today,$user_routine_startday);


        if($routineSqlResult===false){
          echo "user 루틴 이름을 가져오는 과정에서 문제가 생겼습니다.<br>";
          echo mysqli_error($flagtagdb)."<br><br>";
        }
        for($l=0;$l<4;$l++){
          ?>
          <tr>
          <?php
          for($i=0;$i<7;$i++){
            $num = $l*7+$i+1;

            $sendRoutineDataSql = "SELECT * FROM $user_information[0] WHERE days = $num";
            $routineDataResult = mysqli_query($flagtagdb,$sendRoutineDataSql);
            $routineData = mysqli_fetch_array($routineDataResult);
            if($routineDataResult===false){
              echo "user 루틴 내용을 가져오는 과정에서 문제가 생겼습니다.<br>";
              echo mysqli_error($flagtagdb)."<br><br>";
            }
            if($num==$todayIsNthDay->days+1){
              echo "<td style='color: red; vertical-align:center; font-weight:bold;'>";
            }else{
              echo "<td style='vertical-align:center;font-weight:bold;'>";
            }
          ?>
             DAY<?php echo $num."<br>";?></td>
              <table>
                <?php
                $t="";
                for($k=0;$k<3;$k++){?><tr><?php



                  if((3*$j+$k+1)%3==1 && $routineData[3*$j+$k+1]==$routineData[3*$j+$k-2]){
                  ?><td colspan=2><?php;
                }
                else {
                  ?>
                  <td>
                <?php;}



                for($j=0;$j<21;$j++)  {?><td><?php


                    if(!empty($routineData[3*$j+$k+1])){
                      if((3*$j+$k+1)%3==1 && $routineData[3*$j+$k+1]==$routineData[3*$j+$k-2]){
                       echo "";
                     }
                      if((3*$j+$k+1)%3==1 && $routineData[3*$j+$k+1]!=$routineData[3*$j+$k-2]){
                       $t = $routineData[3*$j+$k+1];
                       echo $routineData[3*$j+$k+1];
                     }
                     else if((3*$j+$k+1)%3==0){
                       echo $routineData[3*$j+$k+1]."  ";
                     }

                     else if ((3*$j+$k+1)%3==2){
                        if ($routineData[(3*$j+$k+1)%3 - 1] == "squat"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_squat'];
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "benchpress"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_benchpress'];
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "deadlift"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_deadlift'];
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "ohp"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7;
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "incline_benchpress"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7;
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "stiffleg_deadlift"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_deadlift']*0.8;
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "front_squat"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_squat']*0.7;
                       }
                       else if ($routineData[(3*$j+$k+1)%3 - 1] == "close_grip_benchpress"){
                         echo $routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.9;
                       }








                     }if((3*$j+$k+1)%3==2){
                        echo "kg  ";
                      }else if((3*$j+$k+1)%3==0){
                        echo "times";
                      }

                    }
                    ?></td><?php
                  }
                    ?></td></tr><?php
                }

                  ?>


              <?php
          }

            ?>
            </tr>
            <?php
        }
             ?>



    </table>

  </body>
</html>
