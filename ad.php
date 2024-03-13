<? include("variable.php")?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ad</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style10.css" type="text/css">
<style>
.hellobox{
line-height:16px;
font-weight:200;
text-decoration:Blink;
}  
</style>
</head>
<?php
    $cnt_array=file("cnt_bird.txt"); /* 將cnt.txt檔案內容讀入，資料型態為陣列 */
	$cnt = implode("", $cnt_array);
	if ($si_counter_bird <> true) {
	$cnt++;//累計加1
	$cnt_id=fopen("cnt_bird.txt","w"); /* 將cnt.txt檔案開啟，函數參數為w */
	fputs($cnt_id,$cnt); /* 將新的計數寫入 */
	fclose($cnt_id); //關閉檔案
	$si_counter_bird = true;
	}

	//$cnt = fill_value($cnt,6,"L",0);
	$l = strlen($cnt);
	for ($i = 0; $i < $l; $i++){
		$num = "n".substr($cnt, $i, 1);
    	echo "<img src = /pic/".$num.".gif width =15 hight = 15>";
	}
?>
<body bgcolor="#FFCC66" text ="#000000">
<? if (empty($way)) $way = 2;?>
<? if ($way == 1) {?>

<table width="100%" border="0" class = "hellobox">
  <tr>
    <td width="40%"><img src="pic/bird1.jpg"></td>
    <td width="60%">你看的出我是用那個廠牌的螢幕嗎?</td>
  </tr>
  <tr>
    <td><img src="pic/bird2.jpg"></td>
    <td><p>亮一點給你看...</p>
      <p>我用的是VS最新型,24吋.</p>
  </tr>
  <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>記得要跟店員要求全配,才會有這隻高檔的小鳥.</p>
      <p><font color="#FF0000">注意:有些不肖業者,會給台製仿冒品.在此筆者教大家如何辨示真品.</font></p>
      <p>1.請用手,順勢摸鳥頭正上方有沒有V字型的浮水印在頭頂.</p>
      <p>2.左右二腳有坎入仿偽線,轉換不同角度,看有無呈紫色光澤反射.</p>
      <p>3.以上兩種方式,適用全球,唯台灣例外!(請別懷疑我們創造的經濟奇蹟)到筆者截稿為止,目前原廠只剩一種我們國人無法破解的訪偽技術-『三角』,代號&quot;210&quot;.請您將該鳥兩翅各別展開45度,測量翅膀與地面所呈夾角,若是45度,恭喜您,這是MIT(Made 
        In Taiwan),若是60度,才是紐西蘭來的黃色奇異果.</p>
      </td>
  </tr>
  <tr>
    <td><img src="pic/bird4.jpg"></td>
    <td><p>開機時...</p>
      <p>只要遇到&quot;藍底白字&quot;,即是它們的例假日.由此可知bill也是一位愛鳥人士.</p>
      </td>
  </tr>
  <tr>
    <td><img src="pic/bird5.jpg"></td>
    <td><p>啟動中...</p>
      <p>開始擺牠的招牌動作!</p>
      <p>pose1</p></td>
  </tr>
  <tr>
    <td><img src="pic/bird6.jpg"></td>
    <td>pose2</td>
  </tr>
  <tr>
    <td><img src="pic/bird7.jpg"></td>
    <td>pose3</td>
  </tr>
   <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>完成後.....</p>
	    
      <p>會拍拍身上的灰塵對您說:「它抓的住我」.....</p>
        <p>不滿意,可以要求從擺哦.(原廠說的,我還沒試過!)</p>
      <p>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="200" height="77">
          <param name="movie" value="pic/test1.swf">
          <param name="quality" value="high">
          <embed src="pic/test1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="77"></embed></object>
      </p>
      </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<? }elseif ($way==2) {?>

<table width="100%" border="0" class = "hellobox">
  <tr>
    <td width="40%"><img src="pic/bird1.jpg"></td>
    <td width="60%">不用懷疑~就是你知道的那個牌子!</td>
  </tr>
  <tr>
    <td><img src="pic/bird2.jpg"></td>
    <td><p>沒錯~只有一隻...</p>
 </tr>
  <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>你以為裁員只有裁到人嗎?</p></td>
  </tr>
  <tr>
    <td><img src="pic/bird4.jpg"></td>
    <td><p>啊! User 回來了!</p>
      </td>
  </tr>
  <tr>
    <td><img src="pic/bird5.jpg"></td>
    <td><p>..........</p></td>
  </tr>
  <tr>
    <td><img src="pic/bird6.jpg"></td>
    <td>..........</td>
  </tr>
  <tr>
    <td><img src="pic/bird7.jpg"></td>
    <td>..........</td>
  </tr>
   <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>一隻演三隻真的很累耶~</p>
      <p>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="200" height="77">
          <param name="movie" value="pic/test1.swf">
          <param name="quality" value="high">
          <embed src="pic/test1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="77"></embed></object>
      </p>
      </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<? }?>
</body>
<form action="http://book.supply.com.tw/ad.php" method="post">
<input type="hidden" name="way">
<input type="button" value="景氣篇" onclick="this.form.way.value='2'; this.form.submit()">
<input type="button" value="真偽篇" onclick="this.form.way.value='1'; this.form.submit()">
</form>

</html>
