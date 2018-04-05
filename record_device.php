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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Device record section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Device Record</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
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
                                    <a data-toggle="tab" href="#enquiries">
                                        <i class="icon-user"></i>
                                        All Enquiries
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#new-enquiries">
                                        <i class="icon-user"></i>
                                        New Enquiries
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#new-device">
                                        <i class="icon-envelope"></i>
                                        Book device
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#recorded-devices">
                                        <i class="icon-envelope"></i>
                                        Booked devices
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <!-- profile -->
                                <div id="enquiries" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>List of enquiries</h1>
                                            <div class="form-group">
                                                <input type="text" id="myInquiry"  class="col-md-3" onkeyup="myInquiries()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myData">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Full Name</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_phone"></i> Contact</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i>Serial</th>
                                                    <th><i class="icon_question"></i>Problem</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_percent"></i>Status</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $query="SELECT * FROM enquiry ORDER BY equiry_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($query);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['enquiry_number'];
                                                    $equiry=$row['equiry_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['unames']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['device_name']; ?></td>
                                                    <td><?php echo $row['model']; ?></td>
                                                    <td><?php echo $row['problem']; ?></td>
                                                    <td><?php echo $row['enquiry_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-danger"><?php echo $row['read_status']; ?></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div class="btn-group">
                                                        <a class="" href="delete_inquiry.php?enquiry_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete enquiry?")' title='Delete enquiry' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No records matching were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="new-enquiries" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>New enquiries</h1>
                                            <div class="form-group">
                                                <input type="text" id="myInput"  class="col-md-3" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table id="myTable"  class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Full Name</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_phone"></i> Contact</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i>Serial</th>
                                                    <th><i class="icon_question"></i>Problem</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php

                                                    $query="SELECT * FROM enquiry WHERE status='incomplete' ORDER BY equiry_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($query);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['enquiry_number'];
                                                    $equiry=$row['equiry_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['unames']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['device_name']; ?></td>
                                                    <td><?php echo $row['model']; ?></td>
                                                    <td><?php echo $row['problem']; ?></td>
                                                    <td><?php echo $row['enquiry_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="record_enquired_device.php?enquiry_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to create a job card?")' title='Create Job Card' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No records matching your account were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <!-- edit-profile -->
                                <div id="new-device" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1>Device repair booking</h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Client Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="client_name" required id="f-name" placeholder="Enter Client Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" name="email" required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Contact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="contact" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Device Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="device_name" required class="form-control" id="email" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Serial Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="serial" required class="form-control" id="mobile" placeholder=" ">
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
                                                            $tech = ("SELECT first_name, last_name, username FROM users where role='tech' ");
                                                            $sus = $pdo->query($tech);
                                                            while($row = $sus->fetch()){
                                                                echo '<option value="' . $row['username'] . '">';
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
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Visible_Marks</label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" name="visible_marks"  class="form-control"  placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="address" required class="form-control"  placeholder="0.00">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Job Status</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="jstatus" required class="form-control"  placeholder="0.00">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="book" class="btn btn-primary">Book</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
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
                                                $adr=$_POST['address'];
                                                $job=$_POST['jstatus'];
                                                try{
                                                    $ins = "INSERT INTO device_records(client_name, email, contact, device_name, serial, notes, tech, amount, visible_marks, record_number, record_date, status, address, jstatus) 
VALUES ('$name', '$mail', '$cont', '$device', '$serial', '$notes', '$tech', '$amt', '$visible', '$id', CURRENT_DATE, 'unread', '$adr', '$job')";
                                                    $pdo->exec($ins);
                                                    $inst = "INSERT INTO notofications(notification, status, ndate) VALUES('You have new device assigned to you.', '0', CURRENT_DATE ) ";
                                                    $pdo->exec($inst);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Device recorded successfully")';
                                                    echo '</script>';

                                                }
                                                catch(PDOException $e){
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                }
                                                if ($ins) {
                                                    $to = $_POST['email'];
                                                    $subject = 'Job Card';
                                                    $message = 'Dear Client, 
Wellcome to Keltech Repairs, one stop . 

Thank you for your interest in our service offering. Please go to www.keltechrepairs.co.za/system and login into your account to view the job card.

For any further queries, contact us on 021-824 6261

DIRECT PAYMENTS TO: KELTECH REPAIRS

STANDARD BANK CHEQUE ACCOUNT # 070 616 396, BRANCH CODE 020909.

Would you like to stay up to date with the latest news and promotions from Keltech Repairs? Do not 
forget to like us on https://www.facebook.com/keltechrepair

kind regards,

Keltech Repairs
                                                    ';
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
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div id="recorded-devices" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Booked Devices </h1>
                                            <div class="form-group">
                                                <input type="text" id="myRecord"  class="col-md-3" onkeyup="myRecords()" placeholder="Search for names.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-advance table-hover" id="myReco">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Client Name</th>
                                                    <th><i class="icon_mail"></i> Email</th>
                                                    <th><i class="icon_phone"></i> Contact</th>
                                                    <th><i class="icon_mobile"></i> Device Name</th>
                                                    <th><i class="icon_cursor"></i>Serial</th>
                                                    <th><i class="icon_question"></i>Problem</th>
                                                    <th><i class="icon_profile"></i>Technician</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_percent"></i>Job status</th>
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
                                                    //var_dump($row);die();<i class="icon_pencil_alt"></i>

                                                    ?>
                                                    <td><?php echo $row['client_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['device_name']; ?></td>
                                                    <td><?php echo $row['serial']; ?></td>
                                                    <td><?php echo $row['notes']; ?></td>
                                                    <td><?php echo $row['tech']; ?></td>
                                                    <td><?php echo $row['record_date']; ?></td>
                                                    <td><?php echo $row['jstatus']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="" href="booking_detail.php?record_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to view booking details?")' title='Booking Details' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            | <a class="" href="edit_job_card.php?record_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to edit Job Card?")' title='Edit Job Card' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> </a>
                                                            |<a class="" href="delete_job_card.php?record_number=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete job card?")' title='Delete Job Card' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span> </a>
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
        function myInquiries() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInquiry");
            filter = input.value.toUpperCase();
            table = document.getElementById("myData");
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
        function myRecords() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myRecord");
            filter = input.value.toUpperCase();
            table = document.getElementById("myReco");
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
        $('#myReco td:contains("urgent")').parent().css('background', '#E77471');
    </script>
</body>

</html>
