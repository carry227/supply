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
    $cnt_array=file("cnt_bird.txt"); /* �Ncnt.txt�ɮפ��eŪ�J�A��ƫ��A���}�C */
	$cnt = implode("", $cnt_array);
	if ($si_counter_bird <> true) {
	$cnt++;//�֭p�[1
	$cnt_id=fopen("cnt_bird.txt","w"); /* �Ncnt.txt�ɮ׶}�ҡA��ưѼƬ�w */
	fputs($cnt_id,$cnt); /* �N�s���p�Ƽg�J */
	fclose($cnt_id); //�����ɮ�
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
    <td width="60%">�A�ݪ��X�ڬO�Ψ��Ӽt�P���ù���?</td>
  </tr>
  <tr>
    <td><img src="pic/bird2.jpg"></td>
    <td><p>�G�@�I���A��...</p>
      <p>�ڥΪ��OVS�̷s��,24�T.</p>
  </tr>
  <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>�O�o�n�򩱭��n�D���t,�~�|���o�����ɪ��p��.</p>
      <p><font color="#FF0000">�`�N:���Ǥ��v�~��,�|���x�s��_�~.�b�����̱Фj�a�p���ܯu�~.</font></p>
      <p>1.�ХΤ�,���պN���Y���W�観�S��V�r�����B���L�b�Y��.</p>
      <p>2.���k�G�}�����J�鰰�u,�ഫ���P����,�ݦ��L�e������A�Ϯg.</p>
      <p>3.�H�W��ؤ覡,�A�Υ��y,�ߥx�W�ҥ~!(�ЧO�h�çڭ̳гy���g�٩_��)�쵧�̺I�Z����,�ثe��t�u�Ѥ@�اڭ̰�H�L�k�}�Ѫ��X���޳N-�y�T���z,�N��&quot;210&quot;.�бz�N�ӳ���ͦU�O�i�}45��,���q�ͻH�P�a���ҧe����,�Y�O45��,���߱z,�o�OMIT(Made 
        In Taiwan),�Y�O60��,�~�O�æ����Ӫ�����_���G.</p>
      </td>
  </tr>
  <tr>
    <td><img src="pic/bird4.jpg"></td>
    <td><p>�}����...</p>
      <p>�u�n�J��&quot;�ũ��զr&quot;,�Y�O���̪��Ұ���.�Ѧ��i��bill�]�O�@��R���H�h.</p>
      </td>
  </tr>
  <tr>
    <td><img src="pic/bird5.jpg"></td>
    <td><p>�Ұʤ�...</p>
      <p>�}�l�\�e���۵P�ʧ@!</p>
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
    <td><p>������.....</p>
	    
      <p>�|��稭�W���ǹй�z��:�u���쪺��ڡv.....</p>
        <p>�����N,�i�H�n�D�q�\�@.(��t����,���٨S�չL!)</p>
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
    <td width="60%">�����h��~�N�O�A���D�����ӵP�l!</td>
  </tr>
  <tr>
    <td><img src="pic/bird2.jpg"></td>
    <td><p>�S��~�u���@��...</p>
 </tr>
  <tr>
    <td><img src="pic/bird3.jpg"></td>
    <td><p>�A�H�������u������H��?</p></td>
  </tr>
  <tr>
    <td><img src="pic/bird4.jpg"></td>
    <td><p>��! User �^�ӤF!</p>
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
    <td><p>�@���t�T���u���֭ܲC~</p>
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
<input type="button" value="����g" onclick="this.form.way.value='2'; this.form.submit()">
<input type="button" value="�u���g" onclick="this.form.way.value='1'; this.form.submit()">
</form>

</html>
