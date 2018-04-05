<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keltech Repairs">
    <meta name="author" content="Keltech Repairs">
    <meta name="keyword" content="keltech repairs">
    <link rel="shortcut icon" href="keltechlogo.png">

    <title>Keltech Repairs</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="../js/lte-ie7.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="index.php" class="logo"><img src="../img/keltechlogo.png" class="img-rounded" style="width: 10%"> <span class="lite">Keltech Repairs</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start --
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- task notificatoin start -->
            <!-- alert notification end-->
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <i class="icon_profile"></i>
                            </span>
                    <span class="username"><?php echo $FirstName." ". $LastName; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="admin_profile.php"><i class="icon_profile"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="view_messages.php?user_id=<?php echo $id; ?>"><i class="icon_mail_alt"></i> My Messages</a>
                    </li>
                    <li>
                        <!--<a href="#"><i class="icon_clock_alt"></i> Timeline</a>-->
                    </li>
                    <li>
                        <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                    <li>
                        <!-- <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                       </li>
                       <li>
                         <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>-->
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="index.php">
                    <i class="icon_house_alt"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_laptop"></i>
                    <span>Devices</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="record_device.php">Record Devices</a></li>
                    <li><a class="" href="device_progress.php">Devices Progress</a></li>
                    <li><a class="" href="over_dues.php">Over Dues</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_book_alt"></i>
                    <span>Accounts</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="quotation.php">Create Quotations</a></li>
                    <li><a class="" href="invoices.php">Create Invoices</a></li>
                    <li><a class="" href="receipts.php">Create Receipts</a></li>
                    <li><a class="" href="purchases.php">Purchases</a></li>
                    <li><a class="" href="sales.php">Sales</a></li>
                    <li><a class="" href="inventory.php">Inventories</a></li>
                    <li><a class="" href="view_expenses.php">Expenses</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_datareport"></i>
                    <span>Reports</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="qoutation_report.php">Quotation Reports</a></li>
                    <li><a class="" href="invoice_report.php">Invoice Reports</a></li>
                    <li><a class="" href="receipt_report.php">Receipt Reports</a></li>
                    <li><a class="" href="profit_and_loss.php">Profit and Loss</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_book_alt"></i>
                    <span>User accounts</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="create_user.php">Create users</a></li>
                    <li><a class="" href="view_users.php">View Users</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_profile"></i>
                    <span>My Account</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="admin_profile.php">My Profile</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>