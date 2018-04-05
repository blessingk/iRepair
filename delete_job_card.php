<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['record_number'];
$query="DELETE FROM device_records WHERE record_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("record_device.php");</script>';
