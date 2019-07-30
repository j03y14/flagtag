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
    if($thisType =="pullup"||$thisType =="chinup"){
      echo "";
    }
      else{
        echo "자유 무게 X";
      }
  }else{

    if ($thisType == "squat"){
      echo roundoff($thisWeight*$user_information['1RM_squat'])."kg X ";
    }
    else if ($thisType == "benchpress"||$thisType=="chest_press_machine"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress'])."kg X";
    }
    else if ($thisType == "deadlift"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift'])."kg X";
    }
    else if ($thisType == "ohp"||$thisType=="shoulder_press_machine"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType=="dumbell_shoulder_press"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7*0.85)."kg X";
    }
    else if ($thisType == "dumbell_press"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.8)."kg X";
    }
    else if ($thisType == "incline_benchpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType == "incline_dumbellpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.6)."kg X";
    }
    else if ($thisType == "pac_deck_fly"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.65)."kg X";
    }
    else if ($thisType== "stiffleg_deadlift"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift']*0.8)."kg X";
    }
    else if ($thisType == "lat_pull_down"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift']*0.5)."kg X";
    }
    else if ($thisType == "front_squat"){
      echo roundoff($thisWeight*$user_information['1RM_squat']*0.7)."kg X";
    }
    else if ($thisType == "lunge"){
      echo roundoff($thisWeight*$user_information['1RM_squat']*0.4)."kg X";
    }
    else if ($thisType == "close_grip_benchpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.8)."kg X";
    }
    else if ($thisType == "barbellrow"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.7)."kg X";
    }
    else if ($thisType == "pendlay_row"||$thisType=="seated_machine_row"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift']*0.5)."kg X";
    }
    else if ($thisType == "kettlebell_swing"){
      echo roundoff($thisWeight*$user_information['1RM_deadlift']*0.5)."kg X";
    }
    else if ($thisType == "pushpress"){
      echo roundoff($thisWeight*$user_information['1RM_benchpress']*0.8)."kg X";
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
