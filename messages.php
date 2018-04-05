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
                        <li><i class="icon_mail"></i>My Messages</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1> View Messages</h1>
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
                                                <input type="text" class="form-control" name="email" required id="To email" placeholder=" ">
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
                                                <button type="submit" name="create" class="btn btn-primary">Create</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php }
                                    if(isset($_POST['create'])) {
                                        $name = $_POST['username'];
                                        $email = $_POST['email'];
                                        $mes = $_POST['message'];
                                        try {
                                            $ins = "INSERT INTO messages(username, email, message, ms_date, status) VALUES ('$name', '$email', '$mes', CURRENT_TIMESTAMP, 'unread' )";
                                            $pdo->exec($ins);
                                            echo '<script language="javascript">';
                                            echo 'alert("Invoice created successfully")';
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

