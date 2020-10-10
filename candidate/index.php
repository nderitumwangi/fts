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
                                    <div>Candidate Dashboard
                                        <div class="page-title-subheading">Welcome Candidate to Funds Track System.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <div class="d-inline-block dropdown">
                                        <a href="../config/logout.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow  btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Logout
                                        </a>
                                        
                                    </div>
                                </div>   
                             </div>
                        </div>           
                         <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">My Total Tenders</div>
                                            <div class="widget-subheading">Total Tenders remmited </div>
                                        </div>
<?php $sql1 = "SELECT t_no from tenders";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$TotalTendersCount=$query1->rowCount();
                    ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo htmlentities($TotalTendersCount);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">My Completed Tenders</div>
                                            <div class="widget-subheading"> Tenders completed and approved</div>
                                        </div>
                                        <div class="widget-content-right">
<?php $sql1 = "SELECT t_no from tenders WHERE status='Completed' ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$CompletedTendersCount=$query1->rowCount();
                    ?>
                                            <div class="widget-numbers text-white"><span><?php echo htmlentities($CompletedTendersCount);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">My On Progress Tenders</div>
                                            <div class="widget-subheading">Tenders currently being carried out</div>
                                        </div>
<?php $sql1 = "SELECT t_no from tenders WHERE status='On Progress' ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$OnProgressTendersCount=$query1->rowCount();
                    ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo htmlentities($OnProgressTendersCount);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                         <div class="divider mt-0" style="margin-bottom: 30px;"></div>
                         <div class="main-card mb-3 card">
                                <div class="no-gutters row">
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
<?php 
$sql = "SELECT SUM(projected_price) AS sum FROM tenders  ";
$query = $dbh -> prepare($sql);
$query->execute();
$sum=0;
 $row= $query->fetch(PDO::FETCH_ASSOC);
    $sum += $row['sum'];


                    ?>         
                                                                    <div class="widget-heading">Total Projected Price</div>
                                                                    <div class="widget-subheading">Last year expenses</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-success"> <?php echo $sum ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Clients</div>
                                                                    <div class="widget-subheading">Total Clients Profit</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary">$12.6k</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Followers</div>
                                                                    <div class="widget-subheading">People Interested</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-danger">45,9%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Products Sold</div>
                                                                    <div class="widget-subheading">Total revenue streams</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-warning">$3M</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pt-0 pb-0 card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Total Orders</div>
                                                                    <div class="widget-subheading">Last year expenses</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-success">1896</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-outer">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Clients</div>
                                                                    <div class="widget-subheading">Total Clients Profit</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="widget-numbers text-primary">$12.6k</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
