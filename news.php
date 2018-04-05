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
                                <div class="panel-body bio-graph-info">
                                    <h1>  <a class="pull-right btn btn-primary" href="quotation.php"><i class="icon_refresh"></i> Back</a></h1>
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

                                            <h1 class="text-left"><strong>Quote</strong></h1>
                                            <p><img src="../img/keltechlogo.png" class="img-rounded" style="width: 30%"><br><strong>FROM<br>Keltech Repairs (PVT) LTD CPT</strong><br>
                                                <u>PROSTAL ADDRESS</u><br>
                                                2 Roeland Street<br>
                                                Ruskin House<br>
                                                Cape Town<br>
                                                8001</p>

                                        </div>
                                        <div class="bio-row"><br><br><br><br><br>
                                            <div class="col-md-5">
                                                <h4 align="left"><strong>TO<br></strong></h4>
                                                <p><strong><?php echo $first; ?></strong><br>
                                                    <u>PHYSICAL ADDRESS</u><br>
                                                    <?php echo $addr; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bio-row"><br><br><br><br><br>
                                            <div class="col-md-2">
                                                <h4 align="left"><strong>TO<br></strong></h4>
                                                <p><strong><?php echo $first; ?></strong><br>
                                                    <u>PHYSICAL ADDRESS</u><br>
                                                    <?php echo $addr; ?>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="col-md-3"></div>
                                        <div class="col-md-3 ">
                                            <table>
                                                Number: <span><?php echo $invoice; ?></span><br>
                                                Date: <span><?php echo $date; ?></span><br>
                                                Sales Rep: <span><?php echo $rep; ?></span><br>
                                                Due Date: <span><?php echo $due; ?></span><br>
                                                Overall Discount %: <span><?php echo "0.0".$dsc."%"; ?></span>
                                            </table>
                                        </div>
                                    </div><br>
                                    <div class="row">

                                        <div class="col-md-3 text-left">
                                            <p class="text-left"><strong>FROM<br>Keltech Repairs (PVT) LTD CPT</strong>  </p>
                                            <p>
                                                <u>PROSTAL ADDRESS</u><br>
                                                2 Roeland Street<br>
                                                Ruskin House<br>
                                                Cape Town<br>
                                                8001</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>
                                                <u>PHYSICAL ADDRESS</u><br>
                                                2 Roeland Street<br>
                                                Ruskin House<br>
                                                Cape Town<br>
                                                8001
                                            </p>
                                        </div>
                                        <div class="col-md-3"></div>

                                        <div class="col-md-3">
                                            <p><strong>TO <br><?php echo $first; ?></strong></p>

                                            <p>
                                                <u>PHYSICAL ADDRESS</u><br>
                                                <?php echo $addr; ?>
                                            </p>
                                        </div>
                                        <?php } ?>
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
                                        <div class="col-md-6">
                                            <p>
                                                DIRECT DEPOSITS TO: KELTECH REPAIRS<br>
                                                STANDARD BANK CHEQUE ACCOUNT # 070 616 396 BRANCH CODE 020909<br>

                                            </p>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <table>
                                                <tr>
                                                    <th>Total Discount: </th> <td><strong>ZAR <?php echo 0;?></strong></td>  </tr>
                                                <tr><th> Total Exclusive:</th> <td>ZAR <?php echo $amt1;?></td><tr>
                                                <tr> <th>Total VAT: </th> <td> ZAR <?php echo 0;?></td>  </tr>
                                                <tr> <th>Sub Total: </th> <td> ZAR <?php echo $amt2;?></td>  </tr>
                                                <tr> <th>Total: </th> <td> ZAR <?php echo $amt2;?></td>  </tr><br>
                                                <tr></tr>
                                                <tr><th><strong>BALANCE DUE</strong></th></tr>
                                                <tr><td>ZAR <?php echo $amt2;?></td></tr>
                                            </table>
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
