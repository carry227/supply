<?php include("function.php");
$sale_no = get_sale_no();
$status = '1';
$sql = "insert into sale (sale_no,isbn,sale_id,sale_discription,sale_date,status,
                                      get_add,ver,class_code3,cd_qty) 
            values('$sale_no','$isbn','$sale_id','$sale_discription','$sale_date','$status',
                       '$get_add','$ver','$class_code3','$cd')";
 
$rs = get_pg_result($sql);

if ($rs > 0) {
  js_alert("建立書籍出售資料成功!");
   echo "<script language='javascript'>self.location.href='sale_query.php';</script>";
  }else{
  js_alert("建立書籍出售資料失敗!");
}
?>