<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
   
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	
	<meta name="description" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts">
	<meta name="author" content="Chatsrun"> 
	<meta name="keyword" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts"> 
		<!-- Shareable -->
	<meta property="og:title" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://fyipress.net" /> 
	<meta property="og:image" content="http://fyipress.net/images/fyipress.png" />
	<link rel="icon" href="http://fyipress.net/images/fyipress.ico">  
	<title>Fyi Press</title>
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

<body>
<?php  if(isset($_COOKIE['current_language'])){ ?> 
		<script> location.href='<?php echo $_COOKIE["current_language"]; ?>'; </script>
<?php  }else { 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST']; 
	//$actual_link=$actual_link.'/home.php';
	$actual_link=$actual_link.'/fyi/home.php';
?>
	<script> location.href='<?php echo $actual_link; ?>'; </script>
<?php } ?> 
</body>
</html>


