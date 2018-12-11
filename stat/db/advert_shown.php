
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn2 = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_4", "rVRsw6jT7G8", "cdnaddmckm_db4");
$result2 = $conn2->query("SELECT COUNT(id) as advert_shown  FROM stats_ads_shown WHERE company_ad_shown =706894");


$outp2 = "";
while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    if ($outp2 != "") {$outp2 .= ",";}
    $outp2 .= '{"advert_shown":"'.$rs["advert_shown"].'",';
    $outp2 .= '"advert_shown":"'  . $rs["advert_shown"] . '",';
    $outp2 .= '"advert_shown":"'. $rs["advert_shown"]     . '"}';
}
$outp2 ='{"records2":['.$outp2.']}';

//$conn->close();
//$conn2->close();

echo($outp2);



/*,logos.url as logo,adverts.url as advert,profiles.url as profile, companies.website FROM companies 
			LEFT JOIN logos on logos.company_id=companies.id 
			LEFT JOIN adverts on adverts.company_id=companies.id 
			LEFT JOIN profiles on profiles.company_id=companies.id WHERE */

?>
