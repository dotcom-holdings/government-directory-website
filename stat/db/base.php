<?php
class base
{
    // property declaration
 if (isset($_GET['search']))
    {
        search($_GET['search']);
    }

     function Search($res)
    {
        //real search code goes here
        echo $res;
    }
	
    function __construct() // or any other method
    {
        include "conn.php";
        
    }
    // method declaration
     function get($table) {
		$result = $conn->query("SELECT * FROM ".$table."");
		return $result;
		echo "get";
    }
	
	
	
	 function phone()
	{
	    $result = $conn->query("SELECT * FROM phonebook");
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
	         
}
?>