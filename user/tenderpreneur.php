<?php

require_once '../config/connect.php';

if(isset($_POST['Submit']))
{
$tp_no=$_POST['tp_no'];
$tp_name=$_POST['tp_name'];
$kra_cert=$_POST['kra_cert'];
$certificate=$_POST['certificate'];
$contact=$_POST['contact'];
$email=$_POST['email'];


$sql="INSERT INTO  tenderpreneurs(tp_number, tp_name, kra_cert, certificate,  contact ,email ) VALUES(:tp_no, :tp_name, :kra_cert, :certificate, :contact, :email)";

$query = $dbh->prepare($sql);
$query->bindParam(':tp_no',$tp_no,PDO::PARAM_STR);
$query->bindParam(':tp_name',$tp_name,PDO::PARAM_STR);
$query-> bindParam(':kra_cert', $kra_cert, PDO::PARAM_STR);
$query->bindParam(':certificate',$certificate,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->execute();

//echo "<script> alert('You have  Successfully Added Ship sss' ); </script>";

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    
echo "<script> alert('You have  Successfully Added A Tenderpreneur' ); </script>";
}
else 
{
echo "<script> alert('There was a problem' ); </script>";
}
}

else
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE FROM users  WHERE user_np=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();


echo "<script> alert('You have  Successfully Deleted a User! ' ); </script>";



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
   
<link href="../main.css" rel="stylesheet">


</head>
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
                                    <div>Tenderpreneurs
                                        <div class="page-title-subheading">Current Tenderpreneur On Funds Track System.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".addUserModal">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            Add Tenderpreneur
                                        </button>
                                        
                                    </div>
                                </div>   
                             </div>
                        </div>           
                 <div class="row">
                            
                            
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Current Tenderpreneurs </h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TP No</th>
                                                <th>TP Name</th>
                                                <th>KRA pin</th>
                                                <th>Certificate</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Added By</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
   <?php
    $sql = "SELECT * from tenderpreneurs";
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
                                                <td><?php echo htmlentities($result->tp_no);?></td>
                                                <td><?php echo htmlentities($result->tp_name);?></td>
                                                <td><?php echo htmlentities($result->kra_cert);?></td>
                                                <td><?php echo htmlentities($result->certificate);?></td>
                                                <td><?php echo htmlentities($result->email);?></td>
                                                <td><?php echo htmlentities($result->contact);?></td>
                                                <td><?php echo htmlentities($result->added_by);?></td>
                                                <td>
                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-primary" data-toggle="modal" data-target=".editUserModal">
                                                        <i class="pe-7s-add-user "></i>
                                      
                                                        Update 
                                                    </button>
                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-primary" data-toggle="modal" data-target=".deleteUserModal">
                                                        <i class="pe-7s-add-user ">
                                                         </i>
                                                        Delete
                                                    </button>
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
                
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>
<!-- Add Tenderpreneur modal -->

<div class="modal fade addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Tenderpreneur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Add Tenderpreneur Form</h5>
                                <form class="needs-validation"   method="POST" action="" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">TenderPreneur Number</label>
                                            <input type="text" class="form-control"  placeholder="" value="" name="tp_no" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                    Please choose a number.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">TenderPreneur Name</label>
                                            <input type="text" class="form-control"  placeholder="" value="" name="tp_name"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                    Please choose a name.
                                                </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">KRA pin</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend"  name="kra_cert" required>
                                                <div class="invalid-feedback">
                                                    Please choose a pin.
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks Good.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Certificate</label>
                                            <input type="text" class="form-control" placeholder="" name="certificate" required>
                                            <div class="valid-feedback">
                                                    .
                                                </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid certificate.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Contact</label>
                                            <input type="text" class="form-control"  placeholder=""  name="contact" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid contact.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Email</label>
                                            <input type="text" class="form-control"  placeholder=""  name="email" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid email.
                                            </div>
                                        </div>
                                    </div>
                                  
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" name="Submit" class="btn btn-primary">Add TenderPreneur</button>
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

<div class="modal fade editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModatl" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Edit User Form</h5>
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                </div>
                                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">City</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">State</label>
                                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Zip</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid zip.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                Agree to terms and conditions
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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






