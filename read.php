<?php
include('../dbcon.php');
$id=$_GET['message_id'];

try {
    $ins = "UPDATE messages SET status='read' WHERE message_id='$id'";
    $pdo->query($ins);
    //echo '<script language="javascript">';
    //echo 'alert("Thank you for your agreement")';
    //echo '</script>';
    header("location: view_messages.php");
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $ins. " . $e->getMessage());
}