<?php
  header('Content-Type:application/json;charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods:GET,POST');
  header('Access-Control-Allow-Headers: *');
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "ConnectDB.php";
    $input = file_get_contents('php://input');
    $input=json_decode($input);
    $idx = $input->id;
    $date = $input->date;
    $edit = $input->CanEdit;
    $sql = "UPDATE post SET Verify='1',Date='$date',CanEdit='$edit'  WHERE id='$idx'";
    $result = $conn->query($sql);
    echo json_encode(array('message'=>"審核貼文通過!"));
    http_response_code(201);
    $conn->close();
  }
?>