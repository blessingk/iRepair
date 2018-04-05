<?php
include("../dbcon.php");
try{
if(isset($_REQUEST['term'])){
// create prepared statement
$sql = "SELECT * FROM quotations WHERE name LIKE :term";
$stmt = $pdo->prepare($sql);
$term = $_REQUEST['term'] . '%';
// bind parameters to statement
$stmt->bindParam(':term', $term);
// execute the prepared statement
$stmt->execute();
if($stmt->rowCount() > 0){
while($row = $stmt->fetch()){
echo "<p>" . $row['client_name'] . "</p>";
}
} else{
echo "<p>No matches found</p>";
}
}
} catch(PDOException $e){
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
// Close statement
unset($stmt);
// Close connection
unset($pdo);
