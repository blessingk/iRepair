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
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>

</head>

<body>
<div class="topbar">
    <div class="container">
        <div class="inner">
            <div class="left">
                <ul class="info">
                    <li><a href="mailto:info@keltechrepair.co.za"><i class="ion-ios-email-outline"></i>info@keltechrepairs.co.za</a></li>
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
            <li class="magz-dropdown"><a href="#">Services<i class="ion-ios-arrow-right"></i></a>
                <ul class="col-sm-2">
                    <li><a href="repair_services.html">Repair Services</a></li>
                    <li><a href="product_related.html">Product Related Services</a></li>
                </ul>
            </li>
            <li><a href="featured.html">Featured Products<div class="badge"></div></a></li>
            <li><a href="how_we_repair.html">How We Repair<div class="badge"></div></a></li>
            <li class="magz-dropdown"><a href="#">Apple Products<i class="ion-ios-arrow-right"></i></a>
                <ul class="col-sm-2">
                    <li><a href="iphone.html">iPhone</a></li>
                    <li><a href="macbook.html">MacBook</a></li>
                    <li><a href="imac.html">iMac</a></li>
                    <li><a href="ipad.html">iPad</a></li>
                </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <ul  class="navbar-right">
            <li><a href="enquiry.php">Book Device</a></li>
            <li><a href="signUp.php">Create Account</a></li>
            <li><a href="system"> <i class="ion-ios-contact"></i>Login</a></li>

        </ul>
    </div>
</nav>
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="line">
                    <div><h3>Contact US</h3></div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="page-description">
                            Send a message and we will get back to you soon! You can also use the contact details below
                            or just click our email to send us a message.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <div class="thumbnail ">
                           <h3>Enter Contact Information</h3>
                            <form name="frmContact" method="post" action="">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="name" name="name" required placeholder="Enter your Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="content" required placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="contact" class="btn btn-success">Send</button>
                                </div
                            </form>
                            <?php
                            include('dbcon.php');
                            if(isset($_POST["contact"])) {
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                               // $subject = $_POST["subject"];
                                $content = $_POST['content'];

                                $toEmail = "info@keltechrepairs.co.za";
                                $mailHeaders = "From: " . $_POST["name"] . "<". $email .">\r\n";
                                if(mail($toEmail, $content, $mailHeaders)) {
                                 $message = "Your contact information is received";
                                 echo $message;
                                }
                                try{
                                $sql = "INSERT INTO contact (name, email, content, `date`) VALUES ('$name', '$email', '$content', CURRENT_DATE)";
                                $pdo->exec($sql);
                                echo '<script language="javascript">';
                                echo 'alert("Contact information send successfully")';
                                echo '</script>';
                            }
                                catch(PDOException $e){
                                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                }
                                //header("location: signUp.php");
                            }
                            
                            ?>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 ">
                            <div class="thumbnail">
                                <h3>Contact Information</h3>
                                <div class="block-body">
                                    <p>Tel: <span class="ion-android-call">   (+27) 21 824 6261</span><br>
                                        Tel: <span class="ion-android-call">   (+27) 21 461 4833</span><br>
                                        Cell: <span class="ion-android-call">   073 900 6566</span><br>
                                        Email: <span class="ion-android-mail"></span>  <a class="href" href="mailto:info@keltechrepair.co.za">info@keltechrepairs.co.za</a><br></p>
                                    <h3>Location</h3>
                                        <p>2 Roeland Street,<br>
                                        Ruskin House,<br>
                                        Cape Town,<br>
                                        South Africa<br>
                                        8001</p>
                            </div>
                        </div>
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
                        <img src="images/keltechlogo.png" class="img-rounded" style=" background:gainsboro; width: 30%">
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
                          <p>  2 Roeland Street,<br>
                            Ruskin House,<br>
                            Cape Town,<br>
                            South Africa<br>
                            8001</p>
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
                        <p>Follow and like us on facebook and twitter. Please refer your friends to us.</p>
                        <ul class="social trp">
                            <li>
                                <a href="https://www.facebook.com/keltechrepair" class="facebook">
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
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>


