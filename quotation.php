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
                        <li><i class="fa fa-mobile-phone"></i>Create Quote</li>
                    </ol>
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
                                    <a data-toggle="tab" href="#enquired_devices">
                                        <i class="icon-user"></i>
                                        Booked Devices
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#all-quotes">
                                        <i class="icon-envelope"></i>
                                        All quotes
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#quoted-device">
                                        <i class="icon-envelope"></i>
                                        Accepted quotes
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#rejects">
                                        <i class="icon-envelope"></i>
                                        Rejected quotes
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#unread">
                                        <i class="icon-envelope"></i>
                                        Unread quotes
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#custom_quote">
                                        <i class="icon-envelope"></i>
                                        Custom Quote
                                    </a>
                                </li>
                               </ul>

                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="enquired_devices" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Booked Devices </h1>
                                            <div class="form-group">
                                                <input type="text" id="myInput"  class="col-md-3" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table id="myTable" class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_phone"></i> Contact</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i>Serial</th>
                                                    <th><i class="icon_question"></i>Problem</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM device_records ORDER BY record_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['record_number'];
                                                    $equiry=$row['record_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['device_name']; ?></td>
                                                    <td><?php echo $row['serial']; ?></td>
                                                    <td><?php echo $row['notes']; ?></td>
                                                    <td><?php echo $row['record_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="create_quote.php?record_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to create quote?")' title='Create Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>
                                                            </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no booked devices";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="all-quotes" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> All Quotations </h1>
                                            <div class="form-group">
                                                <input type="text" id="myQuote"  class="col-md-3" onkeyup="SearchInfo()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myTables">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations ORDER BY quote_id DESC ";
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
                                                    <td><div class="btn-group">
                                                            <a class="" href="quote_detail.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view quote details?")' title='View Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit quote?")' title='Edit Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            | <a class="" href="delete_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete quote?")' title='Delete Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no quotes";
                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="quoted-device" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Accepted Quotations </h1>
                                            <table id="myTable" class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Sales Rep</th>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE status='agree' ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['sales_rep']; ?></td>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="quote_detail.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view quote details?")' title='View Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit quote?")' title='Edit Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            | <a class="" href="delete_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete quote?")' title='Delete Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no quotes";
                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="rejects" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Rejected Quotations </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Sales Rep</th>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE status='reject' ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['sales_rep']; ?></td>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="quote_detail.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view quote details?")' title='View Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit quote?")' title='Edit Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            | <a class="" href="delete_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete a quote?")' title='Delete Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no quotes";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="unread" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Unread Quotations </h1>
                                            <table class="table table-striped table-advance table-hover" >
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Sales Rep</th>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_minus-box"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM quotations WHERE status='none' ORDER BY quote_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['quote_number'];
                                                    $number=$row['quote_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['sales_rep']; ?></td>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['total_inc']; ?>.00</td>
                                                    <td><?php echo $row['quote_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="quote_detail.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view quote details?")' title='View Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit quote?")' title='Edit Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            | <a class="" href="delete_quote.php?quote_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete quote?")' title='Delete Quote' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no quotes";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="custom_quote" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Create custom quote </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Sales Rep</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="sales_rep" value="<?php echo $FirstName." ".$LastName; ?>" required id="f-name" placeholder="Enter Client Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Client Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="client_name"  required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Description</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="description" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Quantity</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="quantity" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Unit Price</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="price" required class="form-control"  placeholder="">
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
                                                        <input type="date" name="due" class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="create" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['create'])){
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
                                                $id= "QUO0000". $num1 .$num2;
                                                $name =$_POST['sales_rep'];
                                                $client =$_POST['client_name'];
                                                $desc=$_POST['description'];
                                                $quant=$_POST['quantity'];
                                                $price=$_POST['price'];
                                                $disc=$_POST['discount'];
                                                $vat=$_POST['vat'];
                                                $due=$_POST['due'];
                                                if(!empty($_POST['client_name'])) {
                                                    $sql = "SELECT * FROM quotations WHERE enquiry_number ='$record'";
                                                    $res = $pdo->query($sql);
                                                    if ($res->rowCount() == 0) {


                                                        if(empty($disc && $vat)){
                                                            $totex = $quant * $price;
                                                            $totin = $quant * $price;
                                                        }
                                                        else if (!empty($disc && $vat)){
                                                            $totex = $quant * $price;
                                                            $tot1 = $totex - ($totex* ($disc/100));
                                                            $tot2 = $tot1 + ($tot1 * ($vat/100));
                                                            $totin = $tot2;
                                                        } else if (empty($disc) && (!empty($vat))){
                                                            $totex = $quant * $price;
                                                            $totin = $totex + ($totex * ($vat/100));


                                                        } else if (empty($vat ) && (!empty($disc))){
                                                            $totex = $quant * $price;
                                                            $totin = $totex - ($totex *($disc/100));
                                                        }

                                                        try {
                                                            $ins = "INSERT INTO quotations(sales_rep, client_name, description, quantity, price, quote_number, quote_date, due, discount, vat, total_inc, total_exc, enquiry_number, address, status) VALUES ('$name', '$client', '$desc', '$quant', '$price', '$id', CURRENT_DATE , '$due', '$disc', '$vat', '$totin', '$totex', '$record', '$addr', 'none' )";
                                                            $pdo->exec($ins);
                                                            echo '<script language="javascript">';
                                                            echo 'alert("Quote created successfully")';
                                                            echo '</script>';

                                                        } catch (PDOException $e) {
                                                            die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                        }
                                                    } else if($res->rowCount() > 0){
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Quote already created")';
                                                        echo '</script>';
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function SearchInfo() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myQuote");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTables");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
