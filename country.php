<?php 
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
require_once('fyipanel/views/connect.php');
require_once('fyipanel/models/news_published.model.php'); 
require_once('models/rssModel.php'); 
if(utilisateursModel::islogged())
$log=true; 
else $log=false;
 ?>  
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
        <style>
            /* CSS REQUIRED */
            .state-icon {
                left: -5px;
            }
            .list-group-item-primary {
                color: rgb(255, 255, 255);
                background-color: rgb(66, 139, 202);
            }

            /* DEMO ONLY - REMOVES UNWANTED MARGIN */
            .well .list-group {
                margin-bottom: 0px;
            }
        </style>


        <!-- Bootstrap -->
        <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
        <!-- IonIcons -->
        <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
        <!-- Toast -->
        <link rel="stylesheet" href="scripts/toast/jquery.toast.min.css">
        <!-- OwlCarousel -->
        <link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="scripts/magnific-popup/dist/magnific-popup.css">
        <link rel="stylesheet" href="scripts/sweetalert/dist/sweetalert.css">
        <!-- Custom style -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/skins/all.css">
        <link rel="stylesheet" href="css/demo.css">  
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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


    <body style="padding-top:130px;"  class="skin-orange">
          <?php require_once('header.php'); ?>
         

          <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3 class="text-center">My Favorites Sources  </h3>
             <form method="post" >
                 <?php $news=new rssModel();  
                          $query=$news->countries_authorized();
                          if($query!=null){   ?>
            <div class="well" style="max-height: 450px;overflow: auto;">
                <ul id="check-list-box" class="list-group checked-list-box">  
                    <?php   foreach($query as $news){ 
                        if($news['type']!="News"){
                      ?>
                          <li style="font-size: 18px;" class="list-group-item" data-color="success"> <input type="checkbox" id="country" name="country[]"> <?php echo $news['country'].' - '.$news['source'].' - '.$news['type']; ?> </li> 
                    <?php }else{ ?>
                        <li style="font-size: 18px; padding-left: 32px; " class="list-group-item" data-color="success"> <?php echo $news['country'].' - '.$news['source'].' - '.$news['type']; ?> </li>
                    <?php }} ?> 
                </ul>
                <br />
                <button class="btn btn-danger col-xs-12" name="remove"  >Add to unwanted sources </button>
            </div>
        <?php } ?>
             </form>
        </div> 
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h3 class="text-center">Unwanted Sources</span></h3>
                 <?php $news=new rssModel();  
                          $query=$news->countries_Unauthorized();
                          if($query!=null){   ?>
                <div class="well" style="max-height: 300px;overflow: auto;">
                    <ul id="check-list-box" class="list-group checked-list-box"> 
                   <?php  foreach($query as $news){  ?>
                      <li class="list-group-item" data-color="success"> <?php echo $news['country']; ?> </li> 
                    <?php } ?> 
                    </ul>
                    <br />
                    <button class="btn btn-success col-xs-12" id="get-checked-data">Disconnect</button>
                </div>
                 <?php } ?> 
            </div>
        </div>
    </div>
</div>

 <?php if(isset($_POST['remove'])){
    if(!empty($_POST['remove'])){

    }else{
        echo '<h3 style="color: red;" >you must select at least one country</h3>';
       /* echo '<script type="text/javascript"> 
       swal("Country", "you must select at least one country", "warning");
        </script>'; */
    }
 }



  ?>


        <?php require_once ('footer.php') ?>

        <!-- JS -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery.migrate.js"></script>
        <script src="scripts/bootstrap/bootstrap.min.js"></script>
        <script>var $target_end=$(".best-of-the-week");</script>
        <script src="scripts/jquery-number/jquery.number.min.js"></script>
        <script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
        <script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <script src="scripts/easescroll/jquery.easeScroll.js"></script>
        <script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
        <script src="scripts/toast/jquery.toast.min.js"></script> 
        <script src="js/e-magz.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.backk').click(function(){   
            $(".nav-list").removeClass("active");
            $(".nav-list").removeClass("active");
                $(".nav-list .dropdown-menu").removeClass("active");
                $(".nav-title a").text("Menu");
                $(".nav-title .back").remove();
                $("body").css({
                    overflow: "auto"
                });
                backdrop.hide(); 
                });  
            });
        </script> 
    
    </body>
</html>