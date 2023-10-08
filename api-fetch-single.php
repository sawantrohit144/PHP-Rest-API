<?php

header('Content_Type: application/json');
header('Access_Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$student_id =$data['sid'];

include "config.php";

$sql = "select * from students where id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
if(mysqli_num_rows($result)>0)
{
  $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($output);
}
else {
  echo json_encode(array('message' => 'No Record Found', 'status'=> false ));
}
 ?>
