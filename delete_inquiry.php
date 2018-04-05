<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['enquiry_number'];
$query="DELETE FROM enquiry WHERE enquiry_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("record_device.php");</script>';
