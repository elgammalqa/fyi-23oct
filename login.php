<?php 
session_start();   ob_start();
require_once('models/utilisateurs.model.php');
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
		<link rel="stylesheet" href="fyipanel/production/css/sweetalert.css">
	 
		<script type="text/javascript" src="fyipanel/production/js/sweetalert-dev.js" ></script>
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


	<body class="skin-orange">
		 <?php require_once ("header.php"); ?> 
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Login</h4>
							<form method="post" >
								<div class="form-group">
									<label>Email</label>
									<input placeholder="Enter Your Email" required="required" type="email" name="username" class="form-control">
								</div>
								<div class="form-group"> 
									<label class="fw">Password 
									</label>
									<input  placeholder="Enter Your Password" required="required" type="password" name="password" class="form-control">
									<a href="forgot.php" class="pull-right">Forgot Password?</a>
									<!-- href="forgot.php" -->
								</div>
								<br>
								<div class="form-group text-right">
									<button name="login" class="btn btn-primary btn-block">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Create one</a> <br>
									<span class="text-muted">You haven't received your verification link: <br>
									</span> <a href="link_verification.php">Send it Again</a>
								</div>  
							</form>  
          <?php $user=new utilisateursModel();      
  if(isset($_POST['login'])){    
                $password=strip_tags($_POST['password']);
                $logg=strip_tags($_POST['username']);  
            if($user->Function_userexist2($logg)!=null){
                    if (password_verify($password,$user->getpassword())) {
                    if (utilisateursModel::acount_is_confirmed($_POST['username'])) {  
	                      	  if (count($_COOKIE)>0) { 
	                      	  setcookie('fyiuser_pass',$user->getpassword(),time()+31104000,"/");
	                      	  setcookie('fyiuser_email',$logg,time()+31104000,"/");// 1 year     
	                      	  $user->active_status($logg);
                            if(isset($_SESSION['reply_url'])){
                                ?>
                                <script> window.location = "<?=$_SESSION['reply_url']?>"; </script>
                            <?php
                            }
                            else{
                            ?>
                                <script> window.location.replace('home.php'); </script>
                            <?php
                            }
	                      	  }
	                      	  else{
                            if(isset($_SESSION['reply_url'])){
                            ?>
                                <script> window.location = "<?=$_SESSION['reply_url']?>"; </script>
                            <?php
                            }
                            else{
                            $_SESSION['user_auth']=array('user_pass'=>$user->getpassword(),'user_email'=>$logg);    $user->active_status($logg); ?>
                            <script> window.location.replace('home.php'); </script><?php
                            }

	                      	  } //cookies
	                      	 }else{
	                      	 	echo '<script> swal("Access denied!","please check your email - we have sent a confirmation message or click in Send it Again","warning");</script>';
	                      	 }  

                    }else{ ?>
                      <script> swal("Access denied!","Email or password wrong !! try again","warning");</script>
             <?php  }
            }else{ ?>
                  <script> swal("Access denied!","Email or password wrong !! try again","warning");</script>
      <?php }  
    } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Start footer -->
		<?php require_once ('footer.php') ?>
		<!-- End Footer -->
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