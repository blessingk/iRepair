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
                    <h3 class="page-header"><i class="fa fa-user-md"></i>User section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Create Users</li>
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
                                    <a data-toggle="tab" href="#admin_user">
                                        <i class="icon-user"></i>
                                        Admin user
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#technician">
                                        <i class="icon-envelope"></i>
                                        Technician
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#client">
                                        <i class="icon-envelope"></i>
                                        Client
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="admin_user" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Create Administrator </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="first_name" required id="f-name" placeholder="Enter Admin Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Surname</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="last_name"  required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="username" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="password" name="password" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Gender</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" required name="gender" id="exampleSelect1">
                                                        <option>Enter Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Contact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="phone" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="address" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="create_admin" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['create_admin'])){
                                                $fname =$_POST['first_name'];
                                                $lname =$_POST['last_name'];
                                                $user=$_POST['username'];
                                                $mail =$_POST['email'];
                                                $pass=$_POST['password'];
                                                $sexs=$_POST['gender'];
                                                $phone=$_POST['phone'];
                                                $adr=$_POST['address'];
                                                //$date=$_POST['date_created'];
                                                if(!empty($_POST['username'])){
                                                    $query = "SELECT * FROM users WHERE username = '$_POST[username]' ";

                                                    $result = $pdo->query($query);
                                                    if($result->rowCount() == 0){
                                                        try{
                                                            $ins="INSERT INTO users (first_name, last_name, username, email, password, gender, phone, address, role, design, date_created) VALUES ('$fname','$lname','$user','$mail','$pass','$sexs','$phone','$adr','admin','Admin', CURRENT_TIMESTAMP )";
                                                            $pdo->exec($ins);
                                                            // var_dump($ins) or die;
                                                            echo '<script language="javascript">';
                                                            echo 'alert("account created successfully")';
                                                            echo '</script>';
                                                            //  header("location: signUp.php");
                                                        }
                                                        catch(PDOException $e){
                                                            die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                        }
                                                    }
                                                    elseif ($result->rowCount() > 0)
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Username already exists")';
                                                        echo '</script>';
                                                        //header("location: signUp.php");

                                                    }else
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Failed to create an account")';
                                                        echo '</script>';
                                                    }
                                                    //echo '<meta content="2;register1.php" http-equiv="refresh" />';
                                                }
                                            }


                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div id="technician" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Create Technician </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="first_name" required id="f-name" placeholder="Enter Tech Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Surname</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="last_name"  required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="username" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="password" name="password" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Gender</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" required name="gender" id="exampleSelect1">
                                                            <option>Enter Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Contact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="phone" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="address" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="create_tech" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['create_tech'])){
                                                $fname =$_POST['first_name'];
                                                $lname =$_POST['last_name'];
                                                $user=$_POST['username'];
                                                $mail =$_POST['email'];
                                                $pass=$_POST['password'];
                                                $sexs=$_POST['gender'];
                                                $phone=$_POST['phone'];
                                                $adr=$_POST['address'];
                                                //$date=$_POST['date_created'];
                                                if(!empty($_POST['username'])){
                                                    $query = "SELECT * FROM users WHERE username = '$_POST[username]' ";

                                                    $result = $pdo->query($query);
                                                    if($result->rowCount() == 0){
                                                        try{
                                                            $ins="INSERT INTO users (first_name, last_name, username, email, password, gender, phone, address, role, design, date_created) VALUES ('$fname','$lname','$user','$mail','$pass','$sexs','$phone','$adr','tech','Technician', CURRENT_TIMESTAMP )";
                                                            $pdo->exec($ins);
                                                            // var_dump($ins) or die;
                                                            echo '<script language="javascript">';
                                                            echo 'alert("Account created successfully")';
                                                            echo '</script>';
                                                            //  header("location: signUp.php");
                                                        }
                                                        catch(PDOException $e){
                                                            die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                        }
                                                    }
                                                    elseif ($result->rowCount() > 0)
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Username already exists")';
                                                        echo '</script>';
                                                        //header("location: signUp.php");

                                                    }else
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Failed to create an account")';
                                                        echo '</script>';
                                                    }
                                                    //echo '<meta content="2;register1.php" http-equiv="refresh" />';
                                                }
                                            }


                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div id="client" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Create Client </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="first_name" required id="f-name" placeholder="Enter Client Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Surname</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="last_name"  required id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="username" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" required class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="password" name="password" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Gender</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" required name="gender" id="exampleSelect1">
                                                            <option>Enter Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Contact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="phone" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="address" required class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="create_client" class="btn btn-primary">Create</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['create_client'])){
                                                $fname =$_POST['first_name'];
                                                $lname =$_POST['last_name'];
                                                $user=$_POST['username'];
                                                $mail =$_POST['email'];
                                                $pass=$_POST['password'];
                                                $sexs=$_POST['gender'];
                                                $phone=$_POST['phone'];
                                                $adr=$_POST['address'];
                                                //$date=$_POST['date_created'];
                                                if(!empty($_POST['username'])){
                                                    $query = "SELECT * FROM users WHERE username = '$_POST[username]' ";

                                                    $result = $pdo->query($query);
                                                    if($result->rowCount() == 0){
                                                        try{
                                                            $ins="INSERT INTO users (first_name, last_name, username, email, password, gender, phone, address, role, design, date_created) VALUES ('$fname','$lname','$user','$mail','$pass','$sexs','$phone','$adr','Client','Client', CURRENT_TIMESTAMP )";
                                                            $pdo->exec($ins);
                                                            // var_dump($ins) or die;
                                                            echo '<script language="javascript">';
                                                            echo 'alert("account created successfully")';
                                                            echo '</script>';
                                                            //  header("location: signUp.php");
                                                        }
                                                        catch(PDOException $e){
                                                            die("ERROR: Could not able to execute $ins. " . $e->getMessage());
                                                        }
                                                    }
                                                    elseif ($result->rowCount() > 0)
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Username already exists")';
                                                        echo '</script>';
                                                        //header("location: signUp.php");

                                                    }else
                                                    {
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Failed to create an account")';
                                                        echo '</script>';
                                                    }
                                                    //echo '<meta content="2;register1.php" http-equiv="refresh" />';
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


</body>

</html>
