<?php

header('Content_Type: application/json');
header('Access_Control-Allow-Origin: *');
header('Access_Control-Allow-Methods: PUT');
header('Access_Control-Allow-Headers: Access_Control-Allow-Headers, Content_Type, Access_Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include "config.php";

$sql = "update students set student_name='{$name}',age={$age}, city='{$city}' where id ={$id}";

if(mysqli_query($conn, $sql))
{
  echo json_encode(array('message' => 'Updated Record', 'status'=> true));
}
else {
  echo json_encode(array('message' => 'No Record Updated', 'status'=> false ));
}
 ?>
