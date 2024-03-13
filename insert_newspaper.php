<?php include("function.php");
       include('variable.php');
//執行前,先刪除該用戶之前訂閱資料
    $sql = "delete from e_news where mobile ="."'$si_mobile'";
	$rs = get_pg_result($sql);

//insert detail	
for ($i=1;$i<=$count;$i++){
     $c3 = $class_type[$i];
     $c2 = substr($c3,0,5);
     $c1 = substr($c3,0,3); 

     if (!empty($c3)){ 
		$sql = "insert into e_news (class_code1,class_code2,class_code3,mobile) 
				values('$c1','$c2','$c3','$si_mobile')";
        $rs = get_pg_result($sql);
	 }
}

if ($rs > 0) {
  js_alert("感謝您的使用,訂閱電子報成功!");
  echo "<script language='javascript'>self.location.href='quick_view.htm';</script>";
  }else{
  js_alert("很抱歉,您訂閱電子報失敗,請您再試一次!");
  echo "<script language='javascript'>self.location.href='newspaper_class.php';</script>";
}
?>