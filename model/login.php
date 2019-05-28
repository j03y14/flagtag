<?php
  $id = $_POST['user_id'];
  $password = $_POST['user_password'];
  session_start();
  include_once "dbConnect.php";
  $loginSql="
    SELECT * FROM user WHERE user_id LIKE '{$id}'
  ";
  $loginSqlResult = mysqli_query($flagtagdb,$loginSql);
  $user = mysqli_fetch_array($loginSqlResult);
  if($user['user_id']!=NULL){
    if(password_verify($password, $user['user_password'])){
      $_SESSION['is_login'] = true;
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['user_name'] = $user['user_name'];
      $_SESSION['user_number'] = $user['user_number'];
      header('Location: ../index.php?menu=main');
    }
      echo '<meta charset="utf-8"> 비밀번호가 틀렸습니다..';
        echo '<meta charset="utf-8"> <a href="/?menu=login">돌아가기</a>';
  }else{
    echo '<meta charset="utf-8"> 회원을 찾을 수 없습니다.';
    echo '<meta charset="utf-8"> <a href="/?menu=login">돌아가기</a>';
  }
 ?>
