<?php
require_once 'conn.php';
$medicine_id=$_REQUEST['medicineN'];
$sql="select * from medicine_stock where med_id=$medicine_id";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
$data['banna']=$row;
echo json_encode($data);
?>