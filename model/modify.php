<?php
  //$flagtagdb에 db연결
  include "dbConnect.php";
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
            user_height=".$_POST['user_height'].",
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
            user_height=".$_POST['user_height'].",
            user_weight=".$_POST['user_weight'].",
            user_TDEE=".$_POST['user_TDEE'].",
            1RM_benchpress=".$_POST['1RM_benchpress'].",
            1RM_squat=".$_POST['1RM_squat'].",
            1RM_deadlift=".$_POST['1RM_deadlift']."
            WHERE user_id='".$_POST['user_id']."'";
    $modifySqlResult = mysqli_query($flagtagdb,$sql);
    if($modifySqlResult===false){
      echo "오류<br>";
      echo mysqli_error($flagtagdb);
    }
    header("Location: ../index.php");
  }


 ?>
