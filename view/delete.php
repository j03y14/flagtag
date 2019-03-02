
<HEAD><meta charset="utf-8">
  <TITLE>delete</TITLE>

  <style>
    tr{
      text-align: center;

    }
    input{
      width: 70%;
      height: 50px;
      display: inline-block;
      margin-bottom: 10px;
    }
    .button{
      width:90px;
    }
    p{
      text-align: center;
      font-weight: 1000;
      font-size: 50px;
    }
    #user_password_check_indicator{
      color:red;
      height: 0;
      padding:0;
      margin:0;
      border-style: none;
      opacity: 0;
    }
  </style>

  <script type="text/javascript">
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
  <p>회원탈퇴</p>
                 회원가입을 위해서 아래의 정보가 필요합니다.
  <form action="/model/delete.php"name="delete_form_member" method="post">
     <table width="940" style="padding:5px 0 5px 0; ">
       <tr>
         <td>
           <input type="text" id="user_id" placeholder="아이디를 입력하시오" name="user_id">
         </td>
       </tr>

       <tr>
         <td><input type="password" id="user_password" placeholder="비밀번호를 입력하시오" name="user_password"></td>
       </tr>
       <tr>
         <td><input type="password" id="user_password_check" placeholder="비밀번호 확인" name="user_password_check" onchange="checkPassword(this.value)" required="true"></td>
       </tr>
       <tr>
         <td><input type="text" id="user_password_check_indicator" value="비밀번호와 비밀번호 확인이 일치하지 않습니다." name="user_password_check_indicator" required="true" disabled></td>
       </tr>

       <tr>
         <td colspan="2" align="center">
           <input class="button" type="submit" value="회원탈퇴">
           <input class="button" type="reset" value="취소">
         </td>
       </tr>
     </table>

  </form>
 </body>
</html>
