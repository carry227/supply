<? include("function.php") ?>
<?php
  if (check_logon() == 0) {
      js_alert("您未登入,請先登入才可建立出售資料!");
	  echo "<script language='javascript'>self.location.href='member_logon.htm';</script>";
  }
 ?>
<html>
<head>
<title>取消電子報</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="JavaScript">
  function statustext() {
    window.status = "取消電子報";
  }
    window.onload=statustext
</script>
</head>
<br>
<body bgcolor="#FFCC66" text="#000000">
<form action="delete_newspaper.php" method="post">
  <table width="50%" border="0" align="center">
    <tr>
      <td><div align="center"><font color="#0000FF">請您再次確認，是否取銷訂閱！<br></font></div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input type="submit" name="Submit" value="取銷訂閱">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
