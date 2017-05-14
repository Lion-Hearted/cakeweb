/*
* @Author: Administrator
* @Date:   2017-04-27 14:08:10
* @Last Modified by:   Administrator
* @Last Modified time: 2017-05-13 17:37:22
*/

(function(){
	var myDetail = angular.module("detailModule",["ngRoute"]);
	myDetail.config(function($routeProvider){
		$routeProvider.
		when("/:cakeId",{
			templateUrl: "mes.html",
			controller: "mesController"
		}).
		otherwise({
			redirectTo: "/1"
		})
	});

	myDetail.controller("mesController", function($http,$scope,$rootScope,$routeParams,$route){
		$scope.cakeId = $routeParams.cakeId;
		$http.get("../cake.json").success(function(data){
			$scope.allCake = data.cake;
			angular.forEach($scope.allCake,function(value,key){
				if(value.id == $scope.cakeId){
					$scope.mesCake = value;
				}
			})
		});
		$scope.chossed = function(e){
			$rootScope.cho = e.pang;
		}
		$scope.sendMes = function(){
			if($.cookie("name")){
				
				$http({
					method: "post",
					url: "../shopCar/send.php",
					data: {"cId":$scope.cakeId,"cName":$scope.mesCake.name,"cPan":$rootScope.cho},
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