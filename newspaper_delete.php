<? include("function.php") ?>
<?php
  if (check_logon() == 0) {
      js_alert("�z���n�J,�Х��n�J�~�i�إߥX����!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
 ?>
<html>
<head>
<title>�����q�l��</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "�����q�l��";
  }
    window.onload=statustext
</script>
</head>
<br>
<body bgcolor="#FFCC66" text="#000000">
<form action="delete_newspaper.php" method="post">
  <table width="50%" border="0" align="center">
    <tr>
      <td><div align="center"><font color="#0000FF">�бz�A���T�{�A�O�_���P�q�\�I<br></font></div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input type="submit" name="Submit" value="���P�q�\">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
