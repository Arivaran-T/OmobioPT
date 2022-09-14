<?php

include "db.php";
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

$db = new DbConnect();
$conn = $db->connect();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $id=$_GET["id"];

        if(!isset($id)){
            
                echo json_encode(
                    array(
                        'error' => true,
                        'msg' => 'Id is Empty'
                    )
                );

        }
        else{
            $query = "select * from user where id='$id'";
            $result = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result);
            
                if($rows == 1) {
                    $array = mysqli_fetch_array($result);
                    $name = $array['name'];
                    $username = $array['username'];
                    $email = $array['email'];
                    echo json_encode(
                        array(
                            'error' => false,
                            'name' =>   $name,
                            'username' => $username,
                            'email' => $email
                        )
                    );
                } else {
                    echo json_encode(
                        array(
                            'error' => true,
                            'msg' => 'No user found'
                        )
                    );
                }
            
        }

        break;
}
