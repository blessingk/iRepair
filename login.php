<?php
include("session.php");
include("dbcon.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    //$mail = $_POST['email'];
    $password = $_POST['password'];
    
    // $pass = md5($password);
    //Query
    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password' and role='Client'";
    //$result = mysql_query($sql);
    //$row = mysql_fetch_assoc($result);
    $result = $pdo->query($sql);

    // Mysql_num_row is counting table row
    // Mysql_num_row is counting table row
    //$count = mysql_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($result->rowCount() == 1){
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        //header("location:client");
        echo '<script language="javascript">';
        echo 'alert("Login success")';
        echo '</script>';
        header("location: client");
        session_start();
        $_SESSION['username']= $username;

        //$_SESSION["username"]= $count['first_name'];


    } else {
        echo '<script language="javascript">';
        echo 'alert("Wrong Password and Username")';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><meta name="description" content="Keltech Repairs created by Blessing Kabungaidze">
    <meta name="keywords" content="Keltech Repairs, keltechrepairs.co.za, keltech repairs captown South Africa, repairs for mobile devices">
    <title>Keltech Repairs</title>
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="scripts/toast/jquery.toast.min.css">
</head>

<body>
<div class="topbar">
    <div class="container">
        <div class="inner">
            <div class="left">
                <ul class="info">
                    <li><a href="mailto:info@keltechrepairs.co.za"><i class="ion-ios-email-outline"></i>info@keltechrepairs.co.za</a></li>
                </ul>
            </div>
            <div class="right">
                <p> <i class="fa fa-phone"></i>(+27) 21 824 6261 (+27) 21 461 4833 073 900 6566 </p>
            </div>
        </div>
    </div>
</div>
<p></p>
<header class="primary">
    <div class="container">
        <div class="brand">
            <a href="index.html">
                <div class="text">
                    <img src="images/kellogo.jpg" class="img-rounded" style="width: 100%">
                </div>
            </a>
            <h2>

            </h2>
        </div>
        <div class="right social trp">
        </div>
    </div>
</header>
<nav class="menu">
    <div class="container">
        <ul>
            <li><a href="index.html">Keltech Repairs <div class="badge"></div></a></li>
            <li><a href="featured.html">Featured Products <div class="badge"></div></a></li>
            <!--<li><a href="#">Pricing</a></li>-->
            <li class="magz-dropdown"><a href="#">Repair Categories<i class="ion-ios-arrow-right"></i></a>
                <ul>
                    <li><a href="apple.html">Apple</a></li>
                    <li><a href="samsung.html">Samsung</a></li>
                    <li><a href="console.html">Consoles</a></li>
                    <li><a href="other.html">Other</a></li>
                </ul>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <ul  class="navbar-right">
            <li class="magz-dropdown"><a href="#">Account<i class="ion-ios-arrow-right"></i></a>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signUp.php">Sign Up</a></li>
                </ul>
        </ul>
    </div>
</nav>
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="line">
                    <div>Login</div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <div class="page-description">
                            Login into your account to see the progress of your device.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <div class="thumbnail ">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address or Username</label>
                                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter your username">
                                    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required >
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="thumbnail">
                            <p>If you have a account Please login into the system. If you are a first time visitor please click the Sign Up button
                            to create an account. The account will be created as soon as possible without any delay.</p><br>
                            <a href="signUp.php" class="btn btn-primary">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">About Keltech Repairs</h1>
                    <div class="block-body">
                        <!--<figure class="foot-logo">
                            <img src="images/rivs.png" class="img-responsive">
                        </figure>-->
                        <p class="brand-description">
                            For all your ugrades and repairs.
                        </p>
                        <a href="index.html" class="btn btn-primary btn-magz white">About Keltech <i class="ion-ios-arrow-thin-right"></i></a>
                    </div>
                    <di></di>
                    <br>
                    <div class="block">
                        <h1 class="block-title">Important Links</h1>
                        <div class="block-body no-margin"><br>
                            <ul class="footer-nav-horizontal">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Contact Us <div class="right"></div></h1>
                    <div class="block-body">
                        <p>Tel: <span class="ion-android-call">   (+27) 21 824 6261</span><br>
                        Tel: <span class="ion-android-call">   (+27) 21 461 4833</span><br>
                        Cell: <span class="ion-android-call">   073 900 6566</span><br>
                        Email: <span class="ion-android-mail">  <a href="mailto:info@keltechrepair.co.za"></i>info@keltechrepairs.co.za</a></span><br>
                        <h1 class="block-title">Location <div class="right"></div></h1>
                        <div class="block-body">
                        2 Roeland Street,<br>
                        Ruskin House,<br>
                        Cape Town,<br>
                        South Africa<br>
                        8000</p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Enquire</h1>
                    <div class="block-body">
                        <p>Send us an enquiry email and we will assist you.</p>
                        <form class="newsletter">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                                <input type="email" class="form-control email" placeholder="Your mail">
                            </div>
                            <button class="btn btn-primary btn-block white">Enquire</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
                <div class="block">
                    <h1 class="block-title">Follow Us</h1>
                    <div class="block-body">
                        <p>Follow and like us on facebook and twitter</p>
                        <ul class="social trp">
                            <li>
                                <a href="www.facebook.com/keltechrepair" class="facebook">
                                    <svg><rect/></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg><rect/></svg>
                                    <i class="ion-social-twitter-outline"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                Copyright &copy; Keltech Repairs 2017. All Right Reserved.
                <div>
                    Created with <i class="ion-heart"></i> by KB @ Web Technologies www.webtech.com +263779730468
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<script src="js/jquery.js"></script>
<script src="js/jquery.migrate.js"></script>
<script src="scripts/bootstrap/bootstrap.min.js"></script>
<script src="js/e-magz.js"></script>
<script src="scripts/toast/jquery.toast.min.js"></script>
<script src="scripts/touchswipe/jquery.touchSwipe.min.js"></script>
<script src="scripts/jquery-number/jquery.number.min.js"></script>
</body>
</html>