<!--dropdown 버튼이 선택되면 dropdown content가 나오는 거-->
<header>
  <nav>
    <ul id="header">
      <li id="logo"><a href='.'>FLAGTAG</a></li>
      <div id="menu">
        <li>
          <a class=headerDiv href="?menu=TDEEcal">TDEEcalculator</a>
        </li>
          <li>
            <a class=headerDiv href="?menu=calander">CALANDER</a>
          </li>
          <li>
            <a class=headerDiv href="?menu=routine">ROUTINE</a>
          </li>
          <li>
            <a class=headerDiv href="?menu=diet">DIET</a>
          </li>
      </div>
    </ul>
  </nav>
</header>
<div id="menu2">
  <span>안녕하세요. <?php echo $_SESSION['user_name']?>님</span>
  <a href="model/logout.php">logout</a>
  <a href="?menu=modify">mypage</a>
</div>
