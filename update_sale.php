<?php
include("function.php");

$sql1 = "select status from sale where sale_no ='$sale_no'" ;

$rs1 = get_pg_result($sql1);
$data1 = pg_fetch_object($rs1,0);
$status = $data1->status;

if ( $status == '1' and $act == '12' )  $sql2 = "update sale set status = '2' where sale_no ='$sale_no'" ;
if ( $status == '1' and $act == '19' )  $sql2 = "update sale set status = '9' where sale_no ='$sale_no'" ;
if ( $status == '1' and $act == '13' )  $sql2 = "update sale set status = '3',buy_id = '$mobile' ,buy_date=now(),set_add = '$set_add' where sale_no ='$sale_no'" ;
if ( $status == '2' and $act == '21' )  $sql2 = "update sale set status = '1' where sale_no ='$sale_no'" ;
if ( $status == '2' and $act == '29' )  $sql2 = "update sale set status = '9' where sale_no ='$sale_no'" ;
if ( $status == '3' and $act == '31' )  $sql2 = "update sale set status = '1' ,buy_id=null,buy_date=null,set_add=null where sale_no ='$sale_no'" ;
			
$rs2 = get_pg_result($sql2);
if ($rs2 > 0) {

      switch($act){
	  case '12' :js_alert("已成功取銷出售!"); 
	             echo "<script language='javascript'>self.location.href='sale_query.php';</script>";
                 break;
	  case '19' :js_alert("已成功刪除出售!"); 
	             echo "<script language='javascript'>self.location.href='sale_query.php';</script>";
	             break;
	  case '13': js_alert("已成功訂購書籍!"); 
	             echo "<script language='javascript'>self.location.href='buy_can_query1.php?p=$p';</script>";
	             break;
	  case '21' :js_alert("已成功恢復出售!"); 
	             echo "<script language='javascript'>self.location.href='sale_query.php';</script>";
	             break;
  	  case '29' :js_alert("已成功刪除出售!"); 
	             echo "<script language='javascript'>self.location.href='sale_query.php';</script>";
	             break;				 			 				 
      case '31': js_alert("已成功取銷訂購書籍!"); 
	             echo "<script language='javascript'>self.location.href='buy_already_query.php';</script>";
	             break;				 				 
	  }
	  
  }else{
  js_alert("修改資料失敗,請再試一次!");
}


?>
 
 
 
 