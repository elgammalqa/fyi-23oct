<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

    <title>FYI Press</title>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://34.123.222.213/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
</head>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
 
           <?php  if (isset($_COOKIE['fyipPhoto'])&&!empty($_COOKIE['fyipPhoto'])&&
          isset($_COOKIE['fyipFirst_name'])&&!empty($_COOKIE['fyipFirst_name'])&&
          isset($_COOKIE['fyipLast_name'])&&!empty($_COOKIE['fyipLast_name'])){
          $fyipPhoto=$_COOKIE['fyipPhoto'];
          $fyipFirst_name=$_COOKIE['fyipFirst_name'];
          $fyipLast_name=$_COOKIE['fyipLast_name'];  
        } else {  
          $fyipPhoto=$_SESSION['auth']['Photo'];
          $fyipFirst_name=$_SESSION['auth']['First_name'];
          $fyipLast_name=$_SESSION['auth']['Last_name']; 
        }   
        ?>
            <div class="profile clearfix"> 
              <div class="profile_pic">
                <img src="<?php echo "../views/img/".$fyipPhoto; ?>" 
                style="width: 80px; height: 70px; margin-left: 10px; margin-top: 10px;" alt="..." class="img-circle photox">
              </div>
              <div class="profile_info" style="padding-left: 10px; padding-top: 18px">
                <span>Welcome,</span>
                <h2 style="padding-left: 30px;"> <?php echo  $fyipFirst_name; ?> </h2>
              </div>
            </div>