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
                        <li><i class="fa fa-mobile-phone"></i>Quotation reports</li>
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
                                        Daily Report
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#weekly">
                                        <i class="icon-envelope"></i>
                                        Weekly Report
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#monthly">
                                        <i class="icon-envelope"></i>
                                        Monthly Report
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#quarterly">
                                        <i class="icon-envelope"></i>
                                        Quarterly Report
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#mid">
                                        <i class="icon-envelope"></i>
                                        Mid Year Report
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#yearly">
                                        <i class="icon-envelope"></i>
                                        Yearly Report
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="daily" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Daily report </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 1 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo "no reports";
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="weekly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Weekly Report </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 7 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo "no reports";
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
                                            <h1>Monthly Report</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 30 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo "no reports";
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="quarterly" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Quarterly Report</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 120 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No quarterly reports.")';
                                                    echo '</script>';
                                                }


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="mid" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Mid Year Report</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 180 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo "no reports";
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
                                            <h1>Yearly Report</h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE quote_date >= (CURDATE() - INTERVAL 356 DAY) ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }else {
                                                    echo "no reports";
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
