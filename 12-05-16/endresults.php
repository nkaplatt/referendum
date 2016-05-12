<!DOCTYPE html>
<!-- Last Published: Sun May 01 2016 23:29:55 GMT+0000 (UTC) -->
<?php
session_start();
require_once("js/functions.php");
  $userID = '1001';
if(isset($_SESSION["login_user"])){
  $userID = $_SESSION["login_user"];
}
function get_results($User_ID, $Category){
  //Defaults to 1 because category is currently broken :D
  $Category = 1;
  //Open Database connection
  $myfile = fopen( "../lemons.txt", "r") or die("Unable to open file!");
  $myIP   = fopen( "../IP.txt", "r") or die("Unable to open file!");
  $dbpass = fread($myfile,filesize("../lemons.txt"));
  $dbhost = fread($myIP,filesize("../IP.txt"));
  fclose($myfile);
  fclose($myIP);
  $dbuser = "remoterootuser";
  $dbpass = trim($dbpass);
  $dbhost = trim($dbhost);

  $dbname = "test";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //Queries to get answers that user entered
  $query = 'SELECT Emoticon_Type FROM Card_tbl ';
  $query .= "WHERE MUser_ID = '{$User_ID}';";

  $result = mysqli_query($connection, $query);
  connectQuery();

  $array = array(
    0 => 0,   //anger
    1 => 0,   //shock
    2 => 0,   //indifferent
    3 => 0,   //happy
    4 => 0,   //delighted
  );

  while($value = mysqli_fetch_array($result))
  {
    $etype = $value['Emoticon_Type'];

    if($etype < 1 || $etype > 5)
      continue;

    $array[$etype - 1] += 1;
  }
  mysqli_free_result($result);
  mysqli_close($connection);
  return $array;
}

$results = get_results($userID, 1);

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
<html data-wf-site="56fd24aaaea6500c763220cf" data-wf-page="571f95682ab0dfe372551215">
<head>
  <meta charset="utf-8">
  <title>Results</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial information on the referendum so that yo
u can cast an informed vote.">
  <meta property="og:title" content="Results">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/los-template.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
        google: {
          families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Varela Round:400","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Montserrat:400,700","Raleway:100,200,300,regular,500,600,700,800,900"]
        }
      });
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="images/Favicon.png">
  <link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
  <script type="text/javascript">
    var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-76346760-1'], ['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
  </script>


  <script src="js/Chart.js"></script>
  <script src="js/Chart.min.js"></script>
  <script>
  var obj = <?php echo json_encode($results); ?>;

  function add(a, b) {
      return a + b;
  }
  var sum = obj.reduce(add, 0);

  function pieChart(){
    var pieData = [
          {
            value: Math.round((((obj[0] + obj[1]) /sum)*100)),
            color: "#FF3366",
            highlight: "#DD3366",
            showInLegend: true,
            label: "OUT"
          },
          {
            value: Math.round((((obj[3] + obj[4]) /sum)*100)),
            color: "#FF9933",
            highlight: "#DD9933",
            showInLegend: true,
            label: "IN"
          },
          {
          value: Math.round((((obj[2]) /sum)*100)),
          color: "#008899",
          highlight: "#009999",
          showInLegend: true,
          label: "Indifferent"
          }
        ];

          var ctx = document.getElementById("chart-area").getContext("2d");
          window.myPie = new Chart(ctx).Pie(pieData, {
            tooltipFontSize: 13,
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>%",
            percentageInnerCutout : 70
          });


  }
  </script>
</head>
<body class="body">
  <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" class="w-nav navbar">
    <div class="w-container">
      <a href="new-homepage.php" class="w-nav-brand logo-container">
        <h3 style="margin-top:10px" class="logo-text"><strong>leave</strong>or<strong>stay</strong>.co.ukALPHA</h3>
      </a>
      <nav role="navigation" class="w-nav-menu">
        <a href="immigration.php" class="w-nav-link nav-link">Immigration</a>
        <a href="sovereignty-and-the-law.php" class="w-nav-link nav-link">Sovereignty</a>
        <a href="trade.php" class="w-nav-link nav-link">Trade</a>
        <a href="jobs.php" class="w-nav-link nav-link">Jobs</a>
        <a href="defence.php" class="w-nav-link nav-link">Defence</a>
        <a href="signup.php" class="w-button hero-button">Sign up/login</a>
      </nav>
      <div class="w-nav-button menu">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="hero">

    <div class="w-container hero-container homepage _1">
      <h1 class="hero-title word">your results are in...</h1>
      <h1 class="hero-title title-3">Based entirely on what you've told us on this site, this is how you seem to currently feel about the EU. Click on each section to see the percentage. <p>Please note what you have used today is in alpha stage, meaning that the finished leaveorstay.co.uk site will have dramatic changes. This will be launched in a few weeks time.</p></h1>

          <div style="margin-bottom:25px; text-align:center" class="resultscard">
          <p>

            <?php if($data_submitted) : ?>
            <div id="canvas-holder">

           <p>Orange: IN  &nbsp;  Pink: OUT  &nbsp;  Blue: INDIFFERENT</p>


              <canvas id="chart-area" width="200" height="200"/>
            </div>
            <div id="js-legend" class="chart-legend"></div>
            <script> pieChart(); </script>
            <?php else : ?>
                Please do our quiz!
            <?php endif; ?>

          </p>
          </div>


    </div>
  </div>
  <div id="Intro" style="padding-top:100px" class="w-section intro">
    <h1 class="graph-header">Every voter matters.</h1>
    <h1 class="hero-title share">Let's make 'not sure' a thing of the past. Share the fact leaveorstay exists today:</h1>
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.leaveorstay.co.uk" data-text="I just used leaveorstay to find out about both sides to the EU referendum, check it out!">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.leaveorstay.co.uk&layout=button_count&mobile_iframe=true&width=86&height=20&appId" width="86" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

  </div>
  <div class="w-section about-you-section">
    <div class="w-container thanks-farewell">
      <h1 class="results-header">Thanks for trying out LeaveorStay</h1>
      <p class="results-p">We suggest that you come back once a week as post new content daily. Don't forget you'll need to create an account if you want to save your results and come back to them, otherwise we'll have to delete it in order to keep it secret and safe from 'the cookies' - you know those things that follow you across the web and show you annoying ads.</p>

      <a href="contact.php" class="w-button hero-button _2">Give us your feedback</a>
    </div>
  </div>
  <div id="contact" class="w-section footer">
    <div class="w-row about-us">
      <div class="w-col w-col-4 our-pages">
        <h4 class="about-us-heading">Our Pages</h4>
        <div data-collapse="none" data-animation="default" data-duration="400" data-contain="1" class="w-nav footer-nav">
          <div class="w-container">
            <nav role="navigation" class="w-nav-menu">
              <a href="new-homepage.php" class="w-nav-link footer-page">Home</a>
              <a href="about-us.php" class="w-nav-link footer-page">About Us</a>
              <a href="the-black-and-white.php" class="w-nav-link footer-page">The Black &amp; White</a>
            </nav>
            <div class="w-nav-button">
              <div class="w-icon-nav-menu"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 about-us-block">
        <h4 class="about-us-heading">About Us</h4>
        <p>Designed with love at Exeter University
          <br>
          <br>Innovation Centre
          <br>Rennes Drive
          <br>EX4 4RN</p>
      </div>
      <div class="w-col w-col-4 get-in-touch">
        <h4 class="about-us-heading">Get in touch</h4>
        <p>Want to say hi? &nbsp; hello@leaveorstay.co.uk</p>
        <div class="make-twitter-central">
          <div class="w-widget w-widget-twitter twitter">
            <iframe src="https://platform.twitter.com/widgets/follow_button.html#screen_name=leaveorstayHQ&amp;show_count=false&amp;size=m&amp;show_screen_name=true&amp;dnt=true" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 100%; height: 21px;"></iframe>
          </div>
        </div>
        <div class="w-widget w-widget-facebook facebook">
          <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2FleaveorstayHQ&amp;layout=box_count&amp;locale=en_US&amp;action=like&amp;show_faces=false&amp;share=false" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 55px; height: 65px;"></iframe>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
