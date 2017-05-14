<html>
    <head>
        <meta charset = "utf8">
        <title>错误</title>
    </head>
    <body>
        <?php
            if(!isset($_GET["flag"])) {
                die("没有接收到信息");
            }
            $flag = $_GET["flag"];

            if(empty($flag)){
                die("信息为空");
            }
            if($flag == 1){
                echo "用户名不存在，将在"."<span id = \"p1\"></span>"."秒后跳转至登录页面";
            }else if($flag == 2){
                echo "用户名或密码错误，将在"."<span id = \"p1\"></span>"."秒后跳转至登录页面";
            }else if($flag == 7){
                echo "用户名已存在，请重新输入，将在"."<span id = \"p1\"></span>"."秒后跳转至登录页面";
            }else if($flag == 4){
                echo "注册成功，将在"."<span id = \"p1\"></span>"."秒后跳转至登录页面，请输入已注册用户名登录";
            }else if($flag == 6){
                echo "未登录，将在"."<span id = \"p1\"></span>"."秒后跳转至登录页面";
            }else if($flag == 10){
                echo "订单提交成功，将在"."<span id = \"p1\"></span>"."秒后跳转至首页";
            }


        ?>

    </body>
    <script>
            window.onload = function(){
                var pTag = document.getElementById("p1");
                pTag.style.fontSize = "30px";
                pTag.style.color = "red";
                pTag.innerHTML = 5;
                var flag1 = 5;
                var timer = setInterval(function(){
                    flag1--;
                    pTag.innerHTML = flag1;
                    if(flag1 <= 0){
                        clearInterval(timer);
                        var mes = <?php
                            echo $flag;
                        ?>;
                        if(mes < 8){
                            location.assign("./login.html");
                        }else if(mes == 10){
                            location.assign("../index/index.html");
                        }else{
                            location.assign("./register.html");
                        }
                        
                    }
                }, 1000);
            }
        </script>
</html>