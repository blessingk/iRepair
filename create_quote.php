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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Quotation Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Quotation</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Create Quote <a class="pull-right btn btn-primary" href="quotation.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $ids=$_GET['record_number'];
                                        $query="SELECT * FROM device_records WHERE record_number='$ids'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                        $record = $row['record_number'];
                                        $first = $row['client_name'];
                                        $cont = $row['contact'];
                                        $email = $row['email'];
                                        $type = $row['device_name'];
                                        $date = $row['record_date'];
                                        $adrs = $row['address'];
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Sales Rep</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="sales_rep"
                                                       value="<?php echo $FirstName . " " . $LastName; ?>" required
                                                       id="f-name" placeholder="Enter Client Name ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Client Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="client_name"
                                                       value="<?php echo $first; ?>" required id="l-name"
                                                       placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="description" required
                                                       value="<?php echo $type; ?>" class="form-control" id="b-day"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Quantity</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="quantity" required class="form-control"
                                                       id="mobile" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Unit Price</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="price" required class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Discount %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="discount" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">VAT %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="vat" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Due Date</label>
                                            <div class="col-lg-6">
                                                <input type="date" name="due" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" name="create" class="btn btn-primary">Create
                                                </button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['create'])) {
                                        $num1 = '';
                                        $num2 = '';
                                        $year = date("Y");
                                        $num1 = (rand(0, 9));
                                        $num2 = (rand(0, 9));
                                        function generateCode($numchars = 5,/*$digits=1,*/
                                                              $letters = 1)
                                        {
                                            $dig = "012345678923456789";
                                            $abc = "ABCDEFGHJKLMNOPQRSTUVWXYZ";
                                            if ($letters == 1) {
                                                $str = $abc;
                                            }

                                            for ($i = 0; $i < $numchars; $i++) {
                                                $randomized = $str{rand() % strlen($str)};
                                            }
                                            return $randomized;
                                        }

                                        $code = generateCode('5', '1');
                                        $id = "QUO0000" . $num1 . $num2;
                                        $name = $_POST['sales_rep'];
                                        $client = $_POST['client_name'];
                                        $desc = $_POST['description'];
                                        $quant = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $disc = $_POST['discount'];
                                        $vat = $_POST['vat'];
                                        $due = $_POST['due'];
                                        if (!empty('enquiry_number')) {
                                            $sql = "SELECT * FROM quotations WHERE enquiry_number ='$record'";
                                            $res = $pdo->query($sql);
                                            if ($res->rowCount() == 0) {


                                                if (empty($disc && $vat)) {
                                                    $totex = $quant * $price;
                                                    $totin = $quant * $price;
                                                } else if (!empty($disc && $vat)) {
                                                    $totex = $quant * $price;
                                                    $tot1 = $totex - ($totex * ($disc / 100));
                                                    $tot2 = $tot1 + ($tot1 * ($vat / 100));
                                                    $totin = $tot2;
                                                } else if (empty($disc) && (!empty($vat))) {
                                                    $totex = $quant * $price;
                                                    $totin = $totex + ($totex * ($vat / 100));


                                                } else if (empty($vat) && (!empty($disc))) {
                                                    $totex = $quant * $price;
                                                    $totin = $totex - ($totex * ($disc / 100));
                                                }

                                                try {
                                                    $ins = "INSERT INTO quotations(sales_rep, client_name, description, quantity, price, quote_number, quote_date, due, discount, vat, total_inc, total_exc, enquiry_number,address, status, mail, contact) VALUES ('$name', '$client', '$desc', '$quant', '$price', '$id', CURRENT_DATE , '$due', '$disc', '$vat', '$totin', '$totex', '$record', '$adrs', 'none', '$email', '$cont')";
                                                    $pdo->exec($ins);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Quote created successfully")';
                                                    echo '</script>';
                                                    $inse = "UPDATE device_records SET status='read' WHERE record_number='$record'";
                                                    $pdo->query($inse);

                                                } catch (PDOException $e) {
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                }
                                            } else if ($res->rowCount() > 0) {
                                                echo '<script language="javascript">';
                                                echo 'alert("Quote already created")';
                                                echo '</script>';
                                            }
                                            if ($ins) {
                                                $to = $email;
                                                $subject = 'Quotation';
                                                $message = "Good Day,\n I hope you are well. Thank you for your interest in our service offering. \nPlease click the link www.keltechrepairs.co.za/system to access your quotation\n.
For any further queries, contact us on 021-824 6261\n\n
DIRECT PAYMENTS TO: KELTECH REPAIRS\n
STANDARD BANK CHEQUE ACCOUNT # 070 616 396, BRANCH CODE 020909.\n\n
Would you like to stay up to date with the latest news and promotions from Keltech Repairs? Do not forget to like us on https://www.facebook.com/keltechrepair\n\n
kind regards,\n\n
Keltech Repairs";
                                                $from = 'info@keltechrepairs.co.za';
                                                // Sending email
                                                if (mail($to, $subject, $message)) {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Your mail has been sent successfully.")';
                                                    echo '</script>';
                                                }
                                            } else {
                                                echo 'Email not sent';
                                            }
                                        }
                                    }
                                    }
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
