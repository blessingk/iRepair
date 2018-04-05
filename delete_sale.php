<?php
//return proceed();
include('../../dbcon.php');
$id=$_GET['sale_id'];
$query="DELETE FROM sales WHERE sale_id='$id'";
$pdo->query($query);
echo'<script language="javascript">alert("Deletion successful"); location=("sales.php");</script>';
