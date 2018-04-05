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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Quotation section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Quote</li>
                    </ol>
                </div>
            </div>
            <div class="row" id="printabe">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <h1>  <a class="pull-right btn btn-primary" href="quotation.php"><i class="icon_refresh"></i> Back</a><input type="button" class="btn btn-primary" value="Print" onclick="printDiv('printableArea')" /></h1>
                                <div id="printableArea" class="panel-body bio-graph-info">
                                     <?php
                                    $id=$_GET['quote_number'];
                                    $query="SELECT * FROM quotations WHERE quote_number='$id'";
                                    //var_dump($query3);die();
                                    $res = $pdo->query($query);
                                    while($row = $res->fetch()) {
                                    $record = $row['quote_number'];
                                    $first = $row['client_name'];
                                    $rep = $row['sales_rep'];
                                    $amt1 = $row['total_exc'];
                                    $amt2 = $row['total_inc'];
                                    $quant = $row['quantity'];
                                    $dsc = $row['discount'];
                                    $price = $row['price'];
                                    $date=$row['quote_date'];
                                    $invoice=$row['quote_number'];
                                    $due=$row['due'];
                                    $addr=$row['address'];
                                    ?>
                                    <br>
                                    <div class="row">
                                        <div class="bio-row">
                                        <div class="col-md-6">
                                            <h1 class="text-left"><strong>Quote</strong>  </h1>
                                            <img src="../img/keltechlogo.png" class="img-rounded" style="width: 20%">
                                        </div>
                                        </div>
                                        <div class="bio-row">
                                        <div class="col-md-6 ">
                                            <table>
                                                Number: <span><?php echo $invoice; ?></span><br>
                                                Date: <span><?php echo $date; ?></span><br>
                                                Sales Rep: <span><?php echo $rep; ?></span><br>
                                                Due Date: <span><?php echo $due; ?></span><br>
                                                Overall Discount %: <span><?php echo "0.0".$dsc."%"; ?></span>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bio-row">

                                        <div class="col-md-6 text-left">
                                            <p class="text-left"><strong>FROM<br>Keltech Repairs (PVT) LTD CPT</strong><br>
                                                <u>PROSTAL & PHYSICAL ADDRESSES</u><br>
                                                2 Roeland Street<br>
                                                Ruskin House<br>
                                                Cape Town<br>
                                                8001</p>
                                        </div>
                                        </div><br>
                                            <div class="bio-row">
                                        <div class="col-md-12">
                                            <p><strong>TO <br><?php echo $first; ?></strong><br>
                                                <u>PHYSICAL ADDRESS</u><br>
                                                <?php echo $addr; ?>
                                            </p>
                                        </div>
                                            </div>
                                        <?php } ?>
                                        _______________________________________________________________________________________________________________________________________________________________________________

                                    </div><br><br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th> Unit Price</th>
                                                    <th> Disc %</th>
                                                    <th>VAT %</th>
                                                    <th>Exclusive Total</th>
                                                    <th>Inclusive Total</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $id=$_GET['quote_number'];
                                                    $query="SELECT * FROM quotations WHERE quote_number='$id'";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($query);
                                                    while($row = $res->fetch()) {
                                                    $record = $row['quote_number'];
                                                    $first = $row['client_name'];
                                                    $rep = $row['sales_rep'];
                                                    $disc = $row['description'];
                                                    $amt1 = $row['total_exc'];
                                                    $amt2 = $row['total_inc'];
                                                    $quant = $row['quantity'];
                                                    $dsc = $row['discount'];
                                                    $price = $row['price'];
                                                    $date = $row['quote_date'];
                                                    $invoice = $row['quote_number'];
                                                    $due = $row['due'];

                                                    ?>
                                                    <td><?php echo $disc; ?></td>
                                                    <td><?php echo $quant; ?></td>
                                                    <td>R <?php echo $price; ?>.00</td>
                                                    <td><?php echo $dsc; ?></td>
                                                    <td><?php echo $row['vat']; ?></td>
                                                    <td>R <?php echo $amt1; ?>.00</td>
                                                    <td>R <?php echo $amt2; ?>.00</td>

                                                </tr>
                                                <?php

                                                }

                                                ?>

                                                </tbody>


                                            </table>
                                        </div>

                                    </div><br><br><br><br><br><br><br><br><br><br>

                                    <div class="row">
                                        <div class="bio-row">
                                        <div class="col-md-12">
                                            <p>
                                                DIRECT DEPOSITS TO: KELTECH REPAIRS<br>
                                                STANDARD BANK CHEQUE ACCOUNT # 070 616 396 BRANCH CODE 020909<br>

                                            </p>
                                        </div>
                                        </div>
                                        <div class="bio-row">
                                        <div class="col-md-8">
                                            <table>
                                                <tr>
                                                    <th>Total Discount: </th> <td>R <?php echo 0;?>.00</td>  </tr>
                                                <tr><th> Total Exclusive:</th> <td>R <?php echo $amt1;?>.00</td><tr>
                                                <tr> <th>Total VAT: </th> <td> R <?php echo 0;?>.00</td>  </tr>
                                                <tr> <th>Sub Total: </th> <td> R <?php echo $amt2;?>.00</td>  </tr>
                                                <tr> <th>Total: </th> <td> R <?php echo $amt2;?>.00</td>  </tr><br>
                                                <tr></tr>
                                                <tr><th><strong><u>BALANCE DUE</u></strong></th></tr>
                                                <tr><td><u>R <?php echo $amt2;?>.00</u></td></tr>
                                            </table>
                                        </div>
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

<script>
    //knob
    $(".knob").knob();
</script>

<script>
    function printDiv(printable) {
        var printContents = document.getElementById(printable).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</body>

</html>
