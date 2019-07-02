<link rel="stylesheet" href="/css/routineTable.css">

<?php
echo "<h4>무게 X 세트수</h4>";
echo "<div class='routine-table-container'>";
echo "<table class ='routineTable table table-bordered'>"."<tr>"."<th class='routineType'></th>";
for($tableCol=0;$tableCol<$typeNum+1;$tableCol++){
  if($tableCol==0){
    for($w=1;$w<=$maxweek;$w++){
      for($d=1;$d<=$maxday;$d++){
        echo "<td>"."W".$w."D".$d."</td>";

      }
    }
  }
  else{
    $tableColumn = $tableCol-1;
    echo "<tr>"."<th class='routineType'>".$routineType[$tableColumn]."</th>";
    for($w=1;$w<=$maxweek;$w++){
      for($d=1;$d<=$maxday;$d++){
        $SendRoutineSL = "SELECT sets,lifts
                          FROM RoutineMain
                          WHERE routineName='{$routine_Name[$i]['name']}'and week=$w and day=$d and type='{$routineType[$tableColumn]}'";
        $routineSLSql = mysqli_query($flagtagdb,$SendRoutineSL);
        if($routineSLSql==false){
          echo "Error : ". mysqli_error($flagtagdb);
        }
        $routine_SL = mysqli_fetch_array($routineSLSql);

        if($routine_SL!=null){
          echo "<td>".$routine_SL['sets']."X".$routine_SL['lifts']."</td>";

        }
        else{
          echo "<td>"."</td>";

        }
      }
    }
    echo"</tr>";
  }
}
echo "</table>";
echo"</div>";
?>
