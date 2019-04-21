<?php

# Copyright (c) 2018, Maximilian Frank (script4all.com) - All rights reserved.
# The Clear BSD License: License in inc/4.php

require('src/db.php');if($_POST['s']==-1){file_put_contents('src/db.php','<?php $u=\''.addslashes($u).'\';$p=\''.addslashes($p).'\';$t=\'\';$sgt=\''.$sgt.'\';$d='.intval($d).';',2);require('src/db.php');}
$dir=dirname($_SERVER['SCRIPT_NAME']);$dir=($dir=='/'?'':$dir).'/';
?><!DOCTYPE html><html><head><meta charset="UTF-8"><title>WebEdit</title>
<meta name="viewport" content="initial-scale=1.0,width=device-width,user-scalable=yes,viewport-fit=contain">
<meta name="application-name" content="WebEdit">
<meta name="theme-color" content="#<?=$d?'FFF':'222'?>">
<link rel="icon" type="image/svg+xml" href="<?=$dir?>src/icon/svg.svg" sizes="any">
<link rel="shortcut icon" type="image/png" href="<?=$dir?>src/icon/180wh.png">
<link rel="mask-icon" href="<?=$dir?>src/dir.svg" color="#08F">
<link rel="icon" href="<?=$dir?>src/icon/16.png" sizes="16x16">
<link rel="icon" href="<?=$dir?>src/icon/32.png" sizes="32x32">
<link rel="icon" href="<?=$dir?>src/icon/96wh.png" sizes="96x96">
<link rel="icon" href="<?=$dir?>src/icon/114wh.png" sizes="114x114">
<link rel="apple-touch-icon" href="<?=$dir?>src/icon/180wh.png" sizes="180x180">
<link rel="apple-touch-icon-precomposed" href="<?=$dir?>src/icon/144wh.png" sizes="144x144">

<?php if(isset($_POST['t'])&&$_POST['t']==$t&&$t!='')$auth=1;
elseif((isset($_POST['u'])&&isset($_POST['p']))||isset($_GET['sgt'])){
 if((password_verify($_POST['u'],$u)&&password_verify($_POST['p'],$p))||
  ($_GET['sgt']==$sgt&&$sgt!='')){$t=sha1(uniqid());
	file_put_contents('src/db.php','<?php $u=\''.addslashes($u).'\';$p=\''.addslashes($p).'\';$t=\''.$t.'\';$sgt=\''.$sgt.'\';$d='.intval($d).';',2);
	$auth=1;
 }else $auth=-1;
}else $auth=0;

if($auth!=1){?><style>body{color:#<?=$d?'000;':'FFF'?>;background:#<?=$d?'FFF;':'333'?>;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;}
form{position:fixed;top:50vh;left:50vw;transform:translate(-50%,-50%);text-align:center;}
<?=$auth==-1?'@keyframes a{0%{transform:translateX(-1em);}20%{transform:translateX(0em);}
40%{transform:translateX(1em);}80%{transform:translateX(-1em);}to{transform:translateX(0em);}}#gr{animation:a .3s;}
':''?>h1{font-weight:lighter;}
<?=$d?'':'#pCh + label img{filter:invert(1);opacity:.6;}'?>
#pCh:not(:checked) + label:after{position:absolute;content:'';background:#<?=$d?'000':'AAA'?>;
	bottom:-2px;right:11px;transform:rotate(50deg);width:2px;height:25px;}
input[name=u],input[name=p]{border:0;border-bottom:2px solid #AAA;outline:0;width:13rem;
	font:1rem sans-serif;padding:3px;color:#<?=$d?'000':'DDD'?>;background:none;}
input[name=u]:focus,input[name=p]:focus {border-bottom:2px solid #<?=$d?'000':'FFF'?>;}
input[type=submit]{margin:0;padding:.5em;font:inherit;color:#<?=$d?'333':'DDD'?>;
	background:#<?=$d?'DDD':'555'?>;border:2px solid #<?=$d?'DDD':'555'?>;
	transition:background .1s;} input[type=submit]:hover{background:none;}</style>
</head><body<?=$_POST['s']==-1||$t!=''?' onload="alert(\''.($_POST['s']==-1?'Successfully logged out':'Please log out next time. Otherwise some browsers can restore sessions.').'\');"':''?>>

<form name="f" action="" method="post"><h1>WebEdit</h1>
<?=($auth==-1?'<div id="gr">':'')?><input type="text" name="u" placeholder="Username" autocomplete="username" autofocus><br><br>
<input type="password" id="p" name="p" placeholder="Password" autocomplete="current-password"><small style="position:absolute;transform:translate(6px,7px);"><input style="display:none;" type="checkbox" id="pCh" onClick="document.getElementById('p').type=this.checked?'password':'text';" checked /><label for="pCh"> <img src="<?=$dir?>src/eye.svg"></label></small><?=$auth==-1?'</div>':'<br>'?><br><br>
<input type="submit" name="l" style="width:13rem;" value="Login"></form>
<?php }else{?>

<style>body{margin:0;padding:0;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;
	overflow:hidden;color:#<?=$d?'000':'DDD'?>;background:#<?=$d?'FFF':'333'?>;}
nav{display:inline-block;height:100vh;width:10rem;background:#<?=$d?'DDD':'111'?>;box-shadow:0 0 3px #0008;}
#nav{margin:0;padding:0;height:calc(100vh - 9em);overflow:overlay;
	box-shadow:0 -1em 1em -1em #<?=$d?'0003':'FFF2'?> inset;}
#nav li{list-style:none;padding:.5em;} #nav li:not([onclick]):hover{background:none;}
<?php if($d){?>#low{border-top:1px solid #EEE;} #low td:not([colspan]){background:#CCC;}
#low td:hover,#nav li:hover{background:#EEE;}
<?php }else{?>#low{border-top:1px solid #333;} #low td:not([colspan]){background:#222;}
#low td:hover,#nav li:hover{background:#444;}
<?php }?>#low{width:100%;height:9em;border-collapse:collapse;table-layout:fixed;}
#low td:not([colspan]){text-align:center;vertical-align:center;}
#low td[colspan]{padding:.5em;}
main{display:inline-block;width:calc(100vw - 10rem);height:100vh;position:absolute;
	top:0;left:10em;right:0;bottom:0;overflow:overlay;padding:1em 1.5em;
	box-sizing:border-box;}
h1{font-weight:lighter;margin:0 0 2rem 0;} small{color:#888;} ul{list-style:square;}
input[type=text],textarea{color:inherit;font:inherit;background:#FFF1;padding:.2em;
	border:1px solid #<?=$d?'DDD':'555'?>;}
button,select{cursor:pointer;color:inherit;font:inherit;font-size:.9em;background:#FFF2;
	border-radius:.4em;border:1px solid #<?=$d?'BBB':'666'?>;}
select{appearance:unset;-webkit-appearance:unset;padding:.2em .4em;padding-right:1.5em;
	background:url(<?=$dir?>src/down.svg) center no-repeat;
	background-position-x:calc(100% - .5em);}
a{cursor:pointer;text-decoration:underline;color:inherit;}
small a{text-decoration:none;} a:hover{color:#888;text-decoration:underline;}
hr{border:0;background:#<?=$d?'DDD':'888'?>;height:1px;}
details summary{cursor:pointer;} details summary::-webkit-details-marker{color:#AAA;}
details > div{padding:1em 2em;}
input[type=checkbox]{-webkit-appearance:none;-moz-appearance:none;appearance:none;
	background:#<?=$d?'CCC':'888'?>;display:inline-block;position:relative;width:31px;
	height:16px;margin:0 0 -3px 0;border-radius:10px;transition:background .4s ease;}
input[type=checkbox]:before{content:'';position:absolute;left:2px;background:#FFF;top:2px;
	width:12px;height:12px;border-radius:8px;transition:left .4s ease;}
input[type=checkbox]:checked{background:#0C0;}
input[type=checkbox]:checked:before{left:calc(100% - 14px);}
.help{display:inline-block;width:1em;height:1em;color:#888;border:1px solid #888;
	border-radius:100%;line-height:1em;text-align:center;}
.help:hover{color:#<?=$d?'000':'FFF'?>;border:1px solid #<?=$d?'000':'FFF'?>;text-decoration:none;}
</style>
<script>function $(e){return document.getElementById(e)||document.querySelectorAll(e);}
function xhr(l,p){var x=new XMLHttpRequest(),dt=new FormData();p.t='<?=$t?>';
 x.open('POST','<?=$dir?>xhr/'+l+'.php',0);for(d in p){dt.append(d,p[d]+'');}
 x.send(dt);return x.responseText;}
function link(l){open(l,'_blank').focus();}
function page(s,e){$('#post input')[0].value=s;for(k in e){
 $('post').insertAdjacentHTML('beforeend','<input type="hidden" id="now" name="" content="">');
 $('now').setAttribute('name',k);$('now').setAttribute('value',e[k]);
 $('now').removeAttribute('id');}$('post').submit();}</script></head>
<body><nav><ul id="nav"><?php require('src/menu.php');?></ul>
<table id="low"><tr><td colspan="2" onclick="page(0);">Files</td></tr>
<tr><td colspan="2" onclick="page(1);">Editor</td></tr>
<tr><td colspan="2" onclick="page(2);">Menus</td></tr>
<tr><td title="Settings" style="font-size:1.7em;padding-bottom:.1em;" onclick="page(3);">⚙︎</td><td title="Logout" style="font-size:1.3em;" onclick="page(-1);">⎋</td</tr></table></nav>

<main><?php if(!isset($_POST['s'])&&file_exists('site/index.php')){$_POST['s']=5;$_POST['i']='index.php';}
require('inc/'.(isset($_POST['s'])&&in_array(intval($_POST['s']),[0,1,2,3,4,5])?$_POST['s']:0).'.php');?></main>

<form action="<?=$dir?>" method="post" id="post"><input type="hidden" name="s"><input type="hidden" name="t" value="<?=$t?>"></form><?php }?></body></html>