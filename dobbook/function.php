<?
//秀出留言主要函式
function show_gb($show_act="顯示",$gb_reid="0"){
	global $name,$passwd,$GBOOK_TBL,$USE_HTML,$PAGE_SHOW_LIMIT,$gb_page,$TD_COLOR_1,$TD_COLOR_2,$SHOW_TB_LINE,$TB_LINE_COLOR,$GUESTBOOK_WIDTH,$THE_PAGE,$search_txt,$gb_mode,$gb_sort,$gb_page,$PIC_LOCK;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	
	$allow_act=array("顯示","管理","回覆","跳躍","搜尋");
	if(in_array($show_act,$allow_act)):
		
		if($show_act=="搜尋"){
			$list_serial="where (gb_content like '%$search_txt%' or user_name like '$search_txt')";
		}elseif($gb_reid){
			$list_serial="where gb_serial='$gb_reid'";
		}else{
			$list_serial="where gb_reid='0'";
		}
		$num=($gb_page-1)*$PAGE_SHOW_LIMIT;
		$no_text=1;
		$sort=($gb_sort=="name")?"order by user_name desc":"order by gb_date desc";
		$select_limit=($show_act=="回覆" or  $show_act=="跳躍")?"":"limit $PAGE_SHOW_LIMIT,$num";
		
		
		$str="select gb_serial,gb_content,gb_date,gb_show,user_name,user_email,user_web,user_ip,user_show from $GBOOK_TBL $list_serial and (gb_show='Y' or gb_show='S') $sort $select_limit";
		$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
		$list = pg_query($rs,$str);
		
		echo "<table width='$GUESTBOOK_WIDTH' border='0' cellspacing='$SHOW_TB_LINE' cellpadding='3' align='center' bgcolor='$TB_LINE_COLOR'>";
		
		while(list($gb_serial,$gb_content,$gb_date,$gb_show,$user_name,$user_email,$user_web,$user_ip,$user_show) = pg_fetch_row($list)):
			
			$content=($USE_HTML)?nl2br($gb_content):nl2br(htmlspecialchars($gb_content));
			
			if($show_act=="搜尋" && $search_txt){
				$content=ereg_replace($search_txt,"<font color=\"Red\"><b>$search_txt</b></font>", $content);
				$user_name=ereg_replace($search_txt,"<font color=\"Red\"><b>$search_txt</b></font>", $user_name );
			}
			
			$man=($user_email)?"<a href=\"mailto:$user_email\">$user_name</a>":$user_name;
			$web=($user_web)?" [ <a href=\"$user_web\" target=\"_blank\">web</a> ]":"";
			$face_pic=gb_pic("顯示圖片",$user_show);
			$gb_tool=re_tool($show_act,$gb_serial,"0");
			$td_color = (++$i % 2) ? "$TD_COLOR_1" : "$TD_COLOR_2";
			
			if($gb_show=="S" && $gb_mode=="admin"){
				$content="<font color='Red'>【網友給您的悄悄話】</font><p>$content";
				$gb_tool="";
			}elseif($gb_show=="S"){
				$content="<font color='#BDB3DB'>這是只給站長看的悄悄話喔！</font>";
				$face_pic="$PIC_LOCK";
				$gb_tool="";
			}
			echo "
			<tr bgcolor='$td_color'><td width='100' align='center' valign='top'>
			<img src='$face_pic'><br>文章編號 $gb_serial
			</td><td valign='top'>
			<span class='gb_tool'>$gb_tool</span></form>
			<font color='Olive'>$man $web 留言如下：</font><p>
			$content
			<p><font size='1' color='Gray'>[ $gb_date / $user_ip ]</font>
			";
			show_re($gb_serial,$show_act);
			echo "</td></tr>";
			$no_text=0;
		endwhile;
		if($no_text){
			echo "<tr><td>目前沒有任何留言</td></tr>";
		}
		echo "</table>";
	endif;
}


//秀出該文章的回覆留言
function show_re($serial,$show_act){
	global $GBOOK_TBL,$USE_HTML,$THE_PAGE,$gb_mode,$gb_sort,$gb_page,$PIC_LOCK;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	$str="select gb_serial,gb_reid,gb_content,gb_date,gb_show,user_name,user_email,user_web,user_ip,user_show from $GBOOK_TBL where gb_reid='$serial' and (gb_show='Y' or gb_show='S') order by gb_date";
	$list = pg_query($rs,$str);
	while(list($gb_serial,$gb_reid,$gb_content,$gb_date,$gb_show,$user_name,$user_email,$user_web,$user_ip,$user_show) = pg_fetch_row($list)):
		$content=($USE_HTML)?nl2br($gb_content):nl2br(htmlspecialchars($gb_content));
		$man=($user_email)?"<a href=\"mailto:$user_email\">$user_name</a>":$user_name;
		$web=($user_web)?" [ <a href=\"$user_web\" target=\"_blank\">web</a> ]":"";
		$gb_tool=($show_act=="管理")?re_tool($show_act,$gb_serial,$serial):"";
		$face_txt=gb_pic("顯示文字",$user_show)."回應說：";
		if($gb_show=="S" && $gb_mode=="admin"){
			$content="<font color='Red'>【網友給您的悄悄話】</font><p>$content";
			$gb_tool="";
		}elseif($gb_show=="S"){
			$content="<font color='#BDB3DB'>這是只給站長看的悄悄話喔！</font>";
			$face_pic="$PIC_LOCK";
			$gb_tool="";
		}
		echo "
		<hr size='1' color='#D6E28D' noshade>
		<font color='#A28C6F'>
		<span class='gb_tool'>$gb_tool</span>
		<font color='Teal'>$man $face_txt</font><p>
		$content</font>
		<p><font size='1' color='Gray'>[ $gb_date / $user_ip ]</font>
		";
	endwhile;
}


//取得留言版相關的資料筆數資料
function gb_count($c){
	global $GBOOK_TBL;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
	$today=date("Y-m-d");
	if($c=="all"){
		$count_limit="";
	}elseif($c=="today"){
		$count_limit=" and gb_date like '$today%'";
	}elseif($c=="main_all"){
		$count_limit=" and gb_reid='0'";
	}elseif($c=="main_today"){
		$count_limit=" and gb_date like '$today%' and gb_reid='0'";
	}
	$str="select count(*) from $GBOOK_TBL where (gb_show='Y' or gb_show='S') $count_limit";
	$rs = pg_query($rs,$str);
	list($the_count) = pg_fetch_row($rs);
	return $the_count;
}

//取得留言版圖或文字標題
function title(){
	global $TITLE_IMG,$WEB,$WEB_URL;
	if($TITLE_IMG){
		echo "<a href=\"$WEB_URL\"><img src=\"$TITLE_IMG\" border=\"0\" hspace=\"0\" vspace=\"0\"></a>";
	}elseif($WEB){
		echo "【 <a href=\"$WEB_URL\">$WEB</a>留言版 】";
	}else{
		echo "【 <a href=\"http://www.dob.com.tw\">DOB首頁製作百寶箱</a>留言版 】";
	}
}

//顯示HTML語法是否關閉
function use_html(){
	global $USE_HTML;
	if($USE_HTML){
		return "開啟";
	}else{
		return "關閉";
	}
}







//留言的表情圖案：
function gb_pic($mode="",$user_show=""){
	global $GB_USER_PIC,$FACE_IMG,$FACE_TXT,$gb_mode;
	
	if($mode=="顯示圖片"):
		$face=$FACE_IMG[$user_show];
	elseif($mode=="顯示文字"):
		$face=$FACE_TXT[$user_show];
	elseif($mode=="圖片表情" or $mode=="文字表情"):
		
		while(list($k,$v)=each($FACE_IMG)){
			if($k=="站長" && $gb_mode=="normal"){continue;}
			$face_pic=($mode=="文字表情")?"":"<img src=\"$v\" border=\"0\">";
			$tr_start= (++$i % 2) ? "<tr>" : "";
			$tr_end= (++$j % 2) ? "" : "</tr>";
			$face_t="$tr_start<td><input type='radio' name='user_show' value='$k'>$k$face_pic</td>$tr_end";
			$face_table=$face_table.$face_t;
		}
		
		$face="<table align='center'>$face_table</table>";
	endif;
	
	return $face;
}


//留言浮動工具
function re_tool($show_act,$gb_serial="0",$gb_reid="0"){
	global $PIC_RE,$THE_PAGE,$gb_mode,$gb_sort,$gb_page,$PIC_BACK;
	
	$re=($gb_reid=="0")?"<input type='hidden' name='gb_reid' value='$gb_serial'>":"<input type='hidden' name='gb_reid' value='$gb_reid'>";
	
	if($show_act=="回覆"){
		$re_tool="<form action='$THE_PAGE' method='post'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='hidden' name='gb_reid' value='0'>
		<input type='image' src='$PIC_BACK'>
		</form>";
	}elseif($gb_mode=="admin"){
		$re_tool="<form action='$THE_PAGE' method='post'>
		$re
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='submit' name='show_act' value='回覆'><br>
		<input type='hidden' name='gb_serial' value='$gb_serial'>
		<input type='hidden' name='reid' value='$gb_reid'>
		<input type='submit' name='show_act' value='刪除'>
		</form>";
	}elseif($show_act=="顯示" or $show_act=="跳躍" or $show_act=="搜尋"){
		$re_tool="<form action='$THE_PAGE' method='post'>
		$re
		<input type='hidden' name='show_act' value='回覆'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' name='mesg' src='$PIC_RE'>
		</form>";
	}else{
		$re_tool="";
	}
	
	return $re_tool;
}



//工具列訊息
function show_info(){
	global $mesg;
	$show_html=use_html();
	$all_data_count=gb_count("all");
	$daty_data_count=gb_count("today");
	$all_count=gb_count("main_all");
	$day_count=gb_count("main_today");
	$re_today_count=$daty_data_count-$day_count;
	$info="<tr><td align='center' nowrap bgcolor='Black'>
			<FONT face='Arial' color='Silver'>狀態：</FONT><FONT color='#FF8040'>$mesg</FONT>
		</td><td align='center' nowrap bgcolor='Black'>
			<font color='Silver'>HTML語法：</font><font color='red'>$show_html</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>總資料量：</font>
			<font color='#00FFFF'>$all_data_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font color='Silver'>總留言數：</font>
			<font face='Arial' color='Yellow'>$all_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>今日留言數：</font>
			<font color='Lime'>$day_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>今日回應留言數：</font>
			<font color='#FFFFFF'>$re_today_count</font>
		</td></tr>";
	return $info;
}


//總選單、留言板子
function write_tool($show_act="顯示",$gb_id="0"){
	global $PAGE_SHOW_LIMIT,$GUESTBOOK_WIDTH,$TOOL_BG_COLOR,$TOOL_BG_IMG,$GUESTBOOK_ALIGN,$THE_PAGE,$gb_page,$gb_mode,$gb_sort,$gb_menu,$OPEN_MENU_INFO;
	if($show_act=="留言" or $show_act=="回覆"):
		write_board($show_act);
	else:
		$show_info=($OPEN_MENU_INFO)?show_info():"";
		$show_page=($show_act=="跳躍" or $show_act=="搜尋")?back_tool():page_tool();
		$sign_tool=sign_tool();
		$chang_tool=chang_tool();

		echo "
		<table width='$GUESTBOOK_WIDTH' border='1' cellspacing='2' cellpadding='2' bgcolor='$TOOL_BG_COLOR' background='$TOOL_BG_IMG' align='$GUESTBOOK_ALIGN'>
		<tr><td colspan='6'>
		
		<table width='100%' cellspacing='0' cellpadding='0'><tr>
		$sign_tool
		$chang_tool
		$show_page
		</tr></table>
		
		</td></tr>
		$show_info
		</table>";
	endif;
}



//選單：簡易、進階選單切換功能
function chang_tool(){
global $gb_menu,$THE_PAGE,$gb_sort,$gb_page,$show_act,$PIC_EZ_MENU,$PIC_ADV_MENU;
	if($gb_menu=="easy"){
		$chang_tool="
		<form action='$THE_PAGE' method='post'><td nowrap>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='hidden' name='show_act' value='$show_act'>
		<input type='image' src='$PIC_ADV_MENU'>
		</td></form>";
	}elseif($gb_menu=="adv"){
		$login_tool=login_tool();
		$sort_tool=sort_tool();
		$search_tool=search_tool();
		$jump_tool=jump_tool();
		
		$chang_tool="
		$login_tool
		$sort_tool
		<form action='$THE_PAGE' method='post'><td nowrap>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='hidden' name='gb_menu' value='easy'>
		<input type='hidden' name='show_act' value='$show_act'>
		<input type='image' src='$PIC_EZ_MENU'>
		</td></form>
		$search_tool
		$jump_tool";
	}
return $chang_tool;
}


//選單：撰寫留言按鈕
function sign_tool(){
	global $gb_sort,$THE_PAGE,$gb_menu,$PIC_ADD;
	$sign_tool="
	<form action='$THE_PAGE' method='post'><td>
	<input type='hidden' name='show_act' value='留言'>
	<input type='hidden' name='gb_page' value='1'>
	<input type='hidden' name='gb_id' value='0'>
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_menu' value='$gb_menu'>
	<input type='image' src='$PIC_ADD' alt='撰寫留言'>
	</td></form>";
	return $sign_tool;
}


//選單：登入管理界面
function login_tool(){
global $THE_PAGE,$gb_mode,$PIC_LOGOUT,$PIC_LOGIN;
	if($gb_mode=="normal"){
		$login_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='show_act' value='進行登入'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='image' src='$PIC_LOGIN' alt='登入管理'>
		</td></form>";
	}elseif($gb_mode=="admin"){
		$login_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='show_act' value='退出管理'>
		<input type='image' src='$PIC_LOGOUT' alt='登出'>
		</td></form>";
	}
return $login_tool;
}



//選單：排序功能
function sort_tool(){
	global $gb_sort,$THE_PAGE,$gb_mode,$gb_page,$PIC_SORT_NAME,$PIC_SORT_DATE;
	
	if($gb_sort=="name"){
		$sort_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='gb_sort' value='date'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' src='$PIC_SORT_DATE' alt='日期排序'>
		</td></form>";
	}elseif($gb_sort=="date"){
		$sort_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='gb_sort' value='name'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' src='$PIC_SORT_NAME' alt='姓名排序'>
		</td></form>";
	}
	return $sort_tool;
}


//選單：搜尋功能
function search_tool(){
	global $gb_sort,$THE_PAGE,$gb_page,$PIC_SEARCH;
	$search_tool="
	<form action='$THE_PAGE' method='post'><td nowrap>
	<input type='text' name='search_txt' size='10'>
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_page' value='$gb_page'>
	<input type='hidden' name='gb_menu' value='adv'>
	<input type='hidden' name='show_act' value='搜尋'>
	<input type='image' name='mesg' src='$PIC_SEARCH' value='留言搜尋'>
	</td></form>";
	return $search_tool;
}

//選單：跳躍功能
function jump_tool(){
	global $gb_sort,$THE_PAGE,$gb_page,$PIC_GO;
	$jump_tool="
	<form action='$THE_PAGE' method='post'>
	<td nowrap>跳至 
	<input type='text' name='gb_serial' size='4'> 號文章
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_page' value='$gb_page'>
	<input type='hidden' name='gb_menu' value='adv'>
	<input type='hidden' name='show_act' value='跳躍'>
	<input type='image' src='$PIC_GO'>
	</td></form>";
	return $jump_tool;
}

//選單：回瀏覽主頁功能
function back_tool(){
	global $gb_sort,$THE_PAGE,$gb_page,$PIC_BACK;
	$back_tool="
	<form action='$THE_PAGE' method='post'><td nowrap>
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_page' value='$gb_page'>
	<input type='hidden' name='gb_menu' value='adv'>
	<input type='image' src='$PIC_BACK'>
	</td></form>";
	return $back_tool;
}

//選單：分頁功能
function page_tool(){
	global $PAGE_SHOW_LIMIT,$gb_page,$gb_mode,$gb_sort,$THE_PAGE,$gb_menu;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
	$all_count=gb_count("main_all");
	if($all_count>$PAGE_SHOW_LIMIT){
		$all_page=ceil($all_count/$PAGE_SHOW_LIMIT);
		$next_page=$gb_page+1;
		if($next_page>$all_page){$next_page="1";}
		for($i=1;$i<=$all_page;$i++){
		 	$selected=($i==$gb_page)?"selected":"";
			$page=$page."<option value=\"$i\" $selected>第 $i 頁</option>";
		}
		$show_page="
		<form action='$THE_PAGE' method='post' name='tool_form'>
		<td align='right' nowrap>
		<select name='gb_page_s' size='1' onChange='changeclass()'>".$page."</select>
		<input type='hidden' name='gb_page' value='$next_page'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_menu' value='$gb_menu'>
		<input type='submit' value='下一頁' style='background-color: transparent; font-size: 9pt;'>
		</td></form>";
		return $show_page;
	}
	return "<td align='right' nowrap>目前留言僅一頁</td>";
}

//撰寫留言的板子
function write_board($show_act){
	global $gb_mode,$GB_USER,$GB_USER_EMAIL,$WEB_URL,$GUESTBOOK_WIDTH,$TOOL_BG_COLOR,$TOOL_BG_IMG,$GUESTBOOK_ALIGN,$THE_PAGE,$gb_page,$gb_sort;
	if($gb_mode=="admin"){
		$user_name=$GB_USER;
		$user_email=$GB_USER_EMAIL;
		$user_web=$WEB_URL;
	}else{
		$user_name="";
		$user_email="";
		$user_web="";
		$use_lock="<option value='只給站長'>只給站長</option>";
	}
	$info=write_info($show_act);
	$face=($show_act=="留言")?gb_pic("圖片表情",""):gb_pic("文字表情","");
	
	echo "<table width='$GUESTBOOK_WIDTH' border='1' cellspacing='2' cellpadding='2' bgcolor='$TOOL_BG_COLOR' background='$TOOL_BG_IMG' align='$GUESTBOOK_ALIGN'>
	<form action='$THE_PAGE' method='POST'>
	<tr><td align='center' nowrap>
		尊姓大名
	</td><td bgcolor='White'>
		<input type='text' name='user_name' value='$user_name' size='30' class='input_col'>
	</td><td rowspan='2' valign='top' bgcolor='Black'>
		$info
	</td></tr><tr><td align='center' nowrap>
		電子郵件
	</td><td bgcolor='White'>
		<input type='text' name='user_email' size='30'  value='$user_email' class='input_col'>
	</td></tr><tr><td align='center' nowrap>
		個人網站
	</td><td bgcolor='White'>
		<input type='text' name='user_web' size='30'  value='$user_web' class='input_col'>
	</td><td rowspan='3' valign='top' nowrap bgcolor='#C8DB79'>
		心情圖案：<br>$face
	</td></tr><tr><td width='70%' colspan='2' bgcolor='White'>
		<textarea cols='' rows='17' name='gb_content' style='border-style: solid; border-width: 0;padding=2pt;width=100%;' onFocus=\"if (this.value=='請在此處寫下您的留言') this.value='';\">請在此處寫下您的留言</textarea>
	</td></tr><tr><td colspan='2'>
		<select name='show_act' size='1'>
			<option value='加入留言' SELECTED>發表文章</option>
			$use_lock
			<option value='顯示'>不寫啦！</option>
		</select>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='Submit' value='送出'>
	</td></form></tr>
	</table>";
}

//留言顯示訊息
function write_info($show_act=""){
	global $gb_reid,$ip,$today;
	if(($show_act=="回覆") && $gb_reid>0):
		$info="<font color='red'>目前為回覆留言狀態</font><br>
		<font color='Silver'>回覆文章編號：</font><font face='Arial' color='Yellow'>$gb_reid</font><br>
		<font face='Arial' color='Silver'>您的IP位置：</font><font color='Lime'>$ip</font><br>
		<input type='hidden' name='gb_reid' value='$gb_reid'>";
	elseif($show_act=="留言"):
		$info="<font color='red'>歡迎您在本留言版留言</font><br>
		<font color='Silver'>留言日期：</font><font face='Arial' color='Yellow'>$today</font><br>
		<font face='Arial' color='Silver'>您的IP位置：</font><font color='Lime'>$ip</font><br>";
	else:
		$info="<font color='Red'>留言系統發生錯誤！</font>";
	endif;
	
	return $info;
}


//====================================留言版動作函數=================================

//進行登入、檢查帳號密碼：
function chk_admin($name,$passwd,$show_act="chk"){
	global $GB_ROOT,$GB_PASSWD,$THE_PAGE;
	if($name==$GB_ROOT && $passwd==$GB_PASSWD && $show_act=="chk"){
		return 1;
	}elseif($name==$GB_ROOT && $passwd==$GB_PASSWD && $show_act=="記錄"){
		header("Location:index.php?show_act=管理者&name=$name&passwd=$passwd");
	}elseif($show_act=="進行登入"){
		echo "
		<table align='center'>
		<form action='$THE_PAGE' method='post'>
		<tr><td>帳號</td><td><input type='text' name='name'></td></tr>
		<tr><td>密碼</td><td><input type='password' name='passwd'></td></tr>
		<tr><td colspan='2' align='center'>
		<input type='hidden' name='show_act' value='記錄'>
		<input type='submit' value='登入'>
		</td></tr>
		</form></table>
		";
	}
	return 0;
}


//加入留言
function act_add($mode=""){
	global $GB_ROOT,$GB_PASSWD,$GBOOK_TBL,$gb_reid,$gb_date,$gb_content,$user_name,$user_email,$user_web,$ip,$user_show,$gb_mode,$gb_page,$gb_sort;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	//檢查重要欄位是否有填寫
	if(empty($gb_content) or empty($user_name)){
		error_msg("您有空格未填喔！！\\n無法輸入。");
	}
	
	if(empty($gb_reid)){
		$gb_reid="0";
	}
	//偵測魔術引號，並去斜線、空白。
	if(!get_magic_quotes_gpc()){
		$gb_content=addslashes(trim($gb_content));
		$user_name=(empty($user_name))?"路人甲":addslashes(trim($user_name));
		$user_email=addslashes(trim($user_email));
		$user_web=addslashes(trim($user_web));
		$user_show=(empty($user_show))?"微笑":addslashes(trim($user_show));
	}else{
		$gb_content=trim($gb_content);
		$user_name=(empty($user_name))?"路人甲":trim($user_name);
		$user_email=trim($user_email);
		$user_web=trim($user_web);
		$user_show=(empty($user_show))?"微笑":trim($user_show);
	}
	$gb_show=($mode=="lock")?"S":"Y";
	
	$str="insert into $GBOOK_TBL (gb_reid,gb_date,gb_show,gb_content,user_name,user_email ,user_web,user_ip,user_show) values ('$gb_reid',NOW(),'$gb_show','$gb_content','$user_name','$user_email ','$user_web','$ip','$user_show')";
	if(pg_query($rs,$str)){
		header("Location:index.php?gb_page=$gb_page&gb_sort=$gb_sort");
	}
	return 0;
}


//刪除留言
function act_del($del_gb,$serial,$re_serial){
	global $GB_ROOT,$GB_PASSWD,$GBOOK_TBL,$gb_mode,$gb_page,$gb_sort;
    $rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
	if($del_gb=="隱藏"):
		if($re_serial=="0" && !empty($serial)){
			$str="update $GBOOK_TBL set gb_show='N' where gb_serial='$serial' and gb_reid='$re_serial'";
		}elseif(!empty($re_serial) && !empty($serial)){
			$str="update $GBOOK_TBL set gb_show='N' where gb_serial='$serial'";
		}
		if(pg_query($rs,$str)){
			header("Location:index.php?gb_page=$gb_page&gb_sort=$gb_sort");
		}
		return 0;
	elseif($del_gb=="刪除"):
		if($re_serial=="0" && !empty($serial)){
			$str="delete from $GBOOK_TBL where gb_serial='$serial' and gb_reid='$re_serial' and gb_show='N'";
		}elseif(!empty($re_serial) && !empty($serial)){
			$str="delete from $GBOOK_TBL where gb_serial='$serial' and gb_show='N'";
		}
		if(pg_query($rs,$str)){
			header("Location:index.php?gb_page=$gb_page&gb_sort=$gb_sort");
		}
		return 0;
	endif;
}



//錯誤訊息警告視窗
function error_msg($err){
	echo"<script language=\"JavaScript\">alert(\"$err\")</script>";
	echo"<center><form action='$THE_PAGE' method='post'><input type='submit' value='回留言版'></form></center>";
	exit;
}
?>