<?php
  include "model/modify.php";
  $user = findUser();
?>

<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/modify.css">
    <script>
    function RMcal(){
      var W = document.getElementById("W").value;
      var R = document.getElementById("R").value;
      document.getElementById('RM').value = eval(W/[1.0278-(0.0278*R)]);
    }
    </script>
  </head>
  <body>
    <form class="modifyForm" action="../model/modify.php" method="post">
      <p>MY PAGE</p>
      <table width="940" style="padding:5px 0 5px 0; ">
       <tr>
         <td class="label">이름</td>
         <td>
           <input type="text" id="user_name" value="<?php echo $user['user_name'];?>" name="user_name">
         </td>
       </tr>
       <tr>
         <td class="label">아이디</td>
         <td>
           <input type="text" id="user_id" value="<?php echo $user['user_id'];?>" name="user_id" readonly>
         </td>
       </tr>

       <tr>
         <td class="label">이메일</td>
         <td>
           <input type='text' placeholder ="이메일" value="<?php echo $user['user_email'];?>"name="user_email">
         </td>
       </tr>

       <tr>
         <td class="label">휴대전화</td>
          <td><input type="text" placeholder ="휴대전화" value="<?php echo $user['user_phonenumber'];?>"name="user_phonenumber">
          </td>
       </tr>

       <tr>
         <td class="label">키</td>
         <td>
            <input type="int" placeholder ="키" value="<?php echo $user['user_height'];?>"name="user_height">
         </td>
       </tr>

       <tr>
         <td class="label">몸무게</td>
         <td>
           <input type="int" placeholder ="몸무게" value="<?php echo $user['user_weight'];?>"name="user_weight">
         </td>
       </tr>

       <tr>
         <td class="label">벤치프레스 1RM</td>
         <td>
           <input type="int" placeholder ="벤치프레스 1RM" value="<?php echo $user['1RM_benchpress'];?>"name="1RM_benchpress">
         </td>
       </tr>

       <tr>
         <td class="label">스쿼트 1RM</td>
         <td>
           <input type="int" placeholder ="스쿼트 1RM" value="<?php echo $user['1RM_squat'];?>" name="1RM_squat">
         </td>
       </tr>

       <tr>
         <td class="label">데드리프트 1RM</td>
         <td>
           <input type="int" placeholder ="데드리프트 1RM" value="<?php echo $user['1RM_deadlift'];?>" name="1RM_deadlift">
         </td>
       </tr>
       <tr>
         <td class="label">기초대사량</td>
         <td>
           <input type="int" placeholder ="BMR" value="<?php echo $user['BMR'];?>" name="BMR" readonly>
         </td>
       </tr>
       <tr>
         <td class="label">일일 칼로리 소비량</td>
         <td>
           <input type="int" placeholder ="TDEE" value="<?php echo $user['TDEE'];?>" name="TDEE" readonly>
         </td>
       </tr>
       <tr>
         <td class="label">하루 목표 칼로리</td>
         <td>
           <input type="int" placeholder ="goalCaloriePerDay" value="<?php echo $user['goalCaloriePerDay'];?>" name="goalCaloriePerDay" readonly>
         </td>
       </tr>
       <tr>
         <div id="tt">BMR, TDEE, 하루 목표 칼로리는 TDEE CALCULATOR를 통해서만 바꿀 수 있습니다.<br>
         1RM이란 1회 들 수 있는 최대 무게를 의미합니다.</div>
       </tr>
       <tr>
       <td class="label" rowspan="2">1RM계산기</td>
       <td class="rm_calculator">
          <input type="int" placeholder="측정 시 사용 무게"  id="W" value="">
          <input type="int" placeholder="최대리프팅 횟수"  id="R"value="">
          <input id="rmButton" type="button" value="계산" onclick="RMcal()">
        </td>

        </tr>
        <tr>
          <td>
            <input type="int" id="RM" placeholder="1rm 계산값"></input>
          </td>
        </tr>

      </form>




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
  </body>
</html>
