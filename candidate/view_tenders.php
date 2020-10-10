<?php

require_once '../config/connect.php';


if(isset($_POST['Submit']))
{

$t_no =$_POST['t_no'];
$tp_no =$_POST['tp_no'];
$quoted_amount =$_POST['quoted_amount'];



//$AddedBy=$_SESSION['alogin'];
    
$sql="INSERT INTO  applications(t_no, tp_no, quoted_amount) VALUES(:t_no, :tp_no, :quoted_amount)";

$query = $dbh->prepare($sql);
$query->bindParam(':t_no',$t_no,PDO::PARAM_STR);
$query->bindParam(':tp_no',$tp_no,PDO::PARAM_STR);
$query->bindParam(':quoted_amount',$quoted_amount,PDO::PARAM_STR);

if($query->execute())
{
    
echo "<script> alert('You have  Successfully Applied for the  Tender' ); </script>";
}

else 
{
echo "<script> alert('There was a problem' ); </script>";
}
}

else
if(isset($_GET['apply']))
{
$id=$_GET['apply'];
echo '$id';
editUserModal();

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
                                        <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Tenders
                                        <div class="page-title-subheading">Current Tenders On Funds Track System.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                        
                                    <div class="d-inline-block dropdown">
                                        <a type="button" class="btn mr-2 mb-2 btn-primary" href="view_my_applications.php">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            My Tender Applications
                                        </a>
                                        
                                    </div>
                                </div>   
                             </div>
                        </div>           
                 <div class="row">
                            
                            
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Current Tenders</h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tender No</th>
                                                <th>Tender Name</th>
                                                <th>Tender Category</th>
                                                <th>Tender Description</th>
                                                <th>Quantity</th>
                                                <th>Measurement</th>
                                                <th>Projected Price</th>
                                                <th>Status</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
   <?php
    $sql = "SELECT * from tenders";
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
                                                <td><?php echo htmlentities($result->t_no);?></td>
                                                <td><?php echo htmlentities($result->t_name);?></td>
                                                <td><?php echo htmlentities($result->t_category);?></td>
                                                <td><?php echo htmlentities($result->t_description);?></td>
                                                <td><?php echo htmlentities($result->quantity);?></td>
                                                <td><?php echo htmlentities($result->projected_price);?></td>
                                                <td><?php echo htmlentities($result->status);?></td>
                                                <td><?php echo htmlentities($result->measurement);?></td>
                                                <td><?php echo htmlentities($result->deadline_date);?></td>
                                                
                                                <td>
                                                    <button class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".editUserModal">
                                                        Apply 
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
                    <?php include '../includes/candidate/footer.php'?>
                      
                     </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>

<!-- Apply Tender modal -->

<div class="modal fade editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModatl" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Apply Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Apply Tender Form</h5>
                                <form class="needs-validation" method="POST" action="" novalidate>
                                    
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom03">Tender No</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="" name="t_no" required>
                                            <div class="invalid-feedback">
                                                Please provide a tender no.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">TenderPreneur No</label>

                                            <input type="text" class="form-control" id="validationCustom04" placeholder="" name="tp_no" value=" " required>
                                            <div class="invalid-feedback">
                                                Please provide a tenderpreneur number.
                                            </div>
 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom05">Your Qoute in KSh.</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="" name="quoted_amount" required>
                                            <div class="invalid-feedback">
                                                Please provide amount.
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

