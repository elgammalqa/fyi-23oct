<?php   
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
require_once('timee.php');
include '../models/v5.news_published.php';
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
	<style type="text/css">
		@media only screen and (min-width: 992px) {
			#ptop {
				padding-top: 23%;
			}
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
	<?php require_once ("fyi_header.php");  
	 if(isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['n'])&&!empty($_GET['n'])){ // id and num page existe  
							if($_GET['id']!="News"&&$_GET['id']!="Arts"&&$_GET['id']!="Sports"&&$_GET['id']!="Culture"&&$_GET['id']!="Technology"){ ?> 
								<script>
									window.location.replace('404.php');
								</script> 
							<?php	}else{  
								if ($_GET['id']=="Culture") {  
									$source="General Culture";
								}else{
									$source=$_GET['id'];   
								} 
								$numpage=$_GET['n'];   
								$nbrfeeds=v5newspublished::nbrNewsBySourceindex($source);
								$nbrpages=ceil($nbrfeeds/10); 
								if ($numpage>=1&&$numpage<=$nbrpages&&v5newspublished::nbrhotnews()>0) { 
									$nbhnews=0;
								  ?>
	<section class="category">
		<div class="container">
			<div class="row"> 	 
				<div class="col-md-8 text-left"> 
									<div class="row">
						          <div class="col-md-12">        
						            <ol class="breadcrumb">
						              <li><a href="fyi.php">Ana Sayfa </a></li>
						              <li class="active"><?php echo utilisateursModel::type(
						              	$source); ?></li>
						            </ol>
						            <h1 class="page-title">Kategori: <?php echo utilisateursModel::type($source);  ?></h1>
						            <p class="page-subtitle">Kategoriyle tüm mesajları göster <i><?php echo utilisateursModel::type($source);  ?></i></p>
							          </div> 
									</div>
									<div class="line"></div>
									<div class="row">
								<?php	$start=$numpage*10-10;//0
									if ($nbrfeeds-$start>=10) {//25 
										$nbhnews=9;
										$req=v5newspublished::getspecialfeedsBySource($source,$start,10);
										foreach($req as $news){  
												$thumbnail=$news['thumbnail'];
												$mediav='fyipanel/views/image_news/'.$news['media']; 
												$linkv="fyi_detail.php?id=".$news['id']; 
												$source2=$news['type'];  
											?> 
											<article class="col-md-12 article-list">
												<div class="inner">
													<figure> 
														<?php 
														$type=v5newspublished::typeOfMedia($news['media']); 
														if($type=="video"||$type=="audio"){ ?>
															<a><video height="100%" width="100%" controls 
																<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?> >
																<source src="<?php echo $mediav; ?>" alt="video" >
																</video>
															</a>
														<?php	}else  if ($type=="image") { ?>
															<a  href="<?php echo $linkv; ?>"  >
																<img height="100%"   
																src="<?php echo $mediav; ?>" alt="Image">  
															</a> 
														<?php	}  ?>  
													</figure>
													<div class="details"> 
														<h1><a  href="<?php echo $linkv; ?>">
															<?php echo $news['title']; ?></a>
														</h1>
														<p> <?php echo $news['description']; ?>  </p>
														<div class="detail">
															<div class="category">
																<a  > 
																	<?php echo utilisateursModel::type($source2); ?>     
																</a>
															</div>
															<div class="time"><?php real_news_time($news['pubDate']); ?></div>
															<?php 
								if($log){
													if(v5newspublished::already_read($news['id'])){
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: green; " aria-hidden="true"></i></div>';
													}else{
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: red; " aria-hidden="true"></i></div>';
													}
												}//log
								 ?> 
														</div> 
													</div>
												</div>
											</article>
				        <?php 	} //for
				    }else{ 
				    	$req=v5newspublished::getspecialfeedsBySource($source,$start,$nbrfeeds-$start);
				    	$nbhnews=$nbrfeeds-$start;
				    	foreach($req as $news){ 
				    			$thumbnail=$news['thumbnail'];
				    			$mediav='fyipanel/views/image_news/'.$news['media']; 
				    			$linkv="fyi_detail.php?id=".$news['id']; 
				    			$source2=$news['type'];   
				    		?>
				    		<article class="col-md-12 article-list">
				    			<div class="inner">
				    				<figure> 
				    					<?php 
				    					$type=v5newspublished::typeOfMedia($news['media']); 
				    					if($type=="video"||$type=="audio"){ ?>
				    						<a>
				    							<video height="100%"  width="100%"   controls 
				    							<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?>  >
				    							<source src="<?php echo $mediav; ?>" alt="video">
				    							</video>
				    						</a>
				    					<?php	}else  if ($type=="image") { ?>
				    						<a  href="<?php echo $linkv; ?>"  >
				    							<img height="100%"   
				    							src="<?php echo $mediav; ?>" alt="Image">  
				    						</a> 
				    					<?php	} ?>  
				    				</figure>
				    				<div class="details"> 
				    					<h1><a  href="<?php echo $linkv; ?>">
				    						<?php echo $news['title']; ?></a>
				    					</h1>
				    					<p> <?php echo $news['description']; ?>  </p>

				    					<div class="detail">
				    						<div class="category">  
				    							<a  >
				    								<?php echo utilisateursModel::type($source2); ?> 
				    							</a>
				    						</div>
				    						<div class="time"><?php real_news_time($news['pubDate']); ?></div>
				    						<?php 
								if($log){
													if(v5newspublished::already_read($news['id'])){
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: green; " aria-hidden="true"></i></div>';
													}else{
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: red; " aria-hidden="true"></i></div>';
													}
												}//log
								 ?> 
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
												<li class="prev">
													<a style="display: none;" href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$startpage-1; ?>">
														<i class="ion-ios-arrow-left"></i>
													</a>
												</li> 
											<?php	}else{ ?> 
												<li class="prev">
													<a  href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$startpage-1; ?>">
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
													<li class="active">
														<a href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$i; ?>">
															<?php echo $i; ?> 
														</a>
													</li>  
												<?php	}else{ ?>
													<li >
														<a href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$i; ?>">
															<?php echo $i; ?> 
														</a>
													</li> 
												<?php   }
											}

									//next button
											if (ceil($nbrpages/10)>ceil($numpage/10)) { ?>
												<li class="next">
													<a href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$endpage+1; ?>">
														<i class="ion-ios-arrow-right"></i>
													</a>
												</li> 
											<?php	}else{ ?>
												<li class="next">
													<a  style="display: none;" href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$endpage+1; ?>">
														<i class="ion-ios-arrow-right"></i>
													</a>
												</li>

											<?php   } ?>  
											<?php   if($nbrpages>10&&$numpage==$nbrpages){  ?>
												<li class="active" >
													<a href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$nbrpages; ?>">
														<?php echo $nbrpages; ?> 
													</a>
												</li>  
											<?php }else if($nbrpages>10){   ?>
												<li>
													<a href="fyi_category.php?id=<?php  echo $_GET['id'],'&n=',$nbrpages; ?>">
														<?php echo $nbrpages; ?> 
													</a>
												</li> 
											<?php  } ?>
										</ul>
									</div>  
								</div>  
							</div> 

							<?php if(v5newspublished::nbrhotnews()>0){  ?> 
								<div class="col-md-4 sidebar" id="sidebar"> 
									<aside> 
										<br>
										<h1 id="ptop" class="aside-title">Güncel Haberler</h1>
										<div class="aside-body"> 
											<?php      
											$query=v5newspublished::hotnews($nbhnews);
											foreach($query as $news){ 
													$media='fyipanel/views/image_news/'.$news['media']; 
													$link="fyi_detail.php?id=".$news['id'];
													$typesection4=$news['type'];   
												?>   
												<article class="article-fw" style="padding-bottom: 40px;" >
													<div class="inner">
														<figure>
															<a  href="<?php echo $link; ?>" > 
																<img width="100%" height="100%"  src="<?php echo $media; ?>" alt="Image">
															</a>
														</figure>
														<div class="details">
															<h1>
																<a  href="<?php echo $link; ?>" > 
																	<?php echo $news['title']; ?> </a>
																</h1>
																<div class="detail" style="padding-top: 10px;" >
																	<div class="category">
																		<a >  <?php echo utilisateursModel::type($typesection4); ?> </a>
																	</div>
																	<div class="time">
																		<?php real_news_time($news['pubDate']); ?> 
																	</div>
																	<?php 
								if($log){
													if(v5newspublished::already_read($news['id'])){
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: green; " aria-hidden="true"></i></div>';
													}else{
													echo '<div class="time"><i class="fa fa-circle" style=" padding-left: 15px; font-size: 10px; color: red; " aria-hidden="true"></i></div>';
													}
												}//log
								 ?> 
																</div>
															</div>
														</div>
													</article>

												<?php } ?> 
											</div> 
										</aside>
									</div>
								<?php } // news > 0 ?>
							<?php  }else{ ?> 
								<script>
									window.location.replace('404.php');
								</script> 
                             <?php } // numpage
                              } // category 
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
          <script  >
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