<?php require_once 'conn.php';
$medi_name=$_REQUEST['medi'];
$id=$_REQUEST['id'];
$sql="select * from medicine where medicine_id='$medi_name'";
$query= mysqli_query($conn, $sql);
while($row= mysqli_fetch_array($query)){
    $vi['cutlet']=$row;
}
$vi['id']=$id;
echo json_encode($vi);

?>
