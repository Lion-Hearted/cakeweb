<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 10:37
 */
if(!isset($_POST["username"])){
    die("没有用户名");
}
if(!isset($_POST["password"])){
    die("没有密码");
}
if(!isset($_POST["phone"])){
    die("没有输入电话号码");
}

$username = $_POST["username"];
$password = $_POST["password"];
$phoneNumber = $_POST["phone"];
if(empty($username)){
    die("用户名为空");
}
if(empty($password)){
    die("密码为空");
}
if(empty($phoneNumber)){
    die("电话号码为空");
}

require_once "Config.php";
$conn = connectDB();
mysqli_select_db($conn, "cakeWeb");
mysqli_query($conn, "set names utf8");

if($conn){
    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 0){
        $sql1 = "INSERT INTO users(name, password,phoneNumber) VALUES ('$username', '$password','$phoneNumber')";
        mysqli_query($conn, $sql1);

        if(mysqli_errno($conn)){
            echo "错误";
        }else{
            header("Location:loginFalse.php?flag=4");
        }


    }else{
        header("Location:loginFalse.php?flag=7");
    }

    mysqli_close($conn);
}else{
    echo "连接失败";
}