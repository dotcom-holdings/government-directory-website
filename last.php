<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect.php';

$result = $conn->query("SELECT companies.* ,categories_government.name as tags FROM companies left outer join website_company on website_company.company_id = companies.id left outer join category_company_government on category_company_government.company_id = companies.id left outer join categories_government on category_company_government.category_id = categories_government.id WHERE website_company.website_id = 13 and freelisting = 1 and status = 1 ORDER BY id DESC");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"about_us":"'   . $rs["about_us"]        . '",';
    $outp .= '"address":"'   . $rs["address"]        . '",';
    $outp .= '"paddress":"'   . $rs["paddress"]        . '",';
    $outp .= '"phone":"'   . $rs["telephone"]        . '",';
    $outp .= '"mobile":"'   . $rs["mobile"]        . '",';
    $outp .= '"fax":"'   . $rs["fax"]        . '",';
    $outp .= '"logo":"'   . $rs["logo"]        . '",';
    $outp .= '"email":"'   . $rs["email"]        . '",';
    $outp .= '"website":"'   . $rs["website"]        . '",';
    $outp .= '"tags":"'. $rs["tags"]     . '"}';

}

$outp ='{"adverts":['.$outp.']}';
$conn->close();

echo($outp);
?>