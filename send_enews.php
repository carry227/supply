<? include("function.php");?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style>body,td,tr{font-size:9pt}</style>
</head>
<body bgcolor="#FFCC66" text="#000000">

<? 


    $sql_1 = "select distinct mobile from e_news";
    $rs_1 = get_pg_result($sql_1);
    $rs_rowmax_1 = pg_num_rows($rs_1);

   for ($i = 0;$i< $rs_rowmax_1;$i++){
   $data_1 = pg_fetch_object($rs_1,$i); 
   	
    $sql_2 = "select class_code3  from e_news where mobile = "."'$data_1->mobile'"."order by class_code3";
    $rs_2 = get_pg_result($sql_2);
    $rs_rowmax_2 = pg_num_rows($rs_2);

   for ($j = 0;$j< $rs_rowmax_2;$j++){ 
   $data_2 = pg_fetch_object($rs_2,$j);
   
   $sql_3 = "select isbn,p_code,author,bname,language,org_price  from e_news_temp where class_code3 = "."'$data_2->class_code3'"."order by isbn";
    $rs_3 = get_pg_result($sql_3);
    $rs_rowmax_3 = pg_num_rows($rs_3);

if ($rs_rowmax_3 > 0) {

if ($data_1->mobile<>$mobile) {
	$mobile = $data_1->mobile;
    $sending = true ;
	
	$message = '<STYLE>body,td,tr{font-size:9pt}</STYLE>';
    $message.= '<BODY bgcolor="#FFCC66" text="#000000">';
    $message.= '<DIV align="left">登記出售區間：'.date("Y/").(date("m")-1).date("/d")."～".date("Y/m/d").'</DIV>';
    $message.= '<BR>';
	$message.= '<DIV align="right"><EMBED SRC="http://book.supply.com.tw/pic/logo_cname1.swf" width="70" height="35" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#009999" ></EMBED></DIV>';
	$message.= '<DIV align="left"><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:black; padding:1px">'.get_id_answer('member','name','mobile',$mobile).'</font>您好:</DIV>';
    $message.= '<TABLE width="98%" align="center">';
    $message.= '<TR bgcolor="#660000">';
    $message.= '<TH width="12%"><DIV align="center"><font color="#FFFFFF">ISBN</font></DIV></TH>';
    $message.= '<TH width="14%"><DIV align="center"><font color="#FFFFFF">出版商</font></DIV></TH>';
    $message.= '<TH width="10%"><DIV align="center"><font color="#FFFFFF">作者</font></DIV></TH>';
    $message.= '<TH width="42%"><DIV align="center"><font color="#FFFFFF">書名</DIV></TH>';
    $message.= '<TH width="6%"><DIV align="center"><font color="#FFFFFF">語系</font></DIV></TH>';
    $message.= '<TH width="6%"><DIV align="center"><font color="#FFFFFF">原價</font></DIV></TH>';
    $message.= '<TH width="6%"><DIV align="center"><font color="#FFFFFF">售價</font></DIV></TH>';
    $message.= '</TR>';
//    $message.= '</TABLE>';
   }
//    $message.= '<TABLE width="98%" align="center">';
    $message.= '<TR>';
    $message.= '<TD colspan="7" bgcolor="#009966"><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">'.get_class_code3_answer($data_2->class_code3).'</font></TD>';
    $message.= '</TR>';
//    $message.= '</TABLE>';
    for ($k = 0;$k< $rs_rowmax_3;$k++){ 
    $data_3 = pg_fetch_object($rs_3,$k); 
//    $message.= '<TABLE width="98%" align="center">';
    $message.= '<TR>'; 
    $message.= '<TD width="12%"><DIV align="center">'.trim($data_3->isbn).'</DIV></TD>';
    $message.= '<TD width="14%"><DIV align="center">'.trim(get_id_answer('book_publisher','p_name','p_code',$data_3->p_code)).'</DIV></TD>';
    $message.= '<TD width="10%"><DIV align="center">'.trim($data_3->author).'</DIV></TD>';
    $message.= '<TD width="42%"><DIV align="left">'.trim($data_3->bname).'</DIV></TD>';
    $message.= '<TD width="6%"><DIV align="center">'.trim($data_3->language).'</DIV></TD>';
    $message.= '<TD width="6%"><DIV align="center" style="Text-decoration:line-through"><font color="#FF0000">'.trim($data_3->org_price).'</font></DIV></TD>';
    $message.= '<TD width="6%"><DIV align="center"><font color="#0000FF">'.trim(($data_3->org_price)/2).'</font></DIV></TD>';
    $message.= '</TR>';
	
   }  
      } //for 3
	     } //for 2
    if ($sending== true){
    $message.= '</TABLE>';
	$message.= '<DIV align="right"><EMBED SRC="http://book.supply.com.tw/pic/logo_ad1.swf" width="70" height="35" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#009999" ></EMBED><BR>';
	$message.= '<div align="center"><a href="http://book.supply.com.tw/mainframe.htm" target="_blank">進入本站</a></div> ';
	echo $message;
//    echo $mail_to;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=big5\r\n";
    $headers .= "From:usedbook@supply.com.tw";
    $mail_to = trim(get_id_answer('member','email','mobile',$data_1->mobile));
	$subject = "使仆來電腦類二手書電子報".date("m/d");
    //echo $mail_to;
	//$mail_to = 'carry@supply.com.tw';
	mail($mail_to,$subject,$message,$headers);
	
	unset($message);
    $sending = false;
	}

  }//for 1;

//    js_alert("寄信出電子報.");
//	}else{
//    js_alert("寄信出電子報,失敗.");	
//	}
?>

</body>
</html>
