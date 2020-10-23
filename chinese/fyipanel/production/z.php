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

	<title></title>
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
  <form method="POST"  enctype="multipart/form-data" data-parsley-validate 
               class="form-horizontal form-label-left">   
                     <div class="form-group"> 
                      <label style="text-align: left" class="control-label col-md-1 col-sm-1 col-xs-12 " for="first-name">
                        From :  
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12"> 
                        <input type="time" required="required" name="from"  class="form-control col-md-2 col-xs-12">
                      </div>
                      <label style="text-align: left" class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">
                        To :   
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12"> 
                        <input type="time" required="required" name="to"  class="form-control col-md-2 col-xs-12">
                      </div> 
                      <button  name="submit" class="btn btn-success">Add</button> 
                      
                       <a href="z_edit_delete_hot_ads.php"> <button type="button" name="back" class="btn btn-primary">Back  </button></a>
                    </div>   
   </form> 

     <?php
     if(isset($_POST['submit'])){
        $ad_from=$_POST['from'];
        $ad_to=$_POST['to'];
        echo 'from = '.$ad_from.' to = '.$ad_to.'<br>';
                        }
     ?>




</body>
</html>