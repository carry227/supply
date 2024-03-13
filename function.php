<? include("variable.php");?>
<?  
  //會員密碼加密及解密(加解|1:加;2:解,密碼)
  function password_transfer($code,$password){
    $len = strlen($password); 
    switch ($code) {
	  case '1': 
	    for ($i=0; $i<$len; $i++) $newdata.=fill_value(ord(substr($password,$i,1)),3,'L','0'); 
 	  case '2': 
	    for ($i=0;$i<$len;$i+=3) $newdata.=chr(substr($password,$i,3)); 
	 }
	return $newdata;
   }

  //左或右補某一個值,到指定位數(原字,全長,方向,入值)
  function fill_value($word,$len,$arrow,$val){
     if (strlen($word) == $len) return $word;
	 $row = $len - strlen($word);
	 if ($arrow == 'R' or $arrow == 'r') {
	   for ($i=0;$i<$row;$i++) $word.=$val;
	 }else{
	   for ($i=0;$i<$row;$i++) $word = $val . $word; 
	 }
	   return $word;
   }
     //左方截0,轉整數
  function kill_zero($word){
     if (substr($word,0,1) <> 0 ) return $word;
	 while(substr($word,0,1) == 0){
	   $word = substr($word,1);
	 }
	   return $word;
   }
   //判斷是否已登入(0:未登入,1:登入)
   function check_logon(){
     global $si_mobile;
     global $si_password;
	   if ($si_mobile=='' or $si_mobile== null or $si_password=='' or $si_password==null ) return 0;
	   return 1;
   }
   //使用javascript警告
   function js_alert($msg) {
     echo (
	      "\n<SCRIPT LENGUAGE='JavaScript'>\n" .
	      "  <!--\n" .
		  "  alert(\"$msg\");" .
		  "  // -->\n" .
		  "</SCRIPT>\n"
		  );
   }
  //產生訂單編號
  function get_sale_no(){
    global $Gdbconnectstring;
    $dbconn = pg_connect ($Gdbconnectstring);
	$ym =  BO.date("ym");                         
    $sql = "select max(sale_no) as sale_no from sale where sale_no like '$ym%'";
    $rs = pg_query($dbconn,$sql);
    $data = pg_fetch_object ($rs,0); 
	if (is_null($data->sale_no)) {       
	   $sale_no1 = $ym;
	   $sale_no2 = '0001';
	}else{
       $sale_no1 = substr($data->sale_no,0,6);
	   $sale_no2 = kill_zero(substr($data->sale_no,6,4)) + 1;
	   $sale_no2 =  fill_value($sale_no2,4,'L','0');	
	}
  return $sale_no1.$sale_no2;
  }
  //Get a pgsql Result
  function get_pg_result($sql_syntax){
    global $Gdbconnectstring;
    $dbconn = pg_connect ($Gdbconnectstring);
	$rs = pg_query($dbconn,$sql_syntax) ;
    return $rs;
  }
  //到資料庫找到對應代號說明
  function get_id_answer($table,$get_column,$set_column,$id){
    $sql = "select ".$get_column." from ".$table." where ".$set_column."="."'$id'"." order by ".$get_column;
	$rs = get_pg_result($sql);
	$data = pg_fetch_object($rs);
	return $data->$get_column;
  }
  //到資料庫小分類待售書本數
  function get_classcode3_count($cc3){
    $sql = "select count(*) as sub_row from sale where class_code3="."'$cc3'"." and status = 1 " ;
	$rs = get_pg_result($sql);
	$data = pg_fetch_object($rs);
	return $data->sub_row;
  }
  //到資料庫找到對應代號說明
  function get_class_code3_answer($id){
    $sql = "select discript1,discript2,discript3 from book_type where class_code3="."'$id'";
	$rs = get_pg_result($sql);
	$data = pg_fetch_object($rs);
	return $data->discript1."->".$data->discript2."->".$data->discript3;
  }
  //list/menu中給頭尾序加一
  function get_num_list($first,$last,$len,$init){
    for ($i=$first;$i<=$last;$i++){
	  $val = fill_value($i,$len,'L',0);
	  if ($i <> $init) {
	  $list .= "<option value="."'$val'>".$val."</option>";
	  }else{
	  $list .= "<option value="."'$val' selected>".$val."</option>";	  
	  }
	}
	return $list;
  }
   //list/menu 資料由一組陣列來
  function get_array_list($arr,$init){
    $num = count($arr); 
    for ($i=0;$i<$num;$i++){
	  $val = $arr[$i];
	  if ($val <> $init) {
	  $list .= "<option value="."'$val'>".$val."</option>";
	  }else{
	  $list .= "<option value="."'$val' selected>".$val."</option>";	  
	  }
	}
	return $list;
  }
   //到資料庫找到對應代號說明,並組成select   list/menu
  function get_sql_list($table,$column1,$column2,$cond,$init){
	  $sql = "select distinct ".$column1.",".$column2." from ".$table." ".$cond." order by ".$column1;
	  $rs = get_pg_result($sql);
	  $rowmax = pg_num_rows ($rs); 
      //echo $sql;
    for ($i=0;$i<$rowmax;$i++){	
	  $data = pg_fetch_object($rs);
	  $val1 = $data->$column1; 
	  $val2 = $data->$column2;
	  if ($data->$column1 <> $init) {
	  $list .= "<option value="."'$val1'>".$val2."</option>";
	  }else{
	  $list .= "<option value="."'$val1' selected>".$val2."</option>";	  
	  }
	}
	return $list;
  }
     //到資料庫找到已選擇資料,並組成字串 供checkbox 決定checked   
  function get_sql_checkbox(){
      global $si_mobile;
	  $sql = "select class_code3 from e_news where mobile = "."'$si_mobile'" ;
	  $rs = get_pg_result($sql);
	  $rowmax = pg_num_rows ($rs); 
    for ($i=0;$i<$rowmax;$i++){	
	  $data = pg_fetch_object($rs);
	  $list .= $data->class_code3;
    }
	return $list;
  }
 //到資料庫找到對應代號說明,並組成 1,2,3,4,5...   list/menu
  function get_sql_list1($table,$column1,$column2,$cond){
	  $sql = "select distinct ".$column1.",".$column2." from ".$table." ".$cond." order by ".$column1;
	  $rs = get_pg_result($sql);
	  $rowmax = pg_num_rows ($rs); 
      //echo $sql;
    for ($i=0;$i<$rowmax;$i++){	
	  $data = pg_fetch_object($rs);
	  $list .=  $data->$column2."|(".get_classcode3_count($data->$column1).")|";
	 }
	return $list;
  }
   //到資料庫找到對應代號說明,並組成 1|1,2|2,3|3,4|4,5|5...   list/menu
  function get_sql_list2($table,$column1,$column2,$cond){
	  $sql = "select distinct ".$column1.",".$column2." from ".$table." ".$cond." order by ".$column1;
	  $rs = get_pg_result($sql);
	  $rowmax = pg_num_rows ($rs); 
      //echo $sql;
    for ($i=0;$i<$rowmax;$i++){	
	  $data = pg_fetch_object($rs);
	  $list .=  $data->$column1."|".$data->$column2."|";
	 }
	return $list;
  }

  //查看取送單狀態說明
  function get_sale_status($status){
       switch ($status) {
         case '1': $word = '出售中';
                   break;
         case '2': $word = '取銷出售';
                   break;
         case '3': $word = '訂購中';
                   break;
         case '4': $word = '配送中';
                   break;
         case '5': $word = '交易完成';
                   break;
         case '9': $word = '作廢';
		           break;
		 default: js_alert("請檢查您傳入的參數!(get_sale_status())");
       }
  return $word;
  }
  //取送單狀態,可處理事項
  function get_sale_status_way($status,$key,$want,$cur_page){
       global $si_mobile; 
	   if (isset($si_mobile) and trim($si_mobile<>'')) { 
       switch ($status) {
         case '1': //出售中
		       if ($want=="sell"){    
				   $word = "<a href=update_sale.php?sale_no=$key&act=12>取銷</a><br><a href<a href=update_sale.php?sale_no=$key&act=19>刪除</a>";
                }
			   if ($want=="buy"){
			       $word = "<a href=can_buy_query2.php?sale_no=$key&act=13&p=$cur_page>採購</a>";
                }    
				   break;
				
         case '2': //取銷出售
		        if ($want=="sell"){  
				   $word = "<a href=update_sale.php?sale_no=$key&act=21>恢復</a><br><a href<a href=update_sale.php?sale_no=$key&act=29>刪除</a>";
                 }
				   break;
		 case '3': //訂購中
        		 if ($want=="buy"){ 
				  $word = "<a href=update_sale.php?sale_no=$key&act=31>取銷</a>";
				 }
                   break;
		 case '4': //配送中
		           $word = '';
                   break;
         case '5': //交易完成
		           $word = '';
                   break;
         case '9': //作廢
		           $word = '';
                   break;				   
		 default: js_alert("請檢查您傳入的參數!(get_sale_status_way())");
       }
	 }
  return  $word;
  }

?>

