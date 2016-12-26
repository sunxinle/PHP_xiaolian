<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background-color: #ECECEC; font-family: 'Open Sans',sans-serif; color: #000; font-size: 16px; }
.system-message{ text-align: center;
  font-family: cursive;
  font-size: 150px;
  font-weight: bold;
  line-height: 100px;
  letter-spacing: 5px;
  color: #fff; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}


/**
* Pure CSS3 Classic Train 
*/
* {
  margin:0px;
  padding:0px;
  list-style:none;
}

body {
  background-color:#eee;
  text-align:center;
}

a {
  color:#ddd;
  text-decoration:none;
}

a:hover {
  text-decoration:underline;
}

#wrapper {
  width:1250px;
  height:370px;
  margin:50px auto 30px;
  position:relative;
	-webkit-animation: bg-cg 8s linear infinite;
}

/* BODY */
#pipe {
  position:absolute;
  top:80px;
  left:145px;
  width:960px;
  height:100px;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-box-shadow:inset 4px 0px 3px #000;
  -moz-box-shadow:inset 4px 0px 3px #000;
  box-shadow:inset 4px 0px 3px #000;
}

#pipe:before {
  content:"";
  position:absolute;
  top:0px;
  left:75px;
  width:4px;
  height:100px;
  border:6px double #000;
  border-top-width:0px;
  border-bottom-width:0px;
  -webkit-box-shadow:1px 0px 0px rgba(255,255,255,0.3),-1px 0px 0px rgba(255,255,255,0.3),inset 1px 0px 0px rgba(255,255,255,0.3),inset -1px 0px 0px rgba(255,255,255,0.3);
  -moz-box-shadow:1px 0px 0px rgba(255,255,255,0.3),-1px 0px 0px rgba(255,255,255,0.3),inset 1px 0px 0px rgba(255,255,255,0.3),inset -1px 0px 0px rgba(255,255,255,0.3);
  box-shadow:1px 0px 0px rgba(255,255,255,0.3),-1px 0px 0px rgba(255,255,255,0.3),inset 1px 0px 0px rgba(255,255,255,0.3),inset -1px 0px 0px rgba(255,255,255,0.3);
}

#main-fog {
  position:absolute;
  top:30px;
  left:165px;
  width:50px;
  height:60px;
  background-color:#222;
  background-image:-webkit-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-border-bottom-left-radius:50px 10px;
  -webkit-border-bottom-right-radius:50px 10px;
  -moz-border-radius-bottomleft:50px 10px;
  -moz-border-radius-bottomright:50px 10px;
  border-bottom-left-radius:50px 10px;
  border-bottom-right-radius:50px 10px;
}

#main-fog:before {
  content:"";
  position:absolute;
  bottom:100%;
  left:-2px;
  width:54px;
  height:20px;
  background-color:#222;
  background-image:-webkit-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-box-shadow:inset 4px 0px 3px #000;
  -moz-box-shadow:inset 4px 0px 3px #000;
  box-shadow:inset 4px 0px 3px #000;
}

.alt-fog {
  position:absolute;
  top:60px;
  left:255px;
  width:37px;
  height:30px;
  background-color:#222;
  background-image:-webkit-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(left,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-border-top-left-radius:50px;
  -webkit-border-top-right-radius:50px;
  -webkit-border-bottom-left-radius:50px 10px;
  -webkit-border-bottom-right-radius:50px 10px;
  -moz-border-radius-topleft:50px;
  -moz-border-radius-topright:50px;
  -moz-border-radius-bottomleft:50px 10px;
  -moz-border-radius-bottomright:50px 10px;
  border-top-left-radius:50px;
  border-top-right-radius:50px;
  border-bottom-left-radius:50px 10px;
  border-bottom-right-radius:50px 10px;
  -webkit-box-shadow:inset 0px 4px 3px #666;
  -moz-box-shadow:inset 0px 4px 3px #666;
  box-shadow:inset 0px 4px 3px #666;
}

.alt-fog:before,.alt-fog:after {
  content:"";
  position:absolute;
  bottom:-5px;
  left:15px;
  width:5px;
  height:15px;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
  -webkit-box-shadow:0px 0px 3px #000;
  -moz-box-shadow:0px 0px 3px #000;
  box-shadow:0px 0px 3px #000;
}

.alt-fog:after {
  left:22px;
}

.alt-fog.nth2  {left:335px;}
.alt-fog.nth3  {left:420px;}
.alt-fog.nth4  {left:500px;}

#front {
  position:absolute;
  top:78px;
  left:123px;
  width:10px;
  height:97px;
  background-color:#333;
  -webkit-border-top-left-radius:50px 200px;
  -webkit-border-bottom-left-radius:50px 200px;
  -moz-border-radius-topleft:50px 200px;
  -moz-border-radius-bottomleft:50px 200px;
  border-top-left-radius:50px 200px;
  border-bottom-left-radius:50px 200px;
  -webkit-box-shadow:inset 0px -10px 5px #000,inset 1px 10px 5px #666,0px 1px 3px #000;
  -moz-box-shadow:inset 0px -10px 5px #000,inset 1px 10px 5px #666,0px 1px 3px #000;
  box-shadow:inset 0px -10px 5px #000,inset 1px 10px 5px #666,0px 1px 3px #000;
}

#front1,#front1:before,#front1:after {
  position:absolute;
  top:70px;
  left:135px;
  width:17px;
  height:110px;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-box-shadow:0px 0px 3px #000;
  -moz-box-shadow:0px 0px 3px #000;
  box-shadow:0px 0px 3px #000;
}

#front1:before {
  content:"";
  left:auto;
  right:100%;
  top:2px;
  width:2px;
  height:120px;
}

#front1:after {
  content:"";
  right:auto;
  left:100%;
  top:2px;
  width:7px;
  height:120px;
}

#bot {
  position:absolute;
  top:180px;
  left:135px;
  width:1000px;
  height:110px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px -4px 7px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px -4px 7px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px -4px 7px #000;
}

#bot:before,#bot:after {
  content:"";
  position:absolute;
  top:15px;
  left:170px;
  width:170px;
  height:30px;
  z-index:10;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-moz-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-ms-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:-o-linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  background-image:linear-gradient(top,#000,#666,#222,#000,#111,#333,#222,#111,#000);
  -webkit-box-shadow:inset 4px 0px 0px rgba(255,255,255,0.2),inset -4px 0px 0px rgba(255,255,255,0.2),0px 3px 4px #000;
  -moz-box-shadow:inset 4px 0px 0px rgba(255,255,255,0.2),inset -4px 0px 0px rgba(255,255,255,0.2),0px 3px 4px #000;
  box-shadow:inset 4px 0px 0px rgba(255,255,255,0.2),inset -4px 0px 0px rgba(255,255,255,0.2),0px 3px 4px #000;
}

#bot:after {
  top:45px;
}

#lamp {
  position:absolute;
  bottom:100%;
  left:5px;
  width:4px;
  height:60px;
  background-color:#666;
  background-image:-webkit-linear-gradient(45deg,#666,#222,#999,#666);
  background-image:-moz-linear-gradient(45deg,#666,#222,#999,#666);
  background-image:-ms-linear-gradient(45deg,#666,#222,#999,#666);
  background-image:-o-linear-gradient(45deg,#666,#222,#999,#666);
  background-image:linear-gradient(45deg,#666,#222,#999,#666);
  -webkit-box-shadow:3px 1px 2px #000;
  -moz-box-shadow:3px 1px 2px #000;
  box-shadow:3px 1px 2px #000;
}

#lamp:before {
  content:"";
  position:absolute;
  right:100%;
  top:0px;
  width:4px;
  height:20px;
  background:yellow;
  background-image:-webkit-radial-gradient(left,circle,#fff,yellow,#666);
  background-image:-moz-radial-gradient(left,circle,#fff,yellow,#666);
  background-image:-ms-radial-gradient(left,circle,#fff,yellow,#666);
  background-image:-o-radial-gradient(left,circle,#fff,yellow,#666);
  background-image:radial-gradient(left,circle,#fff,yellow,#666);
  -webkit-border-top-left-radius:10px 30px;
  -webkit-border-bottom-left-radius:10px 30px;
  -moz-border-radius-topleft:10px 30px;
  -moz-border-radius-bottomleft:10px 30px;
  border-top-left-radius:10px 30px;
  border-bottom-left-radius:10px 30px;
}

#lamp:after {
  content:"";
  position:absolute;
  left:100%;
  top:2px;
  width:12px;
  height:16px;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#666,#222,#999,#666);
  background-image:-moz-linear-gradient(top,#666,#222,#999,#666);
  background-image:-ms-linear-gradient(top,#666,#222,#999,#666);
  background-image:-o-linear-gradient(top,#666,#222,#999,#666);
  background-image:linear-gradient(top,#666,#222,#999,#666);
  -webkit-box-shadow:3px 4px 2px #000;
  -moz-box-shadow:3px 4px 2px #000;
  box-shadow:3px 4px 2px #000;
}

#longan {
  position:absolute;
  top:200px;
  left:172px;
  width:870px;
  height:100px;
  background-color:#111;
  -webkit-box-shadow:inset 0px 7px 3px #000,inset 0px 1px 7px #000,inset 0px 7px 15px #000;
  -moz-box-shadow:inset 0px 7px 3px #000,inset 0px 7px 7px #000,inset 0px 7px 15px #000;
  box-shadow:inset 0px 7px 3px #000,inset 0px 7px 7px #000,inset 0px 7px 15px #000;
  -webkit-border-radius:30px / 10px;
  -moz-border-radius:30px / 10px;
  border-radius:30px / 10px;
}

#room {
  position:absolute;
  top:40px;
  right:140px;
  width:350px;
  height:125px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
}

#room:before {
  content:"110";
  position:absolute;
  top:15px;
  left:25px;
  font:bold 28px 'Prisoner SF',Courier,Monospace;
  color:rgba(255,255,255,0.4);
}

#roof {
  position:absolute;
  top:30px;
  right:130px;
  width:370px;
  height:20px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
}

#roof2 {
  position:absolute;
  top:20px;
  right:100px;
  width:430px;
  height:20px;
  background-color:#222;
  background-image:-webkit-linear-gradient(top,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(top,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(top,#000,#222,#111,#000);
  background-image:-o-linear-gradient(top,#000,#222,#111,#000);
  background-image:linear-gradient(top,#000,#222,#111,#000);
  -webkit-box-shadow:0px 4px 4px #000;
  -moz-box-shadow:0px 4px 4px #000;
  box-shadow:0px 4px 4px #000;
  -webkit-border-bottom-right-radius:60px 20px;
  -moz-border-radius-bottomright:60px 20px;
  border-bottom-right-radius:60px 20px;
}

#roof2:before,#roof2:after {
  content:"";
  position:absolute;
  bottom:-2px;
  left:12px;
  width:5px;
  height:2px;
  background-color:#333;
  border:1px solid #444;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
}

#roof2:after {
  left:auto;
  right:15px;
  height:5px;
}

.hole {
  margin-top:25px;
  margin-right:20px;
  width:40px;
  height:75px;
  background-color:#111;
  border:2px solid #222;
  -webkit-border-radius:20px 20px 0px 0px;
  -moz-border-radius:20px 20px 0px 0px;
  border-radius:20px 20px 0px 0px;
  -webkit-box-shadow:inset 0px 1px 7px #000,0px 0px 1px rgba(255,255,225,0.4);
  -moz-box-shadow:inset 0px 1px 7px #000,0px 0px 1px rgba(255,255,225,0.4);
  box-shadow:inset 0px 1px 7px #000,0px 0px 1px rgba(255,255,225,0.4);
  float:right;
  display:inline;
  position:relative;
}

.hole.nth2 {
  margin-right:10px;
}

.hole:before,.hole:after {
  content:"";
  position:absolute;
  top:100%;
  left:2px;
  display:block;
  width:12px;
  height:2px;
  margin-top:7px;
  background-color:#666;
  -webkit-box-shadow:0px 1px 1px #000;
  -moz-box-shadow:0px 1px 1px #000;
  box-shadow:0px 1px 1px #000;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
}

.hole:after {
  margin-top:11px;
}

#buritan {
  position:absolute;
  top:175px;
  right:80px;
  width:40px;
  height:97px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
}

#fence {
  position:absolute;
  top:140px;
  right:80px;
  width:70px;
  height:40px;
}

#fence ul li {
  float:right;
  display:inline;
  width:4px;
  height:40px;
  padding:0 0 0 0;
  margin:0px 4px 0px;
  background-image:-webkit-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(left,#666,#ccc,#333,#999,#333);
  -webkit-box-shadow:0px 0px 3px #000;
  -moz-box-shadow:0px 0px 3px #000;
  box-shadow:0px 0px 3px #000;
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}

#fence ul {
  position:relative;
  height:40px;
}

#fence ul:before {
  content:"";
  position:absolute;
  bottom:100%;
  left:-2px;
  width:78px;
  height:10px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
}

#fence ul:after {
  content:"";
  position:absolute;
  top:100%;
  left:-2px;
  margin-top:-7px;
  width:78px;
  height:10px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
}

#metal {
  position:absolute;
  top:100px;
  left:272px;
  width:670px;
  height:75px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#111 0%,#000 20%,#000 21%,#333 40%,#000 50%,#222 51%,#111 60%,#000 60%,#111 61%,#000 100%);
  background-image:-moz-linear-gradient(45deg,#111 0%,#000 20%,#000 21%,#333 40%,#000 50%,#222 51%,#111 60%,#000 60%,#111 61%,#000 100%);
  background-image:-ms-linear-gradient(45deg,#111 0%,#000 20%,#000 21%,#333 40%,#000 50%,#222 51%,#111 60%,#000 60%,#111 61%,#000 100%);
  background-image:-o-linear-gradient(45deg,#111 0%,#000 20%,#000 21%,#333 40%,#000 50%,#222 51%,#111 60%,#000 60%,#111 61%,#000 100%);
  background-image:linear-gradient(45deg,#111 0%,#000 20%,#000 21%,#333 40%,#000 50%,#222 51%,#111 60%,#000 60%,#111 61%,#000 100%);
  -webkit-box-shadow:inset 0px 0px 1px rgba(255,255,255,0.3),0px 1px 3px #000;
  -moz-box-shadow:inset 0px 0px 1px rgba(255,255,255,0.3),0px 1px 3px #000;
  box-shadow:inset 0px 0px 1px rgba(255,255,255,0.3),0px 1px 3px #000;
  -webkit-border-radius:3px 0px 0px 0px;
  -moz-border-radius:3px 0px 0px 0px;
  border-radius:3px 0px 0px 0px;
}

#metal .inner {
  width:657px;
  height:64px;
  border:1px dotted #666;
  margin-top:5px;
  margin-left:5px;
}

#title {
  position:absolute;
  top:100px;
  left:292px;
  width:642px;
  height:75px;
  text-align:left;
  font:normal 11px Georgia,Times,Serif;
  color:#777;
  text-shadow:0px -1px 0px #000;
}
#title .success,#title .error{
  font-family: cursive;
  font-size: 20px;
  line-height: 20px;
  letter-spacing: 5px;
  color: #fff;
}
#title h2 {
  font:bold 22px 'Book Antiqua',Times,Serif;
  color:#666;
  text-transform:uppercase;
  margin:10px 0px 5px;
  padding:0px 0px 5px;
  border-bottom:1px dotted #666;
}

.foot {
  position:absolute;
  top:210px;
  left:115px;
  width:50px;
  height:100px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 2px #000;
}

.foot.right {
  left:auto;
  right:130px;
  width:78px;
  -webkit-border-bottom-left-radius:50px 10px;
  -moz-border-radius-bottomleft:50px 10px;
  border-bottom-left-radius:50px 10px;
}

#moncong {
  position:absolute;
  top:155px;
  left:75px;
  width:0px;
  height:0px;
  border-top:60px solid transparent;
  border-left:40px solid transparent;
  border-bottom:90px solid #222;
}

#moncong-bot {
  position:absolute;
  top:277px;
  left:70px;
  width:50px;
  height:37px;
  background-color:#222;
  background-image:-webkit-linear-gradient(-45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(-45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(-45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(-45deg,#000,#222,#111,#000);
  background-image:linear-gradient(-45deg,#000,#222,#111,#000);
  -webkit-box-shadow:0px 1px 4px #000;
  -moz-box-shadow:0px 1px 4px #000;
  box-shadow:0px 1px 4px #000;
  -webkit-border-bottom-right-radius:60px 20px;
  -moz-border-radius-bottomright:60px 20px;
  border-bottom-right-radius:60px 20px;
}

#moncong-bot:before {
  content:"";
  width:20px;
  height:47px;
  border:3px solid #666;
  -webkit-border-radius:7px 7px 0px 0px;
  -moz-border-radius:7px 7px 0px 0px;
  border-radius:7px 7px 0px 0px;
  position:absolute;
  bottom:7px;
  left:2px;
  -webkit-box-shadow:inset 0px 0px 3px #000,0px 0px 3px #000;
  -moz-box-shadow:inset 0px 0px 3px #000,0px 0px 3px #000;
  box-shadow:inset 0px 0px 3px #000,0px 0px 3px #000;
}

#moncong-bot:after {
  content:"";
  position:absolute;
  bottom:4px;
  left:-2px;
  width:35px;
  height:5px;
  background-color:#999;
  background-image:-webkit-linear-gradient(45deg,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(45deg,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(45deg,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(45deg,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(45deg,#666,#ccc,#333,#999,#333);
  border:2px solid rgba(255,255,255,0.2);
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
}

.stair {
  position:absolute;
  top:205px;
  left:120px;
  width:30px;
  height:110px;
}

.stair.right {
  left:auto;
  right:170px;
}

.stair.left,.stair.left .hand {
  height:115px;
}

.stair .hand {
  width:5px;
  height:110px;
  background-image:-webkit-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(left,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(left,#666,#ccc,#333,#999,#333);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
  -webkit-box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
  -moz-box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
  box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
  float:left;
}

.stair .hand.right {
  float:right;
}

.stair ul {
  margin:0 0 0 0;
  padding:0 0 0 0;
}

.stair ul li {
  display:block;
  height:5px;
  margin:4px 0px 6px;
  padding:0px;
  background-image:-webkit-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(top,#666,#ccc,#333,#999,#333);
  -webkit-box-shadow:0px 0px 3px #000;
  -moz-box-shadow:0px 0px 3px #000;
  box-shadow:0px 0px 3px #000;
}

/* WHEEL */
.rodaout {
  width:130px;
  height:130px;
  background-color:#222;
  position:absolute;
  top:205px;
  left:187px;
  -webkit-border-radius:400px;
  -moz-border-radius:400px;
  border-radius:400px;
	-webkit-animation: rotate-infinity 2s linear infinite;
}

.rodaout .inner {
  position:relative;
  top:3px;
  left:3px;
  border:2px solid #6A210C;
  width:120px;
  height:120px;
  -webkit-box-shadow:0px 0px 1px #000;
  -moz-box-shadow:0px 0px 1px #000;
  box-shadow:0px 0px 1px #000;
  -webkit-border-radius:400px;
  -moz-border-radius:400px;
  border-radius:400px;
}

.rodaout .in-in {
  position:relative;
  top:0px;
  left:0px;
  width:100px;
  height:100px;
  border:10px solid #333;
  -webkit-border-radius:400px;
  -moz-border-radius:400px;
  border-radius:400px;
  -webkit-box-shadow:inset 0px 1px 5px #000,0px 0px 2px #000;
  -moz-box-shadow:inset 0px 1px 5px #000,0px 0px 2px #000;
  box-shadow:inset 0px 1px 5px #000,0px 0px 2px #000;

}

.grid {
  position:absolute;
  top:0px;
  left:47px;
  width:3px;
  height:98px;
  background-color:#666;
  border:1px solid #777;
  -webkit-box-shadow:0px 0px 1px #000;
  -moz-box-shadow:0px 0px 1px #000;
  box-shadow:0px 0px 1px #000;
  -webkit-border-radius:5px / 70px;
  -moz-border-radius:5px / 70px;
  border-radius:5px / 70px;

}

.grid.r2 {
  -webkit-transform:rotate(90deg);
  -moz-transform:rotate(90deg);
  -ms-transform:rotate(90deg);
  -o-transform:rotate(90deg);
  transform:rotate(90deg);
  top:0px;
  left:47px;
}

.grid.r3 {
  -webkit-transform:rotate(30deg);
  -moz-transform:rotate(30deg);
  -ms-transform:rotate(30deg);
  -o-transform:rotate(30deg);
  transform:rotate(30deg);
  top:0px;
  left:47px;
}

.grid.r4 {
  -webkit-transform:rotate(60deg);
  -moz-transform:rotate(60deg);
  -ms-transform:rotate(60deg);
  -o-transform:rotate(60deg);
  transform:rotate(60deg);
  top:0px;
  left:48px;
}

.grid.r5 {
  -webkit-transform:rotate(120deg);
  -moz-transform:rotate(120deg);
  -ms-transform:rotate(120deg);
  -o-transform:rotate(120deg);
  transform:rotate(120deg);
  top:0px;
  left:47px;
}

.grid.r6 {
  -webkit-transform:rotate(150deg);
  -moz-transform:rotate(150deg);
  -ms-transform:rotate(150deg);
  -o-transform:rotate(150deg);
  transform:rotate(150deg);
}

.hub {
  position:absolute;
  top:40px;
  left:40px;
  width:10px;
  height:10px;
  background-color:#666;
  border:5px solid #777;
  -webkit-box-shadow:0px 0px 2px #000;
  -moz-box-shadow:0px 0px 2px #000;
  box-shadow:0px 0px 2px #000;
  -webkit-border-radius:20px;
  -moz-border-radius:20px;
  border-radius:20px;
}



.hub:after {

  width:20px;
  height:5px;
  background-color:#333;
  border:2px solid #666;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:20px;
  -moz-border-radius:20px;
  border-radius:20px;
  position:absolute;
  top:10px;
  right:-7px;
}

.rodaout.nth2 {left:327px;}
.rodaout.nth3 {left:467px;}
.rodaout.nth4 {left:607px;}
.rodaout.nth5 {left:747px;}
.rodaout.nth6 {left:887px;}

/* DETAILS */
#grouper {
  position:absolute;
  top:225px;
  left:190px;
  width:800px;
  height:90px;
}

#grouper:before {
  content:"";
  position:absolute;
  top:0px;
  left:0px;
  width:100px;
  height:80px;
  background-color:#666;
  background-image:-webkit-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  border:5px solid #666;
  -webkit-border-radius:0px 50px 50px 0px;
  -moz-border-radius:0px 50px 50px 0px;
  border-radius:0px 50px 50px 0px;
  -webkit-box-shadow:4px 1px 7px #000;
  -moz-box-shadow:4px 1px 7px #000;
  box-shadow:inset 0px 0px 5px #000,4px 1px 7px #000;
}

#grouper .strong {
  position:absolute;
  bottom:12px;
  left:87px;
  height:4px;
  background-color:#666;
  background-image:-webkit-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(-45deg,#666,#ccc,#333,#999,#333);
  border-top:1px solid #ccc;
  border-bottom:1px solid #999;
  width:130px;
  -webkit-box-shadow:inset 0px 1px 0px rgba(0,0,0,0.7),inset 0px -1px 0px rgba(0,0,0,0.7),0px 1px 3px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(0,0,0,0.7),inset 0px -1px 0px rgba(0,0,0,0.7),0px 1px 3px #000;
  box-shadow:inset 0px 1px 0px rgba(0,0,0,0.7),inset 0px -1px 0px rgba(0,0,0,0.7),0px 1px 3px #000;
}

#grouper .strong:before,#grouper .strong:after {
  content:"";
  width:10px;
  height:10px;
  background-color:#333;
  border:3px double #666;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:20px;
  -moz-border-radius:20px;
  border-radius:20px;
  position:absolute;
  top:-6px;
  left:-2px;
}

#grouper .strong:after {
  left:auto;
  right:-2px;
}

#grouper .strong.nth2 {left:227px;}
#grouper .strong.nth3 {left:368px;}
#grouper .strong.nth4 {left:508px;}
#grouper .strong.nth5 {left:648px;}

#grouper .end {
  position:absolute;
  bottom:22px;
  right:0px;
  width:20px;
  height:20px;
  background-color:#666;
  background-image:-webkit-radial-gradient(center,cover,#aaa,#333);
  background-image:-moz-radial-gradient(center,cover,#aaa,#333);
  background-image:-ms-radial-gradient(center,cover,#aaa,#333);
  background-image:-o-radial-gradient(center,cover,#aaa,#333);
  background-image:radial-gradient(center,cover,#aaa,#333);
  border:3px double #999;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:20px;
  -moz-border-radius:20px;
  border-radius:20px;
}

.vertical {
  position:absolute;
  top:180px;
  left:212px;
  width:5px;
  height:50px;
  background-image:-webkit-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-moz-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-ms-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:-o-linear-gradient(top,#666,#ccc,#333,#999,#333);
  background-image:linear-gradient(top,#666,#ccc,#333,#999,#333);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
  -webkit-box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
  -moz-box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
  box-shadow:inset 0px 2px 1px #ccc,0px 0px 3px #000;
}

.vertical.two {
  left:218px;
}

#machine-box {
  position:absolute;
  top:175px;
  left:160px;
  width:127px;
  height:140px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  -webkit-border-bottom-right-radius:50px 20px;
  -moz-border-radius-bottomright:50px 20px;
  border-bottom-right-radius:50px 20px;
}

#machine-box:before {
  content:"";
  position:absolute;
  top:10px;
  right:-10px;
  width:94px;
  height:36px;
  background-color:#222;
  background-image:-webkit-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-moz-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-ms-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:-o-linear-gradient(45deg,#000,#222,#111,#000);
  background-image:linear-gradient(45deg,#000,#222,#111,#000);
  -webkit-box-shadow:inset 4px 4px 0px rgba(255,255,255,0.2),inset -4px -4px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  -moz-box-shadow:inset 4px 4px 0px rgba(255,255,255,0.2),inset -4px -4px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  box-shadow:inset 4px 4px 0px rgba(255,255,255,0.2),inset -4px -4px 0px rgba(255,255,255,0.2),0px 1px 7px #000;
  border:2px solid #222;
}

ul.stripe-stripe {
  position:absolute;
  margin:0 0 0 0;
  padding:0 0 0 0;
  width:70px;
}

ul.stripe-stripe li {
  display:block;
  height:1px;
  margin:0px 0px 2px;
  background-color:#444;
}

ul.stripe-stripe.one {
  top:235px;
  left:180px;
}

ul.stripe-stripe.two {
  top:60px;
  right:320px;
  padding:3px 7px;
  -webkit-box-shadow:0px 1px 2px #000;
  -moz-box-shadow:0px 1px 2px #000;
  box-shadow:0px 1px 2px #000;
}

ul.stripe-stripe.one:before,ul.stripe-stripe.one:after {
  content:"";
  width:10px;
  height:10px;
  background-color:#333;
  border:3px double #666;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:20px;
  -moz-border-radius:20px;
  border-radius:20px;
  position:absolute;
  top:30px;
  left:-5px;
}

ul.stripe-stripe.one:after {
  top:45px;
}

ul.stripe-stripe.two:before,ul.stripe-stripe.two:after {
  content:"";
  width:15px;
  height:2px;
  background-color:#111;
  border:3px double #555;
  -webkit-box-shadow:0px 1px 3px #000;
  -moz-box-shadow:0px 1px 3px #000;
  box-shadow:0px 1px 3px #000;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  position:absolute;
  top:0px;
  left:100%;
  margin-left:10px;
}

ul.stripe-stripe.two:after {
  top:11px;
}

.clear {
  clear:both;
}

@-webkit-keyframes fading {from {opacity:0;} to {opacity:1;}}
@-moz-keyframes fading    {from {opacity:0;} to {opacity:1;}}
@-ms-keyframes fading     {from {opacity:0;} to {opacity:1;}}
@-o-keyframes fading      {from {opacity:0;} to {opacity:1;}}
@keyframes fading         {from {opacity:0;} to {opacity:1;}}


/* HIGHLIGHT! */
/*#wrapper *:hover {outline:1px solid red;}*/
#title{outline:2px solid #fff;}

@keyframes rotate-infinity {
    from {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    to {
        -webkit-transform: rotate(-360deg);
        -moz-transform: rotate(-360deg);
        -ms-transform: rotate(-360deg);
        transform: rotate(-360deg)
    }
}

@-moz-keyframes rotate-infinity {
    from {
        -moz-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    to {
        -moz-transform: rotate(-360deg);
        transform: rotate(-360deg)
    }
}

@-webkit-keyframes rotate-infinity {
    from {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    to {
        -webkit-transform: rotate(-360deg);
        transform: rotate(-360deg)
    }
}

@-ms-keyframes rotate-infinity {
    from {
        -ms-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    to {
        -ms-transform: rotate(-360deg);
        transform: rotate(-360deg)
    }
}



@keyframes bg-cg {
    from {
			left:0px;
    }

    to {
			left:-900px;
    }
}

@-moz-keyframes bg-cg {
    from {
			left:0px;
    }

    to {
			left:-900px
    }
}

@-webkit-keyframes bg-cg {
    from {
			left:0px;
    }

    to {
			left:-900px;
    }
}

@-ms-keyframes bg-cg {
    from {
        left:0px;
    }

    to {
			left:-900px;
    }
}
</style>
</head>
<body>
<div class="system-message">
<p class="detail"></p>
<p class="jump">
I&nbsp;will&nbsp;go&nbsp;&nbsp;<a id="href" style="text-decoration:none" href="<?php echo($jumpUrl); ?>"></a><b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>




<div id="wrapper">
		<div id="pipe"></div>
		<div id="main-fog"></div>
		<div class="alt-fog nth1"></div>
		<div class="alt-fog nth2"></div>
		<div class="alt-fog nth3"></div>
		<div class="alt-fog nth4"></div>
		<div id="front"></div>
		<div id="front1"></div>
		<div id="bot">
			<div id="lamp"></div>
		</div> <!-- bot -->
		<div id="longan"></div>
		<div id="buritan"></div>
		<div id="moncong"></div>
		<div id="moncong-bot"></div>

		<div id="room">
		<div class="hole"></div>
		<div class="hole nth2"></div>
		<div class="clear"></div>
		</div>
		<div id="roof"></div>
		<div id="roof2"></div>

		<div id="metal"><div class="inner"></div></div>

		<div id="fence">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

		<div id="title">
			<h2>校脸列车</h2>
			<?php if(isset($message)) {?>
<p class="success"><?php echo($message); ?></p>
<?php }else{?>
<p class="error"><?php echo($error); ?></p>
<?php }?>
		</div>

		<div class="foot left"></div>
		<div class="foot right"></div>

		<div class="stair left">
			<div class="hand left"></div>
			<div class="hand right"></div>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			<div class="clear"></div>
		</div>

		<div class="stair right">
			<div class="hand left"></div>
			<div class="hand right"></div>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			<div class="clear"></div>
		</div>


		<div class="rodaout nth1"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>


		<div class="rodaout nth2"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>


		<div class="rodaout nth3"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>


		<div class="rodaout nth4"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>

		<div class="rodaout nth5"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>

		<div class="rodaout nth6"><div class="inner"><div class="in-in">
			<div class="grid r1"></div>
			<div class="grid r2"></div>
			<div class="grid r3"></div>
			<div class="grid r4"></div>
			<div class="grid r5"></div>
			<div class="grid r6"></div>
			<div class="hub"></div>
		</div></div></div>

		<div id="grouper">
			<div class="strong nth1"></div>
			<div class="strong nth2"></div>
			<div class="strong nth3"></div>
			<div class="strong nth4"></div>
			<div class="strong nth5"></div>
			<div class="end"></div>
		</div>

		<div id="machine-box"></div>
		<div class="vertical one"></div>
		<div class="vertical two"></div>

		<ul class="stripe-stripe one">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

		<ul class="stripe-stripe two">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

	</div> <!-- wrapper -->
	
	<!-- GOOD LUCK! -->

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>