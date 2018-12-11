<?php

 header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');
  header("Content-Type: application/json; charset=UTF-8");

    global $text, $maxchar, $end;
    $first_img = '';
    $rss = new DOMDocument();
    $rss->load('http://www.newspages.co.za/category/government-co-za/feed/');
    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {
        $item = array (
            'title'=> $node->getElementsByTagName('title')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            'content' => $node->getElementsByTagName('encoded')->item(0)->nodeValue,
        );
        array_push($feed, $item);
    }
    $limit = 10;
    $id = 0; // <-- Change the number of posts shown
    for ($x=0; $x<$limit; $x++) {
        $title       = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link        = $feed[$x]['link'];
        $description = $feed[$x]['desc'];
        $content     = $feed[$x]['content'];
        $description = substr($description, 0, 100);
        $pubDate     = date('l F d, Y', strtotime($feed[$x]['date']));
        
        preg_match_all('/src=([\'"])?(.*?)\\1/', $content, $matches);
        $first_img   = $matches[0][0];

        $body = strip_tags(html_entity_decode($content));

        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "src="; // just as another example

        $Image = str_replace( $remove, "", $first_img );
        $id++;
        $json[]= array("id"=>$id,"title"=>$title,"content"=>$body,"pubDate"=>$pubDate,"link"=>$link,"image"=>$Image); 
    }

    echo json_encode($json);
