<?php include("function.php");
       include('variable.php');
$out_ym = $out_year.$out_month;
$sql = "insert into book (isbn,class_code1,class_code2,class_code3,p_code,
                          bname,author,language,org_price,out_ym,cd,created) 
         values('$isbn','$class_code1','$class_code2','$class_code3','$p_code',
                '$bname','$author','$language','$org_price','$out_ym','$cd','$si_mobile')";
				
$rs = get_pg_result($sql);

if ($rs > 0) {
  js_alert("�إ߮��y�򥻸�Ʀ��\!");
     echo "<script language='javascript'>self.location.href='sale_data2.php?isbn=$isbn&class_code3=$class_code3&cd=$cd';</script>";
  }else{
  js_alert("�إ߮��y�򥻸�ƥ���!");
}
?>