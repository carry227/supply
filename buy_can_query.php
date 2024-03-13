<? include("function.php")?>
<? include("variable.php")?>
<? $si_sql_query_buy = '';  //init the value?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
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
		form.near.value = document.select_form.near.options[document.select_form.near.selectedIndex].value;
    	return true;
	}
</script>
<script language="JavaScript">
  function statustext() {
    window.status = "查可買書籍";
  }
    window.onload=statustext
</script>
</head>
<body bgcolor="#FFCC66" text="#000000">
  <table width="80%" border="0">
    <tr bgcolor="#660000"> 
      <td colspan="2"><div align="center"><font color="#FFFFFF" size="3">請至少輸入一個查詢條件</font></div></td>
    </tr>
<form name="select_form" action="<?php echo $PHP_SELF; ?>" method="post">
    <tr bgcolor="#99CC99"> 
      <td width="14%"><div align="right">ISBN</div></td>
      <td width="78%"><input name="isbn" type="text" id="isbn" maxlength="10" value =<? echo $isbn?>></td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">大分類</div></td>
      <td><select name="class_code1" id="class_code1" onChange="giveValue(this.form)">
          <? echo get_sql_list('book_type','class_code1','discript1','',$class_code1);?> 
        </select>
		<font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">(請依序「大中小」分類選擇)</font> </td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">中分類</div></td>
	  <? if (isset($class_code1)) {
		        $cond1 = " where class_code1 ="."'$class_code1'"." or class_code1 = '000'";
		      }else{
                $cond1 = " where class_code1 ="."'000'";
			  }
		?>
      <td><select name="class_code2" id="class_code2" onChange="giveValue(this.form)">
    <? echo get_sql_list('book_type','class_code2','discript2',$cond1,$class_code2);?> 
	    </select></td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">小分類</div></td>
	  <? if (isset($class_code2)) {
		        $cond2 = " where class_code2 ="."'$class_code2'"." or class_code2='00000'" ;
		      }else{
		        $cond2 = " where class_code2 ="."'00000'";
			  }
		  ?>
      <td><select name="class_code3" id="class_code3" onChange="giveValue(this.form)">
        <? echo get_sql_list('book_type','class_code3','discript3',$cond2,$class_code3);?> 
	    </select></td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">出版商</div></td>
      <td><select name="p_code" id="p_code">
	      <? $cond = " where p_status = 'Y' ";?>
		  <? if (isset($p_code)) {
		         $set_p_code = $p_code;
			  }else{
			     $set_p_code = '000'; 
			 }?>
          <? echo get_sql_list('book_publisher','p_code','p_name',$cond,$set_p_code);?>
        </select>
		</td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">作者</div></td>
      <td><input name="author" type="text" id="author" maxlength="30" value =<? echo $author?>>
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">(若有多人合著,請填最上最左一位)</font></td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">書名</div></td>
      <td><input name="bname" type="text" id="bname" size="60" maxlength="60" value =<? echo $bname?>></td>
    </tr>
    <tr bgcolor="#99CC99"> 
      <td><div align="right">近期出售</div></td>
      <td><select name="near" id="near">
	        <? $arr = array("未填資料","10天內","20天內","一個月內"); 
    	      echo get_array_list($arr,$near);
			?>
        </select></td>
    </tr>
    </form>
  <form enctype="multipart/form-data" name="main_form" action="buy_can_query1.php" method="post" onSubmit="return takeValue(this)">
	<tr bgcolor="#99CC99"> 
	      <td><input type="hidden" name="isbn" value="<? echo $isbn?>">
		      <input type="hidden" name="class_code1" value="<? echo $class_code1?>">
		      <input type="hidden" name="class_code2" value="<? echo $class_code2?>">
		      <input type="hidden" name="class_code3" value="<? echo $class_code3?>">
		      <input type="hidden" name="p_code" value="<? echo $p_code?>">
		      <input type="hidden" name="author" value="<? echo $author?>">
  		      <input type="hidden" name="bname" value="<? echo $bname?>">
   		      <input type="hidden" name="near" value="<? echo $near?>">
		  </td>
      <td><input type="submit" name="Submit" value="查詢">
      </td>
    </tr>
	</form>
  </table>

</body>
</html>
