<?php
session_start();   ob_start(); 
ob_start();
if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
}
require_once('models/utilisateurs.model.php');
if(utilisateursModel::islogged())
$log=true;
else $log=false;
if ($log==true) {
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
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="../scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="../scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="../scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="stylesheet" href="../css/skins/all.css">
		<link rel="stylesheet" href="../css/demo.css">
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
							<h4>登録</h4>
							<form method="post" >
								<div class="form-group">
									<label>以前のパスワード</label>
									<input required="required" type="password" name="oldpass" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">パスワード</label>
									<input required="required" type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">パスワードを認証する</label>
									<input required="required" type="password" name="confirm_password" class="form-control">
								</div>
								<div class="form-group text-right">
									<button name="change" class="btn btn-primary btn-block">変化する</button>
								</div>
							</form>
							<?php if(isset($_POST['change'])){
							      $user = new utilisateursModel();
							       if (password_verify($_POST['oldpass'],
							       	$user->get_current_pass($user_email))){
							       	$text=$_POST['password'];
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
							      	if($_POST['password']==$_POST['confirm_password']){
							      	$ps=password_hash($text, PASSWORD_DEFAULT);
							           $user->update_pass($user_email, $ps);
							           if(isset($_COOKIE['fyiuser_pass'])){
                      	                 setcookie('fyiuser_pass',$ps,time()+31104000,"/");
										}else if(isset($_SESSION['user_auth']['user_pass'])){
											 $_SESSION['user_auth']['user_pass']= $ps;
										}

							            ?>
							          <script>swal("パスワード！ ","パスワードは正常に変更されました","success")</script>
							         <?php }else{  ?>
					  <script>swal("パスワードが間違っています！ ","パスワードが同じではありません","warning")</script>
							         <?php
							         }//confirm
							     }else{// 5 numbers and 1 letter
							     	  $msgg='パスワードは,（1文字または1文字）と1文字を含む少なくとも6文字でなければなりません';
							     	?>
							      <script>
						          	swal("パスワード !","<?php echo $msgg; ?>","warning")
						          </script>
							  <?php   }


							          }else{
							          ?>
							           <script>swal("パスワードが一致しません！ ","現在のパスワードが間違っています","warning")</script>
							         <?php
							          }//current

							        } //submit
                                   ?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Start footer -->
		<?php require_once ('footer.php') ?>
		<!-- End Footer -->

		<!-- JS -->
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.migrate.js"></script>
		<script src="../scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="../scripts/jquery-number/jquery.number.min.js"></script>
		<script src="../scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="../scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="../scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="../scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		<script src="../js/e-magz.js"></script>
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
<?php }else{ ?>
        <script>
          window.location.replace('404.php');
        </script>
  <?php  } ?>
