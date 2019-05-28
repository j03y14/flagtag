<HEAD>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/TDEEcal.css">
</HEAD>

<body>
  <p>TDEE calculator</p>
  <form action="/model/TDEEcal.php"name="write_form_calculator" method="post">
     <table style="padding:5px 0 5px 0; ">
       <tr>
         <td>
            <input class="intClass" type="int" placeholder ="키" name="calculator_height">
         </td>
       </tr>

       <tr>
         <td>
           <input class="intClass" type="int" placeholder ="몸무게" name="calculator_weight">
         </td>
       </tr>

       <tr>
         <td>
           <ul class="radioUL" id="sex">
             <li>
               <input type="radio" id="calculator_sex_male"name="calculator_sex" value="male">
               <label for="calculator_sex_male">남자</label>
             </li>
             <li>
               <input type="radio" id="calculator_sex_female"name="calculator_sex" value="female">
               <label for="calculator_sex_female">여자</label>
             </li>
           </ul>
         </td>
       </tr>

       <tr>
         <td>
           <input class="intClass" type="int" placeholder ="나이(만)" name="calculator_age">
         </td>
       </tr>

       <tr>
         <td>
           <ul class="radioUL" id="workoutdayPerWeek">
             <li>
               <input type="radio" id="workoutdayPerWeek0~1"name="calculator_workoutdayperweek" value="1.15">
               <label for="workoutdayPerWeek0~1">주0~2회 운동</label>
             </li>
             <li>
               <input type="radio" id="workoutdayPerWeek1~3"name="calculator_workoutdayperweek" value="1.325">
               <label for="workoutdayPerWeek1~3">주3~4회 운동</label>
             </li>
             <li>
               <input type="radio" id="workoutdayPerWeek3~5"name="calculator_workoutdayperweek" value="1.525">
               <label for="workoutdayPerWeek3~5"><span class="wordNonBreak">주 5회 운동</span></label>
             </li>
             <li>
               <input type="radio" id="workoutdayPerWeek5~7"name="calculator_workoutdayperweek" value="1.7">
               <label for="workoutdayPerWeek5~7"><span class="wordNonBreak">주 7회 운동</span></label>
             </li>
             <li>
               <input type="radio" id="workoutdayPerWeek7"name="calculator_workoutdayperweek" value="1.875">
               <label for="workoutdayPerWeek7"><span class="wordNonBreak">주 7회 힘든 운동</span></label>
             </li>
           </ul>
         </td>
       </tr>
       <tr>
         <td>
           <input class="intClass" type="int" placeholder ="목표체중(kg)" name="calculator_goalweight">
         </td>
       </tr>

       <tr>
         <td>
           <ul class="radioUL" id="calculator_goalperiod">
             <li>
               <input type="radio" id="calculator_goalperiod_one_month"name="calculator_goalperiod" value="30">
               <label for="calculator_goalperiod_one_month">한 달만에</label>
             </li>
             <li>
               <input type="radio" id="calculator_goalperiod_two_month"name="calculator_goalperiod" value="60">
               <label for="calculator_goalperiod_two_month">두 달만에</label>
             </li>
             <li>
               <input type="radio" id="calculator_goalperiod_three_month"name="calculator_goalperiod" value="90">
               <label for="calculator_goalperiod_three_month">세 달만에</label>
             </li>
             <li>
               <input type="radio" id="calculator_goalperiod_four_month"name="calculator_goalperiod" value="30">
               <label for="calculator_goalperiod_four_month">네 달만에</label>
             </li>
           </ul>
         </td>
       </tr>

       <tr>
         <td colspan="2" align="center">
           <br>
           <input class="button" type="submit" value="확인">
           <input class="button" type="reset" value="취소">
         </td>
       </tr>
     </table>

  </form>
 </body>
</html>
