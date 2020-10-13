<?php

require_once './config/connect.php';

if(isset($_POST['Submit']))
{

$tp_name=$_POST['tp_name'];
$kra_cert=$_POST['kra_cert'];
$certificate=$_POST['certificate'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$pass=md5($_POST['pass']);


$sql="INSERT INTO  tenderpreneurs( tp_name, kra_cert, certificate,  contact ,email,pass ) VALUES( :tp_name, :kra_cert, :certificate, :contact, :email, :pass)";

$query = $dbh->prepare($sql);
$query->bindParam(':tp_name',$tp_name,PDO::PARAM_STR);
$query-> bindParam(':kra_cert', $kra_cert, PDO::PARAM_STR);
$query->bindParam(':certificate',$certificate,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':pass',$pass,PDO::PARAM_STR);

$query->execute();


$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    
echo "<script> alert('You have  Successfully Registered' ); </script>";
header('location:candidate_login.php');
}
else 
{
echo "<script> alert('There was a problem' ); </script>";
}
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <title>FTS | Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/img-01.jpg');">
            <div class="wrap-login100 p-t-1 p-b-30">
                <form class="login100-form validate-form" method="POST" action="">
                    <div class="login100-form-avatar">
                        <img src="assets/images/fund.jpg" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Funds Track System | Tenderpreneur
                    </span>
                     <div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
                        <input class="input100" type="text" name="tp_name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                     <div class="wrap-input100 validate-input m-b-10" data-validate = "KRA certificate is required">
                        <input class="input100" type="text" name="kra_cert" placeholder="KRA Cert">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                     <div class="wrap-input100 validate-input m-b-10" data-validate = "certificate is required">
                        <input class="input100" type="text" name="certificate" placeholder="Certificate">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Contact is required">
                        <input class="input100" type="text" name="contact" placeholder="Contact">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" name ="Submit"  class="login100-form-btn">
                           Register
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="#" class="txt1">
                            Forgot Username / Password?
                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href="index.html">
                            Back to Home
                            <i class="fa fa-long-arrow-right"></i>                      
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/js/main.js"></script>

</body>
</html>