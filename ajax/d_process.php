<?php
header("Content-Type: application/json", true);
require_once('config.php');

$sql = "SELECT `action_id` ,`prn`, `name`, `action` , `department` , `status`, `addedtime`  FROM `action_tbl` ; ";
$query = mysql_query($sql);
while($fetch = mysql_fetch_array($query))
{
$output[] = array ($fetch["action_id"],$fetch["prn"],$fetch["name"],$fetch["action"],$fetch["department"],$fetch["addedtime"],$fetch["status"]);
}

echo json_encode($output);
?>