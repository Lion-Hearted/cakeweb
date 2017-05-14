<?php
/**
 * @Author: Administrator
 * @Date:   2017-05-05 16:28:25
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-05-12 16:45:56
 */
if(!isset($_COOKIE["name"])){
	header("Location:../login/login.html");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name = "viewport" content = "width = device-width,initial-scale = 1.0">
        <link rel="stylesheet" href="../CSS/web/common.css" media = "screen and (min-device-width: 900px)">
        <link rel="stylesheet" href="../CSS/web/shopCar.css" media = "screen and (min-device-width: 900px)">
		<link rel="stylesheet" href="../CSS/pad/common.css" media = "screen and (min-device-width:640px) and (max-device-width: 900px)">
		<link rel="stylesheet" href="../CSS/phone/common.css" media = "screen and (max-device-width: 480px)">
		<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src = "../node_modules/angular/angular.js"></script>
		<script src = "../node_modules/angular-route/angular-route.min.js"></script>
		<script src = "./shopCar.js"></script>
    </head>
    <body ng-app = "carModule">
<!-- 导航栏  固定页面最上方 -->
    	<header>
    		<div>
    			<ul>
    				<li id = "webTitle">
    					<a href="../index/index.html"><div class = "title">XCAKE</div></a>
    				</li>
    				<li><a href="../product/product.html">产品</a></li>
    				<!-- <li class = 'rec'>推荐</li> -->
    				<!-- <li class = "feel">体验</li> -->
    				<li class = "service"><a href="../service/service.html">服务</a></li>
    				<li class = "aboutUs"><a href="../aboutUs/aboutUs.html">品牌</a></li>
    				<li id = "forlogin">
    					<div class = "login"><a href="../login/login.html">登录</a></div>
    					<div class = "register"><a href="../login/register.html">注册</a></div>
    					<div class = "shopCar"><a href="#"></a>购物车</div>
    				</li>
    			</ul>
    		</div>
    	</header>
    	<div class = "middle" ng-controller = "carController">
			<div class = "shop" >
				<div class = "buy" ng-repeat = "x in nmCake">
					<div class = "bPic"><img ng-src="{{x.url}}" alt=""></div>
					<div class = "bMes">
						<div class = "midMes">
							<p class = "bName">{{x.name}}</p>
							<p class = "bPan">规格：{{x.choPan}}</p>
						</div>
						<div class = "bPri">单价：{{x.choPri}}</div>
					</div>
				</div>
				<div class = "forsure">
					<span>总价：￥{{allPri}}.00&nbsp;&nbsp;&nbsp;</span>
					<input type="button" value = "提交订单" ng-click = "sendMes()">
				</div>
			</div>
			<div class = "clearfix"></div>
		</div>	

    	<footer>
	<!-- 广告 -->
		<div class = "footer-mid">
			<div class = "statement">
				<div>
					<div>
						<img src = "../IMG/index/footer1.png" height="30" width="45">
						<div>当天制作新鲜直达</div>
					</div>
					<div>选用新鲜材料当天制作，让您当日就能体验新鲜食材，最快速的让您感受健康品质享受。
					</div>
				</div>
				<div>
					<div>
						<img src = "../IMG/index/footer2.png" height="30" width="45">
						<div>精选世界好原料</div>
					</div>
					<div>全部使用来自世界各国优等原料，严格遵守经典蛋糕制作工艺，为您提供最纯正的味道。
					</div>
				</div>
				<div>
					<div>
						<img src = "../IMG/index/footer3.png" height="30" width="45">
						<div>100%无添加</div>
					</div>
					<div>百分百纯天然食材，不含人工香料，不含色素，不添加防腐剂。只为让您品尝到最健康的美味。
					</div>
				</div>
				<div>
					<div>
						<img src = "../IMG/index/footer4.png" height="30" width="45">
						<div>无缝冷链生产与配送</div>
					</div>
					<div>全面净化的无菌生产环境，无缝对接的冷链过程，确保您的健康与安全。</div>
				</div>
			</div>
			<div class = "id-message">xiaolin9375@163.com</div>
			<div class = "clearfix"></div>
		</div>
	</footer>
	<div class = "clearfix"></div>
    </body>
</html>