<?php
session_start();
require_once('anonymous.php');
require_once('js/functions.php');
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri May 13 2016 15:40:16 GMT+0000 (UTC) -->
<html data-wf-site="572762c72f3e6fea5d0339d6" data-wf-page="573525dd3eadd2ff25f1773c">
<head>
  <meta charset="utf-8">
  <title>Defence and Security</title>
  <meta name="description" content="See where you stand on defence and the EU referendum. Compare both sides of the argument so that you can be sure that you’ve cast an informed vote.">
  <meta property="og:title" content="Defence and Security">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/los-template-fca022ea7a9cb6b29d20ce5495.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
	  <script type="text/javascript" src="js/testButtons.js"></script>

  <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Varela Round:400","Montserrat:400,700","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Raleway:100,200,300,regular,500,600,700,800,900"]
      }
    });
  </script>
  <?php
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
  $dbuser = "remoteonlineuser";
  $dbpass = "NickJames15markgareth";
  $dbhost = "173.194.245.76";
  $dbname = "test";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  //Test success
  connectQuery();
  $category = 5;
  //Queries to get Emoticon_Number
  $query = 'SELECT Emoticon_Number FROM Card_tbl ';
  $query .= "WHERE MUser_ID = '{$User_ID}' AND ";
  $query .= "Category_ID = {$category};";
  $result1 = mysqli_query($connection, $query); //gets emoticon numbers
  //Queries to get Emoticon_Type
  $query = 'SELECT Emoticon_Type FROM Card_tbl ';
  $query .= "WHERE MUser_ID = '{$User_ID}' AND ";
  $query .= "Category_ID = {$category};";
  $result2 = mysqli_query($connection, $query);    //gets emoticon selected
  $emotes_type = array();
  while($value = mysqli_fetch_array($result2))
   {
     $etype = $value['Emoticon_Type'];
     if($etype < 1 || $etype > 5)
      continue;
      switch($etype-1){
        case 0:
          $emoticon = "anger-";
          break;
        case 1:
          $emoticon = "shock-";
          break;
        case 2:
          $emoticon = "indifferent-";
          break;
        case 3:
          $emoticon = "happy-";
          break;
        case 4:
          $emoticon =  "delighted-";
          break;
      }
      array_push($emotes_type, $emoticon);
   }
   //This while loop gets all the types of emoticons submitted
   $emotes_nums = array();
   while($value = mysqli_fetch_array($result1))
   {
      $enum = $value['Emoticon_Number'];
      array_push($emotes_nums, $enum);
   }
  //Returns all the emoticons as strings, e.g. happy-1
  $all_emotes = array();
  for($i=0; $i<count($emotes_nums); $i++){
    $a = trim($emotes_type[$i]);
    $a .= trim($emotes_nums[$i]);
    array_push($all_emotes, $a);
  }
  //we have to arrays, emoticon_type and emoticon_nums
  mysqli_free_result($result1);
  mysqli_free_result($result2);
  mysqli_close($connection);
  ?>

  <script type="text/javascript">
    function update_server_data(type, num, category){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "js/emotesDB.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("q=" + type + "&p=" + num + "&k=" + category);
    }
    function update_leave_data(type, num, category){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "js/opinionDB.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("q=" + type + "&p=" + num + "&k=" + category);
    }
    window.onload=function(){
    //Works out which category the file is
    var category = 1;
    var emoticons = ["anger", "shock", "indifferent", "happy", "delighted"];
      num = 100;
      for(var i=0; i<num; i++)
      {
        for(var j=0; j<5; j++)
         {
         var string = emoticons[j] + "-" + i;
         if(i == 0){
            string = emoticons[j];
         }
         var emotes_array = document.getElementsByClassName(string);
         if(emotes_array.length > 0){
            emotes_array[0].onclick = function(type, num){
            update_server_data(type, num, category);
         }.bind(undefined, emoticons[j], i);
       }
     }
   }
    var options = ["leave", "stay", "neither"];
    num = 10;
    for(var k=0; k<num; k++)
      {
      for(var m=0; m<3; m++)
        {
        var string = "think-" + options[m] +"-"+ k;
        if(k==0)
          {
          string = "think-" + options[m];
        }
        var options_array = document.getElementsByClassName(string);
        if(options_array.length > 0)
          {
          options_array[0].onclick = function(type, num){
            update_leave_data(type, num, category);
          }.bind(undefined, options[m], k)
        }
      }
    }
    var length = <?php echo json_encode(count($all_emotes)); ?>;
    for(var z=0; z<length; z++){
      var my_var = <?php echo json_encode($all_emotes); ?>;
      var el_array = document.getElementsByClassName(my_var[z]);
        if(el_array.length > 0) {
          el_array[0].click();
        }
      }
  };
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="images/logo-favicon.png">
  <link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
</head>
<body class="body topics">
  <div class="w-section hero">
    <div data-collapse="none" data-animation="default" data-duration="400" data-contain="1" class="w-nav navbar">
      <div class="w-container"><a href="index.php" class="w-nav-brand logo-container"><h1 class="logo-text"><strong>leave</strong>or<strong>stay</strong>.co.uk</h1></a>
        <nav role="navigation" class="w-nav-menu"><a href="signup.php" class="w-button hero-button">Sign up/login</a>
        </nav>
        <div class="w-nav-button menu">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
    <div class="hero-overlay topic-page">
      <div data-collapse="none" data-animation="default" data-duration="400" data-contain="1" data-ix="stick-to-top" class="w-nav progress-navbar">
        <div class="w-container progress-container">
          <div class="what-page">\Defence and Security</div>
          <nav role="navigation" class="w-nav-menu w-clearfix">
            <div class="emot-nav"><img width="30" src="images/defence-01.png"><img width="30" src="images/trade-01.png"><img width="30" src="images/jobs-01.png"><img width="30" src="images/immi-01.png">
            </div>
          </nav>
          <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
      <div class="w-container hero-container immigration"><img src="images/defence-01.png" class="hero-image">
        <h1 class="hero-title word">Defence &amp;<br>Security</h1>
        <h1 class="hero-title">Questions covered include:</h1>
        <h1 class="hero-title title-2">What threats does the UK currently face?<br>Does being in the EU make us safer?<br>What are the risks of leaving?</h1>
      </div>
    </div>
  </div>
  <div class="w-section page-progress">
    <div class="w-row progress-columns">
      <div class="w-col w-col-3 part-1">
        <h1 class="progress _1">1. Topic overview</h1>
      </div>
      <div class="w-col w-col-3 part-2">
        <h1 class="progress _2">2. What you think</h1>
      </div>
      <div class="w-col w-col-3 part-3">
        <h1 class="progress _3">3. What you feel</h1>
      </div>
      <div class="w-col w-col-3 part-4">
        <h1 class="progress _4">4. Topic results</h1>
      </div>
    </div>
  </div>
  <div id="Intro--start" class="w-section intro-panel">
    <div class="w-container">
      <h1 class="next-button">First,</h1>
      <h1 class="how-to-header">see what's currently happening by reading the <strong class="highlight-word">overview...</strong></h1>
    </div>
    <div class="w-container overview-section">
      <h1 class="grid-header"><span>The overview</span><strong>:</strong></h1>
      <p class="overview-subtitle">The UK truly is a global power when it comes to defence and security. Being a permanent member of the UN Security Council, having access to nuclear weapons and being a member of NATO all make the UK a formidable force in the world. However it is worth considering the risks the UK currently faces today (we outline them below) and what levels of co-operation the UK should take to safeguard both its people and its interests abroad. There is no real "right answer" on this, just considered opinions from both sides. Have a read, react with what you think and feel and we'll try and show you where your thoughts are at.
        <br>
        <br><strong class="overview-text-link-phrase">Below are the 3&nbsp;main&nbsp;headline stats you'll need to know. Keep scrolling to continue.</strong>
      </p>
    </div>
    <div class="w-row overview-row">
      <div class="w-col w-col-4 column-1">
        <div class="overview-card-1">
          <div class="sticky-footer">
            <h3 class="card-header-1">What are the current threats to the UK?</h3>
            <h1 class="headline-fact-long">Terrorism, Espionage and Cyberattacks</h1>
            <p class="p1">Currently 330,000 more people enter the UK than leave it. Net migration is immigration (people entering the UK) minus people leaving the UK (emigration) with the difference between them knows as net migration.</p>
            <div class="evidence"><a target="_blank" href="https://www.mi5.gov.uk/threat-levels">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-2">
        <div class="overview-card-2">
          <div class="sticky-footer">
            <h3 class="card-header-2">How much does the UK spend on defence?</h3>
            <h1 class="headline-fact">£46 billion</h1>
            <p class="p2">The UK is the 5th largest spender on defence in the world , totalling over £46 billion a year or 2% of the UKs GDP. This is despite it being the 21st most populated country in the world.</p>
            <div class="evidence"><a target="_blank" href="https://www.gov.uk/government/news/ministry-of-defences-settlement-at-the-spending-review-2015">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-3">
        <div class="overview-card-3">
          <div class="sticky-footer">
            <h1 class="card-heading-3">How do our armed forces rank in the world?</h1>
            <h1 class="headline-fact">5th</h1>
            <h1 class="headline-fact-subtitle">most powerful in the world.</h1>
            <p class="p3">The UK has one of the most powerful armed forces in the world due to a mixture of factors including high expenditure, a highly trained professional standing army and access to nuclear weapons. It is also considered to be the most powerful within the EU.</p>
            <div class="evidence"><a target="_blank" href="https://www.controlrisks.com/en/our-thinking/analysis/security-implications-of-brexit">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="Slider" class="w-section tb-slider-section">
    <div class="w-container">
      <h1 class="next-button">Next,</h1>
      <h1 class="how-to-header">Let us know what you <strong class="highlight-word">think</strong> about defence, security and the EU by reading the cards and seeing which way you lean most...</h1>
    </div>
    <div data-ix="first-think-card" class="w-container think-container">
      <div class="key-point-1">
        <div class="card-progress">
          <div class="card-progress">Card 1/3</div>
        </div>
        <h1 class="card-1-header">&nbsp;Will leaving the EU have an impact on the UKs membership of international bodies?</h1>
        <p class="card-text">The UK is a member of a number of international organisations including the UN, NATO, G7, G20 and World Bank.</p>
      </div>
      <div class="think-background-div">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">This is a nice straight forward one and the answer is 'No'. The UK is a member of each organisation in its own right so leaving the EU will have no impact on the membership of any other organisation(s). For example if the UK withdrew from NATO it wouldn't leave the UN as well, they all work together but are unrelated.</p>
        </div>
      </div>
      <div class="w-row argument-row">
        <div class="w-col w-col-6 overview-1">
          <div class="think-background stay">
            <div class="sticky-footer">
              <h1 class="stay-heading">Impact if we stay</h1>
              <p class="basics-paragraph"><strong class="impact-answer-stay">None.</strong>&nbsp;
                <br>
                <br>The only membership status change would be the UK withdrawing its membership from the EU.</p>
              <div class="fill-empty-space"></div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 leave-1">
          <div class="think-background leave">
            <div class="sticky-footer _2">
              <h1 class="leave-heading">Impact if we leave</h1>
              <p class="basics-paragraph"><strong class="impact-answer-leave">None.</strong>
                <br>
                <br>The only membership status change would be the UK withdrawing its membership from the EU.</p>
              <div class="fill-empty-space"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="think-choice">
        <h1 class="which-way">Which way does this make you think you want to vote?</h1><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-leave">Vote Leave&nbsp;</a><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-neither">Don't care</a><a href="#Slider" data-ix="show-next-feel-card" class="w-button think-stay">Vote Stay</a>
      </div>
    </div>
    <div data-ix="feel-cards" class="w-container think-container-2">
      <div class="key-point-2">
        <div class="card-progress">Card 2/3</div>
        <h1 class="card-2-header">Does being a member of the EU make it easier to fight crime and terrorism?</h1>
        <p class="card-text">The EU as a collective is a major target for terrorism and cross border crime.</p>
      </div>
      <div class="think-background-div-2">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Largely speaking it does, but it also carries risks. The EU collectively faces largely the same challenges when it comes to crime and security. Due to the 'borderless' regions of the EU, criminals, terrorists and their resources (money, weapons etc.) are able to move relatively freely between different countries.&nbsp;
            <br>
            <br>However the EU has a series of agreements in place that, when executed properly, should make it easier to combat both threats. These include the European Arrest Warrant, access to foreign intelligence agencies data bases and the ability to conduct covert surveillance utilizing multiple nations resources. In addition, UK Border Force checks all passports upon arrival and exit to the UK so can already filter out potential threats and detain them within the EU membership.</p>
          <div class="evidence"><a href="https://www.cer.org.uk/sites/default/files/publications/attachments/pdf/2013/pb_imm_uk_27sept13-7892.pdf">Further reading</a>
          </div>
        </div>
        <div class="w-row argument-row-2">
          <div class="w-col w-col-6 overview-2">
            <div class="think-background stay">
              <div class="sticky-footer">
                <h1 class="stay-heading">Impact if we stay</h1>
                <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>&nbsp;
                  <br>
                  <br>The UK would continue to check passports at entry points to the UK as well as have ongoing access to the arrest warrant and intelligence databases of foreign intelligence services. It would also be exposed to free movement of people which could include people wishing to do the UK harm.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 leave-2">
            <div class="think-background leave">
              <div class="sticky-footer">
                <h1 class="leave-heading">Impact if we leave</h1>
                <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
                  <br>
                  <br> Leaving the EU would, at least theoretically, grant the UK full control over its borders thus better controlling who enters and leaves the country and for what purpose. The UK is also considered to have the most advanced and well funded intelligence agency within Europe so collaboration after exit would likely to be maintained as EU countries want ongoing access to UK intelligence assets.
                  <br>
                  <br>However&nbsp;leaving wont necessarily reduce the threat level to the UK as the most recent attacks across Europe have all been committed by nationals of that country, so the illusion of foreign fighters entering the EU to launch attacks is not a reality.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="think-choice-2">
        <h1 class="which-way">Which way does this make you think you want to vote?</h1><a href="#Slider" data-ix="show-next-feel-card-2" class="w-button think-leave-2">Vote Leave</a><a href="#Slider" data-ix="show-next-feel-card-2" class="w-button think-neither-2">Don't care</a><a href="#Slider" data-ix="show-next-feel-card-2" class="w-button think-stay-2">Vote Stay</a>
      </div>
    </div>
    <div data-ix="feel-cards" class="w-container think-container-3">
      <div class="key-point-3">
        <div class="card-progress">Card 3/3</div>
        <h1 class="why-people-card-header">How important is the European Arrest Warrant to UK security?</h1>
        <p class="card-text">The European Arrest Warrant (EAW) allows member states to arrest a national of another member state on their behalf.</p>
      </div>
      <div class="think-background-div-3">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">It's quite useful. The European Arrest Warrant (EAW) is an arrest warrant valid throughout all member states of the European Union (EU). It has been used over 14,000 by the UK since it was first adopted. Once issued, it requires another member state to arrest and transfer a criminal suspect or sentenced person to the issuing state so that the person can be put on trial or complete a detention period. This is designed to speed up how quickly criminals can be deported and stand trial in the country where they committed the crime.The technicalities of what the person can be arrested for (for example the crime must warrant a year or more in prison) and how it is used will be discussed further.</p>
        </div>
        <div class="w-row argument-row-3">
          <div class="w-col w-col-6 overview-3">
            <div class="think-background stay">
              <div class="sticky-footer">
                <h1 class="stay-heading">Impact if we stay</h1>
                <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>
                  <br>
                  <br>The UK would retain access to the EAW and would continue to use it to both arrest other EU nationals in the UK on another countries behalf and request criminals be arrested in another EU country on the UKs behalf.
                  <br>
                  <br>All the time there is a borderless area it makes sense for law enforcement to work together.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 leave-3">
            <div class="think-background leave">
              <div class="sticky-footer">
                <h1 class="leave-heading">Impact if we leave</h1>
                <p class="basics-paragraph"><strong class="impact-answer-leave">Unknown.</strong>
                  <br>
                  <br>We would probably loose access to it. The EAW has allowed over 14,000 people to be arrested and extradited back to their country of origin. There is nothing else out there currently that would allow the UK to arrest, charge and sentence/deport another countries citizen as quickly as the EAW.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="think-choice-3">
        <h1 class="which-way">Which way does this make you think you want to vote?</h1><a href="#Finally" class="w-button think-leave-3">Vote Leave</a><a href="#Finally" class="w-button think-neither-3">Don't care</a><a href="#Finally" class="w-button think-stay-3">Vote Stay</a>
      </div>
    </div>
  </div>
  <div id="Finally" class="w-section section-1">
    <div class="w-container">
      <h1 class="next-button long">Finally,</h1>
      <h1 class="how-to-header">Let us know how you <strong class="highlight-word">feel</strong> about the UK and the EU by reacting to the impact of the UK being in the EU today...</h1>
      <h1 class="blue-section-header">These are the top searches on Google for 'immigration and the EU'. We've answered the question to save you link clicking and wasting time. React to the answer using the emoticons on each card and we'll calculate how you 'feel' about the EU.</h1>
    </div>
    <div data-duration-in="300" data-duration-out="100" class="w-tabs feelings-tab">
      <div class="w-tab-menu tabs-menu">
        <a data-w-tab="Tab 1" class="w-tab-link w-inline-block tab-link selected">
          <div class="button-text">Most searched</div>
        </a>
        <a data-w-tab="Tab 2" class="w-tab-link w-inline-block tab-link selected">
          <div class="button-text">UK and EU defence today</div>
        </a>
        <a data-w-tab="Tab 3" class="w-tab-link w--current w-inline-block tab-link selected">
          <div class="button-text">International co-operation</div>
        </a>
      </div>
      <div class="w-tab-content">
        <div data-w-tab="Tab 1" class="w-tab-pane">
          <div class="w-row feeling-row-2">
            <div class="w-col w-col-4 column-1">
              <div class="card-4">
                <div class="sticky-footer test">
                  <h1 class="card-header-8">Does being a member of the EU make it easier for the UK to be attacked?</h1>
                  <h1 class="headline-fact-long">Impossible to tell.</h1><a href="#" data-ix="p9" class="w-button button-9">More info</a>
                  <p data-ix="display-none-on-load" class="p9">This is a very hotly contested debate with no 'answer'. In a nutshell it's about the changing nature of the threat of terrorism and whether the UK fights it as part of a union and uses pooled economic and political influence to combat it and or using its intelligence and security services.
                    <br>
                    <br>Based on the information available we largely draw the conclusion that the UK faces security threats regardless which way the vote goes.</p>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-9"><img width="50" src="images/angry with word.png" data-ix="anger-selected-9" class="anger-9"><img width="50" src="images/shocked.png" data-ix="shock-selected-9" class="shock-9"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-9" class="indifferent-9"><img width="50" src="images/pleased.png" data-ix="happy-selected-9" class="happy-9"><img width="55" src="images/very happy.png" data-ix="delighted-selected-9" class="delighted-9">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-2">
              <div class="card-5">
                <div class="sticky-footer">
                  <h1 class="card-header-5">What are the current security threats to the EU?</h1>
                  <h1 class="headline-fact-long">1. Terrorism<br>2. Proliferation of weapons of mass destruction (WMD)<br>3. Regional conflicts<br>4. State failure<br>5. Organised crime.</h1><a href="#" data-ix="p5" class="w-button button-5">More info</a>
                  <p data-ix="display-none-on-load" class="p5">Largely speaking, the threats faced by the majority of member states are the same. The EU is a collective target for extremists, particularly those from the so called Islamic State as made clear during the horrific attacks in Paris and Brussels.</p>
                  <div class="evidence"><a target="_blank" href="http://www.eeas.europa.eu/csdp/about-csdp/european-security-strategy/">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-5"><img width="50" src="images/angry with word.png" data-ix="anger-selected-5" class="anger-5"><img width="50" src="images/shocked.png" data-ix="shock-selected-5" class="shock-5"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-5" class="indifferent-5"><img width="50" src="images/pleased.png" data-ix="happy-selected-5" class="happy-5"><img width="55" src="images/very happy.png" data-ix="delighted-selected-5" class="delighted-5">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-3">
              <div class="card-6">
                <div class="sticky-footer">
                  <h1 class="card-header-6">What is the European Arrest Warrant?</h1>
                  <h1 class="headline-fact-long">The ability to arrest a wanted person in any EU country.</h1><a href="#" data-ix="p6" class="w-button button-6">Show context</a>
                  <p data-ix="display-none-on-load" class="p6">The European Arrest Warrant (EAW) is an arrest warrant valid throughout all member states of the European Union (EU). Once issued, it requires another member state to arrest and transfer a criminal suspect or sentenced person to the issuing state so that the person can be put on trial or complete a detention period. This is designed to speed up how quickly criminals can be deported and stand trial in the country where they committed the crime.The technicalities of what the person can be arrested for (for example the crime must warrant a year or more in prison) and how it is used will be discussed further.</p>
                  <div class="evidence"><a target="_blank" href="http://www.nationalcrimeagency.gov.uk/publications/european-arrest-warrant-statistics">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-6"><img width="50" src="images/angry with word.png" data-ix="anger-selected-6" class="anger-6"><img width="50" src="images/shocked.png" data-ix="shock-selected-6" class="shock-6"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-6" class="indifferent-6"><img width="50" src="images/pleased.png" data-ix="happy-selected-6" class="happy-6"><img width="55" src="images/very happy.png" data-ix="delighted-selected-6" class="delighted-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div data-w-tab="Tab 2" class="w-tab-pane">
          <div class="w-row feeling-row-4">
            <div class="w-col w-col-4 column-1">
              <div class="card-10">
                <div class="sticky-footer">
                  <h1 class="card-header-8">How do our armed forces rank in the world?</h1>
                  <h1 class="headline-fact-long">5th most powerful</h1><a href="#" data-ix="p6" class="w-button button-6">More info</a>
                  <h1 class="p6">The UK has one of the most powerful armed forces in the world due to a mixture of factors including high expenditure, a highly trained professional standing army and access to nuclear weapons. It is also considered to be the most powerful within the EU.</h1>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-10"><img width="50" src="images/angry with word.png" data-ix="anger-selected-10" class="anger-10"><img width="50" src="images/shocked.png" data-ix="shock-selected-10" class="shock-10"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-10" class="indifferent-10"><img width="50" src="images/pleased.png" data-ix="happy-selected-10" class="happy-10"><img width="55" src="images/very happy.png" data-ix="delighted-selected-10" class="delighted-10">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-2">
              <div class="card-11">
                <div class="sticky-footer">
                  <h1 class="card-header-8">How much does the UK spend on defence a year?</h1>
                  <h1 class="headline-fact-long">How much does the UK spend on defence?</h1><a href="#" data-ix="p7" class="w-button button-7">More info</a>
                  <h1 class="p7">The UK is the 5th largest spender on defence in the world , totalling over £46 billion a year or 2% of the UKs GDP. This is despite it being the 21st most populated country in the world.</h1>
                  <div class="evidence"><a target="_blank" href="https://www.gov.uk/government/news/ministry-of-defences-settlement-at-the-spending-review-2015">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-11"><img width="50" src="images/angry with word.png" data-ix="anger-selected-11" class="anger-11"><img width="50" src="images/shocked.png" data-ix="shock-selected-11" class="shock-11"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-11" class="indifferent-11"><img width="50" src="images/pleased.png" data-ix="happy-selected-11" class="happy-11"><img width="55" src="images/very happy.png" data-ix="delighted-selected-11" class="delighted-11">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-3">
              <div class="card-12">
                <div class="sticky-footer">
                  <h1 class="card-header-8">How powerful are other EU countries armed forces?</h1>
                  <h1 class="headline-fact-long">Amongst the worlds Top 10.</h1><a href="#" data-ix="p8" class="w-button button-8">More info</a>
                  <h1 class="p8">France and Germany rank amongst the worlds most powerful militaries with France being particularly notable given its ownership of nuclear weapons. The vast majority of EU countries are members of NATO so military efforts are pooled collectively and it is highly unlikely that any member state would operate independently of another.</h1>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-12"><img width="50" src="images/angry with word.png" data-ix="anger-selected-12" class="anger-12"><img width="50" src="images/surprised with word.png" data-ix="shock-selected-12" class="shock-12"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-12" class="indifferent-12"><img width="50" src="images/happy with word.png" data-ix="happy-selected-12" class="happy-12"><img width="55" src="images/very happy.png" data-ix="delighted-selected-12" class="delighted-12">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
          <div class="w-row feeling-row-5">
            <div class="w-col w-col-4 column-1">
              <div class="card-13">
                <div class="sticky-footer">
                  <h1 class="card-header-8">Is the EU part of NATO?</h1>
                  <h1 class="headline-fact-long">No.</h1><a href="#" data-ix="p10" class="w-button button-11">More info</a>
                  <p data-ix="display-none-on-load" class="p10">The European Union is a unique and essential partner for NATO. The two organisations share a majority of members (22), and all members of both organisations share common values.</p>
                  <div class="evidence"><a target="_blank" href="http://www.nato.int/cps/en/natohq/topics_49217.htm">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-13"><img width="50" src="images/angry with word.png" data-ix="anger-selected-13" class="anger-13"><img width="50" src="images/shocked.png" data-ix="shock-selected-13" class="shock-13"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-13" class="indifferent-13"><img width="50" src="images/pleased.png" data-ix="happy-selected-13" class="happy-13"><img width="54" src="images/very happy.png" data-ix="delighted-selected-13" class="delighted-13">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-2">
              <div class="card-14">
                <div class="sticky-footer">
                  <h1 class="card-header-8">Will leaving the EU mean that the UK leaves NATO?</h1>
                  <h1 class="headline-fact-long">No.</h1><a href="#" data-ix="p11" class="w-button button-12">More info</a>
                  <p data-ix="display-none-on-load" class="p11">The UK joined NATO in 1949, shortly after the end of the Second World War along with Belgium, the Netherlands, Luxembourg and France. The aim of NATO was for Western Europe to group together to deter aggression from the USSR. The UK is a member of both NATO and EU so leaving one won't effect the other.</p>
                  <div class="evidence"><a target="_blank" href="http://www.nato.int/cps/en/natohq/topics_49217.htm">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-14"><img width="50" src="images/angry with word.png" data-ix="anger-selected-14" class="anger-14"><img width="50" src="images/shocked.png" data-ix="shock-selected-14" class="shock-14"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-14" class="indifferent-14"><img width="50" src="images/pleased.png" data-ix="happy-selected-14" class="happy-14"><img width="55" src="images/very happy.png" data-ix="delighted-selected-14" class="delighted-14">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-3">
              <div class="card-14"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section results">
    <div class="w-container">
      <h1 class="next-button">Great!</h1>
      <h1 class="how-to-header topic-result">Here are your <strong class="highlight-word result">results</strong> for Defence &amp; Security:</h1>
    </div><a href="#" class="w-button results-button">Click to reveal&nbsp;</a>
    <div class="w-container">
      <div class="w-row results-row">
        <div class="w-col w-col-6 result-1">
          <h1 class="results-header-1">What you think:</h1><img src="images/Main site header.png">
        </div>
        <div class="w-col w-col-6 result-2">
          <h1 class="results-header-1">What you feel:</h1><img src="images/Main site header.png">
        </div>
      </div>
    </div>
  </div>
  <div class="w-section share-and-save-section">
    <div class="w-container share-and-save">
      <div class="w-row">
        <div class="w-col w-col-6 save">
          <h1 class="save-and-share-header short">Come back to this page</h1>
          <p class="save-and-share-body">To protect your privacy we delete your results after each session, unless you create an account. Enter your email address and a password so that you can come back and view your results anytime as well as see updates on topics that matter to you.</p>
          <div class="w-form">
            <form id="email-form" name="email-form" data-name="Email Form">
              <label for="email" class="field-label">Email Address:</label>
              <input id="email" type="email" placeholder="Enter your email address" name="email" data-name="Email" required="required" class="w-input">
              <label for="name" class="field-label">Password:</label>
              <input id="name" type="text" placeholder="Enter a password" name="name" data-name="Name" required="required" class="w-input">
              <input type="submit" value="Submit" data-wait="Please wait..." class="w-button submit-email">
            </form>
            <div class="w-form-done">
              <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
              <p>Oops! Something went wrong while submitting the form</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 share">
          <h1 class="save-and-share-header">Share your results!</h1>
          <p class="save-and-share-body">Tell your friends about leaveorstay and challenge them to see where they truly stand in this referendum.</p><a href="#" class="w-button share">FB share</a><a href="#" class="w-button share">Twitter Share</a>
          <p class="save-and-share-body">Want to share the site but not your results? Share this link: http://www.leaveorstay.co.uk</p>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section end-of-page">
    <div class="w-row end-section">
      <div class="w-col w-col-6 end-column-1"></div>
      <div class="w-col w-col-6 end-column-2"></div>
    </div>
    <h1 class="basics-link">What next?</h1>
    <p class="lets-get-started-pap">Picking additional topics will repeat what you've just completed above but with new topics that you select. Return to home will, you know, return you to the home page.</p><a data-ix="new-interaction-4" class="w-button continue-button">Pick additional topics</a><a data-ix="new-interaction-4" href="results.php" class="w-button continue-button _2">See all results</a>
  </div>
  <div data-ix="display-none-on-load" class="w-section topic-select-section">
    <div class="w-container topic-container">
      <div class="w-row topic-row">
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button"></a>
          <div class="icon-name">Law</div>
        </div>
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button-2"></a>
          <div class="icon-name">Jobs</div>
        </div>
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button-3"></a>
          <div class="icon-name">Defence</div>
        </div>
      </div>
      <div class="w-row topic-row">
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button-4"></a>
          <div class="icon-name immigration">Immigration</div>
        </div>
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button-5"></a>
          <div class="icon-name">Trade</div>
        </div>
        <div class="w-col w-col-4 topic-colum">
          <a href="#" class="w-button icon-button-6"></a>
          <div class="icon-name">All</div>
        </div>
      </div><a href="immigration.php" class="w-button topic-continue">Get started</a>
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