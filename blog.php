<?php
header('Content-Type: application/json');
$feed = new DOMDocument();
$feed->load('http://www.newspages.co.za/category/government-co-za/feed/');
$json = array();

$items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

$json[] = array();
$i = 0;


foreach($items as $item) {

   $title = $item->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
   $description = $item->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
   $pubDate = $item->getElementsByTagName('pubDate')->item(0)->firstChild->nodeValue;
   $guid = $item->getElementsByTagName('guid')->item(0)->firstChild->nodeValue;
   $imageurl = $item->getElementsByTagName('description')->item(0)
   
     
     
    $json[]= array("title"=>$title,"description"=>$description,"pubDate"=>$pubDate,"guid"=>$guid,"image"=>$image); 
}


echo json_encode($json);


?>