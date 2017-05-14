<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 10:36
 */
if(!isset($_POST["username"])){
    die("没有用户名");
}
if(!isset($_POST["password"])){
    die("没有密码");
}
$username = $_POST["username"];
$password = $_POST["password"];
if(empty($username)){
    die("用户名为空");
}
if(empty($password)){
    die("密码为空");
}

require_once "./login/Config.php";
$conn = connectDB();
mysqli_select_db($conn, "cakeWeb");
mysqli_query($conn, "set names utf8");

if($conn){
    $sql = "SELECT * FROM users WHERE name = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 0){
        header("Location:./login/loginFalse.php?flag=1");
    }else{
        $result_array = mysqli_fetch_assoc($result);
        $pass = $result_array["password"];
        if($password == $pass){
            setcookie("name", $username);
            header("Location:./index/index.html");
        }else{
            header("Location:login/loginFalse.php?flag=2");
        }
    }



    mysqli_close($conn);
}else{
    echo "连接服务器失败";
}