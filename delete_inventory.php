<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['inventory_number'];
$query="DELETE FROM inventory WHERE inventory_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("inventory.php");</script>';
