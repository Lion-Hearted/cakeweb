/*
* @Author: Administrator
* @Date:   2017-04-24 20:10:05
* @Last Modified by:   Administrator
* @Last Modified time: 2017-05-01 22:20:19
*/

(function(){
	var myIndex = angular.module("indexModule", []);
	myIndex.controller('indexCtrl',function($scope,$http){
		$http.get("../cake.json").success(function(response){
			$scope.cake = response.cake;
			$scope.cho16 = function(e){
				return e.id < 17;
			}
		}).error(function(){
			alert("获取JSON文件失败");
		})
	})
})()

