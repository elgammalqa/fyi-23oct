<?php 
   function getrsstime($d) 
{  
    if($d!=""){
    $d=trim($d);
    $parts=explode(' ',$d);   
    $month=$parts[2];  
    $monthreal=getmonth($month);  
    $time=explode(':',$parts[4]);  
    $date="$parts[3]-$monthreal-$parts[1] $time[0]:$time[1]:$time[2]"; 
     return $date;
 }else{  
     return "";
 }
} 

function getmonth($month){
   if($month=="Jan") $monthreal=1; if($month=="Feb") $monthreal=2; if($month=="Mar") $monthreal=3;
    if($month=="Apr") $monthreal=4;  if($month=="May") $monthreal=5;  if($month=="Jun") $monthreal=6;
    if($month=="Jul") $monthreal=7;  if($month=="Aug") $monthreal=8; if($month=="Sep") $monthreal=9;
     if($month=="Oct") $monthreal=10;  if($month=="Nov") $monthreal=11; if($month=="Dec") $monthreal=12; 
     return $monthreal;
 }   
   
  
$xSource='';
 $xsourcefile = file_get_contents($xSource); 
$xml = simplexml_load_string($xsourcefile );  
    foreach ($xml->channel->item as $item) {    
     echo "title : ".$item->title."<br>";   
     echo "description : ".$item->description."<br>"; 
     echo "pubDate : ".getrsstime($item->pubDate)."<br>";   
     echo "link : ".$item->link."<br><br><br>";  
    }   
   // echo '<pre>';  print_r($xml);   echo '</pre>';
   
//without media   
 /*
//1  
  $xSource = 'http://www.sozcu.com.tr/feed';
  $src='sozcu'; $t='News'; $signe='+';$hours=0; 
  getrssfromsource($xSource,$src,$t,$signe,$hours);
//2
  $xSource = 'https://www.birgun.net/xml/rss.xml';
  $src='BirGün'; $t='News'; $signe='+';$hours=0; 
  getrssfromsource($xSource,$src,$t,$signe,$hours);

*/

 