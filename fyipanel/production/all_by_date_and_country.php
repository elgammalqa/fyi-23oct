<?php 
session_start();   ob_start();  
ob_start();  
include '../models/user.model.php'; 
   if(userModel::islogged("Admin")==true||userModel::islogged("Reporter")==true||
    userModel::islogged("Head of Branch")==true){
    if(userModel::isLoged_but_un_lock()){
        header('Location:lock_screen.php');
    }else{  
      if (count($_COOKIE)>0)  setcookie('fyiplien','all_by_date_and_country.php',time()+2592000,"/");
       else   $_SESSION['auth']['lien']="all_by_date_and_country.php"; 

       if (isset($_COOKIE['fyipEmail'])&&!empty($_COOKIE['fyipEmail'])){
          $fyipEmail=$_COOKIE['fyipEmail'];  
        } else {  
          $fyipEmail=$_SESSION['auth']['Email'];  
        }  
 
        function traffic_By_cn($d1,$c,$langg){  
            include($langg);
            $requete = $con->prepare("SELECT sum(nb) FROM `visitors`
             WHERE `date`='".$d1."' and country='".$c."'");
                       $requete->execute();
                        $tbtwodates = $requete->fetchColumn();
                        return  $tbtwodates ;  
              }

               function table1($date1,$countryyy,$langg,$l){
                  include($langg);  
                  if(traffic_By_cn($date1,$countryyy,$langg)!=null){  ?>
                    <tr class="headings"> 
                          <th class="column-title" > <?php echo $l; ?> </th> 
                           <th  class="column-title"> 
                            <span style="color: red; font-size: 15px; "  >
                              <?php echo traffic_By_cn($date1,$countryyy,$langg); ?>
                            </span>   
                          </th>   
                        </tr> 
          <?php  }}  ?>  
         
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
	  <link rel="icon" href="images/fyi.jpeg" type="image/ico" /> 
     
    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet"> 
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> 
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert.css"/>   
    <script src="js/sweetalert-dev.js"></script>
    <!-- Custom Theme Style -->  
    <link rel="stylesheet" type="text/css" href="../../js-datepicker/jquery-ui.css">
    <style type="text/css"> 
      @media (max-width: 991.98px) {
        #mobile{
          margin-top: 20px;
        }
      } 
    </style>
<script type="text/javascript" src="../../js-datepicker/jquery.js" ></script>
  <script type="text/javascript" src="../../js-datepicker/jquery-ui.js" ></script>
 <script type="text/javascript">
<?php  
 $sql="SELECT max(date) FROM `dates`"; 
  $maxdate=userModel::maxDate2($sql);  
        $y2=date("Y",strtotime($maxdate));
        $m2=date("n",strtotime($maxdate))-1;
        $j2=date("j",strtotime($maxdate));
 $sql2="SELECT min(date) FROM `dates`";
        $d1=userModel::minDate2($sql2); 
        $y1=date("Y",strtotime($d1)); 
        $m1=date("n",strtotime($d1))-1;
        $j1=date("j",strtotime($d1));   ?>
        var y2="<?php echo $y2;  ?>";
        var m2="<?php echo $m2;  ?>";
        var j2="<?php echo $j2;  ?>";
        var y1="<?php echo $y1;  ?>";
        var m1="<?php echo $m1;  ?>";
        var j1="<?php echo $j1;  ?>"; 
  $(document).ready(function() {
     $("#datepicker").datepicker({dateFormat:"yy-mm-dd",maxDate:new Date(y2,m2,j2),minDate:new Date(y1,m1,j1)}); 
  }); 
</script>
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
              <a href="all_cpanel.php" class="site_title"><img style="width: 45px; height: 45px; margin-left: 5px; " class="img-circle" src="images/fyi.jpeg" ><span style="margin-left: 15px;" > FYI PRESS </span></a>
            </div>
            <div class="clearfix"></div>   
             <?php require_once('all_menu.php'); ?> 
          </div>
        </div>  
        <!-- top navigation -->
             <?php require_once('all_top_navigation.php'); ?> 
        <!-- /top navigation --> 
        <!-- page content --> 
        <div class="right_col" role="main"  >  
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" > 
                    <div class="x_title">
                      <h2> Traffic Between two dates : </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li> 
                      </ul>
                      <div class="clearfix"></div>
                    </div>  
              <form method="post" > 
                    <div class="form-group" style="margin-top: 20px; " >  
                      <label  id="mobile"  class="control-label col-md-1 col-sm-12 col-xs-12  "> Date : </label> 
                      <div class="col-md-3   col-sm-12 col-xs-12 ">
                        <input required="" autocomplete="off"  id="datepicker" name="date1" 
                           class="form-control "  >
                      </div>   
                      <label  id="mobile" class="control-label col-md-1 col-sm-12 col-xs-12">
                      Country   : </label> 
                        <div class="col-md-3   col-sm-12 col-xs-12 "> 
                        <select  name="countries"   required="" class="form-control"  >
                        <?php $user=new userModel();
                             $req=$user->all_countries();  
                              echo '<option value="Select"> Select Country</option>';
                             foreach ($req as $key) { 
                              $country=$key;  
                              $getcode=userModel::getgeoplugin_countryCode($country); 
                               echo '<option value="'.$country.'" >'.$country.'</option>';
                             } 
                         ?> 
                        </select>  
                      </div>    
                     </div>  
                     <button id="mobile" name="search" class="btn btn-success col-md-1 col-sm-12 col-xs-12 col-md-offset-1"> Search </button>
               </form>
               </div> 
            </div> 
                 <?php 
            if(isset($_POST['search'])){
                if (isset($_POST['date1'])&&isset($_POST['countries'])) { 
                      if ($_POST['countries']!="Select") {
                          $countryyy=$_POST['countries'];   
                          $date1=$_POST['date1'];   
                           $p = explode('-', $_POST['date1']);     
                                 $d1=$p[2]."/".$p[1]."/".$p[0]; 
        $sql_request="SELECT sum(nb) FROM `visitors`
             WHERE `date`='".$date1."' and country='".$countryyy."'";
              $nb_visitors=userModel::totl_rss_all($sql_request); 
                  if ($nb_visitors!=null) { ?> 
            <div style="margin-top: 2%" class="col-md-6 col-sm-12 col-xs-12 col-md-offset-2">
              <table class="table table-striped jambo_table bulk_action">
                      <thead>
                          <tr class="headings"> 
                            <th  class="column-title"> Date  </th>
                            <th  class="column-title"> Country   </th>    
                          </tr>
                      </thead>  
                      <tbody>  
                         <tr class="headings"> 
                          <th class="column-title" > <?php echo $d1; ?> </th> 
                          <th  class="column-title"> <?php echo $countryyy; ?> </th> 
                        </tr> 
                      </tbody> 
              </table>   

                 <table class="table table-striped jambo_table bulk_action">
                      <thead>
                          <tr class="headings"> 
                            <th  class="column-title"> Language  </th> 
                            <th class="column-title" > Total Visitors  </th>  
                          </tr>
                      </thead>  
                      <tbody>   
                      
                      <?php  
                    $langg="../views/connect.php"; $l="English";
                    table1($date1,$countryyy,$langg,$l);   
                    $langg="../../french/fyipanel/views/connect.php"; $l="French";
                    table1($date1,$countryyy,$langg,$l);  
                    $langg="../../german/fyipanel/views/connect.php"; $l="German";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../spanish/fyipanel/views/connect.php"; $l="Spanish";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../turkish/fyipanel/views/connect.php"; $l="Turkish";
                    table1($date1,$countryyy,$langg,$l);  
                    $langg="../../russian/fyipanel/views/connect.php"; $l="Russian";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../urdu/fyipanel/views/connect.php"; $l="Urdu";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../arabic/fyipanel/views/connect.php"; $l="Arabic";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../indian/fyipanel/views/connect.php"; $l="Indian";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../hebrew/fyipanel/views/connect.php"; $l="Hebrew";
                    table1($date1,$countryyy,$langg,$l);
                    $langg="../../japanese/fyipanel/views/connect.php"; $l="Japanese";
                    table1($date1,$countryyy,$langg,$l); 
                    $langg="../../chinese/fyipanel/views/connect.php"; $l="Chinese";
                    table1($date1,$countryyy,$langg,$l);
                     ?>
                      </tbody> 
                    </table> 

              <table class="table table-striped jambo_table bulk_action">
                      <thead>
                          <tr class="headings"> 
                            <th class="column-title">All Visitors</th>
                            <th class="column-title"><?php echo $nb_visitors; ?></th>    
                          </tr>
                      </thead>   
              </table> 
            </div>  
                       <?php   } else {
                           echo '<script>swal("No Visitor","There is No Visitors From '.$countryyy.' On '.$d1.' in all languages ","warning")</script>';
                          }
                      }else{
                          echo '<script>swal("Select Country!","Select Country ","warning")</script>';
                      } 
                } 
            }   ?>  
                 
              
          </div> 
       </div>
     </div>
  </div>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script> 
  <?php require_once('a_script.php'); ?> 
  </body>
</html>
<?php }
}else{ ?>
        <script>
          window.location.replace('index.php');
        </script> 
  <?php  } ?>
