<?php
/**
 * @Author: Administrator
 * @Date:   2017-05-10 12:46:15
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-05-10 14:43:34
 */
$owner = $_COOKIE["name"];
if(!isset($_POST["cakeMes"])){
	echo "数据传输失败";
}else{
	$cakeMes = $_POST["cakeMes"];
	echo "$cakeMes";
	require_once "../login/Config.php";
	$conn = connectDB();
	mysqli_select_db($conn, "cakeweb");
	mysqli_query($conn,"set names utf8");
	if($conn){
		$sql = "INSERT INTO purchased(owner,cakeMes) VALUES ('$owner','$cakeMes')";
		mysqli_query($conn,$sql);
		if(mysqli_errno($conn)){
			echo "插入失败";
		}else{
			echo "插入成功";
		}
		$sqll = "DELETE FROM shopcar WHERE owner = '$owner'";
		mysqli_query($conn,$sqll);
	}else{
		echo "连接失败";
	}

}