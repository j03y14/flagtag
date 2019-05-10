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
        include "./model/roundoff.php";
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
        //4주
        //몇 주인지 변수1
        for($l=0;$l<4;$l++){

          //7일

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
              echo "<tr><td style='color: red; vertical-align:center; font-weight:bold;'>";
            }else{
              echo "<tr><td style='vertical-align:center;font-weight:bold;'>";
            }
          ?>
             DAY<?php echo $num."<br>";?></td></tr>
             <tr>
             <td>
               <?php
               //그 주의 몇 번째 날들이 쉬는 날인지 변수2
               if($num%7==3||$num%7==6||$num%7==0){
                echo 'break';
                continue;
               }
                ?>
               <table>
                <?php

                for($k=0;$k<3;$k++){?><tr><?php

                  $t="";
                  //하루에 몇 세트까지인지 변수3
                  for($j=0;$j<21;$j++){

                    if($k==0){
                      //한 운동이 몇번 반복 되는지 변수4
                      if($j==0){
                        echo '<td colspan="8" text-align="left" class="type">';
                      }else if($j==8){
                        echo '<td colspan="3" text-align="left" class="type">';
                      }else if($j==11){
                        echo '<td colspan="5" text-align="left" class="type">';
                      }else if($j==16){
                        echo '<td colspan="5" text-align="left" class="type">';
                      }
                    }else{
                      echo '<td text-align="left">';
                    }


                    if(!empty($routineData[3*$j+$k+1])){
                      //나머지가 1이면: 운동의 종류 셀이면
                      if((3*$j+$k+1)%3==1){
                        if($routineData[3*$j+$k+1]!=$t){
                         $t = $routineData[3*$j+$k+1];
                         echo $routineData[3*$j+$k+1];
                       }
                     }else if ((3*$j+$k+1)%3==2){
                         if ($routineData[(3*$j+$k+1)%3 - 1] == "squat"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_squat']);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "benchpress"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_benchpress']);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "deadlift"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_deadlift']);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "ohp"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "incline_benchpress"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "stiffleg_deadlift"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_deadlift']*0.8);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "front_squat"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_squat']*0.7);
                        }
                        else if ($routineData[(3*$j+$k+1)%3 - 1] == "close_grip_benchpress"){
                          echo roundoff($routineData[3*$j+$k+1]*$user_information['1RM_benchpress']*0.9);
                        }
                          echo "kg  ";
                      }else if((3*$j+$k+1)%3==0){
                        echo $routineData[3*$j+$k+1]." times";
                      }

                      ?></td><?php
                    }
                    ?>
                  <?php
                }

                  ?>
                  </tr>


              <?php
          }

            ?>
            </td>
          </tr>
        </table>
            <?php
        }
      }
             ?>



    </table>

  </body>
</html>
