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
<html data-wf-site="56fd24aaaea6500c763220cf" data-wf-page="571a7c579c54bf303f312764">
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <meta name="description" content="Should we leave or stay in the EU.  We provide accurate, impartial informati
on on the referendum so that you can cast an informed vote.">
  <meta property="og:title" content="Jobs">
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
    <div class="w-container hero-container jobs">
      <img src="images/jobs-01.png" class="hero-image">
      <h1 class="hero-title word">jobs.</h1>
      <h1 class="hero-title">Questions include:</h1>
      <h1 class="hero-title title-2">Would leaving result in job losses?<br>What happens to UK citizens working abroad?<br>Would wages go up if we left?</h1>
      <a href="#top" class="w-button hero-button">Start topic&nbsp;&gt;</a>
      <a href="defence.php" class="w-button hero-button _2">Skip this topic</a>
    </div>
  </div>
  <div id="top" class="w-section intro-panel">
    <h1 class="grid-header">Overview - What's the story with <strong>Jobs:</strong></h1>
    <p class="overview-subtitle">The UK has one of the most fluid job economies in the world. On average, in a given year, 3.5 million jobs are lost and 4 million new jobs are created. It's highly dependant on services (think banks, insurers) to form the backbone of the economy (that's why "Big Business" always has such a big say) and has a declining goods and manufacturing sector. This topic looks at the risks and benefits of leaving the EU and what it could mean for you, your family and this country.</p>
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
    <h1 class="topic-header">Top questions on Jobs</h1>
    <div data-animation="slide" data-duration="500" data-infinite="1" class="w-slider tb-slider">
      <div class="w-slider-mask tb-mask">
        <div class="w-slide slide-1">
          <div class="w-container container-tb">
            <div class="key-point-1">
              <h1 class="card-1-header">What would be the impact of a leave vote on jobs?</h1>
              <p class="card-text">The UK currenty has between 3 and 4 million jobs linked with trade and exports.</p>
              <a href="#" data-ix="show-overview-1" class="w-button show-overview-1">Click to find out</a>
            </div>
          </div>
        </div>
        <div class="w-slide slide-2">
          <div class="w-container container-tb">
            <div class="key-point-2">
              <h1 class="card-2-header">How responsive is the UK jobs market ?</h1>
              <p class="card-text">Whether the UK votes to remain in or leave the EU, its worth looking at how responsive the UK job market is to both changes caused by 'leave' and by 'stay'.</p>
              <a href="#" data-ix="show-overview-2" class="w-button show-overview-2">Click to find out</a>
            </div>
          </div>
        </div>
        <div class="w-slide slide-3">
          <div class="w-container container-tb">
            <div class="key-point-3 too-high">
              <h1 class="why-people-card-header">Would EU migrants working in the UK be asked to leave?</h1>
              <p class="card-text">This would also theoretically apply to UK migrants working in other EU countries as well.</p>
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
          <p class="basics-paragraph">Politicians regularly claim that 3-4 million jobs either ‘depend on’ or are ‘associated with’ our membership of the European Union (EU). This is calculated as the number of jobs linked – both directly and indirectly – to exports from the UK to customers and businesses in other EU countries.
            <br>
            <br>It is further suggested that the UK leaving the EU would put 3-4 million jobs ‘at risk’. Yet these jobs are associated with trade, not membership of the EU. There is no evidence to suggest that trade would substantially reduce between British businesses and European consumers, even if the UK was outside the EU.</p>
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
          <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
            <br>
            <br>The worst case scenario would be a failure to negotiate a free trade deal in the result of leave vote. If this were the case, both parties would be bound by the World Trade Organization’s ‘most favoured nation’ (MFN) tariffs paid by other developed countries. This would prevent the imposition of punitive tariffs by the EU following the UK’s exit, meaning job losses would not be significant.</p>
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
          <p class="basics-paragraph"><span style="font-size: 18px; background-color: rgb(38, 172, 199);"><strong class="impact-answer-stay">Minimal.</strong></span>
            <br>
            <br>Ultimately, whether EU membership is a net positive or negative for jobs and prosperity in the UK depends on what policies the UK pursues outside of the EU (in relation to employment regulation, welfare and tax).
          </p>
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
          <p class="basics-paragraph">Research has shown that, in the period prior to the recession in 2008, jobs in the UK labour market were created a rate of 4 million per year and were lost a rate of 3.7 million, with average annual net job creation of 300,000.
            <br>
            <br>This shows that the UK labour market adapts extraordinarily quickly to changed circumstances with a substantial churn of jobs every year. Indeed, the rate of new job creation has been extremely rapid in the UK post-recession. Taking the whole period 2004-2011, the UK economy created 3-4 million jobs a year.</p>
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
            <br> Though negotiating with the European Union could lead to some changes in the composition of jobs in the UK economy, the maximum overall disruption over a number of years, under extreme and completely unrealistic assumptions, would be significantly less than the annual churn we tend to see in the jobs market anyway.</p>
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
            <br>Very little would happen day to day that is noticeable. Businesses would continue to trade with the EU and jobs and businesses would come and go as the world economy changes. The only major impact that we can see are changes made to UK law which adversely effects business (e.g. change in VAT, minimum wage increase etc.)</p>
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
          <p class="basics-paragraph">Is it likely that migrants currently living and working legally in another EU country would be asked to leave? &nbsp;Almost certainly not. First, there are numerous political reasons for members not to do such a thing, including the treatment of their own, numerous, nationals living in other parts of the EU. Mass expulsions of citizens from another developed economy would also startle foreign investors and potentially cause economic turmoil in the UK.
            <br>
            <br>It is important to note that as part of the EU, countries must treat citizens of other EU nationals living in their country as if they are their own. For example if a Brit retired in Spain, the Spanish government would pay for their pension, &nbsp;healthcare (via EHIC) and access to public transport etc.</p>
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
          <p class="basics-paragraph"><strong class="impact-answer-leave">Moderate.</strong>
            <br>
            <br>Those currently resident in another EU country would be protected by the Vienna Convention of 1969 which says that termination of a treaty "does not affect any right, obligation or legal situation of the parties created through the execution of the treaty prior to its termination.” The House of Commons Library says that "withdrawing from a treaty releases the parties from any future obligations to each other, but does not affect any rights or obligations acquired under it before withdrawal."
            <br>
            <br>So if you currently live/work in another EU country then you're fine IF you lived there before a vote to leave. However, depending on negotiations, UK nationals living abroad could loose the right to be treated as a national citizen and be subject to non-EU country law in their country of residence. Beyond that it's unclear but its highly unlikely to be too negative.</p>
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
          <p class="basics-paragraph"><strong class="impact-answer-stay">None.</strong>
            <br>
            <br>&nbsp;Life will continue for EU nationals living and working in other EU countries.</p>
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
    <h4 class="how-to-use-the-grid-header">Headline information</h4>
    <img width="25" src="images/down arrow.svg" data-ix="first-column-set-showhide" class="drop-down-topics">
    <div data-ix="display-none-on-load" class="w-row first-column-set">
      <div class="w-col w-col-5 column-1">
        <div class="card-1">
          <div class="sticky-footer">
            <h3 class="card-header-1">How big is the UK economy?</h3>
            <h1 class="headline-fact">5th largest</h1>
            <h1 class="headline-small">in the world (as of Dec 2015)</h1>
            <a href="#" data-ix="p1" class="w-button button-1">More info</a>
            <p data-ix="display-none-on-load" class="p1">The UK is the fifth largest economy in the world behind The United States, China, Japan and Germany. The UK is also the EUs second largest economy behind Germany.</p>
            <div class="evidence"><a target="_blank" href="http://knoema.com/nwnfkne/world-gdp-ranking-2015-data-and-charts">Where did we get this from?</a>
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
        <div class="card-2">
          <div class="sticky-footer">
            <h3 class="card-header-2">How much is it (the UK economy) worth?</h3>
            <h1 class="headline-fact">£1.988 trillion</h1>
            <h1 class="headline-small">as of December 2015</h1>
            <div class="evidence"><a target="_blank" href="http://www.imf.org/external/pubs/ft/weo/2016/01/weodata/weorept.aspx?sy=2014&amp;ey=2021&amp;scsm=1&amp;ssd=1&amp;sort=country&amp;ds=.&amp;br=1&amp;c=112&amp;s=NGDP_R%2CNGDP_RPCH%2CNGDP%2CNGDPD%2CNGDP_D%2CNGDPRPC%2CNGDPPC%2CNGDPDPC%2CNGAP_NPGDP%2CPPPGDP%2CPPPPC%2CPPPSH%2CPPPEX&amp;grp=0&amp;a=&amp;pr.x=91&amp;pr.y=9">Where did we get this from?</a>
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
        </div>
        <div class="card-3">
          <div class="sticky-footer">
            <h1 class="card-heading-3">How is it made up?</h1>
            <h1 class="headline-fact">    </h1>
            <h1 class="headline-fact-subtitle">    </h1>
            <a href="#" data-ix="p3" class="w-button button-3">More info</a>
            <p data-ix="display-none-on-load" class="p3">There is a general increasing trend in the number of EU born in the UK labour market over time, reaching its peak in the first quarter of 2015 with about 1.9 million EU workers. The upward trend is primarily attributed to increases in the number of accession workers over time</p>
            <div class="evidence"><a target="_blank" href="http://www.migrationobservatory.ox.ac.uk/briefings/migration-flows-a8-and-other-eu-migrants-and-uk">Where did we get this from?</a>
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
            <h1 class="card-heading-4">How many working aged people live in the UK?</h1>
            <h1 class="headline-fact">31.42 million</h1>
            <a href="#" data-ix="p4" class="w-button button-4">More info</a>
            <p data-ix="display-none-on-load" class="p4">Data needed!</p>
            <div class="evidence"><a target="_blank" href="https://www.nomisweb.co.uk/reports/lmp/gor/2092957698/report.aspx">Where did we get this from?</a>
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
            <h1 class="card-header-5">What percentage of the UK working population is employed?</h1>
            <h1 class="headline-fact">74.10%</h1>
            <h1 class="headline-small">a record high for the UK</h1>
            <a href="#" data-ix="p5" class="w-button button-5">More info</a>
            <p data-ix="display-none-on-load" class="p5">The employment rate (the proportion of people aged from 16 to 64 who were in work) was 74.1%, the joint highest since comparable records began in 1971.
              <br>
              <br>There were 31.41 million people in work, 20,000 more than for September to November 2015 and 360,000 more than for a year earlier.
              <br>
              <br>There were 22.98 million people working full-time, 289,000 more than for a year earlier. There were 8.43 million people working part-time, 71,000 more than for a year earlier.</p>
            <div class="evidence"><a target="_blank" href="https://www.ons.gov.uk/employmentandlabourmarket/peopleinwork/employmentandemployeetypes/bulletins/uklabourmarket/latest">Where did we get this from?</a>
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
        <!-- <div class="card-6">
          <div class="sticky-footer">
            <h1 class="card-header-6">How does this (employment levels) compare to other countries?</h1>
            <h1 class="headline-fact">PIE</h1>
            <a href="#" data-ix="p6" class="w-button button-6">Show context</a>
            <p data-ix="display-none-on-load" class="p6">http://ec.europa.eu/eurostat/statistics-explained/index.php/File:Employment_rate,_age_group_15%E2%80%9364,_2014_(%25)_YB16.png</p>
            <div class="evidence"><a target="_blank" href="http://ec.europa.eu/eurostat/statistics-explained/index.php/File:Employment_rate,_age_group_15%E2%80%9364,_2014_(%25)_YB16.png">Where did we get this from?</a>
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
        </div> -->
      </div>
      <div class="w-col w-col-3 cc3"></div>
    </div>
    <a href="#top" data-ix="display-none-on-load" class="w-button back-to-top">Back To Top</a>
  </div>
  <div id="Section-2" class="w-section section-2">
    <h4 class="how-to-use-the-grid-header">Jobs</h4>
    <img width="25" src="images/down arrow.svg" data-ix="drop-down-section-3" class="drop-down-topics">
    <div data-ix="display-none-on-load" class="w-row third-column-set">
      <div class="w-col w-col-5 column-7">
        <div class="card-7">
          <div class="sticky-footer">
            <h1 class="card-heading-7">How many people are unemployed in the UK?</h1>
            <h1 class="headline-fact">1.68 million</h1>
            <h1 class="headline-small">or 5.1% of the total workforce</h1>
            <a href="#" data-ix="p7" class="w-button button-7">More info</a>
            <p data-ix="display-none-on-load" class="p7">There were 1.70 million unemployed people (people not in work but seeking and available to work), 21,000 more than for September to November 2015 but 142,000 fewer than for a year earlier. The unemployment rate was 5.1%, lower than for a year earlier (5.6%). The unemployment rate is the proportion of the labour force (those in work plus those unemployed) that were unemployed.</p>
            <div class="evidence"><a target="_blank" href="https://www.ons.gov.uk/employmentandlabourmarket/peopleinwork/employmentandemployeetypes/bulletins/uklabourmarket/latest">Where did we get this from?</a>
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
            <h1 class="card-header-8">How many people in the UK live below the poverty line?</h1>
            <h1 class="headline-fact large-text">15%</h1>
            <a href="#" data-ix="p8" class="w-button button-8">More info</a>
            <p data-ix="display-none-on-load" class="p8">Definitions of poverty vary considerably among nations. For example, rich nations generally employ more generous standards of poverty than poor nations.</p>
            <div class="evidence"><a target="_blank" href="https://www.cia.gov/library/publications/the-world-factbook/fields/2046.html">Where did we get this from?</a>
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
            <h1 class="card-header-8">What sectors do they work in?</h1>
            <h1 class="headline-small">    </h1>
            <a href="#" data-ix="p9" class="w-button button-9">More info</a>
            <p data-ix="display-none-on-load" class="p9">In the first quarter of 2015, 69.9% of non-UK born working-age migrants were in some kind of employment, compared with 74% of the UK-born. However, this represents a considerable increase from historically low levels of employment among migrants.</p>
            <div class="evidence"><a target="_blank" href="https://itunes.apple.com/gb/app/eurosceptic/id774790361?mt=8">Where did we get this from?</a>
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
        <div class="card-10">
          <div class="sticky-footer">
            <h1 class="card-header-8">What is the average monthly salary in the UK?</h1>
            <h1 class="headline-fact large-text">£2,128</h1>
            <h1 class="headline-small">(after tax)</h1>
            <p data-ix="display-none-on-load" class="p10">The average salary in the UK is the 5th highest in the world. Compare this to the monthly average wage in Romania which is currently £662. &nbsp;This is one of the strongest motivators behind economic migration and one of the reasons there is an influx of migrants coming from Eastern Europe,</p>
            <div class="fill-empty-space"></div>
            <div class="emoticon-div">
              <div class="how-emoticons-work">How does this make you feel?</div>
              <div class="emoticons-10">
                <img width="50" src="images/angry with word.png" data-ix="anger-selected-10" class="anger-10">
                <img width="50" src="images/surprised with word.png" data-ix="shock-selected-10" class="shock-10">
                <img width="50" src="images/indifferent with word.png" data-ix="indifferent-selected-10" class="indifferent-10">
                <img width="50" src="images/happy with word.png" data-ix="happy-selected-10" class="happy-10">
                <img width="50" src="images/delighted with word.png" data-ix="delighted-selected-10" class="delighted-10">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="#top" data-ix="display-none-on-load" class="w-button back-to-top-2">Back To Top</a>
  </div>
  <div class="w-section got-the-basics topics">
    <h1 class="basics-link">Thats Jobs done for now</h1>
    <p class="lets-get-started-pap">You've now done all that you'd like to for the topic of Jobs, up next we'll be moving onto Defense and Security.
      <br>
      <br>Remember you dont have to react to every card, feel free to pick and choose what topics and cards you look at.</p>
    <a href="defence.php" class="w-button continue-button">Next topic &gt;</a>
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
