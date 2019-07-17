<!--
-----------------------------------------------------
setTimeout(function, miliseconds)
특정 시간 이후 단 한번만 특정 함수 또는 코드를 실행시킬 때
2번째 인자의 시간이 경과하면 1번째 인자의 함수를 실행
1000ms = 1s
-----------------------------------------------------
setInterval(function, miliseconds)
특정 시간마다 특정함수 또는 코드를 실행시킬 때 사용합니다.
2번째 인자의 시간이 지날 때마다 1번째 인자의 함수를 실행
무한정 실행됨
-----------------------------------------------------
clearInterval(Timer Id)
timer id를 인자값으로 하여 setInerval을 종료시킴

-->
<style media="screen">
  .timerContainer{
    width:40%;
  }
  .timerButton, .timerControlButton{
    background-color: inherit; /* Blue background */
    border: none; /* Remove borders */
  }
  .time{
    font-size: 42px;
  }
  .minute{
    text-align: right;
  }
  .second{
    text-align: left;
  }
  .timerControlButton{
    font-size: 23px;
  }
  @media screen and (max-width: 680px) {
    .timerContainer{
      width:80%;
    }
  }
</style>
<script type="text/javascript">
var timer;
var checkboxButton;
var timerButton;
var userSetMin = 2;
var userSetSec = 0;
  function timerStart(){
      document.getElementById('timerStart').disabled = 'disabled';
      //각 세트가 끝나면 누르는 체크박스 버튼
      checkboxButton = document.getElementsByClassName('checkboxButton');
      //타이머 시작 버튼
      timerButton = document.getElementsByClassName('timerButton');
      //타이머가 실행되어 있는 동안 중복 실행을 막기 위해 버튼들을 disable 시킨다.
      for(var i=0; i<checkboxButton.length;i++){
        checkboxButton[i].disabled = 'disable';
      }
      for(var i=0; i<timerButton.length;i++){
        timerButton[i].disabled = 'disable';
      }
      //1000ms 마다 첫 번째 매개변수로 들어간 함수를 실행
      timer = setInterval(function(){
      minute = document.getElementById('minute').innerHTML;
      second = document.getElementById('second').innerHTML;
      console.log(second);
      //분과 초가 모두 0이면 resetTimer() 함수 호출
      if(parseInt(minute) == 0 && parseInt(second) ==0){
        console.log('resetTimer');
        resetTimer();
      }else{
        //분이 0이 아닐 때
        if(minute!=0){
          if(second==0){
            document.getElementById('second').innerHTML = 59;
            document.getElementById('minute').innerHTML = parseInt(minute)-1;
          }else{
            document.getElementById('second').innerHTML = parseInt(second)-1;
          }
        //분이 0이면
        }else{
          document.getElementById('second').innerHTML = parseInt(second)-1;
        }
      }
    }, 1000);
  }
  //사용자 쉬는시간 설정함수, 시간을 바꿀 때 마다 실행시켜서 저장함
  function userSet(){
    userSetSec = document.getElementById('second').innerHTML;
    userSetMin = document.getElementById('minute').innerHTML;
  }

  function resetTimer(){
    clearInterval(timer);
    document.getElementById('second').innerHTML = userSetSec;
    document.getElementById('minute').innerHTML = userSetMin;
    document.getElementById('timerStart').disabled = false;
    for(var i=0; i<checkboxButton.length;i++){
      checkboxButton[i].disabled = false;
    }
    for(var i=0; i<timerButton.length;i++){
      timerButton[i].disabled = false;
    }
  }

  function minuteUp(){
    minute = document.getElementById('minute').innerHTML;
    if(minute<60){
      document.getElementById('minute').innerHTML = parseInt(minute)+1;
    }else{
      document.getElementById('minute').innerHTML = 0;
    }
    userSet();
  }
  function minuteDown(){
    minute = document.getElementById('minute').innerHTML;
    if(minute>0){
      document.getElementById('minute').innerHTML = parseInt(minute)-1;
    }else{
      document.getElementById('minute').innerHTML = 60;
    }
    userSet();
  }
  function secondUp(){
    second = document.getElementById('second').innerHTML;
    if(second<60){
      document.getElementById('second').innerHTML = parseInt(second)+1;
    }else{
      document.getElementById('second').innerHTML = 0;
    }
    userSet();
  }
  function secondDown(){
    second = document.getElementById('second').innerHTML;
    if(second>0){
      document.getElementById('second').innerHTML = parseInt(second)-1;
    }else{
      document.getElementById('second').innerHTML = 60;
    }
    userSet();
  }
</script>
<div class="container timerContainer">
  <div class="row">
    <div class="col-12">
      <h3>세트간 휴식 타이머</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-5 minute up">
      <button type="button" class="timerButton" name="button" onclick="minuteUp()"><i class="fas fa-chevron-up"></i></button>
    </div>
    <div class="col-2">
    </div>
    <div class="col-5 second up">
      <button type="button" class="timerButton" name="button" onclick="secondUp()"><i class="fas fa-chevron-up"></i></button>
    </div>
  </div>
  <div class="row time">
    <div class="col-5 minute" id="minute">
      2
    </div>
    <div class="col-2">
      :
    </div>
    <div class="col-5 second" id="second">
      0
    </div>
  </div>
  <div class="row">
    <div class="col-5 minute down">
      <button type="button" class="timerButton" name="button" onclick="minuteDown()"><i class="fas fa-chevron-down"></i></button>
    </div>
    <div class="col-2">
    </div>
    <div class="col-5 second down">
      <button type="button" class="timerButton" name="button" onclick="secondDown()"><i class="fas fa-chevron-down"></i></button>
    </div>
  </div>
  <div class="row">
    <div class="col-6 minute">
      <button type="button btn" class="timerControlButton" id="timerStart" name="button" onclick="timerStart()">start</button>
    </div>
    <div class="col-6 second">
      <button type="button btn" class="timerControlButton" name="button" onclick="resetTimer()">reset</button>
    </div>
  </div>
</div>
