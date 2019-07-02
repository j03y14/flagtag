<?php
if (!function_exists('mysqli_fetch_all')) {
    function mysqli_fetch_all($result, $mode = 0) {
        $all = FALSE;
        if ($result) {
            $all = array();
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $all[$i] = array();
                foreach($row as $key => $value) {
                    if (!is_numeric($key)) {
                        $all[$i][$key] = $value;
                    }
                }
                $i++;
            }
        }
        return $all;
    }
}
  $flagtagdb = mysqli_connect("localhost", "flagtag", "john6549", "flagtag");
  include_once $_SERVER['DOCUMENT_ROOT']."/model/constructRoutine.php";

  function getRoutine($routineName){
    global $flagtagdb;
    //Routine 객체에 db에 있는 정보를 가져오는 부분
    $userRoutine = new Routine;
    //db에서 가져온 정보를 가지고 객체의 루틴 이름을 넣음
    $userRoutine->setRoutineName($routineName);


    //루틴이 몇일짜리 정보인지 정함
    $userRoutine->setHowLongisRoutine();
    //루틴 날짜 수 만큼 객체의 NthDayRoutine에 객체를 추가
    for($day=0;$day<$userRoutine->howLongisRoutine;$day++){
        $userRoutine->createOneDayRoutine();

        $sendRoutineDataSql = "SELECT * FROM $routineName WHERE days = $day+1";
        $routineDataResult = mysqli_query($flagtagdb,$sendRoutineDataSql);
        $routineData = mysqli_fetch_array($routineDataResult);


        //$routineData = array_filter($routineData);

        //echo '<br><br>';

        $userRoutine->NthDayRoutine[$day]->getOneRoutine($routineData);
    }
    return $userRoutine;
  }


 ?>
