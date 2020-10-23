<?php 
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
include 'fyipanel/models/news_published.model.php';
require_once('timee.php');
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
		<link rel="stylesheet" href="../css/style_ar.css">
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="stylesheet" href="../css/skins/all.css">
		<link rel="stylesheet" href="../css/demo.css">
		<style type="text/css">
			@media only screen and (min-width: 992px) {
              #ptop {  padding-top: 3%;   }

             } 
                .float_right{
					float: right !important;
					text-align: right;
					font-family: 'Droid Arabic Kufi', serif;
					letter-spacing: 0px;
				} 
				.float_left{
					float: left !important;
					text-align: left;
				}
				 
				.fs_cat{
					font-size: 20px;
					font-family: 'Droid Arabic Kufi', serif; 
					letter-spacing: 0px;
				}
				@media only screen and (min-width: 500px) {
				.mar_right{margin-right: 315px !important;}
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


	<body class="skin-orange">  
		 	 <?php require_once ("header.php"); ?> 
		<section class="category">
		  <div class="container">
		    <div class="row"> 
		     <?php if(news_publishedModel::nbrhotnews()>0){  ?> 
			 <div class="col-md-4 sidebar" id="sidebar"> 
						<aside> 
							<br>
							<h1 class="aside-title float_right" style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; margin-bottom: 0px;"> חדשות חמות  </h1> 
							    <div class="line" style="margin :20px; " ></div>
							<div class="aside-body"> 
								<?php    
								$news=new news_publishedModel();   
									$query=$news->hotnews(4);
                        			foreach($query as $news){
                                      if($news['rank']==1){
											$media='fyipanel/views/image_news/'.$news['media']; 
											$link="detail.php?id=".$news['id'];
											$typesection4="FYI PRESS";   
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
										<a target="_blank" href="<?php echo $link; ?>" > 
										  <img width="100%" height="100%"  src="<?php echo $media; ?>" alt="Image">
										  </a> 
									</figure> 
									<div class="details">
										<h1 class="float_right" >
											<a style="font-size: 18px;" target="_blank" href="<?php echo $link; ?>" > 
										   <?php echo $news['title']; ?> </a>
									    </h1>
										<div class="detail float_right " style="padding-top: 10px;" >  
											<div class="time " style="font-size: 17px;" >
												<?php real_news_time($news['pubDate']); ?> 
										    </div>
										    <div class="category " style="font-size: 17px;" >
										 	  <a >  <?php echo utilisateursModel::source($typesection4);  ?> </a>
										</div>
										</div>
									</div>
								</div>
							</article>
							
						<?php } ?> 
							</div>
						</aside>
					</div>
			           <?php } // news > 0 ?>	 
		      <div class="col-md-8 text-left"> 
		    	<?php  
		    	if(isset($_GET['n'])&&!empty($_GET['n'])){ // id and num page existe   
								$numpage=$_GET['n']; 
								$newspub = new news_publishedModel();
								$nbrfeeds= $newspub->nbrNewsPdf();//7
								$nbrpages=ceil($nbrfeeds/10); //1
								if ($numpage>=1&&$numpage<=$nbrpages) { ?>
						 
								<div class="row"> 
						          <div class="col-md-12 float_right">        
						            <ol   style="list-style: none; " >
						              <li class="float_right fs_cat "  ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;"  href="index.php"> בית   </a>
						              </li>
						              <li class="float_right fs_cat">  &nbsp; / &nbsp;</li> 
						              <li class="float_right fs_cat" class="active">  ספריה   	  </li>
						             </ol>
							     </div> 
							    </div>
							    <div class="line"></div>
							    <div class="row">
								<?php	$start=$numpage*10-10;//0 
									if ($nbrfeeds-$start>=10) {//25
										 $req=$newspub->getspecialfeedsBySourcePdf($start,10); 

					 foreach($req as $news){ ?> 
				          <article class="col-md-12 article-list">
				            <div class="inner">
				              <figure class="float_right"> 
					              <a target="_blank" href="detail.php?id=<?php echo $news["id"]; ?>"  >
									  <img height="100%" src="images/img/pdf.jpg"  alt="Image"> 
							     </a>   s
				              </figure>
				              <div class="details mar_right"  > 
				                <h1 style="text-align: right;"  >
				                	<a target="_blank" href="detail.php?id=<?php echo $news['id']; ?>">
				                	<?php echo $news['title']; ?></a>
				                </h1>  
				                <h6 style="text-align: right;"  > 
				                     <?php echo $news['description']; ?>
				                </h6>  
				                 <div class="detail float_right " style="padding-top: 10px;" >
				                  
									<div class="time " style="font-size: 17px; padding-right: 25px;" >
										<?php real_news_time($news['pubDate']); ?> 
									</div>
								    <div class="category " style="font-size: 17px;" >
										<a >  <?php echo "FYI PRESS ";  ?> </a>
									</div>

								</div>
				              </div>
				            </div>
				          </article>
				        <?php 	} //for
				        }else{
						$req=$newspub->getspecialfeedsBySourcePdf($start,$nbrfeeds-$start);
						 foreach($req as $news){ ?>
						 <article class="col-md-12 article-list">
				            <div class="inner">
				              <figure class="float_right"> 
					              <a target="_blank" href="detail.php?id=<?php echo $news["id"]; ?>"  >
									  <img height="100%" src="images/img/pdf.jpg"  alt="Image"> 
							     </a>  
				              </figure>
				              <div class="details mar_right"  > 
				                <h1 style="text-align: right;"  >
				                	<a target="_blank" href="detail.php?id=<?php echo $news['id']; ?>">
				                	<?php echo $news['title']; ?></a>
				                </h1>  
				                 <h6 style="text-align: right;"  > 
				                     <?php echo $news['description']; ?>
				                </h6> 
				                  <div class="detail float_right " style="padding-top: 10px;" >
				                  
									<div class="time " style="font-size: 17px; padding-right: 25px;" >
										<?php real_news_time($news['pubDate']); ?> 
									</div>
								    <div class="category " style="font-size: 17px;" >
										<a >  <?php echo "FYI PRESS ";  ?> </a>
									</div>

								</div>
				              </div>
				            </div>
				          </article>
				      <?php   } // for   	
									} // last page  3 open 
									?> 
						<div class="col-md-12 text-center  " style="padding-bottom: 30px;">
				            <ul class="pagination"> 
								<?php	if($numpage%10==0){
										$startpage=((floor($numpage/10)-1)*10)+1;
									}else{
										$startpage=(floor($numpage/10)*10)+1;
									}
						            
									if($numpage<=10){ 		 ?>
										 <li class="prev float_right">
										 	<a style="display: none;" href="library.php?n=
										 	<?php  echo $startpage-1; ?>">
										 		<i class="ion-ios-arrow-left"></i>
										 	</a>
										 </li> 
								<?php	}else{ ?> 
						                 <li class="prev float_right">
										 	<a  href="library.php?n=<?php  echo $startpage-1; ?>">
										 		<i class="ion-ios-arrow-left"></i>
										 	</a>
										 </li> 
								<?php	}
 
									
									$a=floor(($numpage-1)/10)*10;
									if($nbrpages-$a<=10){
										$a=ceil($numpage/10)*10;
										$endpage=$a-($a-$nbrpages);

									}else{
										$endpage=ceil($numpage/10)*10;
									}

									for ($i=$startpage; $i <=$endpage; $i++) { 
										if($numpage==$i){ ?>
											<li class="active float_right">
											 	<a href="library.php?n=<?php  echo $i; ?>">
											 		<?php echo $i; ?> 
											    </a>
											</li>  
									<?php	}else{ ?>
											<li class="float_right" >
											    <a href="library.php?n=<?php  echo $i; ?>">
												    <?php echo $i; ?> 
											    </a>
										    </li> 
								<?php   }
									}

									//next button
									if (ceil($nbrpages/10)>ceil($numpage/10)) { ?>
										<li class="next float_right">
											<a href="library.php?n=<?php  echo $endpage+1; ?>">
												<i class="ion-ios-arrow-left"></i>
											</a>
										</li> 
								<?php	}else{ ?>
							            <li class="next float_right">
											<a  style="display: none;" 
											    href="library.php?n=<?php  echo  $endpage+1; ?>">
												<i class="ion-ios-arrow-left"></i>
											</a>
										</li>

				                    <?php   } ?>  
				                <?php   if($nbrpages>10&&$numpage==$nbrpages){ ?>
				                        	<li class="active float_right" >
											    <a href="library.php?n=<?php  echo $nbrpages; ?>">
												    <?php echo $nbrpages; ?> 
											    </a>
										    </li>  
				                   <?php }else if($nbrpages>10){ ?>
				                        <li class="float_right" >
											    <a href="library.php?n=<?php  echo $nbrpages; ?>">
												    <?php echo $nbrpages; ?> 
											    </a>
									    </li> 
				              <?php  } ?>
				               </ul>
				            </div>  
		      </div>  </div> 

		    
			                 <?php  }else{ ?> 
                              		<script>
							           window.location.replace('404.php');
						            </script> 
                             <?php } // numpage 
                          }else{ // get isset ?> 
                          	<script>
							           window.location.replace('404.php');
						    </script> 
						<?php } ?>
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