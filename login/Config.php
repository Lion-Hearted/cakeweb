<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 11:04
 */

define("MySQL_host", "localhost");
define("MySQL_name", "root");
define("MySQL_pass", "");

function connectDB(){
    return mysqli_connect(MySQL_host, MySQL_name, MySQL_pass);
}