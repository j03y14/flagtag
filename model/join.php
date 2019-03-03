<?php
  include "dbConnect.php";
  $user_height=0;
  $user_weight=0;
  $user_TDEE=0;
  $ONERM_squat=0;
  $ONERM_benchpress=0;
  $ONERM_deadlift=0;

  var_dump($_POST);
  echo "<br><br>";

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



  $joinSql = "
    INSERT INTO user(
        user_id,
        user_password,
        user_name,
        user_email,
        user_phonenumber,
        user_height,
        user_weight,
        user_TDEE,
        1RM_squat,
        1RM_benchpress,
        1RM_deadlift
    )VALUES(
      '{$_POST['user_id']}',
      '{$_POST['user_password']}',
      '{$_POST['user_name']}',
      '{$_POST['user_email']}',
      '{$_POST['user_phonenumber']}',
      $user_height,
      $user_weight,
      $user_TDEE,
      $ONERM_squat,
      $ONERM_benchpress,
      $ONERM_deadlift
    )
    ";


  $joinSqlResult = mysqli_query($flagtagdb,$joinSql);
  if($joinSqlResult === false){
    echo '<meta charset="utf-8">
    저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요'.$user_height.",
    ".$user_weight.",
    ".$user_TDEE.",
    ".$ONERM_squat.",
    ".$ONERM_benchpress.",
    ".$ONERM_deadlift;
    echo mysqli_error($flagtagdb);
  } else {
    echo '<meta charset="utf-8"> 성공했습니다. <a href="/index.php">돌아가기</a>';

  }
 ?>
 <!--
 '".$user_height."',
 '".$user_weight."',
 '".$user_TDEE."',
 '".$ONERM_sqaut."',
 '".$ONERM_benchpress."',
 '".$ONERM_deadlift."'
-->
