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
    $cnt_array=file("cnt_e01.txt"); /* �Ncnt.txt�ɮפ��eŪ�J�A��ƫ��A���}�C */
	$cnt = implode("", $cnt_array);
	if ($si_counter_e01 <> true) {
	$cnt++;//�֭p�[1
	$cnt_id=fopen("cnt_e01.txt","w"); /* �Ncnt.txt�ɮ׶}�ҡA��ưѼƬ�w */
	fputs($cnt_id,$cnt); /* �N�s���p�Ƽg�J */
	fclose($cnt_id); //�����ɮ�
	$si_counter_e01 = true;
	}
?>
<body bgcolor="#FFFFCC">
<div align="center"><font color="#0000FF">��M�C���]�@�^</font> </div>
<table width="100%" border="0" class= "hellobox">
  <tr> 
    <th align="center"></td>
  </tr>
  <tr> 
    <td><p>�o�ӥ@�ɤW�A�u�����̨θѶܡH <br>
        �p��P�p�M�O���u�{�Ѫ��A���e�p�M���g�t�ʹL�@�ӹj���Z���k�P�Ǣ��A�N��Ҧ��t�ʪ��G�Ƥ@�ˡA�S�����G�C���Ӧ~�N�y��L�\�@���]�j�b���W���@��÷�l�A�_�F����@��N��{�^�A�ڴN�Щj�j���ڰ��@���A�]�������W���\�@�����Ӳʧ��A�ݰ_�ӹ��O�a�F�T���l��]���@�L�l�A���ɧگu�h�è��O���O�����u�窺���ơC�ӧڪ��@��O�Ʊ�o��ּ֡A�u�n�o�P�쩯�֡A�ڪ�÷�l�|�i�D�ڪ��A�Ӥ@�����G�Ƥ]�Ѧ��}�l�C
        <br>���ѡA�@�p�����U�Z����M���e�p��^�a�A�b�^�a�����~�W�A�ڧi�D�p��ڭn�e�o�@��§���C
		<br>�o�h�ê��ݬݧڡA�]���o�ݤ���ڨ��W������§���A�N�ݧڡG�u�쩳�n�e���򵹦o�v�C
		<br>
        �ڦ^���G�u§���b�ڨ��W�A�i�H�����ΡA�]�i�H���L�ΡC���L�Y�A�Q����o��§���A�N�����b�ڰe§�ɳ��W�����v�C <br>
        �o�����ߪ����U�k�ߡA�Ʊ����@�I�ﵷ����A�L������o�}�l�H�q�D�D�D�C
		<br>�Ѫũ��M�U�_�@�}�ήɫB�A�ڥu�n��o�e�^�a�A�U����o�ݧڡG�u§���O�v�H
		<br>�ڻ��G�u�U���a�A�]���o�˪��Ѯ�A��ڰe§���߱����庶�F�D�D�D�v�C
		<br>�b���ਭ����n���}�ɡA�o���M���ڪ���A�n�ڻ��֧�§�����o�C
		<br>��ۦo��w�������A�ڪ��D���Ѥ��e�O�^���F�a�F�D�D�D�C
		<br>�ڥ��Y��ѡA�B�٨�����C
		<br>�߹D���D�Ѥѭn�ڡy����ơA���鲦�z�ܡD�D�H�n�a�A�ڥu�n�����ѩR�C
		<br>���L�Q�Q�b�o�a���f�A�`�O���Ӧw�ߡC
		<br>�]����������A�C���e�o�^�a�A�`�O�߯�����A�ӥB�V�a��o�a�V����C
		<br>���طPı���O�Q��������w�����ۦb�A�ҥH�ګ�ĳ�X�B�����F�Ӧa��Ф���C 
        <br>�줽�餧��A��F�@���u�������ҡA�ڬݨ��Ǫ�����¥��A��O�ڿ�ܴȤl�k�觤�U�A�o�w�w���}�f�ݡG�u§���O�v�H
		<br>�ڲ`�`���R�F�@�f��A���Y��o���G�u�ǳƦn�F�ܡv�H
		<br>�o�L�I�Y�A�ڽЦo���W�����A�o���I�S�ݤ��M�A����ਭ�����h�ɡA�o���W�F�����C
		<br>�ڰ��W�q�f�U���X�Щj�j��}�L���ĤG�N�\�@���A�N���Сi�z���T���j�C
		<br>�ܻ���쬰���a�W�����ӲĤ@�N�A�ݦ��Ӥp�A�񥫭��W�c�檺�b�|�����p�F�T�����G�C�b�ڸۼ��������\�@��A�K�N�\�@���j�ڪ��}�W�A�M�ạ�����ݬݳo�ӨS���L�ѹةR���p�E��C�߷Q�i�ण�ΤT�ѡA���N�|�o�쩯�֡A���O�Ĥ@�ӤT�ѹL�h�F�A�ĤG�ӤT�ѹL�h�F�D�D�D�Q�ӤT�ѳ��L�h�F�A������٦n�n�����ۡC
		<br>�ڰl�ݩj�j����٨S�_�A�j�j�o�N���i�D�ڡG�u���O�o���H�V�@�H��ģ���N��@�v�C�N���Сi�Ӥ����y�j�C
		<br>��ť�W�r�ڴN���D���D�X�b���F�D�D�D�A���L�]�u��Ǧۤv�ۧ@�o���A���J���D���H���ӴN�e���_�C
        <br>�]�����D���o�@�ͪ����֡A�|���|�N�_�e�b�ڸ}�W�C
		<br>�g�L�F�@�~�h�A�����L�F�@�ʤT�Q�ӤT�ѡA�i�Ӥ����y�j���}�F�ڡC�ƫ�ڴ��Q�L�o�����y��������]�A�ӳo�ӭ�]�]�����F�ĤG���\�@���D�D�D�C
		<br>�]���ĤG���\�@���n�}�u�e�A�گS�O�V����j�j�Q�׳o�Ӯפl�����V�A�j�աy���ݤ����Ρz���]�p�z���C
		<br>�ڭǸg�L�h���F�L���t�A�j�j�צb�i�z���T���j�������c�Q�W�P����o�@�ѡC
		<br>��ڮ��ۡi�z���T���j�b�p�⭱�e�ɡA�ڧi�D�o�G�u�i�H���}�����F�v�C
		<br>�o��o���I���j�A�ݨ�F�i�z���T���j�A�o���������I�x���C
		<br>���B�|�B�T�B�G�B�@�A�p��C�|�����F�C
		<br>�ڹ�ۤv���G�u�@�����٦b�p�����v�C
		<br>�ڷŬX����o���G�u��_�A��L���l�D�̡A�گ൹����b���h�A�N���ڵ��A�@���@��A�ڱN�ɤO���A�����A���ȬO�n�ר�@���v�C
		<br>�b�o�\���M���e�A�ڽЦo�\�@���@��A�M��˦۬��ڸj�b���}�W�C
		<br>���ɧڭ˦��I��ߡi�z���T���j�A�|���|�N�b�o����ô���ɭԴN��ѤF�C�o�]�O�ڬ�����ڭn�D�Ȥl�k�䧤����]�C
		<br>�����ڥi��O���b�Ӥ��ˡA�������@�����S�ʬO�ڤ@��y�N�A�����ܮz�ڤӲM���F�A�ӦѪ��ର�������N�u���׭��C
		<br>�ߤ��t��ë�i�A���ڡI�бz�h���i�z���T���j�@�I�ɶ��A�D�z�d�U���n�����b����ˤU�ӡC
		<br>��M�ƫ��ҩ��ڬO�h�{���A�]���i�z���T���j�~�M���ڪ���l��i�Ӥ����y�j�[�C
		<br>�ӥ��̪����D���X�b�D�D�D�A�j�j�s�@���F��A�}�v��b�ӧC�F�C</p></td>
  </tr>
  <tr> 
	<td align="right">�z�i��<a href="/dobbook/index.php">�d���O</a>�A��<a href="mailto:usedbook@supply.com.tw">�H�H</a>���ڭ̱z�_�Q���N���I</td>   
  </tr>
    <tr> 
     <td align="right">�H�W�峹��<a href="index.php">�Ϥ��ӹq�����G���</a>���ѡA���G�ƹw�p�X�T���C</td>
  </tr>
</table>
</body>
</html>
