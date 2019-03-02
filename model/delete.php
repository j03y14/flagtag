

<?php
  include "dbConnect.php";

  $deleteSql = "
    DELETE  FROM user WHERE user_id='{$_POST['user_id']}'
    ";

  $deleteSqlResult = mysqli_query($flagtagdb,$deleteSql);

  if($deleteSqlResult === false){
    echo '<meta charset="utf-8">
    저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_error($flagtagdb);
  } else {
    echo '<meta charset="utf-8"> 회원 탈퇴에 성공했습니다. 언제든지 다시 가입하실 수 있습니다. 감사합니다 <br><br> <a href="logout.php">홈</a>';
  }
 ?>
