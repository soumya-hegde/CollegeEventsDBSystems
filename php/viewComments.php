<?php
require "connDB.php";

$event_id = $_GET["event_id"];

$mysql_qry = "SELECT *
              FROM Event
              WHERE $event_id = Event.Event_id";
$result = mysqli_query($conn, $mysql_qry);
if ($result) {
			while ($row=mysqli_fetch_assoc($result))
			     {
						 $array[] = $row;
            //  echo json_encode($row);
					 }
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if ($array != NULL) {
	header('Content-Type:Application/json');
	echo json_encode($array);
}

mysqli_close($conn);
?>
