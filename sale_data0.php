<? include("function.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "�ؽ�Ѹ��(step 2/3)";
  }
    window.onload=statustext
</script>

<script language="JavaScript">
	function giveValue(form) {
		//document.main_form.class_code1.value = form.class_code1.options[form.class_code1.selectedIndex].value;
		//document.main_form.class_code2.value = form.class_code2.options[form.class_code2.selectedIndex].value;
		//document.main_form.class_code3.value = form.class_code3.options[form.class_code3.selectedIndex].value;
		document.select_form.submit();
	}
	
	function takeValue(form) {
        form.isbn.value = document.select_form.isbn.value;
		form.class_code1.value = document.select_form.class_code1.options[document.select_form.class_code1.selectedIndex].value;
		form.class_code2.value = document.select_form.class_code2.options[document.select_form.class_code2.selectedIndex].value;
		form.class_code3.value = document.select_form.class_code3.options[document.select_form.class_code3.selectedIndex].value;
		form.p_code.value = document.select_form.p_code.options[document.select_form.p_code.selectedIndex].value;
        form.bname.value = document.select_form.bname.value;
        form.author.value = document.select_form.author.value;
        form.language.value = document.select_form.language.options[document.select_form.language.selectedIndex].value;
        form.org_price.value = document.select_form.org_price.value;
		form.out_year.value = document.select_form.out_year.options[document.select_form.out_year.selectedIndex].value;
		form.out_month.value = document.select_form.out_month.options[document.select_form.out_month.selectedIndex].value;
		form.cd.value = document.select_form.cd.options[document.select_form.cd.selectedIndex].value;						
		return true;
	}
</script>
</head>

<body bgcolor="#FFCC66" text="#000000">
<? //���O�_���Ӯ��y���
   $sql = "select * from book where isbn = '$isbn'";
   $rs = get_pg_result($sql);
   $rowmax = pg_numrows($rs);
   if ($rowmax == 1) { //���ŦX��� 
      $data = pg_fetch_object ($rs, 0) ; ?>
     <form name="form1" method="post" action="sale_data2.php">
  <table width="90%" border="0">
    <tr> 
      <td width="17%" bgcolor="#663300"><div align="right"><font color="#FFFFFF">ISBN : </font></div></td>
      <td width="83%" bgcolor="#00CC99"><font color="#0000FF"><? echo $data->isbn?> 
        <input type="hidden" name="isbn" value="<? echo $isbn?>">
        </font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�j���O : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo get_id_answer('book_type','discript1','class_code1',$data->class_code1)?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�����O : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo get_id_answer('book_type','discript2','class_code2',$data->class_code2)?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�p���O : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo get_id_answer('book_type','discript3','class_code3',$data->class_code3)?> 
        <input type="hidden" name="class_code3" value="<? echo $data->class_code3?>">
        </font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�X���� : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo get_id_answer('book_publisher','p_name','p_code',$data->p_code)?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�ѦW : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->bname?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�@�� : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->author?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">���y�y�t : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->language?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">��l��� : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->org_price?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">�X���~�� : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo substr($data->out_ym,0,4);echo "/";echo substr($data->out_ym,4,2);?></font></td>
    </tr>
    <tr> 
      <td bgcolor="#663300"><div align="right"><font color="#FFFFFF">���� : </font></div></td>
      <td bgcolor="#00CC99"><font color="#0000FF"><? echo $data->cd?></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="�T�w"></td>
    </tr>
  </table>
</form>
<? }else{ //�����ŦX��� ?>
<table width="88%" border="0">
  <form name="select_form" action="<?php echo $PHP_SELF; ?>" method="post">
    <tr> 
      <td width="18%"><div align="right">ISBN:</div></td>
      <td width="84%"><? echo $isbn?><input type="hidden" name="isbn" value="<? echo $isbn?>"></td>
    </tr>
    <tr> 
      <td height="23"><div align="right">�j���O:</div></td>
      <td><select name="class_code1" onChange="giveValue(this.form)">
          <? echo get_sql_list('book_type','class_code1','discript1','',$class_code1);?> 
        </select>
        <a href="new_book_type.php" target="_blank"><font color="#0000FF">���O�`��</font></a> 
      </td>
    </tr>
    <tr> 
      <td height="23"><div align="right">�����O:</div></td>
      <? if (isset($class_code1)) {
		        $cond1 = " where class_code1 ="."'$class_code1'"." or class_code1 = '000'";
		      }else{
                $cond1 = " where class_code1 ="."'000'";
			  }
		  ?>
      <td><select name="class_code2" onChange="giveValue(this.form)">
          <? echo get_sql_list('book_type','class_code2','discript2',$cond1,$class_code2);?> 
        </select> </td>
    </tr>
    <tr> 
      <td height="23"><div align="right">�p���O:</div></td>
      <? if (isset($class_code2)) {
		        $cond2 = " where class_code2 ="."'$class_code2'"." or class_code2='00000'" ;
		      }else{
		        $cond2 = " where class_code2 ="."'00000'";
			  }
		  ?>
      <td><select name="class_code3" onChange="giveValue(this.form)">
          <? echo get_sql_list('book_type','class_code3','discript3',$cond2,$class_code3);?> 
        </select> </td>
    </tr>
    <tr> 
 
    <td><div align="right">�X����:</div></td>
    <td><select name="p_code" id="p_code">
        <? $cond = " where p_status = 'Y' ";?>
		<? if (isset($p_code)) {
		         $set_p_code = $p_code;
			  }else{
			     $set_p_code = '000'; 
			 }?>
        <? echo get_sql_list('book_publisher','p_code','p_name',$cond,$set_p_code);?> 
      </select></td>
    <tr> 
      <td><div align="right">�ѦW:</div></td>
      <td><input name="bname" type="text" id="bname" size="50" value =<? echo $bname?> ></td>
    </tr>
    <tr> 
      <td><div align="right">�@��:</div></td>
      <td><input name="author" type="text" id="author" value =<? echo $author?> >
      <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:bule; padding:1px">�Y���h�H�X��,�ж�̥��̤W���@��.</font></td>
    </tr>
	<tr> 
      <td><div align="right">���y�y�t:</div></td>
	  <td><select name="language">
	      <? $arr = array("����","�^��"); 
    	      echo get_array_list($arr,$language);
			?>
		  </select></td>
    </tr>
    <tr> 
      <td><div align="right">��l���:</div></td>
      <td><input name="org_price" type="text" id="org_price" value =<? echo $org_price?>></td>
    </tr>
    <tr> 
      <td><div align="right">�X���~��:</div></td>
      <td>�褸 
        <select name="out_year" id="out_year">
		  <? if (isset($out_year)) {
		         $set_year = $out_year;
			  }else{
			     $set_year = 2000; 
			 }?>
          <? echo get_num_list(1995,2005,4,$set_year);?> 
        </select>
        �~ 
        <select name="out_month" id="out_month">
		  <? if (isset($out_month)) {
		         $set_month = $out_month;
			  }else{
			     $set_month = 6; 
			 }?>
          <? echo get_num_list(1,12,2,$set_month);?> 
        </select>
        ��</td>
    </tr>
    <tr> 
      <td><div align="right">�H�Ѫ�����:</div></td>
      <td><select name="cd">
          <? echo get_num_list(0,10,0,$cd);?> </select></td>
    </tr>
  </form>
  <form enctype="multipart/form-data" name="main_form" action="insert_book.php" method="post" onSubmit="return takeValue(this)">
    <tr> 
	  <td><input type="hidden" name="isbn" value="<? echo $isbn?>">
          <input type="hidden" name="class_code1" value="<? echo $class_code1?>">
		  <input type="hidden" name="class_code2" value="<? echo $class_code2?>">
		  <input type="hidden" name="class_code3" value="<? echo $class_code3?>">
		  <input type="hidden" name="p_code" value="<? echo $p_code?>">
		  <input type="hidden" name="bname" value="<? echo $bname?>">
		  <input type="hidden" name="author" value="<? echo $author?>">
		  <input type="hidden" name="language" value="<? echo $language?>">
    	  <input type="hidden" name="org_price" value="<? echo $org_price?>">		  
		  <input type="hidden" name="out_year" value="<? echo $out_year?>">
		  <input type="hidden" name="out_month" value="<? echo $out_month?>">
		  <input type="hidden" name="cd" value="<? echo $cd?>">  </td>
      <td><input type="submit" name="Submit2" value="�U�@�B">
      </td>
      
    </tr>
  </form>
</table>
<?  } ?> 