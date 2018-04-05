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
                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <!--<li class="active">
                                    <a data-toggle="tab" href="#recent-activity">
                                        <i class="icon-home"></i>
                                        Daily Activity
                                    </a>
                                </li>-->
                                <li>
                                    <a data-toggle="tab" href="#sales">
                                        <i class="icon-user"></i>
                                        Sales
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#custom">
                                        <i class="icon-envelope"></i>
                                        Custom sale
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="sales" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Sales</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th><i class="icon_plus-box"></i>Description</th>
                                                    <th><i class="icon_paperclip"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_cart_alt"></i>Selling Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM sales ORDER BY sale_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['sale_id'];
                                                    $stock=$row['stock_number'];

                                                    ?>
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td>R <?php echo $row['sale_price']; ?>.00</td>
                                                    <td><?php echo $row['sale_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="view_sale.php?sale_id=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view this item?")' title='View item receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="delete_sale.php?sale_id=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete item?")' title='Delete Item' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="custom" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Custom Sale</h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Customer Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="customer_name" required id="f-name" placeholder="Enter customer Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Description</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="description"  required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Quantity</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="quantity" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Unit Price</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="price" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Sale Price</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="sale_price" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Amount Received</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="received" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="record" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['record'])) {
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
                                                $id = "STK" . $year . $num1 . $num2 . $code;
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
                                                try {
                                                    $ins = "INSERT INTO `sales` (`customer_name`, `description`, `quantity`, `price`, `sale_price`, `total`, `received`, `stock_number`, `sale_date`, `status`) VALUES ('$name', '$desc', '$quant', '$price', '$sprice', '$total_s', '$rec', '$id', CURRENT_DATE, 'sold')";
                                                    $pdo->exec($ins);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Item Sold")';
                                                    echo '</script>';

                                                } catch (PDOException $e) {
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
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
