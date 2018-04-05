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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Profile for <?php echo $FirstName; ?></h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-user-md"></i>Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                        <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                                <h4><?php echo $FirstName." ". $LastName; ?></h4>
                                <div class="follow-ava">
                                    <i class="icon_profile"></i>
                                </div>
                                <h6><?php echo $role; ?></h6>
                            </div>
                            <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                <!--<ul>
                                    <li class="active">

                                        <i class="fa fa-comments fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                <ul>
                                    <li class="active">

                                        <i class="fa fa-bell fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                <ul>
                                    <li class="active">

                                        <i class="fa fa-tachometer fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                                    </li>

                                </ul>-->
                            </div>
                        </div>
                    </div>
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
                                    <a data-toggle="tab" href="#profile">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#edit-profile">
                                        <i class="icon-envelope"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#change-password">
                                        <i class="icon-envelope"></i>
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <!-- profile -->
                                <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                        <div class="bio-graph-heading">
                                            Hello I’m <?php echo $FirstName." ".$LastName. " an " .$acc; ?>.
                                        </div>
                                        <div class="panel-body bio-graph-info">
                                            <h1>Personal Information</h1>
                                            <div class="row">
                                                <div class="bio-row">
                                                    <p><span>First Name </span>: <?php echo $FirstName; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Last Name </span>: <?php echo $LastName; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Username</span>: <?php echo $user; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Email </span>: <?php echo $mail; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Occupation </span>: <?php echo $acc; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Gender </span>: <?php echo $gender; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Contact Number</span>: 0<?php echo $phone; ?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Address</span>: <?php echo $adr; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                        </div>
                                    </section>
                                </div>
                                <!-- edit-profile -->
                                <div id="edit-profile" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Profile Information </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="first_name" id="f-name" value="<?php echo $FirstName;?>" placeholder="Enter First Name ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Last Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="last_name" value="<?php echo $LastName;?>" id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" value="<?php echo $mail;?>" class="form-control" id="email" placeholder=" ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Gender</label>
                                                    <div class="col-lg-6">
                                                        <select name="gender" >
                                                            <option><?php echo $gender; ?></option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Cantact Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="phone" value="<?php echo $phone;?>" class="form-control" id="mobile" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Address</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="address" value="<?php echo $adr;?>" class="form-control"  placeholder="http://www.demowebsite.com ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Occupation</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="design" value="<?php echo $acc?>" class="form-control" id="occupation" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['edit'])){
                                                $fname =$_POST['first_name'];
                                                $lname =$_POST['last_name'];
                                                $user=$_POST['username'];
                                                $mail=$_POST['email'];
                                                //$pass=$_POST['password'];
                                                $sexs=$_POST['gender'];
                                                $phone=$_POST['phone'];
                                                $adr=$_POST['address'];
                                                $acc =$_POST['design'];
                                                try {
                                                    $query = "UPDATE `users` SET first_name='".$fname."', last_name='".$lname."', username='".$user."', email ='".$mail."', gender='".$sexs."', phone='".$phone."',
                                    address='".$adr."', role='Client', design='".$acc."' where username='$user'";
                                                    $pdo->exec($query);
                                                    // header("location : edit_profile.php");
                                                    echo '<script language="javascript">';
                                                    echo 'alert("account updated successfully")';
                                                    echo '</script>';
                                                }catch(PDOException $e){
                                                    die("ERROR: Could not able to execute $query. " . $e->getMessage());
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Update failed")';
                                                    echo '</script>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div id="change-password" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Change Password </h1>
                                            <form class="form-horizontal" method="post" role="form">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">New Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" value="" required name="newpass" id="l-name" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Confirm Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="password" name="confirm" required class="form-control" id="b-day" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" name="pass" class="btn btn-primary">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            if(isset($_POST['pass'])) {
                                                $pass = $_POST['newpass'];
                                                $confirm = $_POST['confirm'];
                                                if ($pass == $confirm) {
                                                    try {
                                                        $query = "UPDATE `users` SET password='" . $pass . "' where username='$user'";
                                                        $pdo->exec($query);
                                                        // header("location : edit_profile.php");
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Password changed successfully")';
                                                        echo '</script>';
                                                    } catch (PDOException $e) {
                                                        die("ERROR: Could not able to execute $query. " . $e->getMessage());
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Update failed")';
                                                        echo '</script>';
                                                    }
                                                } else {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Passwords did not match")';
                                                    echo '</script>';
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
    <!--Start of Zendesk Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="https://v2.zopim.com/?5KljmAOx2sQB3OzYj22NRmpUUEuryqk0";z.t=+new Date;$.
                type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zendesk Chat Script-->

</body>

</html>
