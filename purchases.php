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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Purchases section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Purchases</li>
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

                                <li class="">
                                    <a data-toggle="tab" href="#purchases">
                                        <i class="icon-envelope"></i>
                                        Purchases
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#new">
                                        <i class="icon-user"></i>
                                        New Item
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="new" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Record new item</h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Supplier Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="sup_name" required id="f-name" placeholder="Enter supplier Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Description</label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control" name="description"  required id="l-name" placeholder=" "></textarea>
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
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="record" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['record'])){
                                                $num1='';
                                                $num2='';
                                                $year = date("Y");
                                                $num1 = (rand(0,9));
                                                $num2 = (rand(0,9));
                                                function generateCode($numchars=5,/*$digits=1,*/$letters=1)
                                                {
                                                    $dig = "012345678923456789";
                                                    $abc = "ABCDEFGHJKLMNOPQRSTUVWXYZ";
                                                    if($letters == 1)
                                                    {
                                                        $str = $abc;
                                                    }

                                                    for($i=0; $i < $numchars; $i++)
                                                    {
                                                        $randomized = $str{rand() % strlen($str)};
                                                    }
                                                    return $randomized;
                                                }

                                                $code = generateCode('5','1');
                                                $id= "STK". $year . $num1 .$num2 .$code;
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
                                                    $ins = "INSERT INTO `stocks` (`sup_name`, `description`, `quantity`, `price`, `sale_price`, `total_p`, `stock_number`, `stock_date`, `status`, `total_s`) VALUES ('$name', '$desc', '$quant', '$price', '$sprice', '$total', '$id', CURRENT_DATE, 'purchase', '$total_s' )";
                                                    $pdo->exec($ins);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Stock recorded successfully")';
                                                    echo '</script>';

                                                } catch (PDOException $e) {
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                }

                                            }
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div id="purchases" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Purchased items </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Supplier Name</th>
                                                    <th><i class="icon_plus"></i>Description</th>
                                                    <th><i class="icon_paperclip"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_cart_alt"></i>Selling Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM stocks ORDER BY stock_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['stock_id'];
                                                    $stock=$row['stock_number'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['sup_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td>R <?php echo $row['sale_price']; ?>.00</td>
                                                    <td><?php echo $row['stock_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="sale_item.php?stock_number=<?php echo $stock; ?>" onclick='return confirm("Are you sure you want to sale this item?")' title='Sale Item' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>
                                                            | <a class="" href="edit_item.php?stock_number=<?php echo $stock; ?>" onclick='return confirm("Are you sure you want to edit item?")' title='Edit Item' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            | <a class="" href="delete_item.php?stock_number=<?php echo $stock; ?>" onclick='return confirm("Are you sure you want to delete item?")' title='Delete Item' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No purchased items.")';
                                                    echo '</script>';
                                                }


                                                ?>
                                                </tbody>
                                            </table>
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
