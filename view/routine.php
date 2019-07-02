<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/routine.css">
    <script type="text/javascript">

    function showWeek(week){
      weekRoutineClass = ".week"+week;
      $(weekRoutineClass).toggle();
    }

    </script>
  </head>
    <body>
      <?php
      include "./model/dbConnect.php";
      include "./model/roundoff.php";
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
    $i=0;
    $routine_Name[$i]['name'] = $user_information['user_routine'];

    $SendRoutineInfo = "SELECT maxday,maxweek
                          FROM RoutineInfo
                          WHERE name='{$routine_Name[$i]['name']}'";
    $routineInfoResult = mysqli_query($flagtagdb,$SendRoutineInfo);
    if($routineInfoResult===false){
      echo "Error: ".mysqli_error($flagtagdb)."<br><br>";
    }
    $Routine_information = mysqli_fetch_array($routineInfoResult);

    $maxday = $Routine_information['maxday'];
    $maxweek= $Routine_information['maxweek'];

    //type 가져오기
    $sql = "SELECT type FROM RoutineMain WHERE routineName='{$routine_Name[$i]['name']}'";
    $routineTypesResult = mysqli_query($flagtagdb,$sql);
    if($routineTypesResult===false){
      echo '<br>'.mysqli_error($flagtagdb);
    }
    $routineType =  mysqli_fetch_all($routineTypesResult);
    $routineType1Arr = array();
    for($rtn=0;$rtn<count($routineType);$rtn++){
      array_push($routineType1Arr,$routineType[$rtn]['type']);
    }
    $routineType = array_unique($routineType1Arr);
    $routineType = array_values($routineType);
    $typeNum = count($routineType);
    echo "<div class='container'>";
    echo "<h2 class='routine-title'>".$routine_Name[$i]['name']."</h2>";
    echo "<hr>";
    include "view/routineTable.php";
    echo "<hr>";
    include "view/routineGraph.php";
    echo "</div>";
    ?>
    <!--주 루틴 부분-->
    <div class="container">
      <?php
      //$a는 week를 의미

      for($a=1; $a<=$maxweek;$a++){
      ?>
         <div class="week<?php echo $a;?>Container">
           <button type="button" class="btn btn-light weekRoutineToggle" id="week<?php echo $a;?>Button" onclick="showWeek(<?php echo $a;?>)" name="button">
             <?php echo "Week $a"; ?>
           </button>
           <div class="row weekRow equal justify-content-center">
             <?php
             //$b는 day를 의미
               for($b=1; $b<=$maxday;$b++){
                 $SendRoutineInfo = "SELECT *
                                       FROM {$routine_Name[$i]['name']}
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
                 echo "<hr style='border: 1px solid rgba(0,0,0,.5);'>";
                 echo "<h2>Week$a-Day$b</h2>";
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
  </body>
</html>
