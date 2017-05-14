<?php
/**
 * @Author: Administrator
 * @Date:   2017-05-08 14:24:19
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-05-09 13:33:37
 */
$username = $_COOKIE["name"];
require_once "../login/Config.php";
$conn = connectDB();
mysqli_select_db($conn, "cakeweb");
mysqli_query($conn, "set names utf8");
$json = "";
$data = array();
class shopCar {
	public $cakeId;
	public $cakePan;
	public $owner;
}

if($conn){
	$sql = "SELECT * FROM shopcar WHERE owner = '$username'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	$i = 0;
	if($result){
		while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
			$scar = new shopCar();
			$scar->cakeId = $row["cakeId"];
			$scar->cakePan = $row["cakePan"];
			$scar->owner = $row["owner"];
			$data[$i] = $scar;
			$i = $i + 1;
		}
		$json = json_encode($data);
		echo "{".'"shopcar"'.":"."$json"."}";
	}else{
		echo "查询失败";
	}
}