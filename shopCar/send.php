<?php
/**
 * @Author: Administrator
 * @Date:   2017-05-05 17:05:54
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-05-11 15:14:06
 */
$owner = $_COOKIE["name"];
if(!isset($_POST["cId"])){
	die("传输失败");
}
	$cId = $_POST["cId"];
	$cName = $_POST["cName"];
	$cPan = $_POST["cPan"];
	require_once "../login/Config.php";
	$conn = connectDB();
	mysqli_select_db($conn, "cakeweb");
	mysqli_query($conn, "set names utf8");
	if($conn){
		$sql = "INSERT INTO shopcar(owner,cakeId,cakeName,cakePan) VALUES ('$owner','$cId','$cName','$cPan')";
		mysqli_query($conn, $sql);
		if(mysqli_errno($conn)){
			echo "错误";
		}else{
			echo "插入成功";
		}
	
	}else{
		echo "连接失败";
	}

