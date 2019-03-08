<?php if(!$auth)exit;?>
<style>#license{position:fixed;right:2em;bottom:1em;font-size:small;color:#888;
	text-decoration:none;}#license:hover{text-decoration:underline;}</style>
<h1>Settings</h1>

Dark mode: <input type="checkbox" onchange="if(xhr(3,{a:0,i:this.checked?1:0})!=='1'){alert('Error');this.checked=!this.checked;}"<?=$d?'':' checked'?>><br><br>
Backup: <button onclick="location='<?=$dir?>xhr/3.php?t=<?=$t?>&a=3';">Download</button><br><br><hr>

<details><summary>Authentication</summary><div>

<button onclick="alert($('u').value==''||$('p').value==''?'Please input the new authenticaton data':(xhr(3,{a:2,u:$('u').value,p:$('p').value})==='1'?'Authentication data changed':'Error'));">Save</button><br>
<input type="text" id="u" placeholder="New username"><br>
<input type="text" id="p" placeholder="New password"><br><br>

Short-Get-Token: <input type="checkbox" onchange="var re=xhr(3,{a:1,i:this.checked?1:0});if(re.charAt(0)!='['){alert('Error');this.checked=!this.checked;}else{re='<?=$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])?>?sgt='+JSON.parse(re)[0];$('sgtBkmk').href=re;$('sgtBkmk').innerHTML=re;$('sgtLink').value=re;}$('sgt').style.display=this.checked?'block':'none';"<?=$sgt==''?'':' checked'?>>&emsp;<a class="help" onclick="alert('With the Short-Get-Token you can log in automatically. Save the link below as a bookmark. To sign in, simply open the bookmark.');">?</a>

<div id="sgt"<?=$sgt==''?' style="display:none;"':''?>><code><a id="sgtBkmk" href="<?=dirname($_SERVER['SCRIPT_NAME']).'?sgt='.$sgt?>" onclick="return false;" draggable="true" style="cursor:move;"><?=$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'?sgt='.$sgt?></a></code>
<input id="sgtLink" type="text" style="display:none;" value="<?=$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'?sgt='.$sgt?>" disabled><svg width="15" height="20" title="Copy" style="margin-left:1em;transform:translateY(.4em)" onclick="$('sgtLink').style.display='initial';$('sgtLink').select();alert(document.execCommand('copy')?'Link copied':'Error');$('sgtLink').style.display='none';"><style>rect{fill:#<?=$d?'FFF':'333'?>;stroke:#<?=$d?'000':'DDD'?>;stroke-width:2px;width:9px;height:14px;}</style><rect x="1" y="1" rx="2" ry="2" /><rect x="5" y="5" rx="2" ry="2" /></svg> <span style="cursor:pointer" title="Renew" onclick="var re=xhr(3,{a:1,i:1});if(re.charAt(0)!='['){alert('Error');}else{re='<?=$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])?>?sgt='+JSON.parse(re)[0];$('sgtBkmk').href=re;$('sgtBkmk').innerHTML=re;$('sgtLink').value=re;}">↻</span></div>
</div></details><hr>

<details><summary>Additional information</summary><div>
<ul><li>If <code><?=$dir?>site/index.php</code> exists, it will be used as startpage. Otherwise <i>Files</i> remain as startpage.</li>
<li>Menu sites are included into <code><?=$dir?>inc/5.php</code> via PHP require() function.</li></ul></div></details>

<a id="license" onclick="page(4);">License</a>