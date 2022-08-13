<?php 
	require_once 'conn.php';
	$brand_name=$_POST['brand_name'];
	$sqlb="Insert into brand (brand_name) values ('$brand_name')";
	$query= mysqli_query($conn, $sqlb);

	$html = '<option>Select Brand</option>';

	$query = mysqli_query($conn, "select * from brand");

	while ($row = mysqli_fetch_array ($query)) {
		$html .= '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
	}

	echo $html;
?>