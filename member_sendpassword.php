<?php include("variable.php"); ?>
<html>
<head>
<title>忘記密碼</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "忘記密碼";
  }
  window.onload=statustext
</script>

</head>
<body bgcolor="#FFCC66" text="#000000" >

<form action="sendpassword.php" method="post"><table width="60%" border="0" align="center">
  <tr>
      <td width="29%" height="33"><div align="right"><strong>手機號碼 :</strong></div></td>
    <td width="71%"><input name="mobile" type="text" id="mobile"></td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td>
    <td><input type="submit" name="Submit" value="送出">
        <input type="reset" name="Submit2" value="清除"></td>
  </tr>
</table>
</form>
<?php


 ?>
</body>
</html>
