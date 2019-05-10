<HEAD>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/chooseRoutine.css">
</HEAD>

<body>
  <p>Routine Selection</p>
  <form action="./view/showRoutine.php"name="write_form_calculator" method="post">
     <table  style="padding:5px 0 5px 0; ">

       <tr>
         <td>
           <ul class="radioUL" id="sex">
             <li>
               <input type="radio" id="calculator_sex_male"name="calculator_sex" value="0">
               <label for="calculator_sex_male">남자</label>
             </li>
             <li>
               <input type="radio" id="calculator_sex_female"name="calculator_sex" value="1">
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
           <ul class="radioUL" name = "workoutDayPerWeek" id="workoutDayPerWeek">
             <li>
               <input type="radio" name = "workoutDayPerWeek" id="workoutDayPerWeek0~1" value="3">
               <label for="workoutDayPerWeek0~1">주3회 가능</label>
             </li>
             <li>
               <input type="radio" name = "workoutDayPerWeek" id="workoutDayPerWeek1~3" value="4">
               <label for="workoutDayPerWeek1~3">주4회 가능</label>
             </li>
             <li>
               <input type="radio" name = "workoutDayPerWeek" id="workoutDayPerWeek3~5" value="5">
               <label for="workoutDayPerWeek3~5">주5회 가능</label>
             </li>
           </ul>
         </td>
       </tr>

       <tr>
         <td>
           <ul class="radioUL" name="place" id="place">
             <li>
               <input type="radio" id="place_HOME" name="place" value="0">
               <label for="place_HOME">HOME</label>
             </li>
             <li>
               <input type="radio" id="place_GROUND" name="place" value="1">
               <label for="place_GROUND">GROUND</label>
             </li>
             <li>
               <input type="radio" id="place_GYM" name="place" value="2">
               <label for="place_GYM">GYM</label>
             </li>
           </ul>
         </td>
       </tr>
       <tr>
         <td>
           <ul class="radioUL" id="hour">
             <li>
               <input type="radio" id="hour_under" name="hour" value="0">
               <label for="hour_under">1시간 미만</label>
             </li>
             <li>
               <input type="radio" id="hour_over" name="hour" value="1">
               <label for="hour_over">1시간 이상</label>
             </li>
           </ul>
         </td>
       </tr>
       <tr>
         <td>
           <ul class="radioUL" id="career">
             <li>
               <input type="radio" id="career_under1y" name="career" value="1">
               <label for="career_under1y">1년 이하</label>
             </li>
             <li>
               <input type="radio" id="career_over1y" name="career" value="2">
               <label for="career_over1y">1년 이상</label>
             </li>
             <li>
               <input type="radio" id="career_over3y" name="career" value="3">
               <label for="career_over3y">3년 이상</label>
             </li>
             <li>
               <input type="radio" id="career_over5y" name="career" value="5">
               <label for="career_over5y">5년 이상</label>
             </li>
           </ul>
         </td>
       </tr>

       <tr>
         <td>
           <ul class="radioUL"name="purpose" id="purpose">
             <li>
               <input type="radio" id="purpose_aerobic" name="purpose" value="0">
               <label for="purpose_aerobic">유산소</label>
             </li>
             <li>
               <input type="radio" id="purpose_hypertrophy" name="purpose" value="1">
               <label for="purpose_hypertrophy">근비대</label>
             </li>
             <li>
               <input type="radio" id="purpose_strength" name="purpose" value="2">
               <label for="purpose_strength">스트렝스</label>
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
