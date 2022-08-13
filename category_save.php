<?php 
	require_once 'conn.php';
	$category_name=$_POST['category_name'];
	$sqlb="Insert into medicine_category (category_name) values ('$category_name')";
	$query= mysqli_query($conn, $sqlb);

	$html = '<option>Select Category</option>';

	$query = mysqli_query($conn, "select * from medicine_category");

	while ($row = mysqli_fetch_array ($query)) {
		$html .= '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
	}

	echo $html;
?>