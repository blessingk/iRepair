<?php
include("../doc_expire.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('../head.html');
?>
<body>
<!-- container section start -->
<section id="container" class="">

    <?php
    include('header.php');
    ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Overdue section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Overdue Jobs</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <!--<li class="active">
                                    <a data-toggle="tab" href="#recent-activity">
                                        <i class="icon-home"></i>
                                        Daily Activity
                                    </a>
                                </li>-->
                                <li>
                                    <a data-toggle="tab" href="#daily">
                                        <i class="icon-user"></i>
                                       Minimum
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#weekly">
                                        <i class="icon-envelope"></i>
                                       Medium
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#monthly">
                                        <i class="icon-envelope"></i>
                                        Maximum
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="daily" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Minimum Overdue (48 hours)</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i> Serial Number</th>
                                                    <th><i class="icon_cursor"></i> Notes</th>
                                                    <th><i class="icon_calendar"></i> Completion Date</th>
                                                    <th><i class="icon_percent"></i> Status</th>
                                                </tr>
                                                <?php
                                                $query="SELECT * FROM progress where status<100 and ( date = (CURDATE() - INTERVAL 2 DAY) or date >= (CURDATE() - INTERVAL 6 DAY)) ORDER BY progress_id DESC ";
                                                //var_dump($query3);die();
                                                $res = $pdo->query($query);
                                                // $row = $res->fetch();
                                                //if($res->rowCount() > 0){
                                                while($rows = $res->fetch()) {
                                                // $enquiry = $row['enquiry_number'];
                                                //$first = $row['unames'];
                                                $user = $rows['username'];
                                                $model = $rows['model'];
                                                $type = $rows['device_name'];
                                                $status = $rows['status'];
                                                $est = $rows['estimation'];
                                                $detail = $rows['detail'];
                                                // }
                                                if($res->rowCount() == 0){
                                                    echo "Minimum overdue not available ";
                                                }elseif ($res->rowCount() > 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $user; ?></td>
                                                    <td><?php echo $type; ?></td>
                                                    <td><?php echo $model; ?></td>
                                                    <td><?php echo $detail; ?></td>
                                                    <td><?php echo $est; ?></td>
                                                    <td>
                                                        <div class="progress">

                                                            <div class="progress-bar"
                                                                 style="width: <?php echo $status; ?>%;">

                                                                <?php echo $status; ?>% complete

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                         <div class="btn-group">
                                                             <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                             <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                                         </div>
                                                     </td>-->
                                                </tr>
                                                <?php
                                                }
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="weekly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Medium Overdue (1 Week)</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i> Serial Number</th>
                                                    <th><i class="icon_cursor"></i> Notes</th>
                                                    <th><i class="icon_calendar"></i> Completion Date</th>
                                                    <th><i class="icon_percent"></i> Status</th>
                                                </tr>
                                                <?php
                                                $query="SELECT * FROM progress where status<100 and ( date = (CURDATE() - INTERVAL 7 DAY) or date >= (CURDATE() - INTERVAL 13 DAY))ORDER BY progress_id DESC ";
                                                //var_dump($query3);die();
                                                $res = $pdo->query($query);
                                                // $row = $res->fetch();
                                                //if($res->rowCount() > 0){
                                                while($rows = $res->fetch()) {
                                                // $enquiry = $row['enquiry_number'];
                                                //$first = $row['unames'];
                                                $user = $rows['username'];
                                                $model = $rows['model'];
                                                $type = $rows['device_name'];
                                                $status = $rows['status'];
                                                $est = $rows['estimation'];
                                                $detail = $rows['detail'];
                                                // }
                                                if($res->rowCount() == 0){
                                                    echo "Medium not available ";
                                                }elseif ($res->rowCount() > 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $user; ?></td>
                                                    <td><?php echo $type; ?></td>
                                                    <td><?php echo $model; ?></td>
                                                    <td><?php echo $detail; ?></td>
                                                    <td><?php echo $est; ?></td>
                                                    <td>
                                                        <div class="progress">

                                                            <div class="progress-bar"
                                                                 style="width: <?php echo $status; ?>%;">

                                                                <?php echo $status; ?>% complete

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                         <div class="btn-group">
                                                             <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                             <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                                         </div>
                                                     </td>-->
                                                </tr>
                                                <?php
                                                }
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="monthly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Maximum Overdue (2 or more weeks)</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i> Serial Number</th>
                                                    <th><i class="icon_cursor"></i> Notes</th>
                                                    <th><i class="icon_calendar"></i> Completion Date</th>
                                                    <th><i class="icon_percent"></i> Status</th>
                                                </tr>
                                                <?php
                                                $query="SELECT * FROM progress where status<100 and date <= (CURDATE() - INTERVAL 14 DAY) ORDER BY progress_id DESC ";
                                                //var_dump($query3);die();
                                                $res = $pdo->query($query);
                                                // $row = $res->fetch();
                                                //if($res->rowCount() > 0){
                                                while($rows = $res->fetch()) {
                                                // $enquiry = $row['enquiry_number'];
                                                //$first = $row['unames'];
                                                $user = $rows['username'];
                                                $model = $rows['model'];
                                                $type = $rows['device_name'];
                                                $status = $rows['status'];
                                                $est = $rows['estimation'];
                                                $detail = $rows['detail'];
                                                // }
                                                if($res->rowCount() == 0){
                                                    echo "Maximum overdue not available ";
                                                }elseif ($res->rowCount() > 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $user; ?></td>
                                                    <td><?php echo $type; ?></td>
                                                    <td><?php echo $model; ?></td>
                                                    <td><?php echo $detail; ?></td>
                                                    <td><?php echo $est; ?></td>
                                                    <td>
                                                        <div class="progress">

                                                            <div class="progress-bar"
                                                                 style="width: <?php echo $status; ?>%;">

                                                                <?php echo $status; ?>% complete

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                         <div class="btn-group">
                                                             <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                             <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                                         </div>
                                                     </td>-->
                                                </tr>
                                                <?php
                                                }
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <!-- page end-->
                    </section>
        </section>
        <!--main content end-->
        <?php
        include('footer.html');
        ?>
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="../js/scripts.js"></script>

    <script>
        //knob
        $(".knob").knob();
    </script>


</body>

</html>
