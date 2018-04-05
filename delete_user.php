<?php
//return proceed();
include ('../dbcon.php');
$id=$_GET['user_id'];
$query="DELETE FROM users WHERE user_id='$id'";
$pdo->query($query);
    echo'<script language="javascript">alert("user deletion successfull"); location=("view_users.php");</script>';

