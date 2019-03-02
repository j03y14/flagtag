<?php
  $flagtagdb = mysqli_connect("localhost", "flagtag", "john6549", "flagtag");

    if (isset($_POST['user_height'])) {
        $user_height = $_POST['user_height'];
    }
    else {
        $user_height = '';
    }
    
    if (isset($_POST['user_weight'])) {
        $user_weight = $_POST['user_weight'];
    }
    else {
        $user_weight = '';
    }
    
    if (isset($_POST['user_TDEE'])) {
        $user_TDEE = $_POST['TDEE'];
    }
    else {
        $user_TDEE = '';
    }
    
    if (isset($_POST['1RM_squat'])) {
        $1RM_squat = $_POST['1RM_aquat'];
    }
    else {
        $1RM_sqaut = '';
    }
    
    if (isset($_POST['1RM_benchpress'])) {
        $1RM_benchpress = $_POST['1RM_benchpress'];
    }
    else {
        $1RM_benchpress = '';
    }
    
    if (isset($_POST['1RM_deadlift'])) {
        $1RM_deadlift = $_POST['1RM_deadlift'];
    }
    else {
        $1RM_deadlift = '';
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
      $user_id,
      $user_password,
      $user_name,
      $user_email,
      $user_phonenumber,
      $user_height,
      $user_height,
      $user_weight,
      $user_TDEE,
      $1RM_squat,
      $1RM_benchpress,
      $1RM_deadlift
    )
    ";
    
  $joinSqlResult = mysqli_query($flagtagdb,$joinSql);
  if($joinSqlResult === false){
    echo '<meta charset="utf-8">
    저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
      var_dump($_POST);
    echo mysqli_error($joinSql);
  } else {
    echo '<meta charset="utf-8"> 성공했습니다. <a href="/index.php">돌아가기</a>';
  }
 ?>

