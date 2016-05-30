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
<html data-wf-site="56fd24aaaea6500c763220cf" data-wf-page="571a7c75f50e50102a581301">
<head>
  <meta charset="utf-8">
  <title>Trade</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial informati
on on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="Trade">
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
  <script src="js/ServerSubmission.js"></script>
</head>
<body class="body topics">
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
  <div class="w-section hero">
    <div class="w-container hero-container trade">
      <img src="images/trade-01.png" class="hero-image">
      <h1 class="hero-title word">Trade.</h1>
      <h1 class="hero-title">Questions include:</h1>
      <h1 class="hero-title title-2">Who does the UK trade with?<br>How important is the EU to us?<br>Can we negotiate our own trade deals?</h1>
      <a href="#top" class="w-button hero-button">start topic &gt;</a>
      <a href="jobs.php" class="w-button hero-button _2">Skip this topic</a>
    </div>
  </div>
  <div id="top" class="w-section intro-panel">
    <h1 class="grid-header">Overview - What's the story with <strong>Trade:</strong></h1>
    <p class="overview-subtitle">The UK is a maritime nation, coupled with being low in many natural resources, it has depended on trade for centuries as its main form of revenue. The UK joined the EEC in 1973 before it became the EU in a bid to open up new markets for UK trade and help boost the economy. The UK exports globally and being a member of the EU has its drawbacks and advantages for the UK and its trading efforts. Out of all the topics, this one has the largest potential impact (economically at least) on what the UK will look like in the future.</p>
    <div class="learn-how-to-use">How does this work?</div>
    <div class="drop">
      <div class="arrow-instruction">Every time you see this arrow, click it.</div>
      <img width="40" src="images/down arrow.svg" data-ix="drop-how-to" class="down-arrow">
    </div>
    <p data-ix="display-none-on-load" class="overview-dropdown">This is over 500 hrs worth of research condensed into about 5 minutes worth of clear, concise, quality reading. Each question has been researched, scrutinised and then made available to you in one place, all so you can make a more informed decision, faster.</p>
    <div data-ix="display-none-on-load" class="w-row how-to-row">
      <div class="w-col w-col-4 read">
        <h3 class="read-heading">1. Read</h3>
        <img height="100" src="images/immigration icon.png">
        <p class="read-para-1">Have a glance over the tiles below and get an understanding of what is going on with the EU and UK today.</p>
      </div>
      <div class="w-col w-col-4 react">
        <h3 class="react-heading">2. React</h3>
        <img height="100" src="images/happy without word.png">
        <p class="read-para">Use the 5 emojis to react to how you feel about the information you read.</p>
      </div>
      <div class="w-col w-col-4 impact">
        <h3 class="impact-heading">3. Impact</h3>
        <img height="100" src="images/Icon-check.png">
        <p class="read-para">We'll then use some clever computing to give you all the options on the table so you can decide what happens next.</p>
      </div>
    </div>
  </div>
  <div class="w-section tb-slider-section">
    <h1 class="topic-header">Top questions on Trade</h1>
    <div data-animation="slide" data-duration="500" data-infinite="1" class="w-slider tb-slider">
      <div class="w-slider-mask tb-mask">
        <div class="w-slide slide-1">
          <div class="w-container container-tb">
            <div class="key-point-1">
              <h1 class="card-1-header">How much trade does the EU create for us?</h1>
              <p class="card-text">44% of the UKs exports go to the EU. The US is second taking 15% of our exports.</p>
              <a href="#" data-ix="show-overview-1" class="w-button show-overview-1">Click to find out</a>
            </div>
          </div>
        </div>
        <div class="w-slide slide-2">
          <div class="w-container container-tb">
            <div class="key-point-2">
              <h1 class="card-2-header">If we voted to leave the EU who else could we trade with?</h1>
              <p class="card-text">There are a multitude of different options, all with different advantages and disadvantages.</p>
              <a href="#" data-ix="show-overview-2" class="w-button show-overview-2">Click to find out</a>
            </div>
          </div>
        </div>
        <div class="w-slide slide-3">
          <div class="w-container container-tb">
            <div class="key-point-3 too-high">
              <h1 class="why-people-card-header">How long would it take us to create new trade partnerships?</h1>
              <p class="card-text">The UK would have a whole host of options open to it and no one really knows what can and will happen.</p>
              <a href="#" data-ix="show-overview-3" class="w-button show-overview-3">Click to find out</a>
            </div>
          </div>
        </div>
      </div>
      <div data-ix="overview-hide" class="w-slider-arrow-left">
        <div class="w-icon-slider-left left-arrow"></div>
        <div class="next">Next Card</div>
      </div>
      <div data-ix="overview-hide" class="w-slider-arrow-right">
        <div class="w-icon-slider-right right-arrow"></div>
        <div class="next">Next Card</div>
      </div>
      <div class="w-slider-nav w-round slider-1-nav"></div>
    </div>
  </div>
  <div class="w-section argument-section">
    <div data-ix="display-none-on-load" class="w-row argument-row">
      <div class="w-col w-col-4 overview-1">
        <div class="sticky-footer">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">The EU is currently the UKs single largest exporter taking 44% of all UK exports in 2014. There single market , which has over 500 million as part of it, is deemed 'vital' to the UK economy.
            <br>
            <br>UK exports to the EU have declined with 55% of our exports going to the EU in 2008 compared to 44% in 2014, a statistically significant drop. However this is in part due to the world economy growing, increasing the number of exports the UK makes which in turn makes the 'relative' portion of each trade partner smaller.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-19">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-19" class="anger-19">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-19" class="shock-19">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-19" class="indifferent-19">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-19" class="happy-19">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-19" class="delighted-19">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 leave-1">
        <div class="sticky-footer">
          <h1 class="leave-heading">Impact if we leave</h1>
          <p class="basics-paragraph"><span style="font-size: 18px; background-color: rgb(227, 16, 100);"><strong class="impact-answer-leave">Unknown.</strong></span>
            <br>
            <br>The UK would be able to create its own separate trade deals with countries around the world, the EU included. However,there are a multitude of different models on the table, each with advantages and disadvantages. No one knows under which terms trade will be struck so we (leaveorstay) aren't going to speculate under which terms the UK will trade under.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-20">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-20" class="anger-20">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-20" class="shock-20">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-20" class="indifferent-20">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-20" class="happy-20">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-20" class="delighted-20">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 stay-1">
        <div class="sticky-footer">
          <h1 class="stay-heading">Impact if we stay</h1>
          <p class="basics-paragraph"><strong class="impact-answer-stay">Unknown.</strong>&nbsp;
            <br>
            <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China so the UK would be part of that as well.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-21">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-21" class="anger-21">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-21" class="shock-21">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-21" class="indifferent-21">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-21" class="happy-21">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-21" class="delighted-21">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-ix="display-none-on-load" class="w-row argument-row-2">
      <div class="w-col w-col-4 overview-2">
        <div class="sticky-footer">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">The UK would have to work out under which conditions it would have a trading relationship with the &nbsp;remaining 27 other members states. This could range from country to country negotiations (bi-lateral agreements) or via a trading bloc (like Norway has( which could come at a cost. In addition the EU has 51 trade agreements &nbsp;in place with other countries so the UK would also need to address those as well.
            <br>
            <br>
            <br>Being part of the EU has its advantages and disadvantages, especially with trade. The advantage of being part of a larger, 500 million person block, is that the terms of trade are generally better as countries generally want access to the EU due to its sheer size, wealth and purchasing power. The disadvantage however is that the UK must wait for negotiations to please all parties- for example Italian orange producers aren't happy with the current agreement with the China deal which is slowing it down.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-22">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-22" class="anger-22">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-22" class="shock-22">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-22" class="indifferent-22">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-22" class="happy-22">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-22" class="delighted-22">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 leave-2">
        <div class="sticky-footer">
          <h1 class="leave-heading">Impact if we leave</h1>
          <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
            <br>
            <br> The UK economy would most likely suffer a negative impact in the short and medium term (generally considered to be 10 years or less) in the result of a leave vote primarily due to the uncertainty of the trade deal(s) the UK could secure. No country has ever left the EU in its current incarnation before.
            <br>
            <br>The UK is more then capable of securing a deal as it is one of the worlds wealthiest nations but as a trading nation these deals are vital to the economy and jobs so it wont be easy.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-23">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-23" class="anger-23">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-23" class="shock-23">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-23" class="indifferent-23">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-23" class="happy-23">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-23" class="delighted-23">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 stay-2">
        <div class="sticky-footer">
          <h1 class="stay-heading">Impact if we stay</h1>
          <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>&nbsp;
            <br>
            <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China so the UK would be part of that as well.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-24">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-24" class="anger-24">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-24" class="shock-24">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-24" class="indifferent-24">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-24" class="happy-24">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-24" class="delighted-24">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-ix="display-none-on-load" class="w-row argument-row-3">
      <div class="w-col w-col-4 overview-3">
        <div class="sticky-footer">
          <h1 class="overview-heading">Overview&nbsp;</h1>
          <p class="basics-paragraph">This is by far the hardest question to answer in this referendum debate. Why? No one has a clue how it would work because it has never happened before.
            <br>
            <br>On the one hand the UK could enter a relationship similar to that of Norway which has access to the single market but at the cost of the EU influencing some of its laws (without it being represented at the EU) and charging a membership fee.
            <br>
            <br>Or the UK could trade through the &nbsp;World Trade Organisation and &nbsp;work towards securing deals through that forum although tariffs are likely so costs of goods and services could go up.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-25">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-25" class="anger-25">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-25" class="shock-25">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-25" class="indifferent-25">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-25" class="happy-25">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-25" class="delighted-25">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 leave-3">
        <div class="sticky-footer">
          <h1 class="leave-heading">Impact if we leave</h1>
          <p class="basics-paragraph"><strong class="impact-answer-leave">Unknown.</strong>
            <br>
            <br>There really is no answer to this. We will be listing the different models of exit as soon as we can.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-26">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-26" class="anger-26">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-26" class="shock-26">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-26" class="indifferent-26">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-26" class="happy-26">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-26" class="delighted-26">
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 stay-3">
        <div class="sticky-footer">
          <h1 class="stay-heading">Impact if we stay</h1>
          <p class="basics-paragraph"><strong class="impact-answer-stay">Minimal.</strong>
            <br>
            <br>The UK will continue to trade with the EU and benefit from access to the single market. The EU is currently negotiating a series of trade agreements with countries like the US (known as TTIP) and China.</p>
          <div class="fill-empty-space"></div>
          <div class="emoticon-div">
            <div class="how-emoticons-work">How does this make you feel?</div>
            <div class="emoticons-27">
              <img width="50" src="images/angry with word.png" data-ix="anger-selected-27" class="anger-27">
              <img width="50" src="images/surprised with word.png" data-ix="shock-selected-27" class="shock-27">
              <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-27" class="indifferent-27">
              <img width="50" src="images/happy with word.png" data-ix="happy-selected-27" class="happy-27">
              <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-27" class="delighted-27">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="Section-1" class="w-section section-1">
    <h1 class="blue-section-header">Here are the most popular Google searches on this topic answered, right here:</h1>
    <h4 class="how-to-use-the-grid-header">What the UK offers the EU with trade</h4>
    <img width="25" src="images/down arrow.svg" data-ix="first-column-set-showhide" class="drop-down-topics">
    <div data-ix="display-none-on-load" class="w-row first-column-set">
      <div class="w-col w-col-5 column-1">
        <div class="card-1">
          <div class="sticky-footer">
            <h3 class="card-header-1">How much do we export to the EU?</h3>
            <h1 class="headline-fact">44%</h1>
            <h1 class="headline-small">of our total exports go the EU</h1>
            <a href="#" data-ix="p1" class="w-button button-1">More info</a>
            <p data-ix="display-none-on-load" class="p1">The EU is by far the UKs single trading partner (the next biggest is the US at 17%) accounting for over £229 billion in exports in 2015 alone. However the level of exports to the EU is falling, down 6% from 2008 when the EU accounted for just over 50% of all UK exports.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/economy/do-half-uks-exports-go-europe/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected" class="anger">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected" class="shock">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected" class="indifferent">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected" class="happy">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected" class="delighted">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-2">
<!--        <div class="card-2">
          <div class="sticky-footer">
            <h3 class="card-header-2">How much do we trade with countries outside the EU?</h3>
            <h1 class="headline-fact"></h1>
            <h1 class="headline-small">Pie chart (EU 44%, BRICS 8%, USA 17%, Other 30%)</h1>
            <a href="#" data-ix="p2" class="w-button button-2">Show in&nbsp;context</a>
            <p data-ix="display-none-on-load" class="p2">In 2014, British companies sold around £515 billion worth of goods and services to foreign buyers, according to the Office for National Statistics. While the EU remains our largest market by some margin, over time we’re selling less to the EU and more to other economies as a proportion of total trade</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/ask-full-fact-uks-trade-eu/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-2">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-2" class="anger-2">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-2" class="shock-2">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-2" class="indifferent-2">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-2" class="happy-2">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-2" class="delighted-2">
              </div>
            </div>
          </div>
        </div> -->
        <div class="card-3">
          <div class="sticky-footer">
            <h1 class="card-heading-3">What are our main trade sectors with the EU?</h1>
            <h1 class="headline-fact">2.1</h1>
            <h1 class="headline-small">Pie chart of top 5 imports/exports</h1>
            <a href="#" data-ix="p3" class="w-button button-3">More info</a>
            <p data-ix="display-none-on-load" class="p3">https://www.uktradeinfo.com/Statistics/OverseasTradeStatistics/Pages/Commodities.aspx</p>
            <div class="evidence"><a target="_blank" href="https://www.uktradeinfo.com/Statistics/OverseasTradeStatistics/Pages/Commodities.aspx">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-3">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-3" class="anger-3">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-3" class="shock-3">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-3" class="indifferent-3">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-3" class="happy-3">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-3" class="delighted-3">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-3 column-3">
        <div class="card-4">
          <div class="sticky-footer">
         <h1 class="card-heading-4">Who are our top trading partners (by country)?</h1>
         <!--   <h1 class="headline-small">       <br>https://www.uktradeinfo.com/Statistics/Pages/Monthly-Tables.aspx</h1>-->
            <a href="#" data-ix="p4" class="w-button button-4">More info</a>
            <p data-ix="display-none-on-load" class="p4">The UK exports to countries both within and outside of the EU. The US, Germany and China are the three largest growing trade partners the UK has and there is little evidence to show that the EU is slowing down these trade arrangements.</p>
            <div class="evidence"><a target="_blank" href="https://www.uktradeinfo.com/Statistics/OverseasTradeStatistics/Pages/Commodities.aspx">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-4">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-4" class="anger-4">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-4" class="shock-4">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-4" class="indifferent-4">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-4" class="happy-4">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-4" class="delighted-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-ix="display-none-on-load" class="w-row second-column-set">
      <div class="w-col w-col-5 cc1">
        <div class="card-5">
          <div class="sticky-footer">
            <h1 class="card-header-5">Would leaving the EU negatively effect trade?</h1>
            <h1 class="headline-fact">Yes</h1>
            <h1 class="headline-small">but for how long no one knows</h1>
            <a href="#" data-ix="p5" class="w-button button-5">More info</a>
            <p data-ix="display-none-on-load" class="p5">The UK is part of a series of trade deals with the EU and re negotiating these will naturally take time. The extent of which this time will take is an unknown as no country has ever left the EU before in its current format. The UK will need to work on trade agreements with current EU countries (28 countries in total) as well as an additional 51 bi lateral trade agreements that the EU currently has with countries around the world. There is a whole debate around this question which we will be exploring shortly here.</p>
            <div class="evidence"><a href-disabled="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk" href-disabled-default-color="" href-disabled-underline="" href="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk" target="_blank">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-5">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-5" class="anger-5">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-5" class="shock-5">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-5" class="indifferent-5">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-5" class="happy-5">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-5" class="delighted-5">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 cc2">
        <div class="card-6">
          <div class="sticky-footer">
            <h1 class="card-header-6">What are the options for trading outside the EU?</h1>
            <h1 class="headline-fact">3</h1>
            <h1 class="headline-small">main options</h1>
            <a href="#" data-ix="p6" class="w-button button-6">Show context</a>
            <p data-ix="display-none-on-load" class="p6">If the UK decides to leave the EU there will be a period of renegotiation with all sorts of different agendas that could take years. Voting to leave will mean that the UK has to find a new structure to trade within or enter into an existing one, which will have a cost either financially or otherwise. The most popular quoted options are a World Trade Organisation Style, a Norwegian Style and a Canadian Style. Each of these has pros and cons which we will discuss shortly.</p>
            <div class="evidence"><a href-disabled="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk" href-disabled-default-color="" href-disabled-underline="" href="http://www.migrationwatchuk.org/what-is-the-problem" target="_blank">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-6">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-6" class="anger-6">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-6" class="shock-6">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-6" class="indifferent-6">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-6" class="happy-6">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-6" class="delighted-6">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-3 cc3"></div>
    </div>
    <a href="#top" data-ix="display-none-on-load" class="w-button back-to-top">Back To Top</a>
  </div>
  <div id="Section-2" class="w-section section-2">
    <h4 class="how-to-use-the-grid-header">What the EU offers the UK with trade</h4>
    <img width="25" src="images/down arrow.svg" data-ix="drop-down-section-3" class="drop-down-topics">
    <div data-ix="display-none-on-load" class="w-row third-column-set">
      <div class="w-col w-col-5 column-7">
        <div class="card-7">
          <div class="sticky-footer">
            <h1 class="card-heading-7">Who do EU countries trade with?</h1>
            <h1 class="headline-small">    </h1>
            <a href="#" data-ix="p7" class="w-button button-7">More info</a>
            <p data-ix="display-none-on-load" class="p7">EU countries trade with other EU countries more then they trade with any other country in the world. This pie chart shows the UK as if it were outside the EU and how the UK fairs compared to other EU countries in terms of total goods exported. Understanding the value of services traded is incredibly hard but we're working on that.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/where-does-eu-export/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-7">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-7" class="anger-7">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-7" class="shock-7">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-7" class="indifferent-7">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-7" class="happy-7">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-7" class="delighted-7">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-8">
        <div class="card-8">
          <div class="sticky-footer">
            <h1 class="card-header-8">Is the UK the EU's single largest export market?</h1>
            <h1 class="headline-fact large-text">Yes</h1>
            <h1 class="headline-small">if you were to treat the UK as if it were outside the EU</h1>
            <a href="#" data-ix="p8" class="w-button button-8">More info</a>
            <p data-ix="display-none-on-load" class="p8">This also assumes exports to the UK would be the same if we weren’t an EU member which is riddled with complications due to the trade deals that need to be in place to ensure that this continues.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/where-does-eu-export/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-8">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-8" class="anger-8">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-8" class="shock-8">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-8" class="indifferent-8">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-8" class="happy-8">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-8" class="delighted-8">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-3 column-9">
        <div class="card-9">
          <div class="sticky-footer test">
            <h1 class="card-header-8">Who is the single largest country that the EU trades with?</h1>
            <h1 class="headline-fact">USA</h1>
            <h1 class="headline-small">(making up 15% of all EU goods exports)</h1>
            <a href="#" data-ix="p9" class="w-button button-9">More info</a>
            <p data-ix="display-none-on-load" class="p9">With the US making up over 15% of all goods exported outside of the EU, there are plans (known as TTIP) to greater amplify the trading agreement between the US and EU. This is a hotly contested subject and will be covered in more detail later on.</p>
            <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/where-does-eu-export/">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-9">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-9" class="anger-9">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-9" class="shock-9">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-9" class="indifferent-9">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-9" class="happy-9">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-9" class="delighted-9">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="#top" data-ix="display-none-on-load" class="w-button back-to-top-2">Back To Top</a>
  </div>
  <div id="Section-3" class="w-section section-3">
    <h4 class="how-to-use-the-grid-header">Who does the UK trade with?</h4>
    <img width="25" src="images/down arrow.svg" data-ix="drop-down-section-4" class="drop-down-topics">
    <div data-ix="display-none-on-load" class="w-row fourth-column-set">
      <div class="w-col w-col-5 column-10">
        <div class="card-11">
          <div class="sticky-footer">
            <h1 class="card-header-8">Do EU countries need us more then we need them (in terms of trade)?</h1>
            <h1 class="headline-fact large-text">Yes</h1>
            <h1 class="headline-small">apart from 3 countries</h1>
            <a href="#" data-ix="p10" class="w-button button-11">More info</a>
            <div class="fill-empty-space">
              <p data-ix="display-none-on-load" class="p10">Every country in the EU, bar 3 (Ireland, Luxembourg, and Malta), has a trade surplus with the UK in 2015. This means that they sell to us more then they buy from us and as a result we are more valuable to them as trading partner then they are to us.</p>
              <div class="evidence"><a target="_blank" href="https://fullfact.org/europe/where-does-eu-export/">Where did we get this from?</a>
              </div>
            </div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-11">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-11" class="anger-11">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-11" class="shock-11">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-11" class="indifferent-11">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-11" class="happy-11">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-11" class="delighted-11">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 column-11">
        <div class="card-13">
          <div class="sticky-footer">
            <h1 class="card-header-8">Does the EU trade with China?</h1>
            <h1 class="headline-fact">Yes</h1>
            <h1 class="headline-small">via the EU - China Trade deal</h1>
            <a href="#" data-ix="p10" class="w-button button-11">More info</a>
            <p data-ix="display-none-on-load" class="p11">The European Union and China are two of the biggest traders in the world. China is now the EU's 2nd trading partner behind the United States and the EU is China's biggest trading partner.</p>
            <div class="evidence"><a target="_blank" href="http://ec.europa.eu/trade/policy/countries-and-regions/countries/china/index_en.htm">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-13">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-13" class="anger-13">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-13" class="shock-13">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-13" class="indifferent-13">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-13" class="happy-13">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-13" class="delighted-13">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-3 column-12">
        <div class="card-14">
          <div class="sticky-footer">
            <h1 class="card-header-8">How much investment into the UK comes from the EU?</h1>
            <h1 class="headline-fact large-text">46%</h1>
            <h1 class="headline-small">of foreign direct investment comes from the EU</h1>
            <a href="#" data-ix="p11" class="w-button button-12">More info</a>
            <p data-ix="display-none-on-load" class="p12">The EU is still by far the largest source for foreign direct investment into the UK. This investment is spent on everything from building factories to starting businesses. It's important to note however that investment from the EU has fallen by 7% since 2008, potentially showing a change in where the UK sources its investment from.</p>
            <div class="evidence"><a target="_blank" href="http://www.ey.com/UK/en/Issues/Business-environment/2015-UK-attractiveness-survey">Where did we get this from?</a>
            </div>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-14">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-14" class="anger-14">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-14" class="shock-14">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-14" class="indifferent-14">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-14" class="happy-14">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-14" class="delighted-14">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="#top" data-ix="display-none-on-load" class="w-button back-to-top-3">Back To Top</a>
  </div>
  <div class="w-section got-the-basics topics">
    <h1 class="basics-link">Thats Trade done for now</h1>
    <p class="lets-get-started-pap">You've now done all that you'd like to for the topic of Trade, up next we'll be moving onto Jobs.
      <br>
      <br>Remember you dont have to react to every card, feel free to pick and choose what topics and cards you look at.</p>
    <a href="jobs.php" class="w-button continue-button">Next topic &gt;</a>
    <a href="endresults.php" class="w-button continue-button">Finished?</a>
  </div>

  <!-- footer -->

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