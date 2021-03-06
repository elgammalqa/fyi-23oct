<?php  
session_start();   ob_start();    
require_once('models/utilisateurs.model.php'); 
function nb_messages_today($email){
	include 'fyipanel/views/connect.php';
	$sql = $con->prepare("SELECT count(*) FROM `messages` 
		WHERE `email`='$email' and Date(date)=Date(now()) "); 
    $sql->execute();
    $nb = $sql->fetchColumn();  
    return $nb;
} 
function add_message($email,$name,$subject,$message,$phone){
try{
	include 'fyipanel/views/connect.php';
 if($con->exec("INSERT INTO `messages` (`id`, `email`, `name`, `subject`, `message`, `phone`) VALUES
  (NULL, '".$email."','".$name."','".$subject."','".$message."','".$phone."')" ))
    return true;
    else return false; 
 } catch (PDOException $e) {
   return false;  
 }
}
if(utilisateursModel::islogged())
$log=true; 
else $log=false;

if($log){
if(isset($_COOKIE['fyiuser_email'])){
	$cmail=$_COOKIE['fyiuser_email'];
	$cname=utilisateursModel::getUserName($cmail);
}else{
	$cmail=$_SESSION['user_auth']['user_email'];
	$cname=utilisateursModel::getUserName($cmail);
}
}
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
		<script src="../scripts/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="stylesheet" href="../css/skins/all.css">
		<link rel="stylesheet" href="../css/demo.css">   
		<style type="text/css">
			div .row{
				padding-bottom: 15px;
			}
			.fcontact{ 
				    font-size: 22px; 
				    font-weight: 800; 
				    text-transform: uppercase;
				    margin-bottom: 20px;
				    text-decoration: underline;
			}
		</style>
		 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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


	<body  class="skin-orange" onLoad="document.myf.name.focus();">
		<?php require_once('header.php'); ?>	
		<section class="category" style="margin-bottom: 2%" >
			<div class="container"> 
			<h3 class="fcontact" >Sprechen Sie uns an</h3> 
			<form method="post" name="myf"  id="myf" >
				<div class="row" >
					<div class="col-md-8 col-xs-12 col-sm-12"> 
	                    <label for="fullname">Name * : </label>
	                    <?php if($log){ ?>
	                    <input value="<?php echo $cname; ?>" required class="form-control" name="name" />
	                    <?php }else{ ?>
	                    <input  required class="form-control" name="name" />
	                    <?php } ?>
                	</div>
				</div> 
				<div class="row" >
					<div class="col-md-8 col-xs-12 col-sm-12"> 
	                    <label for="fullname">E-Mail * : </label>
	                    <?php if($log){ ?>
	                    <input type="email" value="<?php echo $cmail; ?>" required class="form-control" name="email" />
	                    <?php }else{ ?>
	                    <input type="email"  required class="form-control" name="email" />
	                    <?php } ?>
                	</div>
				</div>
				<div class="row" >
					<div class="col-md-8 col-xs-12 col-sm-12"> 
	                    <label for="fullname">Telefon : </label>
	                    <input class="form-control" name="phone" />
                	</div>  
				</div>  
				<div class="row" >
					<div class="col-md-8 col-xs-12 col-sm-12"> 
	                    <label for="fullname">das Thema * : </label>
	                    <input required class="form-control" name="subject" />
                	</div>
				</div> 
				<div class="row" >
					<div class="col-md-8 col-xs-12 col-sm-12"> 
	                    <label for="fullname">Nachricht * : </label>
	                    <textarea maxlength="1500" name="message" required class="form-control" cols="10" rows="10" ></textarea> 
                	</div> 
				</div>
				 <div class="g-recaptcha" 
      				data-sitekey="6LcEi64UAAAAANSvJaw0hI8qDMHpU_OrxB4OU0AA"></div>

				<div class="row" >
					<div style="margin-top: 20px;" class="col-md-2 col-xs-6 col-sm-2">  
	                    <button id="button" type="submit" name="send" class="btn btn-success"  >
	                        Sende die Nachricht
	                    </button> 
	                </div>  
                </div> 

                </form>
			</div>   
			<?php if (isset($_POST['send'])) {
    	if(isset($_POST['g-recaptcha-response'])){
    		$secret="6LcEi64UAAAAACMzXM6hzjWIorfsYPxbxsisMXWJ";
			$response=$_POST['g-recaptcha-response'];
			$ip=$_SERVER['REMOTE_ADDR'];
			$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
			$resp=json_decode($verify,true); 

		if ($resp['success']) { //recap ok 
    	$email=addslashes(strip_tags($_POST['email']));
    	$name=addslashes(strip_tags($_POST['name']));
    	$subject=addslashes(strip_tags($_POST['subject']));
    	$message=addslashes(strip_tags($_POST['message']));
    	if(isset($_POST['phone'])) $phone=addslashes(strip_tags($_POST['phone']));
    	else $phone=' ';  
    	if(nb_messages_today($email)>1){ 
    		echo '<script>swal("Nachricht","Sie können nicht mehr als 2 Nachrichten pro Tag hinzufügen", "warning");</script>';
    	}else{  
    		if(add_message($email,$name,$subject,$message,$phone)){
    		echo '<script>swal("Nachricht","Nachricht erfolgreich gesendet", "success");</script>';
    		}else{
    		echo '<script>swal("Nachricht","Die Nachricht wurde nicht erfolgreich gesendet", "warning");</script>';  
    		}
    	} 
   		 }else{//recap not ok
   		 	echo '<script>swal("Roboter","Überprüfen Sie, ob ich kein Roboter bin", "warning");</script>';
   		 }
	    }else{//not checked  
	      echo '<script>swal("Roboter","Überprüfen Sie, ob ich kein Roboter bin", "warning");</script>';
	    } 
      } ?>  

   
		</section>


		<?php require_once ('footer.php') ?> 
		<!-- JS -->
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.migrate.js"></script>
		<script src="../scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="../scripts/jquery-number/jquery.number.min.js"></script>
		<script src="../scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="../scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="../scripts/easescroll/jquery.easeScroll.js"></script>
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