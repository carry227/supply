<?php include('variable.php') ?>
<?php include('function.php') ?>
<html>
<head>
<title>電腦類二手書</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style8.css" type="text/css">
</head>

<body bgcolor="#006699">
<table width="100%" border="0">
  <tr> 
    <td width="15%" height="25"><div align="left"><font color="#FFFFFF"> 
        <?php
    $cnt_array=file("cnt.txt"); /* 將cnt.txt檔案內容讀入，資料型態為陣列 */
	$cnt = implode("", $cnt_array);
	if ($si_counter <> true) {
	$cnt++;//累計加1
	$cnt_id=fopen("cnt.txt","w"); /* 將cnt.txt檔案開啟，函數參數為w */
	fputs($cnt_id,$cnt); /* 將新的計數寫入 */
	fclose($cnt_id); //關閉檔案
	$si_counter = true;
	}

	$cnt = fill_value($cnt,6,"L",0);
	$l = strlen($cnt);
	for ($i = 0; $i < $l; $i++){
		$num = "n".substr($cnt, $i, 1);
    	echo "<img src = /pic/".$num.".gif width =15 hight = 15>";
	}

	//echo "<BR>";
	//echo "來源ip:".$HTTP_SERVER_VARS['REMOTE_ADDR'];	
?>
        </font></div></td>
    <td width="70%"><font color="#FFFFFF"> 
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="560" height="25" align="middle">
        <param name=movie value="pic/menu1.swf">
        <param name=quality value=high>
        <embed src="pic/menu1.swf" width="580" height="25" align="middle" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash">         </embed> </object>
      </font></td>
	  <td width="15%"><iframe frameBorder=no marginHeight=0 marginWidth=0 name=7iframe scrolling=no src="many.php" width="135" height="25"></iframe></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="19%" height="10"></td>
	<td width="81%"><div align="right"><font color="#FFFFFF"> 
        <script language="LiveScript">
<!-- Hiding
  today = new Date()
  document.write("日期：", today.getYear()-1911," / ",today.getMonth()+1," / ",today.getDate());
// end hiding contents -->
</script>
        <script type="text/javaScript">
document.write("<span id='clock'></span>");
var now,hours,minutes,seconds,timeValue;
function showtime(){
    now = new Date();
    hours = now.getHours();
    minutes = now.getMinutes();
    seconds = now.getSeconds();
    timeValue = "時問：";
    timeValue += ((hours < 10) ? "0" : "") + hours + " :"; 
    timeValue += ((minutes < 10) ? " 0" : " ") + minutes + " :";
    timeValue += ((seconds < 10) ? " 0" : " ") + seconds ;
    clock.innerHTML = timeValue;
    setTimeout("showtime()",100);
}
showtime();
</script>
        </font></div></td>
  </tr>
</table>
</body>
</html>
