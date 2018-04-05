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

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Receipts section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Create Receipt</li>
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
                                    <a data-toggle="tab" href="#invoices">
                                        <i class="icon-user"></i>
                                        All Invoices
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#new-invoices">
                                        <i class="icon-user"></i>
                                        New Invoices
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#receipts">
                                        <i class="icon-envelope"></i>
                                        Receipts
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#custom_receipt">
                                        <i class="icon-envelope"></i>
                                        Custom Receipt
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="invoices" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> All Invoices </h1>
                                            <div class="form-group">
                                                <input type="text" id="myInvoice"  class="col-md-3" onkeyup="searchInvoice()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myInvoi">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_phone"></i> Contact Number</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_cart_alt"></i>Amount Due</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM invoices ORDER BY invoice_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['invoice_number'];
                                                    $equiry=$row['invoice_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['mail']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['invoice_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="create_receipt.php?invoice_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to create receipt?")' title='Create Receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no invoices";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="new-invoices" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> New Invoices </h1>
                                            <div class="form-group">
                                                <input type="text" id="myInput"  class="col-md-3" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table  class="table table-striped table-advance table-hover" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_phone"></i> Contact Number</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_cart_alt"></i>Amount Due</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM invoices WHERE status='invoiced' ORDER BY invoice_id DESC";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['invoice_number'];
                                                    $equiry=$row['invoice_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['mail']; ?></td>
                                                    <td>R <?php echo $row['price']; ?>.00</td>
                                                    <td><?php echo $row['invoice_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="create_receipt.php?invoice_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to create receipt?")' title='Create Receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no invoices";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="receipts" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Receipts </h1>
                                            <div class="form-group">
                                                <input type="text" id="myReceipt"  class="col-md-3" onkeyup="myReceipts()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myRece">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i> Client Name</th>
                                                    <th>Description</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_phone"></i>Contact</th>
                                                    <th><i class="icon_minus-box"></i>Amount Due</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Actions</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM receipts ORDER BY receipt_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['receipt_number'];
                                                    $number=$row['receipt_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td>R <?php echo $row['amount']; ?>.00</td>
                                                    <td><?php echo $row['receipt_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="receipt_detail.php?receipt_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view receipt details?")' title='View Receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_receipt.php?receipt_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit receipt?")' title='Edit Receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                                            | <a class="" href="delete_receipt.php?receipt_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete receipt?")' title='Delete Receipt' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo "no receipts";

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="custom_receipt" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Custom Receipt </h1>
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
                                                    <label class="col-lg-2 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Contact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="contact" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Amount Due</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="amount" class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Amount Received</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="received" class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Due Date</label>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="due_date" class="form-control"  placeholder="">
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
                                                $id= "REC0000". $num1 .$num2;
                                                $name =$_POST['sales_rep'];
                                                $client =$_POST['client_name'];
                                                $desc=$_POST['description'];
                                                $contact=$_POST['contact'];
                                                $mail=$_POST['email'];
                                                $amt=$_POST['amount'];
                                                $rec=$_POST['received'];
                                                $due=$_POST['due_date'];
                                                if(!empty($_POST['client_name'])) {
                                                    $sql = "SELECT * FROM receipts WHERE email ='$_POST[email]'";
                                                    $res = $pdo->query($sql);
                                                    if ($res->rowCount() == 0) {
                                                        $bal = $rec - $amt;


                                                        try {
                                                            $ins = "INSERT INTO receipts(sales_rep, client_name, description, contact, email, amount, received, balance, receipt_date, receipt_number, due_date) VALUES ('$name', '$client', '$desc', '$contact', '$mail', '$amt', '$rec', '$bal', CURRENT_DATE, '$id', '$due')";
                                                            $pdo->exec($ins);
                                                            echo '<script language="javascript">';
                                                            echo 'alert("Receipt created successfully")';
                                                            echo '</script>';

                                                        } catch (PDOException $e) {
                                                            die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                        }
                                                    } else if ($res->rowCount() > 0) {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("receipt already created")';
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
        function searchInvoice() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInvoice");
            filter = input.value.toUpperCase();
            table = document.getElementById("myInvoi");
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
        function myReceipts() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myReceipt");
            filter = input.value.toUpperCase();
            table = document.getElementById("myRece");
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
