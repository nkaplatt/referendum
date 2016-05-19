<?php
session_start();
require_once('anonymous.php');
require_once('js/functions.php');
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri May 13 2016 15:40:15 GMT+0000 (UTC) -->
<html data-wf-site="572762c72f3e6fea5d0339d6" data-wf-page="573525fd3eadd2ff25f17784">
<head>
  <meta charset="utf-8">
  <title>Trade</title>
  <meta name="description" content="See where you stand on trade and the EU referendum. Compare both sides of the argument so that you can be sure that you’ve cast an informed vote.">
  <meta property="og:title" content="Trade">
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
  <script type="text/javascript" src="js/modernizr.js"></script>
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
  $category = 3;
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
          <div class="what-page">\Trade</div>
          <nav role="navigation" class="w-nav-menu w-clearfix">
            <div class="emot-nav"><img width="30" src="images/defence-01.png"><img width="30" src="images/trade-01.png"><img width="30" src="images/jobs-01.png"><img width="30" src="images/immi-01.png">
            </div>
          </nav>
          <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
      <div class="w-container hero-container immigration"><img src="images/trade-01.png" class="hero-image">
        <h1 class="hero-title word">Trade</h1>
        <h1 class="hero-title">Questions covered include:</h1>
        <h1 class="hero-title title-2">Who does the UK trade with?<br>How important is the EU to us?<br>Can we negotiate our own trade deals?</h1>
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
      <p class="overview-subtitle">The UK is a maritime nation, coupled with being low in many natural resources, it has depended on trade for centuries as its main form of revenue. The UK joined the EEC in 1973 before it became the EU in a bid to open up new markets for UK trade and help boost the economy. The UK exports globally and being a member of the EU has its drawbacks and advantages for the UK and its trading efforts. Out of all the topics, this one has the largest potential impact (economically at least) on what the UK will look like in the future.
        <br>
        <br>Below are the 3 main headline stats you'll need to know. Keep scrolling to continue.</p>
    </div>
    <div class="w-row overview-row">
      <div class="w-col w-col-4 column-1">
        <div class="overview-card-1">
          <div class="sticky-footer">
            <h3 class="card-header-1">How much do we export to the EU?</h3>
            <h1 class="headline-fact-long">44% of our exports go to the EU.</h1>
            <p class="p1">The EU is by far the UKs single trading partner (the next biggest is the US at 17%) accounting for over £229 billion in exports in 2015 alone. However the level of exports to the EU is falling, down 6% from 2008 when the EU accounted for just over 50% of all UK exports.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/economy/do-half-uks-exports-go-europe/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-2">
        <div class="overview-card-2">
          <div class="sticky-footer">
            <h3 class="card-header-2">How much of our trade goes to countries outside of the EU?</h3>
            <h1 class="headline-fact-long">EU = 44%<br>USA= 17%<br>Brazil, Russia, India, China and South Africa (BRICS)= 8%<br>Other= 30%</h1>
            <p class="p2">In 2014, British companies sold around £515 billion worth of goods and services to foreign buyers, according to the Office for National Statistics. While the EU remains our largest market by some margin, over time we’re selling less to the EU and more to other economies as a proportion of total trade.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/ask-full-fact-uks-trade-eu/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-3">
        <div class="overview-card-3">
          <div class="sticky-footer">
            <h1 class="card-heading-3">Does the EU trade with China?</h1>
            <h1 class="headline-fact-long">Yes.<br>Via the EU-China trade deal.</h1>
            <p class="p3">The European Union and China are two of the biggest traders in the world. China is now the EU's 2nd trading partner behind the United States and the EU is China's biggest trading partner.</p>
            <div class="evidence"><a target="_blank" href="http://ec.europa.eu/trade/policy/countries-and-regions/countries/china/index_en.htm">Where did we get this from?</a>
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
      <h1 class="how-to-header">Let us know what you <strong class="highlight-word">think</strong> about immigration and the EU by reading the the cards and seeing which way you lean most...</h1>
    </div>
    <div data-ix="first-think-card" class="w-container think-container">
      <div class="key-point-1">
        <div class="card-progress">
          <div class="card-progress">Card 1/3</div>
        </div>
        <h1 class="card-1-header">How much trade does the EU generate for us?</h1>
        <p class="card-text">44% of the UKs exports go to the EU. The US is second taking 15% of our exports.</p>
      </div>
      <div class="think-background-div">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">The EU is currently the UKs single largest exporter taking 44% of all UK exports in 2014. There single market , which has over 500 million as part of it, is deemed 'vital' to the UK economy.
            <br>
            <br>UK exports to the EU have declined with 55% of our exports going to the EU in 2008 compared to 44% in 2014, a statistically significant drop. However this is in part due to the world economy growing, increasing the number of exports the UK makes which in turn makes the 'relative' portion of each trade partner smaller.</p>
        </div>
      </div>
      <div class="w-row argument-row">
        <div class="w-col w-col-6 overview-1">
          <div class="think-background stay">
            <div class="sticky-footer">
              <h1 class="stay-heading">Impact if we stay</h1>
              <p class="basics-paragraph"><strong class="impact-answer-stay">Unknown.</strong>&nbsp;
                <br>
                <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China so the UK would be part of that as well.</p>
              <div class="fill-empty-space"></div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 leave-1">
          <div class="think-background leave">
            <div class="sticky-footer _2">
              <h1 class="leave-heading">Impact if we leave</h1>
              <p class="basics-paragraph"><strong class="impact-answer-leave">Unknown.</strong>
                <br>
                <br>The UK would be able to create its own separate trade deals with countries around the world, the EU included. However, there are a multitude of different models on the table, each with advantages and disadvantages. No one knows under which terms trade will be struck so we (leaveorstay) aren't going to speculate under which terms the UK will trade under.</p>
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
        <h1 class="card-2-header">If we voted to leave the EU who else could we trade with?</h1>
        <p class="card-text">There are a multitude of different options, all with different advantages and disadvantages.</p>
      </div>
      <div class="think-background-div-2">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">The UK would have to work out under which conditions it would have a trading relationship with the &nbsp;remaining 27 other members states. This could range from country to country negotiations (bi-lateral agreements) or via a trading bloc (like Norway has( which could come at a cost. In addition the EU has 51 trade agreements &nbsp;in place with other countries so the UK would also need to address those as well.&nbsp;
            <br>
            <br>
            <br>Being part of the EU has its advantages and disadvantages, especially with trade. The advantage of being part of a larger, 500 million person block, is that the terms of trade are generally better as countries generally want access to the EU due to its sheer size, wealth and purchasing power. The disadvantage however is that the UK must wait for negotiations to please all parties- for example Italian orange producers aren't happy with the current agreement with the China deal which is slowing it down.</p>
        </div>
        <div class="w-row argument-row-2">
          <div class="w-col w-col-6 overview-2">
            <div class="think-background stay">
              <div class="sticky-footer">
                <h1 class="stay-heading">Impact if we stay</h1>
                <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>&nbsp;
                  <br>
                  <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China so the UK would be part of that as well.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 leave-2">
            <div class="think-background leave">
              <div class="sticky-footer">
                <h1 class="leave-heading">Impact if we leave</h1>
                <p class="basics-paragraph"><strong class="impact-answer-leave">Severe.</strong>
                  <br>
                  <br> The UK economy would most likely suffer a negative impact in the short and medium term (generally considered to be 10 years or less) in the result of a leave vote primarily due to the uncertainty of the trade deal(s) the UK could secure. No country has ever left the EU in its current incarnation before.
                  <br>
                  <br>The UK is more then capable of securing a deal as it is one of the worlds wealthiest nations but as a trading nation these deals are vital to the economy and jobs so it wont be easy.</p>
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
        <h1 class="why-people-card-header">How long would it take us to create new trade partnerships?</h1>
        <p class="card-text">The UK would have a whole host of options open to it and no one really knows what can and will happen.</p>
      </div>
      <div class="think-background-div-3">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">This is by far the hardest question to answer in this referendum debate. Why? No one has a clue how it would work because it has never happened before.
            <br>
            <br>On the one hand the UK could enter a relationship similar to that of Norway which has access to the single market but at the cost of the EU influencing some of its laws (without it being represented at the EU) and charging a membership fee.
            <br>
            <br>Or the UK could trade through the &nbsp;World Trade Organisation and work towards securing deals through that forum although tariffs are likely so costs of goods and services could go up.</p>
        </div>
        <div class="w-row argument-row-3">
          <div class="w-col w-col-6 overview-3">
            <div class="think-background stay">
              <div class="sticky-footer">
                <h1 class="stay-heading">Impact if we stay</h1>
                <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>
                  <br>
                  <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China.</p>
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
                  <br>There really is no answer to this. We will be listing the different models of exit as soon as we can.</p>
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
        <a data-w-tab="Tab 2" class="w-tab-link w-inline-block tab-link selected">
          <div class="button-text">UK trade today</div>
        </a>
        <a data-w-tab="Tab 3" class="w-tab-link w--current w-inline-block tab-link selected">
          <div class="button-text">What could happen next</div>
        </a>
      </div>
      <div class="w-tab-content">
        <div data-w-tab="Tab 2" class="w-tab-pane">
          <div class="w-row feeling-row-4">
            <div class="w-col w-col-4 column-1">
              <div class="card-10">
                <div class="sticky-footer">
                  <h1 class="card-header-8">Who are the UKs top trading partners (by country) ?</h1>
                  <h1 class="headline-fact-long">The United States, Germany and China.</h1><a href="#" data-ix="p4" class="w-button button-9">More info</a>
                  <p data-ix="display-none-on-load" class="p4">The UK exports to countries both within and outside of the EU. The US, Germany and China are the three largest growing trade partners the UK has and there is little evidence to show that the EU is slowing down these trade arrangements.</p>
                  <div class="evidence"><a target="_blank" href="https://www.uktradeinfo.com/Statistics/OverseasTradeStatistics/Pages/Commodities.aspx">Where did we get this from?</a>
                  </div>
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
                  <h1 class="card-header-8">Do EU countries need us more then we need them (in terms of trade) ?</h1>
                  <h1 class="headline-fact-long">Yes.</h1>
                  <h1 class="headline-small">Apart from 3.</h1><a href="#" data-ix="p10" class="w-button button-1">More info</a>
                  <p data-ix="display-none-on-load" class="p10">Every country in the EU, bar 3 (Ireland, Luxembourg, and Malta), has a trade surplus with the UK in 2015. This means that they sell to us more then they buy from us and as a result we are more valuable to them as trading partner then they are to us.</p>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/where-does-eu-export/">Where did we get this from?</a>
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
                  <h1 class="card-header-8">How much investment into the UK comes from the EU?</h1>
                  <h1 class="headline-fact-long">46% of foreign direct investment comes from the EU</h1><a href="#" data-ix="p11" class="w-button button-4">More info</a>
                  <p data-ix="display-none-on-load" class="p11">The EU is still by far the largest source for foreign direct investment into the UK. This investment is spent on everything from building factories to starting businesses. It's important to note however that investment from the EU has fallen by 7% since 2008, potentially showing a change in where the UK sources its investment from.</p>
                  <div class="evidence"><a target="_blank" href="http://www.ey.com/UK/en/Issues/Business-environment/2015-UK-attractiveness-survey">Where did we get this from?</a>
                  </div>
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
            <div class="w-col w-col-6 column-1">
              <div class="card-13">
                <div class="sticky-footer">
                  <h1 class="card-header-8">Would leaving the EU negatively effect trade?</h1>
                  <h1 class="headline-fact-long">Yes but no one know for how long.</h1><a href="#" data-ix="p5" class="w-button button-11">More info</a>
                  <p data-ix="display-none-on-load" class="p5">The UK is part of a series of trade deals with the EU and re negotiating these will naturally take time. The extent of which this time will take is an unknown as no country has ever left the EU before in its current format. The UK will need to work on trade agreements with current EU countries (28 countries in total) as well as an additional 51 bi lateral trade agreements that the EU currently has with countries around the world. There is a whole debate around this question which we will be exploring shortly here.</p>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-13"><img width="50" src="images/angry with word.png" data-ix="anger-selected-13" class="anger-13"><img width="50" src="images/shocked.png" data-ix="shock-selected-13" class="shock-13"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-13" class="indifferent-13"><img width="50" src="images/pleased.png" data-ix="happy-selected-13" class="happy-13"><img width="54" src="images/very happy.png" data-ix="delighted-selected-13" class="delighted-13">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-6 column-2">
              <div class="card-14">
                <div class="sticky-footer">
                  <h1 class="card-header-8">What are the options for trading outside the EU?</h1>
                  <h1 class="headline-fact-long">3 - main options.</h1><a href="#" data-ix="p6" class="w-button button-12">More info</a>
                  <p data-ix="display-none-on-load" class="p6">If the UK decides to leave the EU there will be a period of renegotiation with all sorts of different agendas that could take years. Voting to leave will mean that the UK has to find a new structure to trade within or enter into an existing one, which will have a cost either financially or otherwise. The most popular quoted options are a World Trade Organisation Style, a Norwegian Style and a Canadian Style. Each of these has pros and cons which we will discuss shortly.</p>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-14"><img width="50" src="images/angry with word.png" data-ix="anger-selected-14" class="anger-14"><img width="50" src="images/shocked.png" data-ix="shock-selected-14" class="shock-14"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-14" class="indifferent-14"><img width="50" src="images/pleased.png" data-ix="happy-selected-14" class="happy-14"><img width="55" src="images/very happy.png" data-ix="delighted-selected-14" class="delighted-14">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section results">
    <div class="w-container">
      <h1 class="next-button">Great!</h1>
      <h1 class="how-to-header topic-result">Here are your <strong class="highlight-word result">results</strong> for Trade:</h1>
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