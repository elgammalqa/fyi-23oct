<?php  
session_start();   ob_start();  
ob_start();
include '../models/user.model.php'; 
include '../models/news.model.php'; 
  if(userModel::islogged("Head of Branch")==true){ 
    if(userModel::isLoged_but_un_lock()){
        header('Location:lock_screen.php');
    }else{   
      if (count($_COOKIE)>0)  setcookie('fyiplien','publish_article.php',time()+2592000,"/");
       else   $_SESSION['auth']['lien']="publish_article.php";   

       if (isset($_COOKIE['fyipEmail'])&&!empty($_COOKIE['fyipEmail'])){
          $fyipEmail=$_COOKIE['fyipEmail'];  
        } else {  
          $fyipEmail=$_SESSION['auth']['Email'];  
        }   
       
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>FYI PRESS</title>

    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
     
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


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0; margin-top: 10px;margin-bottom: 10px;">
              <a href="head.php" class="site_title"><img style="width: 40px; height: 40px; margin-left: 5px; " class="img-circle" src="images/fyi.jpeg" ><span> FYI PRESS </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
             <?php require_once('h_menu_profile.php'); ?>
            <!-- /menu profile quick info -->

            <br /> 
            <!-- sidebar menu -->
             <?php require_once('h_menu.php'); ?>
            <!-- /sidebar menu --> 

            <!-- /menu footer buttons -->
             <?php require_once('h_footer.php'); ?>
            <!-- /menu footer buttons -->



          </div>
        </div>

        <!-- top navigation -->
             <?php require_once('h_top_navigation.php'); ?> 
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles --> 
          <div class="row tile_count">
            <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-newspaper-o"></i> Number Total of news published</span>
              <div class="count green">    
                <?php  echo userModel::getTotalNewsPublishedByEmployee($fyipEmail); ?>  </div>
            </div>
 
             <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-newspaper-o"></i> Number Total of News Sent</span>
              <div class="count green">
                <?php echo newsModel::getTotalNewsSent($fyipEmail); ?> 
              </div> 
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-newspaper-o"></i> Number Total of news waiting </span>
              <div class="count green"><?php echo userModel::getTotalNewsWaiting(); ?></div>
            </div> 
          </div>
          <!-- /top tiles -->


<?php      
   if (isset($_GET['id_pub'])&&!empty($_GET['id_pub'])) {
     include '../models/news_published.model.php';   
    $art=new news_publishedModel();   
    $art->add_news($_GET['id_pub'],$fyipEmail);
    if (news_publishedModel::id_added($_GET['id_pub'])!=null) { 
    $art->update_status_to_publish($_GET["id_pub"]);
    $ccontent=  news_publishedModel::get_content_to_update($_GET["id_pub"]);
    $v= str_replace("../views/image_content/","fyipanel/views/image_content/",   $ccontent); 
  $content_fin= str_replace("../views/thumbnail_content/","fyipanel/views/thumbnail_content/",$v);
     news_publishedModel::update_content($content_fin,$_GET["id_pub"]);
     date_default_timezone_set('GMT'); 
    $art->update_Date_to_DateOfPublish(date("Y-m-d H:i:s"),$_GET['id_pub']); ?>
    <script>
window.location.replace('edit_news.php');  
</script>
<?php }else{ 
    echo '<script> swal("Attention!","Article does not Published !","warning") </script> ';?>
   
  <a style="padding-left: 30%; font-size: 30pt; font-weight: bold; text-align: center; color: red;  " href="edit_news.php">Back</a>
<?php }
}
     ?>  
        
      </div>
    </div>
    
    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
  
  <?php require_once('a_script.php'); ?>


  </body>
</html>
<?php }
}else{ ?>
        <script>
          window.location.replace('index.php');
        </script> 
  <?php  } ?>

