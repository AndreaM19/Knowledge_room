<?php
$parm=$_GET['reg'];
$conn=mysql_connect("localhost", "root", "andr3a");
$db_ok=mysql_select_db("Knowledge_room", $conn);
$query="SELECT subCategoryName FROM subCategory WHERE topCategory='".$parm."'";
//$query="select Prov from Province where Reg='".$parm."'";
$ris=mysql_query($query);
$recnum=mysql_num_rows($ris);
header ('Content-Type: application/json');
echo "{";

for ($i=0;$i<$recnum;$i++) {
	if ($i != 0) {echo ',';}
	echo '"prov'.$i.'": "'.mysql_result($ris,$i,"subCategoryName").'"';
}
echo "}";
mysql_close($conn);
?>