<? include("function.php");?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "���˦n��";
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
      <td width="10%"><div align="right">���ˤH:</div></td>
      <td width="40%"><input type="test" name="send_man"></td>
    </tr>
    <tr> 
      <td><div align="right">�B�ͫH�c:</div></td>
      <td><textarea name="email_list" cols="46" rows="10"></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
            <td><div align="left"><p><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">�Y�P�ɶ�g�h��email�A�ХH<font color="#FF0000">�����j�}</font>�A���¡I</font></p></div></td>
    </tr>
	<tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="�H�X"> <input type="reset" name="Submit2" value="�M��"></td>
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
	$subject = "�q�����G���(�n��:".$send_man."����)";
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
				<p>�Я����ѡG</p>
				</td></tr> 
	            </table> 
				<table width="95%" border="0" class="hellobox" align="center">
                <tr><td>
                <p><font face="�s�ө���, �з���">�C�ӤH�����]������A�W�ҩΤu�@�ݭn�ӶR�L�ѡC���A�ڲ`��a��|��G�@���z�ʶR���ʾ������A��z�Ө��A�o���Ѫ�����Y���s�I�o�O�@��H�ҵL�k��{���ƹ�A�]���@��H�q�`�u�N�L�̩��ʶR�����y����ܮ��d�A���ܦA���ݭn�ɤ~�S���ΡC</font></p>
                </td></tr>
	            <tr><td>
                <p><font face="�s�ө���, �з���">�ھڧڭ̩�˲έp�A���E���H�W�����y�b�z���h�ʶR�ʾ��������A���N�u��`�î��d�A���Ʀ~�᪺�j�����A���X�ӥ��C�o��M���O�@�Ӳz�ʪ��M���A�@�Ӳz�ʪ��H���ө��զۤv���ݨD�A�]���Ӫ��D�ݨD�|�H�ɪŦӪ����P���A�o�����A�A�����b�ۤv���ܻݨD���P�ɡСЭ��C�����]�X��ѥ��^�C���O�I�b�z�ʶR�ʾ������ɡA�ӥ��ѹ�z�Ө��O�t��ӫD���ȡC�ҥH�бz�[�H�ڭ̡A���ڭ̺ܺɩү�a�N�z���t���ഫ���@���i�[�����ȡC</font></p>
                </td></tr>
                </table>
    			<table width="95%" border="0" class="hellobox1" align="center" >
				<tr><td>
				<p>�j�������ҡG</p>
				</td></tr> 
	            </table>
				<table width="95%" border="0" class="hellobox" align="center">
				<tr><td>
                <p><font color="#000000"  face="�s�ө���, �з���">�e�L�Ѩ���ذӳ��[��q�����G��ѡA�Ӯa���C�����y�h�b�L�ɡA���ʻ��̦h�X��G��]���j�����O�ʤ��H�U����^�A�X���������C�o�O�X�z���q���覡�A�u�]���a���Ө����P�����I�A�o���������I�ڭ�������ڭ̪����A��M�ұo���Q�q���k�ݽ��C��観�@�Ӧn���ҡA�N�ണ�ѧ�h��s���ӫ~�A�R��h�]��h����ܤΧ�K�Q�����Ҧ���Q�A�b�o�䤤�ڭ̹�b�S��������n�D���@�����S�C�ڭ̪����S�u���۩󭰧C��������������A������I�C</font></p>
                </td></tr>
                </table>				                
				<div align="right"><embed src="http://book.supply.com.tw/pic/logo_ad1.swf" width="125" height="50" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#009999" ></embed></div> 
                <div align="center"><a href="http://book.supply.com.tw/mainframe.htm" target="_blank">���[����</a></div> 
				</body> 
                </html> ';
	
	$headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=big5\r\n";
    $headers .= "From:usedbook@supply.com.tw";
	
	mail($mail_to,$subject,$message,$headers);
    js_alert("�P�±z����������,�ڭ̤w�̱z�����ܱH�H���z���B��.");
	}else{
    js_alert("�`�N,�z��������ˤH�ΪB�ͫH�c�~�i�H�H.");	
	}
?>
</body>
</html>
