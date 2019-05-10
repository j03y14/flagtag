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

  $userRoutine = getRoutine($user_information['user_routine']);
  //var_dump($userRoutine);

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
              //당일의 날짜
              $tdday = date_create($year.'-'.whatMonthIs($tempDay,$max_day_of).'-'.whatDayIs($tempDay,$max_day_of));
              $isNthDay = date_diff($tdday,date_create($user_routine_startday));
              $todaysRoutine = $userRoutine->NthDayRoutine[$isNthDay->days];
              //이번 주에 루틴이 끝날 경우에 'days'만 출력되는 경우를 막는다.
              if($isNthDay->invert==1){
                echo 'day '.$isNthDay->days;
              }

             ?>

          </td>
          <td>
            <?php

            //루틴을 시작하는 주이면 day1 이전에는 표시 안 하게
            if($isNthDay->invert!=1){
              continue;
            }
            //쉬는 날이면 'break'만 표시
            if($todaysRoutine->isBreak == true){
             echo 'break';
             continue;
            }
            ?>

              <?php
              for($k=0;$k<count($todaysRoutine->setsOftheType);$k++){

                ?>
                <table>

                  <?php
                  echo "<tr><td colspan=".count($todaysRoutine->setsOftheType[$k]).">".$todaysRoutine->setsOftheType[$k][0]->type."</td></tr>";
                   ?>

                    <?php
                    echo '<tr>';
                    for($a=0; $a<count($todaysRoutine->setsOftheType[$k]);$a++){
                      echo '<td>';
                      echo final_weight($todaysRoutine->setsOftheType[$k][$a]->type,$todaysRoutine->setsOftheType[$k][$a]->weight)." kg";
                      echo '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    for($a=0; $a<count($todaysRoutine->setsOftheType[$k]);$a++){
                      echo '<td>';
                      echo $todaysRoutine->setsOftheType[$k][$a]->rep." 번";
                      echo '</td>';
                    }
                    echo '</tr>';

                    ?>

                </table>
                <?php
              }
               ?>

          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

</body>

</html>
