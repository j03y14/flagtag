<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body>
    <p>로그인</p>
    <form class="" action="/model/login.php" method="post" align="center">
      <table align = "center">
        <tr>
          <td>
            <label>아이디</label>
            <input type="text" name="user_id">
          </td>
        </tr>
        <tr>
          <td>
            <label>비밀번호</label>
            <input type="password" name="user_password">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" id="submit"name="TDEEcal_login" value="로그인">
          </td>
        </tr>
    </form>
  </body>
</html>
