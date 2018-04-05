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
                                        Admin users
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#technician">
                                        <i class="icon-envelope"></i>
                                        Technicians
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#client">
                                        <i class="icon-envelope"></i>
                                        Clients
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="admin_user" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Administrators </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Name</th>
                                                    <th><i class="icon_profile"></i> Username</th>
                                                    <th><i class="icon_mail"></i>Email</th>
                                                    <th><i class="icon_mobile"></i> Contact</th>
                                                    <th><i class=""></i>Address</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM users WHERE role = 'admin' ORDER BY user_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['user_id'];
                                                    $name=$row['first_name'];
                                                    $surname=$row['last_name'];

                                                    ?>
                                                    <td><?php echo $name. " ".$surname; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="delete_user.php?user_id=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete user?")'><i class="icon_check_alt2"></i>Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No users were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="technician" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Technicians </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Name</th>
                                                    <th><i class="icon_profile"></i> Username</th>
                                                    <th><i class="icon_mail"></i>Email</th>
                                                    <th><i class="icon_mobile"></i> Contact</th>
                                                    <th><i class=""></i>Address</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM users WHERE role = 'tech' ORDER BY user_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['user_id'];
                                                    $name=$row['first_name'];
                                                    $surname=$row['last_name'];

                                                    ?>
                                                    <td><?php echo $name. " ".$surname; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="delete_user.php?user_id=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete user?")'><i class="icon_check_alt2"></i>Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No users were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                <div id="client" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Clients </h1>
                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Name</th>
                                                    <th><i class="icon_profile"></i> Username</th>
                                                    <th><i class="icon_mail"></i>Email</th>
                                                    <th><i class="icon_mobile"></i> Contact</th>
                                                    <th><i class=""></i>Address</th>
                                                    <th><i class="icon_cogs"></i>Action</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM users WHERE role = 'Client' ORDER BY user_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['user_id'];
                                                    $name=$row['first_name'];
                                                    $surname=$row['last_name'];

                                                    ?>
                                                    <td><?php echo $name. " ".$surname; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td>0<?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><div class="btn-group">
                                                            <a class="btn btn-primary" href="delete_user.php?user_id=<?php echo $id; ?>" onclick='return confirm("Are you sure you want to delete user?")'><i class="icon_check_alt2"></i>Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No users were found")';
                                                    echo '</script>';

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


</body>

</html>
