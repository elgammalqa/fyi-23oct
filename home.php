§<?php   
session_start();
ob_start();   
require_once('models/utilisateurs.model.php');
require_once ('models/rssModel.php');
require_once ('fyipanel/models/ads.model.php');
require_once ('fyipanel/models/news_published.model.php'); 
require_once ('timee.php');  
require_once ('all.php');  
current_lang();

if(utilisateursModel::islogged())
	$log=true;  
else $log=false;   
$activee=1;      
$GLOBALS['nb_news_types']=0;

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

	<meta name="description" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts">
	<meta name="author" content="Chatsrun"> 
	<meta name="keyword" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts"> 
		<!-- Shareable -->
	<meta property="og:title" content="fyi Press, fyipress, News, Sports, Technlogy, General Culture, Arts" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://www.fyipress.net/home.php" /> 

	<link rel="icon"   href="images/fyipress.ico"> 
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
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/skins/all.css"> 
 
	<link rel="stylesheet" href="css/demo.css">  
	<style type="text/css">

		@media (min-width: 992px) {
			.video_height{ height: 340px; } 
			}else{ 
				.video_height{ height: 200px; }	 
			}
			video[poster]{ 
				width:100%;
			} 

			@media (max-width: 991px) {
				#margin_hotnews{ 
					margin-top: 40px; 
					margin-bottom: 40px;  
				} 
			}  


 		.xvideoHeight{
 			height: 310px;  

 		}
 		.xvideoTitle{
 			font-size: 18px !important;
 			color: black !important;
 			font-weight: bold;
 		}
 		a:hover{
 			color: #FC624D !important;
 			text-decoration: none !important; 
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
		<?php

        require_once ("header.php");
		$check=new news_publishedModel();
		$nbnewstosh=news_publishedModel::NbreNewsToShow();
		if(news_publishedModel::nbrhotnews()>0&&(adsModel::nbr_ads2()>0||($nbnewstosh>0&&count($check->NewsToShow($nbnewstosh))>0))){
		 ?> 
		<section class="home" style="padding-bottom: 0px;padding-top: 0px;  <?php if(isMobile()) echo ' margin-top: -10px; ' ?> " >
			<div class="container"   >
				<div class="row"> 
					<div class="col-md-8 col-sm-12 col-xs-12 mainSadow"> <!-- here edit -->
						<?php     
						$nbseconds=news_publishedModel::timToContinue();
						$realsconds=$nbseconds*1000; ?>
						<div data-interval="<?php echo $realsconds; ?>"  id="carouselExampleControls" class="carousel slide" data-ride="carousel" id="featured"  > 
							<div class="carousel-inner">
								<?php 
                          // ads  
								if (adsModel::nbr_ads2()>0) {
									$ad=new adsModel();  $req=$ad->ads();
									foreach($req as $news){
										if($activee==1)  echo '<div class="carousel-item  item active">';
										else  echo '<div class="carousel-item  item">';
										$activee=0;  ?> 
										<article>
											<?php  
											$type=adsModel::typeOfMedia($news['media']); 
											if ($type=="image") { ?>
												<a target="_blank" href="detail_ads.php?id=<?php echo 
												$news['id'];  ?>"  >
												<img preload="none"   width="100%" class="video_height" style="  padding-bottom: 5px; " 
												src="<?php echo 'ads/image/'.$news['media']; ?>" 
												alt="Image"> 
											</a> 
										<?php	}else  if ($type=="video") { ?> 
											<a target="_blank" href="detail_ads.php?id=<?php echo 
											$news['id'];  ?>">
											<video preload="none"  width="100%" controls="controls" class="video_height"
											<?php  $thumbnail=$news['thumbnail'];
											if ($thumbnail!=""){
												echo 'poster="'.$thumbnail.'"'; } ?>   >
												<source src="<?php echo 'ads/image/'.
												$news['media']; ?>"  
												>
											</video>  
										</a>
									<?php	} ?>    
									<div class="con-vid" >
										<div style="padding-top: 10px;" class="one-t">
											<a style=" background-color: #FC624D;" >
												<?php echo "News";  ?></a>
											</div>
											<h5 class="one-title">
												<a style="color: black;" target="_blank" 
												href="detail_ads.php?id=<?php echo $news['id'];  ?>" >
												<?php echo $news['title'];  ?> 
											</a>
										</h5> 
										<div class=" time2">
											<a>
											FYI Press </a> &nbsp;&nbsp;&nbsp;&nbsp;
											<?php real_news_time($news['pubDate']);
											$linkv="detail_ads.php?id=".$news['id'];
											echo ads_link_comments($news['id'],$log,$linkv,'comment','comments');
											?>
										</div>

                                        <span style="padding-left: 20px; float: left;">
                            <a style="color:black;" target="_blank" href="news_reply.php?news=<?= $news['id'] ?>&r=<?=$news['rank']?>">
                                Right of reply <img src="images/microphone.png">
                            </a>
                                        </span>

										</div>
									</article>
								</div>
							<?php } }
                       		//news
							$news=new news_publishedModel();
							$nbrnewstodisplay=news_publishedModel::NbreNewsToShow();
							if($nbrnewstodisplay>0){
								$req=$news->NewsToShow($nbrnewstodisplay);
								foreach($req as $news){
									if($news['rank']==1){
										$thumbnail=$news['thumbnail'];
										$mediav='fyipanel/views/image_news/'.$news['media'];
										$linkv="detail.php?id=".$news['id'];
										if ($news['type']=="General Culture") $typesectionv="Culture";
										else  $typesectionv=$news['type'];
										$source="FYI Press";
									}else{
										$thumbnail=$news['thumbnail'];
										$mediav=$news['media'];
										$typesectionv=$news['type'];
										$source=$news['Source'];
										//zzz
										if(news_publishedModel::source_not_open($source)){
										   $linkv=stripslashes($news['link']);
										}else{
										   $has_http = strpos($news['link'],'http://') !== false;
										   if($has_http){
										   	  $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }else{
										   	  $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }
										}
										//
									}
									if ($activee==1) echo '<div  class="carousel-item active item">';
									else echo '<div class="carousel-item  item">';
									$activee=0; ?>
									<article>
										<?php
										$type=news_publishedModel::typeOfMedia($news["media"]);
										if ($type=="image") { ?>
											<a target="_blank" href="<?php echo $linkv;  ?>"  >
												<img preload="none"   width="100%"  class="video_height"   style="   padding-bottom: 5px; object-fit: contain; "  src="<?php echo $mediav; ?>"  alt="Image">
											</a>
										<?php	}else  if ($type=="audio"||$type=="video") { ?>
											<video preload="none"  width="100%" class="video_height" controls
											<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?>  >
											<source src="<?php echo $mediav; ?>">
											</video>
										<?php }   ?>
										<div class="con-vid" >
											<div class="one-t">
												<a  target="_blank" href="category.php?id=
												<?php echo  $typesectionv; ?>&n=1"
												style=" background-color: #FC624D;" >
												<?php echo $news['type'];  ?>
											    </a>
											</div>
											<h6 class="one-title">
												<a style="color:black;" target="_blank" href="<?php echo $linkv;  ?>" >
													<?php echo $news['title'];  ?>
												</a>
											</h6>
											<div class="time2">
												<a style=" text-transform: capitalize; color: black;" >
												<?php echo $source; ?> </a> &nbsp;&nbsp;&nbsp;&nbsp;
												<?php real_news_time($news['pubDate']);
												echo link_comments($news['id'],$log,$linkv,'comment','comments',$news['rank']);
												?>

											</div>
                                            <span style="padding-left: 20px; float: left;">
                            <a style="color:black;" target="_blank" href="news_reply.php?news=<?= $news['id'] ?>&r=<?=$news['rank']?>">
                                Right of reply <img src="images/microphone.png">
                            </a>
                                        </span>
										</div>
									</article>
								</div>
							<?php  } }
							?>
						</div>
						<?php if(isMobile()){ ?>
							<a class="carousel-control-prev " href="#carouselExampleControls " role="button"
							data-slide="prev" style=" height: 25%; align-items: flex-end;   width: 15%; "   >
							<span class="carousel-control-prev-icon align-bottom" aria-hidden="true"  ></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next  " href="#carouselExampleControls"
						role="button" data-slide="next"
						style="    align-items: flex-end; height: 25%;  width: 15%;" >
						<span class="carousel-control-next-icon" aria-hidden="true"   ></span>
						<span class="sr-only">Next</span>
					</a>
				<?php }else{ ?>
					<a class="carousel-control-prev prev_next_mobile" href="#carouselExampleControls " role="button"
					data-slide="prev" style="height: 50%;   align-items: flex-end;   width: 15%; "   >
					<span class="carousel-control-prev-icon align-bottom" aria-hidden="true"  ></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next  " href="#carouselExampleControls"
				role="button" data-slide="next"
				style="    align-items: flex-end; height: 50%; width: 15%;" >
				<span class="carousel-control-next-icon" aria-hidden="true"   ></span>
				<span class="sr-only">Next</span>
			</a>
		<?php }  ?>

	</div> <!-- c -->
</div> <!-- 8 -->

<div class="col-xs-12 col-sm-12 col-md-4 " id="margin_hotnews" >
						<?php if(news_publishedModel::nbrhotnews()>0){ ?>
							<h1 class="title-col" >
								Hot News
								<div class="carousel-nav" id="hot-news-nav">
									<div class="prev">
										<i class="ion-ios-arrow-left"></i>
									</div>
									<div class="next">
										<i class="ion-ios-arrow-right"></i>
									</div>
								</div> 
							</h1>
							
 							<?php  
							    $there_is_ad=false;
								date_default_timezone_set('GMT'); 
     							$time_now=date("H:i").':00'; 
     							$id_of_ad=adsModel::get_ad_id('fyipanel/views/connect.php',$time_now); 
							 ?>  
							 <?php  if(!isMobile()){ ?>
							<div style="height: 190px; margin-top: 20px;"> 
								<?php if($id_of_ad==null){//default ad
								  $q=adsModel::get_data_condition('fyipanel/views/connect.php','default_hot_ad','id',1);
						          foreach ($q as $key => $value) {
						            $media_=$value['media'];
						            $link_=$value['link'];
						            $fit_=$value['fit'];
						          }
								  ?> 
								  <a <?php if($link_!=null) { echo 'href="'.$link_.'"'; } ?> >
								  	<img src="hot_ads/media/<?php echo  $media_; ?>"  
 									 style="background-color: white; height: 180px; width: 100%; border: none; object-fit: <?php echo $fit_; ?>;" >
								  </a> 
 
     						 <?php  }else{//there is an ad 
     						 	$there_is_ad=true;
     									$qr=adsModel::get_data_condition('fyipanel/views/connect.php','hot_ads','id',$id_of_ad);
     									foreach ($qr as $key => $value_ad) {
     										$media_ad=$value_ad['media'];
     										$thumb_ad=$value_ad['thumbnail'];
     										$link_ad=$value_ad['link'];
     										$id_ad=$value_ad['id'];
     										$fit_ad=$value_ad['fit'];
     									} 
     									$img_or_video=news_publishedModel::typeOfMedia($media_ad);
     									 
     									if($img_or_video=='image'){ ?> 
								  			<form method="post" >
 												<button name="add_hot_ad" type="submit" style="border: none !important ; width: 100% "  >
 													<img src="hot_ads/media/<?php echo $media_ad; ?>"  
 												style="height: 180px; width: 100%; object-fit: <?php echo $fit_ad; ?> " >
 												</button>
 											</form> 
     									<?php }else if($img_or_video=='video'){ ?>
     										<video id="myVideo" style="height: 180px; width: 100%; " controls
												<?php if ($thumb_ad!=""){ echo 'poster="hot_ads/thumbnail/'.$thumb_ad.'"'; } ?> >
												<source src="hot_ads/media/<?php echo $media_ad; ?>" >
											</video>
     									<?php } 
     							    }//ad exist 
     							?>
							</div>
						<?php } ?>
                    <?php if(!isMobile() && $there_is_ad ){ include('count_hot_ads.php'); }?> 
 						<?php  if(!isMobile()){ ?>
							<div class="body-col vertical-slider" data-max="3" data-nav="#hot-news-nav" data-item="article" style="height: 270px; margin-top: 0px !important;" >
						<?php }else{ ?>
							<div class="body-col vertical-slider" data-max="3" data-nav="#hot-news-nav" data-item="article" style="height: 420px !important;" > 
						<?php } ?>

								<?php $news=new news_publishedModel();
								$query=$news->hotnews(10);
								foreach($query as $news){  ?>
									<article class="article-mini shadowBox" style="margin-bottom: 10px;" > <!--edit here-->
										<div class="inner">
											<?php  if($news['rank']==1){
												$media='fyipanel/views/image_news/'.$news['media'];
												$linkv="detail.php?id=".$news['id'];
												$typesection4="FYI Press";
											}else{
												$media=$news['media'];
												$typesection4=$news['type'];
										//zzz
										if(news_publishedModel::source_not_open($typesection4)){
										   $linkv=stripslashes($news['content']);
										}else{
										   $has_http = strpos($news['content'],'http://') !== false;
										   if($has_http){
										   	  $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['content'])."&id=".$news['id'];
										   }else{
										   	  $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['content'])."&id=".$news['id'];
										   }
										}
										//
											}
											?>
											<figure  style="width: 120px; height: 100px;" >
												<a target="_blank" href="<?php echo $linkv;  ?>">
													<img style="height: 100px;" preload="none"  src="<?php echo $media; ?>" alt="Image">
												</a>
											</figure>
											<div class="padding" style="padding-left: 50px;" >
												<h1 style="font-size: 12px;" ><a target="_blank"
													href="<?php echo $linkv;  ?>">
													<?php echo $news['title'];  ?>
												</a>
											</h1>
											<div class="detail" >
												<div class="category">
													<a >
														<?php echo  $typesection4;  ?>
													</a>
												</div>
												<div class="time">
													<?php real_news_time($news['pubDate']);  ?>
												</div>

											</div>
										</div>
									</div>
								</article>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
	<div style="height: 40px; background-color: #e9ebee; " ></div>
	<?php

    if(news_publishedModel::nbrnewsStartCountVideos2()>0){ ?>
		<!--  section daily news -->
		<section  class="best-of-the-week" style="padding-bottom: 0px;padding-top: 0px;">
			<div class="container">
				<h1>
					<div class="text">Videos</div>
					<div class="carousel-nav" id="best-of-the-week-nav">
						<div class="prev">
							<i class="ion-ios-arrow-left"></i>
						</div>
						<div class="next">
							<i class="ion-ios-arrow-right"></i>
						</div>
					</div>
				</h1>
				<div class="owl-carousel owl-theme carousel-1">
					<?php  	// news videos
					$newsa=new news_publishedModel();
					$query=$newsa->newsStartCountVideos2(10);
					foreach($query as $news){
						if($news['rank']==1){
							$thumbnail=$news['thumbnail'];
							$mediav='fyipanel/views/image_news/'.$news['media'];
							$linkv="detail.php?id=".$news['id'];
							$typesectionv="FYI Press";
						}else{
							$thumbnail=$news['thumbnail'];
							$mediav=$news['media'];
							$typesectionv=$news['Source'];
										//zzz
										if(news_publishedModel::source_not_open($typesectionv)){
										   $linkv=stripslashes($news['link']);
										}else{
										   $has_http = strpos($news['link'],'http://') !== false;
										   if($has_http){
										   	  $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }else{
										   	  $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }
										}
										//
						}
						?>
						<article class="article xvideoHeight" >
							<div class="inner" style="box-shadow:none !important;" >
								<figure>
									<a>
										<video preload="none"  width="100%" height="100%" controls
										<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?> >
										<source src="<?php echo $mediav; ?>"  >
										</video>
									</a>
								</figure>
								<div>
									<p>
										<a target="_blank" class="xvideoTitle"
										 href="<?php echo $linkv; ?>">
										<?php echo $news['title']; ?></a>
									</p>
										<div class="detail">
											<div class="category">
												<a>   <?php echo   $typesectionv;  ?>    </a>
											</div>
											<div class="time"><?php real_news_time($news['pubDate']);  ?></div>
                                            

										</div>
									</div>
								</div>
							</article>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>
		<!-- end of section daily news -->

		<?php
		function getrssnews($n){
			if(news_publishedModel::nbrNewsBySourceindex($n)>0){   	?>
				<div class="line">
					<div> <?php echo $n; ?> </div>
				</div>
				<div class="row">
					<?php
					$rss = new news_publishedModel();
					$req=$rss->getNewsRssByTypeCount($n,4);
					foreach($req as $news){
						if($news['rank']==1){
							$thumbnail=$news['thumbnail'];
							$mediav='fyipanel/views/image_news/'.$news['media'];
							$linkv="detail.php?id=".$news['id'];
							$typesectionv="FYI Press";
						}else{
							$thumbnail=$news['thumbnail'];
							$mediav=$news['media'];
							$typesectionv=$news['Source'];
										//zzz
										if(news_publishedModel::source_not_open($typesectionv)){
										   $linkv=stripslashes($news['link']);
										}else{
										   $has_http = strpos($news['link'],'http://') !== false;
										   if($has_http){
										   	  $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }else{
										   	  $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }
										}
										//
						}
						?>
						<article class="col-md-12 article-list">
							<div class="inner">
								<figure>
									<?php
									$type=news_publishedModel::typeOfMedia($news["media"]);
								      //poster="https://addpipe.com/sample_vid/poster.png" hhh
									if ($type=="video"||$type=="audio") { ?>
										<video preload="none"  height="100%"   width="100%" controls
										<?php if ($thumbnail!=""){ echo 'poster="'.$thumbnail.'"'; } ?> >
										<source src="<?php echo $mediav; ?>"  >
										</video>
									<?php }else  if ($type=="image") { ?>
										<a target="_blank" href="<?php echo $linkv; ?>" >
											<img preload="none"  height="100%"  src="<?php echo $mediav; ?>" alt="image">
										</a>
									<?php }   ?>
								</figure>
								<div class="details">
									<h1><a target="_blank" href="<?php echo $linkv; ?>" >
										<?php echo $news["title"]; ?></a>
									</h1>
									<p>
										<?php echo $news["description"]; ?>
									</p>
									<footer>
										<div class="detail">
											<div class="category">
												<a><?php echo $typesectionv; ?></a>
											</div>
											<div class="time"><?php real_news_time($news["pubDate"]); ?></div>
                                            <span style="padding-right: 20px; float: right;">
                            <a style="color:black;" target="_blank" href="news_reply.php?news=<?= $news['id'] ?>&r=<?=$news['rank']?>">
                                Right of reply <img src="images/microphone.png">
                            </a>
                        </span>
										</div>
											<!--<a target="_blank" class="btn btn-primary more"
										href="<?php //echo $linkv; ?>">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a> -->
								</footer>
							</div>
						</div>
					</article>
				<?php } ?>
				<footer style="margin-left: 40%"  >
					<?php if ($n!="General Culture") {
						$srcc=$n;
					}else{$srcc="Culture"; } ?>
					<a class="btn btn-primary more "
					href="category.php?id=<?php echo $srcc; ?>&n=1">
					<div>Show More</div>
					<div><i class="ion-ios-arrow-thin-right"></i></div>
				</a>
			</footer>
			<br><br><br>
		</div>
	<?php	}}

	$table=array("News","Sports","Arts","Technology","General Culture", "Economy", "Health");
	foreach ($table as $key => $value)
		if(news_publishedModel::nbrNewsBySourceindex($value)>0) $GLOBALS['nb_news_types']++;
	if($GLOBALS['nb_news_types']>0&&(news_publishedModel::rsscount2()>0||news_publishedModel::nbr_news_without_images2()>0||news_publishedModel::pdfcount()>0)) {  ?>
		<section class=" home " style="padding-bottom: 0px;padding-top: 0px;"  >
			<div class="container">
				<div class="row" >
					<!-- newssssss-->
					<div class="col-md-8 col-sm-12 col-xs-12 "  >
						<?php   foreach ($table as $key => $value)  getrssnews($value);  ?>
					</div> <!-- endof8 -->
					<div class="col-xs-12 col-sm-12 col-md-4" style="padding-bottom: 60px;" >
						<?php
						if(news_publishedModel::rsscount2()>0||news_publishedModel::nbr_news_without_images2()>0) {
							$nbnews=$GLOBALS['nb_news_types']*6;
							?>
							<aside><br>
								<div class="line" style="margin: 0px 0px;"><div>News</div></div>
								<div class="tab-content">
									<div class="tab-pane active" id="recomended">
										<?php $news=new news_publishedModel();
										$query=$news->newsWithoutMedia($nbnews);
										foreach($query as $news){
											if($news['rank']==1){
												$linkv="detail.php?id=".$news['id'];
												$typesectionv="FYI Press";
											}else{
												$typesectionv=$news['Source'];
										//zzz
										if(news_publishedModel::source_not_open($typesectionv)){
										   $linkv=stripslashes($news['link']);
										}else{
										   $has_http = strpos($news['link'],'http://') !== false;
										   if($has_http){
										   	  $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }else{
										   	  $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
										   }
										}
										//
											}
											?>
											<article class="article-mini">
												<div  >
													<h1><a target="_blank" href="<?php echo $linkv; ?>">
														<?php echo $news['title']; ?></a></h1>
														<p><?php echo $news['description']; ?></p>
														<div class="detail">
															<div class="category">
																<a>
																	<span class="fa fa-newspaper"></span>
																	<b><?php echo $typesectionv; ?></b>
																</a>
															</div>
															<div class="time"><?php echo real_news_time($news['pubDate']); ?></div>

														</div>
													</div>
												</article>
											<?php } ?>
											<footer >
												<a target="_blank" class="btn btn-primary more pull-right " href="rssall.php?id=1">
													<div>Show More</div>
													<div><i class="ion-ios-arrow-thin-right"></i></div>
												</a>
											</footer>
										</div>
									</div>
								</aside>
							<?php }

							if(news_publishedModel::pdfcount()>0){ ?>
								<h1 class="title-col">
									Library
									<div class="carousel-nav" id="hot-news-nav">
										<div class="prev">
											<i class="ion-ios-arrow-left"></i>
										</div>
										<div class="next">
											<i class="ion-ios-arrow-right"></i>
										</div>
									</div>
								</h1>
								<div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article" >
									<?php	$news=new news_publishedModel();
									$query=$news->newsStartCountpdf();
									foreach($query as $news){  ?>
										<article class="article-mini" style="background-color: white;" >
											<div class="inner" >
												<figure>
													<a target="_blank" href="detail.php?id=<?php echo $news['id'];  ?>">
														<img preload="none"  style="width: 100%; height: 100%" src="images/img/pdf.jpg" alt="Image">
													</a>
												</figure>
												<div class="padding">
													<h1><a target="_blank" href="detail.php?id=<?php echo $news['id'];  ?>">
														<?php echo $news['title'];  ?>
													</a>
												</h1>
												<div class="detail">
													<div class="category">
														<a >
															<?php echo  $news['type'] ;  ?>
														</a>
													</div>
													<div class="time"><?php real_news_time($news['pubDate']);  ?></div>
                                                    <span style="padding-right: 20px; float: right;">
                            <a style="color:black;" target="_blank" href="news_reply.php?news=<?= $news['id'] ?>&r=<?=$news['rank']?>">
                                Right of reply <img src="images/microphone.png">
                            </a>
                        </span>
												</div>
											</div>
										</div>
									</article> 
								<?php } ?>

							</div> 
							<hr>
							<footer >
								<a target="_blank" class="btn btn-primary more pull-right " 
								href="Library.php?n=1">
								<div>Show More</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					<?php } ?> 
				</div> 
			</div>
		</div>
	</section> 
<?php } ?>

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

