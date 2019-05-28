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
  function timerStart(){
      document.getElementById('timerStart').disabled = 'disabled';
      checkboxButton = document.getElementsByClassName('checkboxButton');
      timerButton = document.getElementsByClassName('timerButton');
      for(var i=0; i<checkboxButton.length;i++){
        checkboxButton[i].disabled = 'disable';
      }
      for(var i=0; i<timerButton.length;i++){
        timerButton[i].disabled = 'disable';
      }
      timer = setInterval(function(){
      minute = document.getElementById('minute').innerHTML;
      second = document.getElementById('second').innerHTML;
      if(minute == '0' && second =='0'){
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
  function resetTimer(){
    clearInterval(timer);
    document.getElementById('second').innerHTML = 0;
    document.getElementById('minute').innerHTML = 2;
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
  }
  function minuteDown(){
    minute = document.getElementById('minute').innerHTML;
    if(minute>0){
      document.getElementById('minute').innerHTML = parseInt(minute)-1;
    }else{
      document.getElementById('minute').innerHTML = 60;
    }
  }
  function secondUp(){
    second = document.getElementById('second').innerHTML;
    if(second<60){
      document.getElementById('second').innerHTML = parseInt(second)+1;
    }else{
      document.getElementById('second').innerHTML = 0;
    }
  }
  function secondDown(){
    second = document.getElementById('second').innerHTML;
    if(second>0){
      document.getElementById('second').innerHTML = parseInt(second)-1;
    }else{
      document.getElementById('second').innerHTML = 60;
    }
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
