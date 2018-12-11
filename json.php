
<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('HOST','dedi11.cpt2.host-h.net');
define('USER','cdnaddmckm_3');
define('PASS','bBEby9zqsa8');
define('DB','cdnaddmckm_db3');

$con = mysqli_connect(HOST,USER,PASS,DB);

$sth = mysqli_query($con, "SELECT companies.*, logos.url as logo, adverts.url  as advert, viewpage_banners.url as lbanner, classified_banners.url as cbanner, videos.url as video, categories_government.name as tags FROM companies left outer join website_company on website_company.company_id = companies.id left outer join logos on logos.company_id = companies.id left outer join category_company_government on category_company_government.company_id = companies.id left outer join categories_government on category_company_government.category_id = categories_government.id left outer join adverts on adverts.company_id = companies.id left outer join videos on videos.company_id = companies.id left outer join viewpage_banners on viewpage_banners.company_id = companies.id left outer join classified_banners on classified_banners.company_id = companies.id WHERE website_company.website_id = 13 and (logos.url <> '' or logos.url <> '/') and (adverts.url <> '' or adverts.url <> '/');");

$rows = array();
$i = 0;
while($r = $sth->fetch_all(MYSQLI_ASSOC)) {

	$rows[$i] = array('name'=>$r['name']);

	$i++;
     
}

echo json_encode($rows);

mysqli_close($con);

?>
