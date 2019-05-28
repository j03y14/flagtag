<?php
  include "dbConnect.php";
  $user_password = $_POST['user_password'];
  $encryped_password = password_hash($user_password, PASSWORD_DEFAULT);

  $user_height=0;
  $user_weight=0;
  $user_TDEE=0;
  $ONERM_squat=0;
  $ONERM_benchpress=0;
  $ONERM_deadlift=0;


  echo "<br><br>";

  if ($_POST['user_height']!=0) {
      $user_height = $_POST['user_height'];
  }


  if ($_POST['user_weight']!=0) {
      $user_weight = $_POST['user_weight'];

  }


  if ($_POST['user_TDEE']!=0) {
      $user_TDEE = $_POST['user_TDEE'];

  }

  if ($_POST['1RM_squat']!=0) {
      $ONERM_squat = $_POST['1RM_squat'];

  }


  if ($_POST['1RM_benchpress']!=0) {
      $ONERM_benchpress = $_POST['1RM_benchpress'];

  }


  if ($_POST['1RM_deadlift']!=0) {
      $ONERM_deadlift = $_POST['1RM_deadlift'];

  }



  $joinSql = "INSERT INTO user(user_id,user_password,user_name,user_email,user_phonenumber,user_height,user_weight,TDEE,1RM_squat,1RM_benchpress,1RM_deadlift)
        VALUES('{$_POST['user_id']}','$encryped_password','{$_POST['user_name']}','{$_POST['user_email']}','{$_POST['user_phonenumber']}',$user_height,$user_weight,$user_TDEE,$ONERM_squat,$ONERM_benchpress,$ONERM_deadlift);";



  $joinSqlResult = mysqli_query($flagtagdb,$joinSql);
  if($joinSqlResult === false){
    echo '<meta charset="utf-8">
    저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요<br>';
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
