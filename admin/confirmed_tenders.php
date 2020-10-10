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
                                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Confirmed Tenders
                                        <div class="page-title-subheading">List Of Confirmed Tenders.
                                        </div>
                                    </div>
                                </div>
                                 <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".addModal">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-user fa-w-20"></i>
                                            </span>
                                            Add Tender
                                        </button>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>  

                         <div class="row">
                            
                            
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Confirmed Tenders</h5>
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
                                            
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
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
