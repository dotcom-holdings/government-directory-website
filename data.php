<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');
  header("Content-Type: application/json; charset=UTF-8");

include 'connect.php';

$result = $conn->query("SELECT companies.*, logos.url as logo,adverts.url  as advert, viewpage_banners.url as lbanner, classified_banners.url as cbanner, videos.url as video, categories_government.name as tags FROM companies left outer join website_company on website_company.company_id = companies.id left outer join logos on logos.company_id = companies.id left outer join category_company_government on category_company_government.company_id = companies.id left outer join categories_government on category_company_government.category_id = categories_government.id left outer join adverts on adverts.company_id = companies.id left outer join videos on videos.company_id = companies.id left outer join viewpage_banners on viewpage_banners.company_id = companies.id left outer join classified_banners on classified_banners.company_id = companies.id WHERE website_company.website_id = 13 and (logos.url <> '' or logos.url <> '/') and (adverts.url <> '' or adverts.url <> '/') ORDER BY id DESC LIMIT 30");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}

    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"about_us":'   . json_encode(json_encode($rs["about_us"]))        . ',';
    $outp .= '"address":'   . json_encode(json_encode($rs["address"]))        . ',';
    $outp .= '"paddress":"'   . $rs["paddress"]        . '",';
    $outp .= '"telephone":"'   . $rs["telephone"]        . '",';
    $outp .= '"mobile":"'   . $rs["mobile"]        . '",';
    $outp .= '"fax":"'   . $rs["fax"]        . '",';
    $outp .= '"logo":"'   . $rs["logo"]        . '",';
    $outp .= '"email":"'   . $rs["email"]        . '",';
    $outp .= '"website":"'   . $rs["website"]        . '",';
    $outp .= '"tags":"'   . $rs["tags"]        . '",';
    $outp .= '"video":"'   . $rs["video"]        . '",';
    $outp .= '"lbanner":"'   . $rs["lbanner"]        . '",';
    $outp .= '"cbanner":"'   . $rs["cbanner"]        . '",';
    $outp .= '"advert":"'. $rs["advert"]     . '"}';

}



$outp ='['.$outp.']';


$conn->close();

echo($outp);
?>