<? include("function.php");?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "推薦好友";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66" text="#000000">
  
<table width="85%" border="0"  >
  <tr> 
    <td width="10%"><div align="left"></div></td>
    <td width="40%" align="center"><div align="left"> 
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="350" height="80">
          <param name="movie" value="pic/logo_ad2.swf">
          <param name="quality" value="high">
          <embed src="pic/logo_ad2.swf" width="350" height="80" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object>
      </div></td>
  </tr>
</table>
<form name="form1" action="<?php echo $PHP_SELF; ?>" method="post">
  <table width="85%" border="0" align="left">
    <tr> 
      <td width="10%"><div align="right">推薦人:</div></td>
      <td width="40%"><input type="test" name="send_man"></td>
    </tr>
    <tr> 
      <td><div align="right">朋友信箱:</div></td>
      <td><textarea name="email_list" cols="46" rows="10"></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
            <td><div align="left"><p><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">若同時填寫多個email，請以<font color="#FF0000">分號隔開</font>，謝謝！</font></p></div></td>
    </tr>
	<tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="寄出"> <input type="reset" name="Submit2" value="清除"></td>
    </tr>
  </table>
<?

if (substr($email_list,strlen(trim($email_list)) - 1,1) <> ';') $email_list = trim($email_list) .';'; 

$email = $email_list;

while (trim($email) <>''){
	$email = trim(substr($email_list,0,strpos($email_list,";")));
	$email_list = trim(substr($email_list,strpos($email_list,";")+1));
	$el .= $email .',';
}
$email_list = trim(substr($el,0,strlen($el)-1));

?>
</form>
<?php 


    if (!((empty($send_man)) or (empty($email_list)))){
    $mail_to = $email_list; 
	$subject = "電腦類二手書(好友:".$send_man."推薦)";
	$message = '<html> 
                <head>
				<style>
              .hellobox{
                color:#000000;
                padding:1px;
                FILTER:glow(color=#FFFFFF,strength=2);
				font-size = 10pt;
                letter-spacing:3px;
                line-height:24px;
                font-weight:300;
                text-decoration:Blink;
                }  
                </style>
				<style>
              .hellobox1{
                color:red;
                padding:1px;
                FILTER:glow(color=#FFFFFF,strength=2);
				font-size = 12pt;				
                letter-spacing:3px;
                line-height:24px;
                font-weight:300;
                text-decoration:Blink;
                }  
                </style>
				</head> 
	            <body bgcolor="#009999">
    			<table width="95%" border="0" class="hellobox1" align="center" >
				<tr><td>
				<div align="right"><embed src="http://book.supply.com.tw/pic/logo_cname1.swf" width="125" height="50" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#009999" ></embed></div> 
				</td></tr>
				<tr><td>
				<p>創站源由：</p>
				</td></tr> 
	            </table> 
				<table width="95%" border="0" class="hellobox" align="center">
                <tr><td>
                <p><font face="新細明體, 標楷體">每個人都曾因為興趣，上課或工作需要而買過書。但，我深刻地體會到：一旦您購買的動機消失，對您而言，這本書的價格即為零！這是一般人皆無法體認的事實，因為一般人通常只將他們所購買的書籍收放至書櫃，直至再次需要時才又取用。</font></p>
                </td></tr>
	            <tr><td>
                <p><font face="新細明體, 標楷體">根據我們抽樣統計，有九成以上的書籍在您失去購買動機的瞬間，它就只能深藏書櫃，等數年後的大掃除再拿出來丟棄。這顯然不是一個理性的決策，一個理性的人應該明白自己的需求，也應該知道需求會隨時空而物換星移，聰明的你，必須在自己改變需求的同時－－降低成本（出賣書本）。切記！在您購買動機消失時，該本書對您而言是負擔而非價值。所以請您加人我們，讓我們竭盡所能地將您的負擔轉換成一筆可觀的價值。</font></p>
                </td></tr>
                </table>
    			<table width="95%" border="0" class="hellobox1" align="center" >
				<tr><td>
				<p>大市場環境：</p>
				</td></tr> 
	            </table>
				<table width="95%" border="0" class="hellobox" align="center">
				<tr><td>
                <p><font color="#000000"  face="新細明體, 標楷體">前几天到光華商場觀察電腦類二手書，商家陳列的書籍多半過時，收購價最多出到二折（絕大部分是百元以下成交），出售價約五折。這是合理的訂價方式，只因店家須承受滯銷的風險，這部分的風險我們轉嫁給我們的賣方，當然所得的利益亦歸屬賣方。賣方有一個好環境，就能提供更多更新的商品，買方則因更多的選擇及更便利的環境而獲利，在這其中我們實在沒有任何資格要求分毫的報酬。我們的報酬只源自於降低彼此的交易成本，交易風險。</font></p>
                </td></tr>
                </table>				                
				<div align="right"><embed src="http://book.supply.com.tw/pic/logo_ad1.swf" width="125" height="50" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#009999" ></embed></div> 
                <div align="center"><a href="http://book.supply.com.tw/mainframe.htm" target="_blank">參觀本站</a></div> 
				</body> 
                </html> ';
	
	$headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=big5\r\n";
    $headers .= "From:usedbook@supply.com.tw";
	
	mail($mail_to,$subject,$message,$headers);
    js_alert("感謝您為本站推薦,我們已依您的指示寄信給您的朋友.");
	}else{
    js_alert("注意,您必須填推薦人及朋友信箱才可寄信.");	
	}
?>
</body>
</html>
