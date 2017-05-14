/*
* @Author: Administrator
* @Date:   2017-04-25 15:22:28
* @Last Modified by:   Administrator
* @Last Modified time: 2017-05-13 14:25:05
*/

(function(){
	var myPro = angular.module("proModule", ["ngRoute"]);

	myPro.config(function($routeProvider){
		$routeProvider.
		when("/:category",{
			templateUrl: 'list.html',
			controller: 'listController'
		}).
		otherwise({
			redirectTo: "/allCake"
		})
	});
	// myPro.config(function($httpProvider){
	// 	$httpProvider.defaults.transformRequest = function(data){
	// 		return $.param(data);
	// 	}
	// });

	myPro.controller("listController",function($http,$scope, $routeParams,$route, $rootScope){
		$rootScope.taste = $routeParams.category;

		$http.get("../cake.json").success(function(response){
			$scope.cake = response.cake;
			$scope.total = response.total;
			$scope.nowCake = [];
			if($rootScope.taste == "allCake"){
				$scope.nowCake = $scope.cake;
			}else{
				$scope.i = 0;
				angular.forEach($scope.cake,function(value,key){
					if(value.taste == $rootScope.taste){
						$scope.nowCake[$scope.i] = value;
						$scope.i = $scope.i + 1;
					}
				});
			}
			
		}).error(function(){
			console.log("请求失败");
		})
		$scope.chossed = function(e){
			$rootScope.cho = e.pang;
			$rootScope.k = e;
		}
		console.log($.cookie("name"));
		$scope.sendMes = function(e){
				if($.cookie("name")){
					$http({
						method: "post",
						url: "../shopCar/send.php",
						data: {"cId":e.id,"cName":e.name,"cPan":$rootScope.cho},
						headers:{"Content-Type": "application/x-www-form-urlencoded"},
						transformRequest:function(obj){
							var str = [];
							for(var p in obj){
								str.push(encodeURIComponent(p)+ "=" +encodeURIComponent(obj[p]));
							}
							return str.join("&")
						}
					}).success(function(data){
						console.log(data);
					}).error(function(){
						console.log("错误");
					})
				}else{
					location.assign("../login/loginFalse.php?flag=6");
				}
				
			
		}
	})

})()


