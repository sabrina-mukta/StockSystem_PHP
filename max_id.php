<?php
require_once 'conn.php';

$sql="select max(invoice_id) as invoice_id from invoice LIMIT 1";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
$data=array();
$data['res']=$row[0]+1;
echo json_encode($data);
?>