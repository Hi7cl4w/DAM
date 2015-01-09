<?php
header("Content-Type: application/json", true);
require_once('config.php');
$id=$_POST['id'];

$sql = "SELECT `action_id`,`prn`, `name`, `action` , `department`, `addedtime` FROM `action_tbl` WHERE prn = '".$id."'; ";
$query = mysql_query($sql);
while($fetch = mysql_fetch_array($query))
{
		$output[] = array ($fetch["action_id"],$fetch["prn"],$fetch["name"],$fetch["action"],$fetch["department"],$fetch["addedtime"]);
}

echo json_encode($output);
?>