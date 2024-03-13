<?
//�q�X�d���D�n�禡
function show_gb($show_act="���",$gb_reid="0"){
	global $name,$passwd,$GBOOK_TBL,$USE_HTML,$PAGE_SHOW_LIMIT,$gb_page,$TD_COLOR_1,$TD_COLOR_2,$SHOW_TB_LINE,$TB_LINE_COLOR,$GUESTBOOK_WIDTH,$THE_PAGE,$search_txt,$gb_mode,$gb_sort,$gb_page,$PIC_LOCK;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	
	$allow_act=array("���","�޲z","�^��","���D","�j�M");
	if(in_array($show_act,$allow_act)):
		
		if($show_act=="�j�M"){
			$list_serial="where (gb_content like '%$search_txt%' or user_name like '$search_txt')";
		}elseif($gb_reid){
			$list_serial="where gb_serial='$gb_reid'";
		}else{
			$list_serial="where gb_reid='0'";
		}
		$num=($gb_page-1)*$PAGE_SHOW_LIMIT;
		$no_text=1;
		$sort=($gb_sort=="name")?"order by user_name desc":"order by gb_date desc";
		$select_limit=($show_act=="�^��" or  $show_act=="���D")?"":"limit $PAGE_SHOW_LIMIT,$num";
		
		
		$str="select gb_serial,gb_content,gb_date,gb_show,user_name,user_email,user_web,user_ip,user_show from $GBOOK_TBL $list_serial and (gb_show='Y' or gb_show='S') $sort $select_limit";
		$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
		$list = pg_query($rs,$str);
		
		echo "<table width='$GUESTBOOK_WIDTH' border='0' cellspacing='$SHOW_TB_LINE' cellpadding='3' align='center' bgcolor='$TB_LINE_COLOR'>";
		
		while(list($gb_serial,$gb_content,$gb_date,$gb_show,$user_name,$user_email,$user_web,$user_ip,$user_show) = pg_fetch_row($list)):
			
			$content=($USE_HTML)?nl2br($gb_content):nl2br(htmlspecialchars($gb_content));
			
			if($show_act=="�j�M" && $search_txt){
				$content=ereg_replace($search_txt,"<font color=\"Red\"><b>$search_txt</b></font>", $content);
				$user_name=ereg_replace($search_txt,"<font color=\"Red\"><b>$search_txt</b></font>", $user_name );
			}
			
			$man=($user_email)?"<a href=\"mailto:$user_email\">$user_name</a>":$user_name;
			$web=($user_web)?" [ <a href=\"$user_web\" target=\"_blank\">web</a> ]":"";
			$face_pic=gb_pic("��ܹϤ�",$user_show);
			$gb_tool=re_tool($show_act,$gb_serial,"0");
			$td_color = (++$i % 2) ? "$TD_COLOR_1" : "$TD_COLOR_2";
			
			if($gb_show=="S" && $gb_mode=="admin"){
				$content="<font color='Red'>�i���͵��z�������ܡj</font><p>$content";
				$gb_tool="";
			}elseif($gb_show=="S"){
				$content="<font color='#BDB3DB'>�o�O�u�������ݪ������ܳ�I</font>";
				$face_pic="$PIC_LOCK";
				$gb_tool="";
			}
			echo "
			<tr bgcolor='$td_color'><td width='100' align='center' valign='top'>
			<img src='$face_pic'><br>�峹�s�� $gb_serial
			</td><td valign='top'>
			<span class='gb_tool'>$gb_tool</span></form>
			<font color='Olive'>$man $web �d���p�U�G</font><p>
			$content
			<p><font size='1' color='Gray'>[ $gb_date / $user_ip ]</font>
			";
			show_re($gb_serial,$show_act);
			echo "</td></tr>";
			$no_text=0;
		endwhile;
		if($no_text){
			echo "<tr><td>�ثe�S������d��</td></tr>";
		}
		echo "</table>";
	endif;
}


//�q�X�Ӥ峹���^�Яd��
function show_re($serial,$show_act){
	global $GBOOK_TBL,$USE_HTML,$THE_PAGE,$gb_mode,$gb_sort,$gb_page,$PIC_LOCK;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	$str="select gb_serial,gb_reid,gb_content,gb_date,gb_show,user_name,user_email,user_web,user_ip,user_show from $GBOOK_TBL where gb_reid='$serial' and (gb_show='Y' or gb_show='S') order by gb_date";
	$list = pg_query($rs,$str);
	while(list($gb_serial,$gb_reid,$gb_content,$gb_date,$gb_show,$user_name,$user_email,$user_web,$user_ip,$user_show) = pg_fetch_row($list)):
		$content=($USE_HTML)?nl2br($gb_content):nl2br(htmlspecialchars($gb_content));
		$man=($user_email)?"<a href=\"mailto:$user_email\">$user_name</a>":$user_name;
		$web=($user_web)?" [ <a href=\"$user_web\" target=\"_blank\">web</a> ]":"";
		$gb_tool=($show_act=="�޲z")?re_tool($show_act,$gb_serial,$serial):"";
		$face_txt=gb_pic("��ܤ�r",$user_show)."�^�����G";
		if($gb_show=="S" && $gb_mode=="admin"){
			$content="<font color='Red'>�i���͵��z�������ܡj</font><p>$content";
			$gb_tool="";
		}elseif($gb_show=="S"){
			$content="<font color='#BDB3DB'>�o�O�u�������ݪ������ܳ�I</font>";
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


//���o�d������������Ƶ��Ƹ��
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

//���o�d�����ϩΤ�r���D
function title(){
	global $TITLE_IMG,$WEB,$WEB_URL;
	if($TITLE_IMG){
		echo "<a href=\"$WEB_URL\"><img src=\"$TITLE_IMG\" border=\"0\" hspace=\"0\" vspace=\"0\"></a>";
	}elseif($WEB){
		echo "�i <a href=\"$WEB_URL\">$WEB</a>�d���� �j";
	}else{
		echo "�i <a href=\"http://www.dob.com.tw\">DOB�����s�@���_�c</a>�d���� �j";
	}
}

//���HTML�y�k�O�_����
function use_html(){
	global $USE_HTML;
	if($USE_HTML){
		return "�}��";
	}else{
		return "����";
	}
}







//�d�������ϮסG
function gb_pic($mode="",$user_show=""){
	global $GB_USER_PIC,$FACE_IMG,$FACE_TXT,$gb_mode;
	
	if($mode=="��ܹϤ�"):
		$face=$FACE_IMG[$user_show];
	elseif($mode=="��ܤ�r"):
		$face=$FACE_TXT[$user_show];
	elseif($mode=="�Ϥ���" or $mode=="��r��"):
		
		while(list($k,$v)=each($FACE_IMG)){
			if($k=="����" && $gb_mode=="normal"){continue;}
			$face_pic=($mode=="��r��")?"":"<img src=\"$v\" border=\"0\">";
			$tr_start= (++$i % 2) ? "<tr>" : "";
			$tr_end= (++$j % 2) ? "" : "</tr>";
			$face_t="$tr_start<td><input type='radio' name='user_show' value='$k'>$k$face_pic</td>$tr_end";
			$face_table=$face_table.$face_t;
		}
		
		$face="<table align='center'>$face_table</table>";
	endif;
	
	return $face;
}


//�d���B�ʤu��
function re_tool($show_act,$gb_serial="0",$gb_reid="0"){
	global $PIC_RE,$THE_PAGE,$gb_mode,$gb_sort,$gb_page,$PIC_BACK;
	
	$re=($gb_reid=="0")?"<input type='hidden' name='gb_reid' value='$gb_serial'>":"<input type='hidden' name='gb_reid' value='$gb_reid'>";
	
	if($show_act=="�^��"){
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
		<input type='submit' name='show_act' value='�^��'><br>
		<input type='hidden' name='gb_serial' value='$gb_serial'>
		<input type='hidden' name='reid' value='$gb_reid'>
		<input type='submit' name='show_act' value='�R��'>
		</form>";
	}elseif($show_act=="���" or $show_act=="���D" or $show_act=="�j�M"){
		$re_tool="<form action='$THE_PAGE' method='post'>
		$re
		<input type='hidden' name='show_act' value='�^��'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' name='mesg' src='$PIC_RE'>
		</form>";
	}else{
		$re_tool="";
	}
	
	return $re_tool;
}



//�u��C�T��
function show_info(){
	global $mesg;
	$show_html=use_html();
	$all_data_count=gb_count("all");
	$daty_data_count=gb_count("today");
	$all_count=gb_count("main_all");
	$day_count=gb_count("main_today");
	$re_today_count=$daty_data_count-$day_count;
	$info="<tr><td align='center' nowrap bgcolor='Black'>
			<FONT face='Arial' color='Silver'>���A�G</FONT><FONT color='#FF8040'>$mesg</FONT>
		</td><td align='center' nowrap bgcolor='Black'>
			<font color='Silver'>HTML�y�k�G</font><font color='red'>$show_html</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>�`��ƶq�G</font>
			<font color='#00FFFF'>$all_data_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font color='Silver'>�`�d���ơG</font>
			<font face='Arial' color='Yellow'>$all_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>����d���ơG</font>
			<font color='Lime'>$day_count</font>
		</td><td align='center' nowrap bgcolor='Black'>
			<font face='Arial' color='Silver'>����^���d���ơG</font>
			<font color='#FFFFFF'>$re_today_count</font>
		</td></tr>";
	return $info;
}


//�`���B�d���O�l
function write_tool($show_act="���",$gb_id="0"){
	global $PAGE_SHOW_LIMIT,$GUESTBOOK_WIDTH,$TOOL_BG_COLOR,$TOOL_BG_IMG,$GUESTBOOK_ALIGN,$THE_PAGE,$gb_page,$gb_mode,$gb_sort,$gb_menu,$OPEN_MENU_INFO;
	if($show_act=="�d��" or $show_act=="�^��"):
		write_board($show_act);
	else:
		$show_info=($OPEN_MENU_INFO)?show_info():"";
		$show_page=($show_act=="���D" or $show_act=="�j�M")?back_tool():page_tool();
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



//���G²���B�i���������\��
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


//���G���g�d�����s
function sign_tool(){
	global $gb_sort,$THE_PAGE,$gb_menu,$PIC_ADD;
	$sign_tool="
	<form action='$THE_PAGE' method='post'><td>
	<input type='hidden' name='show_act' value='�d��'>
	<input type='hidden' name='gb_page' value='1'>
	<input type='hidden' name='gb_id' value='0'>
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_menu' value='$gb_menu'>
	<input type='image' src='$PIC_ADD' alt='���g�d��'>
	</td></form>";
	return $sign_tool;
}


//���G�n�J�޲z�ɭ�
function login_tool(){
global $THE_PAGE,$gb_mode,$PIC_LOGOUT,$PIC_LOGIN;
	if($gb_mode=="normal"){
		$login_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='show_act' value='�i��n�J'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='image' src='$PIC_LOGIN' alt='�n�J�޲z'>
		</td></form>";
	}elseif($gb_mode=="admin"){
		$login_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='show_act' value='�h�X�޲z'>
		<input type='image' src='$PIC_LOGOUT' alt='�n�X'>
		</td></form>";
	}
return $login_tool;
}



//���G�Ƨǥ\��
function sort_tool(){
	global $gb_sort,$THE_PAGE,$gb_mode,$gb_page,$PIC_SORT_NAME,$PIC_SORT_DATE;
	
	if($gb_sort=="name"){
		$sort_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='gb_sort' value='date'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' src='$PIC_SORT_DATE' alt='����Ƨ�'>
		</td></form>";
	}elseif($gb_sort=="date"){
		$sort_tool="
		<form action='$THE_PAGE' method='post'><td>
		<input type='hidden' name='gb_sort' value='name'>
		<input type='hidden' name='gb_menu' value='adv'>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='image' src='$PIC_SORT_NAME' alt='�m�W�Ƨ�'>
		</td></form>";
	}
	return $sort_tool;
}


//���G�j�M�\��
function search_tool(){
	global $gb_sort,$THE_PAGE,$gb_page,$PIC_SEARCH;
	$search_tool="
	<form action='$THE_PAGE' method='post'><td nowrap>
	<input type='text' name='search_txt' size='10'>
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_page' value='$gb_page'>
	<input type='hidden' name='gb_menu' value='adv'>
	<input type='hidden' name='show_act' value='�j�M'>
	<input type='image' name='mesg' src='$PIC_SEARCH' value='�d���j�M'>
	</td></form>";
	return $search_tool;
}

//���G���D�\��
function jump_tool(){
	global $gb_sort,$THE_PAGE,$gb_page,$PIC_GO;
	$jump_tool="
	<form action='$THE_PAGE' method='post'>
	<td nowrap>���� 
	<input type='text' name='gb_serial' size='4'> ���峹
	<input type='hidden' name='gb_sort' value='$gb_sort'>
	<input type='hidden' name='gb_page' value='$gb_page'>
	<input type='hidden' name='gb_menu' value='adv'>
	<input type='hidden' name='show_act' value='���D'>
	<input type='image' src='$PIC_GO'>
	</td></form>";
	return $jump_tool;
}

//���G�^�s���D���\��
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

//���G�����\��
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
			$page=$page."<option value=\"$i\" $selected>�� $i ��</option>";
		}
		$show_page="
		<form action='$THE_PAGE' method='post' name='tool_form'>
		<td align='right' nowrap>
		<select name='gb_page_s' size='1' onChange='changeclass()'>".$page."</select>
		<input type='hidden' name='gb_page' value='$next_page'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='hidden' name='gb_menu' value='$gb_menu'>
		<input type='submit' value='�U�@��' style='background-color: transparent; font-size: 9pt;'>
		</td></form>";
		return $show_page;
	}
	return "<td align='right' nowrap>�ثe�d���Ȥ@��</td>";
}

//���g�d�����O�l
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
		$use_lock="<option value='�u������'>�u������</option>";
	}
	$info=write_info($show_act);
	$face=($show_act=="�d��")?gb_pic("�Ϥ���",""):gb_pic("��r��","");
	
	echo "<table width='$GUESTBOOK_WIDTH' border='1' cellspacing='2' cellpadding='2' bgcolor='$TOOL_BG_COLOR' background='$TOOL_BG_IMG' align='$GUESTBOOK_ALIGN'>
	<form action='$THE_PAGE' method='POST'>
	<tr><td align='center' nowrap>
		�L�m�j�W
	</td><td bgcolor='White'>
		<input type='text' name='user_name' value='$user_name' size='30' class='input_col'>
	</td><td rowspan='2' valign='top' bgcolor='Black'>
		$info
	</td></tr><tr><td align='center' nowrap>
		�q�l�l��
	</td><td bgcolor='White'>
		<input type='text' name='user_email' size='30'  value='$user_email' class='input_col'>
	</td></tr><tr><td align='center' nowrap>
		�ӤH����
	</td><td bgcolor='White'>
		<input type='text' name='user_web' size='30'  value='$user_web' class='input_col'>
	</td><td rowspan='3' valign='top' nowrap bgcolor='#C8DB79'>
		�߱��ϮסG<br>$face
	</td></tr><tr><td width='70%' colspan='2' bgcolor='White'>
		<textarea cols='' rows='17' name='gb_content' style='border-style: solid; border-width: 0;padding=2pt;width=100%;' onFocus=\"if (this.value=='�Цb���B�g�U�z���d��') this.value='';\">�Цb���B�g�U�z���d��</textarea>
	</td></tr><tr><td colspan='2'>
		<select name='show_act' size='1'>
			<option value='�[�J�d��' SELECTED>�o��峹</option>
			$use_lock
			<option value='���'>���g�աI</option>
		</select>
		<input type='hidden' name='gb_page' value='$gb_page'>
		<input type='hidden' name='gb_sort' value='$gb_sort'>
		<input type='Submit' value='�e�X'>
	</td></form></tr>
	</table>";
}

//�d����ܰT��
function write_info($show_act=""){
	global $gb_reid,$ip,$today;
	if(($show_act=="�^��") && $gb_reid>0):
		$info="<font color='red'>�ثe���^�Яd�����A</font><br>
		<font color='Silver'>�^�Ф峹�s���G</font><font face='Arial' color='Yellow'>$gb_reid</font><br>
		<font face='Arial' color='Silver'>�z��IP��m�G</font><font color='Lime'>$ip</font><br>
		<input type='hidden' name='gb_reid' value='$gb_reid'>";
	elseif($show_act=="�d��"):
		$info="<font color='red'>�w��z�b���d�����d��</font><br>
		<font color='Silver'>�d������G</font><font face='Arial' color='Yellow'>$today</font><br>
		<font face='Arial' color='Silver'>�z��IP��m�G</font><font color='Lime'>$ip</font><br>";
	else:
		$info="<font color='Red'>�d���t�εo�Ϳ��~�I</font>";
	endif;
	
	return $info;
}


//====================================�d�����ʧ@���=================================

//�i��n�J�B�ˬd�b���K�X�G
function chk_admin($name,$passwd,$show_act="chk"){
	global $GB_ROOT,$GB_PASSWD,$THE_PAGE;
	if($name==$GB_ROOT && $passwd==$GB_PASSWD && $show_act=="chk"){
		return 1;
	}elseif($name==$GB_ROOT && $passwd==$GB_PASSWD && $show_act=="�O��"){
		header("Location:index.php?show_act=�޲z��&name=$name&passwd=$passwd");
	}elseif($show_act=="�i��n�J"){
		echo "
		<table align='center'>
		<form action='$THE_PAGE' method='post'>
		<tr><td>�b��</td><td><input type='text' name='name'></td></tr>
		<tr><td>�K�X</td><td><input type='password' name='passwd'></td></tr>
		<tr><td colspan='2' align='center'>
		<input type='hidden' name='show_act' value='�O��'>
		<input type='submit' value='�n�J'>
		</td></tr>
		</form></table>
		";
	}
	return 0;
}


//�[�J�d��
function act_add($mode=""){
	global $GB_ROOT,$GB_PASSWD,$GBOOK_TBL,$gb_reid,$gb_date,$gb_content,$user_name,$user_email,$user_web,$ip,$user_show,$gb_mode,$gb_page,$gb_sort;
	$rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");	
	//�ˬd���n���O�_����g
	if(empty($gb_content) or empty($user_name)){
		error_msg("�z���Ů楼���I�I\\n�L�k��J�C");
	}
	
	if(empty($gb_reid)){
		$gb_reid="0";
	}
	//�����]�N�޸��A�åh�׽u�B�ťաC
	if(!get_magic_quotes_gpc()){
		$gb_content=addslashes(trim($gb_content));
		$user_name=(empty($user_name))?"���H��":addslashes(trim($user_name));
		$user_email=addslashes(trim($user_email));
		$user_web=addslashes(trim($user_web));
		$user_show=(empty($user_show))?"�L��":addslashes(trim($user_show));
	}else{
		$gb_content=trim($gb_content);
		$user_name=(empty($user_name))?"���H��":trim($user_name);
		$user_email=trim($user_email);
		$user_web=trim($user_web);
		$user_show=(empty($user_show))?"�L��":trim($user_show);
	}
	$gb_show=($mode=="lock")?"S":"Y";
	
	$str="insert into $GBOOK_TBL (gb_reid,gb_date,gb_show,gb_content,user_name,user_email ,user_web,user_ip,user_show) values ('$gb_reid',NOW(),'$gb_show','$gb_content','$user_name','$user_email ','$user_web','$ip','$user_show')";
	if(pg_query($rs,$str)){
		header("Location:index.php?gb_page=$gb_page&gb_sort=$gb_sort");
	}
	return 0;
}


//�R���d��
function act_del($del_gb,$serial,$re_serial){
	global $GB_ROOT,$GB_PASSWD,$GBOOK_TBL,$gb_mode,$gb_page,$gb_sort;
    $rs=pg_connect("host=localhost port=5432 dbname=book user=postgres");
	if($del_gb=="����"):
		if($re_serial=="0" && !empty($serial)){
			$str="update $GBOOK_TBL set gb_show='N' where gb_serial='$serial' and gb_reid='$re_serial'";
		}elseif(!empty($re_serial) && !empty($serial)){
			$str="update $GBOOK_TBL set gb_show='N' where gb_serial='$serial'";
		}
		if(pg_query($rs,$str)){
			header("Location:index.php?gb_page=$gb_page&gb_sort=$gb_sort");
		}
		return 0;
	elseif($del_gb=="�R��"):
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



//���~�T��ĵ�i����
function error_msg($err){
	echo"<script language=\"JavaScript\">alert(\"$err\")</script>";
	echo"<center><form action='$THE_PAGE' method='post'><input type='submit' value='�^�d����'></form></center>";
	exit;
}
?>