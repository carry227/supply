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
    $cnt_array=file("cnt_e02.txt"); /* �Ncnt.txt�ɮפ��eŪ�J�A��ƫ��A���}�C */
	$cnt = implode("", $cnt_array);
	if ($si_counter_e02 <> true) {
	$cnt++;//�֭p�[1
	$cnt_id=fopen("cnt_e02.txt","w"); /* �Ncnt.txt�ɮ׶}�ҡA��ưѼƬ�w */
	fputs($cnt_id,$cnt); /* �N�s���p�Ƽg�J */
	fclose($cnt_id); //�����ɮ�
	$si_counter_e02 = true;
	}
?>
<body bgcolor="#FFFFCC">
<div align="center"><font color="#0000FF">��M�C���]�G�^</font> </div>
<table width="100%" border="0" class= "hellobox">
  <tr> 
    <th align="center"></td>
  </tr>
  <tr> 
    <td><p>��p��N�i�z���T���j��ô��ڪ����}�W��A�ڪ��D�q����}�l�A�ڪ��ӻH�W�h�F���d���C
	    <br> �ڭǪu�ۤp������������B�^���A�p��~�C�C�^�_�o���ߺ��C
        <br>��گ��b�ڪ��������W�ɡA����\��F�Q���C�X�M������M�b�p�⪺�y�e�C
		<br>���M���A�ڲĤ@���P����o�����A�o�ëD���o�������}�G�C
        <br>���Pı���O�h�����s�ݤ�X�P�b�a�ݤ�X�A�P�@�ӤӶ��A�o�����P���_�١D�D�C
        <br>�ѹ껡�A���ӥu�O��ª��e§���A�]���o�@���l�ݡA�ҥH�ڬG�N�޾ɷt�ܦo�A���o�ڭn�k�o����ı�A�]�n��ڰe�F�ӡi�z���T���j�A�[�W�g�媺�s��@�x���~���o�b�P�ʤ��l�A�ѰO��ں�b�C
        <br>��_�ӡA���ɧڭǤ~�橹�T�ӬP���A�ڭ̮a�ڥ@�N�O�u�A�ޱЬ��Y�C�ҥH�橹�e�A�����ȧڹL���i�A�n�گ����F�@���y�橹�i�׭p���z�C
        <br>�����u�B���B���T�ӥؼФΤ@�ӭ�h�A�ؼлP��h��Ĳ�ɵL�ġC
        <br>�u���ؼЬ��դ����w���֡C
        <br>�����ؼЬ��ե~���w���֡C
        <br>�����ؼЬ��կ��W�̪񪺱o���I�֡C
        <br>��h�Y�O��u�u���ܤ��ڡv�C�ӳo�ӭ�h�A�i���O�ڥѭӤH�v�Ѩ��X�Ӫ���n�A�]�����o�⤣��O�H���i�ƪ��ҾڡC
        <br>�u���ܡv����p�p�A�O�o���@���@��H���p�p�y�͡A�{�O�ɡA�ڹ�p�p���G�u�ڪ�§����b�����W�v�C�p�p�H�ڨ������A�ڶ���q�f�U���X�̫�@���C�b�f���}�A�b�ک�}�n�Y���P�ɡA�ڭǥ|�إ�|�A�ڴN��f���}����p�p���e�A�߰ݤp�p�n���n�Y�A��ö��A�p�p�r�F�b�I�f���}�A��۳ѤU���b�I�A�ڪ��p���U�b����J�G�Ӱ��D�A�Ĥ@�o���N�Ϭ���H�ݬݥ|�P�A�]�S�o�{��L�D�D�D�A�ĤG�ڭn�Y�ܡH�@�r���A�ڧϩ��ƨ��Q���Ǫ����СA�H�Y�ڦY�U�h�F�A�ڥu�໡�ڨS������u���ܡv�����P�D�D�D�C
        <br>�u���ڡv�X�ۤp�m�A���Ѥ@�s�B�ͤ@�_�X�h���A�ߤW��x�_�����Y���A�������ڶ}��������p�m�����|�ɧڰe�o�^�a�A�b�j�a�@�@�D�O��A�p�m�ݧڤ��O�n�e�o�^�a�ܡH�ڸ�o��p�A�]���ڨS�M���A�U���A�e�o�n�F�C�S�Q��p�m���n�b�x�_���ڡA�n�ڦ^�a�M���C�ڸ�p�m���ڧ����^�a�A�A�M���즹�n�G�p�ɡC�p�m���S���Y�A�ڰݤp�m�q�x�_�����^��a�n�h�[�A�o�^�����G�p�ɡA�ڴN���R���oť�A�p�G�A�ⵥ�ڨӪ��ɶ��A���h�����A�N�i�H�^��a�F�C�ҥH�ڰe�o�h�����A�ڪ��D�o�O�@�ӽ��Y���M�w�A�]�~���|�X�u���ڡv�C
        <br>�^����A�ڱ�ۦo�������A��o���G�u�ڷQ�k�A�v�C
        <br>�o���I�����ұ��A�إ��¤U�A�M�ᶶ����۾������W�����s�A�ݧڡG�u���O����v�C
		<br>�ڬݤF�@�U�o�ҫ����F��A�߷Q�G�u�گ౵���p��ڵ��A���ڤ��౵���o�k�סv�C
		<br>�H�Y�^���o�G�u��V�O�}���v�A�]�γo���l�̧֪��t�פ@�֧�������k���W���o�ʶs�B�j�O�}���B��z�D�D�D�������Ф@�M�C
        <br>�A���^��ۤp��A�}�f��o���G�u�ڷQ�k�A�v�C
        <br>�u���o���Y�L�L�U�ɡA�R�n���y�D�D�D�C
        <br>���ɧڦ��Q�L�n��o���Y�h���A�k�U�h�C
        <br>���L�o���H���Q�k�u�b�ڸ����r�d�F�T�����A���M�����ѵL�O�P��J�ڤ��Y�A����ı�o�N��ڥκɦY�����O��]�L�k��_�o���Y�A�γ\�O��ı�o�o�٨SReady�a�D�D�D�C
        <br>���[��ڹ�p�⻡�G�u�W���a�A�ڰe�A�^�a�v�C
        <br>�o�S���F�A��ۧڪ����u���n�A�]�S���W�����N��D�D�D�C
        <br>�ڭǴN�o�˻����b���A�Ů�n�����T�F�D�D�D�C
        <br>�p�⥴�}�H�q���G�u�o�ئ��H�v�C
        <br>�ڱ�V�|�P�A�]������ɻE���o��h�H�C
        <br>�H�Y���J�ۤv���H�䤤�A������ڭ̭n�b�N�O�H�H���D�C���n���k�e�A�ڳ��n���y�M���z�ܡD�D�D�H
        <br>�ӫB�w�w�ƤU�A��کԦ^����A�ڲ`�`����V�o�������D�D�D�C
        <br>�B�ե[�j�A���H�Y�ʫP�p�⻰�֤W���C
        <br>��p�^�p��a�~���A�o��ڻ��G�u���O�����A�k�A�u�O�H�Ӧh�F�v�C
        <br>�@����p��a���f�A�B���J�j�A�p��汼�o�������~�M�ɧڡC
        <br>�کڵ��F�D�D�D�A�ڷQ�O�B�A�ڬ۫H�B���i�H���U�ګ�ҡC
        <br>�p��Ź�����ڻ��G�u�U���A�~��a�v�D�D�D�C
        <br>���٨Ӥ��ε��ܡA�p��w�ਭ���a�ض]�C
        <br>��ۦo�����v�A�ڤ]�����D�ڭ̪��Z���O�Ԫ��٬O�Ի��H
		<br>�o�ӥ@�ɤW�A�u�����̨θѶܡH
        <br>�ڬ۫H���A�ӳo���סD�D�D�@����H��A�ڤ~���աC
</p>
</td>
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
