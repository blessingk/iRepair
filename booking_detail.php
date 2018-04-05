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

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Device Record section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device record</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <h4> Device repair booking details </h4>
                            <h1><input type="button" class="btn btn-primary" value="Print" onclick="printDiv('printableArea')" /><a class="pull-right btn btn-primary" href="record_device.php"><i class="icon_refresh"></i> Back</a></h1>
                                <div id="printableArea" class="panel-body bio-graph-info">
                                        <?php
                                        $id=$_GET['record_number'];
                                        $query="SELECT * FROM device_records WHERE record_number='$id'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                        $record = $row['record_number'];
                                        $first = $row['client_name'];
                                        $cont = $row['contact'];
                                        $mail = $row['email'];
                                        $model = $row['serial'];
                                        $type = $row['device_name'];
                                        $note = $row['notes'];
                                        $amt = $row['amount'];
                                        $visible = $row['visible_marks'];
                                        $date=$row['record_date'];
                                        ?>
                                            <div class="row">
                                                <p class="text-center">Ketltech Repairs: Job Card No. <?php echo $record ." on ". $date; ?> </p>
                                                <div class="bio-row">
                                                <div class="col-md-6 text-left">
                                                   <p><img src="../img/keltechlogo.png" class="img-rounded" style="width: 30%"><br>
                                                       TAX No: 9591824165<br>
                                                       www.keltechrepairs.co.za<br>
                                                       REG: 2013/151506/07    	<br>
                                                       info@keltechrepairs.co.za</p>
                                                </div>
                                            </div>
                                                <div class="bio-row">
                                                <div class="col-md-6 text-right">
                                                   <br><br>
                                                    <p>
                                                        Keltech Repairs<br>
                                                        2 Roeland Street<br>
                                                        Ruskin House, Cape Town<br>
                                                        Tel 021 461 4833  <br>021 824 6261
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                            _______________________________________________________________________________________________________________________________________________________________________________
                                            <div class="row">
                                                <h4 align="center"><strong><u>DEVICE REPAIR BOOKING </u></strong></h4>
                                                <div class="col-lg-12 col-md-12 col-md-6">
                                                    <table class="table table-striped table-advance table-hover" border="1">
                                                        <tbody>
                                                        <tr>
                                                            <th>CLIENT NAME</th>
                                                            <th>CONTACT NUMBER</th>
                                                            <th> EMAIL</th>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $id=$_GET['record_number'];
                                                            $query="SELECT * FROM device_records WHERE record_number='$id'";
                                                            //var_dump($query3);die();
                                                            $res = $pdo->query($query);
                                                            while($row = $res->fetch()) {
                                                            $record = $row['record_number'];
                                                            $first = $row['client_name'];
                                                            $cont = $row['contact'];
                                                            $mails = $row['email'];

                                                            ?>
                                                            <td><?php echo $first; ?></td>
                                                            <td>0<?php echo $cont; ?></td>
                                                            <td><?php echo $mails; ?></td>

                                                        </tr>
                                                        <?php
                                                        }
                                                        ?><br>
                                                        <tr>
                                                            <th> DEVICE DESCRIPTION</th>
                                                            <th> SERIAL NUMBER</th>
                                                            <th> VISIBLE MARKS</th>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $id=$_GET['record_number'];
                                                            $query="SELECT * FROM device_records WHERE record_number='$id'";
                                                            //var_dump($query3);die();
                                                            $res = $pdo->query($query);
                                                            while($row = $res->fetch()) {
                                                            $record = $row['record_number'];
                                                            $disc = $row['device_name'];
                                                            $ser = $row['serial'];
                                                            $vis = $row['visible_marks'];

                                                            ?>
                                                            <td><?php echo $disc; ?></td>
                                                            <td><?php echo $ser; ?></td>
                                                            <td><?php echo $vis; ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?><br>
                                                        <tr>
                                                            <th>AMOUNT DUE</th>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $id=$_GET['record_number'];
                                                            $query="SELECT * FROM device_records WHERE record_number='$id'";
                                                            //var_dump($query3);die();
                                                            $res = $pdo->query($query);
                                                            while($row = $res->fetch()) {
                                                            $record = $row['record_number'];
                                                            $amnt = $row['amount'];

                                                            ?>
                                                            <td><strong>R <?php echo $amnt; ?>.00</strong></td>

                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <p class="para"><u><strong>Terms & Conditions</strong></u><br>
                                                1. All repairs, services and installations professionally done, in good faith: should you be dissatisfied with your repairs, please notify us within 48 hours for correction. Failure to do so may result in additional costs being incurred.<br>
                                                2. If the device cannot be fixed, a consultation fee of <strong>R100</strong>  applies.<br>
                                                3. Devices are booked in at the client’s risk. Keltech Repairs is not liable for any data loss or damage sustained during hardware or software repairs. <strong>PLEASE NOTE</strong> Your device may be restored or formatted to complete repair. Please back up your data beforehand.<br>
                                                4. Keltech Repairs cannot be held responsible for DIY installations on any accessories and parts sold separately.  <br>
                                                5. Replaced parts – apart from batteries and liquid-damaged devices– have a 6-month warrantee that excludes any damage caused by negligence (eg devices that are dropped) or tampering.<br>
                                                6. Liquid damaged devices: only parts replaced as per invoice are guaranteed, for 3 months.<br>
                                                7. Warranties are not transferable.<br>
                                                8. Repair parts are subject to a 50% non-refundable deposit when ordering.<br>
                                                9. Devices not collected within 31 days of notification may be sold to defray costs.<br>
                                                10. By signing you agree to the terms of service.<br>
                                                SIGNATURE.......................      DATE..............................       SIGNED AT..........................................</p>
                                                <p class="para">
                                                    <strong><u>THANK YOU FOR YOUR CUSTOM!</u></strong> <br>
                                                    PLEASE LIKE US ON FACEBOOK AND REFER US TO YOUR FRIENDS on https://www.facebook.com/Keltechrepair/ or visit our website: https://www.keltechrepairs.co.za
                                                </p>
                                            </div>
                                    <?php } ?>
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
<script type="text/javascript">
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>


</body>

</html>
