<?php
session_start();
require_once('anonymous.php');
require_once('js/functions.php');
?>

<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri May 13 2016 15:40:16 GMT+0000 (UTC) -->
<html data-wf-site="572762c72f3e6fea5d0339d6" data-wf-page="573525caf995cf30552bed99">
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial information on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="Jobs">
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
  $category = 4;

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
  <link rel="shortcut icon" type="image/x-icon" href="images/Favicon.png">
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
          <div class="what-page">\Jobs</div>
          <nav role="navigation" class="w-nav-menu w-clearfix">
            <div class="emot-nav"><img width="30" src="images/defence-01.png"><img width="30" src="images/trade-01.png"><img width="30" src="images/jobs-01.png"><img width="30" src="images/immi-01.png">
            </div>
          </nav>
          <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
      <div class="w-container hero-container immigration"><img src="images/jobs-01.png" class="hero-image">
        <h1 class="hero-title word">jobs&nbsp;</h1>
        <h1 class="hero-title">Questions covered include:</h1>
        <h1 class="hero-title title-2">Would leaving result in job losses?<br>What happens to UK citizens working abroad?<br>Would wages go up if we left?</h1>
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
      <p class="overview-subtitle">The UK has one of the most fluid job economies in the world. On average, in a given year, 3.5 million jobs are lost and 4 million new jobs are created. It's highly dependant on services (think banks, insurers) to form the backbone of the economy (that's why "Big Business" always has such a big say) and has a declining goods and manufacturing sector. This topic looks at the risks and benefits of leaving the EU and what it could mean for you, your family and this country.
        <br>
        <br><strong class="overview-text-link-phrase">Below are the 3&nbsp;main&nbsp;headline stats you'll need to know. Keep scrolling to continue.</strong>
      </p>
    </div>
    <div class="w-row overview-row">
      <div class="w-col w-col-4 column-1">
        <div class="overview-card-1">
          <div class="sticky-footer">
            <h3 class="card-header-1">How big is the UK economy?</h3>
            <h1 class="headline-fact">5th largest</h1>
            <h1 class="headline-fact-subtitle">in the world.</h1>
            <p class="p1">The UK is the fifth largest economy in the world behind the United States, China, Japan and Germany. The UK is also the EUs second largest economy behind Germany.</p>
            <div class="evidence"><a target="_blank" href="http://knoema.com/nwnfkne/world-gdp-ranking-2015-data-and-charts">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-2">
        <div class="overview-card-2">
          <div class="sticky-footer">
            <h3 class="card-header-2">How much is it (the UK economy) worth?</h3>
            <h1 class="headline-fact">£1.988 trillion</h1>
            <h1 class="headline-fact-subtitle">as of December 2015</h1>
            <div class="evidence"><a target="_blank" href="http://www.imf.org/external/pubs/ft/weo/2016/01/weodata/weorept.aspx?sy=2014&amp;ey=2021&amp;scsm=1&amp;ssd=1&amp;sort=country&amp;ds=.&amp;br=1&amp;c=112&amp;s=NGDP_R%2CNGDP_RPCH%2CNGDP%2CNGDPD%2CNGDP_D%2CNGDPRPC%2CNGDPPC%2CNGDPDPC%2CNGAP_NPGDP%2CPPPGDP%2CPPPPC%2CPPPSH%2CPPPEX&amp;grp=0&amp;a=&amp;pr.x=91&amp;pr.y=9">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-3">
        <div class="overview-card-3">
          <div class="sticky-footer">
            <h1 class="card-heading-3">How many working aged people live in the UK?</h1>
            <h1 class="headline-fact">31.42 million</h1>
            <div class="evidence"><a target="_blank" href="https://www.nomisweb.co.uk/reports/lmp/gor/2092957698/report.aspx">Where did we get this from?</a>
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
        <h1 class="card-1-header">&nbsp;What would be the impact of a leave vote on jobs?</h1>
        <p class="card-text">The UK currently has between 3 and 4 million jobs linked with trade and exports.</p>
      </div>
      <div class="think-background-div">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Politicians regularly claim that 3-4 million jobs either ‘depend on’ or are ‘associated with’ our membership of the European Union (EU). This is calculated as the number of jobs linked – both directly and indirectly – to exports from the UK to customers and businesses in other EU countries.
            <br>
            <br>It is further suggested that the UK leaving the EU would put 3-4 million jobs ‘at risk’. Yet these jobs are associated with trade, not membership of the EU. There is no evidence to suggest that trade would substantially reduce between British businesses and European consumers, even if the UK was outside the EU.</p>
        </div>
      </div>
      <div class="w-row argument-row">
        <div class="w-col w-col-6 overview-1">
          <div class="think-background stay">
            <div class="sticky-footer">
              <h1 class="stay-heading">Impact if we stay</h1>
              <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>&nbsp;
                <br>
                <br>Ultimately, whether EU membership is a net positive or negative for jobs and prosperity in the UK depends on what policies the UK pursues outside of the EU (in relation to employment regulation, welfare and tax).</p>
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
                <br>The worst case scenario would be a failure to negotiate a free trade deal in the result of leave vote. If this were the case, both parties would be bound by the World Trade Organization’s ‘most favoured nation’ (MFN) tariffs paid by other developed countries. This would prevent the imposition of punitive tariffs by the EU following the UK’s exit, meaning job losses would not be significant.</p>
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
        <h1 class="card-2-header">How responsive is the UK jobs market ?</h1>
        <p class="card-text">Whether the UK votes to remain in or leave the EU, its worth looking at how responsive the UK job market is to both changes caused by 'leave' and by 'stay'.</p>
      </div>
      <div class="think-background-div-2">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Research has shown that, in the period prior to the recession in 2008, jobs in the UK labour market were created a rate of 4 million per year and were lost a rate of 3.7 million, with average annual net job creation of 300,000.
            <br>
            <br>This shows that the UK labour market adapts extraordinarily quickly to changed circumstances with a substantial churn of jobs every year. Indeed, the rate of new job creation has been extremely rapid in the UK post-recession. Taking the whole period 2004-2011, the UK economy created 3-4 million jobs a year.</p>
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
                  <br>Very little would happen day to day that is noticeable. Businesses would continue to trade with the EU and jobs and businesses would come and go as the world economy changes. The only major impact that we can see are changes made to UK law which adversely effects business (e.g. change in VAT, minimum wage increase etc.)</p>
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
                  <br> Though negotiating with the European Union could lead to some changes in the composition of jobs in the UK economy, the maximum overall disruption over a number of years, under extreme and completely unrealistic assumptions, would be significantly less than the annual churn we tend to see in the jobs market anyway.</p>
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
        <h1 class="why-people-card-header">Would EU migrants working in the UK be asked to leave?</h1>
        <p class="card-text">This would also theoretically apply to UK migrants working in other EU countries as well.</p>
      </div>
      <div class="think-background-div-3">
        <div class="slider-overview">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">Is it likely that migrants currently living and working legally in another EU country would be asked to leave? &nbsp;Almost certainly not. First, there are numerous political reasons for members not to do such a thing, including the treatment of their own, numerous, nationals living in other parts of the EU. Mass expulsions of citizens from another developed economy would also startle foreign investors and potentially cause economic turmoil in the UK.
            <br>
            <br>It is important to note that as part of the EU, countries must treat citizens of other EU nationals living in their country as if they are their own. For example if a Brit retired in Spain, the Spanish government would pay for their pension, &nbsp;healthcare (via EHIC) and access to public transport etc.</p>
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
                  <br>Life will continue for EU nationals living and working in other EU countries.</p>
                <div class="fill-empty-space"></div>
              </div>
            </div>
          </div>
          <div class="w-col w-col-6 leave-3">
            <div class="think-background leave">
              <div class="sticky-footer">
                <h1 class="leave-heading">Impact if we leave</h1>
                <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
                  <br>
                  <br>Those currently resident in another EU country would be protected by the Vienna Convention of 1969 which says that termination of a treaty "does not affect any right, obligation or legal situation of the parties created through the execution of the treaty prior to its termination.” The House of Commons Library says that "withdrawing from a treaty releases the parties from any future obligations to each other, but does not affect any rights or obligations acquired under it before withdrawal."
                  <br>
                  <br>So if you currently live/work in another EU country then you're fine IF you lived there before a vote to leave. However, depending on negotiations, UK nationals living abroad could loose the right to be treated as a national citizen and be subject to non-EU country law in their country of residence. Beyond that it's unclear but its highly unlikely to be too negative.</p>
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
        <a data-w-tab="Tab 1" class="w-tab-link w--current w-inline-block tab-link selected">
          <div class="button-text">Most searched</div>
        </a>
        <a data-w-tab="Tab 2" class="w-tab-link w-inline-block tab-link selected">
          <div class="button-text">The UK, EU and jobs today</div>
        </a>
      </div>
      <div class="w-tab-content">
        <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
          <div class="w-row feeling-row-2">
            <div class="w-col w-col-4 column-1">
              <div class="card-4">
                <div class="sticky-footer test">
                  <h1 class="card-header-8">What percentage of the UK working population is employed?</h1>
                  <h1 class="headline-fact">74.10%</h1><a href="#" data-ix="p9" class="w-button button-9">More info</a>
                  <p data-ix="display-none-on-load" class="p9">The employment rate (the proportion of people aged from 16 to 64 who were in work) was 74.1%, the joint highest since comparable records began in 1971.
                    <br>
                    <br>There were 31.41 million people in work, 20,000 more than for September to November 2015 and 360,000 more than for a year earlier.
                    <br>
                    <br>There were 22.98 million people working full-time, 289,000 more than for a year earlier. There were 8.43 million people working part-time, 71,000 more than for a year earlier.</p>
                  <div class="evidence"><a target="_blank" href="https://www.ons.gov.uk/employmentandlabourmarket/peopleinwork/employmentandemployeetypes/bulletins/uklabourmarket/latest">Where did we get this from?</a>
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
                  <h1 class="card-header-5">How many people are unemployed in the UK?</h1>
                  <h1 class="headline-fact">1.68 million</h1><a href="#" data-ix="p5" class="w-button button-5">More info</a>
                  <p data-ix="display-none-on-load" class="p5">There were 1.70 million unemployed people (people not in work but seeking and available to work), 21,000 more than for September to November 2015 but 142,000 fewer than for a year earlier. The unemployment rate was 5.1%, lower than for a year earlier (5.6%). The unemployment rate is the proportion of the labour force (those in work plus those unemployed) that were unemployed.</p>
                  <div class="evidence"><a target="_blank" href="https://www.ons.gov.uk/employmentandlabourmarket/peopleinwork/employmentandemployeetypes/bulletins/uklabourmarket/latest">Where did we get this from?</a>
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
                  <h1 class="card-header-6">What percentage of migrants of working age are employed?</h1>
                  <h1 class="headline-fact-long">69.9%</h1><a href="#" data-ix="p6" class="w-button button-6">Show context</a>
                  <p data-ix="display-none-on-load" class="p6">In the first quarter of 2015, 69.9% of non-UK born working-age migrants were in some kind of employment, compared with 74% of the UK-born. However, this represents a considerable increase from historically low levels of employment among migrants.</p>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/are-there-600000-unemployed-eu-migrants-uk/">Where did we get this from?</a>
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
                  <h1 class="card-header-8">What is the impact of immigration on wages?</h1>
                  <h1 class="headline-fact-long">Mixed- depends how much you earn.</h1><a href="#" data-ix="p8" class="w-button button-8">More info</a>
                  <h1 class="p8">UK research suggests that immigration has a small impact on average wages of existing workers but more significant effects for certain groups: low-wage workers lose while medium and high-paid workers gain.The wage effects of immigration are likely to be greatest for resident workers who are migrants themselves.</h1>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/immigration/immigration-and-jobs-labour-market-effects-immigration/">Where did we get this from?</a>
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
                  <h1 class="card-header-8">Do immigrants "take" jobs away from UK nationals?</h1>
                  <h1 class="headline-fact-long">Not really.</h1><a href="#" data-ix="p10" class="w-button button-9">More info</a>
                  <h1 class="p10">Research does not find a significant impact of overall immigration on unemployment in the UK, but the evidence suggests that immigration from outside the EU could have a negative impact on the employment of UK-born workers, especially during an economic downturn.The impacts of immigration on the labour market depend on the skills of migrants, the skills of existing workers, and the characteristics of the host economy. This means that research evidence on the labour market effects of immigration is always specific to time and place.</h1>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/immigration/immigration-and-jobs-labour-market-effects-immigration/">Where did we get this from?</a>
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
                  <h1 class="card-header-8">Is immigration to the UK good or bad for jobs and wages?</h1>
                  <h1 class="headline-fact-long">Good.</h1><a href="#" data-ix="p11" class="w-button button-11">More info</a>
                  <h1 class="p11">For both wages and employment, short run effects of immigration differ from long run effects: any declines in the wages and employment of UK-born workers in the short run can be offset by rising wages and employment in the long run.</h1>
                  <div class="evidence"><a target="_blank" href="https://fullfact.org/immigration/immigration-and-jobs-labour-market-effects-immigration/">Where did we get this from?</a>
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
      </div>
    </div>
  </div>
  <div class="w-section results">
    <div class="w-container">
      <h1 class="next-button">Great!</h1>
      <h1 class="how-to-header topic-result">Here are your <strong class="highlight-word result">results</strong> for Jobs:</h1>
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
