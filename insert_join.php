<?php
include("function.php");
$birthday = $b_year.$b_month.$b_day;
$sql = "insert into member (mobile,name,birthday,sex,htel_code,
                            htel_first,htel_last,ctel_code,ctel_first,
							ctel_last,ctel_ext,email,code1,address1,
							code2,address2,code3,address3,in_date,password) 
         values('$mobile','$name','$birthday','$sex','$htel_code',
                '$htel_first','$htel_last','$ctel_code','$ctel_first',
				'$ctel_last','$ctel_ext','$email','$postcode1','$address1',
				'$postcode2','$address2','$postcode3','$address3',now(),'$password')";
				
$rs = get_pg_result($sql);

if ($rs > 0) {
  js_alert("�ӽФJ�|���\,�еn�J�~�i�ϥΥ����Ҧ��\��,����!");
  echo "<script language='javascript'>self.location.href='member_logon.htm?isbn=$isbn';</script>";
  }else{
  js_alert("�ӽФJ�|����!,�бzemail���D���޲z�H��,����!");
}
?>

 
 
 