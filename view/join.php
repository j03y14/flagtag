<!DOCTYPE HTML>
<!--추가해야할 것
  1. 아이디 중복 검사
  2. 핸드폰 본인 인증
  3. 비밀번호 두 번 적어서 서로 일치하는지 검사
  4. 생년월일 추가



-->
<HEAD>
  <link rel="stylesheet" href="/css/join.css">

  <script type="text/javascript">
    function checkID(){
      var value = document.getElementById('user_id').value;
      var url = "/model/check.php?user_id="+value;
      document.getElementById('idCheckFrame').src = url;

    }
    function checkPassword(value){
      var user_password = document.getElementById('user_password').value;
      document.getElementById('user_password_check_indicator').style.opacity="1";
      if(user_password != value){
        document.getElementById('user_password_check').value="";
        document.getElementById('user_password_check_indicator').style.height="50px";
        document.getElementById('user_password_check_indicator').value="비밀번호와 비밀번호 확인이 일치하지 않습니다.";
        document.getElementById('user_password_check_indicator').style.color="red";
      }else{
        document.getElementById('user_password_check_indicator').value="비밀번호와 비밀번호 확인이 일치합니다.";
        document.getElementById('user_password_check_indicator').style.height="50px";
        document.getElementById('user_password_check_indicator').style.color="blue";
      }
    }
  </script>
</HEAD>

<body>
  <p>회원가입 페이지</p>

  <iframe width="0" height="0" id='idCheckFrame'></iframe>

  <form action="/model/join.php"name="write_form_member" method="post">
     <table width="100%" style="padding:5px 0 5px 0; ">
       <tr>
         <div>
           <td id="idBlock">
             <input type="text" id="user_id" placeholder="아이디" name="user_id" required="true">
             <button type="button" id="user_id_check_button" onclick="checkID()">중복체크</button>
           </td>
         </div>
       </tr>
       <tr>
         <td><input type="text" id="user_id_check_indicator" value="아이디가 중복됩니다." name="user_id_check_indicator" required="true" disabled></td>
       </tr>

       <tr>
         <td><input type="password" id="user_password" placeholder="비밀번호" name="user_password"></td>
       </tr>
       <tr>
         <td><input type="password" id="user_password_check" placeholder="비밀번호 확인" name="user_password_check" onchange="checkPassword(this.value)" required="true"></td>
       </tr>
       <tr>
         <td><input type="text" id="user_password_check_indicator" value="비밀번호와 비밀번호 확인이 일치하지 않습니다." name="user_password_check_indicator" required="true" disabled></td>
       </tr>
       <tr>
         <td>
           <input type="text" id="user_name" placeholder="이름" name="user_name">
         </td>
       </tr>

       <tr>
         <td>
           <input type='text' placeholder ="이메일" name="user_email">
         </td>
       </tr>

       <tr>
          <td><input type="text" placeholder ="휴대전화" name="user_phonenumber">
          </td>
       </tr>

       <tr>
         <td>
            <input type="int" placeholder ="키" name="user_height">
         </td>
       </tr>

       <tr>
         <td>
           <input type="int" placeholder ="몸무게" name="user_weight">
         </td>
       </tr>



       <tr>
         <td colspan="2" align="center">
           <input class="button" type="submit" value="회원가입">
           <input class="button" type="reset" value="취소">
         </td>
       </tr>
     </table>

  </form>
 </body>
</html>
