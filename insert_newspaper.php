<?php include("function.php");
       include('variable.php');
//����e,���R���ӥΤᤧ�e�q�\���
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
  js_alert("�P�±z���ϥ�,�q�\�q�l�����\!");
  echo "<script language='javascript'>self.location.href='quick_view.htm';</script>";
  }else{
  js_alert("�ܩ�p,�z�q�\�q�l������,�бz�A�դ@��!");
  echo "<script language='javascript'>self.location.href='newspaper_class.php';</script>";
}
?>