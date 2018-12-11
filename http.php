<?php
 
  //Create a connection to the database
  $mysqli = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_3", "bBEby9zqsa8", "cdnaddmckm_db3");
 
  //The default result to be output to the browser
  $result = "{'success':false}";
 
  //Select everything from the table containing the marker informaton
  $query = "SELECT companies.*, logos.url as logo,adverts.url  as advert, viewpage_banners.url as lbanner, classified_banners.url as cbanner, videos.url as video, categories_government.name as tags FROM companies left outer join website_company on website_company.company_id = companies.id left outer join logos on logos.company_id = companies.id left outer join category_company_government on category_company_government.company_id = companies.id left outer join categories_government on category_company_government.category_id = categories_government.id left outer join adverts on adverts.company_id = companies.id left outer join videos on videos.company_id = companies.id left outer join viewpage_banners on viewpage_banners.company_id = companies.id left outer join classified_banners on classified_banners.company_id = companies.id WHERE website_company.website_id = 13 and (logos.url <> '' or logos.url <> '/') and (adverts.url <> '' or adverts.url <> '/') ORDER BY id DESC LIMIT 10";
 
  //Run the query
  $dbresult = $mysqli->query($query);
 
  //Build an array of items from the result set
  $items = array();
 
  while($row = $dbresult->fetch_array(MYSQLI_ASSOC)){
           $items[] = array(
      'id' => $row['id'],
      'name' => $row['name'],
      'about_us'=>$row['about_us'],
      'address' => $row['address'],
      'paddress' => $row['paddress'],
      'telephone' => $row['telephone'],
      'mobile' => $row['mobile'],
      'fax' => $row['fax'],
      'logo' => $row['logo'],
      'email' => $row['email'],
      'website' => $row['website'],
      'tags' => $row['tags'],
      'video' => $row['video'],
      'lbanner' => $row['lbanner'],
      'cbanner' => $row['cbanner'],
      'advert' => $row['advert']
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