
<?php
include("../doc_expire.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keltech Repairs">
    <meta name="author" content="Keltech Repairs">
    <meta name="keyword" content="keltech repairs">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Keltech Repairs</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="../js/lte-ie7.js"></script>
    <![endif]-->

</head>

<body>
<!-- container section start -->
<section id="container" class="">

    <?php
    include('header.php');
    ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Update section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device progress</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Please update device progress <a class="pull-right btn btn-primary" href="device_progress.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $id=$_GET['record_number'];
                                        $query="SELECT * FROM progress WHERE record_number='$id'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                            $enquiry = $row['record_number'];
                                            $first = $row['username'];
                                            $model = $row['model'];
                                            $type = $row['device_name'];
                                            $comps = $row['completion_status'];
                                            $date = $row['estimation'];
                                            ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Device Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="device_name" value="<?php echo $type;?>" id="l-name" required placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Serial Number</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="model" value="<?php echo $model;?>" id="l-name" required placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Owner Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="username" value="<?php echo $first; ?>" class="form-control" required id="b-day" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-lg-2 control-label">Device Status</label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" required name="status" id="exampleSelect1">
                                                        <?php
                                                        $tech = ("SELECT status FROM progress where record_number='$id' ");
                                                        $sus = $pdo->query($tech);
                                                        while($row = $sus->fetch()){
                                                            echo '<option value="' . $row['status'] . '">';
                                                            echo $row['status'];
                                                            echo '</option>';
                                                        }
                                                        ?>
                                                        <option>50</option>
                                                        <option>75</option>
                                                        <option>100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Estimated Completion</label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="estimation" class="form-control" value="<?php echo $date; ?>" id="mobile" required placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Progress Detail</label>
                                                <div class="col-lg-6">
                                                    <textarea type="text"  name="detail" class="form-control" required placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Job Status</label>
                                                <div class="col-lg-6">
                                                    <input type="text"  name="completion_status" value="<?php echo $comps; ?>" class="form-control" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </form>
                                    <?php
                                    //}
                                    //include('dbcon.php');
                                    if(isset($_POST['update'])) {
                                        $device = $_POST['device_name'];
                                        $model = $_POST['model'];
                                        $user = $_POST['username'];
                                        $status = $_POST['status'];
                                        $est = $_POST['estimation'];
                                        $detail = $_POST['detail'];
                                        $comp = $_POST['completion_status'];

                                        $ins1 = "UPDATE progress SET `device_name`='$device', `model`='$model', `username`='$user', `status`='$status', `estimation`='$est', `date`=CURRENT_DATE, `record_number`='$id', `detail`='$detail', `completion_status`='$comp' WHERE record_number='$id'";
                                        //$data = mysql_query($ins1) or die(mysql_error());
                                        $pdo->exec($ins1);
                                        echo '<script language="javascript">';
                                        echo 'alert("Device progress updated")';
                                        echo '</script>';
                                        header("location: device_progress.php");


                                        if ($status == 100) {
                                            $to = $mail;
                                            $subject = 'Repair or Upgrade Completed';
                                            $message = "Good Day,\n
I hope you are well.\n
I am writing to let you know that your device is ready for collection. Please click the link keltechrepairs.co.za/system to access your invoice.\n
Please come and collect your device at your earliest convenience.\n
For further queries, contact us on 021-824 6261\n
NB: Devices not collected within 31 days of notification may be sold to defray costs.\n
Kind Regards\n \n
Keltech Repairs";
                                            $from = 'info@keltechrepairs.co.za';
                                            // Sending email
                                            if (mail($to, $subject, $message)) {
                                                echo '<script language="javascript">';
                                                echo 'alert("Your mail has been sent successfully.")';
                                                echo '</script>';
                                            }
                                        }
                                        else {
                                            echo 'Email will be sent when the device is 100% complete';
                                        }


                                        //header("location: device_progress.php");

                                    }
                                    // var_dump($ins) or die;

                                    ?>
                                </div>
                            </section>
                        </div>
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


</body>

</html>
