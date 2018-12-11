         var mainApp = angular.module("mainApp", ['ngRoute']);
       
		  mainApp.config(['$routeProvider', function($routeProvider) {
            $routeProvider.
            
            when('/viewCountry/:id', {
               templateUrl: 'collections/2.html',
               controller: 'ViewCountryController'
            }).            
            when('/About', {
               templateUrl: 'About.htm',
               controller: 'HomeController'
            }).            
            when('/Home', {
               templateUrl: 'Home.htm',
               controller: 'HomeController'
            }).
            when('/Register', {
               templateUrl: 'back/register1.html',
               controller: 'LoginController'
            }).          
            otherwise({
               //redirectTo: 'collections/0.html'
			 //templateUrl: 'Home.htm',
			   templateUrl: 'Home.htm',
               controller: 'HomeController'
            });
         }]);
		  
	 mainApp.filter('startFrom', function() {
        return function(input, start) {
         if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
       };
     });
	 
		  
         
         mainApp.controller('HomeController', function($scope, $http,$routeParams) {
  
		
			 $scope.params = $routeParams;
			 var country=$routeParams.id;   
			 $scope.country=country;
			
			 $http.get("http://test.adslive.com/government.co.za/home/get_ads_shown/706894").then(function (response) {
				  
				  $scope.ads = response.data;
		       
				  $("#div10").load($(this).html($scope.ads));
			  });
	//305		 
			$http.get("http://test.adslive.com/government.co.za/home/get_profile_views_company/706894").then(function (response) {
				  
				  $scope.get_profile_views_company = response.data;
		       
				  
			  });		
			 
	      $http.get("http://test.adslive.com/government.co.za/home/get_advert_views_company/706894").then(function (response) {
				  
				  $scope.get_advert_views_company = response.data;
		       
				  
			  });	     
		
	    $http.get("http://test.adslive.com/government.co.za/home/get_pcs_reached/706894").then(function (response) {
				  
				  $scope.get_pcs_reached = response.data;
		       
				  
			  }); 
			 
	  $http.get("http://test.adslive.com/government.co.za/home/get_new_visits/706894").then(function (response) {
				  
				  $scope.get_new_visits = response.data;
		       
				  
			  });
	
   $http.get("http://test.adslive.com/government.co.za/home/get_advert_views_month/706894/11").then(function (response) {
				  
				  $scope.get_advert_views_month = response.data;
		       
				  
			  });   
	
    $http.get("http://test.adslive.com/government.co.za/home/get_returned_visits/11").then(function (response) {
				  
				  $scope.get_returned_visits = response.data;
		       
				  
			  });  
	
	$http.get("http://test.adslive.com/government.co.za/home/get_profile_views_month/706894/11").then(function (response) {
				  
				  $scope.get_profile_views_month = response.data;
		       
				  
			  });	
    $http.get("http://test.adslive.com/government.co.za/home/get_people_reached_month/706894/11").then(function (response) {
				  
				  $scope.get_people_reached_month = response.data;
		       
				  
			  });   
   $http.get("http://test.adslive.com/government.co.za/statistics/country_ajax_stats/11/2018").then(function (response) {
				  
				  $scope.country_ajax_stats = response.data;
		       
				  
			  });
			 

$http.get("http://test.adslive.com/government.co.za/home/get_chrome_visits").then(function (response) {
				  
				  $scope.get_chrome_visits = response.data;
		       
				
	
	$http.get("http://test.adslive.com/government.co.za/home/get_ie_visits").then(function (response) {
				  
				  $scope.get_ie_visits = response.data;
		       
$http.get("http://test.adslive.com/government.co.za/home/get_safari_visits").then(function (response) {
				  
				  $scope.get_safari_visits = response.data;
		       
				  
	$http.get("http://test.adslive.com/government.co.za/home/get_mozilla_visits").then(function (response) {
				  
				  $scope.get_mozilla_visits = response.data;
		       
				 	 var ctxP = document.getElementById("seo").getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: ["Google Chrome", "Internet Explorer", "Safari", "Mozilla Firefox"],
                    datasets: [
                        {
                           // data: [<?php //echo $get_chrome_visits ;?>, <?php //echo $get_ie_visits  ;?>, <?php// echo $get_safari_visits  ;?>, <?php// echo $get_mozilla_visits  ;?>],
                            data: [$scope.get_chrome_visits, $scope.get_ie_visits, $scope.get_safari_visits, $scope.get_mozilla_visits],
                            backgroundColor: ["#4caf50", "#FFCE44", "#03a9f4", "#d32f2f"],
                            hoverBackgroundColor: ["#4caf50", "#FFCE44", "#03a9f4", "#d32f2f"]
                        }
                    ]
                },
                options: {
                    responsive: true
                }    
            });		
		 
			  });
	
			  });
		
		
			  });


	
	
	
   		
	
	
	
			  });
			 

			 
var months=[];
			 
	for(var i=1;i<=12;i++)		
		{
	$http.get("http://test.adslive.com/government.co.za/home/get_profile_views_month_of_year/706894/"+i).then(function (response) {		  
				
		      months[i]=response.data;
		
				var ctxB = document.getElementById("traffic").getContext('2d');
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [ 'Jan',  'Feb',   'Mar',   'Apr',   'May',   'Jun',   'Jul ',   'Aug',   'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: '# of Views',
                        data: [months[1],months[2],months[3],months[4],months[5],months[6],months[7],months[8],months[9],months[10],months[11],months[12]],
                       backgroundColor: ["#222","#222","#222","#222","#222","#222","#222","#222","#222","#222","#222","#222"],
                        borderColor: [
                            
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: "white"
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                fontColor: "white"
                            }
                        }],
                        xAxes: [{
                            ticks:  {
                                fontColor: "white"
                            }
                        }]
                    }
                }
            });			 
			 
	});		
			
			
	
			
		}
		 
			 
  
			 
			 
			 
			 
			 
			 
			 
			 
       	 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		 });