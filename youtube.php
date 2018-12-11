<?php
 
  //Create a connection to the database
  $mysqli = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_3", "bBEby9zqsa8", "cdnaddmckm_db3");
 
  //The default result to be output to the browser
  $result = "{'success':false}";
 
  //Select everything from the table containing the marker informaton
  $query = "SELECT videos.url, companies.name,companies.id,companies.created_at from videos left outer join companies on  videos.company_id = companies.id left outer join website_company on website_company.company_id = companies.id WHERE website_company.website_id = 13 ORDER BY id DESC";
 
  //Run the query
  $dbresult = $mysqli->query($query);
 
  //Build an array of items from the result set
  $items = array();
 
  while($row = $dbresult->fetch_array(MYSQLI_ASSOC)){
           $items[] = array(
      'id' => $row['id'],
      'name' => $row['name'],
      'url'=>$row['url'],
      'created_at'=>$row['created_at']
    );
  }
 
  //If the query was executed successfully, create a JSON string containing the marker information
  if($dbresult){
    $result = json_encode($items,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); 
  }
  else
  {
    $result = "{'success':false}";
  }
 
  //Set these headers to avoid any issues with cross origin resource sharing issues
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');
  header("Content-Type: application/json; charset=UTF-8");
 
  //Output the result to the browser so that our Ionic application can see the data
  echo($result);
  //echo json_last_error();
 
?>