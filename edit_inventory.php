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
                        <h3 class="page-header"><i class="fa fa-user-md"></i>Inventory Section</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-mobile-phone"></i>Update Item</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div id="edit-profile" class="tab-pane">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <h1> Update Inventory <a class="pull-right btn btn-primary" href="inventory.php"><i class="icon_refresh"></i> Back</a></h1>
                                        <form class="form-horizontal" method="post" role="form">
                                            <?php
                                            $ids=$_GET['inventory_number'];
                                            $query="SELECT * FROM inventory WHERE inventory_number='$ids'";
                                            //var_dump($query3);die();
                                            $res = $pdo->query($query);
                                            while($row = $res->fetch()) {
                                                $stock = $row['inventory_number'];
                                                $first = $row['sup_name'];
                                                $desc = $row['description'];
                                                $qnt = $row['quantity'];
                                                $prc = $row['price'];
                                                $sal = $row['sale_price'];
                                                ?>
                                                <form class="form-horizontal" method="post" role="form">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Supplier Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="sup_name" value="<?php echo $first;?>" required id="f-name" placeholder="Enter supplier Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Description</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="description" value="<?php echo $desc;?>" required id="l-name" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Quantity</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="quantity" value="<?php echo $qnt;?>" required class="form-control" id="b-day" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Unit Price</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="price" value="<?php echo $prc;?>" required class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Sale Price</label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="sale_price" value="<?php echo $sal;?>" required class="form-control" id="mobile" placeholder=" ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" name="record" class="btn btn-primary">Update</button>
                                                            <button type="reset" class="btn btn-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php
                                                if(isset($_POST['record'])){
                                                    $name =$_POST['sup_name'];
                                                    $desc =$_POST['description'];
                                                    $quant=$_POST['quantity'];
                                                    $price=$_POST['price'];
                                                    $sprice=$_POST['sale_price'];
                                                    if (!empty($quant && $price)) {
                                                        $total = $price * $quant;
                                                    }
                                                    if (!empty($quant && $sprice)) {
                                                        $total_s = $sprice * $quant;
                                                    }
                                                    try {

                                                        $update = "UPDATE `inventory` SET sup_name='".$name."', description='".$desc."', quantity='".$quant."', price='".$price."', sale_price='".$sprice."', total_p='".$total."', total_s='".$total_s."' where inventory_number='$stock'";
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
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/18/18
 * Time: 9:59 AM
 */