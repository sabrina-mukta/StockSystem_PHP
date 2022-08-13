<?php
require_once 'conn.php';
$id=$_GET['deleteid'];
$sql="call deleteSupp($id)";
$query= mysqli_query($conn, $sql);
header("Location:manage_supplier.php");?>