<?php require_once 'conn.php';
$customer_name=$_REQUEST['cus'];
$sql="select * from customer where customer_id='$customer_name'";
$query= mysqli_query($conn, $sql);
while($row= mysqli_fetch_array($query)){
    $vi['cutlet']=$row;
}
echo json_encode($vi);

?>