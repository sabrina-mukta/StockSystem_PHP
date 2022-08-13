<?php require_once 'conn.php';
$medi_name=$_REQUEST['medi'];
$sql="select * from medicine_stock where medicine_id='$medi_name'";
$query= mysqli_query($conn, $sql);
while($row= mysqli_fetch_array($query)){
    $vi['cutlet']=$row;
}
echo json_encode($vi);

?>
