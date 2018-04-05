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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Sales section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Sales Receipt</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <h1><a class="pull-right btn btn-primary" href="sales.php"><i class="icon_refresh"></i> Back</a> <input type="button" class="btn btn-primary" value="Print" onclick="printDiv('printableArea')" /></h1>
                                <div id="printableArea" class="panel-body bio-graph-info">
                                    <div>
                                        <div class="row">
                                            <div class="bio-row">
                                                <div class="col-md-6 text-left">
                                                    <p><img src="../img/keltechlogo.png" class="img-rounded" style="width: 30%"><br>Keltech Repairs (PVT) LTD<br>
                                                        TAX No: 9591824165<br>
                                                        REG: 2013/151506/07</p>
                                                </div>

                                            </div>
                                            <div class="bio-row">
                                                <h4 align="left"><strong>Keltech Repairs</strong></h4>
                                                2 Roeland Street<br>
                                                Ruskin House, Cape Town<br>
                                                Tel 021 461 4833 • 021 824 6261<br>
                                                www.keltechrepairs.co.za<br>
                                                info@keltechrepairs.co.za
                                            </div>
                                        </div><div class="line"></div>
                                        <div class="row">
                                            <h4 align="center"><strong><u>SALES RECEIPT</u></strong></h4>
                                            <div class="col-lg-12 col-md-12 col-md-6">
                                                <table class="table table-striped table-advance table-hover" border="1">
                                                    <tbody>
                                                    <tr>
                                                        <th>CUSTOMER NAME</th>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $id=$_GET['sale_id'];
                                                        $query="SELECT * FROM sales WHERE sale_id='$id'";
                                                        //var_dump($query3);die();
                                                        $res = $pdo->query($query);
                                                        while($row = $res->fetch()) {
                                                        $record = $row['stock_number'];
                                                        $first = $row['customer_name'];

                                                        ?>
                                                        <td><?php echo $first; ?></td>

                                                    </tr>
                                                    <?php
                                                    }
                                                    ?><br>
                                                    <tr>
                                                        <th> DEVICE DESCRIPTION</th>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $id=$_GET['sale_id'];
                                                        $query="SELECT * FROM sales WHERE sale_id='$id'";
                                                        //var_dump($query3);die();
                                                        $res = $pdo->query($query);
                                                        while($row = $res->fetch()) {
                                                        $record = $row['sale_id'];
                                                        $disc = $row['description'];

                                                        ?>
                                                        <td><?php echo $disc; ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?><br>
                                                    <tr>
                                                        <th>AMOUNT RECEIVED</th>
                                                        <th>TOTAL AMOUNT</th>
                                                        <th>CHANGE</th>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $id=$_GET['sale_id'];
                                                        $query="SELECT * FROM sales WHERE sale_id='$id'";
                                                        //var_dump($query3);die();
                                                        $res = $pdo->query($query);
                                                        while($row = $res->fetch()) {
                                                        //$record = $row['record_number'];
                                                        $rece = $row['received'];
                                                        $amnt = $row['total'];
                                                        $amt = $row['received']- $row['total'] ;

                                                        ?>
                                                        <td>R <?php echo $rece; ?>.00</td>
                                                        <td>R <?php echo $amnt; ?>.00</td>
                                                        <td>R <?php echo $amt; ?>.00</td>

                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="myPrint">
                                                    <tr>
                                                        <td>
                                                            DIRECT DEPOSITS TO: KELTECH REPAIRS<br>
                                                            STANDARD BANK CHEQUE ACCOUNT # 070 616 396 BRANCH CODE 020909<br>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-8">
                                                <table id="example">
                                                    <tr>
                                                        <td><u>TERMS AND CONDITIONS</u></td></tr>
                                                    <tr>
                                                        <td> 1. All repairs, services and installations professionally done, in good faith: should you be dissatisfied, please notify us within 48 hours for correction. Failure to do so may result in additional costs being incurred.<br>
                                                            2. Devices are booked in at the client’s risk. Keltech Repairs is not liable for any data loss or damage sustained during hardware or software repairs. <strong>PLEASE NOTE</strong> Your device may be restored or formatted to complete repair. Please back up your data beforehand.<br>
                                                            3. Keltech Repairs cannot be held responsible for DIY installations on any accessories and parts sold separately.  <br>
                                                            4. Replaced parts – apart from batteries and liquid-damaged devices– have a 6-month warrantee that excludes any damage caused by negligence (eg devices that are dropped) or tampering.<br>
                                                            5. Liquid damaged devices: only parts replaced as per invoice are guaranteed, for 3 months.<br>
                                                            6. Warranties are not transferable.<br>
                                                            7. Devices not collected within 31 days of notification may be sold to defray costs.<br>
                                                            8. The use of generic charges voids your warrantee on logic board repairs.</td>
                                                    </tr>
                                                </table>
                                            </div><div class="col-md-1"></div></div>
                                        <div class="row"><div class="line"></div>
                                            <div class="col-sm-12">
                                                <h4 align="center">THANK YOU FOR YOUR CUSTOM!<br> PLEASE LIKE US ON FACEBOOK AND REFER US TO YOUR FRIENDS</h4>
                                                <p align="center">https://www.facebook.com/keltechrepair/ or visit our website: www.keltechrepairs.co.za</p>
                                            </div>
                                        </div>

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
<script src="//code.jquery.com/jquery-1.12.4.js"</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"</script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"</script>


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
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        } );
    } );

</script>

</body>

</html>
