<?php
  include("function.php");
  include("variable.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="JavaScript">
  function statustext() {
    window.status = "�ק���";
  }
    window.onload=statustext
</script>
</head>

<body bgcolor="#FFCC66" text="#000000" >

<?php
  if (check_logon() == 0) {
      js_alert("�z���n�J,�Х��n�J�~�i�ק���!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }else{
      //js_alert("�w�n�J");
?>
<? $sql = "select * from member where mobile = '$si_mobile' ";
    $rs = get_pg_result($sql);
	$data = pg_fetch_object ($rs, 0) ;
?>

<form name="form1" method="post" action="update_join.php"onsubmit="return validate(this)">
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
      <td width="17%"><div align="right"><font color="#0000FF">������X:</font></div></td>
      <td width="83%"><input name="mobile" type="text" id="mobile2" maxlength="10" value="<? echo $data->mobile?>">
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�ж�ӤH���</font> 
        <input type="hidden" name="org_mobile" value="<? echo $data->mobile?>"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">����m�W:</font></div></td>
      <td><input name="name" type="text" id="name" value="<? echo $data->name?>"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">�K�X:</font></div></td>
      <td><input name="password" type="password" id="password" value="<? echo $data->password?>"></font> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">�ʧO:</font></div></td>
      <td><p> 
          <label> 
          <input name="sex" type="radio" value="0" <? if($data->sex=='f') echo "CHECKED";?>>
          <strong>�k</strong></label>
          <label> 
          <input name="sex" type="radio" value="1" <? if($data->sex=='t') echo "CHECKED";?>>
          <strong>�k</strong></label>
          <br>
        </p></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">�ͤ�</font>:</div></td>
      <td> �褸 
        <select name="b_year" id="b_year">
          <? echo get_num_list(1953,2000,4,substr($data->birthday,0,4));?> 
        </select>
        �~ 
        <select name="b_month" id="b_month">
          <? echo get_num_list(1,12,2,substr($data->birthday,5,2));?> 
        </select>
        �� 
        <select name="b_day" id="b_day">
          <? echo get_num_list(1,31,2,substr($data->birthday,8,2));?> 
        </select>
        ��</td>
    </tr>
    <tr> 
      <td><div align="right">��v�q��:</div></td>
      <td>( 
        <input name="htel_code" type="text" id="htel_code" size="4" maxlength="4" value="<? echo $data->htel_code?>">
        ) 
        <input name="htel_first" type="text" id="htel_first" size="4" maxlength="4" value="<? echo $data->htel_first?>">
        - 
        <input name="htel_last" type="text" id="htel_last" size="4" maxlength="4" value="<? echo $data->htel_last?>"> 
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">(�ϽX)�e�|�X-��|�X</font></td>
    </tr>
    <tr> 
      <td><div align="right">���q�q��:</div></td>
      <td>( 
        <input name="ctel_code" type="text" id="ctel_code" size="4" maxlength="4" value="<? echo $data->ctel_code?>">
        ) 
        <input name="ctel_first" type="text" id="ctel_first" size="4" maxlength="4"value="<? echo $data->ctel_first?>">
        - 
        <input name="ctel_last" type="text" id="ctel_last" size="4" maxlength="4" value="<? echo $data->ctel_last?>">
        ext 
        <input name="ctel_ext" type="text" id="ctel_ext" size="4" maxlength="4" value="<? echo $data->ctel_ext?>"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">�q�l�l��:</font></div></td>
      <td><input name="email" type="text" id="email" size="35" maxlength="35"value="<? echo $data->email?>"></td>
    </tr>
	<tr> 
      <td></td>
      <td><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�Щ�U��ܤֶ�g�@�Ө��󪺶l���ϸ��Φa�}</font></td>
    </tr>

    <tr> 
      <td><div align="right"><font color="#0000FF">�l���ϸ��@:</font></div></td>
      <td> <select name="postcode1">
          <option value="">�п�ܦa��</option>
          <?php
             $sql_1 = "select post_code,post_discript from postcode order by post_code";
             $rs_1 = get_pg_result($sql_1);
			 $rowmax = pg_num_rows ($rs_1);
			 for ($row=0;$row<$rowmax;$row++){
               $data_1 = pg_fetch_object ($rs_1, $row) ;?>
          <option value="<?php echo $data_1->post_code ?>" <?php if ($data->code1==$data_1->post_code) echo "SELECTED"; ?>> 
          <?php echo $data_1->post_discript?> </option>
          <?php
			 }  
			 ?>
        </select>
		<font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�ثe�u��������U�Ԫ��a��</font>
		</td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#0000FF">����a�}�@:</font></div></td>
      <td><input name="address1" type="text" id="address1" size="60" maxlength="80" value="<? echo $data->address1?>"> 
        <font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:red; padding:1px">�ж񧹾�a�}</font></td>
    </tr>
    <tr> 
      <td><div align="right">�l���ϸ��G:</div></td>
      <td><select name="postcode2" id="postcode2">
          <option value="">�п�ܦa��</option>
          <?php
		     $row = 0;
			 for ($row=0;$row<$rowmax;$row++){
               $data_1 = pg_fetch_object ($rs_1, $row) ;?>
          <option value="<?php echo $data_1->post_code ?>" <?php if ($data->code2==$data_1->post_code) echo "SELECTED"; ?>> 
          <?php echo $data_1->post_discript?> </option>
          <?php
			 }  
			 ?>
        </select></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">����a�}�G:</div></td>
      <td><input name="address2" type="text" id="address2" size="60" maxlength="80" value="<? echo $data->address2?>"></td>
    </tr>
    <td><div align="right">�l���ϸ��T:</div></td>
    <td><select name="postcode3" id="postcode3">
        <option value="">�п�ܦa��</option>
        <?php
		     $row = 0;
			 for ($row=0;$row<$rowmax;$row++){
               $data_1 = pg_fetch_object ($rs_1, $row) ;?>
        <option value="<?php echo $data_1->post_code ?>" <?php if ($data->code3==$data_1->post_code) echo "SELECTED"; ?>> 
        <?php echo $data_1->post_discript?> </option>
        <?php
			 }  
			 ?>
      </select></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">����a�}�T:</div></td>
      <td><input name="address3" type="text" id="address3" size="60" maxlength="80" value="<? echo $data->address3?>"></td>
    </tr>
    <tr> 
      <td height="5">
      <td><input type="submit" name="Submit" value="�T�w�ק�"></td>
    </tr>
  </table>

  <p align="right"><font style="filter: glow(color=#FFFFFF,strength=3); height:10px; color:blue; padding:1px">PS:�Ŧ���쬰����</font></p>
</form>

<?php  } ?>

</body>
</html>
