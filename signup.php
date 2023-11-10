<?php

require './includes/config.php';
session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;
$password = $phpRequestObjest->password;
$remmberme = $phpRequestObjest->remmberme;

if (empty($email)) {
    $response->msg = "Please Enter Email";
} else if (empty($password)) {
    $response->msg = "Please Enter Password";
} else if ($remmberme == 0) {
    $response->msg = "Please Accept Terms And Conditions";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response->msg = "Please Enter Valid email";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    $response->msg = "Password length must be between 5 and 20";
} else {

    $hash = password_hash($password, PASSWORD_ARGON2I);

    $check = "SELECT * FROM users WHERE email = '$email'";
    $r = mysqli_query($conn, $check);

    if (mysqli_num_rows($r) == 1) {
        $response->msg = "Entered Email Already Exists";
    } else {

        $oauth_provider = 'system'; 

        $query = "INSERT INTO users(oauth_provider,email,password,created, modified) VALUES ('$oauth_provider','$email','$hash', NOW(), NOW())"; 

        if (mysqli_query($conn, $query)) {

            $response->msg = "success";
        } else {
            $response->msg = "Failed";
        }
    }
}


$response_json = json_encode($response);
echo ($response_json);

?>
