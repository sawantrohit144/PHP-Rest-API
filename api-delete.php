
<?php

header('Content_Type: application/json');
header('Acess_Control-Allow-Origin: *');
header('Access_Control-Allow-Methods: DELETE');
header('Access_Control-Allow-Headers: Access_Control-Allow-Headers, Content_Type, Access_Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$student_id =$data['sid'];

include "config.php";

$sql = "delete from students where id={$student_id}";

if(mysqli_query($conn, $sql))
{
  echo json_encode(array('message' => 'Record Deleted', 'status'=> true ));
}
else {
  echo json_encode(array('message' => 'No Record Deleted', 'status'=> false ));
}
 ?>
