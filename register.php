<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async></script>
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

    
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input name="email" id="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input name="password" id="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
            <input type="checkbox" id="myCheckbox">
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>

            <button class="buttont" onclick="sendRegisterrequest();"> Register</button>

            <div id="form-message" class="form-message"></div>
   

        <div class="privacy">
            <a href="#">Privacy Policy</a>

        </div>

        <div>
            
            <div id="g_id_onload" data-client_id="981433577522-c3sc7ltq656j61chpk0h08aguf6ffvhi.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="false"></div>
           
            <div class="g_id_signin" data-text="Sign In" data-theme="white" data-size="medium" data-shape="pill">
                Sign in
            
        
        </div>
    </div>

        <div class="register">
            Do you already have an account?
            <a href="login.php"><button id="register-link">Log In here</button></a>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>

</body>

</html>

<?php
session_start();
if(isset($_SESSION['email'])){

   
    header("location:index.php");
    exit();

}else{

        if (isset($_SESSION["jsonData"])) {
            header("location:index.php");
            exit();
        }
}
?>
