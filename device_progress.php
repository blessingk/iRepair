<?php
include("../doc_expire.php");
?>
<!DOCTYPE html>
<html lang="en">
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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Devices Progress</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device Progress</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Check Progress of devices
                                    </header>
                                    <div class="form-group">
                                        <input type="text" id="myInput"  class="col-md-3" onkeyup="myFunction()" placeholder="Search for client names.." title="Type in a name"><br>
                                    </div>
                                    <table class="table  table-advance table-hover" id="myTable">
                                        <tbody>
                                        <tr>
                                            <th><i class="icon_profile"></i>Client Name</th>
                                            <th><i class="icon_mobile"></i> Device Name</th>
                                            <th><i class="icon_cursor"></i> Serial Number</th>
                                            <th><i class="icon_cursor"></i> Notes</th>
                                            <th><i class="icon_calendar"></i> Completion Date</th>
                                            <th><i class="icon_percent"></i> Status</th>
                                            <th><i class=""></i>Job Status</th>
                                            <th><i class="icon_cogs"></i>Action</th>

                                        </tr>
                                        <?php
                                        $query="SELECT * FROM progress ORDER BY estimation DESC ";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        // $row = $res->fetch();
                                        //if($res->rowCount() > 0){
                                        while($rows = $res->fetch()) {
                                            // $enquiry = $row['enquiry_number'];
                                            //$first = $row['unames'];
                                            $record = $rows['record_number'];
                                            $user = $rows['username'];
                                            $model = $rows['model'];
                                            $type = $rows['device_name'];
                                            $status = $rows['status'];
                                            $est = $rows['estimation'];
                                            $detail = $rows['detail'];
                                            $comp = $rows['completion_status'];
                                            // }
                                            if($res->rowCount() == 0){
                                                echo "Device Progress not available ";
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
                                                    <td><?php echo $comp; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-primary" href="update_status.php?record_number=<?php echo $record; ?>" onclick='return confirm("Are you sure you want to update device progress?")'><i class="icon_check_alt2"></i>Update</a>
                                                        </div>
                                                     </td>
                                                </tr>
                                                <?php
                                            }
                                        } ?>
                                        </tbody>
                                    </table>
                                </section>
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        $('#myTable td:contains("urgent")').parent().css('background', '#E77471');
        $('#myTable td:contains("collected")').parent().css('background', '#C3FDB8');
        $('#myTable td:contains("ready")').parent().css('background', '#FFE87C');
        $('#myTable td:contains("beyond")').parent().css('background', '#DCDCDC');
        </script>


</body>

</html>
