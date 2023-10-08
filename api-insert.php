<?php

header('Content_Type: application/json');
header('Access_Control-Allow-Origin: *');
header('Access_Control-Allow-Methods: POST');
header('Access_Control-Allow-Headers: Access_Control-Allow-Headers, Content_Type, Access_Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include "config.php";

$sql = "insert into students(student_name, age, city) values('{$name}',{$age},'{$city}')";

if(mysqli_query($conn, $sql))
{
  echo json_encode(array('message' => 'Inserted Record', 'status'=> true));
}
else {
  echo json_encode(array('message' => 'No Record Found', 'status'=> false ));
}
 ?>
