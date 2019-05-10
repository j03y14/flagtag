<?php

class OneDayRoutine{
  //각 운동 종류별로 세트들을 저장하는 2차원 배열
  // ['squat'] = [스쿼트 1세트],[스쿼트 2세트] ...
  // ['deadlift'] = [스쿼트 1세트],[스쿼트 2세트] ...
  public $setsOftheType;//new IndividualSet();
  public $isBreak;//운동을 쉬는 날인가?
  function __construct(){
    $this->setsOftheType = array();
    $this->isBreak = false;//기본적으로는 운동을 하는날로 초기화 되어 있음
    //var_dump($this->$setsOftheType);
  }



  function getOneRoutine($routineArray){
/*
    echo '<pre>';
    var_dump($routineArray);
    echo '</pre>';
*/
    if($routineArray[1]=='break'){
      $this->isBreak = true;
      return;
    }

    $setNum=1; // 종류별 세트수
    $tempType=NULL; //임시 운동 종류 변수
    $tempTypeNum=-1;
    $flag = false;
    //루틴 세트 수 만큼
    for($i=0;$i<(count($routineArray)/2-1)/3; $i++){




      //운동 종류, 무게, 횟수
      for($j=0;$j<3;$j++){
        if(empty($routineArray[3*$i+$j+1])){
          $flag = true;
          continue;
        }else{
          $flag = false;
        }
        if($j==0){
          if($tempType!=NULL){
              array_push($this->setsOftheType[$tempTypeNum],new IndividualSet);
              //$this->setsOftheType[$tempTypeNum][$i] = new stdClass;
          }
            //운동 종류가 달라지면
          if($routineArray[3*$i+$j+1]!=$tempType){
            if($tempTypeNum!=-1){
              array_pop($this->setsOftheType[$tempTypeNum]);
            }
            //echo '달라진 운동:'.$tempType."<br>";
            //2차원 배열안에 배열을 만든다.
            array_push($this->setsOftheType,array());
            //$tempType의 운동 종류를 바꿔준다
            $tempType = $routineArray[3*$i+$j+1];
            //현재까지 운동 종류의 수
            $tempTypeNum++;
            $setNum=0;

            array_push($this->setsOftheType[$tempTypeNum],new IndividualSet);
          }

            $this->setsOftheType[$tempTypeNum][$setNum]->type = $routineArray[3*$i+$j+1];

        }else if($j==1){

            $this->setsOftheType[$tempTypeNum][$setNum]->weight = $routineArray[3*$i+$j+1];


        }else if($j==2){

            $this->setsOftheType[$tempTypeNum][$setNum]->rep = $routineArray[3*$i+$j+1];


        }

      }

      if($flag==true){
        break;
      }

      $this->setsOftheType[$tempTypeNum][$setNum]->setNum = $setNum+1;
      $setNum++;
    }


  }

}
class Routine{
   public $routine_startday;//루틴 시작 날짜
   public $todayIsNthDay;//오늘이 몇 번째 날인지
   public $routineName;
   public $howLongisRoutine;
  //n 번째 날의 루틴을 가지고 있는 배열
  public $NthDayRoutine;//new OneDayRoutine();
  function __construct(){
    $this->NthDayRoutine = array();
  }
  //하루 루틴 객체를 NthDayRoutine 배열에 넣는 함수

  function createOneDayRoutine(){
    array_push($this->NthDayRoutine,new OneDayRoutine);
  }

  //루틴 시작 날짜를 받아오는 함수
  function getRoutineStartDay($routine_startday){
    $this->routine_startday = $routine_startday;
  }
  //오늘이 몇 번째 날인지 계산하는 함수
  function calculateTodayIsNthDay(){
    $today = date_create(date("Y-n-j"));
    $user_routine_startday = date_create($this->routine_startday);

    $this->todayIsNthDay = date_diff($today,$user_routine_startday)->days+1;
  }
  function setRoutineName($routineName){
    $this->routineName = $routineName;
  }

  function setHowLongisRoutine(){

    if($this->routineName==""){
      echo 'routineName이 정해지지 않았습니다.<br>';
    }else if($this->routineName=='JimWendler'){
      $this->howLongisRoutine = 28;
    }else if($this->routineName=='MadCow'){
      $this->howLongisRoutine = 84;
    }else if($this->routineName=='StartingStrength'){
      $this->howLongisRoutine = 84;
    }
  }


}

class IndividualSet{
  public $type;//운동 종류
  public $weight; //무게
  public $rep;//반복 횟수
  public $setNum;//그 운동의 몇번째 set인지
  function __construct(){
    $this->type=0;
    $this->weight=0;
    $this->rep=0;
    $this->setNum=0;
    //var_dump($this->$setsOftheType);
  }
}

 ?>
