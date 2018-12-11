var mainApp2 = angular.module("mainApp2", ['chart.js']);
var mainApp2=angular.module("mainApp2", ["googlechart", "googlechart-docs"]);   
var mainApp2 = angular.module("mainApp2", ['ngRoute']);
        
		  mainApp2.config(['$routeProvider', function($routeProvider) {
            $routeProvider.            
            when('/home', {
               templateUrl: 'home.htm',
               controller: 'HomeController'
            }).            
            when('/general', {
               templateUrl: 'general.htm',
               controller: 'GeneralController'
            }).            
            when('/view/:id', {
               templateUrl: 'view.htm',
               controller: 'HomeController'
            }).
            when('/business', {
               templateUrl: 'business.htm',
               controller: 'HomeController'
            }). 
            when('/add', {
               templateUrl: 'add.htm',
               controller: 'HomeController'
            }). 
            when('/add2', {
               templateUrl: 'add2.htm',
               controller: 'HomeController'
            }).
            when('/add3', {
               templateUrl: 'add3.htm',
               controller: 'HomeController'
            }).          
            otherwise({
			   templateUrl: 'home.html',
               controller: 'HomeController'
            });
         }]);


		 
	 mainApp2.controller('GeneralController', function($scope,$http,$routeParams) {
     var id=$routeParams.id;  
	 
		$scope.message="Hello Welcome"; 
		var website_id=24; 
		var month=12; 
		var year=2018; 
		var country_id=202; 
		 
		$http.get("db/stats_ad_clicked.php?id=100").then(function (response) {
				 $scope.get_ads_shown = response.data.records2;
			  
			  }); 	 
			
	$http.get("db/stats_ad_clicked.php?id=101&website_id="+website_id).then(function (response) {
				 $scope.get_profile_views_company = response.data.records2;
			  
			  }); 	
		 
		$http.get("db/stats_ad_clicked.php?id=102&website_id="+website_id).then(function (response) {
				 $scope.get_advert_views_company = response.data.records2;
			  
			  }); 
			
     $http.get("db/stats_ad_clicked.php?id=103&website_id="+website_id).then(function (response) {
				 $scope.get_pcs_reached = response.data.records;
			  
			  }); 
         
	$http.get("db/stats_ad_clicked.php?id=104&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
				 $scope.get_new_visits = response.data.records;
			  
			  }); 
	
	$http.get("db/stats_ad_clicked.php?id=105&country_id="+country_id).then(function (response) {
				 $scope.get_listing_count = response.data.records;
			  
			  }); 	    
	
			
	$http.get("db/stats_ad_clicked.php?id=106").then(function (response) {
				 $scope.get_subscribers_count = response.data.records;
			  
			  });  
	
		$http.get("db/stats_ad_clicked.php?id=107&website_id="+website_id).then(function (response) {
				 $scope.get_companies_views = response.data.records2;
			  
			  });  	 
		 
		//get_directory_views SAME AS GET_LISTING_COUNT  
		$http.get("db/stats_ad_clicked.php?id=108&website_id="+website_id).then(function (response) {
				 $scope.browser_ajax_stats = response.data.records;
			  
			  });  	 
		 
 $http.get("db/stats_ad_clicked.php?id=109&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.months = response.data.records; 
			 
	          angular.forEach($scope.months, function(value, key){
  $scope.jan=value.jan;$scope.feb=value.feb;$scope.mar=value.mar;$scope.apr=value.apr;$scope.may=value.may;$scope.jun=value.jun;
  $scope.jul=value.jul; $scope.aug=value.aug; $scope.sep=value.sep; $scope.oct=value.oct; $scope.nov=value.nov; $scope.dec=value.dec;	
			 		   
			   });	

	 
	 
	 
	  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Jan", parseInt($scope.jan), "blue"],
        ["Feb", parseInt($scope.feb), "blue"],
        ["Mar", parseInt($scope.mar), "blue"],
        ["Apr", parseInt($scope.apr), "color:blue"],
        ["May", parseInt($scope.may), "color:blue"],
        ["Jun", parseInt($scope.jun), "color:blue"],
        ["Jul", parseInt($scope.jul), "color:blue"],
        ["Aug", parseInt($scope.aug), "color:blue"],
        ["Sep", parseInt($scope.sep), "color:blue"],
        ["Oct", parseInt($scope.oct), "color:blue"],
        ["Nov", parseInt($scope.nov), "color:blue"],
        ["Dec", parseInt($scope.dec), "color:blue"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Profile Views",
        width: 600,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values12"));
      chart.draw(view, options);
  }

	
 });
		
		 
	 $http.get("db/stats_ad_clicked.php?id=110&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.Advertsviewed = response.data.records; 
		 
	 });
	
		 $http.get("db/stats_ad_clicked.php?id=6&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.ReturnedVisits = response.data.records; 
		 
	 });	 

	$http.get("db/stats_ad_clicked.php?id=113&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.ProfileViews = response.data.records; 
		 
	 });		 
		 
	$http.get("db/stats_ad_clicked.php?id=114&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.people_reached1 = response.data.records; 
		 
	 });	
		 
	$http.get("db/stats_ad_clicked.php?id=9&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
			 $scope.visits_by_country1 = response.data.records; 
		 
	 });		 
		 
		 
		 
		 
	 });
		 
	 mainApp2.controller('HomeController', function($scope,$http,$routeParams) {
  
	     var id=$routeParams.id;  
		 
		 var userid=0;          //305    176  436  1
		 var company=708251; //707942 708251      706894    705648 706431  704543;
		 var website_id=24;
		 var month=11;
		 var year=2018;
			 
		$scope.website_id=website_id;
	    $scope.ip=10;
        $scope.company_ad_visited=company;	 
		
	   $scope.bym=function()
	   {
	
		  month=$scope.bymonth; 
		  main(); 
	   };
		 
		main(); 
		 
 
			 
	 	function main()
			 {
 
			// alert(""+userid+"-"+company+"-"+website_id); 
			 $http.get("db/stats_ad_clicked.php?id=0&userid="+company).then(function (response) {	  
				  $scope.company = response.data.records;  
			  });	
			
			$http.get("db/stats_ad_clicked.php?id=111&company="+company).then(function (response) {
				 $scope.advert_shown = response.data.records2;
			  }); 	
			
		    $http.get("db/stats_ad_clicked.php?id=1&website_id="+website_id+"&company="+company).then(function (response) {
				 $scope.stats_ad_clicked = response.data.records;
			  });  
			 
		   $http.get("db/stats_ad_clicked.php?id=2&website_id="+website_id+"&company="+company).then(function (response) {
				 $scope.get_advert_views_company = response.data.records;
			  }); 	
		  $http.get("db/stats_ad_clicked.php?id=3&website_id="+website_id).then(function (response) {
				 $scope.visits1 = response.data.records;
			  });  
		   $http.get("db/stats_ad_clicked.php?id=4&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
				 $scope.new_visits = response.data.records;
			  });  
			 
			 
			 
			 
$http.get("db/stats_ad_clicked.php?id=5&website_id="+website_id+"&company="+company+"&month="+month+"&year="+year).then(function (response) {
				 $scope.advert_views = response.data.records;
			  }); 
$http.get("db/stats_ad_clicked.php?id=6&website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
				 $scope.visits = response.data.records;
			  });  
$http.get("db/stats_ad_clicked.php?id=7&website_id="+website_id+"&company="+company+"&month="+month+"&year="+year).then(function (response) {
				 $scope.profile_views = response.data.records;
			  }); 
$http.get("db/stats_ad_clicked.php?id=8&website_id="+website_id+"&company="+company+"&month="+month+"&year="+year).then(function (response) {
				 $scope.people_reached = response.data.records;
			  });  
			 

			
$http.get("db/stats_ad_clicked.php?id=9 &website_id="+website_id+"&month="+month+"&year="+year).then(function (response) {
				 $scope.stat_tracker = response.data.records;
			
			  }); 
			 
			 
   var 	chrome,firefox,Safari,Mozilla;	 
			 
	     $http.get("db/stats_ad_clicked.php?id=10&br=chrome&website_id="+website_id).then(function (response) {
				 $scope.chrome = response.data.records;     
			     angular.forEach($scope.chrome, function(value, key){
                 $scope.chrome=value.new_visits; 
				  });
			 
			  $http.get("db/stats_ad_clicked.php?id=10&br=firefox&website_id="+website_id).then(function (response) {
				 $scope.firefox = response.data.records;
			     angular.forEach($scope.firefox, function(value, key){
                 $scope.firefox=value.new_visits;
				  }); 
				  	 
				  
			  $http.get("db/stats_ad_clicked.php?id=10&br=Safari&website_id="+website_id).then(function (response) {
				 $scope.Safari = response.data.records;
			      angular.forEach($scope.Safari, function(value, key){
                    $scope.Safari=value.new_visits;
				  });    
				  
				
				  
			 $http.get("db/stats_ad_clicked.php?id=10&br=Mozilla&website_id="+website_id).then(function (response) {
				 $scope.Mozilla = response.data.records; 
			  angular.forEach($scope.Mozilla, function(value, key){
                 $scope.Mozilla=value.new_visits;
				  });	
				 
				   	
   	chrome=$scope.chrome;	 
   	firefox=$scope.firefox;	 
   	Safari=$scope.Safari;	 
   	Mozilla=$scope.Mozilla;	 
				 
		 
	//alert( chrome+"-"+firefox+"-"+Safari+"-"+ Mozilla);			 
		 
	  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
				 
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Chrome', parseInt(chrome)],
          ['Firefox',parseInt(firefox)],
          ['Safari',parseInt(Safari)],
          ['Mozilla',parseInt(Mozilla)]
         
        ]);
 
        var options = {
          title: 'Total Visits by Browser',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }		 
			  });  
				  
			  });
				  
			  }); 
			 
			 
			  });  
			 	
	
 $http.get("db/stats_ad_clicked.php?id=11&company="+company).then(function (response) {
				 $scope.image = response.data.records; 
			 
	           angular.forEach($scope.image, function(value, key){
                 $scope.image=value.image;	
				  
			   });	
 });
	

			 
			 
			 
			 
 $http.get("db/stats_ad_clicked.php?id=12&website_id="+website_id+"&company="+company+"&year="+year).then(function (response) {
			 $scope.months = response.data.records; 
			 
	          angular.forEach($scope.months, function(value, key){
  $scope.jan=value.jan;$scope.feb=value.feb;$scope.mar=value.mar;$scope.apr=value.apr;$scope.may=value.may;$scope.jun=value.jun;
  $scope.jul=value.jul; $scope.aug=value.aug; $scope.sep=value.sep; $scope.oct=value.oct; $scope.nov=value.nov; $scope.dec=value.dec;	
			 		   
			   });	

	 
	 
	 
	  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Jan", parseInt($scope.jan), "blue"],
        ["Feb", parseInt($scope.feb), "blue"],
        ["Mar", parseInt($scope.mar), "blue"],
        ["Apr", parseInt($scope.apr), "color:blue"],
        ["May", parseInt($scope.may), "color:blue"],
        ["Jun", parseInt($scope.jun), "color:blue"],
        ["Jul", parseInt($scope.jul), "color:blue"],
        ["Aug", parseInt($scope.aug), "color:blue"],
        ["Sep", parseInt($scope.sep), "color:blue"],
        ["Oct", parseInt($scope.oct), "color:blue"],
        ["Nov", parseInt($scope.nov), "color:blue"],
        ["Dec", parseInt($scope.dec), "color:blue"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Profile Views",
        width: 600,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }

	
 });			 
			 
 
				 

			 
				 
				 
				 
			 
}
			 
	
			 
		$scope.add=function()
		{
		
		$scope.timestamp=$scope.timestamp.toLocaleDateString();
	
//alert(" "+$scope.website_id+ " "+$scope.ip+" "+$scope.company_ad_visited+" "+$scope.ad_type+" "+$scope.timestamp+" "+$scope.months);
			
$http.get("db/stats_ad_clicked.php?id=13&website_id="+$scope.website_id+"&ip="+$scope.ip+"&company_ad_visited="+$scope.company_ad_visited+"&ad_type="+$scope.ad_type+"&timestamp="+$scope.timestamp+"&months="+$scope.months).then(function (response) {
				 $scope.rep = response.data.records;
				  
			  });
		$scope.error="Stats Added...";   
			
		};
			 
		
	  $scope.add2=function()
		{
		
		$scope.timestamp=$scope.timestamp.toLocaleDateString();
	
//alert(" "+$scope.website_id+ " "+$scope.ip+" "+$scope.company_ad_visited+" "+$scope.ad_type+" "+$scope.timestamp+" "+$scope.months);
			
$http.get("db/stats_ad_clicked.php?id=14&website_id="+$scope.website_id+"&ip="+$scope.ip+"&company_ad_visited="+$scope.company_ad_visited+"&ad_type="+$scope.ad_type+"&timestamp="+$scope.timestamp+"&months="+$scope.months).then(function (response) {
		
	     $scope.rep = response.data.records;
				  
		});
		$scope.error="Stats Added...";   
			
		};	 
	
			 
	 $scope.add3=function()
		{
		
$scope.timestamp=$scope.timestamp.toLocaleDateString();
//alert($scope.timestamp);
//alert(" "+$scope.website_id+ " "+$scope.ip+" "+$scope.company_ad_visited+" "+$scope.timestamp+" "+$scope.months);
			
$http.get("db/stats_ad_clicked.php?id=15&website_id="+$scope.website_id+"&ip="+$scope.ip+"&company_ad_visited="+$scope.company_ad_visited+"&timestamp="+$scope.timestamp+"&months="+$scope.months).then(function (response) {
		
	     $scope.rep = response.data.records;
				  
	});
		$scope.error="Stats Added...";   
			
		};	 
		 
	
  
	 });







