<?php
  $id = $_POST['user_id'];
  $password = $_POST['user_password'];
  session_start();
  include "dbConnect.php";
  $loginSql="
    SELECT * FROM user WHERE user_id LIKE '{$id}' AND user_password LIKE '{$password}'
  ";
  $loginSqlResult = mysqli_query($flagtagdb,$loginSql);
  $user = mysqli_fetch_array($loginSqlResult);
  if($user['user_id']==$id && $user['user_password']==$password){
    $_SESSION['is_login'] = ture;
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    header('Location: ../index.php');
  }else{
    echo '<meta charset="utf-8"> 회원을 찾을 수 없습니다.';
    echo '<meta charset="utf-8"> <a href="/?menu=login">돌아가기</a>';
  }
 ?>
