<?php
require_once '../config/connect.php';

session_start();

$email=$_SESSION['alogin'];
$sql ="SELECT * FROM users WHERE Email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
  {
   $id= ($result->user_no);
   $fname = ($result->First_name);
   $lname = ($result->Last_name);
   $dept = ($result->Department);
   $level = ($result->Level);
}}

?>