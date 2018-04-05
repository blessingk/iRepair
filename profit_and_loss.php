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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Report section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Profit and Loss</li>
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
                                    <a data-toggle="tab" href="#daily">
                                        <i class="icon-user"></i>
                                        Daily Profit
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#weekly">
                                        <i class="icon-envelope"></i>
                                        Weekly Profit
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#monthly">
                                        <i class="icon-envelope"></i>
                                        Monthly Profit
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#yearly">
                                        <i class="icon-envelope"></i>
                                        Yearly Profit
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="daily" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Daily Profit and Loss </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr><th></th><td>Sales</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT sale_id, stock_number, total, SUM(total) as total_s, quantity, description FROM sales WHERE sale_date >= (CURDATE() - INTERVAL 1 DAY)";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['sale_id'];
                                                    $stock=$row['stock_number'];
                                                    $total=$row['total'];
                                                    $qnt=$row['quantity'];
                                                    $desc=$row['description'];
                                                    $total_s=$row['total_s'];
                                                    ?>

                                                <?php
                                                }?>
                                                <tr><th></th><th>Total Sales</th><td><strong><u>R <?php echo $total_s; ?>.00</u></strong></td></tr>
                                                <?php
                                                }
                                                ?><tr><th></th><td>Purchases</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT stock_id, stock_number, total_p, SUM(total_p) as total, quantity, description  FROM stocks WHERE stock_date >= (CURDATE() - INTERVAL 1 DAY) ORDER BY stock_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0) {
                                                        while ($row = $res->fetch()) {
                                                            $id = $row['stock_id'];
                                                            $stock = $row['stock_number'];
                                                            $tota = $row['total_p'];
                                                            $qnt = $row['quantity'];
                                                            $desc = $row['description'];
                                                            $tot = $row['total'];
                                                            ?>
                                                            <?php
                                                        }?>
                                                        <tr><th></th><th>Total Purchases</th><td><strong><u>R <?php echo $tot; ?>.00</u></strong></td></tr>
                                                    <tr><th></th><th>Profit (Loss)</th><td><strong><u>R <?php echo $total_s - $tot; ?>.00</u></strong></td></tr>
                                                <?php
                                                    }

                                                    ?>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="weekly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Weekly Profit and Loss </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr><th></th><td>Sales</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT sale_id, stock_number, total, SUM(total) as total_s, quantity, description FROM sales WHERE sale_date >= (CURDATE() - INTERVAL 7 DAY)";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                        $id=$row['sale_id'];
                                                        $stock=$row['stock_number'];
                                                        $total=$row['total'];
                                                        $qnt=$row['quantity'];
                                                        $desc=$row['description'];
                                                        $total_s=$row['total_s'];
                                                        ?>

                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Sales</th><td><strong><u>R <?php echo $total_s; ?>.00</u></strong></td></tr>
                                                <?php
                                                }
                                                ?><tr><th></th><td>Purchases</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT stock_id, stock_number, total_p, SUM(total_p) as total, quantity, description  FROM stocks WHERE stock_date >= (CURDATE() - INTERVAL 7 DAY) ORDER BY stock_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0) {
                                                    while ($row = $res->fetch()) {
                                                        $id = $row['stock_id'];
                                                        $stock = $row['stock_number'];
                                                        $tota = $row['total_p'];
                                                        $qnt = $row['quantity'];
                                                        $desc = $row['description'];
                                                        $tot = $row['total'];
                                                        ?>
                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Purchases</th><td><strong><u>R <?php echo $tot; ?>.00</u></strong></td></tr>
                                                <tr><th></th><th>Profit (Loss)</th><td><strong><u>R <?php echo $total_s - $tot; ?>.00</u></strong></td></tr>

                                                <?php
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
                                <div id="monthly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Monthly Profit and Loss </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr><th></th><td>Sales</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT sale_id, stock_number, total, SUM(total) as total_s, quantity, description FROM sales WHERE sale_date >= (CURDATE() - INTERVAL 30 DAY)";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                        $id=$row['sale_id'];
                                                        $stock=$row['stock_number'];
                                                        $total=$row['total'];
                                                        $qnt=$row['quantity'];
                                                        $desc=$row['description'];
                                                        $total_s=$row['total_s'];
                                                        ?>

                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Sales</th><td><strong><u>R <?php echo $total_s; ?>.00</u></strong></td></tr>
                                                <?php
                                                }
                                                ?><tr><th></th><td>Purchases</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT stock_id, stock_number, total_p, SUM(total_p) as total, quantity, description  FROM stocks WHERE stock_date >= (CURDATE() - INTERVAL 30 DAY) ORDER BY stock_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0) {
                                                    while ($row = $res->fetch()) {
                                                        $id = $row['stock_id'];
                                                        $stock = $row['stock_number'];
                                                        $tota = $row['total_p'];
                                                        $qnt = $row['quantity'];
                                                        $desc = $row['description'];
                                                        $tot = $row['total'];
                                                        ?>
                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Purchases</th><td><strong><u>R <?php echo $tot; ?>.00</u></strong></td></tr>
                                                <tr><th></th><th>Profit (Loss)</th><td><strong><u>R <?php echo $total_s - $tot; ?>.00</u></strong></td></tr>

                                                <?php

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
                                <div id="yearly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Yearly Profit and Loss</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr><th></th><td>Sales</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT sale_id, stock_number, total, SUM(total) as total_s, quantity, description FROM sales WHERE sale_date >= (CURDATE() - INTERVAL 356 DAY)";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                        $id=$row['sale_id'];
                                                        $stock=$row['stock_number'];
                                                        $total=$row['total'];
                                                        $qnt=$row['quantity'];
                                                        $desc=$row['description'];
                                                        $total_s=$row['total_s'];
                                                        ?>

                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Sales</th><td><strong><u>R <?php echo $total_s; ?>.00</u></strong></td></tr>
                                                <?php
                                                }
                                                ?><tr><th></th><td>Purchases</td><td></td></tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT stock_id, stock_number, total_p, SUM(total_p) as total, quantity, description  FROM stocks WHERE stock_date >= (CURDATE() - INTERVAL 356 DAY) ORDER BY stock_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0) {
                                                    while ($row = $res->fetch()) {
                                                        $id = $row['stock_id'];
                                                        $stock = $row['stock_number'];
                                                        $tota = $row['total_p'];
                                                        $qnt = $row['quantity'];
                                                        $desc = $row['description'];
                                                        $tot = $row['total'];
                                                        ?>
                                                        <?php
                                                    }?>
                                                <tr><th></th><th>Total Purchases</th><td><strong><u>R <?php echo $tot; ?>.00</u></strong></td></tr>
                                                <tr><th></th><th>Profit (Loss)</th><td><strong><u>R <?php echo $total_s - $tot; ?>.00</u></strong></td></tr>

                                                <?php
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
