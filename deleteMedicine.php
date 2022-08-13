<?php
require_once 'conn.php';
$id =$_REQUEST['mid'];
$sql="Delete from medicine where medicine_id=$id";
$query = mysqli_query($conn, $sql);
header("Location:manage_medicine.php");?>