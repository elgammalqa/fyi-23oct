<?php 
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
require_once('timee.php');
include 'fyipanel/models/news_published.model.php';
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
				/* v5 */
                .float_rightt{ 
                	    font-weight: 800;
    					font-family: 'Raleway';
						text-align: right; 
						font-size: 20px;
				} 
                .float_rightp{ 
					text-align: right;
					font-family: 'Droid Arabic Kufi', serif;
					letter-spacing: 0px;
				} 
                .float_rightd{ 
					text-align: right;
					font-family: 'Droid Arabic Kufi', serif;
					letter-spacing: 0px;
					font-size: 18px;
				} 

				/* /v5 */
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
				.mar_right{margin-right: 315px !important; margin-left: 0px !important}
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
		 	 <?php require_once ("header.php"); 
						if(isset($_GET['n'])&&!empty($_GET['n'])){ // id and num page existe

                            $numpage=$_GET['n'];
                            $newspub = new news_publishedModel();
                            $nbrfeeds= $newspub->nbrBreakingNews();

                            $nbrpages=ceil($nbrfeeds/10);
                            if ($numpage>=1&&$numpage<=$nbrpages) {
                                $start2=$numpage*10-10;//0
                                if ($nbrfeeds-$start2>=10)
                                    $nbhnews=7;
                                else $nbhnews=ceil( ($nbrfeeds-$start2)/2 );

          ?>
    <section class="category">
      <div class="container">
        <div class="row">
         <?php if(news_publishedModel::nbrhotnews()>0){  ?>
         <div class="col-md-4 sidebar" id="sidebar">
                    <aside>
                        <br>
                        <h1 class="aside-title float_right" style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; margin-bottom: 0px;">חדשות אחרונות</h1>
                            <div class="line" style="margin :20px; " ></div>
                        <div class="aside-body">
                            <?php
                            $news=new news_publishedModel();

                                $query=$news->hotnews($nbhnews);
                                foreach($query as $news){
                                  if($news['rank']==1){
                                        $media='fyipanel/views/image_news/'.$news['media'];
                                        $link="detail.php?id=".$news['id'];
                                        $typesection4="FYIPress ";
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

                        <article class="article-fw" style="padding-bottom: 40px; direction: rtl;" >
                            <div class="inner">
                                <figure>
                                    <a target="_blank" href="<?php echo $link; ?>" >
                                      <img width="100%" height="100%"  src="<?php echo $media; ?>" alt="Image">
                                      </a>
                                </figure>
                                <div class="details">
                                    <h1  >
                                        <a style="font-size: 18px;" target="_blank" href="<?php echo $link; ?>" >
                                       <?php echo $news['title']; ?> </a>
                                    </h1>
                                    <div class="detail float_right " style="padding-top: 10px;" >

                                        <div style="font-size: 17px; padding-left: 15px;" >
                                          <a >  <?php echo utilisateursModel::source($typesection4);  ?> </a>
                                        </div>
                                        <div class="time " style="font-size: 17px;" >
                                            <?php real_news_time($news['pubDate']); ?>
                                        </div>

                                        <div style="margin-right: 25px; float: left; font-size: 17px; direction: rtl;"><a class="right_of_reply_news_link" target="_blank"
                                                                                                                          href="news_reply.php?news=<?=$news['id']?>&r=<?=$news['rank']?>" >זכות תשובה<img src="../images/microphone.png"
                                                        alt=""></a></div>
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
                            <div class="row">
                              <div class="col-md-12 float_right">
                                <ol   style="list-style: none; " >
                                  <li class="float_right fs_cat "  ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;"  href="index.php">בית</a>
                                  </li>
                                  <li class="float_right fs_cat">  &nbsp; / &nbsp;</li>
                                  <li class="float_right fs_cat" class="active">חדשות מרעישות</li>
                                 </ol>
                             </div>
                            </div>
                            <div class="line"></div>
                            <div class="row">
                            <?php	$start=$numpage*10-10;//0
                                if ($nbrfeeds-$start>=10) {//25
                                     $req=$newspub->getspecialfeedsBreakingNews($start,10);

                                 foreach($req as $news){

                                     $mediav=$news['media'];
                                     $source2=$news['Source'];

                                    //zzz
                                    if(news_publishedModel::source_not_open($source2)){
                                       $linkv=stripslashes($news['link']);
                                       $right_of_reply = false;
                                    }
                                    else{
                                        $right_of_reply = true;
                                       $has_http = strpos($news['link'],'http://') !== false;
                                       if($has_http){
                                          $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
                                       }else{
                                          $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
                                       }
                                    }
                                    //

                                  ?>
                                      <article class="col-md-12 article-list" style="direction: rtl;" >
                                        <div class="inner">
                                          <figure style="float: right;">

                                                <a target="_blank" href="<?php echo $linkv; ?>"  >
                                                <img height="100%"
                                                    src="<?=($news['media'] !== '') ? $mediav : 'fyipanel/views/image_news/breaking_news.jpeg'; ?>" alt="Image">
                                                </a>

                                          </figure>
                                          <div class="details mar_right">
                                                    <h1 class="float_rightt" >
                                                        <a target="_blank" href="<?php echo $linkv; ?>">
                                                        <?php echo $news['title']; ?></a>
                                                    </h1>
                                                    <p class="float_rightp">
                                                        <?php
                                                        if(strlen(trim($news["description"])) > 0){
                                                            $real_sentence=stripslashes($news["description"]);
                                                            $nb_words=str_word_count($real_sentence);
                                                            $sentence=implode(' ', array_slice(explode(' ', $real_sentence), 0, 40));
                                                            $nb_words2=str_word_count($sentence);
                                                            echo $sentence;
                                                            if ($nb_words>$nb_words2) {
                                                                echo '<br> ...';
                                                            }
                                                        }

                                                        ?>
                                                    </p>

                                                    <div class="detail" style="float: right;">
                                                        <div class="category" style="padding-left: 20px;">
                                                            <a class="float_rightd" >
                                                                <?php echo $source2; ?>
                                                            </a>
                                                        </div>
                                                        <div class="time ">
                                                            <span class="float_rightd">
                                                            <?php real_news_time($news['pubDate']); ?>
                                                            </span>
                                                        </div>

                                                        <div class="time right_of_reply">
                                                            <span class="float_rightd">
                                                                <a class="right_of_reply_news_link" href="news_reply.php?news=<?=$news['id']?>&r=2">זכות תשובה<img src="../images/microphone.png" alt=""></a>
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                        </div>
                                      </article>
                                    <?php 	} //for
                                    }
                                else{
                                    $req=$newspub->getspecialfeedsBreakingNews($start,$nbrfeeds-$start);
                                     foreach($req as $news){
                                       
                                     $mediav=$news['media'];
                                     $source2=$news['Source'];

                                    //zzz
                                    if(news_publishedModel::source_not_open($source2)){
                                       $linkv=stripslashes($news['link']);
                                    }
                                    else{
                                       $has_http = strpos($news['link'],'http://') !== false;
                                       if($has_http){
                                          $linkv=utilisateursModel::getLink("http_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
                                       }else{
                                          $linkv=utilisateursModel::getLink("https_link")."/iframe.php?link=".stripslashes($news['link'])."&id=".$news['id'];
                                       }
                                    }
                                    //
                                    
                      ?>

                      <article class="col-md-12 article-list" style="direction: rtl;" >
                        <div class="inner">
                          <figure style="float: right;">
                              <a target="_blank" href="<?php echo $linkv; ?>"  >
                                  <img height="100%"
                                       src="<?=($news['media'] !== '') ? $mediav : 'fyipanel/views/image_news/breaking_news.jpeg'; ?>" alt="Image">
                              </a>
                          </figure>
                          <div class="details mar_right">
                                    <h1 class="float_rightt" >
                                        <a target="_blank" href="<?php echo $linkv; ?>">
                                        <?php echo $news['title']; ?></a>
                                    </h1>
                                    <p class="float_rightp">
                                        <?php
                                        if(strlen(trim($news["description"])) > 0){
                                            $real_sentence=stripslashes($news["description"]);
                                            $nb_words=str_word_count($real_sentence);
                                            $sentence=implode(' ', array_slice(explode(' ', $real_sentence), 0, 40));
                                            $nb_words2=str_word_count($sentence);
                                            echo $sentence;
                                            if ($nb_words>$nb_words2) {
                                                echo '<br> ...';
                                            }
                                        }

                                        ?>
                                    </p>

                                    <div class="detail" style="float: right;">
                                        <div class="category" style="padding-left: 20px;">
                                            <a class="float_rightd" >
                                                <?php echo $source2; ?>
                                            </a>
                                        </div>
                                        <div class="time ">
                                            <span class="float_rightd">
                                            <?php real_news_time($news['pubDate']); ?>
                                            </span>
                                        </div>

                                        <div class="time right_of_reply">
                                            <span class="float_rightd">
                                                <a class="right_of_reply_news_link" href="news_reply.php?news=<?=$news['id']?>&r=<?=$news['rank']?>">זכות תשובה<img src="../images/microphone.png" alt=""></a>
                                            </span>
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
                                        <a style="display: none;" href="breaking_news.php?n=<?=$startpage-1; ?>">
                                            <i class="ion-ios-arrow-left"></i>
                                        </a>
                                     </li>
                            <?php	}else{ ?>
                                     <li class="prev float_right ">
                                        <a  href="breaking_news.php?n=<?=$startpage-1; ?>">
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
                                        <li class="active float_right ">
                                            <a href="breaking_news.php?n=<?=$i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                <?php	}else{ ?>
                                        <li class="float_right" >
                                            <a href="breaking_news.php?n=<?=$i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                            <?php   }
                                }

                                //next button
                                if (ceil($nbrpages/10)>ceil($numpage/10)) { ?>
                                    <li class="next float_right">
                                        <a href="breaking_news.php?n=<?=$endpage+1; ?>">
                                            <i class="ion-ios-arrow-left"></i>
                                        </a>
                                    </li>
                            <?php	}else{ ?>
                                    <li class="next float_right">
                                        <a  style="display: none;" href="breaking_news.php?n=<?=$endpage+1; ?>">
                                            <i class="ion-ios-arrow-left"></i>
                                        </a>
                                    </li>

                                <?php   } ?>
                            <?php   if($nbrpages>10&&$numpage==$nbrpages){  ?>
                                        <li class="active float_right" >
                                            <a href="breaking_news.php?n=<?=$nbrpages; ?>">
                                                <?php echo $nbrpages; ?>
                                            </a>
                                        </li>
                               <?php }else if($nbrpages>10){   ?>
                                    <li class="float_right" >
                                            <a href="breaking_news.php?n=<?=$nbrpages; ?>">
                                                <?php echo $nbrpages; ?>
                                            </a>
                                    </li>
                          <?php  } ?>
                           </ul>
                        </div>
          </div>  </div>


                         <?php  }
                            else{ ?>
                                <script>
                                   window.location.replace('404.php');
                                </script>
                         <?php } // numpage

                          }
						else{ // get isset ?>
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