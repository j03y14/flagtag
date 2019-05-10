<?php
  include "./model/dbConnect.php";
  include "./model/calculateDate.php";
  date_default_timezone_set('Asia/Seoul');
  $sql = "SELECT user_routine_startday
                        FROM user
                        WHERE user_id='$_SESSION[user_id]'";
  $sqlResult = mysqli_query($flagtagdb,$sql);
  $user_information = mysqli_fetch_array($sqlResult);

  $today = date_create(date("Y-n-j")); // 0을 포함하지 않는 일
  //var_dump($today);

  $user_routine_startday = date("Y-n-j",strtotime($user_information['user_routine_startday']."-1 days"));
  //var_dump($user_routine_startday);


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
  <link rel="stylesheet" href="/css/calender.css">

</head>
<body>
  <div class="caladerButton">
    <a href="index.php?menu=calander">월 달력</a>
    <a href="index.php?menu=week_calander">주 달력</a>
  </div>
  <div class="container">

    <table class="table">
      <div id="indicatorContainer">
        <tr id="indicator">
          <td>
              <a href=<?php echo 'index.php?menu=calander&year='.$preyear.'&month='.$month . '&day=1'; ?>>◀◀</a>
          </td>
          <td>
              <a href=<?php echo 'index.php?menu=calander&year='.$prev_year.'&month='.$prev_month . '&day=1'; ?>>◀</a>
          </td>
          <td id="title" bgcolor="#FFFFFF" colspan="3">
              <a href=<?php echo 'index.php?menu=calander&year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
              <?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
          </td>
          <td>
              <a href=<?php echo 'index.php?menu=calander&year='.$next_year.'&month='.$next_month.'&day=1'; ?>>▶</a>
          </td>
          <td>
              <a href=<?php echo 'index.php?menu=calander&year='.$nextyear.'&month='.$month.'&day=1'; ?>>▶▶</a>
          </td>
        </tr>
        <tr class="info">
          <th><font class="holy">일</font></th>
          <th>월</th>
          <th>화</th>
          <th>수</th>
          <th>목</th>
          <th>금</th>
          <th><font class="blue">토</font></th>
        </tr>
      </div>


      <?php
        // 5. 화면에 표시할 화면의 초기값을 1로 설정
        $day=1;

        // 6. 총 주 수에 맞춰서 세로줄 만들기
        for($i=1; $i <= $total_week; $i++){?>
          <tr>
        <?php
        // 7. 총 가로칸 만들기
        for ($j = 0; $j < 7; $j++) {
            // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
            echo '<td height="50" valign="top">';
            if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
                $tdday = date_create($year.'-'.$month.'-'.$day);

                $todayIsNthDay = date_diff($tdday,date_create($user_routine_startday));
                if ($j == 0) {
                    // 9. $j가 0이면 일요일이므로 빨간색
                    $style = "holy";
                } else if ($j == 6) {
                    // 10. $j가 0이면 토요일이므로 파란색
                    $style = "blue";
                } else {
                    // 11. 그외는 평일이므로 검정색
                    $style = "black";
                }


                if ($year == $thisyear && $month == $thismonth && $day == date("j")) {
                    // 13. 날짜 출력
                    echo '<font class='.$style.'>';
                    echo $day.' today';
                    echo '</font>';

                }else{
                  echo '<font class='.$style.'>';
                  echo $day;
                  echo '</font>';

                }
                if($todayIsNthDay->days<29&&$todayIsNthDay->invert==1){

                    echo '<br><br>day '.$todayIsNthDay->days;
                }
                // 14. 날짜 증가
                $day++;
            }
            echo '</td>';
        }
     ?>
      </tr>
      <?php } ?>
    </table>
  </div>

</body>
</html>
