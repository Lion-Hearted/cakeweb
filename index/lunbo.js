/*
* @Author: Administrator
* @Date:   2017-05-01 22:19:55
* @Last Modified by:   Administrator
* @Last Modified time: 2017-05-01 22:26:39
*/
// (function(){
// 	var divPic = document.getElementById("focusPic");
// 	alert(divPic);
// 	for(var i = 0; i < imgs.length; i++){
// 		var current = imgs[i];
// 		current.style.width = Math.floor((lunbotu.offsetWidth - 80)/2)+ "px";
// 		current.style.height = lunbotu.offsetHeight + "px";
// 	}
// 	divPic.style.width = current.offsetWidth*6 + "px";
// 	divPic.style.left = Math.ceil(current.offsetWidth/-2) + "px";

// 	var index = 1;
// 	var curIndex;
// 	var currentImg = imgs[index].offsetWidth;
// 	var time = setInterval(function(){
// 		curIndex = index%3;
// 		KGGMove(divPic, "left", -1*curIndex*current-Math.floor(currentImg/2),function(){
// 			if(index == 4){
//                 index = 0;
//                 lunbotuFather.style.left = -1*currentImg/2 + "px";
//             }
// 		})
// 		index++;
// 	},3000);
// })()