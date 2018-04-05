<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['quote_number'];
$query="DELETE FROM quotations WHERE quote_number='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("quotation.php");</script>';
