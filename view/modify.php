<?php
  include "model/modify.php";
  $user = findUser();
?>

<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="modifyForm" action="../model/modify.php" method="post">
      <table>
        <p>회원 정보 수정 페이지</p>
        <form action=""name="" method="post">
           <table width="940" style="padding:5px 0 5px 0; ">
             <tr>
               <td>이름</td>
               <td>
                 <input type="text" id="user_name" value="<?php echo $user['user_name'];?>" name="user_name">
               </td>
             </tr>
             <tr>
               <td>아이디</td>
               <td>
                 <input type="text" id="user_id" value="<?php echo $user['user_id'];?>" name="user_id" readonly>
               </td>
             </tr>

             <tr>
               <td>이메일</td>
               <td>
                 <input type='text' placeholder ="이메일" value="<?php echo $user['user_email'];?>"name="user_email">
               </td>
             </tr>

             <tr>
               <td>휴대전화</td>
                <td><input type="text" placeholder ="휴대전화" value="<?php echo $user['user_phonenumber'];?>"name="user_phonenumber">
                </td>
             </tr>

             <tr>
               <td>키</td>
               <td>
                  <input type="int" placeholder ="키" value="<?php echo $user['user_height'];?>"name="user_height">
               </td>
             </tr>

             <tr>
               <td>몸무게</td>
               <td>
                 <input type="int" placeholder ="몸무게" value="<?php echo $user['user_weight'];?>"name="user_weight">
               </td>
             </tr>

             <tr>
               <td>기초대사량</td>
               <td>
                 <input type="int" placeholder ="기초대사량" value="<?php echo $user['user_TDEE'];?>"name="user_TDEE">
               </td>
             </tr>

             <tr>
               <td>벤치프레스 1RM</td>
               <td>
                 <input type="int" placeholder ="벤치프레스 1RM" value="<?php echo $user['1RM_benchpress'];?>"name="1RM_benchpress">
               </td>
             </tr>

             <tr>
               <td>스쿼트 1RM</td>
               <td>
                 <input type="int" placeholder ="스쿼트 1RM" value="<?php echo $user['1RM_squat'];?>" name="1RM_squat">
               </td>
             </tr>

             <tr>
               <td>데드리프트 1RM</td>
               <td>
                 <input type="int" placeholder ="데드리프트 1RM" value="<?php echo $user['1RM_deadlift'];?>" name="1RM_deadlift">
               </td>
             </tr>
             <tr>
               <td>BMR</td>
               <td>
                 <input type="int" placeholder ="BMR" value="<?php echo $user['BMR'];?>" name="BMR" readonly>
               </td>
             </tr>
             <tr>
               <td>TDEE</td>
               <td>
                 <input type="int" placeholder ="TDEE" value="<?php echo $user['TDEE'];?>" name="TDEE" readonly>
               </td>
             </tr>
             <tr>
               <td>하루 목표 칼로리</td>
               <td>
                 <input type="int" placeholder ="goalCaloriePerDay" value="<?php echo $user['goalCaloriePerDay'];?>" name="goalCaloriePerDay" readonly>
               </td>
             </tr>
             <tr>
               BMR, TDEE, 하루 목표 칼로리는 TDEE CALCULATOR를 통해서만 바꿀 수 있습니다.
             </tr>

             <tr>
               <td colspan="2" align="center">

                 <input class="button" type="submit" value="저장">
                 <input class="button" type="reset" value="취소">
                 <div id="helloUser">
                 <ul>
                 <li id="delete"><a class="logout_mypage" href="view/delete.php">회원탈퇴</a></li>
                 </ul>
                 </div>
               </td>
             </tr>
           </table>

        </form>
      </table>
    </form>
  </body>
</html>
