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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Device record section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Edit Job Card</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                                <!-- edit-profile -->
                                <div id="new-device" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Device repair booking <a class="pull-right btn btn-primary" href="record_device.php"><i class="icon_refresh"></i> Back</a></h1>
                                                    <?php
                                                    $id=$_GET['record_number'];
                                                    $qry="SELECT * FROM device_records WHERE record_number='$id'";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0) {
                                                        while ($row = $res->fetch()) {
                                                            $id = $row['record_number'];
                                                            $equiry = $row['record_id'];
                                                            $client = $row['client_name'];
                                                            $no = $row['contact'];
                                                            $dev = $row['device_name'];
                                                            $mail = $row['email'];
                                                            $amnt = $row['amount'];
                                                            $vis = $row['visible_marks'];
                                                            $adres = $row['address'];
                                                            $seril = $row['serial'];
                                                            $note = $row['notes'];
                                                            $stat = $row['jstatus'];
                                                            //$id=$row['user_id'];
                                                            //var_dump($row);die();<i class="icon_pencil_alt"></i>
                                                        }
                                                        ?>
                                                        <form class="form-horizontal" method="post" role="form">
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Client
                                                                    Name</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control"
                                                                           name="client_name" required id="f-name"
                                                                           placeholder="Enter Client Name " value="<?php echo $client;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Email</label>
                                                                <div class="col-lg-6">
                                                                    <input type="email" class="form-control" value="<?php echo $mail;?>"
                                                                           name="email" required id="l-name"
                                                                           placeholder=" ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Contact
                                                                    Number</label>
                                                                <div class="col-lg-6">
                                                                    <input type="number" name="contact" required value="<?php echo $no;?>"
                                                                           class="form-control" id="b-day"
                                                                           placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Device
                                                                    Name</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="device_name" required value="<?php echo $dev;?>"
                                                                           class="form-control" id="email"
                                                                           placeholder=" ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Serial
                                                                    Number</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="serial" required value="<?php echo $seril;?>"
                                                                           class="form-control" id="mobile"
                                                                           placeholder=" ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Notes</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="notes" value="<?php echo $note;?>"
                                                                              class="form-control"
                                                                              placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-lg-2">Assign
                                                                    Technician</label>
                                                                <div class="col-lg-6">
                                                                    <select name="tech" required>
                                                                        <option>Assign Technician</option>
                                                                        <?php
                                                                        $tech = ("SELECT first_name, last_name, username FROM users where role='tech' ");
                                                                        $sus = $pdo->query($tech);
                                                                        while ($row = $sus->fetch()) {
                                                                            echo '<option value="' . $row['username'] . '">';
                                                                            echo $row['first_name'] . " " . $row['last_name'];
                                                                            echo '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Amount Due</label>
                                                                <div class="col-lg-6">
                                                                    <input type="number" name="amount" value="<?php echo $amnt;?>"
                                                                           class="form-control" placeholder="0.00">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-lg-2 control-label">Visible_Marks</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="visible_marks" value="<?php echo $vis;?>"
                                                                              class="form-control"
                                                                              placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Address</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="address" required
                                                                           class="form-control" value="<?php echo $adres;?>"
                                                                           placeholder="type address">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Job Status</label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="jstatus" value="<?php echo $stat;?>" required class="form-control"  >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-lg-offset-2 col-lg-10">
                                                                    <button type="submit" name="book"
                                                                            class="btn btn-primary">Update
                                                                    </button>
                                                                    <button type="reset" class="btn btn-danger">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        if (isset($_POST['book'])) {
                                                            $name = $_POST['client_name'];
                                                            $mail = $_POST['email'];
                                                            $cont = $_POST['contact'];
                                                            $device = $_POST['device_name'];
                                                            $serial = $_POST['serial'];
                                                            $notes = $_POST['notes'];
                                                            $tech = $_POST['tech'];
                                                            $amt = $_POST['amount'];
                                                            $visible = $_POST['visible_marks'];
                                                            $adr = $_POST['address'];
                                                            $stats = $_POST['jstatus'];
                                                            try {
                                                                $ins = "UPDATE `device_records` SET client_name='" . $name . "' , email='" . $mail . "' , contact='" . $cont . "' , device_name='" . $device . "' , serial='" . $serial . "' , notes='" . $notes . "' , tech='" . $tech . "' , amount='" . $amt . "' , visible_marks='" . $visible . "' , address='" . $adr . "', jstatus='".$stats."' WHERE record_number='$id'";
                                                                $pdo->exec($ins);
                                                                echo '<script language="javascript">';
                                                                echo 'alert("Job card updated")';
                                                                echo '</script>';

                                                            } catch (PDOException $e) {
                                                                die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                            }
                                                        }
                                                    }
                                            ?>
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
        function myInquiries() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInquiry");
            filter = input.value.toUpperCase();
            table = document.getElementById("myData");
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
        function myRecords() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myRecord");
            filter = input.value.toUpperCase();
            table = document.getElementById("myReco");
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

</body>

</html>
