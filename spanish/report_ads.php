<?php 
session_start();
if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
}    
require_once('models/utilisateurs.model.php');
require_once('models/adscomments.model.php');
require_once('models/adsreplies.model.php'); 
require_once('timee.php');
require_once('models/adsreports.model.php');
require_once('fyipanel/models/news_published.model.php');
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
	 
		<title>FYI PRESS</title>
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
		<link rel="stylesheet" href="../css/sweetalert.css"/>    
        <script src="fyipanel/production/js/sweetalert-dev.js"></script> 
  

  <script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
</head> 
	<body onload="f10()" class="skin-orange">
	 	 <?php require_once ("header.php"); ?> 
		<section class="single"> 
			<div class="container"> 
				<div class="row">  
				<div class="col-md-4 sidebar" id="sidebar"> 
						<?php  if(news_publishedModel::nbrhotnews()>0){  ?>
						<aside>
							<br>
							<h1 class="aside-title">NOTICIAS RECIENTES</h1>
							<div class="aside-body"> 
							<?php   $news=new news_publishedModel();   
									$query=$news->hotnews(1);
                        			foreach($query as $news){
                                      if($news['rank']==1){
											$media='fyipanel/views/image_news/'.$news['media']; 
											$link="detail.php?id=".$news['id'];
											$typesection4="FYI Press";   
										}else{
											$media=$news['media']; 
											$typesection4=$news['type']; 
								 //zzz  
										if(news_publishedModel::source_not_open($typesection4)){
										   $link=stripslashes($news['content']);
										}else{  
										   $has_http = strpos($news['content'],'http://') !== false; 
										   if($has_http){
										   	  $link=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['content'])."&id=".$news['id'];
										   }else{
										   	  $link=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['content'])."&id=".$news['id']; 
										   } 
										}
										//
										}
						    ?>   
							<article class="article-fw" style="padding-bottom: 40px;" >
								<div class="inner">
									<figure>
										<a  href="<?php echo $link; ?>" > 
										  <img width="100%" height="100%"  src="<?php echo $media; ?>" alt="Image"> 
										  </a> 
									</figure>
									<div class="details">
										<h1 style="font-size: 15px;">
											<a   href="<?php echo $link; ?>" > 
										   <?php echo $news['title']; ?> </a>
									    </h1>
										<div class="detail" style="padding-top: 10px;" >
										 <div class="category">
										 	  <a >  <?php echo $typesection4; ?> </a>
										</div>
											<div class="time">
												<?php real_news_time($news['pubDate']); ?> 
										    </div>
										</div>
									</div>
								</div>
							</article> 
						<?php } 	 ?> 
							</div> 
						</aside><?php }	 ?> 
					</div>
					   	 
 
                  <div class="col-md-8">
		            <br><br><br><br> 
		            <form method="post" > 
		            <div style="padding-left: 50px; padding-right: 50px;" >
		            	 <div class="form-group">
				            <label for="sel1">Tipo de informe :</label>
				              <select required="required" name="typee" class="form-control" id="sel1"> 
				                <option value="Contenido sexual" >Contenido sexual</option>
				                <option value="Contenido violento" >Contenido violento</option>
				                <option value="Unas malas palabras" >Unas malas palabras</option>
				                <option value="El discurso del odio" >El discurso del odio</option>
				                <option value="abuso" >abuso</option>
				              </select>
				          </div>
				          <div class="form-group">
				            <label for="pwd">otro :</label>
				            <textarea name="other" rows="5" cols="20" class="form-control" placeholder="otro ....." ></textarea> 
				         </div>
				         <div class="modal-footer">
				          <button type="submit" name="back" class="btn btn-primary" data-dismiss="modal">Espalda</button>
				          <button type="submit" name="send" class="btn btn-success" data-dismiss="modal">Enviar</button>
				        </div>  
		            </div>
		            </form>
		            	<?php 


		            	if (isset($_GET['id'])&&!empty( $_GET['id'])&&isset($_POST['back'])){ ?>
		            		<script type="text/javascript">
		            			window.location.replace('detail_ads.php?id=<?php echo $_GET['id']; ?>');
		            		</script>
		            <?php	}else if ((!isset($_GET['id'])||empty( $_GET['id']))&&isset($_POST['back'])){ ?>
		            	<script type="text/javascript">
		            			window.location.replace('index.php');
		            		</script>
		          <?php   }



		            	if (isset($_POST['send'])){
		            	 if (isset($_GET['id'])&&!empty( $_GET['id'])&&isset($_GET['id_c'])&&!empty($_GET['id_c'])&&isset($_POST['typee'])&&!empty($_POST['typee']) ) { 
		            	  $report=new adsreportModel();
		            	  $id_news=$_GET['id'];
		            	  $id_comment=$_GET['id_c'];
		            	  $report->setid_ads($id_news);
		            	  $report->setemail_user_report($user_email);
		            	  $report->setemail_user_abuse(adsreportModel::getemail_user_abuse_2($id_comment));
		            	  $report->setid_comment($id_comment);
		            	  $report->setid_reply("null");
                          date_default_timezone_set('GMT');
		            	  $report->setdate_report(date("Y-m-d H:i:s")); 
		            	  $report->settype($_POST['typee']);
		            	  if (isset($_POST['other'])&&!empty($_POST['other'])) $report->setother($_POST['other']);  
		            	   	else $report->setother('');   
		            	   if ($report->add_report()) { ?>   
                             <script> 
                             	window.location.replace('detail_ads.php?id=<?php echo $_GET['id']; ?>');
                             </script>
                        <?php  }else{ ?> 
                        	<script> 
                        	      swal("Atención!","¡El informe no se ha añadido! Ya has reportado este comentario","warning");
                            </script> 
		           		<?php } 
		            }//comment
		            	   
		            if (isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['id_r'])&&!empty($_GET['id_r'])&&isset($_POST['typee'])&&!empty($_POST['typee']) ) {
		            	$id_news=$_GET['id'];
		            	$id_reply=$_GET['id_r'];
		            	  $report=new adsreportModel(); 
		            	  $report->setid_ads($id_news);
		            	  $report->setemail_user_report($user_email);
		            	  $report->setemail_user_abuse(adsreportModel::getemail_user_abuse_r($id_reply));
		            	  $report->setid_comment("null");
		            	  $report->setid_reply($id_reply);
                          date_default_timezone_set('GMT');
		            	  $report->setdate_report(date("Y-m-d H:i:s")); 
		            	  $report->settype($_POST['typee']);
		            	  if (isset($_POST['other'])&&!empty($_POST['other'])) $report->setother($_POST['other']);  
		            	   	else $report->setother('');  
		            	 if ($report->add_report()) { ?>   
                             <script> 
                             	window.location.replace('detail_ads.php?id=<?php echo $_GET['id']; ?>');
                             </script>
                        <?php  }else{ ?> 
                        	<script> 
                        	      swal("Atención!","¡El informe no se ha añadido! Ya has reportado este comentario","warning");
                            </script> 
		           		<?php } 
		            	 
		            }//reply 
		            
		            } //send ?>
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
		<!--<script src="../js/demo.js"></script> -->
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