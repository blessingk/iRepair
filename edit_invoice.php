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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Invoice Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Edit Invoice</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Update invoice <a class="pull-right btn btn-primary" href="invoices.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $ids=$_GET['invoice_number'];
                                        $query="SELECT * FROM invoices WHERE invoice_number='$ids'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                        $record = $row['invoice_number'];
                                        $first = $row['client_name'];
                                        $cont = $row['contact'];
                                        $email = $row['mail'];
                                        $type = $row['description'];
                                        $qnt = $row['quantity'];
                                        $prc = $row['price'];
                                        $due = $row['due'];
                                        $dis = $row['discount'];
                                        $vat = $row['vat'];
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Sales Rep</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="sales_rep" value="<?php echo $FirstName." ".$LastName; ?>" required id="f-name" placeholder="Enter Client Name ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Client Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="client_name" value="<?php echo $first; ?>" required id="l-name" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="description" required value="<?php echo $type; ?>" class="form-control" id="b-day" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Quantity</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="quantity" required value="<?php echo $qnt; ?>" class="form-control" id="mobile" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Unit Price</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="price" value="<?php echo $prc; ?>" required class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Discount %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="discount" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">VAT %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="vat" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Due Date</label>
                                            <div class="col-lg-6">
                                                <input type="date" name="due" value="<?php echo $due; ?>" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" name="mail" value="<?php echo $email; ?>" required id="l-name" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Contact</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="contact" value="<?php echo $cont; ?>" required id="l-name" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" name="create" class="btn btn-primary">Update</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['create'])) {
                                        $name = $_POST['sales_rep'];
                                        $client = $_POST['client_name'];
                                        $desc = $_POST['description'];
                                        $quant = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $disc = $_POST['discount'];
                                        $vat = $_POST['vat'];
                                        $due = $_POST['due'];
                                        $mal = $_POST['mail'];
                                        $conts = $_POST['contact'];

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
                                            $update = "UPDATE `invoices` SET sales_rep='".$name."', client_name='".$client."', description='".$desc."', quantity='".$quant."', price='".$price."', due='".$due."', discount='".$disc."', vat='".$vat."', total_inc='".$totin."', total_exc='".$totex."', mail='".$mal."', contact='".$conts."' where invoice_number='$record'";
                                            $pdo->exec($update);
                                            // header("location : edit_profile.php");
                                            echo '<script language="javascript">';
                                            echo 'alert("Update successful")';
                                            echo '</script>';
                                        }catch(PDOException $e){
                                            die("ERROR: Could not able to execute $update. " . $e->getMessage());
                                            echo '<script language="javascript">';
                                            echo 'alert("Update failed")';
                                            echo '</script>';
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
