<?php include("function.php");
       include('variable.php');
//執行前,先刪除該用戶之前訂閱資料
    $sql = "delete from e_news where mobile ="."'$si_mobile'";
	$rs = get_pg_result($sql);

if ($rs > 0) {
  js_alert("感謝您之前訂閱電子報,您已取銷訂閱成功!");
  }else{
  js_alert("很抱歉,您取銷訂閱失敗,請您再試一次!");
}
echo "<script language='javascript'>self.location.href='quick_view.htm';</script>";
?>