/*
* @Author: Administrator
* @Date:   2017-05-08 14:53:54
* @Last Modified by:   Administrator
* @Last Modified time: 2017-05-10 16:25:35
*/

(function(){
	var carModule = angular.module("carModule",["ngRoute"]);

	carModule.controller("carController", function($scope,$rootScope,$http){
		$rootScope.myCake = [];
		$scope.nmCake = [];
		$http.get("./userCar.php").success(function(res){
			$scope.cake = angular.fromJson(res);
			$scope.cakeData = $scope.cake.shopcar;
			$scope.i = 0;
			angular.forEach($scope.cakeData,function(value,key){
				$rootScope.myCake[$scope.i] = value;
				$scope.i = $scope.i + 1;
			});
			// console.log($rootScope.myCake[0]);
			$http.get("../cake.json").success(function(response){
				$scope.allCake = response.cake;
				// console.log(response);
				// console.log($rootScope.myCake[0]);
				var ci = 0;
				angular.forEach($rootScope.myCake,function(val,k){
					angular.forEach($scope.allCake,function(v,o){
						if(parseInt(val.cakeId) == v.id){
							$scope.nmCake[ci] = v;
							for(var ni = 0; ni < v.kind.length; ni++){
								if(v.kind[ni].pang == val.cakePan){
									$scope.nmCake[ci].choPri = v.kind[ni].price;
									$scope.nmCake[ci].choPan = v.kind[ni].pang;
									$scope.nmCake[ci].owner = val.owner;
								}
							}
						}
					})
					ci++;
				});
				// console.log($scope.nmCake);
				$scope.allPri = 0;		
				angular.forEach($scope.nmCake,function(vv,kk){
					$scope.allPri = $scope.allPri + parseInt(vv.choPri.substring(1,4));
				});	
			}).error(function(){
				console.log("获取蛋糕总数据失败");
			})
		}).error(function(){
			console.log("获取数据库购物车信息错误");
		});
		$scope.sendMes = function(){
			$scope.sureCake = angular.toJson($scope.nmCake);
			$http({
				method: "post",
				url: "./sendMes.php",
				data:{"cakeMes":$scope.sureCake},
				headers:{"Content-Type": "application/x-www-form-urlencoded"},
				transformRequest:function(obj){
					var str = [];
					for(var p in obj){
						str.push(encodeURIComponent(p)+ "=" +encodeURIComponent(obj[p]));
					}
					return str.join("&")
				}
			}).success(function(data){
				console.log(data+"传送成功");
				location.assign("../login/loginFalse.php?flag=10");
			}).error(function(){
				console.log("传送至管理员购物车失败");
			})
		};


		
	})
		
})()