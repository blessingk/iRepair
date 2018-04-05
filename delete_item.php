<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['stock_number'];
$query="DELETE FROM stocks WHERE stock_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("purchases.php");</script>';
