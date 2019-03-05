<?php
  //$flagtagdb에 db연결
  include "dbConnect.php";

  $user_height=0;
  $user_weight=0;
  $user_TDEE=0;
  $ONERM_squat=0;
  $ONERM_benchpress=0;
  $ONERM_deadlift=0;

  if ($_POST['user_height']!=0) {
      $user_height = $_POST['user_height'];
      echo "_POST['user_height']가 설정되어 있음:".$_POST['user_height']."<br>";
  }


  if ($_POST['user_weight']!=0) {
      $user_weight = $_POST['user_weight'];
      echo "_POST['user_weight']가 설정되어 있음:".$_POST['user_weight']."<br>";
  }


  if ($_POST['user_TDEE']!=0) {
      $user_TDEE = $_POST['user_TDEE'];
      echo "_POST['user_TDEE']가 설정되어 있음:".$_POST['user_TDEE']."<br>";
  }

  if ($_POST['1RM_squat']!=0) {
      $ONERM_squat = $_POST['1RM_squat'];
      echo "_POST['1RM_squat']가 설정되어 있음:".$_POST['1RM_squat']."<br>";
  }


  if ($_POST['1RM_benchpress']!=0) {
      $ONERM_benchpress = $_POST['1RM_benchpress'];
      echo "_POST['1RM_benchpress']가 설정되어 있음:".$_POST['1RM_benchpress']."<br>";
  }


  if ($_POST['1RM_deadlift']!=0) {
      $ONERM_deadlift = $_POST['1RM_deadlift'];
      echo "_POST['1RM_deadlift']가 설정되어 있음:".$_POST['1RM_deadlift']."<br>";
  }


  function findUser(){
    global $flagtagdb;

    $sql = "SELECT * FROM user WHERE user_id LIKE '{$_SESSION['user_id']}'";
    $finduserSqlResult = mysqli_query($flagtagdb,$sql);
    if($finduserSqlResult===false){
      echo "오류";
    }
    $user = mysqli_fetch_array($finduserSqlResult,MYSQLI_BOTH);

    return $user;
  }

  if(!empty($_POST)){

    echo "UPDATE user
            SET
            user_name ='".$_POST['user_name']."',
            user_email='".$_POST['user_email']."',
            user_phonenumber='".$_POST['user_phonenumber']."',
            user_height=".$puser_height.",
            user_weight=".$_POST['user_weight'].",
            user_TDEE=".$_POST['user_TDEE'].",
            1RM_benchpress=".$_POST['1RM_benchpress'].",
            1RM_squat=".$_POST['1RM_squat'].",
            1RM_deadlift=".$_POST['1RM_deadlift']."
            WHERE user_id='".$_POST['user_id']."'<br>";
    $sql = "UPDATE user
            SET
            user_name ='".$_POST['user_name']."',
            user_email='".$_POST['user_email']."',
            user_phonenumber='".$_POST['user_phonenumber']."',
            user_height=$user_height,
            user_weight=$user_weight,
            user_TDEE=$user_TDEE,
            1RM_benchpress=$ONERM_benchpress,
            1RM_squat=$ONERM_squat,
            1RM_deadlift=$ONERM_deadlift
            WHERE user_id='".$_POST['user_id']."'";
    $modifySqlResult = mysqli_query($flagtagdb,$sql);
    if($modifySqlResult===false){
      echo "오류<br>";
      echo mysqli_error($flagtagdb);
    }
    header("Location: ../index.php");
  }


 ?>
