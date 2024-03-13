<? include("../variable.php")?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style>
.hellobox{
color:bule;
padding:1px;
letter-spacing:3px;
line-height:24px;
font-weight:300;
font-size:16px
}  
</style>
</head>
<?php
    $cnt_array=file("cnt_e03.txt"); /* 將cnt.txt檔案內容讀入，資料型態為陣列 */
	$cnt = implode("", $cnt_array);
	if ($si_counter_e03 <> true) {
	$cnt++;//累計加1
	$cnt_id=fopen("cnt_e03.txt","w"); /* 將cnt.txt檔案開啟，函數參數為w */
	fputs($cnt_id,$cnt); /* 將新的計數寫入 */
	fclose($cnt_id); //關閉檔案
	$si_counter_e03 = true;
	}
?>
<body bgcolor="#FFFFCC">
<div align="center"><font color="#0000FF">凌和遊戲（三）</font> </div>
<table width="100%" border="0" class= "hellobox">
  <tr> 
    <th align="center">尚未推出</td> </tr>
  <tr> 
    <td></td>
  </tr>
  <tr> 
	<td align="right">您可至<a href="/dobbook/index.php">留言板</a>，或<a href="mailto:usedbook@supply.com.tw">寄信</a>給我們您寶貴的意見！</td>   
  </tr>
    <tr> 
     <td align="right">以上文章由<a href="index.php">使仆來電腦類二手書</a>提供，本故事預計出三集。</td>
  </tr>
</table>
</body>
</html>
