<?php 
session_start();   ob_start(); 
ob_start();
include '../models/user.model.php'; 
include '../models/news.model.php'; 
  if(userModel::islogged("Head of Branch")==true){ 
    if(userModel::isLoged_but_un_lock()){
        header('Location:lock_screen.php');
     }else{   
      if (count($_COOKIE)>0)  setcookie('fyiplien','changepasshead.php',time()+2592000,"/");
       else   $_SESSION['auth']['lien']="changepasshead.php";   

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

    <title>FYI PRESS </title>

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
    
    <script src="js/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="css/sweetalert.css"/> 
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
          <?php require_once('h_toptiles.php'); ?>
          <!-- /top tiles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Change Password</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="#" enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current Password <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="Password" name="currentpass">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input placeholder="password must be at least six characters including (one character or one letter ) and one number" type="Password" name="newpass" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input placeholder="password must be at least six characters including (one character or one letter ) and one number" type="Password" id="last-name" name="confirmpass" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button name="change" class="btn btn-success">Change</button>
                      </div>
                    </div>  
                  </form>
                  <?php    
    if(isset($_POST['change'])){  
      $user = new userModel();
       if (password_verify($_POST['currentpass'],$user->get_current_pass( $fyipEmail))){
          $text=$_POST['newpass'];
                                $CountOfNumbers= count(array_filter(str_split($text),'is_numeric'));
                                $NumbresOfCaracteres=strlen($text);
                                $msgg="";
                                $tr=true;
                                if ($NumbresOfCaracteres<6) { 
                                     $tr=false;
                                }else{
                                if ($CountOfNumbers>=1) { 
                                if ($NumbresOfCaracteres-$CountOfNumbers<=0)  {
                                     $tr=false; 
                                 }
                                 }else {
                                   $tr=false;  
                                 }
                                 }
       if($tr==true){ 
         if($_POST['newpass']==$_POST['confirmpass']){ 
          $ps=password_hash($text, PASSWORD_DEFAULT);  
           $user->update_pass( $fyipEmail,$ps); 
          if(isset($_COOKIE['fyipPassword'])&&!empty($_COOKIE['fyipPassword'])){
                    setcookie('fyipPassword',$ps,time()+31104000,"/");
                    }else if(isset($_SESSION['auth']['Password'])){
                        $_SESSION['auth']['Password']=$ps;  
                    }
            ?>
          <script>swal("Password!","Password has been changed successfully","success")</script>
         <?php 
           }else{
            ?>
          <script>swal("Wrong Password!","Passwords are not the same","warning")</script>
         <?php 
         }//confirm 

          }else{// 5 numbers and 1 letter 
                      $msgg='password must be at least six characters including (one character or one letter ) and one number';
                    ?>
                    <script>
                        swal("Password !","<?php echo $msgg; ?>","warning")
                      </script>
                <?php   } 
          }else{  
          ?>
           <script>swal("Password does not match!","The current password is wrong","warning")</script>
         <?php
          }//current

        } //submit
        ?> 
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      
        <!-- /footer content -->
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
<?php } }else{ ?>
        <script>
          window.location.replace('index.php');
        </script> 
  <?php  } ?>

