<? include("function.php")?>
<? include("variable.php")?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "申請入會";
  }
    window.onload=statustext
</script>

</head>

<body bgcolor="#FFCC66" text="#000000">
<form name="form1" method="post" action="insert_join.php"onsubmit="return validate(this)">
<script language="JavaScript" src="../js/checkfield.js"></script>
<script language="javascript">
function validate(form) {
 // check 
 if (!checklenpass(form1.mobile)) return false;
 if (!checkBlank(form1.name)) return false;
 if (!checkBlank(form1.password)) return false;
 if (!checkBlank(form1.sex)) return false;
// if (!checkBlank(form1.birthday)) return false;
 if (!checkEmail(form1.email)) return false;
// if (!checkBlank(form1.code1)) return false;
 if (!checkAddr(form1.address1)) return false;
 return true; 
checkoption
}
</script>
  <table width="98%" border="0" align="center">
    <tr> 
      <td width="17%"><div align="right"><font color="#0000FF">手機號碼:</font></div></td>
      <td width="83%"><input name="mobile" type="text" id="mobile" maxlength="10"> 
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">請填個人手機</font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">中文姓名:</font></div></td>
      <td><input name="name" type="text" id="name"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">密碼:</font></div></td>
      <td><input name="password" type="password" id="password"></font>
        </td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">性別:</font></div></td>
      <td><p> 
          <label> 
          <input name="sex" type="radio" value="0">
          <strong>女</strong></label>
          <label> 
          <input name="sex" type="radio" value="1">
          <strong>男</strong></label>
          <br>
        </p></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">生日</font>:</div></td>
      <td>西元 
        <select name="b_year" id="select2">
          <? echo get_num_list(1953,2000,4,1973);?> 
        </select>
        年 
        <select name="b_month" id="b_month">
          <? echo get_num_list(1,12,2,6)?> 
        </select>
        月 
        <select name="b_day" id="b_day">
          <? echo get_num_list(1,31,2,15);?> 
        </select>
        日</td>
    </tr>
    <tr> 
      <td><div align="right">住宅電話:</div></td>
      <td>( 
        <input name="htel_code" type="text" id="htel_code" size="4" maxlength="4">
        ) 
        <input name="htel_first" type="text" id="htel_first" size="4" maxlength="4">
        - 
        <input name="htel_last" type="text" id="htel_last" size="4" maxlength="4"> 
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">(區碼)前四碼-後四碼</font></td>
    </tr>
    <tr> 
      <td><div align="right">公司電話:</div></td>
      <td>( 
        <input name="ctel_code" type="text" id="ctel_code" size="4" maxlength="4">
        ) 
        <input name="ctel_first" type="text" id="ctel_first" size="4" maxlength="4">
        - 
        <input name="ctel_last" type="text" id="ctel_last" size="4" maxlength="4">
        ext 
        <input name="ctel_ext" type="text" id="ctel_ext" size="4" maxlength="4"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">電子郵件:</font></div></td>
      <td><input name="email" type="text" id="email" size="35" maxlength="35"></td>
    </tr>
	<tr> 
      <td></td>
      <td><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">請於下方至少填寫一個郵遞區號及地址</font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">郵遞區號一:</font></div></td>
      <td> <select name="postcode1">
          <option value="">請選擇地區</option>
          <?php
			 $dbconn = pg_connect ($Gdbconnectstring);
             $sql = "select post_code,post_discript from postcode order by post_code";
             $rs = pg_query($dbconn,$sql);
			 $rowmax = pg_num_rows ($rs);
			 for ($row=0;$row<$rowmax;$row++){
               $data = pg_fetch_object ($rs, $row) ;?>
          <option value="<?php echo $data->post_code ?>"><?php echo $data->post_discript?></option>
          <?php
			 }  
			 ?>
        </select>
		<font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">目前只接受左方下拉的地區</font>
		</td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">取件地址一:</font></div></td>
      <td><input name="address1" type="text" id="address1" size="60" maxlength="80"> 
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">請填完整地址</font></td>
    </tr>
    <tr> 
      <td><div align="right">郵遞區號二:</div></td>
      <td><select name="postcode2" id="postcode2">
          <option value="">請選擇地區</option>
          <?php
		     $row = 0;
			 for ($row=0;$row<$rowmax;$row++){
               $data = pg_fetch_object ($rs, $row) ;?>
          <option value="<?php echo $data->post_code ?>"><?php echo $data->post_discript?></option>
          <?php
			 }  
			 ?>
        </select></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">取件地址二:</div></td>
      <td><input name="address2" type="text" id="address2" size="60" maxlength="80"></td>
    </tr>
    <td><div align="right">郵遞區號三:</div></td>
    <td><select name="postcode3" id="postcode3">
        <option value="">請選擇地區</option>
        <?php
		     $row = 0;
			 for ($row=0;$row<$rowmax;$row++){
               $data = pg_fetch_object ($rs, $row) ;?>
        <option value="<?php echo $data->post_code ?>"><?php echo $data->post_discript?></option>
        <?php
			 }  
			 ?>
      </select></td>
    </tr>
    <tr> 
      <td><div align="right">取件地址三:</div>
      <td height="21"><input name="address3" type="text" id="address3" size="60" maxlength="80"></td>
    </tr>
    <tr> 
      <td height="5">
      <td><input type="submit" name="Submit" value="送出"> <input type="reset" name="Submit2" value="清除"></td>
    </tr>
  </table>
    <p align="right"><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">PS:藍色欄位為必填</font></p>

</form>

</body>
</html>
