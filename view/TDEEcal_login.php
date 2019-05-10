<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body>
    <p>로그인 하시겠습니까?</p>
    <h3>로그인 후에 더 많은 서비스를 이용하실 수 있습니다.</h3>

    <form class="" action="/model/login.php" method="post" align="center">
      <table align = "center">
        <tr>
          <td>
            <label>아이디</label>
            <input id ="id"type="text" name="user_id">
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
            <br>
            <a href="/view/TDEEcal.php">아니오. 나중에 로그인 하겠습니다.</a>
          </td>
        </tr>
      </table>

    </form>
  </body>
</html>
