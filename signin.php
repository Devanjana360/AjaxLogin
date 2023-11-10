<?php

require './includes/config.php';
session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;
$password = $phpRequestObjest->password;
$remmberme = $phpRequestObjest->remmberme;


$sql = "Select * from users where email='$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            if ($remmberme == 1) {
                $_SESSION['email'] = $email;
                setcookie("email", $email, time() + 86400);
                setcookie("password", $password, time() + 86400);
                $response->msg = "success";

            }else{
               $_SESSION['email'] = $email;
                $response->msg= "success";
            }

        } else {
            $response->msg = "Invalid Password";
        }
    }
} else {
    $response->msg = "Invalid Email";
}

$response_json = json_encode($response);
echo ($response_json);

?>
