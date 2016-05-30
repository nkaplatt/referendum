<!DOCTYPE html>
<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2016 by nnnick (http://jsbin.com/gumul/2/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->
<meta name="robots" content="noindex">
<html>
<?php 
	$answerset = get_results($Cat_ID,$Connection, $Session_ID);
	$leave,$stay,$angry,$shocked,$indifferent,$happy,$delighted = get_values($answerset,$summ);
	}
<head>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="http://www.chartjs.org/assets/Chart.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
<style id="jsbin-css">
#canvas-holder{
        width:240px;
      }

.doughnut-legend li span {
  display: block;
  width: 14px;
  height: 14px;
  border-radius: 7px;
  float: left;
  margin-top: 4px;
  margin-right: 8px;
}

.doughnut-legend {
  list-style: none;
  margin: 0;
  padding: 0;
  font-size: 14px;
  margin-top : 20px;

}

.doughnut-legend li {
  margin-bottom : 4px;
}

.doughnut-legend li:first-letter {
  text-transform: capitalize;
}

.comm-how {
  display: inline-block;
  float : left;
  color : #979797;
  width : 25px;
  text-align: right;
  margin-right : 10px;
}




</style>
</head>
<body>
  
  <div class="centered comm-center">
  <div id="chart">
    <div id="canvas-holder">
        <canvas id="chart-area" width="500" height="500"></canvas>
    </div>
    <div id="my-doughnut-legend">
    </div> 
  </div>

</body>
</html>

  <script>
      var doughnutData = [
          {
            value: $Angry,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Angry"
          },
          {
            value: $Suprised,
            color: "#949FB1",
            highlight: "#A8B3C5",
            label: "Suprised"
          },
          {
            value: $Indifferent,
            color: "#4D5360",
            highlight: "#616774",
            label: "Indifferent"
          },

          {
            value: $Happy,
            color: "#5b90bf",
            highlight: "#659ac9",
            label: "Happy"
          },

           {
            value: $Delighted,
            color: "#96b5b4",
            highlight: "#a0bfbe",
            label: "Delighted"
          }




        ];



        window.onload = function(){
          var ctx = document.getElementById("chart-area").getContext("2d");
          window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
            responsive : true,
            animationEasing: "easeOutQuart",
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>%",
            segmentStrokeColor : "#f9f9f9",
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><div class=\"comm-how\"><%=segments[i].value%>%</div><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
          });

           var helpers = Chart.helpers;
           var legendHolder = document.getElementById('my-doughnut-legend')
      legendHolder.innerHTML = myDoughnut.generateLegend();
      // Include a html legend template after the module doughnut itself
      helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
          helpers.addEvent(legendNode, 'mouseover', function(){
              var activeSegment = myDoughnut.segments[index];
              activeSegment.save();
              activeSegment.fillColor = activeSegment.highlightColor;
              myDoughnut.showTooltip([activeSegment]);
              activeSegment.restore();
          });
      });
      helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
          myDoughnut.draw();
      });
      canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
          

          myDoughnut.generateLegend();
          document.getElementById('my-doughnut-legend').innerHTML = myDoughnut.generateLegend();
        };
		if $leave > $stay {
			echo "we believe you should vote leave";
		}
		else {
			echo "we believe you should vote Stay";
		}

    </script>
?>
