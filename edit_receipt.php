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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Receipt Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Edit Receipt</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Update receipt <a class="pull-right btn btn-primary" href="receipts.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $ids=$_GET['receipt_number'];
                                        $query="SELECT * FROM receipts WHERE receipt_number='$ids'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                        $receipt = $row['receipt_number'];
                                        $first = $row['client_name'];
                                        $cont = $row['contact'];
                                        $email = $row['email'];
                                        $type = $row['description'];
                                        $amnt = $row['amount'];
                                        $re = $row['received'];
                                        $serial = $row['serial'];
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Sales Rep</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="sales_rep"
                                                       value="<?php echo $FirstName . " " . $LastName; ?>" required
                                                       id="f-name" placeholder="Enter Client Name ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Client Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="client_name"
                                                       value="<?php echo $first; ?>" required id="l-name"
                                                       placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="description" required
                                                       value="<?php echo $type; ?>" class="form-control"
                                                       id="b-day"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-6">
                                                <input type="email" name="email" required
                                                       value="<?php echo $email; ?>" class="form-control"
                                                       id="mobile"
                                                       placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Contact Number</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="contact"
                                                       value="<?php echo $cont;  ?>" required
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Amount Due</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="amount" value="<?php echo $amnt; ?>"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Amount Received</label>
                                            <div class="col-lg-6">
                                                <input type="number" name="received" value="<?php echo $re; ?>"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Serial Number</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="serial" value="<?php echo $serial; ?>"
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" name="create" class="btn btn-primary">Update
                                                </button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['create'])) {
                                        $name =$_POST['sales_rep'];
                                        $client =$_POST['client_name'];
                                        $desc=$_POST['description'];
                                        $contact=$_POST['contact'];
                                        $mail=$_POST['email'];
                                        $amt=$_POST['amount'];
                                        $rec=$_POST['received'];
                                        $seri=$_POST['serial'];

                                        try {
                                            $update = "UPDATE `receipts` SET sales_rep='".$name."', client_name='".$client."', description='".$desc."', contact='".$contact."', email='".$mail."', amount='".$amt."', received='".$rec."', serial='".$seri."' where receipt_number='$receipt'";
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
