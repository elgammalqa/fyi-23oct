<?php 
	require_once('online.php'); 
  if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
}  ?>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
   
	<title style="text-align: left;" > FYI Press </title>  
		<style type="text/css">
			@media only screen and (max-width: 991px) {
		    
			#navid {
			  overflow: hidden;
			}
			#colorblack  li a{
				color: black;
			}

			.content {
			  padding: 16px;
			}

			.sticky {
			  position: fixed;
			  top: 0;
			  width: 100%;
			}

			.sticky + .content {
			  padding-top: 60px;
			} 
			#logocolor{
				background-color: #55abcd;
			}   
			}
 
	@media only screen and (min-width: 991px) { 
		<?php if ($log==false) {  ?>
			#colorblack  li a{ 
				color: white;
				font-size: 15px;  letter-spacing: 2px; font-weight: 700;
                line-height: 32px;  padding-top: 16px; padding-right: 30px;
			}
		<?php }else {  ?>
			#colorblack  li a{
				color: white;
				font-size: 15px;  letter-spacing: 2px; font-weight: 700;
                line-height: 32px;  padding-top: 16px; padding-right: 25px;
			}
	   <?php } ?>

			#colorblack2 li a{
				color: black;  
			} 
			.pl{
				 padding-left: 80px !important;
				  padding-top: 7px !important;
			}
			.plm li a{
				 padding-right: 40px !important;
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

	
	<header class="primary">
		<div  class="navbar-expand-lg fixed-top navbar-dark bg-primary">
			<nav class="menu" style="width: 100% ;height: 100%;   background-color: #55abcd; display: block !important;" >
				<div class="container">					
					<div style="background-color: #55abcd;" id="menu-list">
						<ul id="colorblack" class="nav-list">  
							<?php if(isMobile()){ ?>
							<li style="background-color: red; " class="backk" ><a 
								style="  font-size: 30px; color:#fff; border-bottom: none !important; ">वापस <i style="text-align: left; font-size: 30px;" class="ion-ios-arrow-forward"></i></a></li> 
							 <?php }else{ ?> 
							<li><a id="logocolor" href="index.php"><img src="images/fyipress.png" 
							style="width: 50px; height: 30px;" ></a></li>
							<li><a id="logocolor" href="fyi.php"><img src="../images/fyipress2.png" 
							style="width: 50px; height: 30px;" ></a></li>
							 <?php } ?>
							<li  ><a target="_blank" href="http://www.chatsrun.com"  >ChatsRun</a></li>
							<li><a target="_blank" href="http://www.ispotlights.com"  >SpotLights</a></li>
							<li><a target="_blank" href="favorite_countries.php"  >पसंदीदा स्रोत</a></li>
							<?php if ($log==false) {  ?>
							<li><a href="login.php"  >लॉग इन करें</a></li>
							<li><a href="register.php"  >रजिस्टर</a></li> 
						<?php }else{ ?>
							<li class="dropdown magz-dropdown">
							 <a style="padding-right: 0px !important;" >
							 स्वागत हे : <?php  
								  echo utilisateursModel::getUserName($user_email);  ?>
								   <i class="ion-ios-arrow-right"></i>
								</a>
							 <ul id="colorblack2" class="dropdown-menu">  
									<li>
										<a href="resetpass.php">
										    <i  class="icon ion-key">  </i>पासवर्ड बदलें 
									    </a>
									</li> 
									<li class="divider"></li>
									<li><a href="logout.php">
										<i class="icon ion-log-out"></i> लोग आउट</a></li>
								</ul>
						    </li> 
						<?php }  
						if(!isMobile()){ ?>
							<li  class="dropdown magz-dropdown">
										<a style="  padding-left:50px;">बोली <i class="ion-ios-arrow-right"></i></a>
										<ul id="colorblack2" class="dropdown-menu">
											<li><a class="pl" href="../arabic/index.php"  >العربية</a></li>
											<li><a class="pl" href="../urdu/index.php" >ارڈو </a></li>
											<li><a class="pl" href="../home.php" >English</a></li> 
											<li><a class="pl" href="../turkish/index.php" >Türkçe</a></li>
											<li><a class="pl" href="../german/index.php" >Deutsche</a></li>
											<li><a class="pl" href="../spanish/index.php" >Español</a></li>
											<li><a class="pl" href="../french/index.php" >Français</a></li>
											<li><a class="pl" href="../russian/index.php" >русский</a></li>
											<li><a class="pl" href="../japanese/index.php" >日本語</a></li>
											<li><a class="pl" href="../chinese/index.php" >中國</a></li>
											<li><a class="pl" href="index.php" >भारतीय</a></li>
											<li><a class="pl"  href="../hebrew/index.php" >עברית</a></li>
										</ul> 
									</li>  
									  <?php } ?> 
					<li  class="font"><a target="_blank"  href="fyi_search.php"  style="padding-right: 0px;" >
					<i style="font-size: 17pt;" class="ion-search"> 	</i></a></li>
						</ul>
					</div>
				</div>  
			</nav>  
		</div>
<!-- Start nav -->
			<?php if(!isMobile()){ ?>
			<nav id="navid" class="menu" style=" width: 100% ;height: 100%; ">
			<?php }else{  ?>
		    <nav id="navid" class="menu" style=" width: 100% ;height: 100%; background-color: #55abcd;  ">
			<?php } ?>	
			<div class="container">
				<?php if(!isMobile()){ ?>
					<div class="brand">
						<a href="index.php">
							<img  style="width: 50px; height: 30px;" src="images/fyipress.png"  alt="fyi press Logo">
						</a>
					</div>
					<div class="brand">
						<a href="fyi.php">
							<img  style="width: 50px; height: 30px;" src="../images/fyipress2.png"  alt="fyi press Logo">
						</a>
					</div>
					<?php } ?>

					 <div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-lists"><i class="ion-navicon-round" style="color: red;"></i></a>
					</div>
				  
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i  class="ion-android-apps" style="color: red;"></i></a>
					</div>
					
					<div class="mobile-toggle">
					 <a href="#" data-toggle="menu" data-target="#menu-lang"><i class="ion-ios-world" style="color: red;"></i></a>
					</div>
					 <div style="float: left;" class="mobile-toggle">
						<a href="index.php" ><img style="width: 50px; height: 30px;" src="images/fyipress.png"></a>
					</div>
					 <div style="float: left;" class="mobile-toggle">
						<a href="fyi.php" ><img style="width: 50px; height: 30px;" src="../images/fyipress2.png"></a>
					</div>
				 <div id="menu-lists">
						<ul class="nav-list plm"> 
							    <?php if(isMobile()){ ?>
							<li style="background-color: red; " class="backk" >
							 <a style="  font-size: 30px; color:#fff; border-bottom: none !important; ">
									वापस <i style="text-align: left; font-size: 30px;" class="ion-ios-arrow-forward"></i></a></li>
							 <?php } ?>
							<li><a href="fyi.php">होम</a></li>
							<li><a href="fyi_category.php?id=News&n=1">समाचार</a></li>
							<li><a href="fyi_category.php?id=Sports&n=1">खेल</a></li>
							<li><a href="fyi_category.php?id=Arts&n=1">कला</a></li>
							<li><a href="fyi_category.php?id=Technology&n=1">प्रौद्योगिकी</a></li>
							<li><a href="fyi_category.php?id=Culture&n=1">सामान्य संस्कृति</a></li> 
							<li><a href="fyi_library.php?n=1">पुस्तकालय</a></li>  
						</ul>
					</div>
					 <?php if(isMobile()){ ?>
                   <div id="menu-lang">
						<ul class="nav-list plm">  
							<li style="background-color: red; " class="backk" >
							 <a style="  font-size: 30px; color:#fff; border-bottom: none !important; ">वापस <i style="text-align: left; font-size: 30px;" class="ion-ios-arrow-forward"></i></a></li>
								<li><a class="pl" href="../arabic/index.php"  >العربية</a></li>
											<li><a class="pl" href="../urdu/index.php" >ارڈو </a></li>
											<li><a class="pl" href="../home.php" >English</a></li> 
											<li><a class="pl" href="../turkish/index.php" >Türkçe</a></li>
											<li><a class="pl" href="../german/index.php" >Deutsche</a></li>
											<li><a class="pl" href="../spanish/index.php" >Español</a></li>
											<li><a class="pl" href="../french/index.php" >Français</a></li>
											<li><a class="pl" href="../russian/index.php" >русский</a></li>
											<li><a class="pl" href="../japanese/index.php" >日本語</a></li>
											<li><a class="pl" href="../chinese/index.php" >中國</a></li>
											<li><a class="pl" href="index.php" >भारतीय</a></li>
											<li><a class="pl"  href="../hebrew/index.php" >עברית</a></li>

								</ul>
					</div>
                  <?php } ?> 
				</div>
			</nav>
			<!-- End nav -->
		</header> 