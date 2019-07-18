<?php
include_once "./model/dbConnect.php";
include_once "./model/constructRoutine.php";

//user 정보를 가져오는 부분
$SendUserRoutineSql = "SELECT user_routine, user_routine_startday,1RM_squat,1RM_benchpress,1RM_deadlift
                      FROM user
                      WHERE user_id='$_SESSION[user_id]'";
$routineSqlResult = mysqli_query($flagtagdb,$SendUserRoutineSql);
$user_information = mysqli_fetch_array($routineSqlResult);

function roundoff($a){
$t=Intval($a/2.5);
$r=$t*2.5;
return $r;
}

function final_weight($thisType,$thisWeight){
  global $user_information;
  //weight가 입력아 안 되어 있으면
  if($thisWeight==NULL){
    echo "자유 무게 X";
  }else{

    if ($thisType == "squat"){
      echo roundoff($thisWeight*$user_information['1RM_squat'])."kg X ";
    }
    else if ($thisType == "benchpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress'])."kg X";
    }
    else if ($thisType == "deadlift"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift'])."kg X";
    }
    else if ($thisType == "ohp"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType == "incline_benchpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType== "stiffleg_deadlift"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift']*0.8)."kg X";
    }
    else if ($thisType == "front_squat"){
      echo roundoff($thisWeight*$user_information['1RM_squat']*0.7)."kg X";
    }
    else if ($thisType == "close_grip_benchpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.9)."kg X";
    }
    else if ($thisType == "barbellrow"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType == "free_training1"||$thisType =="free_training2"||$thisType=="core_training"){
      echo "적정 무게 "."X";
    }
    else if($thisType=="chinup"||$thisType=="pullup"){
      echo "실패지점까지";
    }

  }
}
?>
