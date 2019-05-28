<?php
  include "./model/dbConnect.php";
  include "./model/calculateDate.php";
  date_default_timezone_set('Asia/Seoul');
  $sql = "SELECT date FROM CompleteDay WHERE user_number='$_SESSION[user_number]'";
  $sqlResult = mysqli_query($flagtagdb,$sql);
  if (!function_exists('mysqli_fetch_all')) {
    function mysqli_fetch_all(mysqli_result $result) {
        $data = [];
        while ($data[] = $result->fetch_assoc()) {}
        return $data;
    }
  }
  $completeDays = mysqli_fetch_all($sqlResult);

  $today = date_create(date("Y-n-j")); // 0을 포함하지 않는 일
  var_dump($completeDays);




 ?>

<!DOCTYPE html>
<html lang="kor">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    font.holy {font-family: tahoma;color: #FF6C21;}
    font.blue {font-family: tahoma;color: #0000FF;}
    font.black {font-family: tahoma;color: #000000;}

  </style>
  <link rel="stylesheet" href="/css/calender.css">

</head>
<body>

  <div class="container">

    <table class="table">

      <tr class ="indicatorContainer" id="indicator">

        <td colspan="2">
            <a href=<?php echo 'index.php?menu=calander&year='.$prev_year.'&month='.$prev_month . '&day=1'; ?>><i class="fas fa-angle-left"></i></a>
        </td>
        <td id="title" bgcolor="#FFFFFF" colspan="3">
            <a href=<?php echo 'index.php?menu=calander&year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
            <?php echo  $year . '년 ' . $month . '월 '; ?></a>
        </td>
        <td colspan="2">
            <a href=<?php echo 'index.php?menu=calander&year='.$next_year.'&month='.$next_month.'&day=1'; ?>><i class="fas fa-angle-right"></i></a>
        </td>

      </tr>
      <tr class="info indicatorContainer">
        <th><font class="holy">일</font></th>
        <th>월</th>
        <th>화</th>
        <th>수</th>
        <th>목</th>
        <th>금</th>
        <th><font class="blue">토</font></th>
      </tr>



      <?php
        // 5. 화면에 표시할 화면의 초기값을 1로 설정
        $day=1;

        // 6. 총 주 수에 맞춰서 세로줄 만들기
        for($i=1; $i <= $total_week; $i++){?>
          <tr>
        <?php
        // 7. 총 가로칸 만들기
        for ($j = 0; $j < 7; $j++) {
            $tdday = date("Y-m-d",strtotime($year.'-'.$month.'-'.$day));
            // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
            if(array_search($tdday,array_column($completeDays,'date'))!==FALSE){
                echo '<td class="days" valign="top" style="background-color:#caf77b">';
            }else{
              echo '<td class="days" valign="top">';
            }

            if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {



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
                    echo $day.'&nbsp<i class="fas fa-check"></i>';
                    echo '</font>';

                }else{
                  echo '<font class='.$style.'>';
                  echo $day;
                  echo '</font>';

                }


                // 14. 날짜 증가
                $day++;
            }

            echo '<br>';
            //var_dump($tdday);
            echo '</td>';
        }
     ?>
      </tr>
      <?php } ?>
    </table>
  </div>

</body>
</html>
