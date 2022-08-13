
<?php
 require_once 'conn.php'; 
 ?>

 
 
 
 <?php
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query ="
	select medicine.medicine_name,brand.brand_name,medicine_category.category_name,supplier.supplier_name,
	medicine_stock.purchase_price,medicine_stock.packing_unit,medicine_stock.manufacture_Date,
	medicine_stock.expire_date,medicine_stock.purchase_qty,medicine_stock.issue_qty,
	medicine_stock.balance_qty,medicine_stock.stock_in_date
	 from medicine_stock left join medicine 
	on medicine_stock.medicine_id=medicine.medicine_id left join brand on 
	medicine_stock.brand_id=brand.brand_id left join medicine_category on 
	medicine_stock.category_id=medicine_category.category_id left join supplier on
	medicine_stock.supplier_id=supplier.supplier_id
     
	WHERE medicine.medicine_name  LIKE '%".$search."%' 


	
	";
}
else
{
	$query = "
		select medicine.medicine_name,brand.brand_name,medicine_category.category_name,supplier.supplier_name,
	medicine_stock.purchase_price,medicine_stock.packing_unit,medicine_stock.manufacture_Date,
	medicine_stock.expire_date,medicine_stock.purchase_qty,medicine_stock.issue_qty,
	medicine_stock.balance_qty,medicine_stock.stock_in_date
	 from medicine_stock left join medicine 
	on medicine_stock.medicine_id=medicine.medicine_id left join brand on 
	medicine_stock.brand_id=brand.brand_id left join medicine_category on 
	medicine_stock.category_id=medicine_category.category_id left join supplier on
	medicine_stock.supplier_id=supplier.supplier_id  ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive" >
					<table  class="table table bordered">
					
						<tr>
						
      <th scope="col">Medicine Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Supplier</th>
      <th scope="col">Purchase Price</th>
      <th scope="col">Packing Unit</th>
      <th scope="col">Menufacture Date</th>
      <th scope="col">Expire Date</th>
      <th scope="col">Purchase Quantity</th>
      <th scope="col">Issue Quantity</th>
      <th scope="col">Balance Quantity</th>
      <th scope="col">Stock In Data</th> 
						
						</tr>';
					
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			
			
            <td>'.$row['medicine_name'].'</td>
              <td>'.$row['brand_name'].'</td>
            <td>'.$row['category_name'].'</td>
            <td>'.$row['supplier_name'].'</td>
            <td>'.$row['purchase_price'].'</td>
            <td>'.$row['packing_unit'].'</td>
            <td>'.$row['manufacture_Date'].'</td>
            <td>'.$row['expire_date'].'</td>
            <td>'.$row['purchase_qty'].'</td>
            <td>'.$issueQ=$row['issue_qty'].'</td>
            <td>'.$row['balance_qty'].'</td>
            <td>'.$row['stock_in_date'].'</td>
				
			</tr>

	
	
		';
		
		
	}
	
	echo $output;
}
else
{
	echo 'Data Not Found';
}


?>

