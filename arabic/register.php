<?php  
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
if(utilisateursModel::islogged())
$log=true; 
else $log=false;  
 ?>
<!DOCTYPE html> 
<html dir="rtl" lang="ar"> 
	<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
		   <link rel="icon"   href="images/fyipress.ico">
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
		<style type="text/css">
		@media (min-width: 768px)   { 
  	     #wdwrap{   width: 720px;  } 
        } 
        label,h4,input{
				text-align: right  ! important ;
			}
		</style>
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
			<div class="container" >
				<div class="box-wrapper" id="wdwrap" >				
					<div class="box box-border"> 
						<div class="box-body">
							<h4 style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-left:50px;"  >مستخدم جديد</h4>
							<form method="post" >
								<div class="form-group"> 
									<label class="fw" style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-left:50px; text-align: right;">الاسم</label>
									<input placeholder="أسم المستخدم"  maxlength="30" required="required" type="text" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw">البريد الالكتروني</label>
									<input placeholder="البريد الالكتروني" maxlength="60" required="required" type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw">كلمة المرور</label>
									<input placeholder="كلمة المروريجب أن تحتوي علي الأقل علي 6 خانات تتضمن رمز واحد و رقم وحد "
									 required="required" type="password" name="password" class="form-control">
								</div> 
								<div class="form-group">
									<label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw">تأكيد  كلمة المرور</label>
									<input placeholder="كلمة المروريجب أن تحتوي علي الأقل علي 6 خانات تتضمن رمز واحد و رقم وحد "
									required="required" type="password" name="confirm_password" class="form-control">
								</div> 
								<div style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="form-group text-right">
									<button name="register" class="btn btn-primary btn-block">تسجيل </button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Please read the terms of privacy ... Completing the registration means that, you agree to the terms of privacy.</span> <a href="https://fyipress.net/privacy.php">Privacy</a>
								</div>
								<div style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="form-group text-center">
									<span class="text-muted">هل يوجد لديك حساب ؟</span>
									<a href="login.php"> تسجيل الدخول  </a> 
								</div>
							</form> 
							<?php if(isset($_POST['register'])){

							      $user = new utilisateursModel();  
							      if($user->userexist(strip_tags($_POST['email']))!=null){
							      ?> 
							      <script>
							          swal("المستخدمموجود!","لمستخدم موجود بالفعل ","warning")</script>
							     <?php
							      }else{ // user not existe

									$text=$_POST['password'];
		                            $CountOfNumbers= count(array_filter(str_split($text),'is_numeric')); 
		                            $NumbresOfCaracteres=strlen($text);
		                            $msgg="";
		                            if ($NumbresOfCaracteres<6) {
		                              $msgg='error';
		                            }else{
		                            if ($CountOfNumbers>=1) { 
		                            if ($NumbresOfCaracteres-$CountOfNumbers<=0)  {   $msgg='error';
		                             }
		                             }else {
		                                $msgg='error';
		                             }
		                             }
		                            $token= utilisateursModel::generateNewString();
		                           $userr = new utilisateursModel();  
				        		   $email=$_POST['email'];
				        		   $name=$_POST['name'];
							       $userr->setisEmailConfirmed(0);
							       $userr->settoken(strip_tags($token));
							       $userr->setemail(strip_tags($_POST['email']));
		                           $userr->setname(strip_tags($_POST['name']));
		                           $userr->setimage('');
		                           if ($msgg=="") {
		                            $pass = password_hash($text, PASSWORD_DEFAULT);   
		                            $userr->setpassword($pass);
		                           }

		         if ($msgg=="") {  
					 	 if($_POST['password']==$_POST['confirm_password']){  
							 	$smtpsecure=utilisateursModel::info("smtpsecure"); 
					 	        $email_sender=utilisateursModel::info("email");  
					 	        $password_sender=utilisateursModel::info("password"); 
					 	        $host=utilisateursModel::info("host"); 
					 	        $port=utilisateursModel::info("port");   
					 	        $link=utilisateursModel::info("link");   
					 	        $smtpsecure = str_replace(' ', '', $smtpsecure);
					 	        $email_sender = str_replace(' ', '', $email_sender);
					 	        $password_sender = str_replace(' ', '', $password_sender);
					 	        $host = str_replace(' ', '', $host);
					 	        $port = str_replace(' ', '', $port);
					 	        $link = str_replace(' ', '', $link);
 
								require('PHPMailer-master/PHPMailerAutoload.php');
								$mail=new PHPMailer(); 
								$mail->IsSmtp();
								$mail->SMTPDebug=0;
								$mail->SMTPAuth=true; 
								$mail->SMTPSecure=$smtpsecure;
								$mail->Host=$host; //ftpupload.net
								$mail->Port=$port; //or 587 
								$mail->IsHTML(true);
								$mail->CharSet = 'UTF-8';
								$mail->Username=$email_sender;
								$mail->Password=$password_sender;
								$mail->SetFrom($email_sender," موقع إف واي آي برس");
								$mail->Subject="إف واي آي برس  : تاكيد  بريدك الالكتروني ";
								$mail->AddAddress($email, $name);  
								$mail->Body = "  
 
  <table border='0' cellpadding='0' cellspacing='0'style='margin-left:17%;'  >
        <tbody> 
            <tr>
                <td  >
                    <a>
                       <img src='$link/images/fyipress.png' 
                       style='padding:20px; width: 350px; height: 70px;' >
                    </a>
                </td>
            </tr>
            <tr>
                <td style='font-size: 19px; padding: 20px;  font-family: Helvetica; line-height: 150%; text-align: right;' >
                   <span style='float:right;' >
                   مرحبا بك    
                    </span>
                    <span style='float:right;' >
                    $name &nbsp;
                   </span>
                   <br> <br>
                   في موقع   إف واي آي برس      <br><br>
                   لتنشيط حسابك وتاكيد بريدك الالكتروني 
                    <br>
                    فضلا اضغط علي  الرابط الموجود ادناة <br> <br> 
                    <span style='padding-right: 100px;' ></span>
                    <a style='text-decoration: none;' target='_blank' href='$link/confirm.php?email=$email&token=$token'>
                         <span 
                         style='font-family: Avenir,Helvetica,sans-serif;box-sizing: border-box;
                               border-radius: 3px; color: #fff;display: inline-block;
                               text-decoration: none; background-color: #2ab27b; border-top: 10px solid #2ab27b;
                               border-right: 18px solid #2ab27b; border-bottom: 10px solid #2ab27b;
                               border-left: 18px solid #2ab27b;  ' > 
                            تاكيد بريدك الالكتروني 
                        </span>
                    </a><br><br> 
                   فريق دعم  إف واي آي برس     
                </td>
            </tr> 
            <tr>  
                <td style='text-align: right; padding: 20px;' >
                    <a target='_blank' href='$link' style='font-size: 19px;   font-family: Helvetica; line-height: 150%; ' >
                    تفضل بزيارة  موقعنا   
                    </a><br><br>
                    <span style='font-size: 19px;    font-family: Helvetica;
                     line-height: 150%; color: #505050;' >
                    جميع الحقوق محفوظة لموقع   إف واي آي برس       
                    </span> 
                </td>
            </tr>           
        </tbody> 
    </table> "; 
				    if ($mail->send()){
				           $userr->add_utilisateur($pass); 
				           echo '<script> swal("تم التسجيل بنجاح ","تمت عملية التسجيل بنجاح إذهب لبريدك الالكتروني لتاكيد حسابك ","success");</script>'; 
				    }else{
				        echo '<script> swal(" م التسجيل بنجاح  ",
				        " حدث خطأ ما! يرجى المحاولة مرة أخرى! 
				        "
				        ,"warning");</script>';  
			        }
						               }else{  ?>
						          <script>
						          	swal("خطا في كلمة السر ","كلمات السر غير متطابقة","warning")
						          </script>
				      <?php } //

			     }
		         else { // not string   ?>
						          <script>
						          	swal(" كلمة السر  ","<?php echo 'كلمة المروريجب أن تحتوي علي الأقل علي 6 خانات تتضمن رمز واحد و رقم وحد '; ?>","warning")
						          </script>
		   <?php }
							      }
						               
						           }  ?> 


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