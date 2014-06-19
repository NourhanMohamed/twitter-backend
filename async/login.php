<?php
require_once "../vendor/autoload.php";
if(isset($_POST['register']) )
{
	$register = $_POST['register'];
  //$reg = $_POST['reg'];
  $usernames = $_POST['usernames'];
  $passwords = $_POST['passwords'];
  $emails = $_POST['emails'];
	if($register)
	{
		echo '<h1>'.$usernames.'</h1>';
		echo '<h1>'.$passwords.'</h1>';
		echo '<h1>'.$emails.'</h1>';
	//echo '<script>alert(48848484848);</script>';
	$date = new DateTime();
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"register\",\"username\":\"$usernames\",\"email\":\"$emails\",\"password\":\"$passwords\",\"name\":\"none\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		$client->send('USER.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp));
		$client->subscribe('USER.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  $response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		
		$loop->addPeriodicTimer(3, function () use ($client) {
		 global $loop; $loop->stop();//echo "<script type='text/javascript'>alert('please reload again');</script>";
		});
	    });
	$loop->run();
	$arr = json_decode($response, true);
	//$followers=sizeof($arr["followers"]);
	//$arr["followers"] as $follower;
	$reply = $arr["status"];
	//echo "<h1>$reply$reply$reply$reply$reply$reply$reply$reply$reply$reply</h1>";
	if($reply=="ok")
	{
		echo "<script type='text/javascript'>alert('Registered successfully , please login to continue');</script>";
		//header('Location: following1.php');
	}
	else
	{
	//echo $arr["message"];
	//header('Location: following1.php');
	//echo '<script>alert(3);</script>';
	}
	
	//echo '<script>alert(3);</script>';


	}
}


if(isset($_POST['login']) )
 {
	session_start();
echo "<script type='text/javascript'>alert('login begin');</script>";
  $submit = $_POST['login'];
  //$reg = $_POST['reg'];
  $username = $_POST['name'];
  $password = $_POST['pass'];
  $_SESSION['username']=$username;
  if($submit)
  { 
	echo '<h1>'.$username.'</h1>';
	//echo '<script>alert(1);</script>';
	$date = new DateTime();
	$userid = 3;
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"login\",\"username\":\"$username\",\"password\":\"$password\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		$client->send('USER.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp));
		$client->subscribe('USER.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  $response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		
		$loop->addPeriodicTimer(3, function () use ($client) {
		 global $loop; $loop->stop();//echo "<script type='text/javascript'>alert('please reload again');</script>";
		});
	    });
	$loop->run();
	$arr = json_decode($response, true);
	$followers=sizeof($arr["session_id"]);
	$ses = $arr["session_id"];
	$reply = $arr["status"];
	$useid = $arr["useid"];
	echo "<script type='text/javascript'>alert('$response');</script>";
	echo "<script type='text/javascript'>alert('session id : $ses');</script>";
	echo "<script type='text/javascript'>alert('use id : $useid');</script>";
	
	$_SESSION['session_id']=$ses;
	$_SESSION['id']=$useid;
	$sessiontest = 	$_SESSION['id'];
	//echo "<script type='text/javascript'>alert('$sessiontest');</script>";
	
	if($reply=="ok")
	{
	
		header('Location: home.php');
	}
	

  }
  
}

?>
<!DOCTYPE html>
<!--[if IE 8]><html class="lt-ie10 ie8" lang="en data-scribe-reduced-action-queue="true""><![endif]-->
<!--[if IE 9]><html class="lt-ie10 ie9" lang="en data-scribe-reduced-action-queue="true""><![endif]-->
<!--[if gt IE 9]><!--><html lang="en" data-scribe-reduced-action-queue="true"><!--<![endif]-->
  <head>
    
    
    
  <script id="composition_state">
    (function(){function a(a){a.target.setAttribute("data-in-composition","true")}function b(a){a.target.removeAttribute("data-in-composition")}if(document.addEventListener){document.addEventListener("compositionstart",a,!1);document.addEventListener("compositionend"
,b,!1)}})();
  </script>

        <link rel="stylesheet" href="https://abs.twimg.com/a/1395710393/css/t1/rosetta_core.bundle.css">

    <link rel="stylesheet" href="https://abs.twimg.com/a/1395710393/css/t1/rosetta_logged_out.bundle.css">


    
    
    
    
    <meta charset="utf-8">
    
    
  
        <link rel="stylesheet" href="https://abs.twimg.com/a/1395710393/css/t1/rosetta_core.bundle.css">

    <link rel="stylesheet" href="https://abs.twimg.com/a/1395710393/css/t1/rosetta_logged_out.bundle.css">


      <title>Twitter</title>
    
  <meta name="description" content="Instantly connect to what&#39;s most important to you. Follow your friends, experts, favorite celebrities, and breaking news.">



<meta name="msapplication-TileImage" content="//abs.twimg.com/favicons/win8-tile-144.png"/>
<meta name="msapplication-TileColor" content="#00aced"/>

  <link href="//abs.twimg.com/favicons/favicon.ico" rel="shortcut icon" type="image/x-icon">


  <meta name="swift-page-name" id="swift-page-name" content="front">

    <link rel="canonical" href="https://twitter.com/">



<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Twitter">

          <link rel="stylesheet" href="https://abs.twimg.com/a/1395710393/css/t1/rosetta_more.bundle.css">

  </head>
  <body class="t1 logged-out mobile-callout front-page" 
data-fouc-class-names="swift-loading"
 dir="ltr">
      <script id="swift_loading_indicator">
        document.body.className=document.body.className+" "+document.body.getAttribute("data-fouc-class-names");
      </script>
    <div id="doc" class="">
        <div class="topbar js-topbar">
  <div id="banners" class="js-banners">
  </div>
  <div class="global-nav" data-section-term="top_nav">
    <div class="global-nav-inner">
      <div class="container">

        
         <ul class="nav js-global-actions"> <li class="home" data-global-action="t1home">  <a class="nav-logo-link" href="/" data-nav="front"> <span class="Icon Icon--bird"><span class="visuallyhidden">Twitter</span></span> </a>   </li> </ul>  <div class="pull-right">  <ul class="nav secondary-nav language-dropdown"> <li class="dropdown js-language-dropdown"> <a href="#supported_languages" class="dropdown-toggle js-dropdown-toggle"> <small>Language:</small> <span class="js-current-language">English</span> <b class="caret"></b> </a> <div class="dropdown-menu"> <div class="dropdown-caret right"> <span class="caret-outer"> </span> <span class="caret-inner"></span> </div> <ul id="supported_languages">  <li><a href="?lang=id" data-lang-code="id" title="Indonesian" class="js-language-link js-tooltip">Bahasa Indonesia</a></li>  <li><a href="?lang=msa" data-lang-code="msa" title="Malay" class="js-language-link js-tooltip">Bahasa Melayu</a></li>  <li><a href="?lang=da" data-lang-code="da" title="Danish" class="js-language-link js-tooltip">Dansk</a></li>  <li><a href="?lang=de" data-lang-code="de" title="German" class="js-language-link js-tooltip">Deutsch</a></li>  <li><a href="?lang=en-gb" data-lang-code="en-gb" title="English UK" class="js-language-link js-tooltip">EnglishUK</a></li>  <li><a href="?lang=es" data-lang-code="es" title="Spanish" class="js-language-link js-tooltip">Español</a></li>  <li><a href="?lang=eu" data-lang-code="eu" title="Basque" class="js-language-link js-tooltip">Euskara</a></li>  <li><a href="?lang=fil" data-lang-code="fil" title="Filipino" class="js-language-link js-tooltip">Filipino</a></li>  <li><a href="?lang=gl" data-lang-code="gl" title="Galician" class="js-language-link js-tooltip">Galego</a></li>  <li><a href="?lang=it" data-lang-code="it" title="Italian" class="js-language-link js-tooltip">Italiano</a></li>  <li><a href="?lang=xx-lc" data-lang-code="xx-lc" title="Lolcat" class="js-language-link js-tooltip">LOLCATZ</a></li>  <li><a href="?lang=hu" data-lang-code="hu" title="Hungarian" class="js-language-link js-tooltip">Magyar</a></li>  <li><a href="?lang=nl" data-lang-code="nl" title="Dutch" class="js-language-link js-tooltip">Nederlands</a></li>  <li><a href="?lang=no" data-lang-code="no" title="Norwegian" class="js-language-link js-tooltip">Norsk</a></li>  <li><a href="?lang=pl" data-lang-code="pl" title="Polish" class="js-language-link js-tooltip">Polski</a></li>  <li><a href="?lang=pt" data-lang-code="pt" title="Portuguese" class="js-language-link js-tooltip">Português</a></li>  <li><a href="?lang=fi" data-lang-code="fi" title="Finnish" class="js-language-link js-tooltip">Suomi</a></li>  <li><a href="?lang=sv" data-lang-code="sv" title="Swedish" class="js-language-link js-tooltip">Svenska</a></li>  <li><a href="?lang=tr" data-lang-code="tr" title="Turkish" class="js-language-link js-tooltip">Türkçe</a></li>  <li><a href="?lang=ca" data-lang-code="ca" title="Catalan" class="js-language-link js-tooltip">català</a></li>  <li><a href="?lang=fr" data-lang-code="fr" title="French" class="js-language-link js-tooltip">français</a></li>  <li><a href="?lang=ro" data-lang-code="ro" title="Romanian" class="js-language-link js-tooltip">română</a></li>  <li><a href="?lang=cs" data-lang-code="cs" title="Czech" class="js-language-link js-tooltip">Čeština</a></li>  <li><a href="?lang=el" data-lang-code="el" title="Greek" class="js-language-link js-tooltip">Ελληνικά</a></li>  <li><a href="?lang=ru" data-lang-code="ru" title="Russian" class="js-language-link js-tooltip">Русский</a></li>  <li><a href="?lang=uk" data-lang-code="uk" title="Ukrainian" class="js-language-link js-tooltip">Українська мова</a></li>  <li><a href="?lang=he" data-lang-code="he" title="Hebrew" class="js-language-link js-tooltip">עִבְרִית</a></li>  <li><a href="?lang=ur" data-lang-code="ur" title="Urdu" class="js-language-link js-tooltip">اردو</a></li>  <li><a href="?lang=ar" data-lang-code="ar" title="Arabic" class="js-language-link js-tooltip">العربية</a></li>  <li><a href="?lang=fa" data-lang-code="fa" title="Farsi" class="js-language-link js-tooltip">فارسی</a></li>  <li><a href="?lang=hi" data-lang-code="hi" title="Hindi" class="js-language-link js-tooltip">हिन्दी</a></li>  <li><a href="?lang=th" data-lang-code="th" title="Thai" class="js-language-link js-tooltip">ภาษาไทย</a></li>  <li><a href="?lang=ja" data-lang-code="ja" title="Japanese" class="js-language-link js-tooltip">日本語</a></li>  <li><a href="?lang=zh-cn" data-lang-code="zh-cn" title="Simplified Chinese" class="js-language-link js-tooltip">简体中文</a></li>  <li><a href="?lang=zh-tw" data-lang-code="zh-tw" title="Traditional Chinese" class="js-language-link js-tooltip">繁體中文</a></li>  <li><a href="?lang=ko" data-lang-code="ko" title="Korean" class="js-language-link js-tooltip">한국어</a></li>  </ul> </div> <div class="js-front-language"> <form action="/sessions/change_locale" class="language" method="POST"> <input type="hidden" name="lang"> <input type="hidden" name="redirect"> <input type="hidden" name="authenticity_token" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0"> </form> </div> </li> </ul>   </div>

      </div>
    </div>
  </div>

</div>

        <div id="page-outer">
          <div id="page-container" class=" wrapper-front white">
              





            <div class="front-container " id="front-container">

  <noscript>
  <div class="front-warning">
    <h3>Twitter.com makes heavy use of JavaScript</h3>
    <p>If you cannot enable it in your browser's preferences, you may have a better experience on our <a href="http://m.twitter.com">mobile site</a>.</p>
  </div>
</noscript>

<div class="front-warning" id="front-no-cookies-warn">
  <h3>Twitter.com makes heavy use of browser cookies</h3>
  <p>Please enable cookies in your browser preferences before signing in.</p>
</div>






        
<div class="front-card">
  <div class="front-welcome ">
    <div class="phone-image"></div>
    <div class="callout-copy">
      <h1>Welcome to Twitter.</h1>
      <p>Start a conversation, explore your interests, and be in the know.</p>
    </div>
    <div class="store-links ">
      <a href="http://itunes.apple.com/us/app/twitter/id333903271?mt=8" class="store-button app-store" target="_blank">Download on the App Store</a>
      <a href="https://play.google.com/store/apps/details?id=com.twitter.android&amp;referrer=utm_source%3Dsignin%26utm_medium%3Dtwitterdotcom%26utm_content%3Dstratos%26utm_campaign%3Dloggedout"class="store-button google-play" target="_blank">Android app on Google play</a>
    </div>
    <p class="devices-link"><a href="https://about.twitter.com/products">View other devices</a></p>
  </div>

  <div class="front-signin js-front-signin">
  <form action="" class="signin" method="post">
    <div class="username">
      <input type="text" id="signin-email" class="text-input email-input" name="name" autocomplete="on" placeholder="Username or email">
    </div>

    <table class="flex-table password-signin">
      <tbody>
      <tr>
        <td class="flex-table-primary">
          <div class="password flex-table-form">
            <input type="password" id="signin-password" class="text-input flex-table-input" name="pass" placeholder="Password">
          </div>
        </td>
        <td class="flex-table-secondary">
          <button type="submit" value="login" name="login" class="submit btn primary-btn flex-table-btn js-submit">
            Sign in
          </button>
        </td>
      </tr>
      </tbody>
    </table>

    <div class="remember-forgot">
      <label class="remember">
        <input type="checkbox" value="1" name="remember_me" checked="checked">
        <span>Remember me</span>
      </label>
      <span class="separator">&middot;</span>
      <a class="forgot" href="/account/resend_password">Forgot password?</a>
    </div>

    <input type="hidden" name="return_to_ssl" value="true">

    <input type="hidden" name="scribe_log">
    <input type="hidden" name="redirect_after_login" value="/">
    <input type="hidden" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0" name="authenticity_token">
  </form>
</div>
  <div class="front-signup js-front-signup ">
  <h2><strong>New to Twitter?</strong> Sign up</h2>

  <form action="" class="signup" method="post" id="frontpage-signup-form">

    <div class="field">
      <input type="text" class="text-input" autocomplete="off" name="usernames" value="usernames" maxlength="20" placeholder="Full name">
    </div>
    <div class="field">
      <input type="text" class="text-input email-input" autocomplete="off" name="emails" value="emails" placeholder="Email">
    </div>
    <div class="field">
      <input type="password" class="text-input" name="passwords" value="passwords" placeholder="Password">
    </div>


    <input type="hidden" value="" name="context">
    <input type="hidden" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0" name="authenticity_token">
    <button type="submit" name="register" value="register" class="btn signup-btn u-pullRight">
      Sign up for Twitter
    </button>
  </form>
</div>

</div>



  <div class="footer inline-list">
  <ul>
    <li><a href="/about">About</a><span class="dot divider"> &middot;</span></li>
    <li><a href="//support.twitter.com">Help</a><span class="dot divider"> &middot;</span></li>
    <li><a href="https://blog.twitter.com">Blog</a><span class="dot divider"> &middot;</span></li>
    <li><a href="http://status.twitter.com">Status</a><span class="dot divider"> &middot;</span></li>
    <li><a href="/jobs">Jobs</a><span class="dot divider"> &middot;</span></li>
    <li><a href="/tos">Terms</a><span class="dot divider"> &middot;</span></li>
    <li><a href="/privacy">Privacy</a><span class="dot divider"> &middot;</span></li>
      <li><a href="//support.twitter.com/articles/20170514">Cookies</a><span class="dot divider"> &middot;</span></li>
      <li><a href="//support.twitter.com/articles/20170451">Ads info</a><span class="dot divider"> &middot;</span></li>
      <li><a href="//about.twitter.com/press/brand-assets">Brand</a><span class="dot divider"> &middot;</span></li>
    <li><a href="//ads.twitter.com/start?ref=gl-tw-tw-twitter-advertise">Advertise</a><span class="dot divider"> &middot;</span></li>
    <li><a href="https://business.twitter.com">Businesses</a><span class="dot divider"> &middot;</span></li>
    <li><a href="//media.twitter.com">Media</a><span class="dot divider"> &middot;</span></li>
    <li><a href="//dev.twitter.com">Developers</a><span class="dot divider"> &middot;</span></li>
      <li><a href="/i/directory/profiles">Directory</a><span class="dot divider"> &middot;</span></li>
    <li><span class="copyright">&copy; 2014 Twitter</span></li>
  </ul>
</div>


</div>

          </div>
        </div>
      
    </div>
    <div class="alert-messages hidden" id="message-drawer">
    <div class="message ">
  <div class="message-inside">
    <span class="message-text"></span>
      <a class="Icon Icon--close Icon--medium dismiss" href="#">
        <span class="visuallyhidden">Dismiss</span>
      </a>
  </div>
</div>
</div>

    

<div class="gallery-overlay"></div>
<div class="Gallery Gallery--new">
  <div class="Gallery-closeTarget"></div>
  <div class="Gallery-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--large">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

    <div class="Gallery-media"></div>
    <div class="GalleryNav GalleryNav--prev">
      <span class="GalleryNav-handle GalleryNav-handle--prev">
          <span class="Icon Icon--caretLeft Icon--large">
            <span class="u-isHiddenVisually">
              Previous
            </span>
      </span>
    </div>
    <div class="GalleryNav GalleryNav--next">
      <span class="GalleryNav-handle GalleryNav-handle--next">
          <span class="Icon Icon--caretRight Icon--large">
            <span class="u-isHiddenVisually">
              Next
            </span>
          </span>
      </span>
    </div>
    <div class="GalleryTweet GalleryTweet--new"></div>
  </div>
</div>



<div class="modal-overlay"></div>




<div id="goto-user-dialog" class="modal-container">
  <div class="modal modal-small draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">Go to a person's profile</h3>
      </div>

      <div class="modal-body">
        <div class="modal-inner">
          <form class="goto-user-form">
            <input class="input-block username-input" type="text" placeholder="Start typing a name to jump to a profile" aria-label="User">
            


<div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
    <div role="presentation" class="typeahead-saved-searches">
  <h3 id="saved-searches-heading" class="typeahead-category-title saved-searches-title">Saved searches</h3>
  <ul role="presentation" class="typeahead-items saved-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-saved-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="saved-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="saved_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

    <ul role="presentation" class="typeahead-items typeahead-topics">
  
  <li role="presentation" class="typeahead-item typeahead-topic-item">
    <a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-ds="topics" tabindex="-1">
    </a>
  </li>
</ul>


    


<ul role="presentation" class="typeahead-items typeahead-accounts js-typeahead-accounts">
  
  <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-account-item js-selectable">
    
    <a role="option" class="js-nav" data-query-source="typeahead_click" data-search-query="" data-ds="account">
      <img class="avatar size24" alt="">
      <span class="typeahead-user-item-info">
        <span class="fullname"></span>
        <span class="js-verified hidden"><span class="icon verified"><span class="visuallyhidden">Verified account</span></span></span>
        <span class="username"><s>@</s><b></b></span>
      </span>
    </a>
  </li>
  <li role="presentation" class="js-selectable typeahead-accounts-shortcut js-shortcut"><a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-shortcut="true" data-ds="account_search"></a></li>
</ul>

    <ul role="presentation" class="typeahead-items typeahead-trend-locations-list">
  
  <li role="presentation" class="typeahead-item typeahead-trend-locations-item"><a role="option" class="js-nav" href="" data-ds="trend_location" data-search-query="" tabindex="-1"></a></li>
</ul>
    <ul role="presentation" class="typeahead-items typeahead-context-list">
  
  <li role="presentation" class="typeahead-item typeahead-context-item"><a role="option" class="js-nav" href="" data-ds="context_helper" data-search-query="" tabindex="-1"></a></li>
</ul>
  </div>
</div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>


  <div id="retweet-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">Retweet this to your followers?</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">Cancel</button>
        <button class="btn primary-btn retweet-action">Retweet</button>
      </div>
    </div>
  </div>
</div>

  <div id="delete-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">Are you sure you want to delete this Tweet?</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">Cancel</button>
        <button class="btn primary-btn delete-action">Delete</button>
      </div>
    </div>
  </div>
</div>


<div id="block-user-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">Block</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">Cancel</button>
        <button class="btn primary-btn block-action">Block</button>
      </div>
    </div>
  </div>
</div>



  
  

     <div id="geo-disabled-dropdown">
      <div class="dropdown-menu" tabindex="-1">
  <div class="dropdown-caret">
    <span class="caret-outer"></span>
    <span class="caret-inner"></span>
  </div>
  <ul>
    <li class="geo-not-enabled-yet">
      <h2>Add a location to your Tweets</h2>
      <p>
        When you tweet with a location, Twitter stores that location.&#32;
        You can switch location on/off before each Tweet and always have the option to delete your location history.
        <a href="http://support.twitter.com/forums/26810/entries/78525" target="_blank">Learn more</a>
      </p>
      <div>
        <button type="button" class="geo-turn-on btn primary-btn">Turn location on</button>
        <button type="button" class="geo-not-now btn-link">Not now</button>
      </div>
    </li>
  </ul>
</div>
    </div>

  <div id="geo-enabled-dropdown">
    <div class="dropdown-menu" tabindex="-1">
  <div class="dropdown-caret">
    <span class="caret-outer"></span>
    <span class="caret-inner"></span>
  </div>
  <ul>
    <li class="geo-query-location">
      <input type="text" autocomplete="off" placeholder="Search for a neighborhood or city">
      <span class="icon generic-search"></span>
    </li>
    <li class="geo-dropdown-status"></li>
    <li class="dropdown-link geo-turn-off-item geo-focusable">
      <span class="icon close"></span>Turn off location
    </li>
  </ul>
</div>
  </div>


  <div id="profile_popup" class="modal-container ProfilePopupContainer">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-small draggable">
    <div class="modal-content clearfix">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Profile summary</h3>
      </div>

      <div class="modal-body profile-modal">

      </div>

      <div class="loading">
        <span class="spinner-bigger"></span>
      </div>
    </div>
  </div>
</div>

  <div id="list-membership-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-small draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Your lists</h3>
      </div>
      <div class="modal-body">
        <div class="list-membership-content"></div>
        <span class="spinner lists-spinner" title="Loading&hellip;"></span>
      </div>
    </div>
  </div>
</div>
  <div id="list-operations-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Create a new list</h3>
      </div>
      <div class="modal-body">
        
<div class="list-editor">
  <div class="field">
    <label for="list-name">List name</label>
    <input id="list-name" type="text" class="text" name="name" value="" />
  </div>
  <hr/>

  <div class="field">
    <label for="list-description">Description</label>
    <textarea id="list-description" name="description"></textarea>
    <span class="help-text">Under 100 characters, optional</span>
  </div>
  <hr/>

  <fieldset class="field">
    <legend>Privacy</legend>
    <div class="options">
      <label for="list-public-radio">
        <input class="radio" type="radio" name="mode" id="list-public-radio" value="public" checked="checked"  />
        <b>Public</b> &middot; Anyone can follow this list
      </label>
      <label for="list-private-radio">
        <input class="radio" type="radio" name="mode" id="list-private-radio" value="private"  />
        <b>Private</b> &middot; Only you can access this list
      </label>
    </div>
  </fieldset>
  <hr/>

  <div class="list-editor-save">
    <button type="button" class="btn btn-primary update-list-button" data-list-id="">Save list</button>
  </div>

</div>
      </div>
    </div>
  </div>
</div>

  <div id="activity-popup-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content clearfix">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title"></h3>
      </div>

      <div class="modal-body">
        <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

        <div class="activity-tweet modal-tweet clearfix"></div>
        <div class="loading">
          <span class="spinner-bigger"></span>
        </div>
        <div class="activity-content clearfix"></div>
      </div>
    </div>
  </div>
</div>





  <div id="embed-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Embed this Tweet</h3>
      </div>
      <div class="modal-body">
        <div class="embed-code-container">
  <p>Add this Tweet to your website by copying the code below. <a href="//dev.twitter.com/docs/embedded-tweets">Learn more</a></p>
  <form>

    <div class="embed-destination-wrapper">
      <div class="embed-overlay embed-overlay-spinner"><div class="embed-overlay-content"></div></div>
      <div class="embed-overlay embed-overlay-error">
        <p class="embed-overlay-content">Hmm, there was a problem reaching the server. <button type="button" class="btn-link retry-embed">Try again?</button></p>
      </div>
      <textarea class="embed-destination js-initial-focus"></textarea>
      <div class="embed-options">
        <div class="embed-include-parent-tweet">
          <label for="include-parent-tweet">
            <input type="checkbox" id="include-parent-tweet" class="include-parent-tweet" checked>
            Include parent Tweet
          </label>
        </div>
        <div class="embed-include-card">
          <label for="include-card">
            <input type="checkbox" id="include-card" class="include-card" checked>
            Include media
          </label>
        </div>
      </div>
    </div>
  </form>
  <div class="embed-preview">
    <h3>Preview</h3>
  </div>
</div>

      </div>
    </div>
  </div>
</div>





  
  <div id="signin-or-signup-dialog">
    <div id="signin-or-signup" class="modal-container">
      <div class="close-modal-background-target"></div>
      <div class="modal modal-medium draggable">
        <div class="modal-content">
          <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

          <div class="modal-header">
            <h3 class="modal-title modal-long-title signup-only">Sign up for Twitter &amp; follow @<span></span></h3>
            <h3 class="modal-title not-signup-only">Sign in to Twitter</h3>
          </div>
          <div class="modal-body signup-only">
            <form action="https://twitter.com/signup" class="clearfix signup" method="post">
  <div class="field name">
    <input type="text" autocomplete="off" name="user[name]" maxlength="20" class="js-initial-focus" placeholder="Full name">
  </div>
  <div class="field email">
    <input class="email-input" type="text" autocomplete="off" name="user[email]" placeholder="Email">
  </div>
  <div class="field password">
    <input type="password" name="user[user_password]" placeholder="Password">
  </div>
  <input type="hidden" value="" name="context">
  <input type="hidden" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0" name="authenticity_token"/>
  <input name="follows" type="hidden" value="">
  <input type="submit" class="btn signup-btn js-submit js-signup-btn" value="Sign up">
</form>

          </div>
          <div class="modal-body not-signup-only">
            <form action="https://twitter.com/sessions" class="signin" method="post">
  <fieldset>

  <legend class="visuallyhidden">Sign In</legend>

  <div class="clearfix field">
    <input class="js-username-field email-input js-initial-focus" type="text" name="session[username_or_email]" autocomplete="on" value="" placeholder="Username or email">
  </div>

  <div class="clearfix field">
    <input class="js-password-field" type="password" name="session[password]" placeholder="Password">
  </div>

  <input type="hidden" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0" name="authenticity_token"/>

</fieldset>

  <div class="clearfix">

  <input type="hidden" name="scribe_log">
  <input type="hidden" name="redirect_after_login" value="/">
  <input type="hidden" value="7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0" name="authenticity_token"/>
  <button type="submit" class="submit btn primary-btn">Sign in</button>

  <fieldset class="subchck">
    <label class="remember">
      <input type="checkbox" value="1" name="remember_me" checked="checked">
      Remember me
      <span class="separator">·</span>
      <a class="forgot" href="/account/resend_password">Forgot password?</a>
    </label>
  </fieldset>
</div>

  <div class="divider"></div>
  <p>
    <a class="forgot" href="/account/resend_password">Forgot password?</a><br />
    <a class="mobile has-sms" href="/account/complete">Already using Twitter via text message?</a>
  </p>
</form>

            <div class="signup">
              <h2>Not on Twitter? Sign up, tune into the things you care about, and get updates as they happen.</h2>
              <form action="https://twitter.com/signup" class="signup" method="get">
  <button class="btn promotional signup-btn" type="submit">Sign up &raquo;</button>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="sms-codes-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Two-way (sending and receiving) short codes:</h3>
      </div>
      <div class="modal-body">
        
<table id="sms_codes" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>Country</th>
      <th>Code</th>
      <th>For customers of</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>United States</td>
      <td>40404</td>
      <td>(any)</td>
    </tr>
    <tr>
      <td>Canada</td>
      <td>21212</td>
      <td>(any)</td>
    </tr>
    <tr>
      <td>United Kingdom</td>
      <td>86444</td>
      <td>Vodafone, Orange, 3, O2</td>
    </tr>
    <tr>
      <td>Brazil</td>
      <td>40404</td>
      <td>Nextel, TIM</td>
    </tr>
    <tr>
      <td>Haiti</td>
      <td>40404</td>
      <td>Digicel, Voila</td>
    </tr>
    <tr>
      <td>Ireland</td>
      <td>51210</td>
      <td>Vodafone, O2</td>
    </tr>
    <tr>
      <td>India</td>
      <td>53000</td>
      <td>Bharti Airtel, Videocon, Reliance</td>
    </tr>
    <tr>
      <td>Indonesia</td>
      <td>89887</td>
      <td>AXIS, 3, Telkomsel, Indosat, XL Axiata</td>
    </tr>
    <tr>
      <td rowspan="2">Italy</td>
      <td>4880804</td>
      <td>Wind</td>
    </tr>
    <tr>
      <td>3424486444</td>
      <td>Vodafone</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">
        &raquo; <a class="js-initial-focus" target="_blank" href="http://support.twitter.com/articles/14226-how-to-find-your-twitter-short-code-or-long-code">See SMS short codes for other countries</a>
      </td>
    </tr>
  </tfoot>
</table>
      </div>
    </div>
  </div>
</div>




<div id="create-custom-timeline-dialog" class="modal-container"></div>
<div id="edit-custom-timeline-dialog" class="modal-container"></div>
<div id="curate-dialog" class="modal-container"></div>


    <div class="hidden">
  <iframe aria-hidden="true" class="tweet-post-iframe" name="tweet-post-iframe"></iframe>

</div>
    
    <div id="spoonbill-outer"></div>
  </body>
</html>
  <input type="hidden" id="init-data" class="json-data" value="{&quot;profileHoversEnabled&quot;:false,&quot;noNewDedup&quot;:false,&quot;permalinkOverlayEnabled&quot;:false,&quot;baseFoucClass&quot;:&quot;swift-loading&quot;,&quot;bodyFoucClassNames&quot;:&quot;swift-loading&quot;,&quot;macawSwift&quot;:true,&quot;assetsBasePath&quot;:&quot;https:\/\/abs.twimg.com\/a\/1395710393\/&quot;,&quot;assetVersionKey&quot;:&quot;39e1a1&quot;,&quot;environment&quot;:&quot;production&quot;,&quot;formAuthenticityToken&quot;:&quot;7fe8ca2b11079fb578ca58e52b589d6ba8fc19e0&quot;,&quot;loggedIn&quot;:false,&quot;screenName&quot;:null,&quot;fullName&quot;:null,&quot;userId&quot;:null,&quot;scribeBufferSize&quot;:3,&quot;pageName&quot;:&quot;front&quot;,&quot;sectionName&quot;:&quot;front&quot;,&quot;scribeParameters&quot;:{},&quot;internalReferer&quot;:null,&quot;geoEnabled&quot;:false,&quot;typeaheadData&quot;:{&quot;accounts&quot;:{&quot;localQueriesEnabled&quot;:false,&quot;remoteQueriesEnabled&quot;:false,&quot;enabled&quot;:false,&quot;limit&quot;:6},&quot;trendLocations&quot;:{&quot;enabled&quot;:false},&quot;savedSearches&quot;:{&quot;enabled&quot;:false,&quot;items&quot;:[]},&quot;dmAccounts&quot;:{&quot;enabled&quot;:false,&quot;localQueriesEnabled&quot;:false,&quot;onlyDMable&quot;:true,&quot;remoteQueriesEnabled&quot;:false},&quot;topics&quot;:{&quot;enabled&quot;:false,&quot;localQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;remoteQueriesEnabled&quot;:false,&quot;limit&quot;:4},&quot;concierge&quot;:{&quot;enabled&quot;:false,&quot;localQueriesEnabled&quot;:true,&quot;remoteQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;limit&quot;:3},&quot;recentSearches&quot;:{&quot;enabled&quot;:false},&quot;contextHelpers&quot;:{&quot;enabled&quot;:false,&quot;page_name&quot;:&quot;front&quot;,&quot;section_name&quot;:&quot;front&quot;,&quot;screen_name&quot;:null},&quot;hashtags&quot;:{&quot;enabled&quot;:false,&quot;localQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;remoteQueriesEnabled&quot;:false},&quot;showSearchAccountSocialContext&quot;:false,&quot;showTypeaheadTopicSocialContext&quot;:false,&quot;showDebugInfo&quot;:false,&quot;useThrottle&quot;:true,&quot;accountsOnTop&quot;:false,&quot;remoteDebounceInterval&quot;:300,&quot;remoteThrottleInterval&quot;:300,&quot;reverseBoldingEnabled&quot;:false,&quot;tweetContextEnabled&quot;:false,&quot;fullNameMatchingInCompose&quot;:true,&quot;topicsWithFiltersEnabled&quot;:false},&quot;pushStatePageLimit&quot;:500000,&quot;routes&quot;:{&quot;profile&quot;:&quot;\/&quot;},&quot;pushState&quot;:true,&quot;viewContainer&quot;:&quot;#page-container&quot;,&quot;asyncSocialProof&quot;:true,&quot;dragAndDropPhotoUpload&quot;:true,&quot;href&quot;:&quot;\/&quot;,&quot;searchPathWithQuery&quot;:&quot;\/search?q=query&amp;src=typd&quot;,&quot;timelineCardsGallery&quot;:true,&quot;mediaGrid&quot;:true,&quot;deciders&quot;:{&quot;pushState&quot;:true,&quot;disable_profile_popup&quot;:false,&quot;hqImageUploads&quot;:false,&quot;mqImageUploads&quot;:false,&quot;dynamicLoadMediaForward&quot;:true,&quot;scribeActionQueue&quot;:false,&quot;scribeReducedActionQueue&quot;:true,&quot;modal_tweet_from_server_enabled&quot;:true,&quot;custom_timeline_curation&quot;:false},&quot;permalinkCardsGallery&quot;:false,&quot;toasts_dm&quot;:false,&quot;toasts_spoonbill&quot;:false,&quot;toasts_timeline&quot;:false,&quot;toasts_dm_poll_scale&quot;:60,&quot;uploadDomain&quot;:&quot;upload.twitter.com&quot;,&quot;lifelineAlertEnabled&quot;:false,&quot;freezeDashboard&quot;:false,&quot;swift_dm_create&quot;:false,&quot;enableActivity&quot;:true,&quot;initialState&quot;:{&quot;title&quot;:&quot;Twitter&quot;,&quot;section&quot;:null,&quot;module&quot;:&quot;app\/pages\/frontpage&quot;,&quot;cache_ttl&quot;:300,&quot;body_class_names&quot;:&quot;t1 logged-out mobile-callout front-page&quot;,&quot;doc_class_names&quot;:null,&quot;route_name&quot;:&quot;&quot;,&quot;page_container_class_names&quot;:&quot; wrapper-front white&quot;,&quot;ttft_navigation&quot;:false}}">

  

    <input type="hidden" class="swift-boot-module" value="app/pages/frontpage">
  <input type="hidden" id="swift-module-path" value="https://abs.twimg.com/c/swift/en">

  
    <script src="https://abs.twimg.com/c/swift/en/init.421b93c38dd45adc493e9a622a094ba0aa800808.js" async></script>


