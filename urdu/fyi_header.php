<?php
	require_once('online.php');
  if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
}           
 ?> 
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
     
	<title style="text-align: right;" >FyiPress</title> 
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
                line-height: 32px;  padding-top: 16px; padding-left: 55px;
			}
		<?php }else {  ?>
			#colorblack  li a{
				color: white;
				font-size: 15px;  letter-spacing: 2px; font-weight: 700;
                line-height: 32px;  padding-top: 16px; padding-left: 60px;
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
				 padding-left: 40px !important;
			} 
			.header_float_right{
 					float: right !important ;
 				}
		} 

		</style>
	<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
</head>
	 <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>
 
	 	<link rel="stylesheet" type="text/css" href="fonts/EARLY_ACCESS.css">

	 <script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
</head>
	<header style="text-align: right;" class="primary">
		<div class=" navbar-expand-lg fixed-top navbar-dark bg-primary">
			<nav class="menu" style="width: 100% ;height: 100%;   background-color: #55abcd; display: block !important;" >
				<div class="container">		 			 
					<div style="background-color: #55abcd;" id="menu-list" dir="RTL">
						<ul id="colorblack" class="nav-list" dir="RTL" >   
 						  <?php if(isMobile()){ ?>
							<li style="background-color: red; " class="backk" ><a 
								style=" font-size: 30px; color:#fff; border-bottom: none !important; "> <i style="text-align: left; font-size: 30px;"  
								class="ion-ios-arrow-forward"></i>   پیچھے   </a></li> 
							 <?php }else{ ?>
								 <li class="header_float_right" ><a id="logocolor"   href="index.php">
								  <img src="images/fyipress.png"  style="width: 50px; height: 30px;" ></a></li> 
								 <li class="header_float_right" ><a id="logocolor"   href="fyi.php">
								  <img src="../images/fyipress2.png"   style="width: 50px; height: 30px;" ></a></li> 
						     <?php }  ?>
								<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" target="_blank" href="http://www.chatsrun.com"  >Chatsrun</a></li>
								<li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" target="_blank" href="http://www.ispotlights.com"  >
									  Spotlight
                                	</a></li>  
                                	<!--
								<li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" target="_blank" href="favorite_countries.php"  >
									  پسندیدہ ذرائع
                                	</a></li>  
                                -->
								<?php if ($log==false) {  ?>
							<li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="login.php"  >
							سائن ان کریں</a>
						    </li>
							<li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="register.php"  >رجسٹریشن</a></li> 
						<?php }else{ ?>
							<li style="font-size: 20px;  " class="dropdown magz-dropdown header_float_right ">
							 <a style="padding-right: 0px !important;padding-left: 0px !important;" >
							 ہیلو :   <?php  
								  echo utilisateursModel::getUserName($user_email);  ?>
								  &nbsp; &nbsp;
								    <i class="ion-ios-arrow-left"> </i>
								</a>
							 <ul id="colorblack2" class="dropdown-menu" style="text-align: right;" >  
									<li>
										<a style="padding-left: 0px !important;font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="resetpass.php">
										    <i  class="icon ion-key">  </i>اپنا پاس ورڈ تبدیل کریں 
									    </a>
									</li> 
									<li class="divider"></li>
									<li><a style="padding-left: 0px !important;font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="logout.php">
										<i class="icon ion-log-out"></i> لاگ آؤٹ</a></li>
								</ul>
						    </li> 
						<?php } ?> 
						  

						  	<?php   if(!isMobile()){ ?>
								<li  class="dropdown magz-dropdown header_float_right">
									<?php if ($log==false) {  ?>
										<a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;"> 
											 زبانیں 
											&nbsp;<i class="ion-ios-arrow-left"></i> </a>
										<?php }else{ ?>
										<a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-right:85px;"> 
											 زبانیں 
											&nbsp;<i class="ion-ios-arrow-left"></i> </a>

										<?php } ?>
										<ul id="colorblack2" class="dropdown-menu">
											<li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="../arabic/index.php" >العربية</a></li>
											<li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="index.php" >ارڈو </a></li>

											<li><a class="pl" href="../home.php"  >English</a></li> 
											<li><a class="pl" href="../turkish/index.php" >Türkçe</a></li>
											<li><a class="pl" href="../german/index.php" >Deutsche</a></li>
											<li><a class="pl"  href="../spanish/index.php" >
											Español</a></li>
											<li><a class="pl" href="../french/index.php" >
											Français</a></li>
											<li><a class="pl"  href="../russian/index.php" >
											русский</a></li>
											<li><a class="pl" href="../japanese/index.php"  >日本語</a></li>
											<li><a class="pl" href="../chinese/index.php"  >中國</a></li>
											<li><a class="pl" href="../indian/index.php" >भारतीय</a></li>
											<li><a class="pl"  href="../hebrew/index.php"  >עברית</a></li>
										</ul> 
									</li> 
										<?php   } ?> 


									<li  class="font  header_float_right" >
										<a target="_blank"  href="fyi_search.php" style="padding-left: 0px;" >
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
					<div class="brand header_float_right "  >
						<a href="index.php">
							<img  style="width: 50px; height: 30px;" src="images/fyipress.png" alt="fyi press Logo">
						</a>
					</div>
					<div class="brand header_float_right "  >
						<a href="fyi.php">
							<img  style="width: 50px; height: 30px;" src="../images/fyipress2.png" alt="fyi press Logo">
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
						<a href="index.php"  ><img style="width: 50px; height: 30px;" src="images/fyipress.png"></a>
					</div>
					<div style="float: left;" class="mobile-toggle">
						<a href="fyi.php"  ><img style="width: 50px; height: 30px;" src="../images/fyipress2.png"></a> 
					</div>
				 <div id="menu-lists"> 
 				<ul class="nav-list plm">   
 					 <?php if(isMobile()){ ?>
							<li style="background-color: red; " class="backk" ><a 
								style=" font-size: 30px; color:#fff; border-bottom: none !important; "> پیچھے  <i style="text-align: left; font-size: 30px;" class="ion-ios-arrow-forward"></i></a></li>
							 <?php } ?>  
							<li class="header_float_right">
							<a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi.php">گھر</a> 
							</li> 
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_category.php?id=News&n=1">خبریں</a></li> 
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_category.php?id=Sports&n=1">کھیلوں</a></li>
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_category.php?id=Arts&n=1">آرٹ</a></li>
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_category.php?id=Technology&n=1">ٹیکنالوجی</a></li>
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_category.php?id=Culture&n=1">جنرل ثقافت</a></li>
							<li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="fyi_library.php?n=1">لائبریری</a></li>
							
						</ul> 
				</div>

				 <?php if(isMobile()){ ?>
                   <div id="menu-lang">
						<ul class="nav-list plm">  
							<li style="background-color: red; " class="backk" ><a
							 style="  font-size: 30px; color:#fff; border-bottom: none !important; "> پیچھے  <i style="text-align: left; font-size: 30px;" 
								class="ion-ios-arrow-forward"></i></a></li> 


											<li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="../arabic/index.php" >العربية</a></li>
											<li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="index.php" >ارڈو </a></li>

											<li><a class="pl" href="../home.php"  >English</a></li> 
											<li><a class="pl" href="../turkish/index.php" >Türkçe</a></li>
											<li><a class="pl" href="../german/index.php" >Deutsche</a></li>
											<li><a class="pl"  href="../spanish/index.php" >
											Español</a></li>
											<li><a class="pl" href="../french/index.php" >
											Français</a></li>
											<li><a class="pl"  href="../russian/index.php" >
											русский</a></li>
											<li><a class="pl" href="../japanese/index.php"  >日本語</a></li>
											<li><a class="pl" href="../chinese/index.php"  >中國</a></li>
											<li><a class="pl" href="../indian/index.php" >भारतीय</a></li>
											<li><a class="pl"  href="../hebrew/index.php"  >עברית</a></li>

								</ul>
					</div>
                  <?php } ?>
                  	</div>
			</nav>
			<!-- End nav -->
		</header>
