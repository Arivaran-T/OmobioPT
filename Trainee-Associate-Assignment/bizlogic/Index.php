<?php

include "db.php";
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

$db = new DbConnect();
$conn = $db->connect();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    // case 'POST':
    //     $user = json_decode(file_get_contents('php://input'));
    //     $sql = "SELECT * FROM Exam WHERE email LIKE '$user->email' AND password LIKE '$user->password' ";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_affected_rows($conn) > 0) {
    //         $obj = mysqli_fetch_object($result);
    //         $_SESSION['id'] = $obj->id;
    //         echo json_encode($obj);
    //     } else {
    //         throw new Exception("Invalid password");
    //     }
    //     break;
    // case 'GET':
    //     $user = json_decode(file_get_contents('php://input'));
    //     $id = $_SESSION['id'];
    //     $sql = "SELECT * FROM Exam WHERE id LIKE '$id' ";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_affected_rows($conn) > 0) {
    //         $obj = mysqli_fetch_object($result);
    //         echo json_encode($obj);
    //     }
    //     break;

    case 'GET':
        $email = $_GET["email"];
        $password = $_GET["password"];
        $id=$_GET["id"];

        if(!isset($id)){
            if(!isset($email) || !isset($password)) {
                echo json_encode(
                    array(
                        'error' => true,
                        'msg' => 'Email and Password are Empty'
                    )
                );
            }else {
                $query = "select * from user where email='$email' AND password='$password'";
                $result = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            
                if($rows == 1) {
                    $array = mysqli_fetch_array($result);
                    $id = $array['id'];
                    echo json_encode(
                        array(
                            'error' => false,
                            'id' => $id,
                            'msg' => 'Login Sucess'
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

        }
        else{

        }

        
        
        
        
       
        break;
}
