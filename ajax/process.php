<?php
header("Content-Type: application/json", true);
require_once('config.php');
$sel=$_POST['table'];
if($sel==1){
 $tbl="admin_tbl";
}
else if($sel==2){
	$tbl="student_tbl";
}
else if($sel==3){
	$tbl="staff_tbl";
}
$sql = "SELECT ".$tbl.".prn ,".$tbl.".fname , ".$tbl.".lname , users.actype , users.status
FROM users 
INNER JOIN ".$tbl." 
ON users.prn = ".$tbl.".prn";
$query = mysql_query($sql);
while($fetch = mysql_fetch_array($query))
{
		$output[] = array ($fetch["prn"],$fetch["fname"],$fetch["lname"],$fetch["actype"],$fetch["status"]);
}

echo json_encode($output);
?>