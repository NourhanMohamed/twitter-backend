<?php 
	require_once "timeline_fetch.php";
	session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="lt-ie10 ie8" lang="en data-scribe-reduced-action-queue="true""><![endif]-->
<!--[if IE 9]><html class="lt-ie10 ie9" lang="en data-scribe-reduced-action-queue="true""><![endif]-->
<!--[if gt IE 9]><!--><html lang="en" data-scribe-reduced-action-queue="true"><!--<![endif]-->
  <head>
    
    
    
    
    <meta charset="utf-8">
    
    
  <script id="resolve_inline_redirects">

    (function(){function b(){var a=window.location.href.match(/#(.)(.*)$/);return a&&a[1]=="!"&&a[2].replace(/^\//,"")}function c(b){if(!b)return!1;b=decodeURI(b.replace(/^#|\/$/,"")).toLowerCase();return b.match(a)?b:!1}function d(a){var a=c(a);if(a){var b=document
.referrer||"none",d="ev_redir_"+encodeURIComponent(a)+"="+b+"; path=/";document.cookie=d;window.location.replace("/hashtag/"+a)}}function e(){var a=b();a&&window.location.replace("//"+window.location.host+"/"+a);window.location.hash!=""&&d(window.location.
hash.substr(1).toLowerCase())}var a=/^[a-z0-9_À-ÖØ-öø-ÿĀ-ɏɓ-ɔɖ-ɗəɛɣɨɯɲʉʋʻ̀-ͯḀ-ỿЀ-ӿԀ-ԧⷠ-ⷿꙀ-֑ꚟ-ֿׁ-ׂׄ-ׇׅא-תװ-״﬒-ﬨשׁ-זּטּ-לּמּנּ-סּףּ-פּצּ-ﭏؐ-ؚؠ-ٟٮ-ۓە-ۜ۞-۪ۨ-ۯۺ-ۼۿݐ-ݿࢠࢢ-ࢬࣤ-ࣾﭐ-ﮱﯓ-ﴽﵐ-ﶏﶒ-ﷇﷰ-ﷻﹰ-ﹴﹶ-ﻼ‌ก-ฺเ-๎ᄀ-ᇿ㄰-ㆅꥠ-꥿가-힯ힰ-퟿ﾡ-ￜァ-ヺー-ヾｦ-ﾟｰ０-９Ａ-Ｚａ-ｚぁ-ゖ゙-ゞ㐀-䶿一-鿿꜀-뜿띀-렟-﨟〃々〻]*[a-z_À-ÖØ-öø-ÿĀ-ɏɓ-ɔɖ-ɗəɛɣɨɯɲʉʋʻ̀-ͯḀ-ỿЀ-ӿԀ-ԧⷠ-ⷿꙀ-֑ꚟ-ֿׁ-ׂׄ-ׇׅא-תװ-״﬒-ﬨשׁ-זּטּ-לּמּנּ-סּףּ-פּצּ-ﭏؐ-ؚؠ-ٟٮ-ۓە-ۜ۞-۪ۨ-ۯۺ-ۼۿݐ-ݿࢠࢢ-ࢬࣤ-ࣾﭐ-ﮱﯓ-ﴽﵐ-ﶏﶒ-ﷇﷰ-ﷻﹰ-ﹴﹶ-ﻼ‌ก-ฺเ-๎ᄀ-ᇿ㄰-ㆅꥠ-꥿가-힯ힰ-퟿ﾡ-ￜァ-ヺー-ヾｦ-ﾟｰ０-９Ａ-Ｚａ-ｚぁ-ゖ゙-ゞ㐀-䶿一-鿿꜀-뜿띀-렟-﨟〃々〻][a-z0-9_À-ÖØ-öø-ÿĀ-ɏɓ-ɔɖ-ɗəɛɣɨɯɲʉʋʻ̀-ͯḀ-ỿЀ-ӿԀ-ԧⷠ-ⷿꙀ-֑ꚟ-ֿׁ-ׂׄ-ׇׅא-תװ-״﬒-ﬨשׁ-זּטּ-לּמּנּ-סּףּ-פּצּ-ﭏؐ-ؚؠ-ٟٮ-ۓە-ۜ۞-۪ۨ-ۯۺ-ۼۿݐ-ݿࢠࢢ-ࢬࣤ-ࣾﭐ-ﮱﯓ-ﴽﵐ-ﶏﶒ-ﷇﷰ-ﷻﹰ-ﹴﹶ-ﻼ‌ก-ฺเ-๎ᄀ-ᇿ㄰-ㆅꥠ-꥿가-힯ힰ-퟿ﾡ-ￜァ-ヺー-ヾｦ-ﾟｰ０-９Ａ-Ｚａ-ｚぁ-ゖ゙-ゞ㐀-䶿一-鿿꜀-뜿띀-렟-﨟〃々〻]+$/
;e();window.addEventListener?window.addEventListener("hashchange",e,!1):window.attachEvent&&window.attachEvent("onhashchange",e)})();
  </script>
  <script id="swift_action_queue">
    (function(){function m(a){a||(a=window.event);if(!a)return!1;a.timestamp=(new Date).getTime();!a.target&&a.srcElement&&(a.target=a.srcElement);if(document.documentElement.getAttribute("data-scribe-reduced-action-queue")){var b=a.target;while(b&&b!=document
.body){if(b.tagName=="A")return;b=b.parentNode}}r("all",s(a));if(!q(a)){r("direct",a);return!0}document.addEventListener||(a=s(a));a.preventDefault=a.stopPropagation=a.stopImmediatePropagation=function(){};if(i){f.push(a);r("captured",a)}else r("ignored",a
);return!1}function n($){p();for(var a=0,b;b=f[a];a++){var d=$(b.target),e=d.closest("a")[0];if(b.type=="click"&&e){var g=$.data(e,"events"),i=g&&g.click,j=!e.hostname.match(c)||!e.href.match(/#$/);if(!i&&j){window.location=e.href;continue}}d.trigger(b)}window
.swiftActionQueue.wasFlushed=!0}function o(){for(var a in j){if(a=="all")continue;var b=j[a];for(var c=0;c<b.length;c++)console.log("actionQueue",u(b[c]))}}function p(){clearTimeout(g);for(var a=0,b;b=e[a];a++)document["on"+b]=null}function q(a){if(!a.target
)return!1;var b=a.target,e=(b.tagName||"").toLowerCase();if(a.metaKey)return!1;if(a.shiftKey&&e=="a")return!1;if(b.hostname&&!b.hostname.match(c))return!1;if(a.type.match(d)&&w(b))return!1;if(e=="label"){var f=b.getAttribute("for");if(f){var g=document.getElementById
(f);if(g&&v(g))return!1}else for(var i=0,j;j=b.childNodes[i];i++)if(v(j))return!1}return!0}function r(a,b){b.bucket=a;j[a].push(b)}function s(a){var b={};for(var c in a)b[c]=a[c];return b}function t(a){while(a&&a!=document.body){if(a.tagName=="A")return a;
a=a.parentNode}}function u(b){var c=[];b.bucket&&c.push("["+b.bucket+"]");c.push(b.type);var d=b.target,e=t(d),f="",g,i,j=b.timestamp&&b.timestamp-a;if(b.type==="click"&&e){g=e.className.trim().replace(/\s+/g,".");i=e.id.trim();f=/[^#]$/.test(e.href)?" ("+
e.href+")":"";d='"'+e.innerText.replace(/\n+/g," ").trim()+'"'}else{g=d.className.trim().replace(/\s+/g,".");i=d.id.trim();d=d.tagName.toLowerCase();b.keyCode&&(d=String.fromCharCode(b.keyCode)+" : "+d)}c.push(d+f+(i&&"#"+i)+(!i&&g?"."+g:""));j&&c.push(j);
return c.join(" ")}function v(a){var b=(a.tagName||"").toLowerCase();return b=="input"&&a.getAttribute("type")=="checkbox"}function w(a){var b=(a.tagName||"").toLowerCase();return b=="textarea"||b=="input"&&a.getAttribute("type")=="text"||a.getAttribute("contenteditable"
)=="true"}var a=(new Date).getTime(),b=1e4,c=/^([^\.]+\.)*twitter\.com$/,d=/^key/,e=["click","keydown","keypress","keyup"],f=[],g=null,i=!0,j={captured:[],ignored:[],direct:[],all:[]};for(var k=0,l;l=e[k];k++)document["on"+l]=m;g=setTimeout(function(){i=!1
},b);window.swiftActionQueue={buckets:j,flush:n,logActions:o,wasFlushed:!1}})();
  </script>
  <script id="composition_state">
    (function(){function a(a){a.target.setAttribute("data-in-composition","true")}function b(a){a.target.removeAttribute("data-in-composition")}if(document.addEventListener){document.addEventListener("compositionstart",a,!1);document.addEventListener("compositionend"
,b,!1)}})();
</script>

        <link rel="stylesheet" href="https://abs.twimg.com/a/1394742182/css/t1/rosetta_core.bundle.css">



      <title>Twitter</title>
    



<meta name="msapplication-TileImage" content="//abs.twimg.com/favicons/win8-tile-144.png"/>
<meta name="msapplication-TileColor" content="#00aced"/>

  <link href="//abs.twimg.com/favicons/favicon.ico" rel="shortcut icon" type="image/x-icon">


  <meta name="swift-page-name" id="swift-page-name" content="home">

    <link rel="canonical" href="https://twitter.com/">



<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Twitter">

          
<style id="user-style-bachelorprjct">





  a,
  a:hover,
  a:focus,
  a:active,
  
  .u-linkPseudo,
  .u-linkPseudo:hover,
  .u-linkPseudo:focus,
  .u-linkPseudo:active {
    color: #0084B4;
  }

  .u-textUserColor {
    color: #0084B4 !important;
  }

  .u-borderUserColor,
  .u-borderUserColorHover:hover,
  .u-borderUserColorHover:focus {
    border-color: #0084B4 !important;
  }

  .u-bgUserColor,
  .u-bgUserColorHover:hover,
  .u-bgUserColorHover:focus {
    background-color: #0084B4 !important;
  }

  .u-boxShadowInsetUserColorHover:hover,
  .u-boxShadowInsetUserColorHover:focus {
    box-shadow: inset 0 0 0 5px #0084B4 !important;
  }



  .u-textUserColorLight {
    color: #99CDE1 !important;
  }

  .u-borderUserColorLight,
  .u-borderUserColorLightFocus:focus,
  .u-borderUserColorLightHover:hover,
  .u-borderUserColorLightHover:focus {
    border-color: #99CDE1 !important;
  }

  .u-bgUserColorLight {
    background-color: #99CDE1 !important;
  }


  .u-boxShadowUserColorLighterFocus:focus {
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.05), inset 0 1px 2px rgba(0,132,180,0.25) !important;
  }


  .u-textUserColorLightest {
    color: #E5F2F7 !important;
  }

  .u-borderUserColorLightest {
    border-color: #E5F2F7 !important;
  }

  .u-bgUserColorLightest {
    background-color: #E5F2F7 !important;
  }


  .u-bgUserColorDarkHover:hover {
    background-color: #006990 !important;
  }


  .u-bgUserColorDarkerActive:active {
    background-color: #004F6C !important;
  }















a,
.btn-link,
.btn-link:focus,
.icon-btn,



.pretty-link b,
.pretty-link:hover s,
.pretty-link:hover b,
.pretty-link:focus s,
.pretty-link:focus b,
/* Account Group */
.metadata a:hover,
.metadata a:focus,

.account-group:hover .fullname,
.account-group:focus .fullname,
.account-summary:focus .fullname,

.message .message-text a,
.stats a strong,
.plain-btn:hover,
.plain-btn:focus,
.dropdown.open .user-dropdown.plain-btn,
.open > .plain-btn,
#global-actions .new:before,
.module .list-link:hover,
.module .list-link:focus,

#user-completion-module .user-completion-step:hover,

.stats a:hover,
.stats a:hover strong,
.stats a:focus,
.stats a:focus strong,

.profile-modal-header .fullname a:hover,
.profile-modal-header .username a:hover,
.profile-modal-header .fullname a:focus,
.profile-modal-header .username a:focus,

.story-article:hover .metadata,
.story-article .metadata a:focus,

.find-friends-sources li:hover .source,





.stream-item a:hover .fullname,
.stream-item a:focus .fullname,

.stream-item .view-all-supplements:hover,
.stream-item .view-all-supplements:focus,

.tweet .time a:hover,
.tweet .time a:focus,
.tweet-actions a,
.tweet .details.with-icn b,
.tweet .details.with-icn .Icon,

.stream-item:hover .original-tweet .expand-action-wrapper,
.stream-item .original-tweet.focus .expand-action-wrapper,
.opened-tweet.original-tweet  .expand-action-wrapper,

.stream-item:hover .original-tweet .details b,
.stream-item .original-tweet.focus .details b,
.stream-item.open .original-tweet .details b,

.simple-tweet:hover .details b,
.simple-tweet.focus .details b,
.simple-tweet.open .details b,
.simple-tweet:hover .details .expand-action-wrapper,
.simple-tweet.focus .details .expand-action-wrapper,
.simple-tweet.open .details .collapse-action-wrapper,
.simple-tweet:hover .details .simple-details-link,
.simple-tweet.focus .details .simple-details-link,

.client-and-actions a:hover,
.client-and-actions a:focus,

.dismiss-promoted:hover b,

.tweet .context .pretty-link:hover s,
.tweet .context .pretty-link:hover b,
.tweet .context .pretty-link:focus s,
.tweet .context .pretty-link:focus b,

.list .username a:hover,
.list .username a:focus,
.list-membership-container .create-a-list,
.list-membership-container .create-a-list:hover,



.story-header:hover .view-tweets,
.card .list-details a:hover,
.card .list-details a:focus,
.card .card-body:hover .attribution,
.card .card-body .attribution:focus,
.events-card .card-body:hover .attribution,
.events-card .card-body .attribution:focus,
.new-tweets-bar,
.onebox .soccer ul.ticker a:hover,
.onebox .soccer ul.ticker a:focus,



.discover-item-actions a,



.disco-stream-item.disco_exp_actions_on_btm .more-tweet-actions .btn-link,
.disco-stream-item.disco_exp_actions_on_btm_without_stats .more-tweet-actions .btn-link,



.remove-background-btn,



.stream-item-activity-me .latest-tweet .tweet-row a:hover,
.stream-item-activity-me .latest-tweet .tweet-row a:focus,
.stream-item-activity-me .latest-tweet .tweet-row a:hover b,
.stream-item-activity-me .latest-tweet .tweet-row a:focus b {
    color: #0084B4;
}



  #global-actions > li > a {
    border-bottom-color: #0084B4;
  }

  #global-actions > li:hover > a,
  #global-actions > li > a:focus,
  .nav.right-actions > li > a:hover,
  .nav.right-actions > li > button:hover,
  .nav.right-actions > li > a:focus,
  .nav.right-actions > li > button:focus {
    color: #0084B4;
  }


  /* hover state for photo select button*/
  .photo-selector:not(.disabled):hover .btn,
  .icon-btn:hover,
  .icon-btn:active,
  .icon-btn.active,
  .icon-btn.enabled {
    border-color: #0084B4;
    border-color: rgba(0,132,180,.5);
    color: #0084B4;
  }

  /* hover state for photo select button*/
  .photo-selector:not(.disabled):hover .btn,
  .icon-btn:hover {
    background-image: linear-gradient(rgba(255,255,255,0), rgba(0,132,180,.1));
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00FFFFFF', endColorstr='#190084B4'); /* IE8-9 */
  }

  .icon-btn.disabled,
  .icon-btn.disabled:hover,
  .icon-btn[disabled],
  .icon-btn[aria-disabled=true] {
    color: #0084B4;
  }

  /* tweet-btn can have primary-btn class as well so the following rules ensure that the correct background color is applied */
  .tweet-btn,
  .tweet-btn:focus {
    background-color: #0084B4;
    background: rgba(0,132,180,.8);
  }

  .tweet-btn:hover,
  .tweet-btn:active,
  .tweet-btn.active {
    background-color: #0084B4;
  }

  .tweet-btn.btn.disabled,
  .tweet-btn.btn.disabled:hover,
  .tweet-btn.btn[disabled],
  .tweet-btn.btn[aria-disabled=true] {
    background: #0084B4;
  }

  .btn:focus,
  .btn.focus,
  .Button:focus {
    box-shadow:
      0 0 0 1px #fff,
      0 0 0 3px rgba(0, 132, 180, 0.5);
  }

  .selected-stream-item:focus {
    box-shadow: 0 0 0 3px rgba(0, 132, 180, 0.5);
  }

  .ProfileTweet.is-actionable {
    box-shadow: 0 0 0 2px rgba(0, 132, 180, 0.5);
  }

  .global-dm-nav.new.with-count .dm-new {
    background: #0084B4;
  }

  .global-nav .people .count .count-inner {
    background: #0084B4;
  }

  .dropdown-menu li > a:hover,
  .dropdown-menu li > a:focus,
  .dropdown-menu .dropdown-link:hover,
  .dropdown-menu .dropdown-link:focus,
  .dropdown-menu li:hover .dropdown-link,
  .dropdown-menu li:focus .dropdown-link,
  .dropdown-menu .typeahead-recent-search-item.selected,
  .dropdown-menu .typeahead-saved-search-item.selected,
  .dropdown-menu .selected a,
  .dropdown-menu .dropdown-link.selected {
    background-color: #0084B4;
  }

/* give tweet boxes 10% of the users link color as background */
.home-tweet-box,
.rosetta .dm-tweetbox,
.rosetta .WebToast-buffer--altColor,
.content-main .conversations-enabled .expansion-container .inline-reply-tweetbox {
  background-color: #E5F2F7;
}

.conversations-enabled .inline-reply-caret .caret-inner {
  border-bottom-color: #E5F2F7;
}

/* give tweet boxes an outline using the users link color */
.tweet-box[contenteditable="true"] {
  border-color: rgba(0,132,180,0.25);
}

input:focus,
textarea:focus,
div[contenteditable="true"]:focus,
div[contenteditable="true"].fake-focus {
  border-color: #66B5D2;
  box-shadow: inset 0 0 0 1px rgba(0, 132, 180, 0.7);
}

.currently-dragging.modal-enabled .modal .tweet-box,
.currently-dragging:not(.modal-enabled) .tweet-content .tweet-box,
body.supports-drag-and-drop .tweet-form.upload-photo-hover.drag-and-drop .tweet-box,
.tweet-box[contenteditable="true"]:focus {
  border-color: #99CDE1;
  box-shadow: none;
}




s,
.pretty-link:hover s,
.pretty-link:focus s,
.stream-item-activity-me .latest-tweet .tweet-row a:hover s,
.stream-item-activity-me .latest-tweet .tweet-row a:focus s {
    color: #66B5D2;
}



.vellip,
.vellip:before,
.vellip:after,
.conversation-module > li:after,
.conversation-module > li:before {
    background-color: #66B5D2;
}




.tweet .sm-reply,
.tweet .sm-rt,
.tweet .sm-fav,
.tweet .sm-image,
.tweet .sm-video,
.tweet .sm-audio,
.tweet .sm-geo,
.tweet .sm-in,
.tweet .sm-trash,
.tweet .sm-more,
.tweet .sm-page,
.tweet .sm-embed,
.tweet .sm-summary,
.tweet .sm-chat,

.timelines-navigation .active .profile-nav-icon,
.timelines-navigation .profile-nav-icon:hover,
.timelines-navigation .profile-nav-link:focus .profile-nav-icon,

.sm-top-tweet,

.metadata a.tweet-geo-text:hover .sm-geo,


.discover-item .js-action-card-search:hover .sm-search,
.discover-item .js-action-card-search:focus .sm-search {
    background-color: #0084B4;
}



.tweet-action-icons .tweet .tweet-actions .sm-reply, .tweet-action-icons .tweet.opened-tweet .tweet-actions .sm-reply,
.tweet-action-icons .tweet .tweet-actions .sm-rt, .tweet-action-icons .tweet.opened-tweet .tweet-actions .sm-rt,
.tweet-action-icons .tweet .tweet-actions .sm-fav, .tweet-action-icons .tweet.opened-tweet .tweet-actions .sm-fav,
.tweet-action-icons .tweet .tweet-actions .sm-trash, .tweet-action-icons .tweet.opened-tweet .tweet-actions .sm-trash,
.tweet-action-icons .tweet .tweet-actions .sm-more, .tweet-action-icons .tweet.opened-tweet .tweet-actions .sm-more {
    background-color: #66B5D2;
}

.persistent-tweet-actions.tweet-action-icons .tweet:hover .tweet-actions .sm-reply,
.persistent-tweet-actions.tweet-action-icons .tweet:hover .tweet-actions .sm-rt,
.persistent-tweet-actions.tweet-action-icons .tweet:hover .tweet-actions .sm-fav,
.persistent-tweet-actions.tweet-action-icons .tweet:hover .tweet-actions .sm-trash,
.persistent-tweet-actions.tweet-action-icons .tweet:hover .tweet-actions .sm-more {
    background-color: #66B5D2;
}

.tweet-action-icons .stream .tweet .tweet-actions .sm-reply:hover, .tweet-action-icons .stream .tweet .tweet-actions a:focus .sm-reply,
.tweet-action-icons .stream .tweet .tweet-actions .sm-rt:hover, .tweet-action-icons .stream .tweet .tweet-actions a:focus .sm-rt,
.tweet-action-icons .stream .tweet .tweet-actions .sm-fav:hover, .tweet-action-icons .stream .tweet .tweet-actions a:focus .sm-fav,
.tweet-action-icons .stream .tweet .tweet-actions .sm-trash:hover, .tweet-action-icons .stream .tweet .tweet-actions a:focus .sm-trash,
.tweet-action-icons .stream .tweet .tweet-actions .sm-more:hover, .tweet-action-icons .stream .tweet .tweet-actions a:focus .sm-more {
    background-color: #0084B4;
}


.enhanced-mini-profile .mini-profile .profile-summary {
  background-image: url(user_images/background.jpg);
}

.wrapper-profile .profile-card.profile-header .profile-header-inner {
  background-image: url(user_images/background.jpg);
}

  #global-tweet-dialog .modal-header {
    border-bottom: solid 1px rgba(0, 132, 180, .25);
  }

  #global-tweet-dialog .modal-tweet-form-container {
    background-color: #0084B4;
    background: rgba(0, 132, 180, .1);
  }

  .inline-reply-tweetbox {
    background-color: #E5F2F7;
  }

</style>

  
<style id="user-style-bachelorprjct-bg-img" class="js-user-style-bg-img">
  body.user-style-bachelorprjct {
        background-image: url(https://abs.twimg.com/images/themes/theme1/bg.png);
      background-position: left 40px;
      background-attachment: fixed;
      background-repeat: repeat;
        background-repeat: no-repeat;

      background-color: #C0DEED;
  }

    body.user-style-bachelorprjct .enhanced-mini-profile .mini-profile .profile-summary {
      background-image: url(user_images/background.jpg);
    }

    body.user-style-bachelorprjct .wrapper-profile .profile-card.profile-header .profile-header-inner {
      background-image: url(user_images/background.jpg);
    }

    body.user-style-bachelorprjct .profile-canopy .bg-img {
      background-image: url(https://abs.twimg.com/a/1394742182/img/t1/grey_header_web_retina.jpg);
    }

</style>



  </head>
  <body class="t1 logged-in user-style-bachelorprjct enhanced-mini-profile" 
data-fouc-class-names="swift-loading"
 dir="ltr">
      <script id="swift_loading_indicator">
        document.body.className=document.body.className+" "+document.body.getAttribute("data-fouc-class-names");
      </script>
    <div id="doc" class="route-home">
        <div class="topbar js-topbar">
  <div id="banners" class="js-banners">
  </div>
  <div class="global-nav" data-section-term="top_nav">
    <div class="global-nav-inner">
      <div class="container">


          
          <h1 class="Icon Icon--bird bird-topbar-etched" style="display: inline-block; width: 24px; height: 21px;">
            <span class="visuallyhidden">Twitter</span>
          </h1>

            
            <div role="navigation" style="display: inline-block;"><ul class="nav js-global-actions" id="global-actions" ><li id="global-nav-home" class="home active" data-global-action="home"> <a class="js-nav" href="/home.html" data-component-term="home_nav" data-nav="home" title="Home"> <span class="Icon Icon--home Icon--large"></span> <span class="text">Home</span> </a> </li> <li class="people notifications" data-global-action="connect"> <a class="js-nav" href="interactions.html" data-component-term="connect_nav" data-nav="connect" title="Notifications">  <span class="Icon Icon--notifications Icon--large"></span> <span class="text">Notifications</span>    </a> </li><li class="profile" data-global-action="profile"> <a class="js-nav" href="profile.php" data-component-term="profile_nav" data-nav="profile" title="Me"> <span class="Icon Icon--me Icon--large"></span> <span class="text">Me</span> </a> </li> </ul></div>

          
          <div class="pull-right" style="display: inline-block;"> <div role="search">
  <form class="form-search"  method="Post" action="searchaction.php" id="global-nav-search">
    <label class="visuallyhidden" for="search-query">Search query</label>
    <input class="search-input" type="text" id="search-query" name="searchtext" placeholder="Search" name="q" autocomplete="off" spellcheck="false">
    <span class="search-icon">
      <button type="submit" name="searchsub" value="searchsub" class="Icon Icon--search nav-search">
        <span class="visuallyhidden">
          
          Search
        </span>
      </button>
    </span>
    <input disabled="disabled" class="search-input search-hinting-input" type="text" id="search-query-hint" autocomplete="off" spellcheck="false">
      <div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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


    <ul role="presentation" class="typeahead-items typeahead-accounts social-context js-typeahead-accounts">
  
  <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-account-item js-selectable">
    
    <a role="option" class="js-nav" data-query-source="typeahead_click" data-search-query="" data-ds="account">
      <img class="avatar size32" alt="">
      <span class="typeahead-user-item-info">
        <span class="fullname"></span>
        <span class="js-verified hidden"><span class="icon verified"><span class="visuallyhidden">Verified account</span></span></span>
        <span class="username"><s>@</s><b></b></span>
      </span>
      <span class="typeahead-social-context"></span>
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
</div> <ul class="nav right-actions"> <li class="dm-nav"> <button type="button" class="global-dm-nav js-tooltip" data-placement="bottom" title="Direct messages"> <span class="Icon Icon--dm Icon--large"></span> <span class="dm-new"></span> </button> </li> <li class="me dropdown session js-session" data-global-action="t1me" id="user-dropdown"> <a href="/settings/account" class="js-tooltip settings dropdown-toggle js-dropdown-toggle" id="user-dropdown-toggle" title="Settings and help" data-placement="bottom"> <span class="Icon Icon--cog Icon--large"></span> <span class="visuallyhidden">Settings and help</span> </a>   <div class="dropdown-menu">
    <div class="dropdown-caret">
      <span class="caret-outer"></span>
      <span class="caret-inner"></span>
    </div>
    <ul>
      
      <li class="current-user" data-name="profile">
        

<a href="/settings/profile"
   class="account-summary account-summary-small"
   data-nav="edit_profile">
  <div class="content">
    <div class="account-group js-mini-current-user" data-user-id="2394399241" data-screen-name="bachelorprjct">
      <img class="avatar size32" src="/images/egg.png" alt="" data-user-id="2394399241">
      <b class="fullname">replicauser</b>
      <span class="screen-name hidden" dir="ltr">@bachelorprjct</span>
      <small class="metadata">
          Edit profile
          
      </small>
    </div>
  </div>
</a>

      </li>

      <li class="dropdown-divider"></li>
      
      <li data-name="lists"><a href="/bachelorprjct/lists" data-nav="all_lists">Lists</a></li>
      <li class="dropdown-divider"></li>

      

      
      <li><a href="//support.twitter.com" data-nav="help_center">Help</a></li>

        
        <li class="js-keyboard-shortcut-trigger" data-nav="shortcuts">
          <button type="button" class="dropdown-link">Keyboard shortcuts</button>
        </li>

      

      

      


      <li class="dropdown-divider"></li>

      
      <li><a href="/settings/account" data-nav="settings" class="js-nav">Settings</a></li>

      
      <li class="js-signout-button" id="signout-button" data-nav="logout">
        <button type="button" class="dropdown-link">Sign out</button>
        <form class="dropdown-link-form signout-form" id="signout-form" action="/logout" method="POST">
          <input type="hidden" value="33c60735096af0a13084308a7f93d9493e74f11c" name="authenticity_token" class="authenticity_token">
          <input type="hidden" name="reliability_event" class="js-reliability-event">
          <input type="hidden" name="scribe_log">
        </form>
      </li>

    </ul>
  </div>
 </li>  <li role="complementary" aria-labelledby="global-new-tweet-button" class="topbar-tweet-btn"> <button id="global-new-tweet-button" type="button" class="js-global-new-tweet js-tooltip btn primary-btn tweet-btn" data-placement="bottom" data-component-term="new_tweet_button" title="Compose new Tweet"> <span class="Icon Icon--tweet Icon--large"></span> <span class="visuallyhidden">Compose new Tweet</span> </button> </li>  </ul> </div>


      </div>
    </div>
  </div>

</div>

        <div id="page-outer">
          <div id="page-container" class="wrapper wrapper-home white">
                <div class="BannersContainer">
        
        
        
        
    
    
  </div>

            <div class="dashboard   ">

      <div class="module mini-profile">
  <div class="flex-module profile-summary js-profile-summary">
    <div class="profile-header-inner-overlay"></div>
      

<a href="profile.php"
   class="account-summary account-summary-small js-nav"
   data-nav="profile">
  <div class="content">
    <div class="account-group js-mini-current-user" data-user-id="2394399241" data-screen-name="bachelorprjct">
      <img class="avatar size32" src="images/egg.png" alt="" data-user-id="2394399241">
      <b class="fullname"><?php echo $username;?></b>
      <span class="screen-name hidden" dir="ltr">@<?php echo $_SESSION['username'];?></span>
      <small class="metadata">
          
          View my profile page
      </small>
    </div>
  </div>
</a>

        <div class="js-mini-profile-stats-container mini-profile-stats-container">
            <ul class="stats js-mini-profile-stats " data-user-id="2394399241">
  <li><a class="js-nav" href="profile.php" data-element-term="tweet_stats" data-nav="profile" data-is-compact="false">  Tweets<strong title="0" class="js-mini-profile-stat">0</strong>
</a></li>
  <li><a class="js-nav" href="/async/following1.php" data-element-term="following_stats" data-nav="following" data-is-compact="false">  Following<strong title="1" class="js-mini-profile-stat">1</strong>
</a></li>
  <li><a class="js-nav" href="/async/followers1.php" data-element-term="follower_stats" data-nav="followers" data-is-compact="false">    Followers<strong title="0" class="js-mini-profile-stat">0</strong>
</a></li>
</ul>

        </div>
  </div>



      <div class="home-tweet-box tweet-box component tweet-user">
          <form class="tweet-form condensed "
      method="post"
      action="homeaction.php">
  <input type="hidden" name="post_authenticity_token" class="auth-token">
  <input type="hidden" name="iframe_callback" class="iframe-callback">
  <input type="hidden" name="in_reply_to_status_id" class="in-reply-to-status-id">
  <input type="hidden" name="impression_id" class="impression-id">
  <input type="hidden" name="earned" class="earned">
  <input type="hidden" name="page_context" class="page-context">

  <span class="inline-reply-caret">
    <span class="caret-inner"></span>
  </span>

  <div class="tweet-content">
    <span class="icon add-photo-icon hidden"></span>
    
    <span class="icon nav-tweet hidden"></span>
    <span class="tweet-drag-help tweet-drag-photo-here hidden">Drag photo here</span>
    <span class="tweet-drag-help tweet-or-drag-photo-here hidden">Or drag photo here</span>
    <label class="visuallyhidden" for="tweet-box-mini-home-profile" id="tweet-box-mini-home-profile-label">Tweet text</label>

    
    <div aria-labelledby="tweet-box-mini-home-profile-label" id="tweet-box-mini-home-profile" class="tweet-box rich-editor " contenteditable="true" spellcheck="true" role="textbox"
      aria-multiline="true"></div>
    <div class="rich-normalizer"></div>

    


<div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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


    
    <textarea class="tweet-box-shadow" name="status"></textarea>

    
    <div class="thumbnail-container">
      <div class="preview">
        <button type="button" class="dismiss js-dismiss" tabindex="-1">
  <span class="icon dismiss-white">
    <span class="visuallyhidden">
      Dismiss
    </span>
  </span>
</button>

        <span class="filename"></span>
      </div>
      <div class="preview-message">Image will appear as a link</div>
    </div>

  </div>

  <div class="toolbar js-toolbar">
    <div class="tweet-box-extras">

        <div class="photo-selector">
  <button aria-hidden="true" class="btn icon-btn" type="button" tabindex="-1">
    <span class="tweet-camera Icon Icon--camera"></span>
    <span class="text">Add photo</span>
  </button>
  <div class="image-selector">
    <input type="hidden" name="media_data_empty" class="file-data">
    <label>
      <span class="visuallyhidden">Add Photo</span>
      <input type="file" name="media_empty" class="file-input js-tooltip" tabindex="-1" title="Add Photo">
    </label>
    <div class="swf-container"></div>
  </div>
</div>


        <div class="geo-picker">
  <button class="btn geo-picker-btn icon-btn js-tooltip" type="button" tabindex="-1" title="Add location">
    <span class="Icon Icon--geo"></span>
    <span class="text geo-status">Add location</span>
  </button>
  <span class="dropdown-container"></span>
  <input type="hidden" name="place_id">
</div>


    </div>
    <div class="tweet-button">
      <span class="spinner"></span>
      <span class="tweet-counter">140</span>
      <button class="btn primary-btn tweet-btn " type="submit" name="tweetsub" value="tweetsub" >
  <span class="button-text tweeting-text">
    <span class="Icon Icon--tweet"></span>
    Tweet
  </span>
  <span class="button-text messaging-text">
    <span class="Icon Icon--dm Icon--small"></span>
    Send message
  </span>
</button>
    </div>
  </div>
</form>

      </div>
</div>



        <div class="module wtf-module js-wtf-module  ">

  <div class="flex-module">

    <div class="flex-module-header">
      <h3>Who to follow</h3>
        <small>&middot; </small>
        <button type="button" class="btn-link js-refresh-suggestions"><small>Refresh</small></button>
      
          <small class="view-all">&middot; <a class="js-view-all-link" href="/who_to_follow/suggestions" data-element-term="view_all_link">View all</a></small>
    </div>

    <div class="js-recommended-followers dashboard-user-recommendations flex-module-inner" data-section-id="wtf">
    </div>

      <div class="flex-module-footer">
        <a href="/who_to_follow/interests" class="js-interests-link" data-element-term="interests_link">
        Popular accounts
        </a> &middot; <a href="/who_to_follow/import" class="js-find-friends-link" data-element-term="import_link">Find friends</a>
      </div>
  </div>
  
</div>
<div class="module trends hidden">
  <div class="trends-inner">
    <div class="flex-module trends-container  ">
  <div class="flex-module-header">
    
    <h3>
      <span class="trend-location js-trend-location">
          Worldwide trends
      </span>
    </h3>
    <small>&middot; <a href="#" data-modal="change-trends" class="change-trends js-trend-toggle">Change</a></small>
  </div>
  <div class="flex-module-inner">
    <ul class="trend-items js-trends">
    </ul>
  </div>
</div>
</div>
</div>
  <div class="Footer module ">
  <div class="flex-module">
    <div class="flex-module-inner js-items-container">
      <ul class="u-cf">
        <li class="Footer-item Footer-copyright copyright">&copy; 2014 Twitter</li>
        <li class="Footer-item"><a class="Footer-link" href="/about">About</a></li>
        <li class="Footer-item"><a class="Footer-link" href="//support.twitter.com">Help</a></li>
          <li class="Footer-item"><a class="Footer-link" href="/tos">Terms</a></li>
          <li class="Footer-item"><a class="Footer-link" href="/privacy">Privacy</a></li>
            <li class="Footer-item"><a class="Footer-link" href="//support.twitter.com/articles/20170514">Cookies</a></li>
          <li class="Footer-item"><a class="Footer-link" href="//support.twitter.com/articles/20170451">Ads info</a></li>
          <li class="Footer-item"><a class="Footer-link" href="//about.twitter.com/press/brand-assets">Brand</a></li>
          <li class="Footer-item"><a class="Footer-link" href="https://blog.twitter.com">Blog</a></li>
          <li class="Footer-item"><a class="Footer-link" href="http://status.twitter.com">Status</a></li>
          <li class="Footer-item"><a class="Footer-link" href="https://about.twitter.com/products">Apps</a></li>
          <li class="Footer-item"><a class="Footer-link" href="/jobs">Jobs</a></li>
          <li class="Footer-item"><a class="Footer-link" href="//ads.twitter.com/start?ref=gl-tw-tw-twitter-advertise">Advertise</a></li>
          <li class="Footer-item"><a class="Footer-link" href="https://business.twitter.com">Businesses</a></li>
          <li class="Footer-item"><a class="Footer-link" href="//media.twitter.com">Media</a></li>
          <li class="Footer-item"><a class="Footer-link" href="//dev.twitter.com">Developers</a></li>
      </ul>
    </div>
  </div>
</div>
</div>
  <div class="component wtf-module" id="empty-timeline-recommendations">
  <div class="content-main empty-timeline big-avatar-list breakable ">
    <div class="content-header">
      <div class="header-inner empty-timeline-header">
        <div class="pull-right"><button type="button" class="js-done btn-link" disabled>Close</button></div>
        <h2 class="header-text">
          Here are some people you might enjoy following.
        </h2>
        <div>
          <button type="button" class="btn-link js-refresh-suggestions">Refresh</button> &middot;
          <a class="view-all-suggestions" href="/who_to_follow/suggestions">View all</a>
        </div>
      </div>
    </div>
 <div class="empty-timeline-footer content-no-header">
      <ul class="clearfix js-recommended-followers">  
      </ul>
    </div>
  </div>
</div>

<div role="main" aria-labelledby="content-main-heading" class="content-main  " id="timeline">
  <div class="content-header">
    <div class="header-inner">
      <h2 id="content-main-heading" class="js-timeline-title">Tweets</h2>
    </div>
  </div>
    <div class="stream-container conversations-enabled persistent-inline-actions light-inline-actions"
    data-max-id="10036853914" data-since-id="345573022779990016">
    <div class="stream home-stream">
      <ol class="stream-items js-navigable-stream" id="stream-items-id"> 
       




<!-- TWEET START -->
<?php

foreach($arr["feeds"] as $follower)
{
	
 echo '
	<li id="ref_tweet" class="js-stream-item stream-item stream-item expanding-stream-item 
" data-item-id="448151630794723328" id="stream-item-tweet-448151630794723328" data-item-type="tweet">
 <div class="tweet original-tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable js-original-tweet  
" data-feedback-key="stream_status_448151630794723328" data-tweet-id="448151630794723328" data-item-id="448151630794723328" data-screen-name="',$follower['creator']['username'],'" data-name="Carl Bildt" data-user-id="18549724" data-expanded-footer="&lt;div class=&quot;js-tweet-details-fixer tweet-details-fixer&quot;&gt;&lt;div class=&quot;entities-media-container js-media-container&quot; style=&quot;min-height:0px&quot;&gt;&lt;/div&gt;&lt;div class=&quot;js-machine-translated-tweet-container&quot;&gt;&lt;/div&gt;&lt;div class=&quot;js-tweet-stats-container tweet-stats-container &quot;&gt;&lt;/div&gt;&lt;div class=&quot;client-and-actions&quot;&gt;&lt;span class=&quot;metadata&quot;&gt;&lt;span&gt;',$follower['created_at'],'&lt;/span&gt;&amp;middot; &lt;a class=&quot;permalink-link js-permalink js-nav&quot; href=&quot;/',$follower['creator']['username'],'/status/448151630794723328&quot;  tabindex=&quot;-1&quot;&gt;Details&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;
" data-you-follow="false" data-you-block="false">

    
    <div class="context">
</div>  
    <div class="content">
    <div class="stream-item-header">
          <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="/',$follower['creator']['username'],'" data-user-id="18549724">
    <img class="avatar js-action-profile-avatar" src="images/egg.png" alt="">
    <strong class="fullname js-action-profile-name show-popup-with-id">',$follower['creator']['name'],'</strong>
    <span>‏</span><span class="username js-action-profile-name"><s>@</s><b>',$follower['creator']['username'],'</b></span>
   </a>
<small class="time">
    <a href="/',$follower['creator']['username'],'/status/448151630794723328" class="tweet-timestamp js-permalink js-nav js-tooltip" data-original-title="10:37 AM - 24 Mar 2014"><span class="_timestamp js-short-timestamp js-relative-timestamp" data-time="1395682649" data-long-form="true">',$follower['created_at'],'</span></a>
</small>
</div>
<p class="js-tweet-text tweet-text">',$follower['tweet_text'],'</p>
<div class="stream-item-footer clearfix">
<a class="details with-icn js-details" href="/',$follower['creator']['username'],'/status/448151630794723328">
  <span class="details-icon js-icon-container">
    
  </span>
  <b>
    <span class="expand-stream-item js-view-details">
      
        <span class="expand-action-wrapper">
          Expand
        </span>
    </span>
    <span class="collapse-stream-item js-hide-details">
      Collapse
    </span>
  </b>
</a>
<ul class="tweet-actions js-actions" style="display: inline-block">
    <li class="action-reply-container">
      <a role="button" class="with-icn js-action-reply js-tooltip" data-modal="tweet-reply" href="#">
        <span class="Icon Icon--reply"></span>
        <b>Reply</b>
      </a>
    </li>
    <li class="action-rt-container js-toggle-state js-toggle-rt">
      <a role="button" class="with-icn retweet js-tooltip" data-modal="tweet-retweet" href="#">
        <span class="Icon Icon--retweet"></span>
        <b>Retweet</b>
      </a>
      <a role="button" class="with-icn undo-retweet js-tooltip" data-modal="tweet-retweet" href="#">
        <span class="Icon Icon--retweet"></span>
        <b>Retweeted</b>
      </a>
    </li>
    <li class="action-del-container">
      <a role="button" class="with-icn js-action-del js-tooltip" href="#">
        <span class="Icon Icon--delete"></span>
        <b>Delete</b>
      </a>
    </li>
    <li class="action-fav-container js-toggle-state js-toggle-fav">
      <a role="button" class="with-icn favorite js-tooltip" href="#" name="tweetsub" value="tweetsub">
        <span class="Icon Icon--favorite"></span>
        <b>Favorite</b>
      </a>
      <a role="button" class="with-icn unfavorite js-tooltip" href="#">
        <span class="Icon Icon--favorite"></span>
        <b>Favorited</b>
      </a>
    </li>

      <li class="more-tweet-actions">
  <div class="action-more-container">
    <div class="dropdown">
        <button type="button" class="btn-link with-icn dropdown-toggle js-dropdown-toggle js-tooltip">
          <span class="Icon Icon--dots"></span>
          <b>More</b>
        </button>
      <div class="dropdown-menu">
  <div class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <ul>
      <li class="embed-link js-embed-tweet js-actionEmbedTweet" data-nav="embed_tweet">
        <button type="button" class="dropdown-link">Embed Tweet</button>
      </li>
      <li class="report-tweet-link js-report-tweet js-actionReportTweet" data-nav="report_tweet">
        <button type="button" class="dropdown-link">Report Tweet</button>
      </li>
  </ul>
</div>
</div>
</div>
</li>
</ul>
</div>
<div class="expanded-content js-tweet-details-dropdown">
</div>
</div>
</div>
</li>
';
}
?>     
<!-- TWEET END -->



     
      </ol>
        <div class="stream-footer ">
  <div class='timeline-end has-items '>
    <div class="stream-end">
  <div class="stream-end-inner ">
        <span class="Icon Icon--large Icon--logo"></span>

    <p class="empty-text">
            Your timeline is currently empty. Follow people and topics you find interesting to see their Tweets in your timeline.
    </p>


          <p><button type='button' class='btn-link back-to-top hidden'>Back to top &uarr;</button></p>

  </div>
</div>

    <div class="stream-loading">
  <div class="stream-end-inner">
    <span class="spinner" title="Loading..."></span>
  </div>
</div>

  </div>
</div>
<div class="stream-fail-container">
    <div class="js-stream-whale-end stream-whale-end stream-placeholder centered-placeholder">
  <div class="stream-end-inner">
    <h2 class="title">Loading seems to be taking a while.</h2>
    <p>
      Twitter may be over capacity or experiencing a momentary hiccup. <a href="#" class="try-again-after-whale">Try again</a> or visit <a target="_blank" href="http://status.twitter.com">Twitter Status</a> for more information.
    </p>
  </div>
</div>
</div>

      <ol class="hidden-replies-container"></ol>
      <div class="stream-autoplay-marker">
        <span class="icon arrow"></span>
        <span class="text"></span>
      </div>
    </div>
  </div>
    <div id="sensitive_flag_dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-small draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Flag this media</h3>
      </div>
      <div class="modal-body">
        <p class="sensitive-title">This has already been marked as containing sensitive content.</p>
        <label class="checkbox" for="sensitive-illegal-checkbox">
          <input type="checkbox" id="sensitive-illegal-checkbox" value="illegal">
          Flag this as containing potentially illegal content.
        </label>
      </div>
      <div class="modal-footer">
        <button id="submit_flag_confirmation" type="button" class="btn">Submit</button>
        <button id="cancel_flag_confirmation" type="button" class="btn primary-btn js-close">Cancel</button>

        <div class="sensitive-confirmation">
          <a class="sensitive-learn-more" target="_blank" href="//support.twitter.com/articles/20069937">Learn more about flagging media</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-overlay"></div>
</div>



</div>
<div id="trends_dialog" class="trends-dialog modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
          <h3 class="modal-title">
            Trends
            
          </h3>
      </div>

      <div class="modal-body">

          <div class="trends-personalized content-placeholder">
  <h2 class="title">Trends tailored just for you.</h2>
  <p>Trends offer a unique way to get closer to what you care about. They are tailored for you based on your location and who you follow.</p>
  <p class="placeholder-actions">
    <button type="button" class="btn customize-by-location">Change</button>
    <button type="button" class="btn primary-btn done">Keep tailored Trends</button>
  </p>
</div>

        <div class="trends-dialog-error">
          <p></p>
        </div>

        <div class="trends-wrapper" id="trends_dialog_content">
          
          <div class="loading">
            <span class="spinner-bigger"></span>
          </div>
        </div>
      </div>
        <div class="modal-footer trends-by-location">
            <button type="button" class="btn select-default" data-personalized="true">Get tailored Trends</button>
<button type="button" class="btn primary-btn done">Done</button>

        </div>
    </div>
  </div>
</div>
<div id="import-loading-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-large draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">We’re loading your contacts…</h3>
      </div>

      <div class="modal-body">
        <span class="spinner" title="Loading..."></span>

        <p>
          (This can take a while if you’ve got a large address book.)
        </p>
      </div>
    </div>
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


  <div id="dm_dialog" class="modal-container dm-conversation-list">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable twttr-dialog dm-dialog">
    <div id="dm_dialog_conversation_list" class="modal-content">
  
  <div class="twttr-dialog-header modal-header">
    <h3>Direct messages</h3>
    <div class="dm-toolbar">
      <div class="mark-read js-mark-read">
        <button type="button" class="btn mark-all-read js-mark-all-read js-tooltip small" title="Mark all as read">
          <span class="Icon Icon--markAllRead"></span>
        </button>
        <button type="button" class="btn dm-new-button dm-header-new js-initial-focus small">New message</button>
      </div>
      <div class="mark-read-confirm js-mark-read-confirm">
        <button type="button" class="btn js-prompt-cancel small">Cancel</button>
        <button type="button" class="btn caution-btn js-prompt-ok js-initial-focus small">Mark all as read</button>
      </div>
    </div>
  </div>

  
  <div class="twttr-dialog-inside">
    <div class="twttr-dialog-body clearfix">
      <div class="dm-error js-dm-error">
  <a href="#" class="js-dismiss">
    <span class="icon close"></span>
  </a>
  <span class="dm-error-text"></span>
</div>

      <div class="twttr-dialog-content">
        <div class="dm-threads js-dm-threads js-modal-scrollable js-twttr-dialog-not-draggable">
          <ul class="dm-thread-list js-dm-thread-list">
            <div class="dm-placeholder-empty dm-no-messages">
  <p><strong>You don't have any messages yet.</strong></p>
  <p>Direct messages are 140 characters, private, and can be sent to any user who follows you on Twitter.</p>
</div>
          </ul>
        </div>
      </div>

      <div class="twttr-dialog-footer">
  Tip: you can send a message to anyone who follows you. <a href="http://support.twitter.com/groups/31-twitter-basics/topics/109-tweets-messages/articles/14606-what-is-a-direct-message-dm" target="_blank" class="learn-more">Learn more</a>
</div>

    </div>
  </div>
</div>
    <div id="dm_dialog_conversation" class="modal-content">
  
  <div class="twttr-dialog-header modal-header">
    <h3><a class="js-dm-header-title" href="#">Direct messages</a> › with <span class="dm_dialog_real_name"></span></h3>
  </div>

  
  <div class="twttr-dialog-inside">
    <div class="twttr-dialog-body clearfix">
        <div class="dm-error js-dm-error">
  <a href="#" class="js-dismiss">
    <span class="icon close"></span>
  </a>
  <span class="dm-error-text"></span>
</div>

      <div class="twttr-dialog-content">
      </div>
        <form class="dm-tweetbox tweet-form"
    method="post"
    target="dm-post-iframe"
    action="//upload.twitter.com/i/media/upload.iframe"
    enctype="multipart/form-data"
>
  <div class="tweet-content">
      <input type="hidden" name="authenticity_token" class="auth-token">
      <span class="tweet-drag-help tweet-drag-photo-here hidden">Drag photo here</span>
      <span class="tweet-drag-help tweet-or-drag-photo-here hidden">Or drag photo here</span>
    <label class="visuallyhidden" for="tweet-box-dm-conversation" id="tweet-box-dm-conversation-label">Direct message text</label>
    <div id="tweet-box-dm-conversation" aria-labelledby="tweet-box-dm-conversation-label" class="tweet-box rich-editor" contenteditable="true" spellcheck="true" role="textbox" aria-multiline="true"></div>
    <div class="rich-normalizer"></div>

    
    <div class="thumbnail-container">
      <div class="preview">
        <button type="button" class="dismiss js-dismiss" tabindex="-1">
  <span class="icon dismiss-white">
    <span class="visuallyhidden">
      Dismiss
    </span>
  </span>
</button>

        <span class="filename"></span>
      </div>
    </div>
  </div>
  <div class="toolbar js-toolbar">
      <div class="tweet-box-extras">
        <div class="photo-selector">
  <button aria-hidden="true" class="btn icon-btn" type="button" tabindex="-1">
    <span class="tweet-camera Icon Icon--camera"></span>
    <span class="text">Add photo</span>
  </button>
  <div class="image-selector">
    <input type="hidden" name="media_data_empty" class="file-data">
    <label>
      <span class="visuallyhidden">Add Photo</span>
      <input type="file" name="media_empty" class="file-input js-tooltip" tabindex="-1" title="Add Photo">
    </label>
    <div class="swf-container"></div>
  </div>
</div>
      </div>
    <div class="tweet-button">
      <span class="spinner"></span>
      <span class="tweet-counter">140</span>
      <button class="btn tweet-action primary-btn messaging tweet-btn disabled" type="submit">
        <span class="button-text messaging-text">
          <span class="Icon Icon--dm"></span>
          Send message
        </span>
      </button>
    </div>
  </div>
  <div class="dm-delete-confirm js-dm-delete-confirm">
    <p>Are you sure you want to delete this message?</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Delete message</button>

  </div>
    <div class="dm-spam-confirm js-dm-spam-confirm">
      <p>Do you want to report this message as spam?</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Report spam</button>
    </div>
    <div class="dm-abuse-confirm js-dm-abuse-confirm">
      <p>
  Do you want to mark this message as abusive?
  <a href="//support.twitter.com/articles/15794-online-abuse" target="_blank">Learn more</a>
</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Mark as abusive</button>
    </div>
</form>
    </div>
  </div>
</div>
    <div id="dm_dialog_new" class="modal-content">
  
  <div class="twttr-dialog-header modal-header">
    <h3><a href="#">Direct messages</a> › New</h3>
  </div>

  
  <div class="twttr-dialog-inside">
    <div class="twttr-dialog-body clearfix">
      <div class="dm-dialog-content">

        <div class="dm-to">
          <input class="dm-to-input twttr-directmessage-input js-initial-focus" type="text">
          <img class="avatar size24 selected-profile" src="https://abs.twimg.com/sticky/default_profile_images/default_profile_6_mini.png" data-default-img="https://abs.twimg.com/sticky/default_profile_images/default_profile_6_mini.png" alt="">
            


<div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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

        </div>

        <div class="dm-convo-placeholder">
          <div class="dm-error js-dm-error">
  <a href="#" class="js-dismiss">
    <span class="icon close"></span>
  </a>
  <span class="dm-error-text"></span>
</div>

        </div>

      </div>

        <form class="dm-tweetbox tweet-form"
    method="post"
    target="dm-post-iframe"
    action="//upload.twitter.com/i/media/upload.iframe"
    enctype="multipart/form-data"
>
  <div class="tweet-content">
      <input type="hidden" name="authenticity_token" class="auth-token">
      <span class="tweet-drag-help tweet-drag-photo-here hidden">Drag photo here</span>
      <span class="tweet-drag-help tweet-or-drag-photo-here hidden">Or drag photo here</span>
    <label class="visuallyhidden" for="tweet-box-dm-new-conversation" id="tweet-box-dm-new-conversation-label">Direct message text</label>
    <div id="tweet-box-dm-new-conversation" aria-labelledby="tweet-box-dm-new-conversation-label" class="tweet-box rich-editor" contenteditable="true" spellcheck="true" role="textbox" aria-multiline="true"></div>
    <div class="rich-normalizer"></div>

    
    <div class="thumbnail-container">
      <div class="preview">
        <button type="button" class="dismiss js-dismiss" tabindex="-1">
  <span class="icon dismiss-white">
    <span class="visuallyhidden">
      Dismiss
    </span>
  </span>
</button>

        <span class="filename"></span>
      </div>
    </div>
  </div>
  <div class="toolbar js-toolbar">
      <div class="tweet-box-extras">
        <div class="photo-selector">
  <button aria-hidden="true" class="btn icon-btn" type="button" tabindex="-1">
    <span class="tweet-camera Icon Icon--camera"></span>
    <span class="text">Add photo</span>
  </button>
  <div class="image-selector">
    <input type="hidden" name="media_data_empty" class="file-data">
    <label>
      <span class="visuallyhidden">Add Photo</span>
      <input type="file" name="media_empty" class="file-input js-tooltip" tabindex="-1" title="Add Photo">
    </label>
    <div class="swf-container"></div>
  </div>
</div>
      </div>
    <div class="tweet-button">
      <span class="spinner"></span>
      <span class="tweet-counter">140</span>
      <button class="btn tweet-action primary-btn messaging tweet-btn disabled" type="submit">
        <span class="button-text messaging-text">
          <span class="Icon Icon--dm"></span>
          Send message
        </span>
      </button>
    </div>
  </div>
  <div class="dm-delete-confirm js-dm-delete-confirm">
    <p>Are you sure you want to delete this message?</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Delete message</button>

  </div>
    <div class="dm-spam-confirm js-dm-spam-confirm">
      <p>Do you want to report this message as spam?</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Report spam</button>
    </div>
    <div class="dm-abuse-confirm js-dm-abuse-confirm">
      <p>
  Do you want to mark this message as abusive?
  <a href="//support.twitter.com/articles/15794-online-abuse" target="_blank">Learn more</a>
</p>
<button type="button" class="btn js-prompt-cancel">Cancel</button>
<button type="button" class="btn caution-btn js-prompt-ok js-initial-focus" data-message-id="">Mark as abusive</button>
    </div>
</form>
    </div>
  </div>
</div>

    <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

  </div>
</div>
<div class="modal-container dm-media-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable dm-media">
    <div class="modal-header">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <h2 class="modal-title">Photo</h2>
    </div>
    <div class="dm-media-preview"></div>
  </div>
</div>


  <div id="global-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title"></h3>
      </div>
      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>
      <div class="modal-tweet-form-container">
          <form class="tweet-form  "
      method="post"
      action="homeaction.php">
  <input type="hidden" name="post_authenticity_token" class="auth-token">
  <input type="hidden" name="iframe_callback" class="iframe-callback">
  <input type="hidden" name="in_reply_to_status_id" class="in-reply-to-status-id">
  <input type="hidden" name="impression_id" class="impression-id">
  <input type="hidden" name="earned" class="earned">
  <input type="hidden" name="page_context" class="page-context">

    <img class="inline-reply-user-image avatar size32" src="https://pbs.twimg.com/profile_images/445552102517927936/WVcMpYa4_normal.jpeg" alt="">
  <span class="inline-reply-caret">
    <span class="caret-inner"></span>
  </span>

  <div class="tweet-content">
    <span class="icon add-photo-icon hidden"></span>
    
    <span class="icon nav-tweet hidden"></span>
    <span class="tweet-drag-help tweet-drag-photo-here hidden">Drag photo here</span>
    <span class="tweet-drag-help tweet-or-drag-photo-here hidden">Or drag photo here</span>
    <label class="visuallyhidden" for="tweet-box-global" id="tweet-box-global-label">Tweet text</label>

    
    <div aria-labelledby="tweet-box-global-label" id="tweet-box-global" class="tweet-box rich-editor " contenteditable="true" spellcheck="true" role="textbox"
      aria-multiline="true"></div>
    <div class="rich-normalizer"></div>

    


<div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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


    
    <textarea class="tweet-box-shadow" name="status"></textarea>

    
    <div class="thumbnail-container">
      <div class="preview">
        <button type="button" class="dismiss js-dismiss" tabindex="-1">
  <span class="icon dismiss-white">
    <span class="visuallyhidden">
      Dismiss
    </span>
  </span>
</button>

        <span class="filename"></span>
      </div>
      <div class="preview-message">Image will appear as a link</div>
    </div>

  </div>

  <div class="toolbar js-toolbar">
    <div class="tweet-box-extras">

        <div class="photo-selector">
  <button aria-hidden="true" class="btn icon-btn" type="button" tabindex="-1">
    <span class="tweet-camera Icon Icon--camera"></span>
    <span class="text">Add photo</span>
  </button>
  <div class="image-selector">
    <input type="hidden" name="media_data_empty" class="file-data">
    <label>
      <span class="visuallyhidden">Add Photo</span>
      <input type="file" name="media_empty" class="file-input js-tooltip" tabindex="-1" title="Add Photo">
    </label>
    <div class="swf-container"></div>
  </div>
</div>


        <div class="geo-picker">
  <button class="btn geo-picker-btn icon-btn js-tooltip" type="button" tabindex="-1" title="Add location">
    <span class="Icon Icon--geo"></span>
    <span class="text geo-status">Add location</span>
  </button>
  <span class="dropdown-container"></span>
  <input type="hidden" name="place_id">
</div>


    </div>
    <div class="tweet-button">
      <span class="spinner"></span>
      <span class="tweet-counter">140</span> 
      <button class="btn primary-btn tweet-btn " type="submit" name="tweetsub" value="tweetsub" >
  <span class="button-text tweeting-text">
    <span class="Icon Icon--tweet"></span>
    Tweet
  </span>
  <span class="button-text messaging-text">
    <span class="Icon Icon--dm Icon--small"></span>
    Send message
  </span>
</button>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</div>



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
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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
        <h3 class="modal-title">Are you sure you want to block this user?</h3>
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
    <input type="text" class="text" name="name" value="" />
  </div>
  <div class="field" style="display:none">
    <label for="list-link">List link</label>
    <span></span>
  </div>
  <hr/>

  <div class="field">
    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <span class="help-text">Under 100 characters, optional</span>
  </div>
  <hr/>

  <div class="field">
    <label for="mode">Privacy</label>
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
  </div>
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


<div id="confirm_dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
        <p class="modal-body-text"></p>
      </div>
      <div class="modal-footer">
        <button class="btn js-close" id="confirm_dialog_cancel_button"></button>
        <button id="confirm_dialog_submit_button" class="btn primary-btn modal-submit"></button>
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


  
<div id="report-tweet-dialog" class="modal-container report-tweet-dialog">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title report-title">Report Tweet</h3>
        <h3 class="modal-title abuse-title">Select form</h3>
      </div>
      <div class="report-form">
        <div class="modal-body report-type-section controls">
          <fieldset class="control-group">
            <label class="radio">
              <input type="radio" value="spam" name="report_type" class="js-initial-focus">
              <span class="label-head">Spam</span>
              <p>This Tweet may be spam or from a spam account.</p>
            </label>
            <label class="radio">
              <input type="radio" value="compromised" name="report_type">
              <span class="label-head">Compromised</span>
              <p>This user may not be in control of their account.</p>
            </label>
            <label class="radio">
              <input type="radio" value="abusive" name="report_type">
              <span class="label-head">Abusive</span>
              <p>This Tweet may be in violation of the <a href="https://support.twitter.com/articles/18311-the-twitter-rules" target="_blank">Twitter Rules</a>. In order to file a report you must still choose and complete a form. Select this option to continue.</p>
            </label>
          </fieldset>
        </div>
        <div class="modal-body block-section controls">
          <fieldset class="control-group">
            <label class="checkbox">
              <input type="checkbox" name="block_user">
              <span class="label-head block-user-label"></span>
              <p><span class="block-user-text"></span> Learn more about what <a href="https://support.twitter.com/articles/117063-blocking-people-on-twitter" target="_blank">blocking</a> means.</p>
            </label>
          </fieldset>
        </div>
        <div class="modal-body submit-section">
          <div class="clearfix">
            <button class="btn primary-btn report-tweet-next-button" type="button">Next</button>
            <button class="btn primary-btn report-tweet-submit-button" type="button">Submit</button>
          </div>
        </div>
      </div>
      <div class="abuse-form">
        <div class="modal-body">
          <p>Please choose the topic that best defines your issue. Once you complete and submit the form, your report will be filed with Twitter.</p>
          <ul class="abuse-links">
            
            <li><a href="#" class="report-impersonation-link hide-focus" data-abuse-type="impersonation" target="_blank">Impersonation</a></li>
            <li><a href="#" class="report-trademark-link" data-abuse-type="trademark" target="_blank">Trademarks</a></li>
            <li><a href="#" class="report-harassment-link" data-abuse-type="harassment" target="_blank">Harassment</a></li>
            <li><a href="#" class="report-self-harm-link" data-abuse-type="report_self_harm" target="_blank">Report self harm</a></li>
            <li><a href="#" class="report-ads-link" data-abuse-type="report_an_ad" target="_blank">Report an ad</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>




  <div id="age-gate-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Enter your age</h3>
      </div>

      <div class="modal-body">
        <div class="age-gate-container">
          <p>To follow this account, you must be of legal drinking age. Please supply your date of birth.</p>
          <div class="age-gate-header">
            <p>Select your date of birth:</p>
          </div>
          <select id="age-gate-year"></select>
          <select id="age-gate-month"></select>
          <select id="age-gate-day"></select>
          <span class="age-gate-error hidden">
            <span class="icon error-x"></span>Required
          </span>
          <div class="age-gate-bottom">
            <span class="age-gate-privacy">
              <a href="/privacy">Privacy policy</a>
            </span>
          </div>
        </div>
      </div>

      <div class="modal-footer age-gate-footer">
        <button id="age-gate-dialog-submit-button" class="btn primary-btn age-gate-submit">Done</button>
      </div>
    </div>
  </div>
</div>



  <div id="leadgen-confirm-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">Close</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Confirmation</h3>
      </div>
      <div class="modal-body">
        <div class="leadgen-card-container">
          <div class="media">
            <iframe
              class="cards2-promotion-iframe"
              scrolling="no"
              frameborder="0"
              src="">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



    <div class="hidden">
  <iframe class="tweet-post-iframe" name="tweet-post-iframe"></iframe>
    <iframe class="dm-post-iframe" name="dm-post-iframe"></iframe>

  
  <div id="inline-reply-tweetbox">
      <form class="tweet-form  "
      method="post"
      action=""
      enctype="multipart/form-data">
  <input type="hidden" name="post_authenticity_token" class="auth-token">
  <input type="hidden" name="iframe_callback" class="iframe-callback">
  <input type="hidden" name="in_reply_to_status_id" class="in-reply-to-status-id">
  <input type="hidden" name="impression_id" class="impression-id">
  <input type="hidden" name="earned" class="earned">
  <input type="hidden" name="page_context" class="page-context">

    <img class="inline-reply-user-image avatar size32" src="https://pbs.twimg.com/profile_images/445552102517927936/WVcMpYa4_normal.jpeg" alt="">
  <span class="inline-reply-caret">
    <span class="caret-inner"></span>
  </span>

  <div class="tweet-content">
    <span class="icon add-photo-icon hidden"></span>
    
    <span class="icon nav-tweet hidden"></span>
    <span class="tweet-drag-help tweet-drag-photo-here hidden">Drag photo here</span>
    <span class="tweet-drag-help tweet-or-drag-photo-here hidden">Or drag photo here</span>
    <label class="visuallyhidden" for="tweet-box-template" id="tweet-box-template-label">Tweet text</label>

    
    <div aria-labelledby="tweet-box-template-label" id="tweet-box-template" class="tweet-box rich-editor " contenteditable="true" spellcheck="true" role="textbox"
      aria-multiline="true"></div>
    <div class="rich-normalizer"></div>

    


<div role="listbox" aria-hidden="true" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
      <div role="presentation" class="typeahead-concierge">
  <ul role="presentation" class="typeahead-items typeahead-concierge-list">
    
    <li role="presentation" class="typeahead-item typeahead-concierge-item">
      <a role="option" aria-describedby="concierge-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="concierge" tabindex="-1"></a>
    </li>
  </ul>
</div>
      <div role="presentation" class="typeahead-recent-searches">
  <h3 id="recent-searches-heading" class="typeahead-category-title recent-searches-title">Recent searches</h3><button type="button" tabindex="-1" class="btn-link clear-recent-searches">Clear All</button>
  <ul role="presentation" class="typeahead-items recent-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-recent-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">Remove</span></span>
      <a role="option" aria-describedby="recent-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="recent_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

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


    
    <textarea class="tweet-box-shadow" name="status"></textarea>

    
    <div class="thumbnail-container">
      <div class="preview">
        <button type="button" class="dismiss js-dismiss" tabindex="-1">
  <span class="icon dismiss-white">
    <span class="visuallyhidden">
      Dismiss
    </span>
  </span>
</button>

        <span class="filename"></span>
      </div>
      <div class="preview-message">Image will appear as a link</div>
    </div>

  </div>

  <div class="toolbar js-toolbar">
    <div class="tweet-box-extras">

        <div class="photo-selector">
  <button aria-hidden="true" class="btn icon-btn" type="button" tabindex="-1">
    <span class="tweet-camera Icon Icon--camera"></span>
    <span class="text">Add photo</span>
  </button>
  <div class="image-selector">
    <input type="hidden" name="media_data_empty" class="file-data">
    <label>
      <span class="visuallyhidden">Add Photo</span>
      <input type="file" name="media_empty" class="file-input js-tooltip" tabindex="-1" title="Add Photo">
    </label>
    <div class="swf-container"></div>
  </div>
</div>


        <div class="geo-picker">
  <button class="btn geo-picker-btn icon-btn js-tooltip" type="button" tabindex="-1" title="Add location">
    <span class="Icon Icon--geo"></span>
    <span class="text geo-status">Add location</span>
  </button>
  <span class="dropdown-container"></span>
  <input type="hidden" name="place_id">
</div>


    </div>
    <div class="tweet-button">
      <span class="spinner"></span>
      <span class="tweet-counter">140</span>
      <button class="btn primary-btn tweet-action disabled tweet-btn js-tweet-btn" type="button" disabled>
  <span class="button-text tweeting-text">
    <span class="Icon Icon--tweet"></span>
    Tweet
  </span>
  <span class="button-text messaging-text">
    <span class="Icon Icon--dm Icon--small"></span>
    Send message
  </span>
</button>
    </div>
  </div>
</form>

  </div>
</div>
    
    <div id="spoonbill-outer"></div>
  </body>
</html>
  <input type="hidden" id="init-data" class="json-data" value="{&quot;profileHoversEnabled&quot;:false,&quot;noNewDedup&quot;:false,&quot;baseFoucClass&quot;:&quot;swift-loading&quot;,&quot;bodyFoucClassNames&quot;:&quot;swift-loading&quot;,&quot;macawSwift&quot;:true,&quot;assetsBasePath&quot;:&quot;https:\/\/abs.twimg.com\/a\/1394742182\/&quot;,&quot;assetVersionKey&quot;:&quot;89b32b&quot;,&quot;environment&quot;:&quot;production&quot;,&quot;formAuthenticityToken&quot;:&quot;33c60735096af0a13084308a7f93d9493e74f11c&quot;,&quot;loggedIn&quot;:true,&quot;screenName&quot;:&quot;bachelorprjct&quot;,&quot;fullName&quot;:&quot;replicauser&quot;,&quot;userId&quot;:&quot;2394399241&quot;,&quot;scribeBufferSize&quot;:3,&quot;pageName&quot;:&quot;home&quot;,&quot;sectionName&quot;:&quot;home&quot;,&quot;scribeParameters&quot;:{&quot;lang&quot;:&quot;en&quot;},&quot;internalReferer&quot;:null,&quot;geoEnabled&quot;:false,&quot;typeaheadData&quot;:{&quot;accounts&quot;:{&quot;localQueriesEnabled&quot;:true,&quot;remoteQueriesEnabled&quot;:true,&quot;enabled&quot;:true,&quot;limit&quot;:6},&quot;trendLocations&quot;:{&quot;enabled&quot;:true},&quot;savedSearches&quot;:{&quot;enabled&quot;:true,&quot;items&quot;:[]},&quot;dmAccounts&quot;:{&quot;enabled&quot;:true,&quot;localQueriesEnabled&quot;:true,&quot;onlyDMable&quot;:true,&quot;remoteQueriesEnabled&quot;:true},&quot;topics&quot;:{&quot;enabled&quot;:true,&quot;localQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;remoteQueriesEnabled&quot;:true,&quot;limit&quot;:4},&quot;concierge&quot;:{&quot;enabled&quot;:true,&quot;localQueriesEnabled&quot;:true,&quot;remoteQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;limit&quot;:3},&quot;recentSearches&quot;:{&quot;enabled&quot;:true},&quot;contextHelpers&quot;:{&quot;enabled&quot;:false,&quot;page_name&quot;:&quot;home&quot;,&quot;section_name&quot;:&quot;home&quot;,&quot;screen_name&quot;:&quot;bachelorprjct&quot;},&quot;hashtags&quot;:{&quot;enabled&quot;:true,&quot;localQueriesEnabled&quot;:false,&quot;prefetchLimit&quot;:500,&quot;remoteQueriesEnabled&quot;:true},&quot;showSearchAccountSocialContext&quot;:true,&quot;showTypeaheadTopicSocialContext&quot;:false,&quot;showDebugInfo&quot;:false,&quot;useThrottle&quot;:true,&quot;accountsOnTop&quot;:false,&quot;remoteDebounceInterval&quot;:300,&quot;remoteThrottleInterval&quot;:300,&quot;reverseBoldingEnabled&quot;:false,&quot;tweetContextEnabled&quot;:false,&quot;fullNameMatchingInCompose&quot;:true,&quot;topicsWithFiltersEnabled&quot;:true},&quot;pushStatePageLimit&quot;:500000,&quot;routes&quot;:{&quot;profile&quot;:&quot;\/bachelorprjct&quot;},&quot;pushState&quot;:true,&quot;viewContainer&quot;:&quot;#page-container&quot;,&quot;asyncSocialProof&quot;:true,&quot;dragAndDropPhotoUpload&quot;:true,&quot;href&quot;:&quot;\/&quot;,&quot;searchPathWithQuery&quot;:&quot;\/search?q=query&amp;src=typd&quot;,&quot;timelineCardsGallery&quot;:true,&quot;mediaGrid&quot;:true,&quot;deciders&quot;:{&quot;pushState&quot;:true,&quot;disable_profile_popup&quot;:false,&quot;hqImageUploads&quot;:false,&quot;mqImageUploads&quot;:false,&quot;dynamicLoadMediaForward&quot;:true,&quot;scribeActionQueue&quot;:false,&quot;scribeReducedActionQueue&quot;:true,&quot;modal_tweet_from_server_enabled&quot;:true,&quot;custom_timeline_curation&quot;:false,&quot;use_toast_poll_url&quot;:true},&quot;permalinkCardsGallery&quot;:false,&quot;toasts_dm&quot;:true,&quot;toasts_spoonbill&quot;:true,&quot;toasts_timeline&quot;:false,&quot;toasts_dm_poll_scale&quot;:60,&quot;uploadDomain&quot;:&quot;upload.twitter.com&quot;,&quot;lifelineAlertEnabled&quot;:false,&quot;freezeDashboard&quot;:false,&quot;swift_dm_create&quot;:true,&quot;deviceEnabled&quot;:false,&quot;hasPushDevice&quot;:false,&quot;smsDeviceVerified&quot;:false,&quot;inResearchGroup&quot;:false,&quot;enableActivity&quot;:true,&quot;renameConnectToNotifications&quot;:true,&quot;pollingOptions&quot;:{&quot;focusedInterval&quot;:30000,&quot;blurredInterval&quot;:300000,&quot;backoffFactor&quot;:2,&quot;backoffEmptyResponseLimit&quot;:2,&quot;pauseAfterBackoff&quot;:true,&quot;resumeItemCount&quot;:100},&quot;emptyTimelineOptions&quot;:{&quot;pc&quot;:true,&quot;connections&quot;:true,&quot;limit&quot;:3,&quot;display_location&quot;:&quot;welcome-flow-recommendations&quot;,&quot;dismissable&quot;:false,&quot;disabled&quot;:true,&quot;emptyTimelineModule&quot;:true,&quot;followingCount&quot;:1},&quot;enableTweetTagging&quot;:false,&quot;wtfRefreshDebounceBucket&quot;:null,&quot;help_pips_decider&quot;:false,&quot;injectComposedTweets&quot;:true,&quot;moreCSSBundles&quot;:[&quot;https:\/\/abs.twimg.com\/a\/1394742182\/css\/t1\/rosetta_more.bundle.css&quot;],&quot;timeline_url&quot;:&quot;\/i\/timeline&quot;,&quot;reinjectedPromotedTweets&quot;:false,&quot;preexpandTweetbox&quot;:false,&quot;autoplay&quot;:false,&quot;trendsCacheKey&quot;:&quot;3f1e9b3007&quot;,&quot;decider_personalized_trends&quot;:true,&quot;trendsLocationDialogEnabled&quot;:true,&quot;wtfRefreshOnPageNav&quot;:false,&quot;wtfOptions&quot;:{&quot;pc&quot;:true,&quot;connections&quot;:true,&quot;limit&quot;:3,&quot;display_location&quot;:&quot;welcome-flow-recommendations&quot;,&quot;dismissable&quot;:true,&quot;disabled&quot;:true},&quot;hasUserCompletionModule&quot;:false,&quot;dm_options&quot;:null,&quot;initialState&quot;:{&quot;title&quot;:&quot;Twitter&quot;,&quot;section&quot;:&quot;home&quot;,&quot;module&quot;:&quot;app\/pages\/home&quot;,&quot;cache_ttl&quot;:300,&quot;body_class_names&quot;:&quot;t1 logged-in user-style-bachelorprjct enhanced-mini-profile&quot;,&quot;doc_class_names&quot;:&quot;route-home&quot;,&quot;route_name&quot;:&quot;home&quot;,&quot;page_container_class_names&quot;:&quot;wrapper wrapper-home white&quot;,&quot;ttft_navigation&quot;:false}}">

  

    <input type="hidden" class="swift-boot-module" value="app/pages/home">
  <input type="hidden" id="swift-module-path" value="https://abs.twimg.com/c/swift/en">
    <script src="twitter_init.js" async></script>





