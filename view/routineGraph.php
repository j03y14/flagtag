
<style media="screen">
  .routineGraph{
    margin:auto;
    height: 350px;
    width:95%;
  }

  @media only screen and (min-width: 992px){
    height:500px;
    width: 100%;
  }

</style>
<?php
if($routine_Name[$i]['name']=='Recon_ron_pullup_program'){
  echo "<h4>횟수 변화 그래프</h4>";
}else{
  echo "<h4>무게 변화 그래프</h4>";

}
echo"<p>

  <div class='routineGraph' id='chart_div_{$routine_Name[$i]['name']}'></div>
  <br>
  <br>
</p>



<script>

google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLine{$routine_Name[$i]['name']});

function drawLine{$routine_Name[$i]['name']}() {
      var data{$routine_Name[$i]['name']} =   new google.visualization.DataTable();";
      echo "data{$routine_Name[$i]['name']}.addColumn('number','day');";

      for($tn=0;$tn<$typeNum;$tn++){
        echo "data{$routine_Name[$i]['name']}.addColumn({type:'number',id:'{$routineType[$tn]}',label:'{$routineType[$tn]}'});";
      }

      echo "data{$routine_Name[$i]['name']}.addRows([";
      for($totalDayIndex = 1; $totalDayIndex <= $maxweek*$maxday; $totalDayIndex++){
        //maxday와 maxweek를 이용해서 만든 total week를 이용해서 day를 구한다.
        $day = $totalDayIndex%$maxday;
        //나머지가 0이면 maxday번째 날이므로 $day = 4로 만듬
        if($day==0){
          $day =$maxday;
        }
        //나누고 int형으로 바꾸고 +1 해준다
        $week = intval(($totalDayIndex-1)/$maxday)+1;

        $sql = "SELECT maxWeight,type FROM RoutineMain WHERE routineName='{$routine_Name[$i]['name']}'and week=$week and day=$day";
        $getMaxWeightResult = mysqli_query($flagtagdb,$sql);
        if($getMaxWeightResult===false){
          echo "maxWeight를 가져오는 과정에서 오류 : ".mysqli_error($flagtagdb);
        }else{
          $maxWeightArr = mysqli_fetch_all($getMaxWeightResult);
        }

        echo "[$totalDayIndex,";

        //day의 typenum 수에 따라
        $token = false;
        for($tn=0;$tn<$typeNum;$tn++){

          foreach($maxWeightArr as $mwi=>$value){


            if(in_array("{$routineType[$tn]}",$maxWeightArr[$mwi])){
              echo "{$maxWeightArr[$mwi]['maxWeight']},";
              $token = true;
            }
          }
          if($token==false&&$tn!=$typeNum-1){
            echo "null,";
          }else if($token==false){
            echo "null";
          }
          $token = false;
        }
        echo "]";
        if($totalDayIndex!=$maxweek*$maxday){
          echo ",";
        }
      }

echo"]);

      var options{$routine_Name[$i]['name']} = {
        //hAxis는 가로
        hAxis: {
          title: 'day'
        },
        //vAxis는 세로
        vAxis: {
          title: 'weight'
        },
        chartArea:{
          ";
          if($_GET['menu']=='routine'){
            echo "width:'95%',";
          }else if($_GET['menu']=='routineMall'){
            echo "width:'95%',";
          }
          echo"
          height:'80%'

        },
        legend:{
          position:'bottom',
          textStyle: {
            color: 'black',
            fontSize: 10
          }


        },
        ";

        echo"

        pointSize:5,
        interpolateNulls:true,
        colors: ['#a52714', '#f4aa42','#f9f44d','#59f747','#5341f2','#cb40f1','#ff99ec']
      };

      var container = document.getElementById('chart_div_{$routine_Name[$i]['name']}');
      container.style.display = null;
      var chart{$routine_Name[$i]['name']} = new google.visualization.LineChart(container);
      chart{$routine_Name[$i]['name']}.draw(data{$routine_Name[$i]['name']}, options{$routine_Name[$i]['name']});
    }
    $(window).resize(function(){
      drawLine{$routine_Name[$i]['name']}();

    });
    $(window).on('load',function() {
      drawLine{$routine_Name[$i]['name']}();
    });
    document.getElementById('chart_div_{$routine_Name[$i]['name']}').onClick = function(){
      drawLine{$routine_Name[$i]['name']}();

    };
  </script>
"
 ?>
