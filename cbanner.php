<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect.php';

$result = $conn->query("SELECT companies.*, logos.url as logo, adverts.url  as advert, viewpage_banners.url as lbanner, classified_banners.url as cbanner, videos.url as video, categories_government.name as tags FROM companies left outer join website_company on website_company.company_id = companies.id left outer join logos on logos.company_id = companies.id left outer join category_company_government on category_company_government.company_id = companies.id left outer join categories_government on category_company_government.category_id = categories_government.id left outer join adverts on adverts.company_id = companies.id left outer join videos on videos.company_id = companies.id left outer join viewpage_banners on viewpage_banners.company_id = companies.id left outer join classified_banners on classified_banners.company_id = companies.id WHERE website_company.website_id = 13 and (classified_banners.url <> '' or classified_banners.url <> '/') and ( viewpage_banners.url <> '' or  viewpage_banners.url <> '/')");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"name":"'  . $rs["name"] . '",';
     $outp .= '"lbanner":"http://cdn.adslive.com/' . $rs["lbanner"] . '",';
    $outp .= '"cbanner":"http://cdn.adslive.com/'. $rs["cbanner"]     . '"}'; 

}

$outp ='{"banner":['.$outp.']}';
$conn->close();

echo($outp);
?>