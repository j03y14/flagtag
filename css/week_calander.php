<?php
  include "./model/calculateDate.php";
  include "./model/dbConnect.php";
  include "./model/roundoff.php";
  $getUserSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift
                        FROM user
                        WHERE user_id='$_SESSION[user_id]'";
  $getUserSqlResult = mysqli_query($flagtagdb,$getUserSql);
  $user_information = mysqli_fetch_array($getUserSqlResult);
  $user_routine_startday = date("Y-n-j",strtotime($user_information['user_routine_startday']."-1 days"));



  function whatDate($i){
    $var;
    switch ($i) {
      case "1":
        $var="(월)";
        break;
      case "2":
        $var= "(화)";
        break;
      case "3":
        $var= "(수)";
        break;
      case "4":
        $var= "(목)";
        break;
      case "5":
        $var= "(금)";
        break;
      case "6":
        $var= "(토)";
        break;
      case "0":
        $var= "(일)";
        break;
    }
    return $var;
  }
 ?>

<!DOCTYPE html>
<html lang="kor">
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
  <div class="caladerButton">
    <a href="index.php?menu=calander">월 달력</a>
    <a href="index.php?menu=week_calander">주 달력</a>
  </div>
  <div class="calander">


    <table>
      <?php

      /*그 주의 일요일부터 토요일까지의 날짜를 구하기 위해서
      그 주가 그 해의 몇번째 주인지를 구하고 $this_week
      ($this_week-1)*7 - $first_day_date를 한다.*/
      $first_day_of_week = ($this_week-1)*7 -$first_day_date+1; //그 주의 첫번째 날이 그 해의 몇번째 날인지
      for($i=0; $i<7; $i++){
        //그 요일이 그 해의 몇번째 날인지
        $tempDay = $first_day_of_week+$i;
      ?>
        <tr>
          <td class="date">
            <?php

            echo whatMonthIs($tempDay,$max_day_of)."/".whatDayIs($tempDay,$max_day_of).whatDate($i);
            //오늘이면 * 표시
            if($i==$thisDate){
              echo '*';
            }
            ?>
          </td>
          <td>
            <?php
              $tdday = date_create($year.'-'.whatMonthIs($tempDay,$max_day_of).'-'.whatDayIs($tempDay,$max_day_of));
              $isNthDay = date_diff($tdday,date_create($user_routine_startday));
              if($isNthDay->invert==1){
                echo 'day '.$isNthDay->days;
              }

             ?>

          </td>
          <td>
            <?php

            $getRoutineSql = "SELECT * FROM $user_information[user_routine] WHERE days=$isNthDay->days";
            $getRoutineSqlResult = mysqli_query($flagtagdb,$getRoutineSql);
            $routine = mysqli_fetch_array($getRoutineSqlResult);
            if($getRoutineSqlResult===false){
              mysqli_error($flagtagdb);
            }
            if($isNthDay->invert==1){
              continue;
            }
            if($isNthDay->days%7==3||$isNthDay->days%7==6||$isNthDay->days%7==0){
             echo 'break';
             continue;
            }
            ?>
            <table>
              <?php
              for($k=0;$k<3;$k++){
                $t=" ";
                ?>

                <tr>
                <?php
                for($j=0;$j<21;$j++){
                  if($k==0){
                    if($j==0){
                      echo '<td colspan="8" text-align="left" class="routine">';
                    }else if($j==8){
                      echo '<td colspan="3" text-align="left" class="routine">';
                    }else if($j==11){
                      echo '<td colspan="5" text-align="left" class="routine">';
                    }else if($j==16){
                      echo '<td colspan="5" text-align="left" class="routine">';
                    }
                  }else{
                    echo '<td text-align="left" class="content">';
                  }
                  if(!empty($routine[3*$j+$k+1])){
                    //나머지가 1이면: 운동의 종류 셀이면
                    if((3*$j+$k+1)%3==1){
                      if($routine[3*$j+$k+1]!=$t){
                       $t = $routine[3*$j+$k+1];
                       echo $routine[3*$j+$k+1];
                      }
                    }else if ((3*$j+$k+1)%3==2){
                         if ($routine[(3*$j+$k+1)%3 - 1] == "squat"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_squat']);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "benchpress"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_benchpress']);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "deadlift"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_deadlift']);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "ohp"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "incline_benchpress"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_benchpress']*0.7);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "stiffleg_deadlift"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_deadlift']*0.8);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "front_squat"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_squat']*0.7);
                        }
                        else if ($routine[(3*$j+$k+1)%3 - 1] == "close_grip_benchpress"){
                          echo roundoff($routine[3*$j+$k+1]*$user_information['1RM_benchpress']*0.9);
                        }
                          echo "kg  ";
                      }else if((3*$j+$k+1)%3==0){
                        echo $routine[3*$j+$k+1]." 번";
                      }
                   }

                  ?>

                  </td>
                  <?php
                }
                ?>
                </tr>
                <?php
              }
               ?>
            </table>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

</body>

</html>
