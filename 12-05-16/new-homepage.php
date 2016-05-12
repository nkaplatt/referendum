<!DOCTYPE html>
<!-- Last Published: Sun May 01 2016 23:29:54 GMT+0000 (UTC) -->
<?php
session_start();
if (!isset($_SESSION['login_user'])) {
  $user_check = 1001;
} else {
  $user_check = $_SESSION['login_user'];
}
?>
<html data-wf-site="56fd24aaaea6500c763220cf" data-wf-page="5718aae7bdfd1fd9190f19fd">
<head>
  <meta charset="utf-8">
  <title>New Hompage</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial information on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="New Hompage">
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
      <h1 class="hero-title word">Be more sure.</h1>
      <h1 class="hero-title title-3">Relax. Still not sure which way to vote? We've got you.<br>Leaveorstay brings both sides of the argument together in one place.<br>It's built for those who need a hand getting started or just want to triple check their thoughts.</h1>
      <a href="signup.php" class="w-button hero-button edit">&nbsp;let's get started&nbsp;</a>
      <a href="#Intro" class="w-button hero-button edit-2">learn more</a>
    </div>
  </div>
  <div id="Intro" class="w-section intro _1">
    <h1 class="intro-heading">Leaveorstay is a decision making website for <br><strong class="important-text">undecided voters.</strong></h1>
    <p class="intro-paragraph">&nbsp;We’re here to give you both sides of the argument; the good the bad and everything in-between so that you can finally say ‘I know which way I want to vote and why’. No agenda. No spin.
      <br>
      <br><strong class="home-important">Just 500 hours of evidenced research condensed and made available to you. Please note the site you're about to use is in alpha stage and is subject to dramatic changes and improvements before launch.</strong>
    </p>
    <h1 class="intro-heading"><strong class="funny-thing-text">The funny thing is, it actually works.</strong></h1>
  </div>
  <div class="w-section how-to-use-the-grid hp">
    <div class="w-row how-to-row hp">
      <div class="w-col w-col-4 read">
        <h3 class="read-heading">Say goodbye to endless link clicking.</h3>
        <img height="100" src="images/immigration icon.png">
        <p class="read-para-1">Browse the topics that matter to you and read perfectly summarised overviews and analysis of the arguments, fully evidenced and easy to read.</p>
      </div>
      <div class="w-col w-col-4 react">
        <h3 class="react-heading">React to what you read, both the good and bad.</h3>
        <img height="100" src="images/happy without word.png">
        <p class="read-para">Use the 5 emojis to react to how you feel about each card so we can paint a picture of what matters to you.</p>
      </div>
      <div class="w-col w-col-4 impact">
        <h3 class="impact-heading">See all options on the table in one place.</h3>
        <img height="100" src="images/Icon-check.png">
        <p class="read-para">We'll then use some clever computing to take what you've told us to show you where you currently stand with your thoughts on the EU.</p>
      </div>
    </div>
  </div>
  <div class="w-section about-you-section">
    <div class="started-block">
      <div class="w-container hero-container homepage">
        <h1 class="hero-title word">Ready to get started?</h1>
        <h1 class="hero-title title-3">If you want to know even more about us then <a class="click-here-link" href="about-us.php">click here.</a> <br>Got a question? Email hello@leaveorstay.co.uk<br><br>Besides that, are you ready to go?</h1>
        <a href="signup.php" class="w-button hero-button">I'm ready &nbsp;&gt;</a>
      </div>
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