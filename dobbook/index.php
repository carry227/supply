<?
/*********************************************************************/
//	程式名稱：DOB_GBOOK留言版1.0
//	程式撰寫：吳弘凱（http://www.dob.com.tw）DOB的工友
//	電子郵件：tad@ms1.url.com.tw
//	版權聲明：歡迎個人、非營利單位使用！
//		  學校或非營利單位之主機可將之修改為免費留言版供人申請！
//		  勿用於商業用途，若有商業需求請來信告知。
/*********************************************************************/


//〔資料庫設定﹞=========================================================
$DB_SERVER="localhost";	 		// 請輸入資料庫連結網址
$DB_NAME="book";				// 請輸入資料庫名稱【必改】
$DB_USER="postgres";				// 請輸入資料庫帳號【必改】
$DB_PASS="";				// 請輸入資料庫密碼【必改】
$GBOOK_TBL="gbook";			// 請輸入本留言版所使用的表格名稱


//〔站長留言版的管理帳號密碼﹞===========================================
$GB_ROOT="carry";				//登入帳號（進入管理界面用）【必改】
$GB_PASSWD="carry123";				//登入密碼（進入管理界面用）【必改】
$GB_USER="carry";				//站長留言暱稱（留言時才用得到）【必改】
$GB_USER_EMAIL="carry@supply.com.tw";			//站長電子郵件（留言時才用得到）【必改】
$GB_USER_PIC="image/tad.gif";		//站長專屬圖片（留言時才用得到）


//〔留言版基本資料設定﹞=================================================
$WEB="資訊類二手書";				//網站的名稱【必改】
$WEB_URL="http://book.supply.com.tw";				//網站的網址【必改】
$WELCOME_TEXT="歡迎留言【對本站的建議】,此留言板將於本站正常營運後移除！";		//跑馬燈文字
$TITLE_IMG="";				//留言版的標題圖片『可略』


//〔留言版功能啟動、關閉﹞===============================================
$SHOW_TB_LINE="1";			//顯示留言表格線｛0=關閉，1=開啟｝
$OPEN_MENU_INFO=1;			//顯示選單訊息｛0=關閉，1=開啟｝
$USE_HTML=0;				//開放使用HTML語法｛0=關閉，1=開啟｝
$PAGE_SHOW_LIMIT="15";			//每頁顯示留言數目


//〔標題區的版面設定﹞===================================================
$WELCOME_TEXT_COLOR="#FF00FF";		//跑馬燈的文字顏色
$TITLE_BG_COLOR="#ffffff";		//標題底色設定
$TITLE_BG_IMG="";			//標題底圖設定『可略』
$SCROLL_MODE="slide";			//跑馬燈模式選擇｛alternate=左右擺、scroll=右至左、slide=只走一次｝

//〔留言版版面進階設定﹞=================================================
$PAGE_FONT_SIZE="9";			//留言版文字大小
$PAGE_BG_IMG="";			//留言版底圖『可略』
$PAGE_BG_COLOR="Beige";			//留言版底色
$GUESTBOOK_WIDTH="94%";			//留言版的寬度
$GUESTBOOK_ALIGN="center";		//留言版的位置｛left=左、center=中、right=右｝
$TB_LINE_COLOR="#abc686";		//留言表格線的顏色
$TD_COLOR_1="#ffffde";			//留言內容第一種底色設定
$TD_COLOR_2="#ffffee";			//留言內容第二種底色設定（這兩種底色會交互出現）


//〔工具選單按鈕、圖片設定﹞=============================================
$TOOL_BG_COLOR="#C0B89A";		//工具選單的底色設定
$TOOL_BG_IMG="image/menu_bg.jpg";	//工具選單的底圖設定『可略』
$PIC_RE="image/re.gif";			//「回覆留言」圖片
$PIC_BACK="image/back.gif";		//「回上頁」圖片
$PIC_GO="image/go.gif";			//「GO」圖片
$PIC_SEARCH="image/search.gif";		//「搜尋」圖片
$PIC_SORT_NAME="image/sort_name.gif";	//「姓名排序」圖片
$PIC_SORT_DATE="image/sort_date.gif";	//「日期排序」圖片
$PIC_LOGOUT="image/logout.gif";		//「登出管理」圖片
$PIC_LOGIN="image/admin.gif";		//「站長管理」圖片
$PIC_ADD="image/add.gif";		//「我要留言」圖片
$PIC_EZ_MENU="image/normal.gif";	//「簡易工具」圖片
$PIC_ADV_MENU="image/adv.gif";		//「進階工具」圖片
$PIC_LOCK="image/lock.gif";		//「悄悄話」圖片


//表情設定
$FACE_IMG=array(
"站長"=>"$GB_USER_PIC",			//站長圖片【除此項勿做任何更動！底下任一均可修改】
"快樂"=>"image/1.gif",
"微笑"=>"image/2.gif",
"感謝"=>"image/3.gif",
"得意"=>"image/4.gif",
"爽快"=>"image/5.gif",
"狂喜"=>"image/6.gif",
"歹謝"=>"image/7.gif",
"著急"=>"image/8.gif",
"質疑"=>"image/9.gif",
"糟糕"=>"image/10.gif",
"生氣"=>"image/11.gif",
"傷心"=>"image/12.gif"
);

$FACE_TXT=array(
"站長"=>"站長",
"快樂"=>"很快樂的",
"微笑"=>"微笑的",
"感謝"=>"很感激的",
"得意"=>"很得意的",
"爽快"=>"爽快的",
"狂喜"=>"滿心歡喜的",
"歹謝"=>"很不好意思的",
"著急"=>"很著急的",
"質疑"=>"很懷疑的",
"糟糕"=>"很沮喪的",
"生氣"=>"很生氣的",
"傷心"=>"很傷心的"
);


//==============================主程式============================
session_start();
include "function.php";
//必要資料蒐集
$THE_PAGE="index.php";
$ip=getenv("remote_addr");
$today=date("Y年m月d日");
$mesg=($mesg)?"$mesg":"瀏覽留言";
$show_act=($show_act)?"$show_act":"顯示";
$gb_mode="normal";
$gb_mode=(chk_admin($name,$passwd,"chk"))?"admin":"normal";
$gb_page=(empty($gb_page))?"1":$gb_page;
$gb_sort=(empty($gb_sort))?"date":$gb_sort;
$gb_menu=(empty($gb_menu))?"easy":$gb_menu;

//連接資料庫
//$link=pg_pconnect("host=localhost port=5432 dbname=book user=postgres");
//pg_select_db($DB_NAME,$link);


//載入前，分析有無動作要先進行。
if($show_act=="管理者" && $name==$GB_ROOT && $passwd==$GB_PASSWD){
	session_register("name");
	session_register("passwd");
}elseif($show_act=="記錄"){
	chk_admin($name,$passwd,$show_act);
}elseif($show_act=="退出管理"){
	session_unregister("name");
	session_unregister("passwd");
}elseif($show_act=="刪除"){
	act_del("隱藏",$gb_serial,$reid);
}elseif($show_act=="加入留言"){
	act_add();
}elseif($show_act=="只給站長"){
	act_add("lock");
}
?>
<!--版權聲明：本留言版為DOB首頁製作百寶箱之tad撰寫設計，歡迎非營利單位使用。-->
<html>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=big5">
<TITLE><?echo $WEB?>【<?echo $today;?>】</TITLE>
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
if($show_act=="回覆"  || $show_act=="留言"){
	show_gb($show_act,$gb_reid);
	write_tool($show_act,$gb_reid);
}elseif($show_act=="跳躍" || ($show_act=="搜尋" && $search_txt)){
	write_tool($show_act,$gb_serial);
	show_gb($show_act,$gb_serial);
}elseif($show_act=="進行登入"){
	chk_admin($name,$passwd,$show_act);
}else{
	write_tool();
	show_gb();
}
?>


</BODY>
</HTML>
