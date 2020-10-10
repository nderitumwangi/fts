<?php

require_once '../config/connect.php';

if(isset($_POST['Submit']))
{

$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$dept=$_POST['dept'];
$level=$_POST['level'];
$pass=$_POST['pass'];

//$AddedBy=$_SESSION['alogin'];
    
$sql="INSERT INTO  users(First_name, Last_name, Email, Department, Level, Password) VALUES(:first, :last, :email, :dept, :level, :pass)";

$query = $dbh->prepare($sql);
$query->bindParam(':first',$first,PDO::PARAM_STR);
$query-> bindParam(':last', $last, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':dept',$dept,PDO::PARAM_STR);
$query->bindParam(':level',$level,PDO::PARAM_STR);
$query->bindParam(':pass',$pass,PDO::PARAM_STR);

$query->execute();


}

else
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE FROM users  WHERE user_no=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();


echo "<script> alert('You have  Successfully Deleted a User! ' ); </script>";

echo "<script type='text/javascript'> document.location = 'users.php'; </script>";

}

 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>FTS | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="no">
   
<link href="../main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
        <!--Header -->
      <?php  include '../includes/header.php' ?>
               
    <!--Layout -->
      <?php include '../includes/layout.php'?>
                       
        <div class="app-main">
            <!--Sidebar Menu -->
                    <?php include '../includes/sidebar.php'?>
                 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Users 
                                        <div class="page-title-subheading">Current Users On Funds Track System.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".addUserModal">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            Add User
                                        </button>
                                        
                                    </div>
                                </div>   
                             </div>
                        </div>           
                 <div class="row">
                            
                            
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Current Users</h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Number</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
   <?php
    $sql = "SELECT * from users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)

{
foreach($results as $result)
{               

    ?>                                          
                                            <tr>
                                                <td scope="row"><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result->user_no);?></td>
                                                <td><?php echo htmlentities($result->First_name);?></td>
                                                <td><?php echo htmlentities($result->Last_name);?></td>
                                                <td><?php echo htmlentities($result->Email);?></td>
                                                <td><?php echo htmlentities($result->Department);?></td>
                                                <td><?php echo htmlentities($result->Level);?></td>
                                                <td>
                                                    <a class="mb-2 mr-2 btn-transition btn btn-outline-primary" data-toggle="modal" data-target=".editUserModal" href="users.php?pid=<?php echo htmlentities($result->user_no);?>">
                                                        <i class="pe-7s-add-user "></i>
                                      
                                                        Update 
                                                    </a>
                                                    <a class="mb-2 mr-2 btn-transition btn btn-outline-primary" href="users.php?del=<?php echo $result->user_no;?>" `onclick="return confirm('Confirm  you want to delete the user');">

                                                        <i class="pe-7s-add-user ">
                                                         </i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                     <?php $cnt=$cnt+1; } }?>
                                            </tbody>
                                        </table>
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
<!-- Add User modal -->

<div class="modal fade addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Add User Form</h5>
                                <form class="needs-validation" method="POST" action="" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" name="first" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid name!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control"  name="last" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid name!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Email</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control"  name="email" placeholder="" aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please choose an email.
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks Good.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Department</label>
                                            <input type="text" class="form-control" name="dept" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid department.
                                            </div>
                                             <div class="valid-feedback">
                                                Looks Good.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Level</label>
                                            <input type="text" class="form-control" name="level" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                             <div class="valid-feedback">
                                                Looks Good.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Password</label>
                                            <input type="text" class="form-control" name="pass" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid password.
                                            </div>
                                            <div class="valid-feedback">
                                               Looks Good.
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" name="Submit" class="btn btn-primary">Save changes</button>
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

<!-- Edit User modal -->

<div class="modal fade addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Add User Form</h5>
                                <form class="needs-validation" method="POST" action="" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" name="first" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid name!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control"  name="last" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid name!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Email</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control"  name="email" placeholder="" aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please choose an email.
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks Good.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Department</label>
                                            <input type="text" class="form-control" name="dept" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid department.
                                            </div>
                                             <div class="valid-feedback">
                                                Looks Good.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Level</label>
                                            <input type="text" class="form-control" name="level" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                             <div class="valid-feedback">
                                                Looks Good.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Password</label>
                                            <input type="text" class="form-control" name="pass" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid password.
                                            </div>
                                            <div class="valid-feedback">
                                               Looks Good.
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Edit" name="Edit" class="btn btn-primary">Save changes</button>
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

<!-- Edit User modal -->

<div class="modal fade deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModatl" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Confirm Delete User</h5>
                                 <p>Confirm you want to delete this user</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete User</button>
                                </div>
                                
            
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