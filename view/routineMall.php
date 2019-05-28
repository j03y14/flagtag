<p>Routine Mall</p>

<div class="container-fluid">

</div>

<HEAD>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/chooseRoutine.css">
</HEAD>

<body>
  <?php
    include_once "./model/dbConnect.php";
    if (!function_exists('mysqli_fetch_all')) {
        function mysqli_fetch_all($result, $mode = 0) {
            $all = FALSE;
            if ($result) {
                $all = array();
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    $all[$i] = array();
                    foreach($row as $key => $value) {
                        if (!is_numeric($key)) {
                            $all[$i][$key] = $value;
                        }
                    }
                    $i++;
                }
            }
            return $all;
        }
    }
  $SendRoutineCode = "SELECT routineCode
                        FROM RoutineInfo";
  $routineSqlCode = mysqli_query($flagtagdb,$SendRoutineCode);
  $routine_Code = mysqli_fetch_all($routineSqlCode,MYSQLI_ASSOC);
  $code_array = array_column($routine_Code,'routineCode');
  var_dump($code_array);?>

<script type="text/javascript">
var bDisplay = true;
var code_arr = <?php echo json_encode($code_array); ?>;
var i = 0;
/*for(i=0;i<<?php count($code_array)?>;i++){
  code_arr.push(<?php $code_array[$i] ?>);
}*/
function disp(x,id){
  /*var pc = document.getElementsByClassName('present_code');
  make_present_code(){
    for(i=0;i<pc.length;i++){
      if(document.getElementById(id).checked){
    r+=pc[i].value;
    }
    else{}
    }
  return r;
}*/
  var con = document.getElementsByClassName('col');

  /*function numberOf(p){//해당 자리수 뽑아내는 함수
    return Math.floor(p/x)%2;}*/
  if(document.getElementById(id).checked){
    i+=x;
    var j;
    for(j=0;j<con.length;j++){
      /*var p1 = numberOf(i);//자리수에 따르는 코드의 수 0혹은1
      var p2 = numberOf(code_arr[j]);//루틴 코드의 해당 자리수 정보
      console.log("p1="+p1+"<br>");
      console.log("p2="+p2+"<br>");*/
        if((i&code_arr[j]) ==i){
          console.log("ifif")
          console.log(code_arr);
          console.log(i);
          console.log(i&code_arr[j]);
          con[j].style.display = 'block';
        }else{
          console.log("ifelse")
          console.log(code_arr);
          console.log(i);
          console.log(i&code_arr[j]);
          con[j].style.display = 'none';
        }
    }}
  else{
    i-=x;
    var j;
    for(j=0;j<con.length;j++){
      /*var p1 = numberOf(i);//자리수에 따르는 코드의 수 0혹은1
      var p2 = numberOf(code_arr[j]);//루틴 코드의 해당 자리수 정보
      console.log("p1="+p1+"<br>");
      console.log("p2="+p2+"<br>");*/
        if((i&code_arr[j]) ==i){
          console.log("elseif")
          console.log(code_arr);
          console.log(i);
          console.log(i&code_arr[j]);
          con[j].style.display = 'block';
        }else{
          console.log("elseselse")
          console.log(code_arr);
          console.log(i);
          console.log(i&code_arr[j]);
          con[j].style.display = 'none';
        }
    }
  }
}

</script>

     <table  style="padding:5px 0 5px 0; ">

       <tr><td>성별 : </td>
         <td>
           <ul class="radioUL" id="sex">
             <li>
               <input type="checkbox" id="calculator_sex_male" name="present_code"  value=16 onclick ="disp(16,'calculator_sex_male')">
               <label class = 'container' for="calculator_sex_male">남자</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="calculator_sex_female" name="present_code" value=8 onclick ="disp(8,'calculator_sex_female')">
               <label class = 'container'for="calculator_sex_female">여자</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>

       <tr><td>나이 : </td>
         <td>
           <ul class="radioUL" id="age">
             <li>
               <input type="checkbox" id="calculator_age_under35" name="present_code" value=1 onclick ="disp(1,'calculator_age_under35')">
               <label class = 'container'for="calculator_age_under35">35세 미만</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="calculator_age_under55" name="present_code" value=2 onclick ="disp(2,'calculator_age_under55')">
               <label class = 'container'for="calculator_age_under55">55세 미만</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="calculator_age_over55" name="present_code" value=4 onclick ="disp(4,'calculator_age_over55')">
               <label class = 'container'for="calculator_age_over55">55세 이상</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>

       <tr><td>주당 운동 횟 수 : </td>
         <td>
           <ul class="radioUL" name = "workoutDayPerWeek" id="workoutDayPerWeek">
             <li>
               <input type="checkbox" name = "present_code" id="workoutDayPerWeek0~1" value=2048 onclick ="disp(2048,'workoutDayPerWeek0~1')">
               <label class = 'container'for="workoutDayPerWeek0~1">주3회 가능</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" name = "present_code" id="workoutDayPerWeek1~3" value=4096 onclick ="disp(4096,'workoutDayPerWeek1~3')">
               <label class = 'container'for="workoutDayPerWeek1~3">주4회 가능</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" name = "present_code" id="workoutDayPerWeek3~5" value=8192 onclick ="disp(8192,'workoutDayPerWeek3~5')">
               <label class = 'container'for="workoutDayPerWeek3~5">주5회 가능</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>

       <tr><td>운동 장소 : </td>
         <td>
           <ul class="radioUL" name="place" id="place">
             <li>
               <input type="checkbox" id="place_HOME" name="present_code" value=16384 onclick ="disp(16384,'place_HOME')">
               <label class = 'container' for="place_HOME">HOME</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="place_GROUND" name="present_code" value=32768 onclick ="disp(32768,'place_GROUND')">
               <label class = 'container'for="place_GROUND">GROUND</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id='place_GYM' name="present_code" value=65536 onclick ="disp(65536,'place_GYM')">
               <label class = 'container'for="place_GYM">GYM</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>
       <tr><td>운동 시간 : </td>
         <td>
           <ul class="radioUL" id="hour">
             <li>
               <input type="checkbox" id="hour_under" name="present_code" value=512 onclick ="disp(512,'hour_under')">
               <label class = 'container'for="hour_under">1시간 미만</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="hour_over" name="present_code" value=1024 onclick ="disp(1024,'hour_over')">
               <label class = 'container'for="hour_over">1시간 이상</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>
       <tr><td>운동 경력 : </td>
         <td>
           <ul class="radioUL" id="career">
             <li>
               <input type="checkbox" id="career_under1y" name="present_code" value=32 onclick ="disp(32,'career_under1y')">
               <label class = 'container'for="career_under1y">1년 이하</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="career_over1y" name="present_code" value=64 onclick ="disp(64,'career_over1y')">
               <label class = 'container'for="career_over1y">1년 이상</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="career_over3y" name="present_code" value=128 onclick ="disp(128,'career_over3y')">
               <label class = 'container'for="career_over3y">3년 이상</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="career_over5y" name="present_code" value=256 onclick ="disp(256,'career_over5y')">
               <label class = 'container'for="career_over5y">5년 이상</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>

       <tr><td>목표 운동 종류 : </td>
         <td>
           <ul class="radioUL"name="purpose" id="purpose">
             <li>
               <input type="checkbox" id="purpose_aerobic" name="present_code" value=131072 onclick ="disp(524288,'purpose_aerobic')">
               <label class = 'container'for="purpose_aerobic">유산소</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="purpose_hypertrophy" name="present_code" value=262144 onclick ="disp(262144,'purpose_hypertrophy')">
               <label class = 'container' for="purpose_hypertrophy">근비대</label><span class="checkmark"></span>
             </li>
             <li>
               <input type="checkbox" id="purpose_strength" name="present_code" value=524288 onclick ="disp(131072,'purpose_strength')">
               <label class = 'container'for="purpose_strength">스트렝스</label><span class="checkmark"></span>
             </li>
           </ul>
         </td>
       </tr>

     </table>
     <?php
     //루틴의 정보 가져오는 부분
     $SendRoutineID = "SELECT routineID
                           FROM RoutineInfo";
     $routineSqlID = mysqli_query($flagtagdb,$SendRoutineID);
     $routine_ID = mysqli_fetch_all($routineSqlID,MYSQLI_ASSOC);

     $SendRoutineName = "SELECT name
                           FROM RoutineInfo";
     $routineSqlName = mysqli_query($flagtagdb,$SendRoutineName);
     $routine_Name = mysqli_fetch_all($routineSqlName,MYSQLI_ASSOC);


     echo "<div class='row'>";

     for ($i=0;$i<count($routine_ID);$i++){
       echo"<div class='col'>"."<a href='./view.modal.php'>".$routine_Name[$i]['name']."</a>"."</div>";
       }
     echo"</div>";
     ?>
 </body>
</html>
