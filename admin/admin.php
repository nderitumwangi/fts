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
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Admins
                                        <div class="page-title-subheading">Current Admins to Funds Track System.
                                        </div>
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
    $sql = "SELECT * from users WHERE level= ' '";
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
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>
