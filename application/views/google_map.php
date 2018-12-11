<?php 
?>
<!--  
Google Map
Author : Leon van Rensburg 

-->
<script type="text/javascript"> 
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
	scrollwheel: false,
    center: {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>}
  });
  var geocoder = new google.maps.Geocoder();
  geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
  var address = '<?php echo $address;?>';
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
 
</script>
<div class="map">
    <div class="container-fluid">
        <div id="map" class="google-maps" style="width:100%; height:260px"></div>
    </div>
</div>