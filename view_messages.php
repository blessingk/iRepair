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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Messaging section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="icon_mail"></i>View Messages</li>
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
                                    <a data-toggle="tab" href="#messages">
                                        <i class="icon-user"></i>
                                        View Messages
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#sent">
                                        <i class="icon-envelope"></i>
                                        Sent Messages
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#new">
                                        <i class="icon-envelope"></i>
                                      New Messages
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#send">
                                        <i class="icon-envelope"></i>
                                        Send Message
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="messages" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> View Messages </h1>
                                            <div class="form-group">
                                                <input type="text" id="myUser"  class="col-md-3" onkeyup="searchInfo()" placeholder="Search for messages.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myTab">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_mobile"></i> Message</th>
                                                    <th><i class=""></i> From</th>
                                                    <th><i class="icon_cart"></i> Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM messages WHERE to_mail='$mail' AND status='read' ORDER BY message_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['message_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['message']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['ms_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No messages were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="sent" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Sent Messages </h1>
                                            <div class="form-group">
                                                <input type="text" id="myName"  class="col-md-3" onkeyup="searchData()" placeholder="Search for messages.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <th>To</th>
                                                    <th><i class="icon_mail"></i> Message</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM messages WHERE email = '$mail' ORDER BY message_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['message_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['to_mail']; ?></td>
                                                    <td><?php echo $row['message']; ?></td>
                                                    <td><?php echo $row['ms_date']; ?></td>

                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No messages were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="new" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> New Messages </h1>
                                            <div class="form-group">
                                                <input type="text" id="myUse"  class="col-md-3" onkeyup="searchDatas()" placeholder="Search for messages.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myTabl">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_mail"></i> Message</th>
                                                    <th><i class="icon_profile"></i>User Name</th>
                                                    <th>From</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM messages WHERE to_mail = '$mail' AND status='unread' ORDER BY message_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['message_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['message']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['ms_date']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="read.php?message_id=<?php echo $id; ?>" onclick='return confirm("Please click OK to read the message?")' title='Read message' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No messages were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="send" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Send Message </h1>

                                            <form class="form-horizontal" method="post" role="form">
                                                <?php
                                               $id=$_GET['user_id'];
                                                $query="SELECT * FROM users WHERE user_id='$id'";
                                                //var_dump($query3);die();
                                                $res = $pdo->query($query);
                                                while($row = $res->fetch()) {
                                                $ms_id = $row['user_id'];
                                                $user = $row['username'];
                                                $mail = $row['email'];
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="username" value="<?php echo $user; ?>" required id="username" placeholder="Enter Client Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">From:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="email" value="<?php echo $mail; ?>" required id="From" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">To:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="to_mail" required id="To email" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Message:</label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" name="message" required  class="form-control" id="b-day" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="create" class="btn btn-primary">Send Message</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php }
                                            if(isset($_POST['create'])) {
                                                $name = $_POST['username'];
                                                $email = $_POST['email'];
                                                $mes = $_POST['message'];
                                                $to = $_POST['to_mail'];
                                                try {
                                                    $ins = "INSERT INTO messages(username, email, message, ms_date, status, to_mail) VALUES ('$name', '$email', '$mes', CURRENT_TIMESTAMP, 'unread', '$to' )";
                                                    $pdo->exec($ins);
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Message sent")';
                                                    echo '</script>';

                                                } catch (PDOException $e) {
                                                    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                }
                                                if ($ins) {
                                                    $to = $email;
                                                    $subject = 'Message';
                                                    $message = "$mes";
                                                    $from = "$mail";
                                                    // Sending email
                                                    if (mail($to, $subject, $message)) {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Your message has been sent successfully.")';
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
        function searchData() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myName");
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
        function searchInfo() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myUser");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTab");
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
        function searchDatas() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myUse");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTabl");
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
