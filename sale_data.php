<? include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "建賣書資料(step 1/3)";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">

<?php
  if (check_logon() == 0) {
      js_alert("您未登入,請先登入才可建立出售資料!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
 ?>

 <script language="JavaScript1.2">               
<!--              
//Secify scroller contents               
var line=new Array()               
line[1]="本站只收受具ISBN編號的書籍，"               
line[2]="請您輸入ISBN編號後，再按「下一步」。"
//Specify font size for scoller               
var ts_fontsize="12px"               
               
//--Don't edit below this line               
               
var longestmessage=1               
for (i=1;i<line.length;i++){               
if (line[i].length>line[longestmessage].length)               
longestmessage=i               
}               
               
//Auto set scroller width               
var tscroller_width=line[longestmessage].length*3              
               
lines=line.length-1 //--Number of lines               
               
//if IE 4+ or NS6               
if (document.all||document.getElementById){               
document.write('<form name="bannerform">')               
document.write('<input type="text" name="banner" size="'+tscroller_width+'"')               
document.write('  style="background-color: '+document.bgColor+'; color: #0000FF; font-family: tahoma; font-size: '+ts_fontsize+'; border: medium none" onfocus="blur()">')               
document.write('</form>')               
}               
               
temp=""               
nextchar=-1;               
nextline=1;               
cursor="\\"               
function animate(){               
if (temp==line[nextline] & temp.length==line[nextline].length & nextline!=lines){               
nextline++;               
nextchar=-1;               
document.bannerform.banner.value=temp;               
temp="";               
setTimeout("nextstep()",3000)}               
else if (nextline==lines & temp==line[nextline] & temp.length==line[nextline].length){               
nextline=1;               
nextchar=-1;               
document.bannerform.banner.value=temp;               
temp="";               
setTimeout("nextstep()",5000)}               
else{               
nextstep()}}               
               
function nextstep(){               
               
if (cursor=="\\"){               
cursor="||"}               
else if (cursor=="||"){               
cursor="//"}               
else if (cursor=="//"){               
cursor="--"}               
else if (cursor=="--"){               
cursor="\\"}               
               
               
nextchar++;               
temp+=line[nextline].charAt(nextchar);               
document.bannerform.banner.value=temp+cursor               
setTimeout("animate()",200)}               
               
//if IE 4+ or NS6               
if (document.all||document.getElementById)               
window.onload=animate               
// -->               
</script> 

<form action="sale_data0.php" method="get" name="from1" onsubmit="return validate(this)"><table width="29%" border="1" cellpadding="0" cellspacing="0">
<script language="JavaScript" src="../js/checkfield.js"></script>
<script language="javascript">
function validate(form) {
 // check 
 if (!checkisbn(form.isbn)) return false;
 return true; 
checkoption
}
</script>
<br> 
  
      <td width="15%">ISBN:</td>
    <td width="56%"><input name="isbn" type="text" size="20" maxlength="10"></td>
	<td width="29%"><input type="submit" name="Submit" value="下一步"></td>
  </tr>
</table>
</form>
</body>
</html>
