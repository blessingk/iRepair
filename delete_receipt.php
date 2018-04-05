<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['receipt_number'];
$query="DELETE FROM receipts WHERE receipt_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("receipts.php");</script>';
