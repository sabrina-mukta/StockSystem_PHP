<?php
require_once 'conn.php';
$id1=$_GET['did'];
$sql="delete from invoice where invoice_id=$id1";
$query=mysqli_query($conn,$sql);
if($query){
    header("location:manage_invoice.php"); 
}
?>