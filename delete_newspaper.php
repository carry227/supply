<?php include("function.php");
       include('variable.php');
//����e,���R���ӥΤᤧ�e�q�\���
    $sql = "delete from e_news where mobile ="."'$si_mobile'";
	$rs = get_pg_result($sql);

if ($rs > 0) {
  js_alert("�P�±z���e�q�\�q�l��,�z�w���P�q�\���\!");
  }else{
  js_alert("�ܩ�p,�z���P�q�\����,�бz�A�դ@��!");
}
echo "<script language='javascript'>self.location.href='quick_view.htm';</script>";
?>