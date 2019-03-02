<?php
  echo '<head><meta charset="utf-8"></head>';
  include "dbConnect.php";
  $user_id = $_GET["user_id"];
  $checkIdsqlResult = mysqli_query($flagtagdb,"select * FROM user WHERE user_id LIKE '".$user_id."'");
  $member = mysqli_fetch_array($checkIdsqlResult);

  if($member == 0){
    //중복된 아이디가 아니면
   echo "<script>
          window.parent.document.getElementById('user_id_check_indicator').value='사용할 수 있는 아이디 입니다.';
          window.parent.document.getElementById('user_id_check_indicator').style.height='50px';
          window.parent.document.getElementById('user_id_check_indicator').style.opacity='1';
          window.parent.document.getElementById('user_id_check_indicator').style.color='blue';
         </script>";
  }
  else{
    //중복된 아이디면
    echo"
         <script>
           window.parent.document.getElementById('user_id').value='';
           window.parent.document.getElementById('user_id_check_indicator').value='사용할 수 없는 아이디 입니다.';
           window.parent.document.getElementById('user_id_check_indicator').style.height='50px';
           window.parent.document.getElementById('user_id_check_indicator').style.opacity='1';
           window.parent.document.getElementById('user_id_check_indicator').style.color='red';
         </script>
         ";
  }

?>
