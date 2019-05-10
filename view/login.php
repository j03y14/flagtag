<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">

  </head>
  <body>
    <div class="container">
      <h2>로그인</h2>
      <hr>
      <form action="/model/login.php" class="was-validated" method="post">
        <div class="form-group">
          <label for="user_id">아이디:</label>
          <input type="text" class="form-control" id="user_id" placeholder="아이디를 입력하세요" name="user_id" required>

          <div class="invalid-feedback">아이디를 입력해주세요.</div>

        </div>
        <div class="form-group">
          <label for="pwd">비밀번호:</label>
          <input type="password" class="form-control" id="user_password" placeholder="Enter password" name="user_password" required>

          <div class="invalid-feedback">비밀번호를 입력해주세요.</div>
        </div>


        <button type="submit" class="btn btn-primary" value="로그인">Submit</button>
      </form>
    </div>

  </body>
</html>
