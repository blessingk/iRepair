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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Invoicing Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device Invoice</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Create Invoice <a class="pull-right btn btn-primary" href="invoices.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $id=$_GET['quote_number'];
                                        $query="SELECT * FROM quotations WHERE quote_number='$id'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                        $record = $row['quote_number'];
                                        $first = $row['client_name'];
                                       $email = $row['mail'];
                                       $quant = $row['quantity'];
                                       $cont = $row['contact'];
                                        $type = $row['description'];
                                       $disc = $row['discount'];
                                        $amt = $row['total_inc'];
                                        $price = $row['price'];
                                       $vat = $row['vat'];
                                        $date=$row['quote_date'];
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
                                                <input type="number" name="quantity" required value="<?php echo $quant; ?>" class="form-control" id="mobile" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Unit Price</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="price" value="<?php echo $price; ?>" required class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Discount %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="discount" value="<?php echo $disc; ?>" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">VAT %</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="vat" value="<?php echo $vat; ?>" class="form-control"  placeholder="">
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
                                    <?php }
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
                                        $id= "INV0000". $num1 .$num2;
                                        $name =$_POST['sales_rep'];
                                        $client =$_POST['client_name'];
                                        $desc=$_POST['description'];
                                        $quant=$_POST['quantity'];
                                        $price=$_POST['price'];
                                        $disc=$_POST['discount'];
                                        $vat=$_POST['vat'];
                                        $due=$_POST['due'];
                                        if(!empty($_POST['client_name'])) {
                                            $sql = "SELECT * FROM invoices WHERE quote_number ='$record'";
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
                                                    $ins = "INSERT INTO invoices(sales_rep, client_name, description, quantity, price, discount, vat, invoice_number, invoice_date, total_exc, total_inc, quote_number, due, status, mail, contact) VALUES ('$name', '$client', '$desc', '$quant', '$price', '$disc', '$vat', '$id', CURRENT_DATE, '$totex', '$totin', '$record', '$due', 'invoiced', '$email', '$cont' )";
                                                    $pdo->exec($ins);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Invoice created successfully")';
                                                    echo '</script>';

                                                } catch (PDOException $e) {
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                }
                                            } else if($res->rowCount() > 0){
                                                echo '<script language="javascript">';
                                                echo 'alert("Invoice already created")';
                                                echo '</script>';
                                            }
                                            if ($ins) {
                                                $to = $email;
                                                $subject = 'Invoice';
                                                $message = "Good Day,\n I hope you are well. Thank you for your interest in our service offering. \nPlease click the link www.keltechrepairs.co.za/system to access your invoice\n.
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
