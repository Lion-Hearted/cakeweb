<?php
/**
 * @Author: Administrator
 * @Date:   2017-05-10 14:49:22
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-05-12 17:26:38
 */
require_once "../login/Config.php";
$conn = connectDB();
mysqli_select_db($conn,"cakeweb");