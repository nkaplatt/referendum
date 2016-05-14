<?php
session_start();
require_once('anonymous.php');
require_once('js/functions.php');
?>

<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri May 13 2016 15:40:15 GMT+0000 (UTC) -->
<html data-wf-site="572762c72f3e6fea5d0339d6" data-wf-page="57286699d483652b197df473">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial information on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="Home">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/los-template-fca022ea7a9cb6b29d20ce5495.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
  WebFont.load({
    google: {
      families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Varela Round:400","Montserrat:400,700","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Raleway:100,200,300,regular,500,600,700,800,900"]
    }
  });
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="images/Favicon.png">
  <link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">

  <?php
  $userID = $_SESSION["login_user"];
  //Get all values from all the columns
  /*
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
  */
  $dbname = "test";
  $dbuser = "remoteonlineuser";
  $dbpass = "NickJames15markgareth";
  $dbhost = '173.194.245.76';
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  $econ_clicked = select_topic_for_user($connection, $userID, 'Econ');
  $Imo_clicked = select_topic_for_user($connection, $userID, 'Imo');
  $SovandLaw_clicked = select_topic_for_user($connection, $userID, 'SovandLaw');
  $Jobs_clicked = select_topic_for_user($connection, $userID, 'Jobs');
  $DefenceandSecurity_clicked = select_topic_for_user($connection, $userID, 'DefenceandSecurity');


  mysqli_close($connection);
  $userID = 'e508ab539c2942b26378095b6b1d020e';
  if($econ_clicked == 1){
    $url = 'trade.php';
  } else if ($Imo_clicked == 1){
    $url = 'immigration.php';
  }else if ($SovandLaw_clicked == 1){
    $url = 'sovereignty-and-law-making.php';
  }else if ($Jobs_clicked == 1){
    $url = 'jobs.php';
  }else if ($DefenceandSecurity_clicked == 1){
    $url = 'defence-and-security';
  } else {
    $url = "none";
  }
  ?>

  <script>
  function update_server_data(type){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "newfu4.php", true);
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };
    var colour = document.getElementsByClassName(type)[0].style.backgroundColor;
    if ((colour == '') || (colour == 'transparent')) {
      document.getElementsByClassName(type)[0].style.backgroundColor = "#7c1";
    } else {
      document.getElementsByClassName(type)[0].style.backgroundColor = "transparent";}
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("q=" + type);
    }

    function page_redirection(type){
      var test = <?php echo json_encode($userID); ?>;
      alert(test);
      var url = <?php echo json_encode($url); ?>;
      if(url = "none"){
        alert("Please select a topic!")
      } else{
        document.location.href = url;
      }
    }

    window.onload = function(){
      var options = ["icon-button", "icon-button-2", "icon-button-3", "icon-button-4", "icon-button-5", "icon-button-6"];
      for (var j=0; j<6; j++) {
        var option = options[j];
        var emotes_array = document.getElementsByClassName(option);
        if(emotes_array.length > 0){
          emotes_array[0].onclick = function(type){
            update_server_data(type);
          }.bind(undefined, options[j]);
        }
      }

      var get_started_button = document.getElementsByClassName('topic-continue')
      get_started_button[0].onclick = function(type){
        page_redirection();
      }.bind(undefined, 1);
    };
    </script>
  </head>
  <body class="body">
    <div class="w-section privacy-policy">
      <div class="w-container"><a href="#" data-ix="close-privacy-policy" class="w-button close-policy">X</a>
        <div class="policy">We use cookies to give you the best online experience. By using our website you agree to our use of cookies in accordance with our cookie policy.&nbsp;<a class="policy-link" href="privacy-policy.html">Learn more here.</a>
        </div>
      </div>
    </div>
    <div class="hero homepage">
      <div data-collapse="none" data-animation="default" data-duration="400" data-contain="1" class="w-nav navbar">
        <div class="w-container"><a href="index.php" class="w-nav-brand logo-container"><h1 class="logo-text"><strong>leave</strong>or<strong>stay</strong>.co.uk</h1></a>
          <nav role="navigation" class="w-nav-menu"><a href="signup.php" class="w-button hero-button">Sign up/login</a>
          </nav>
          <div class="w-nav-button menu">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
      <div class="w-container hero-container homepage _1">
        <h1 class="hero-title word">Be more sure.</h1>
        <h1 class="hero-title title-3">Relax. Still not sure which way to vote? We've got you.<br>Compare both sides of the debate based on issues that matter to you and make an informed decision about which way to vote at the EU Referendum.</h1>

        <!--<div class="decision-text">To see how leaveorstay effects your decision we'd like to ask you which way you currently think you will vote.</div><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-stay homepage">Vote Stay</a><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-neither homepage">Don't know</a><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-leave homepage">Vote Leave&nbsp;</a>-->

      </div>
    </div>
    <div class="w-section topic-select-section">
      <div class="divider pink">
        <div class="next-button divider-text">
          <h1 class="h1">Get your answer,</h1>
          <div class="t1">the results may surprise you!</div>
        </div><img width="80" height="30" src="images/pink arrow.png" class="triangle">
      </div>
      <div class="w-container topic-container">
        <h1 class="next-button small">Let's get started...</h1>
        <h1 class="topic-selector-text-2">Which topic(s) do you want to explore?</h1>
        <div class="w-row topic-row">


          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button)" class="w-button icon-button"></a>
            <div class="icon-name">Law</div>
          </div>

          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button-2)" class="w-button icon-button-2"></a>
            <div class="icon-name">Jobs</div>
          </div>

          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button-3)" class="w-button icon-button-3"></a>
            <div class="icon-name">Defence</div>
          </div>
        </div>

        <div class="w-row topic-row">
          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button-4)" class="w-button icon-button-4"></a>
            <div class="icon-name immigration">Immigration</div>
          </div>

          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button-5)" class="w-button icon-button-5"></a>
            <div class="icon-name">Trade</div>
          </div>

          <div class="w-col w-col-4 topic-colum">
            <a href="#" onclick="update_server_data(icon-button-6)" class="w-button icon-button-6"></a>
            <div class="icon-name">All</div>
          </div>

        </div><a class="w-button topic-continue">Get started</a>
      </div>
      <div class="what-div">
        <h1 class="intro-heading learn-more">What is leaveorstay? <strong class="scroll-text">Scroll to find out.</strong></h1>
      </div>
    </div>
    <div id="Intro" class="w-section intro _1">
      <h1 class="next-button _1">What is this?</h1>
      <h1 class="intro-heading _1">Leaveorstay is a decision making website for <br><strong class="important-text what">undecided voters.</strong></h1>
      <div class="w-container">
        <div class="w-row what-section">
          <div class="w-col w-col-6 image"><img src="images/immi-01.png" class="image">
          </div>
          <div class="w-col w-col-6">
            <h1 class="homepage-subheader">Open and impartial.</h1>
            <p class="homepage-para">We’re here to give you both sides of the argument; the good the bad and everything in-between so that you can finally say ‘I know which way I want to vote and why’. Our brand would be damaged if we didn't keep things impartial so that's why you'll find us sitting on the fence representing both sides of the debate.</p>
            <h1 class="homepage-subheader">We keep it simple.</h1>
            <p class="homepage-para">We know that viewing conflicting and confusing information from across the web isn't something you want to spend ages on, so let us do the hard work for you. We bring together all the information you need to make an informed vote in one place and provide a really efficient and measurable way of reaching certainty in your decision.</p>
            <h1 class="homepage-subheader">The right answer.</h1>
            <p class="homepage-para">We know that choice is important to you, that’s why you’re comparing. But everyone has different needs and so we’ll help you to 'be more sure' in your decision, whether that’s by letting you pick your own topics, reacting to what you think and feel and creating custom recommendations by getting a 'Digest' delivered to your inbox. We have you covered.</p>
          </div>
        </div>
      </div>
      <p class="intro-paragraph _1">Summary: &nbsp;We're only here to give you <strong class="important-what">honest, impartial advice and answers</strong> in this referendum.</p>
    </div>
    <div id="Intro" class="w-section intro _2">
      <h1 class="next-button _2">How?</h1>
      <h1 class="intro-heading how">Casting an informed vote is now&nbsp;<strong class="important-text">SO much easier.</strong></h1>
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6">
            <div class="point">
              <h1 class="number">1.</h1>
              <div class="encompass-point">
                <h1 class="point-text">We scan the web.</h1>
                <p class="point-paragraph">Our clever bits of technology trawl the web and find relevant articles, pieces of research and arguments from both sides and perfectly&nbsp;summarises the content into bitesize points.</p>
              </div>
            </div>
            <div class="point">
              <h1 class="number">2.</h1>
              <div class="encompass-point">
                <h1 class="point-text">Add context.</h1>
                <p class="point-paragraph">Our independent editor reviews the summaries and adds referenced, clear data to add context to the debate.</p>
              </div>
            </div>
            <div class="point">
              <h1 class="number">3.</h1>
              <div class="encompass-point">
                <h1 class="point-text">And feelings.</h1>
                <p class="point-paragraph">We then split the content into "thinking" and "feeling" points so that you can be sure to cover both your head and your heart.</p>
              </div>
            </div>
            <div class="point">
              <h1 class="number">4.</h1>
              <div class="encompass-point">
                <h1 class="point-text">Then give an answer.</h1>
                <p class="point-paragraph">Finally we use even more clever computing to calculate where you stand and why, and present you with an overview of your thoughts and feelings.</p>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 image"><img src="images/White Down Arrow.svg" class="image">
          </div>
        </div>
      </div>
      <p class="intro-paragraph _2">Summary : <strong class="important-text small blue">500 hrs worth</strong> of research that'll take about <strong class="important-text small blue">15 minutes</strong> to complete.
        <br>Above all, you'll feel happier with your choice either way.</p>
      </div>
      <div id="Intro" class="w-section intro _3">
        <h1 class="next-button">Why?</h1>
        <h1 class="intro-heading">We <strong class="important-text dark">don't want mis-information</strong> to rule the day.</h1>
        <p class="intro-paragraph">Only <strong class="important-text small">12%</strong> of voters feel <strong class="important-text small">"informed"</strong> or <strong class="important-text small">"well informed"</strong> about the upcoming referendum... let that sink in. We're about to make a decision that will affect the rest of our lives and those of our children and people we care about based on nothing more than confusing and conflicting information peddled by both sides.
          <br>
          <br>That's the reason we are doing this. We don't care which way you vote, we just want you to go to the polling station armed with credible information that will make you confident in the choice you are about to make, regardless of what that choice may be.</p>
          <p class="intro-paragraph _3">Summary : <span style="font-weight: 800;"><u>We exist solely to make sure that you are happy and more sure about the decision you are about to make.</u></span>
          </p>
        </div>
        <div class="started-block">
          <div class="w-container hero-container homepage">
            <h1 class="hero-title word">Ready to get started?</h1>
            <h1 class="hero-title title-3">If you want to know even more about us then <a class="click-here-link" href="about-us.html">click here.</a> <br>Got a question? Email hello@leaveorstay.co.uk<br><br>Besides that, are you ready to go?</h1><a data-ix="drop-down-topics" class="w-button hero-button">Select topics&nbsp; &gt;</a>
          </div>
        </div>
        <div data-ix="display-none-on-load" class="w-section drop-down-topic-selecter">
          <div class="w-container topic-container">
            <h1 class="next-button small">Let's get started...</h1>
            <h1 class="topic-selector-text-2">Which topic(s) do you want to explore?</h1>
            <div class="w-row topic-row">

              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button)" class="w-button icon-button"></a>
                <div class="icon-name">Law</div>
              </div>

              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button-2)" class="w-button icon-button-2"></a>
                <div class="icon-name">Jobs</div>
              </div>

              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button-3)" class="w-button icon-button-3"></a>
                <div class="icon-name">Defence</div>
              </div>
            </div>

            <div class="w-row topic-row">
              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button-4)" class="w-button icon-button-4"></a>
                <div class="icon-name immigration">Immigration</div>
              </div>

              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button-5)" class="w-button icon-button-5"></a>
                <div class="icon-name">Trade</div>
              </div>

              <div class="w-col w-col-4 topic-colum">
                <a href="#" onclick="update_server_data(icon-button-6)" class="w-button icon-button-6"></a>
                <div class="icon-name">All</div>
              </div>

            </div><a class="w-button topic-continue">Get started</a>
          </div>
        </div>
        <div class="w-section share-and-save-section _2">
          <div class="w-container share-and-save">
            <div class="w-row">
              <div class="w-col w-col-6 save home">
                <h1 class="save-and-share-header">Remind me about this</h1>
                <p class="save-and-share-body">We'll send you an email a couple of weeks before the referendum to remind you about the site AND on June 23rd to remind you to vote. No spam. Nothing else.</p>
                <div class="w-form">
                  <form id="email-form" name="email-form" data-name="Email Form">
                    <label for="email-2" class="field-label">Email Address:</label>
                    <div class="w-row">
                      <div class="w-col w-col-6 reminder-emaik">
                        <input id="email-2" type="email" placeholder="example@name.com" name="email-2" data-name="Email 2" required="required" class="w-input email-field">
                      </div>
                      <div class="w-col w-col-6 subscribe-button">
                        <input type="submit" value="Submit" data-wait="Please wait..." class="w-button submit-email">
                      </div>
                    </div>
                  </form>
                  <div class="w-form-done">
                    <p>Thank you! Your submission has been received!</p>
                  </div>
                  <div class="w-form-fail">
                    <p>Oops! Something went wrong while submitting the form</p>
                  </div>
                </div>
              </div>
              <div class="w-col w-col-6 share home">
                <h1 class="save-and-share-header">Spread the word</h1>
                <p class="save-and-share-body">Help your family, friends and colleagues make an informed choice about which way to vote in the European Referendum 2016.</p><a href="#" class="w-button share">FB share</a><a href="#" class="w-button share">Twitter Share</a>
              </div>
            </div>
          </div>
        </div>
        <div id="contact" class="w-section footer">
          <div class="w-row about-us">
            <div class="w-col w-col-4 our-pages">
              <h4 class="about-us-heading">Our Pages</h4>
              <div data-collapse="none" data-animation="default" data-duration="400" data-contain="1" class="w-nav footer-nav">
                <div class="w-container">
                  <nav role="navigation" class="w-nav-menu"><a href="index.php" class="w-nav-link footer-page">Home</a><a href="the-black-and-white.php" class="w-nav-link footer-page">The Black &amp; White</a>
                  </nav>
                  <div class="w-nav-button">
                    <div class="w-icon-nav-menu"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 about-us-block">
              <h4 class="about-us-heading">About Us</h4>
              <p>Designed and built &nbsp;at the University of Exeter
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
