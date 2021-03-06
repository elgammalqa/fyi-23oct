<?php 
session_start();   ob_start();  
ob_start();
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> 
    <title>Authentification</title> 
    <!-- Bootstrap core CSS -->
    <link href="../../../asset/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../../asset/font-awesome/css/font-awesome.css" rel="stylesheet" /> 
    <!-- Custom styles for this template -->
    <link href="../../../asset/css/style.css" rel="stylesheet">
    <link href="../../../asset/css/style-responsive.css" rel="stylesheet"> 
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css"/> 
    <style type="text/css">
      img{
        width : 1000px;
      }
    </style>
    
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
 
    <body > <br /><br />  
      <div id="login-page">
        <div class="container"> 
            <form class="form-login"  method="post">
              <h2 class="form-login-heading">sign in now</h2>
              <div class="login-wrap"> 
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input type="email" required="required" name="logg" type="text" class="form-control" placeholder="Email" autofocus autocomplete="off" >
                </div> <br />
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input required="" name="password"  type="password" class="form-control" placeholder="Password" autocomplete="false">
                </div>  
                <a style="color: black;" href="forget_password.php" class="pull-right">Forgot Password?</a>
                <br> <br> 
                  <button class="btn btn-theme btn-block" type="submit" name="go"><i class="fa fa-lock"></i> SIGN IN</button>
              </div> 
            </form>    
        </div>
      </div>    
        <?php
          require_once("../models/user.model.php");
                $user=new userModel();  
                if(isset($_POST['go'])){   
                $password=strip_tags($_POST['password']);
                $logg=strip_tags($_POST['logg']);  
                      if($user->Function_userexist2($logg)!=null){  
                       if (password_verify($password,$user->getPassword())) {  
                           if (userModel::acount_is_confirmed($_POST['logg'])) {  
                        $function=$user->getFunction();   
                         if (count($_COOKIE)>0) { 
                          setcookie('fyipPassword',$user->getpassword(),time()+31104000,"/");
                          setcookie('fyipEmail',$logg,time()+31104000,"/");// 1 year    
                          setcookie('fyipFunction',$function,time()+31104000,"/");    
                          setcookie('fyipPhoto',$user->getPhoto(),time()+31104000,"/");    
                          setcookie('fyipFirst_name',$user->getFirst_name(),time()+31104000,"/");
                          setcookie('fyipLast_name',$user->getLast_name(),time()+31104000,"/"); 
                         $user->active_status($logg);    
                           }else{ 
                              $_SESSION['auth']=array('Password'=>$user->getPassword(),'Email'=>$logg,'Function'=>$function,
                          'Photo'=>$user->getPhoto(),'First_name'=>$user->getFirst_name(),
                          'Last_name'=>$user->getLast_name()); 
                         $user->active_status($logg);
                        } //cookies  
                        

                         if($function=="Admin") {  
                            if (count($_COOKIE)>0) { 
                          setcookie('fyiplock',0,time()+2592000,"/");
                             }else{
                               $_SESSION['auth']['lock']=0; 
                             }  ?>
                              <script>
                                  window.location.replace('admin.php');
                              </script>
                             <?php   
                           }else if($function=="Head of Branch"){ 
                          if (count($_COOKIE)>0) { 
                              setcookie('fyiplock',0,time()+2592000,"/");
                             }else{
                               $_SESSION['auth']['lock']=0; 
                             }     ?>
                              <script>
                                window.location.replace('head.php');
                              </script> 
                                <?php  }else if($function=="Reporter"){ 
                          if (count($_COOKIE)>0) { 
                          setcookie('fyiplock',0,time()+2592000,"/");
                             }else{
                               $_SESSION['auth']['lock']=0; 
                             } 
                                  ?>
                              <script>
                                window.location.replace('reporter.php');
                              </script> 
                   <?php       } 
                // }//pass
                 }else{
                            echo '<script> swal("Access denied!","please check your email - we have sent a confirmation message or contact your administrator to send verification link ","warning");</script>';
                           }  
                    } else{ ?>
                      <script> swal("Access denied!","Email or password wrong !! try again","warning");</script>
                  <?php  }
                   } else{ ?>
                      <script> swal("Access denied!","Email or password wrong !! try again","warning");</script>
                  <?php  }
                }
            ?>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../../asset/js/jquery.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="../../../asset/js/jquery.backstretch.min.js"></script>
     <script>
        $.backstretch("../../../asset/img/a.jpeg", {speed: 500});
    </script>


  </body>
</html>
