<!DOCTYPE html>
<!-- Last Published: Sun May 01 2016 23:29:55 GMT+0000 (UTC) -->
<?php
session_start();
if (!isset($_SESSION['login_user'])) {
  $user_check = 1001;
} else {
  $user_check = $_SESSION['login_user'];
}
?>
<html data-wf-site="56fd24aaaea6500c763220cf" data-wf-page="56fd24aaaea6500c763220d4">
<head>
  <meta charset="utf-8">
  <title>Contact</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial informati
on on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="leaveorstay.co.uk">
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
<body>
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
  <div class="w-section page-header contact">
    <div class="page-header-overlay contact">
      <div class="w-container page-header-container always-centered">
        <h2 data-ix="page-title" class="page-header-title">Thanks for visiting the ALPHA stage of leaveorstay</h2>
        <h2 data-ix="page-title-2" class="page-header-title subtitle">Please use the form below to give us your thoughts, feedback and comments.</h2>
      </div>
      <div class="w-container page-header-content-container">
        <div class="w-form contact-form">
          <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form">
            <input id="name" type="text" placeholder="Enter your name" name="name" data-name="Name" data-ix="fade-in-on-load" class="w-input field">
            <input id="email" type="email" placeholder="Enter your email address" name="email" data-name="Email" required="required" data-ix="fade-in-on-load-2" class="w-input field">
            <input id="Comments" type="text" placeholder="Enter your comments" name="Comments" data-name="Comments" data-ix="fade-in-on-load-3" class="w-input field">
            <input type="submit" value="Submit" data-wait="Please wait..." data-ix="fade-in-on-load-5" class="w-button button submit-button">
          </form>
          <div class="w-form-done success-bg">
            <p>Thank you! Your submission has been received!</p>
          </div>
          <div class="w-form-fail error-bg">
            <p>Oops! Something went wrong while submitting the form</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="about-us" class="w-section contact-us-section">
    <div class="w-container container centered">
      <div class="w-row footer-bottom-row">
        <div class="w-col w-col-4 intro-column">
          <img src="images/Icon-location.png" class="intro-icon">
          <h2 class="intro-column-title">Location</h2>
          <h2 class="intro-column-title subtitle">Visit us</h2>
          <p>We're based at the Innovation Centre, University of Exeter.</p>
        </div>
        <div class="w-col w-col-4 intro-column">
          <img src="images/Icon-contact.png" class="intro-icon">
          <h2 class="intro-column-title">want to spread the word</h2>
          <h2 class="intro-column-title subtitle">Get in touch</h2>
          <p>No question, big or small, will go unanswered. We'll try and get back to you within 24 hrs.</p>
        </div>
        <div class="w-col w-col-4 intro-column last">
          <img src="images/Icon-questions.png" class="intro-icon">
          <h2 class="intro-column-title">Questions</h2>
          <h2 class="intro-column-title subtitle">about our content?</h2>
          <p>Think we've missed something? Drop us an email using the form above and we'll have a chat.</p>
        </div>
      </div>
    </div>
  </div>
  <div data-widget-latlng="50.738146,-3.530624" data-widget-style="roadmap" data-widget-zoom="12" data-disable-scroll="1" data-disable-touch="1" class="w-widget w-widget-map contact-map"></div>
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
