

<div class="container-fluid">

</div>

<HEAD>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/routineMall.css">
  <link rel="stylesheet" href="/css/modal.css">
</HEAD>

<body>
  <?php
    include_once "./model/dbConnect.php";

  $SendRoutineCode = "SELECT routineCode
                        FROM RoutineInfo";
  $routineSqlCode = mysqli_query($flagtagdb,$SendRoutineCode);
  $routine_Code = mysqli_fetch_all($routineSqlCode,MYSQLI_ASSOC);
  $code_array = array_column($routine_Code,'routineCode');
?>

  <script type="text/javascript">

    // Get the <span> element that closes the modal

    var code_arr = <?php echo json_encode($code_array); ?>;
    var i = 0;
    //x가 체크박스 각 항목에 해당하는 숫자, id는 체크박스의 id
    function disp(x,id){
      console.log(id+'호출');
      var nowChecked = document.getElementById(id);
      console.log('nowchecked: '+ nowChecked.checked);
      var con = document.getElementsByClassName('routineMall-item');
      //선택된 radio button의 분류, name을 불러온다.
      var name = nowChecked.name;
      console.log('name: '+ name);
      //name을 이용해서 name_radio_previous dom에 접근
      var previous = document.getElementById(name+"_radio_previous");
      console.log('previous.value_name: '+ previous.getAttribute('value_name'));
      var selectedCondition = document.getElementById('selected_'+id);
      if(previous.value==nowChecked.value){
        nowChecked.checked=false;

      }
      if(nowChecked.checked){
        selectedCondition.style.display='block';
        if(previous.getAttribute('value_name')!='0'){
          console.log('seltected_'+previous.getAttribute('value_name'));
          document.getElementById('selected_'+previous.getAttribute('value_name')).style.display='none';
        }


        i+=x;
        i-=previous.value;
        var j;
        for(j=0;j<con.length;j++){

            if((i&code_arr[j]) ==i){

              con[j].style.display = 'block';
            }else{

              con[j].style.display = 'none';
            }
        }
      }else{
        selectedCondition.style.display='none';
        i-=x;
        var j;
        for(j=0;j<con.length;j++){

            if((i&code_arr[j]) ==i){

              con[j].style.display = 'block';
            }else{

              con[j].style.display = 'none';
            }
        }
      }
      if(previous.value==nowChecked.value){
        previous.value=0;
        previous.setAttribute('value_name',"0");
      }else{
        previous.value = nowChecked.value;
        previous.setAttribute('value_name',nowChecked.id);

      }

      console.log("i: "+i);
    }

    function displayCheckbox(id){
      var checkbox_container = document.getElementsByClassName('checkbox_container');
      for(k=0; k<checkbox_container.length;k++){
        checkbox_container[k].style.display='none';
      }
      var checkbox_id = id +"_checkbox";

      document.getElementById(checkbox_id).style.display = 'block';


    }
  </script>
  <h3 class="title">Routine Mall</h3>
  <div class="container-fluid select-condition">
    <div class="button-group">
      <div class="conditions row">
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('sex')">
            성별
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('age')">
            나이
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('workoutDayPerWeek')">
            주당 운동 횟수
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('place')">
            운동 장소
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('time')">
            운동 시간
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('career')">
            운동 경력
          </button>
        </div>
        <div class="col-6 col-lg-4 col-xl-2 each-condition row">
          <button class=" condition-button col-12" type="button" onclick="displayCheckbox('purpose')">
            목표 운동 종류
          </button>
        </div>

      </div>


      <div class="checkbox_container" id="sex_checkbox" style="display:none;">
        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="calculator_sex_male" name="sex"  value=16 onclick ="disp(16,'calculator_sex_male')">
            <label class="form-check-label"  for="calculator_sex_male">남자</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="calculator_sex_female" name="sex" value=8 onclick ="disp(8,'calculator_sex_female')">
            <label class="form-check-label" for="calculator_sex_female">여자</label>
          </li>
          <input type="hidden" id="sex_radio_previous" value_name="0" name="sex_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="age_checkbox" style="display:none;">
        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="calculator_age_under35" name="age" value=1 onclick ="disp(1,'calculator_age_under35')">
            <label class="form-check-label" for="calculator_age_under35">35세 미만</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="calculator_age_under55" name="age" value=2 onclick ="disp(2,'calculator_age_under55')">
            <label class="form-check-label" for="calculator_age_under55">55세 미만</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="calculator_age_over55" name="age" value=4 onclick ="disp(4,'calculator_age_over55')">
            <label class="form-check-label" for="calculator_age_over55">55세 이상</label>
          </li>
          <input type="hidden" id="age_radio_previous" value_name="0" name="age_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="workoutDayPerWeek_checkbox" style="display:none;">
        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" name = "workoutDayPerWeek" id="workoutDayPerWeek0~1" value=2048 onclick ="disp(2048,'workoutDayPerWeek0~1')">
            <label class="form-check-label" for="workoutDayPerWeek0~1">주3회 가능</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" name = "workoutDayPerWeek" id="workoutDayPerWeek1~3" value=4096 onclick ="disp(4096,'workoutDayPerWeek1~3')">
            <label class="form-check-label" for="workoutDayPerWeek1~3">주4회 가능</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" name = "workoutDayPerWeek" id="workoutDayPerWeek3~5" value=8192 onclick ="disp(8192,'workoutDayPerWeek3~5')">
            <label class="form-check-label" for="workoutDayPerWeek3~5">주5회 가능</label>
          </li>
          <input type="hidden" id="workoutDayPerWeek_radio_previous" value_name="0" name="workoutDayPerWeek_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="place_checkbox" style="display:none;">

        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="place_HOME" name="place" value=16384 onclick ="disp(16384,'place_HOME')">
            <label class="form-check-label"  for="place_HOME">HOME</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="place_GROUND" name="place" value=32768 onclick ="disp(32768,'place_GROUND')">
            <label class="form-check-label" for="place_GROUND">GROUND</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id='place_GYM' name="place" value=65536 onclick ="disp(65536,'place_GYM')">
            <label class="form-check-label" for="place_GYM">GYM</label>
          </li>
          <input type="hidden" id="place_radio_previous" value_name="0" name="place_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="time_checkbox" style="display:none;">

        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="hour_under" name="hour" value=512 onclick ="disp(512,'hour_under')">
            <label class="form-check-label" for="hour_under">1시간 미만</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="hour_over" name="hour" value=1024 onclick ="disp(1024,'hour_over')">
            <label class="form-check-label" for="hour_over">1시간 이상</label>
          </li>
          <input type="hidden" id="hour_radio_previous" value_name="0" name="hour_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="career_checkbox" style="display:none;">

        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="career_under1y" name="career" value=32 onclick ="disp(32,'career_under1y')">
            <label class="form-check-label" for="career_under1y">1년 이하</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="career_over1y" name="career" value=64 onclick ="disp(64,'career_over1y')">
            <label class="form-check-label" for="career_over1y">1년 이상</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="career_over3y" name="career" value=128 onclick ="disp(128,'career_over3y')">
            <label class="form-check-label" for="career_over3y">3년이상</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="career_over5y" name="career" value=256 onclick ="disp(256,'career_over5y')">
            <label class="form-check-label" for="career_over5y">5년 이상</label>
          </li>
          <input type="hidden" id="career_radio_previous" value_name="0" name="career_radio_previous"/>
        </ul>
      </div>
      <div class="checkbox_container" id="purpose_checkbox" style="display:none;">

        <ul class="row">
          <li class="form-check">
            <input type="radio" class="form-check-input" id="purpose_aerobic" name="purpose" value=131072 onclick ="disp(524288,'purpose_aerobic')">
            <label class="form-check-label" for="purpose_aerobic">유산소</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="purpose_hypertrophy" name="purpose" value=262144 onclick ="disp(262144,'purpose_hypertrophy')">
            <label class="form-check-label"  for="purpose_hypertrophy">근비대</label>
          </li>
          <li class="form-check">
            <input type="radio" class="form-check-input" id="purpose_strength" name="purpose" value=524288 onclick ="disp(131072,'purpose_strength')">
            <label class="form-check-label" for="purpose_strength">스트렝스</label>
          </li>
          <input type="hidden" id="purpose_radio_previous" value_name="0" name="purpose_radio_previous"/>
        </ul>
      </div>
    </div>

    <div class="selected-condition">
      <label class="form-check-label" id="selected_calculator_sex_male" for="calculator_sex_male" style="display:none;">남자<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_calculator_sex_female" for="calculator_sex_female" style="display:none;">여자<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_calculator_age_under35" for="calculator_age_under35" style="display:none;">35세 미만<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_calculator_age_under55" for="calculator_age_under55" style="display:none;">55세 미만<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_calculator_age_over55" for="calculator_age_over55" style="display:none;">55세 이상<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_workoutDayPerWeek0~1" for="workoutDayPerWeek0~1" style="display:none;">주3회 가능<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_workoutDayPerWeek1~3" for="workoutDayPerWeek1~3" style="display:none;">주4회 가능<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_workoutDayPerWeek3~5" for="workoutDayPerWeek3~5" style="display:none;">주5회 가능<i class="far fa-times-circle"></i></label>
      <label class="form-check-label"  id="selected_place_HOME" for="place_HOME" style="display:none;">HOME<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_place_GROUND" for="place_GROUND" style="display:none;">GROUND<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_place_GYM" for="place_GYM" style="display:none;">GYM<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_hour_over" for="hour_over" style="display:none;">1시간 이상<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_hour_under" for="hour_under" style="display:none;">1시간 미만<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_career_under1y" for="career_under1y" style="display:none;">1년 이하<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_career_over1y" for="career_over1y" style="display:none;">1년 이상<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_career_over3y" for="career_over3y" style="display:none;">3년이상<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_career_over5y" for="career_over5y" style="display:none;">5년 이상<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_purpose_aerobic" for="purpose_aerobic" style="display:none;">유산소<i class="far fa-times-circle"></i></label>
      <label class="form-check-label"  id="selected_purpose_hypertrophy" for="purpose_hypertrophy" style="display:none;">근비대<i class="far fa-times-circle"></i></label>
      <label class="form-check-label" id="selected_purpose_strength" for="purpose_strength" style="display:none;">스트렝스<i class="far fa-times-circle"></i></label>
    </div>
  </div>
  <hr>

     <?php include "view/routineModal.php" ?>
</body>
</html>
