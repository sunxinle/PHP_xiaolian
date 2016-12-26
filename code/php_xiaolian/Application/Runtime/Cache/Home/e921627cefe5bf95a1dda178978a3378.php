<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2048</title>
<style>
body{text-align:center;font-size:36px;font-weight:bold;}
table{margin:0px auto;margin-top:100px;border-radius:10px;}
td{width:80px;height:80px;border-radius:10px;}
span{color:#FF0000;font-size:36px;}
</style>
</head>
<body bgcolor="#e3c887">
<table ontouchmove="test()" id="tab" cellspacing="8" bgcolor="#999"></table>
<!--<div style="font-size:12px; margin-top:20px;"></div>-->
<div style="font-size:16px;">总积分：<span id="show"></span>  分</div>
</body>
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script>
window.onload=init();
	var result=false,ys=true;
	function GetRandom(Min,Max){
		return Min+Math.round((Max-Min)*Math.random());
	}
	function RandomNum(){
		var num=GetRandom(1,16);
		if(document.getElementById(num).innerHTML==""){
			document.getElementById(num).innerHTML=GetRandom(1,2)*2;	
		}else{
			RandomNum();
		}
	}
	//初始化数据
	function init(){
		var tab=document.getElementById("tab"),text="",id=1;
		for(var i=1;i<5;i++){
			text+="<tr>";
			for(var j=i;j<=i+12;j+=4){
				text+="<td id="+id+"></td>";
				id++;
			}
			text+="</tr>"
		}
		tab.innerHTML=text;
		for(var i=0;i<2;i++){
			RandomNum();	
		}	
		Result();
	}
	//上
	function Top(){
		for(var i=1;i<5;i++){
			ys=true;
			for(var j=i;j<=i+12;j+=4){
				for(var x=j;x>4;x-=4){
					var test1=document.getElementById(x-4);
					var test2=document.getElementById(x);
					Change(test1,test2);
				}
			}
		}
	}
	//下
	function But(){
		for(var i=1;i<5;i++){
			ys=true;
			for(var j=i+12;j>=i;j-=4){
				for(var x=j;x<13;x+=4){
					var test1=document.getElementById(x+4);
					var test2=document.getElementById(x);
					Change(test1,test2);
				}
			}
		}
	}
	//左
	function Left(){
		for(var i=1;i<=13;i+=4){
			ys=true;
			for(var j=i;j<=i+3;j+=1){
				for(var x=j;x>i;x-=1){
					var test1=document.getElementById(x-1);
					var test2=document.getElementById(x);
					Change(test1,test2);
				}
			}
		}
	}
	//右
	function Right(){
		for(var i=1;i<=13;i+=4){
			ys=true;
			for(var j=i+4;j>=i;j-=1){
				for(var x=j;x<i+3;x+=1){
					var test1=document.getElementById(x+1);
					var test2=document.getElementById(x);
					Change(test1,test2);
				}
			}
		}
	}
	//进行游戏操作
	function test(){
	    result=false; 
		//获取touchstart的开始的x坐标和Y坐标
		x1 = event.targetTouches[0].pageX;
		y1 = event.targetTouches[0].pageY;
		//获取touchmove的x的坐标和Y坐标
		x2 = event.targetTouches[0].pageX;
		y2 = event.targetTouches[0].pageY;
		//在touched时判断滑动方向
		var changeY = x2-x1;
		var changeX = y2-y1;
		if(Math.abs(changeX)>Math.abs(changeY)&&Math.abs(changeY)>5){
			//左右事件
			if(changeX > 0){
				Right();
			}else{
				Left();
			}
			//上下事件
			if(changeY > 0){
				But();
			}else{
				Top();
			}
		}
		/*if(event.keyCode==37) Left();
		if(event.keyCode==38) Top()
		if(event.keyCode==39) Right();
		if(event.keyCode==40) But();*/
		if(result) RandomNum();
		Result();
	}
	//位置改变并合并
	function Change(test1,test2){
		if(test1.innerHTML==""&&test2.innerHTML!=""){
			result=true;
			test1.innerHTML=test2.innerHTML;
			test2.innerHTML="";
		}else if(test1.innerHTML!=""&&test1.innerHTML==test2.innerHTML&&ys){
			test1.innerHTML=parseInt(test1.innerHTML)+parseInt(test2.innerHTML);
			test2.innerHTML="";
			result=true;
			ys=false;
		}
	}
	//设置颜色，计算积分
	function Result(){
		var result=0,colors={"":"#fff","2":"#acf6ef","4":"#e3c887","8":"#2ae0c8","16":"#fbb8ac","32":"#fe6673","64":"#CC3333","128":"#0066CC",					"256":"#6633CC","512":"#FF0099","1024":"#990033","2048":"#6600FF","4096":"#CC0066"};
		for(var i=1;i<=16;i++){
			var text=document.getElementById(i);
			text.style.backgroundColor=colors[text.innerHTML];
			if(text.innerHTML!=""){
				result+=parseInt(text.innerHTML)*10;
			}
		}
		document.getElementById("show").innerHTML=result;
	}
</script>
</html>