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
                        <li><i class="fa fa-mobile-phone"></i>Sales</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="new" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Sell items <a class="pull-right btn btn-primary" href="sales.php"><i class="icon_refresh"></i> Back</a></h1>
                                            <?php
                                            $ids=$_GET['stock_number'];
                                            $qry="SELECT * FROM stocks WHERE stock_number='$ids'";                                          //var_dump($query3);die();
                                            $res = $pdo->query($qry);
                                            if($res->rowCount() > 0) {
                                                while ($row = $res->fetch()) {
                                                    $id = $row['stock_id'];
                                                    $stock = $row['stock_number'];
                                                    //$prod = $row['customer_name'];
                                                    $desc = $row['description'];
                                                    $qnt = $row['quantity'];
                                                    $sp = $row['sale_price'];
                                                    $pr = $row['price'];
                                                }
                                                ?>
                                                <form class="form-horizontal" method="post" role="form">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Customer Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="customer_name"
                                                                   required id="p-name"
                                                                   placeholder="Enter Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Description</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control"
                                                                      name="description" required value="<?php echo $desc;?>"
                                                                      placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Quantity</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="quantity" required
                                                                   class="form-control" id="b-day" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Unit Price</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="price" required value="<?php echo $pr;?>"
                                                                   class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Sale Price</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="sale_price" required value="<?php echo $sp; ?>"
                                                                   class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Amount Received</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="received" required
                                                                   class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" name="record" class="btn btn-primary">
                                                                Sell
                                                            </button>
                                                            <button type="reset" class="btn btn-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php

                                                if (isset($_POST['record'])) {
                                                    $name = $_POST['customer_name'];
                                                    $desc = $_POST['description'];
                                                    $quant = $_POST['quantity'];
                                                    $price = $_POST['price'];
                                                    $sprice = $_POST['sale_price'];
                                                    $rec = $_POST['received'];
                                                    if (!empty($quant && $price)) {
                                                        $total = $price * $quant;
                                                    }
                                                    if (!empty($quant && $sprice)) {
                                                        $total_s = $sprice * $quant;
                                                    }
                                                    if (!empty($quant)) {
                                                        $new_qnt = $qnt - $quant;
                                                        $new_s = $new_qnt * $sprice;
                                                        $new_p = $new_qnt * $price;
                                                    }else
                                                    {
                                                        $new_qnt = $qnt;
                                                        $new_s = $qnt * $sprice;
                                                        $new_p = $qnt * $price;
                                                    }
                                                if($quant <= $qnt) {


                                                    try {
                                                        $ins = "INSERT INTO `sales` (`customer_name`, `description`, `quantity`, `price`, `sale_price`, `total`, `received`, `stock_number`, `sale_date`, `status`) VALUES ('$name', '$desc', '$quant', '$price', '$sprice', '$total_s', '$rec', '$stock', CURRENT_DATE, 'sold')";
                                                        $pdo->exec($ins);
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Item Sold")';
                                                        echo '</script>';
                                                        $inse = "UPDATE stocks SET quantity='".$new_qnt."', total_p='".$new_p."', total_s='".$new_s."' WHERE stock_number='$ids'";
                                                        $pdo->query($inse);


                                                    } catch (PDOException $e) {
                                                        die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                    }
                                                }else
                                                {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Items cannot be sold. Please check the number of items available.")';
                                                    echo '</script>';

                                                }
                                                if ($qnt==0){
                                                    $query="DELETE FROM stocks WHERE stock_number='$stock'";
                                                    $pdo->query($query);
                                                    echo'<script language="javascript">alert("Deletion successful"); location=("sales.php");</script>';
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


</body>

</html>