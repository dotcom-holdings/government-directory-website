
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "phonebook");

$result = $conn->query("SELECT * FROM phone");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'  . $rs["name"] . '",';
    $outp .= '"number":"'  . $rs["number"] . '",';
    $outp .= '"category":"'  . $rs["category"] . '",';
    $outp .= '"status":"'. $rs["status"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
