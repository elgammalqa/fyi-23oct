<?php 

	function total_comments($id_news){
		  include("fyipanel/views/connect.php");
		  $requete = $con->prepare('SELECT COUNT(*)  FROM comments where id_news='.$id_news);
		  $requete->execute();
		  $nb_res = $requete->fetchColumn();
		  $rek = $con->prepare('SELECT COUNT(*)  FROM replies where id_news='.$id_news);
		  $rek->execute();
		  $nb_res2 = $rek->fetchColumn();
		  $c=$nb_res+$nb_res2;
	  return  $c ;
	} 

	  function rss_total_comments($id_news){
	 	  include("fyipanel/views/connect.php");
		  $requete = $con->prepare('SELECT COUNT(*)  FROM rss_comments where id_news='.$id_news);
		  $requete->execute();
		  $nb_res = $requete->fetchColumn();
		  $rek = $con->prepare('SELECT COUNT(*)  FROM rss_replies where id_news='.$id_news);
		  $rek->execute();
		  $nb_res2 = $rek->fetchColumn();
		  $c=$nb_res+$nb_res2;
		  return  $c ;
	}

	function link_comments($id,$log,$link,$rank){
		if($rank==1) $nb=total_comments($id);
		else $nb=rss_total_comments($id); 
		if($nb==1) $nbcom='&nbsp;&nbsp;'.' تعليق واحد  ';
		else if($nb>2&&$nb<=10) $nbcom=$nb.'&nbsp;&nbsp;'.' تعليقات  ';
		else $nbcom=$nb.'&nbsp;&nbsp;'.'تعليق';
		if($log) $l="<a style='cursor: pointer;' href='$link' >$nbcom</a>"; 
		else   $l="<a style='cursor: pointer;' href='login.php' >$nbcom</a>"; 
		return $l;
	}
 

	function ads_total_comments($id_news){
		  include("fyipanel/views/connect.php");
		  $requete = $con->prepare('SELECT COUNT(*)  FROM adscomments where id_ads='.$id_news);
		  $requete->execute();
		  $nb_res = $requete->fetchColumn();
		  $rek = $con->prepare('SELECT COUNT(*)  FROM adsreplies where id_ads='.$id_news);
		  $rek->execute();
		  $nb_res2 = $rek->fetchColumn();
		  $c=$nb_res+$nb_res2;
	  return  $c ;
	} 


	function ads_link_comments($id,$log,$link){
		$nb=ads_total_comments($id); 
		if($nb==1) $nbcom='&nbsp;&nbsp;'.' تعليق واحد  ';
		else if($nb>2&&$nb<=10) $nbcom=$nb.'&nbsp;&nbsp;'.' تعليقات  ';
		else $nbcom=$nb.'&nbsp;&nbsp;'.'تعليق';
		if($log) $l="<a style='cursor: pointer;' href='$link' >$nbcom</a>"; 
		else   $l="<a style='cursor: pointer;' href='login.php' >$nbcom</a>"; 
		return $l;
	}
 ?>
