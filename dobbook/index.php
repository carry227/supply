<?
/*********************************************************************/
//	�{���W�١GDOB_GBOOK�d����1.0
//	�{�����g�G�d���͡]http://www.dob.com.tw�^DOB���u��
//	�q�l�l��Gtad@ms1.url.com.tw
//	���v�n���G�w��ӤH�B�D��Q���ϥΡI
//		  �ǮթΫD��Q��줧�D���i�N���קאּ�K�O�d�����ѤH�ӽСI
//		  �ťΩ�ӷ~�γ~�A�Y���ӷ~�ݨD�ШӫH�i���C
/*********************************************************************/


//�e��Ʈw�]�w��=========================================================
$DB_SERVER="localhost";	 		// �п�J��Ʈw�s�����}
$DB_NAME="book";				// �п�J��Ʈw�W�١i����j
$DB_USER="postgres";				// �п�J��Ʈw�b���i����j
$DB_PASS="";				// �п�J��Ʈw�K�X�i����j
$GBOOK_TBL="gbook";			// �п�J���d�����ҨϥΪ����W��


//�e�����d�������޲z�b���K�X��===========================================
$GB_ROOT="carry";				//�n�J�b���]�i�J�޲z�ɭ��Ρ^�i����j
$GB_PASSWD="carry123";				//�n�J�K�X�]�i�J�޲z�ɭ��Ρ^�i����j
$GB_USER="carry";				//�����d���ʺ١]�d���ɤ~�αo��^�i����j
$GB_USER_EMAIL="carry@supply.com.tw";			//�����q�l�l��]�d���ɤ~�αo��^�i����j
$GB_USER_PIC="image/tad.gif";		//�����M�ݹϤ��]�d���ɤ~�αo��^


//�e�d�����򥻸�Ƴ]�w��=================================================
$WEB="��T���G���";				//�������W�١i����j
$WEB_URL="http://book.supply.com.tw";				//���������}�i����j
$WELCOME_TEXT="�w��d���i�糧������ĳ�j,���d���O�N�󥻯����`��B�Ჾ���I";		//�]���O��r
$TITLE_IMG="";				//�d���������D�Ϥ��y�i���z


//�e�d�����\��ҰʡB������===============================================
$SHOW_TB_LINE="1";			//��ܯd�����u�a0=�����A1=�}�ҡb
$OPEN_MENU_INFO=1;			//��ܿ��T���a0=�����A1=�}�ҡb
$USE_HTML=0;				//�}��ϥ�HTML�y�k�a0=�����A1=�}�ҡb
$PAGE_SHOW_LIMIT="15";			//�C����ܯd���ƥ�


//�e���D�Ϫ������]�w��===================================================
$WELCOME_TEXT_COLOR="#FF00FF";		//�]���O����r�C��
$TITLE_BG_COLOR="#ffffff";		//���D����]�w
$TITLE_BG_IMG="";			//���D���ϳ]�w�y�i���z
$SCROLL_MODE="slide";			//�]���O�Ҧ���ܡaalternate=���k�\�Bscroll=�k�ܥ��Bslide=�u���@���b

//�e�d���������i���]�w��=================================================
$PAGE_FONT_SIZE="9";			//�d������r�j�p
$PAGE_BG_IMG="";			//�d�������ϡy�i���z
$PAGE_BG_COLOR="Beige";			//�d��������
$GUESTBOOK_WIDTH="94%";			//�d�������e��
$GUESTBOOK_ALIGN="center";		//�d��������m�aleft=���Bcenter=���Bright=�k�b
$TB_LINE_COLOR="#abc686";		//�d�����u���C��
$TD_COLOR_1="#ffffde";			//�d�����e�Ĥ@�ة���]�w
$TD_COLOR_2="#ffffee";			//�d�����e�ĤG�ة���]�w�]�o��ة���|�椬�X�{�^


//�e�u������s�B�Ϥ��]�w��=============================================
$TOOL_BG_COLOR="#C0B89A";		//�u���檺����]�w
$TOOL_BG_IMG="image/menu_bg.jpg";	//�u���檺���ϳ]�w�y�i���z
$PIC_RE="image/re.gif";			//�u�^�Яd���v�Ϥ�
$PIC_BACK="image/back.gif";		//�u�^�W���v�Ϥ�
$PIC_GO="image/go.gif";			//�uGO�v�Ϥ�
$PIC_SEARCH="image/search.gif";		//�u�j�M�v�Ϥ�
$PIC_SORT_NAME="image/sort_name.gif";	//�u�m�W�Ƨǡv�Ϥ�
$PIC_SORT_DATE="image/sort_date.gif";	//�u����Ƨǡv�Ϥ�
$PIC_LOGOUT="image/logout.gif";		//�u�n�X�޲z�v�Ϥ�
$PIC_LOGIN="image/admin.gif";		//�u�����޲z�v�Ϥ�
$PIC_ADD="image/add.gif";		//�u�ڭn�d���v�Ϥ�
$PIC_EZ_MENU="image/normal.gif";	//�u²���u��v�Ϥ�
$PIC_ADV_MENU="image/adv.gif";		//�u�i���u��v�Ϥ�
$PIC_LOCK="image/lock.gif";		//�u�����ܡv�Ϥ�


//���]�w
$FACE_IMG=array(
"����"=>"$GB_USER_PIC",			//�����Ϥ��i�������Ű������ʡI���U���@���i�ק�j
"�ּ�"=>"image/1.gif",
"�L��"=>"image/2.gif",
"�P��"=>"image/3.gif",
"�o�N"=>"image/4.gif",
"�n��"=>"image/5.gif",
"�g��"=>"image/6.gif",
"����"=>"image/7.gif",
"�۫�"=>"image/8.gif",
"���"=>"image/9.gif",
"�V�|"=>"image/10.gif",
"�ͮ�"=>"image/11.gif",
"�ˤ�"=>"image/12.gif"
);

$FACE_TXT=array(
"����"=>"����",
"�ּ�"=>"�ܧּ֪�",
"�L��"=>"�L����",
"�P��"=>"�ܷP�E��",
"�o�N"=>"�ܱo�N��",
"�n��"=>"�n�֪�",
"�g��"=>"�����w�ߪ�",
"����"=>"�ܤ��n�N�䪺",
"�۫�"=>"�ܵ۫檺",
"���"=>"���h�ê�",
"�V�|"=>"�ܪq�઺",
"�ͮ�"=>"�ܥͮ�",
"�ˤ�"=>"�ܶˤߪ�"
);


//==============================�D�{��============================
session_start();
include "function.php";
//���n��ƻ`��
$THE_PAGE="index.php";
$ip=getenv("remote_addr");
$today=date("Y�~m��d��");
$mesg=($mesg)?"$mesg":"�s���d��";
$show_act=($show_act)?"$show_act":"���";
$gb_mode="normal";
$gb_mode=(chk_admin($name,$passwd,"chk"))?"admin":"normal";
$gb_page=(empty($gb_page))?"1":$gb_page;
$gb_sort=(empty($gb_sort))?"date":$gb_sort;
$gb_menu=(empty($gb_menu))?"easy":$gb_menu;

//�s����Ʈw
//$link=pg_pconnect("host=localhost port=5432 dbname=book user=postgres");
//pg_select_db($DB_NAME,$link);


//���J�e�A���R���L�ʧ@�n���i��C
if($show_act=="�޲z��" && $name==$GB_ROOT && $passwd==$GB_PASSWD){
	session_register("name");
	session_register("passwd");
}elseif($show_act=="�O��"){
	chk_admin($name,$passwd,$show_act);
}elseif($show_act=="�h�X�޲z"){
	session_unregister("name");
	session_unregister("passwd");
}elseif($show_act=="�R��"){
	act_del("����",$gb_serial,$reid);
}elseif($show_act=="�[�J�d��"){
	act_add();
}elseif($show_act=="�u������"){
	act_add("lock");
}
?>
<!--���v�n���G���d������DOB�����s�@���_�c��tad���g�]�p�A�w��D��Q���ϥΡC-->
<html>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=big5">
<TITLE><?echo $WEB?>�i<?echo $today;?>�j</TITLE>
<style type="text/css">
	A { text-decoration: none; }
	A:hover { text-decoration: underline; }
	BODY,TD { font-family: arial,helvetica,sans-serif; font-size: <?echo $PAGE_FONT_SIZE?>pt; }
	.gb_tool{color : #cc9966;font-size : 8pt;float : right;}
	.input_col{border-style: solid;border-width: 0;padding : 2pt;}
</style>
<script language="JavaScript">
	function changeclass() { 
		window.location.href="<?echo $THE_PAGE;?>?gb_page=" + document.tool_form.gb_page_s.value + "&gb_sort=" + document.tool_form.gb_sort.value + "&gb_menu=" + document.tool_form.gb_menu.value ;
	}
	</script>
</HEAD>
<BODY leftmargin="0" topmargin="0" bgcolor="<?echo $PAGE_BG_COLOR;?>" background="<?echo $PAGE_BG_IMG;?>">

<TABLE width="<?echo $GUESTBOOK_WIDTH;?>" cellspacing="0" cellpadding="0" bgcolor="<?echo $TITLE_BG_COLOR;?>" background="<?echo $TITLE_BG_IMG;?>" align="center">
	<tr>
		<TD nowrap>
			<? title();?>
		</TD>
		<TD width="100%" align="right">
<marquee behavior="<?echo $SCROLL_MODE;?>" loop="" style="width: 98%;">
			<font color="<?echo $WELCOME_TEXT_COLOR;?>"><?echo $WELCOME_TEXT;?></font></marquee>
		</TD>
	</TR>
</TABLE>
<?
if($show_act=="�^��"  || $show_act=="�d��"){
	show_gb($show_act,$gb_reid);
	write_tool($show_act,$gb_reid);
}elseif($show_act=="���D" || ($show_act=="�j�M" && $search_txt)){
	write_tool($show_act,$gb_serial);
	show_gb($show_act,$gb_serial);
}elseif($show_act=="�i��n�J"){
	chk_admin($name,$passwd,$show_act);
}else{
	write_tool();
	show_gb();
}
?>


</BODY>
</HTML>
