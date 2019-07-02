<link rel="stylesheet" href="css/routineModal.css">

<html>


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


include_once "./model/dbConnect.php";
include_once "./model/roundoff.php";
include_once "./model/constructRoutine.php";








?>


<?php
echo "<div class='container'>";
echo "<div class='row routineMall-container'>";
for ($i=0;$i<count($routine_ID);$i++){
  //maxweek와 maxday가져오기
  $SendRoutineInfo = "SELECT maxday,maxweek,routineCode
                        FROM RoutineInfo
                        WHERE name='{$routine_Name[$i]['name']}'";
  $routineInfoResult = mysqli_query($flagtagdb,$SendRoutineInfo);
  $Routine_information = mysqli_fetch_array($routineInfoResult);

  $maxday = $Routine_information['maxday'];
  $maxweek= $Routine_information['maxweek'];
  $routineCode = $Routine_information['routineCode'];
  //type 가져오기
  $sql = "SELECT type FROM RoutineMain WHERE routineName='{$routine_Name[$i]['name']}'";
  $routineTypesResult = mysqli_query($flagtagdb,$sql);
  if($routineTypesResult===false){
    echo '<br>'.mysqli_error($flagtagdb);
  }

  $routineType =  mysqli_fetch_all($routineTypesResult);

  $routineType1Arr = array();
  for($rtn=0;$rtn<count($routineType);$rtn++){
    array_push($routineType1Arr,$routineType[$rtn]['type']);
  }
  $routineType = array_unique($routineType1Arr);
  $routineType = array_values($routineType);

  $typeNum = count($routineType);



  //모달을 띄우는 버튼 부분
  echo "<div class='col-12 col-md-6 col-lg-4  routineMall-item' id=" . $routine_Name[$i]['name'] . " onclick='displayModal(\"".$routine_Name[$i]['name']."\")'>";
    echo  "<h3 class='routine-title'>".$routine_Name[$i]['name']."</h3>";
    echo "<hr>";

  echo "</div>";
  //모달 부분
  echo "
   <div id='{$routine_Name[$i]['name']}_modal' style='display:none;' class='modal' role = 'document'>

    <!-- Modal content -->
    <div class='modal-content'>

      <div class='modal-header'>
         <h1 class ='modal-title' id = 'modal-title'>{$routine_Name[$i]['name']}</h1>
         <button type='button' class='close' onclick='clse()'>&times;</button>
      </div>

      <div class = 'modal-body'>";

      include "view/routineTable.php";
  echo "<hr>";
      include "view/routineGraph.php";
  echo"<form action='/model/send_routine.php' method='post'>
        <input name='choosed_routine' value = '{$routine_Name[$i]['name']}' style='display:none;' >
        <input type='submit' name='확인' value='루틴시작'></input>
      </form>
      </div>";


echo "</div>

  </div>";
}
echo "</div>";
echo "</div>";
?>

<script>
function clse(){
  for(var indx = 0; indx<modal.length;indx++){
    modal[indx].style.display = "none";
  }
}
var choose = document.getElementById('choose');
// Get the modal


btn = <?php echo json_encode($routine_Name)?>;

function displayModal(button_id){
  console.log("button_id :" +button_id);
  var modal_id = button_id+'_modal';
  console.log("modal_id : " + modal_id);
  document.getElementById(modal_id).style.display='block';
  window["drawLine"+button_id]();
}



var modal = document.getElementsByClassName('modal');




// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  for(var indx = 0; indx<modal.length;indx++){
    if (event.target == modal[indx]) {
      modal[indx].style.display = "none";
    }

  }

}

  // Get the <span> element that closes the modal
  </script>

</html>
