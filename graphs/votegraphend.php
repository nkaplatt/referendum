<?php
session_start();

require_once("../js/functions.php");
if(isset($_SESSION["login_user"])){
  $userID = $_SESSION["login_user"];
	
	$User_ID = '5f04ed4d279b60723c73e01d9332cacaab3bc245d10e09841e';
	
function get_results($User_ID){
  //Defaults to 1 because category is currently broken :D
  //Open Database connection
 // $myfile = fopen( "../lemons.txt", "r") or die("Unable to open file!");
 // $myIP   = fopen( "../IP.txt", "r") or die("Unable to open file!");
 // $dbpass = fread($myfile,filesize("../lemons.txt"));
 // $dbhost = fread($myIP,filesize("../IP.txt"));
  //fclose($myfile);
 // fclose($myIP);
  $dbuser = "root";
  $dbpass = 'nick';
  $dbhost = 'localhost';
  $dbname = "EU_db";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  //Queries to get answers that user entered
  $query = 'SELECT Choice_Type FROM Vote_tbl ';
  $query .= "WHERE MUser_ID = '{$User_ID}';";
  $result = mysqli_query($connection, $query);
  connectQuery();
   $array = array(
    0 => 0,   //anger
    1 => 0,   //shocked
    2 => 0,   //indifferent
    3 => 0,   //pleased
    4 => 0,   //very happy
  );
  while($value = mysqli_fetch_array($result))
  {
    $etype = $value['Choice_Type'];
    if($etype < 1 || $etype > 5) 
      continue;
    $array[$etype - 1] += 1;
  }
  mysqli_free_result($result);
  mysqli_close($connection);
  return $array;
}
$results = get_results($userID);
if(      $results[0]==0
      && $results[1]==0
      && $results[2]==0
      && $results[3]==0
      && $results[4]==0)
      {
        $data_submitted = false;
} else {
        $data_submitted = true;
}
?>


  <script src="../js/Chart.js"></script>
  <script>
  var obj = <?php echo json_encode($results); ?>;
  function sum(a, b) {
      return a + b;
  } 
  var sum = obj.reduce(sum, 0);
  function pieChart(){
	  var pieData = [
          {
            value: Math.round(((obj[0] /sum)*100)),
            color: "#FF3366",
            highlight: "#DD3366",
            showInLegend: true,
            label: "Vote Leave"
          },
          {
            value: Math.round(((obj[1] /sum)*100)),
            color: "#FF9933",
            highlight: "#DD9933",
            showInLegend: true,
            label: "Vote Stay"
          },
          {
          value: Math.round(((obj[2] /sum)*100)),
          color: "#008899",
          highlight: "#009999",
          showInLegend: true,
          label: "Don't Care"
          }
        ];
	  
  }
	  var ctx = document.getElementById("chart-area").getContext("2d");
          window.myPie = new Chart(ctx).Pie(pieData, {
            tooltipFontSize: 13,
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>%"
          });
	 	  
  </script>

            <?php if($data_submitted) : ?>
            <div id="canvas-holder">

              <canvas id="chart-area" width="200" height="200"/>
            </div>
            <script> pieChart(); </script>
            <?php else : ?>
               <h2 style="align:center; padding:6px; display:inline; color:white; background:#c06">To get results, use our 'think' sections.</h2>
            <?php endif; 
}?>