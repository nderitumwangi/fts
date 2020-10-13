<?php
require_once '../config/connect.php';


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

if(isset($_POST['SubmitProfile']))
{


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dept=$_POST['dept'];
$level=$_POST['level'];


//$AddedBy=$_SESSION['alogin'];
    
$sql="UPDATE  users SET First_name=:fname , Last_name=:lname , Email=:email, Department=:dept, Level=:level WHERE user_no=3";

$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query-> bindParam(':lname', $lname, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':dept',$dept,PDO::PARAM_STR);
$query->bindParam(':level',$level,PDO::PARAM_STR);


if($query->execute())
{
    
echo "<script> alert('You have  Successfully updated your Profile' ); </script>";
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>FTS | Candidate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="no">
   
<link href="../main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
        <!--Header -->
      <?php  include '../includes/candidate/header.php' ?>
               
    <!--Layout -->
      <?php include '../includes/candidate/layout.php'?>
                       
        <div class="app-main">
            <!--Sidebar Menu -->
                    <?php include '../includes/candidate/sidebar.php'?>
                 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>My Profile
                                        <div class="page-title-subheading">View My Profile at Funds Track System.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                         <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".profileModal">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            Edit My Profile
                                        </button>
                                        
                                    </div>
                                </div>   
                             </div>
                        </div>  
<?php
//session_start();
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
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">My Profile</h5>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <img src="../assets/images/avatar-01.jpg">
                                            </div>

                                           <div class="col-lg-2">
                                                 First Name:
                                                 <br/>
                                            <?php echo $fname; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                 Last Name:
                                                 <br/>
                                            <?php echo $lname; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                Email:
                                                <br/>
                                                <?php echo $email; ?>
                                            </div>
                                            <div class="col-lg-2">
                                               <h> Department:</h>
                                                <br/>
                                                <?php echo $dept; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                Level:
                                                <br/>
                                                <?php echo $level; ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--Footer -->
                    <?php include '../includes/footer.php'?>
                      
                     </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>


<div class="modal fade profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Edit My Profile</h5>
                                <form class="needs-validation" novalidate method="POST" action="">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" name="fname" id="validationCustom01" placeholder="First name" value=" <?php echo $fname; ?>" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control" name="lname"  id="validationCustom02" placeholder="Last name" value=" <?php echo $lname; ?>" required>
                                            <div class="invalid-feedback">
                                                    Please choose a valid name.
                                                </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Email</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" id="validationCustomUsername" name="email"  placeholder="Email" value="<?php echo $email; ?>" aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please choose a email.
                                                </div>
                                                  <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Department</label>
                                            <input type="text" class="form-control" name="dept"  id="validationCustom03" placeholder="Department" value="<?php echo $dept; ?>" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid department.
                                            </div>
                                              <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                       <div class="col-md-3 mb-3 position-relative form-group">
                                            <label for="validationCustom05">Level</label>
                                            <select  class="form-control" name="level"  required>
                                                        <option> <?php echo $level; ?></option>
                                                        <option>Admin</option>
                                                        <option>Staff</option>
                                                        <option>Candidate</option>
                                                    </select>
                                             <div class="valid-feedback">
                                                Looks Good! .
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid quantity.
                                            </div>
                                        </div>
                                       
                                    </div>
                                   
                                    
                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" name="SubmitProfile"  class="btn btn-primary">Save Profile Changes</button>
                                </div>
                                </form>
            
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </div>
                        </div>
            </div>
           
        </div>
    </div>
</div>