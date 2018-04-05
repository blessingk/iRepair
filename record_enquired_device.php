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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Device Record section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="admin_profile.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device record</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> Device repair booking <a class="pull-right btn btn-primary" href="record_device.php"><i class="icon_refresh"></i> Back</a></h1>
                                    <form class="form-horizontal" method="post" role="form">
                                        <?php
                                        $id=$_GET['enquiry_number'];
                                        $query="SELECT * FROM enquiry WHERE enquiry_number='$id'";
                                        //var_dump($query3);die();
                                        $res = $pdo->query($query);
                                        while($row = $res->fetch()) {
                                            $enquiry = $row['enquiry_number'];
                                            $first = $row['unames'];
                                            $cont = $row['contact'];
                                            $model = $row['model'];
                                            $type = $row['device_name'];
                                            $mail = $row['email'];
                                            $adrs = $row['address'];
                                            ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Client Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="client_name" value="<?php echo $first; ?>" required id="f-name" placeholder="Enter Client Name ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control" name="email" value="<?php echo $mail; ?>" required id="l-name" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Contact Number</label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="contact" required value="<?php echo $cont; ?>" class="form-control" id="b-day" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Device Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="device_name" value="<?php echo $type; ?>" required class="form-control" id="email" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Serial Number</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="serial" value="<?php echo $model; ?>" required class="form-control" id="mobile" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Notes</label>
                                                <div class="col-lg-6">
                                                    <textarea type="text" name="notes"  class="form-control"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Assign Technician</label>
                                            <div class="col-lg-6">
                                                <select name="tech"  required >
                                                    <option >Assign Technician</option>
                                                    <?php
                                                    $tech = ("SELECT first_name, last_name FROM users where role='tech' ");
                                                    $sus = $pdo->query($tech);
                                                    while($row = $sus->fetch()){
                                                        echo '<option value="'.$row['first_name'].'" "'.$row['last_name'].'">';
                                                        echo $row['first_name']." ".$row['last_name'];
                                                        echo '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Amount Due</label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="amount" value="0.00" class="form-control"  placeholder="0.00">
                                                </div>
                                            </div>
                                            <<div class="form-group">
                                            <label class="col-lg-2 control-label">Visible Marks</label>
                                            <div class="col-lg-6">
                                                <textarea type="text" class="form-control" name="visible_marks" required placeholder=" "></textarea>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" name="book" class="btn btn-primary">Book</button>
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php }
                                        $ids=$_GET['enquiry_number'];
                                        if(isset($_POST['book'])){
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
                                            $id= "KEL". $year . $num1 .$num2 .$code;
                                            $name =$_POST['client_name'];
                                            $mail =$_POST['email'];
                                            $cont=$_POST['contact'];
                                            $device=$_POST['device_name'];
                                            $serial=$_POST['serial'];
                                            $notes=$_POST['notes'];
                                            $tech=$_POST['tech'];
                                            $amt=$_POST['amount'];
                                            $visible=$_POST['visible_marks'];
                                            try{
                                                $ins = "INSERT INTO device_records(client_name, email, contact, device_name, serial, notes, tech, amount, visible_marks, record_number, record_date, status, address) 
VALUES ('$name', '$mail', '$cont', '$device', '$serial', '$notes', '$tech', '$amt', '$visible', '$id', CURRENT_DATE, 'unread', '$adrs' )";
                                                $pdo->exec($ins);
                                                echo '<script language="javascript">';
                                                echo 'alert("Device recorded successfully")';
                                                echo '</script>';
                                               $inse = "UPDATE enquiry SET status='complete' AND read_status='read' WHERE enquiry_number='$ids'";
                                                $pdo->query($inse);

                                            }
                                            catch(PDOException $e){
                                                die("ERROR: Could not able to execute $ins. " . $e->getMessage());
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
