<?php

session_start();

if (isset($_SESSION["email"])) {

    $output     = '<h2>Log In Using System </h2>';
    $output .= '<p><b>Email:</b> ' . $_SESSION['email'] . '</p>';


   
} else {

    if (isset($_SESSION["jsonData"])) {

        // Retrieve the JSON data from the session
        $retrievedData = $_SESSION['jsonData'];

        // Deserialize the retrieved data
        $deserializedData = json_decode($retrievedData, true);

        if (!empty($deserializedData)) {
            $output     = '<h2>Google Account Details</h2>';
            $output .= '<div class="ac-data">';
            $output .= '<img src="' . $deserializedData['picture'] . '">';
            $output .= '<p><b>Email:</b> ' . $deserializedData['email'] . '</p>';
            $output .= '<p><b>Logged in with:</b> Google Account</p>';
        }
    }else{
        header('Location: login.php');
        exit();
    }
}




?>

<div class="container">
    <!-- Display login button / Google profile information -->
    <?php echo $output; ?>
    <a href="logout.php">logout</a>
</div>