<?php 
session_start();   ob_start();   
 if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
} 
require_once('models/utilisateurs.model.php');
require_once('models/comments.model.php');
require_once('models/replies.model.php');
require_once('../models/v5.news_published.php');
require_once ('timee.php');   
include 'fyipanel/models/news_published.model.php';
if(utilisateursModel::islogged())
$log=true;   
else $log=false;  ?>
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
		<link rel="stylesheet" href="../css/sweetalert.css"/>    
        <script src="fyipanel/production/js/sweetalert-dev.js"></script>   
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
 
	<body  class="skin-orange">
	 	 <?php require_once ("fyi_header.php");    ?> 
		<section class="single">
			<div class="container">
				<div class="row"> 

					<div class="col-md-8 "> 
					<?php if(isset($_GET['id'])&&!empty($_GET['id'])){  
							$news=new news_publishedModel();
						  if($news->findnews($_GET['id'])!=null){
						  	$id_art_actuel=$_GET['id'];
						  	if($log) {
						  		v5newspublished::add_user_news($id_art_actuel);
						  	}
					?>  
						<div class="xhomeen">
							<a href="fyi.php">inicio</a>
							 &nbsp; / &nbsp; Detalle
						</div>
						</ol>  
						<header> 
							<h1 class="xarticletitleen">
								<?php echo $news->gettitle(); ?> 
							</h1>  
						</header>  
						<article class="article main-article"> 
							<div class="main"> 
								<?php if($news->getmedia()!=''){ ?>
								<div class="featured"> 
								<?php $type=news_publishedModel::typeOfMedia($news->getmedia()); 
								    if ($type=="video"||$type=="audio") { ?>  
										    <video   width="100%"  controls 
										    <?php if ($news->getthumbnail()!=""){ echo 'poster="'.$news->getthumbnail().'"'; } ?>  >
	 											<source src="<?php echo 'fyipanel/views/image_news/'. $news->getmedia(); ?>"  >
											</video>
							       <?php }else  if ($type=="pdf") { 
							       				  if(isMobile()){ ?>  
                                   <img id="mleft" src="images/img/pdf.jpg" alt="pdf" >
                                   <footer id="mleft"  >
								        <a  class="btn btn-primary more pull-right " 
								        href="download.php?id=<?php echo $news->getid(); ?>">
											<div >Descargar</div>
											<div><i class="ion-ios-download"></i></div>
									    </a>
									     <span style="margin-left: 20px;" ></span>
									     <a  class="btn btn-primary more pull-right "  
								        href="fyipanel/views/image_news/<?php echo $news->getmedia(); ?>">
											<div >Monitor</div>
											<div><i class="ion-ios-eye"></i></div>
									    </a>
								  	</footer> 
								  	<?php }else{ ?>   
								 		<div style="font-family: helvetica, tahoma; 
								 		padding-bottom: 10px; padding-top: 20px;"  >  
									        <embed src="fyipanel/views/image_news/<?php echo $news->getmedia(); ?>" 
									        type="application/pdf" class="viewpdf"> </embed> 
									    </div>  
										<?php }   ?>  
											<?php }else  if ($type=="image") { ?> 
												<a  href="fyi_detail.php?id=<?php echo $news->getid(); ?>" > 
											        <img width="100%" height="100%"  src="<?php echo 'fyipanel/views/image_news/'.$news->getmedia(); ?>" alt="Image">
											    </a>
											    <?php } ?>    
								</div> 
								<?php } ?>

	 					<div class="xtypedate" >
							<span class="xdateen" >
							publicado  <?php real_news_time($news->getpubDate()); ?>
							</span> 
							<a class="xtypeen" >
       						 <?php echo utilisateursModel::type($news->gettype()); ?>
							</a>   
						</div>
  						<div class="xdetail2en"> 
							<?php echo  $news->getdescription(); ?> 
						</div>  
                      	<div class="xcontenten">
                      	 	<?php echo  html_entity_decode($news->getcontent());?>
                     	</div> 
						</article> 
						<?php }else{ ?>
						<script>
				                window.location.replace('404.php');
				        </script> 
						<?php }
						 }else{ ?> 
						<script>
						        window.location.replace('404.php');
						</script> 
						<?php }  ?> 

           				
           					<?php if(v5newspublished::nbrVideos()>0){ ?>
						<div class="line"><div>Por favor inicia sesión para comentar</div></div>
						<div class="row">  
							<?php     
									$query=v5newspublished::videos(2);
                        			foreach($query as $news){   
                        			 		$thumbnail=$news['thumbnail'];
											$mediav='fyipanel/views/image_news/'.$news['media']; 
											$linkv="fyi_detail.php?id=".$news['id'];
											$typesectionv=utilisateursModel::type($news['type']); 
									
							?>     
					<div class="col-md-6 col-sm-6 col-xs-12"  >
						<article class="article-fw videoheighten" > 
								<div class="inner" > 
									<figure style="margin-bottom: 0px;">
										<a target="_blank" href="<?php echo $link; ?>" > 
									      <video preload="none" style="width: 100%; height: 100%" controls  
										<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?> >
										<source src="<?php echo $mediav; ?>"  >
										</video> 
										  </a> 
									</figure>
									<div class="details" style="background-color: white">
										<p>
											<a target="_blank" href="<?php echo $linkv; ?>" 
												class="newFontven" > 
										   <?php echo $news['title']; ?> </a>
									    </p> 
										<div class="detail  "   >
											<a class="xtypeen2">  
									          <?php echo $typesectionv; ?> </a>
										  	<span class="xdate" >
												<?php real_news_time($news['pubDate']); ?>  
										   </span>
										    <?php   if($log){
													if(v5newspublished::already_read($news['id'])){
													echo '<div class="xtypeen2" style="padding-left: 20px;"  ><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: green; " aria-hidden="true"></i></div>';
													}else{
													echo '<div class="xtypeen2" style="padding-left: 20px;"  ><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: red; " aria-hidden="true"></i></div>';
													}
												}//log
										?>  
										</div>
									</div>
								</div> 
							</article> 
							</div>
							<?php }  ?> 
						</div>  
						<?php }  ?> 


                    	<div class="comments">  
						<form method="post" >
							<?php if ($log==false) { ?>
							<h3 class="xlogin"> Por favor  <a href="login.php">
							&nbsp;iniciar sesión &nbsp;</a>to comentar</h3> 
							<div class="line thin"></div>
						<?php } ?> 

						<p class="xtitleen" style="text-align: center;"> comentarios </p>
 						<p class="xtitleen"> darse cuenta : </p>
						 <span class="xtitle2en" >
						 	Los comentarios publicados no representan los puntos de vista de Chats Run y sus empleados, sino los puntos de vista de quienes los escribieron.
 						 </span> <br><br>

						<?php if ($log){ ?>
							<p style="font-size: 22px; ">
								<?php $countofrep=commentsModel::countTotalOfComments($id_art_actuel);
								if ($countofrep<=1) echo $countofrep.' comentario ';
								else echo $countofrep.' comentarios ';  ?>  &nbsp; &nbsp; &nbsp;
								<a onclick="f10()" style="cursor: pointer;">Escribir un comentario</a>
							</p> <hr>
						<?php } ?> 
						</form>

				 <div class="comment-list">   
				 		<!-- comments  -->
				    <?php $qr=commentsModel::commentsStartNbres(0,10,$id_art_actuel);
					    foreach ($qr as $comment) {   ?>  
					    	<div style=" margin-bottom: 10px;" >
						    <div class="exampleen_c">
							    <h3>
							    	<?php echo commentsModel::nameReporter2($comment['email_user']); ?>
							    </h3>
							    <p><?php echo $comment['response']; ?></p> 
							    <div class="abc" >
								  	<?php  if ($comment['media']!=''){ 	$typee=commentsModel::typeOfMedia($comment['media']);
								  	    if ($typee=="image"){ ?>
										    <img src="<?php echo 'images/comments/'.$comment['media']; ?>">	
												<?php }else if($typee=="video"){ ?>
											<video  controls  >
											    <source src="<?php echo 'images/comments/'.$comment['media']; ?>"  >
											</video>
										    <?php }else if($typee=="audio"){ ?>
										    <audio   controls  >
												 <source src="<?php echo 'images/comments/'.$comment['media']; ?>"  >
										    </audio> 
									    <?php }   } ?>   
							    </div>
							    <br>	
							    <i style="color: #FC624D; font-weight: bold; "><?php real_comments_time($comment['time']); ?></i>
						    </div>  
						    <?php if ($log){?>
							    <div style="border: none;" class="modal-footer">
									<a href="<?php echo 'fyi_detaill.php?id='.$id_art_actuel.'&r='.$comment['id']; ?>">
										<button  type="button" class="btn btn-primary xreplyen" 
												data-dismiss="modal">respuesta
										</button> 
									</a> 

						<?php  if(!commentsModel::HisComment($comment['id'],$user_email) &&
							!commentsModel::comment_already_reported($comment['id'],$user_email) ){ ?>
								<a href="<?php echo 'report.php?id='.$id_art_actuel.'&id_c='.$comment['id']; ?>">
									<button type="button" class="btn btn-danger xreporten1"
											 data-dismiss="modal">Informe
									</button>
								</a>
							<?php } else if(!commentsModel::HisComment($comment['id'],$user_email) &&
						 		commentsModel::comment_already_reported($comment['id'],$user_email) ){ ?>
								<button disabled="" type="button" class="btn btn-danger xreporten2" > 			Informe 
								</button>
							<?php } ?> 
  
								  </div>  
								   <?php  } ?> 
								   </div> 
 									<!-- replies  -->
					    <?php	$qrss=repliesModel::repliesStartNbres(0,10,$id_art_actuel,$comment['id']);
					        foreach ($qrss as $reply) {    ?> 
					        	<div style=" margin-bottom: 10px;" >
								<div class="exampleen_r">
								    <h3><?php echo commentsModel::nameReporter2($reply['email_user']) ?></h3>
								    <p><?php echo $reply['response']; ?></p>
								    <div class="abc" >								  	
								   <?php if ($reply['media']!=''){
								  		$typee=commentsModel::typeOfMedia($reply['media']);
								  	    if ($typee=="image"){ ?>
											<img     src="<?php echo 'images/replies/'.$reply['media']; ?>">	
												<?php }else if($typee=="video"){ ?>
												<video  controls  >
												      <source src="<?php echo 'images/replies/'.$reply['media']; ?>"  >
												</video>
												<?php }else if($typee=="audio"){ ?>
											    <audio   controls  >
												    <source src="<?php echo 'images/replies/'.$reply['media']; ?>"  >
											    </audio> 
								        <?php }   } ?>  

								   </div>
								   	<br>	
								    <i style="color: #FC624D; font-weight: bold;">
								    	<?php real_comments_time($reply['time']); ?></i>
							    </div>
 

							   <?php if ($log){?>
								<div style="border: none; margin-right:15%" class="modal-footer">
									<a href="<?php echo 'fyi_detaill.php?id='.$id_art_actuel.'&r='.$comment['id']; ?>">
								        <button type="button" class="btn btn-primary xreplyen" 
								        		data-dismiss="modal">respuesta
								        </button>
								    </a>

								<?php if( !commentsModel::HisReply($reply['id'],$user_email) && 
								!commentsModel::reply_already_reported($reply['id'],$user_email)){ ?>
								    <a href="<?php echo 'report.php?id='.$id_art_actuel.'&id_r='.$reply['id']; ?>">
								        <button type="button" class="btn btn-danger xreporten1" 
								        		data-dismiss="modal"> Informe
								        </button>
								    </a>
								   <?php }else if(!commentsModel::HisReply($reply['id'],$user_email) && 
								     commentsModel::reply_already_reported($reply['id'],$user_email)){ ?>
								        <button disabled="" type="button" class="btn btn-danger xreporten2" data-dismiss="modal">Informe
								        </button>
								         <?php } ?> 
 
								    </div>   
								   <?php  } // log true ?>
								   </div>
								   <?php  } // for replies
								} // for comments 
								?> 
							</div>  

						<?php	if($log){  ?>
							<form style="padding-bottom: 50px;"  enctype="multipart/form-data" method="post" class="row"> 
								<div class="form-group col-md-12">
									<label for="message">Comentario <span class="required"></span></label>
									<textarea style="font-size: 18px;" maxlength="500" required="required" id="myTextField"  class="form-control" name="message"  placeholder="Escribe tu comentario ..."></textarea>
								</div>  
								<div class="image-upload form-group col-md-8">  
									 <label for="file-input" style="font-size: 18px;">
			                          Añadir imagen o video &nbsp; : &nbsp; <img style="cursor: pointer;" width="15%" height="15%" src="images/cam.png"/>
			                           </label> 
			                      <input accept="image/*|video/*|audio/*" name="image" style="display: none;" id="file-input" type="file" /> 
								</div>
								<div class="form-group col-md-4"> 
									<input value="0" id="c_id" name="c_id" type="hidden" class="btn btn-primary form-control">
									<input value="enviar comentario" name="send" type="submit" class="btn btn-primary form-control" style="font-size: 20px; padding-top:5px !important; margin-top: 0px !important">
								</div>  
							</form>

							<?php  
							// comment 
		   if (isset($_POST['send'])) {   
		   if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
            $state_logo=0;   
            }else  {   
                $state_logo=1; 
                $typeimage=0; 
                $checkexistedeja=0; 
                $fin=0; 
                $size_error=0;
                $target_dir = "images/comments/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]); 
                $uploadOk = 1;
                $maxsize=utilisateursModel::info("maxsizecomments");
                if (ceil($_FILES['image']['size']/1048576)>$maxsize) {
                	  $size_error=1; $uploadOk = 0;
                }
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 

                     if (file_exists($target_file)) {    $checkexistedeja=1;  $uploadOk = 0;   }
                        // Allow certain file formats
                    if($imageFileType != "jpg" &&$imageFileType != "JPG" && $imageFileType != "png"&& $imageFileType != "PNG" && $imageFileType != "jpeg"&& $imageFileType != "JPEG"  
                     && $imageFileType != "AC-3" && $imageFileType != "ac-3"&& $imageFileType != "mp4"&& $imageFileType != "MP4"&& $imageFileType != "mp3"&& $imageFileType != "MP3"&& $imageFileType != "webm"&& $imageFileType != "WEBM" && $imageFileType != "flv" && $imageFileType != "FLV"&& $imageFileType != "mkv"&& $imageFileType != "MKV"&& $imageFileType != "mpeg"&& $imageFileType != "MPEG"
                     && $imageFileType != "gif"&& $imageFileType != "GIF") {
                        $typeimage = 1;    $uploadOk = 0;
                        }
                        // Check CFE $uploadOk is set to 0 by an error
                        if ($uploadOk == 1) {   
                              $ImageName=(string)commentsModel::nbr_news_with_images()+1;   
                                $target_file = $target_dir . basename($_FILES["image"]["name"]);  
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                $im=$ImageName."-".rand(1,100).".".$imageFileType;
                                $target_file2= $target_dir . basename($im); 
                                   rename($target_file,$target_file2);
                                    $nomlogo=$im;  
                                } else {   
                                    $fin=1;
                                    $uploadOk = 0;
                                }
                            }
                            } // image  
                            $responsetoadd=strip_tags($_POST['message']);
                            $comment = new commentsModel(); 
                            $comment->setresponse(addslashes($responsetoadd)); 
                             date_default_timezone_set('GMT');
                            $comment->settime(strip_tags(date("Y-m-d H:i:s")));
                            $comment->setid_news(strip_tags($id_art_actuel));
                            $comment->setemail_user(strip_tags($user_email));   
                             if($state_logo==1){ 
                                if($uploadOk==1){  
                                		   $comment->setmedia($nomlogo);  
                                        if ($comment->add_comments()==true){ ?>   
                                      <script>
                                        window.location.replace("fyi_detail.php?id=<?php echo $id_art_actuel; ?>");
                                      </script>  
                                     <?php   }else{  ?>
                                     	    <script>
                                                 swal("Atención!","Comentario no agregado !","warning")
                                            </script> '; 
                                     <?php   }
                                		  
                                    }else{ 
                                            $msg=null;  
                                             if($checkexistedeja==1) $msg.='El archivo ya existe, cambie el nombre del archivo y vuelva a intentarlo\n';  
                            if($size_error==1) $msg.='El tamaño del archivo debe ser menor que '.$maxsize .' MB\n'; 
                                            if($typeimage==1) $msg.='Lo sentimos, solo acepta formatos jpg, jpeg, png, gif, ac-3, mp3, mp4, flk, mkv, mpeg y webm'; 
                                            if($fin==1) $msg.='Lo siento, Error al cargar el archivo.\n'; 
                                            $msg.="Comentario no agregado";  
                                            ?>
                                            <script>
                                                 swal("Atención!","<?php echo $msg;?>","warning")
                                            </script> 
                                        <?php 
                             } 
                               }else{  
                                             $comment->setmedia('');    
                                        if ($comment->add_comments()==true){ ?>   
                                      <script>
                                        window.location.replace("fyi_detail.php?id=<?php echo $id_art_actuel; ?>");
                                      </script>  
                                     <?php   }else{  ?>
                                     	    <script>
                                                 swal("Atención!","Comentario no agregado !","warning")
                                            </script> '; 
                                     <?php   }
                                		  
                       } //state logo  
             }//send
         }//log

 
							 ?>
						</div>
					</div>



						
					<div class="col-md-4 sidebar" id="sidebar"> 
						<?php  if(v5newspublished::nbrhotnews()>0){  ?>
						<aside>
							<br>
							<h1 class="aside-title">NOTICIAS RECIENTES</h1>
							<div class="aside-body"> 
							<?php   $news=new news_publishedModel();   
									$query=v5newspublished::hotnews(4);
                        			foreach($query as $news){ 
											$media='fyipanel/views/image_news/'.$news['media']; 
											$link="fyi_detail.php?id=".$news['id'];
											$typesection4=utilisateursModel::type($news['type']);  
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
										 <div class="xtypeenhot">
										 	  <a >  <?php echo $typesection4; ?> </a>
										</div>
											<div class="time"  >
												<?php real_news_time($news['pubDate']); ?> 
										    </div>
										    <?php   if($log){
													if(v5newspublished::already_read($news['id'])){
													echo '<div class="xtypeenhot" style="padding-left: 20px;"  >
													<i class="fa fa-circle" style=" font-size: 10px; color: green; " aria-hidden="true"></i></div>';
													}else{
													echo '<div class="xtypeenhot" style="padding-left: 20px;">
													<i class="fa fa-circle" style=" font-size: 10px; color: red; " aria-hidden="true"></i></div>';
													}
												}//log
										?> 
										</div>
										 
									</div>  
									</div>
								</div>
							</article> 
						<?php } 	 ?> 
							</div> 
						</aside><?php }	 ?> 
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
		<!--<script src="js/demo.js"></script> -->
		<script src="../js/e-magz.js"></script>
		  
 		<script type="text/javascript">
 			function f10(){
 				 document.getElementById("myTextField").focus(); 
 			}

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