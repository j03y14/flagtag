<?php
  include "./model/calculateDate.php";
  function whatDate($i){
    $var;
    switch ($i) {
      case "1":
        $var="월요일";
        break;
      case "2":
        $var= "화요일";
        break;
      case "3":
        $var= "수요일";
        break;
      case "4":
        $var= "목요일";
        break;
      case "5":
        $var= "금요일";
        break;
      case "6":
        $var= "토요일";
        break;
      case "0":
        $var= "일요일";
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
  <link rel="stylesheet" href="/css/week_calender.css">

</head>
<body>
  <div class="caladerButton">
    <a href="index.php?menu=calander">월 달력</a>
    <a href="index.php?menu=week_calander">주 달력</a>
  </div>
  <div class="calander">
    <table>
      <?php
      for($i=0; $i<7; $i++){
      ?>
        <tr>
          <td>
            <?php
            echo whatDate($i);
            if($i==$thisDate){
              echo '오늘';
            }
            ?>
          </td>
          <td>
            운동
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

</body>

</html>
