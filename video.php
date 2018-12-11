<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect.php';

$result = $conn->query("SELECT videos.url, companies.name,companies.id from videos left outer join companies on  videos.company_id = companies.id left outer join website_company on website_company.company_id = companies.id WHERE website_company.website_id = 13 ORDER BY id DESC LIMIT 10");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"url":"'. $rs["url"]     . '"}'; 

}

$outp ='{"video":['.$outp.']}';
$conn->close();

echo($outp);
?>