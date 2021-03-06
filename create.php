<?php
  //  header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-dataed-With");

    include_once 'config/database.php';
    include_once 'class/records.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Record($db);

    // Get the posted data.
    $data = json_decode(file_get_contents("php://input"));

  // Extract the data.
    //$item->case_number_id = $data->case_number_id;
    $item->case_file_number = $data->case_file_number;
    $item->case_first_name = $data->case_first_name;
    $item->case_last_name = $data->case_last_name;
    $item->case_subcategory = $data->case_subcategory;
    $item->case_creation_date = date('Y-m-d H:i:s');
    $item->case_closed_date = $data->case_closed_date;
    $item->case_box = $data->case_box;
    $item->case_author = $data->case_author;

    if($item->createCaseNumber()){
        echo json_encode('Case number created successfully');
    } else{
        echo json_encode('Case number could not be created');
    }
?>