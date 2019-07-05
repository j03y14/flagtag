<!--dropdown 버튼이 선택되면 dropdown content가 나오는 거-->
<style>
a{
  text-decoration:none;
  color:inherit;
}
#headerContainer{
  background-image: url('images/header.jpg');
  background-size: cover;
  color:white;
}
.navbar{
  font-size: 1.5em;
  font-weight:bold;
  color:white;
  padding: .5rem 1rem 6rem 1rem;
  text-shadow: black 0.2em 0.2em 0.2em;
}
.navbar-collapse{
  flex-basis:auto;

}

#mypageToggle, #routineToggle{
  margin-left: auto;

}
#logo{
  font-size: 1.8em;
  text-shadow: black 0.2em 0.2em 0.2em;
}
.sidebar-container{
  display: flex;
  width: 100%;

  align-items: stretch;
}
#sidebar{
  top:0;
  right:0;
  width: 200px;
  position: fixed;
  background-color: #0f0f0f;
  height:100%;
}
#sidebar a{

  font-size: 1.4em;
  margin-bottom: 10px

}
#sidebar.active {
    display:block;
}
.sidebar-header h3{
  margin-top: 25px;
  margin-right: 15px
}
#sidebar a, .sidebar-header h3{
  color:white;
  font-weight: 600;
  text-align: right;
}
#sidebar hr{
  background-color: white;
  width:90%;
}
#overlay {
    position: fixed;
    top:0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 10;
    display: none;
}
#mypageToggle, #sidebarCollapse, #routineToggle{
    z-index: 15;
}
.dropdown-menu{
    text-shadow:none;
}
#mypageDropdown, #routineDropdown{
  position:absolute;

}
@media screen and (max-width: 990px) {
  #collapsibleNavbar{
    float: right;
  }
  #sidebar {
    margin-left: -250px;
    display:none;
  }
  #sidebar.active {
    margin-left: 0;
    z-index: 20;
  }
  .dropdown-item{
    display:inline-block;
    width: 50%;
  }
  .dropdown-menu{
    min-width: 5rem;
    1text-align:inherit;
  }
}
@media screen and (min-width: 990px) {
  #sidebar {
    display:none;
  }
}

</style>
<script>
  $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#overlay').fadeIn();
    });
    $('#overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('#overlay').fadeOut();
    });
  });
</script>
<div class="container-fluid" id="headerContainer">

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="navbar-nav">
      <a class="navbar-brand" id="logo" href="?menu=main">Flagtag</a>
    </div>
    <!--mypage 및 로그 아웃을 토글하는 버튼이다-->
    <div class="navbar-nav dropdown" id="mypageToggle">
      <a class="nav-link dropdown-toggle"  href="#" data-toggle="dropdown"><span class="fa fa-user"></span></a>
      <div class="dropdown-menu" id="mypageDropdown">
        <a class="dropdown-item" href="?menu=mypage">mypage</a>
        <a class="dropdown-item" href="model/logout.php">logout</a>
      </div>
    </div>

    <div class="navbar-nav">
      <!--sidebar를 토글하는 버튼이다-->
      <button class="navbar-toggler" id="sidebarCollapse" type="button" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--화면이 클 때는 이것이 나타나고 화면이 작아지면 안 나타난다-->
      <div class="collapse navbar-collapse" id="routineToggle">
        <ul class="navbar-nav navbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">루틴</a>
            <div class="dropdown-menu" id="routineDropdown">
              <a class="dropdown-item" href="?menu=routine">나의 루틴</a>
              <a class="dropdown-item" href="?menu=routineMall">루틴 추천</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="?menu=calander">달력</a></li>
          <li class="nav-item"><a class="nav-link" href="?menu=TDEEcal">대사량계산기</a></li>
          <li class="nav-item"><a class="nav-link" href="?menu=about">소개</a></li>
        </ul>
      </div>
    </div>

  </nav>
</div>
<!--메뉴 나왔을 때 바깥 부분-->
<div id="overlay">

</div>


<!--화면이 작아지고 토글 버튼을 누르면 이것이 나타난다-->
<div class="container sidebar-container">
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>메뉴</h3>
    </div>
    <hr>
    <ul class="list-unstyled components">
      <li>
        <a class="nav-link" href="?menu=routine">나의 루틴</a>
      </li>
      <li>
        <a class="nav-link" href="?menu=routineMall">루틴 추천</a>
      </li>
      <li>
        <a class="nav-link" href="?menu=calander">달력</a>
      </li>
      <li>
        <a class="nav-link" href="?menu=TDEEcal">대사량계산기</a>
      </li>
      <li>
        <a class="nav-link" href="?menu=about">소개</a>
      </li>
    </ul>
  </nav>
</div>
