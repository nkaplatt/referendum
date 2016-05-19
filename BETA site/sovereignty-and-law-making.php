<?php
session_start();
require_once('anonymous.php');
require_once('js/functions.php');
?>

<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri May 13 2016 15:40:16 GMT+0000 (UTC) -->
<html data-wf-site="572762c72f3e6fea5d0339d6" data-wf-page="573525f030b72505515a4867">
<head>
  <meta charset="utf-8">
  <title>Sovereignty & Law</title>
  <meta name="description" content="See where you stand on sovereignty and the EU referendum. Compare both sides of the argument so that you can be sure that you’ve cast an informed vote.">
  <meta property="og:title" content="Students">
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
	$category = 2;
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
          <div class="what-page">\Sovereignty and the Law</div>
          <nav role="navigation" class="w-nav-menu w-clearfix">
            <div class="emot-nav"><img width="30" src="images/defence-01.png"><img width="30" src="images/trade-01.png"><img width="30" src="images/jobs-01.png"><img width="30" src="images/immi-01.png">
            </div>
          </nav>
          <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
      <div class="w-container hero-container immigration"><img src="images/sov-01.png" class="hero-image sovereignty">
        <h1 class="hero-title word">Sovereignty &amp;<br>Law Making</h1>
        <h1 class="hero-title">Questions covered include:</h1>
        <h1 class="hero-title title-2">Does the EU "make" UK law?<br>Is EU law superior to UK law?<br>Is the EU run by "unelected bureaucrats"?</h1>
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
      <p class="overview-subtitle">This topic is all about which legal and political structures the UK sits in. The UK does have a fair portion of its laws influenced by Brussels and is required by EU law to adhere to them. The EU is considered by many leading experts to be amongst the most democratic international bodies in the world think UN, NATO, IMF etc. as citizens can directly impact it via votes. The main theme running through this topic is whether the UK should govern itself on everything and not be part of any form of larger union or whether it should transfer all power back to Westminster. Please note: The UK will not retain complete sovereignty even in the result of a vote to leave. Westminster is influenced by "unelected" bodies constantly like the House of Lords, NATO and lobbyists. Will the UK regain noticeable power? Yes. Will it regain all its power? No.
        <br>
        <br><strong class="overview-text-link-phrase">Below are the 3&nbsp;main&nbsp;headline stats you'll need to know. Keep scrolling to continue.</strong>
      </p>
    </div>
    <div class="w-row overview-row">
      <div class="w-col w-col-4 column-1">
        <div class="overview-card-1">
          <div class="sticky-footer test">
            <h1 class="card-header-8">How much voting power does the UK have within EU?</h1>
            <h1 class="headline-fact-long">13%</h1>
            <p class="p9">The UK has the third highest voting power in the Council of Ministers (behind Germany and France as the voting percentage is driven by population size). Most decisions are agreed by “consensus”, meaning that member state representatives work together to seek an agreement that all countries will be able to support. As a result, most votes are recorded with either no or only few countries abstaining or opposing legislation. Currently, between 20-25% of legislation has some form of opposition recorded by either a single or group of member state governments.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/eus-powers/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-2">
        <div class="overview-card-2">
          <div class="sticky-footer">
            <h1 class="card-header-5">Can the EU pass laws that the UK doesn't agree with?</h1>
            <h1 class="headline-fact-long">It depends what it's about.</h1>
            <p class="p5">Generally speaking the EU tries to pass the vast majority of its laws &nbsp;with member states unanimously agreeing (meaning every single one of them agree with it before it even goes to a vote). This is the case for approximately 75-85% of all law passed depending which study you look at. For those where member states object, it is taken to a vote. The UK is more likely then any other country to vote against the majority and be on the loosing side.</p>
            <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-3">
        <div class="overview-card-3">
          <div class="sticky-footer">
            <h1 class="card-header-6">Does the UK vote against proposed EU law?</h1>
            <h1 class="headline-fact-long">Yes.</h1>
            <p class="p6">The UK voted&nbsp;against&nbsp;the majority more frequently on budgetary policies, foreign and security policy, and international development, and voted&nbsp;with&nbsp;the majority more frequently on international trade, industry, environment, transport, legal affairs, economic and monetary union, and internal market policies.
              <br>
              <br>In most policy areas, the UK was again the member state most likely to vote against the majority, and significantly more likely than the average government in the EU.&nbsp;
              <br>
              <br>Nevertheless, the UK was not the most oppositional government on several important issue areas: internal market, legal affairs, transport, environment, and fisheries.</p>
            <div class="evidence"><a target="_blank" href="http://www.migrationwatchuk.org/what-is-the-problem">Where did we get this from?</a>
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
        <h1 class="card-1-header">Is EU law superior to UK law?</h1>
        <p class="card-text">' EU law is superior to UK law. This stops the British public from being able to vote out those who make our laws'</p>
      </div>
      <div class="think-background-div">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Every position within the EU is voted upon (bar one where each country takes it in turns) but NOT directly. Instead the people we elect through the General Election and European Election represent us at the EU or they in turn vote for someone to represent them.&nbsp;
            <br>
            <br>The UK Parliament &nbsp;has the right to make whatever laws it pleases, even if such laws conflict with EU law. But, as a matter of EU and international law, doing so may place the UK as a State in breach of its obligations under the EU Treaties. The upshot is that, for as long as the UK remains a Member State of the EU, parliamentary sovereignty still&nbsp;exists, but it is unlawful—as a matter of EU and international law—for sovereignty to be&nbsp;exercised&nbsp;in ways that are incompatible with EU law.</p>
        </div>
      </div>
      <div class="w-row argument-row">
        <div class="w-col w-col-6 overview-1">
          <div class="think-background stay">
            <div class="sticky-footer">
              <h1 class="stay-heading">Impact if we stay</h1>
              <p class="basics-paragraph"><strong class="impact-answer-stay">Unknown.</strong>&nbsp;
                <br>
                <br>The UK would still be bound by EU law but would most likely continue to opt out of certain legislation including monetary union (the Euro) and the border free area (Schengen).
                <br>
                <br>Note: The vast majority of EU law is not "primary" law meaning acts that directly impact things like the NHS and schools. The majority of the law is based around ensuring that people, goods and services are treated fairly across the EU.</p>
              <div class="fill-empty-space"></div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 leave-1">
          <div class="think-background leave">
            <div class="sticky-footer _2">
              <h1 class="leave-heading">Impact if we leave</h1>
              <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
                <br>
                <br>Depending on how the negotiations played out in the result of a UK exit, UK law would become 'supreme' law meaning that no other law could overrule it as it currently can.
                <br>
                <br>However the UK may have to accept some EU law as part of trading agreements and the UK would still be bound to other legal acts such as declaring war as part of NATO.</p>
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
        <h1 class="card-2-header">Does the EU makes our laws?</h1>
        <p class="card-text">'The European Union makes two thirds of UK law.'</p>
      </div>
      <div class="think-background-div-2">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">That's about right if you count EU regulations as part of 'UK law'. The EU influence on&nbsp;UK-only laws is about 13%. But this counting exercise doesn't tell us very much.
            <br>
            <br>We may all be equal before the law, but not all laws are created equal; it's hard to say that an EU regulation on the&nbsp;methods of olive oil analysis&nbsp;is as important as an&nbsp;Act of Parliament restructuring the NHS.</p>
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
                  <br>The UK would continue to abide by EU laws and would continue to work within the EU to develop legislation that can have both a positive and a negative impact on the country.</p>
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
                  <br> The UK would be able to ensure that all the laws that it makes are voted upon only in Westminster by our directly elected MPs.
                  <br>
                  <br>However, as part of the negotiation process the UK may have to adhere to certain EU laws to access the single market as well as abide by international laws which are also set by people that we don't directly elect.</p>
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
        <h1 class="why-people-card-header">Does being part of the EU stop the UK deporting criminals and terrorists?</h1>
        <p class="card-text">'The EU stops us deporting criminals and terrorists as it may be against their human rights.'</p>
      </div>
      <div class="think-background-div-3">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Most people get confused between the European Court of Human Rights and the European Court of Justice. The ECHR is the main body responsible for blocking extraditions and deportations because 'they breach the rights of that individual'. The European Court of Human Rights (ECHR for short) and the EU are completely unrelated. Leaving the EU will have no impact on the UKs membership of the ECHR. The ECHR is part of the Council of Europe which the UK joined in 1951, a whole 22 years before it joined what we now know as the EU.</p>
          <div class="evidence"><a href="https://fullfact.org/immigration/how-immigrants-affect-public-finances/">Further reading</a>
          </div>
        </div>
        <div class="w-row argument-row-3">
          <div class="w-col w-col-6 overview-3">
            <div class="think-background stay">
              <div class="sticky-footer">
                <h1 class="stay-heading">Impact if we stay</h1>
                <p class="basics-paragraph"><strong class="impact-answer-stay">None.</strong>
                  <br>
                  <br>Politicians will still argue about rule making and some people will get shouty in parliament but besides that nothing much.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 leave-3">
            <div class="think-background leave">
              <div class="sticky-footer">
                <h1 class="leave-heading">Impact if we leave</h1>
                <p class="basics-paragraph"><strong class="impact-answer-leave">None.</strong>
                  <br>
                  <br>We'd need to withdraw ourselves from the Human Rights Act in order to stop claims being taken to the ECHR.</p>
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
          <div class="button-text">The UK and EU law making today</div>
        </a>
        <a data-w-tab="Tab 3" class="w-tab-link w-inline-block tab-link selected">
          <div class="button-text">What could voting to leave do for law making?</div>
        </a>
        <a data-w-tab="Tab 4" class="w-tab-link w--current w-inline-block tab-link selected">
          <div class="button-text">Impact on society</div>
        </a>
      </div>
      <div class="w-tab-content">
        <div data-w-tab="Tab 1" class="w-tab-pane">
          <div class="w-row feeling-row-2">
            <div class="w-col w-col-4 column-1">
              <div class="card-4">
                <div class="sticky-footer test">
                  <h1 class="card-header-8">How much voting power does the UK have within EU?</h1>
                  <h1 class="headline-fact-long">13%</h1><a href="#" data-ix="p9" class="w-button button-9">More info</a>
                  <p data-ix="display-none-on-load" class="p9">The UK has the third highest voting power in the Council of Ministers (behind Germany and France as the voting percentage is driven by population size). Most decisions are agreed by “consensus”, meaning that member state representatives work together to seek an agreement that all countries will be able to support. As a result, most votes are recorded with either no or only few countries abstaining or opposing legislation. Currently, between 20-25% of legislation has some form of opposition recorded by either a single or group of member state governments.</p>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/eus-powers/">Where did we get this from?</a>
                  </div>
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
                  <h1 class="card-header-5">Can the EU pass laws that the UK doesn't agree with?</h1>
                  <h1 class="headline-fact-long">It depends what it's about.</h1><a href="#" data-ix="p5" class="w-button button-5">More info</a>
                  <p data-ix="display-none-on-load" class="p5">Generally speaking the EU tries to pass the vast majority of its laws &nbsp;with member states unanimously agreeing (meaning every single one of them agree with it before it even goes to a vote). This is the case for approximately 75-85% of all law passed depending which study you look at. For those where member states object, it is taken to a vote. The UK is more likely then any other country to vote against the majority and be on the loosing side.</p>
                  <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk">Where did we get this from?</a>
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
                  <h1 class="card-header-6">Does the UK vote against proposed EU law?</h1>
                  <h1 class="headline-fact-long">Yes.</h1><a href="#" data-ix="p6" class="w-button button-6">Show context</a>
                  <p data-ix="display-none-on-load" class="p6">The UK voted&nbsp;against&nbsp;the majority more frequently on budgetary policies, foreign and security policy, and international development, and voted&nbsp;with&nbsp;the majority more frequently on international trade, industry, environment, transport, legal affairs, economic and monetary union, and internal market policies.
                    <br>
                    <br>In most policy areas, the UK was again the member state most likely to vote against the majority, and significantly more likely than the average government in the EU.&nbsp;
                    <br>
                    <br>Nevertheless, the UK was not the most oppositional government on several important issue areas: internal market, legal affairs, transport, environment, and fisheries.</p>
                  <div class="evidence"><a href-disabled="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk" href-disabled-default-color="" href-disabled-underline="" href="http://www.migrationwatchuk.org/what-is-the-problem" target="_blank">Where did we get this from?</a>
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
                  <h1 class="card-header-8">How many times is the UK on the 'winning' side of the votes in the EU?</h1>
                  <h1 class="headline-fact-long">86.70%</h1><a href="#" data-ix="p1" class="w-button button-1">More info</a>
                  <h1 class="p1">The UK government was on the losing side a far higher proportion of times than any other EU government in the 2009-15 period: jumping from being on the minority (losing) side only 2.6% of the time in 2004-09 to being on the minority (losing) side 12.3% of the time in the 2009-15 period.&nbsp;<br><br>Also, the next most frequent “losing” governments, Germany and Austria, were only on the minority side 5.4% of the time in this period.One thing to note, though, is the very high level of agreement in the Council in both periods. Put the other way round, the UK voted on the winning side 97.4% of the time in 2004-09 period and 86.7% of the time in the 2009-15 period.</h1>
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
                  <h1 class="card-header-8">What percentage of laws that the EU makes directly impacts the UK?</h1>
                  <h1 class="headline-fact-long">13%</h1><a href="#" data-ix="p2" class="w-button button-2">More info</a>
                  <h1 class="p2">The EU influence on&nbsp;UK-only laws is about 13%. If you count EU regulations as part of 'UK law' then it is nearer 66%. But this counting exercise doesn't tell us very much. We may all be equal before the law, but not all laws are created equal; it's hard to say that an EU regulation on the methods of olive oil analysis is as important as an Act of Parliament restructuring the NHS. The reason for this level of regulation varies but generally speaking the majority of these regulations ensure that a product/service in one country is equal in quality to that in another.</h1>
                  <div class="evidence"><a target="_blank" href="http://findlaw.co.uk/law/government/constitutional_law/do-i-have-to-do-jury-service.html">Where did we get this from?</a>
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
                  <h1 class="card-header-8">Does the EU ever 'give back' power to the UK?</h1>
                  <h1 class="headline-fact-long">Yes.</h1><a href="#" data-ix="p3" class="w-button button-3">More info</a>
                  <h1 class="p3">The Lisbon Treaty, negotiated under the previous Labour government, allowed the Coalition government to reclaim around 100 'powers' (specific legislative acts) back from the EU. However the government opted to retain (leave within the power of the EU) a further 35 'powers' including the European Arrest Warrant as they believed it was in the UKs best interest to do so.</h1>
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
        <div data-w-tab="Tab 3" class="w-tab-pane">
          <div class="w-row feeling-row-5">
            <div class="w-col w-col-4 column-1">
              <div class="card-13">
                <div class="sticky-footer">
                  <h1 class="card-header-8">Will leaving the EU withdraw the UK from the European Court of Human Rights?</h1>
                  <h1 class="headline-fact-long">No.</h1><a href="#" data-ix="p10" class="w-button button-11">More info</a>
                  <p data-ix="display-none-on-load" class="p10">The European Court of Human Rights (ECHR for short) and the EU are completely unrelated. Leaving the EU will have no impact on the UKs membership of the ECHR. The ECHR is part of the Council of Europe which the UK joined in 1951, a whole 22 years before it joined what we now know as the EU.</p>
                  <div class="evidence"><a href-disabled="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk" href-disabled-default-color="" href-disabled-underline="" href="https://www.justice.gov.uk/offenders/types-of-offender/foreign" target="_blank">Where did we get this from?</a>
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
                  <h1 class="card-header-8">Will leaving the EU mean that we have complete control over all our laws?</h1>
                  <h1 class="headline-fact-long">No.</h1><a href="#" data-ix="p11" class="w-button button-12">More info</a>
                  <p data-ix="display-none-on-load" class="p11">The UK is part of a whole host of different organisations and other 'super-national bodies' that govern UK law without being elected. These include the World Trade Organisation (which is un-elected by UK voters) commits the UK to supra-national regulation and arbitration, as well as NATO which includes the Article 5 obligation to come to the mutual defence of fellow members, which implies a loss of sovereignty over deploying UK forces. Whilst the EU impacts the UK day to day life of the country, withdrawing from the EU will not give back the UK full sovereign control.</p>
                  <div class="evidence"><a target="_blank" href="http://www.biduk.org/sites/default/files/BID%20Factsheet%206%20Deportation%20Appeals%20Deportation%20of%20EU%20nationals_pdf%20version_0.pdf">Where did we get this from?</a>
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
            <div class="w-col w-col-4 column-3"></div>
          </div>
        </div>
        <div data-w-tab="Tab 4" class="w-tab-pane w--tab-active">
          <div class="w-row feeling-row-6">
            <div class="w-col w-col-4 column-1">
              <div class="card-15">
                <div class="sticky-footer">
                  <h1 class="card-header-8">What is the current impact of immigration on public services?</h1>
                  <h1 class="headline-fact-long">Mixed. Less likely to use social care and health services. More likely to use education and childcare.</h1><a href="#" data-ix="p12" class="w-button button-13">More info</a>
                  <p data-ix="display-none-on-load" class="p12">The extent to which migrants rely on public services will vary depending on the characteristics of migrants and on the service in question. For example, newly arriving migrants tend to be young adults. Because of their age, they are expected to be less likely to use adult social care and most health services than the UK born. However, they are more likely than the UK born to have young children, and so they are expected to rely more heavily on education and maternity care.</p>
                  <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/election-2015-briefing-impacts-migration-local-public-services">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-15"><img width="50" src="images/angry with word.png" data-ix="anger-selected-15" class="anger-15"><img width="50" src="images/shocked.png" data-ix="shock-selected-15" class="shock-15"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-15" class="indifferent-15"><img width="50" src="images/pleased.png" data-ix="happy-selected-15" class="happy-15"><img width="54" src="images/very happy.png" data-ix="delighted-selected-15" class="delighted-15">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-2">
              <div class="card-16">
                <div class="sticky-footer">
                  <h1 class="card-header-8">What is the current impact of immigration on housing?</h1>
                  <h1 class="headline-fact-long">Migrants mainly rent houses.</h1><a href="#" data-ix="p13" class="w-button button-14">More info</a>
                  <p data-ix="display-none-on-load" class="p13">Evidence suggests that immigration decreases house prices in England and Wales. Estimates suggest that a 1% increase in the migrant share the population in an area reduces house prices by almost 2%. In addition UK-born individuals and foreign-born individuals have similar levels of participation in social housing.</p>
                  <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/migrants-and-housing-uk-experiences-and-impacts">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-16"><img width="50" src="images/angry with word.png" data-ix="anger-selected-16" class="anger-16"><img width="50" src="images/shocked.png" data-ix="shock-selected-16" class="shock-16"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-16" class="indifferent-16"><img width="50" src="images/pleased.png" data-ix="happy-selected-16" class="happy-16"><img width="54" src="images/very happy.png" data-ix="delighted-selected-16" class="delighted-16">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4 column-3">
              <div class="card-17">
                <div class="sticky-footer">
                  <h1 class="card-header-8">What is the impact of immigration on claiming government support?</h1>
                  <h1 class="headline-fact-long">Mixed.</h1><a href="#" data-ix="p14" class="w-button button-16">More info</a>
                  <p data-ix="display-none-on-load" class="p14">The fiscal impact of migration in the UK is small and differs by migrant group (e.g. EEA migrants vs. non-EEA migrants, recent migrants vs. all migrants) In theory, the fiscal effects of immigration largely depend on migrants’ characteristics (skills, age, length of stay), their impacts on the labour market and welfare entitlements</p>
                  <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/fiscal-impact-immigration-uk">Where did we get this from?</a>
                  </div>
                  <div class="fill-empty-space"></div>
                  <div class="emoticon-div">
                    <div class="how-emoticons-work">How does this make you feel?</div>
                    <div class="emoticons-17"><img width="50" src="images/angry with word.png" data-ix="anger-selected-17" class="anger-17"><img width="50" src="images/shocked.png" data-ix="shock-selected-17" class="shock-17"><img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-17" class="indifferent-17"><img width="50" src="images/pleased.png" data-ix="happy-selected-17" class="happy-17"><img width="54" src="images/very happy.png" data-ix="delighted-selected-17" class="delighted-17">
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
      <h1 class="how-to-header topic-result">Here are your <strong class="highlight-word result">results</strong> for Sovereignty &amp; the Law:</h1>
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