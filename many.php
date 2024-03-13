<html>
<head>
<meta http-equiv="refresh" content="60; url=many.php">
<link rel="stylesheet" href="../css/style6.css" type="text/css"> 
<meta http-equiv="Content-Type" content="text/html; charset=big5"></head>
<body bgcolor="#006699">
<center>
<?
$time=gettimeofday(void);
$tmp=file("time.txt");
if ($tmp[0]=="")
{

  $fopen0=fopen("time.txt","w+");
  fputs($fopen0,$time[sec]);
  fclose($fopen0);

  $fopen1=fopen("ip.txt","w+");
  fputs($fopen1,"");
  fclose($fopen1);
}


$tmp1=file("time.txt");
$equal=($time[sec]-$tmp1[0]);
if ($equal>60)
{

  $fopen0=fopen("time.txt","w+");
  fputs($fopen0,"");
  fclose($fopen0); 
}

$fopen=fopen("ip.txt","a+");
$ip=$REMOTE_ADDR;

$flag=1;
$tmp2=file("ip.txt");
$con=count($tmp2);

for ($i=0;$i<$con;$i++)
{
  if ($ip."\n"==$tmp2[$i])
  {
    $flag=0;
    break;
  }
}

if ($flag==1)
{
  $ipstring=$ip."\n";
  fputs($fopen,$ipstring);
}
fclose($fopen);

$tmp3=file("ip.txt");
$value=count($tmp3);

echo "<select>";
echo "<option value=$value>目前線上人數".$value."</option>";
for ($i=0;$i<$value;$i++) 
{echo "<option value=$tmp3[$i]>$tmp3[$i]</option>";} 
echo " </select>"; 

?>
</center>
</body>
</html>