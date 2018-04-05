<?php
//return proceed();
include('../../dbcon.php');
//deleting invoice
$id=$_GET['invoice_number'];
$query="DELETE FROM invoices WHERE invoice_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("invoices.php");</script>';

