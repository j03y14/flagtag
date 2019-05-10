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


 class OneDayRoutine{
  array SetsOftheType = new IndividualSet();

}
class Routine{
  var routine_startday;
  var todayIsNthDay;
  array NthDayRoutine= new OneDayRoutine();

  routine_startday = $user_information("$user_routine_startday");
  $todayIsNthDay = date_diff($today,$user_routine_startday);
  

}
?>
