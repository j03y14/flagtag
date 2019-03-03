<HEAD>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/TDEEcal.css">
</HEAD>

<body>
  <p>TDEE calculator</p>
  <form action="/model/TDEEcal.php"name="write_form_calculator" method="post">
     <table width="940" style="padding:5px 0 5px 0; ">
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
           <ul id="sex">
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
           <input type="radio" name ="calculator_workoutdayperweek" value="1.2">주 0~1회 운동
           <input type="radio" name ="calculator_workoutdayperweek" value="1.375">주 1~3회 운동
           <input type="radio" name ="calculator_workoutdayperweek" value="1.55">주 3~5회 훈련
           <input type="radio" name ="calculator_workoutdayperweek" value="1.725">주 5~7회 훈련
           <input type="radio" name ="calculator_workoutdayperweek" value="1.9">주 7회 높은강도 훈련


         </td>
       </tr>
       <tr>
         <td>
           <input class="intClass" type="int" placeholder ="목표체중(kg)" name="calculator_goalweight">
         </td>
       </tr>

       <tr>
         <td>
           <input type="radio" name ="calculator_goalperiod" value="30">한 달
           <input type="radio" name ="calculator_goalperiod" value="60">두 달
           <input type="radio" name ="calculator_goalperiod" value="90">세 달
           <input type="radio" name ="calculator_goalperiod" value="120">네 달

         </td>
       </tr>

       <tr>
         <td colspan="2" align="center">
           <input class="button" type="submit" value="확인">
           <input class="button" type="reset" value="취소">
         </td>
       </tr>
     </table>

  </form>
 </body>
</html>
