<?php
    session_start();
    require_once 'conn.php';
    require_once 'auth.php';
    
    if(isset($_POST['submit'])){
       
        $invoice_id=$_POST['invoice_id'];
        $cust_id=$_POST['cust_id'];
        $invoiceD=$_POST['invoiceD'];
        $salesT=$_POST['salesT'];
        $medi_id=$_POST['medi_id'];
        $packingU=$_POST['packingU'];
        $disP=$_POST['disP'];
        $disA=$_POST['disA'];
        $total=$_POST['total'];
        $unit_price=$_POST['unitP'];
        $subT=$_POST['subT'];
        $due=$_POST['due'];
        $paid=$_POST['paid'];
        $grand_total=$_POST['grand_total'];
        $issueQ=$_POST['Qty'];
        $BalanceQ=$_POST['balance_qty'];
        foreach($medi_id as $key=>$val){
            $medicineID=$medi_id[$key];
            $u_price=$unit_price[$key];
            $IssueQ=$issueQ[$key];
            $packingU=$packingU[$key];
            $bbalanceQ=$BalanceQ[$key];
            $Tootal=$total[$key];
            $sql2=("insert into invoice(invoice_id,customer_id,invoice_date,sales_type,medicine_id,packing_unit,Unit_price,Issue_quantity,dis_percent,dis_amount,total,sub_total,Due,Paid,Grand_total)values('$invoice_id','$cust_id','$invoiceD','$salesT',$medicineID,'$packingU','$u_price','$IssueQ','$disP','$disA','$Tootal','$subT','$due','$paid','$grand_total')");
            $query=mysqli_query($conn,$sql2);
            $sql1=("update medicine_stock set issue_qty=$IssueQ, balance_qty=$bbalanceQ where medicine_id=$medicineID");
            $query1=mysqli_query($conn,$sql1);
            if($query){
                header("location:manage_invoice.php");
            }
        }      
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://kit.fontawesome.com/90686a9797.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    <title>Pharmacy</title>
</head>

<body onload="max_id_increment()">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar start -->
        <div style="background-color:#121642" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
              <a class="navbar-brand" href="#">
                 <img src="image/pharma_logo.jpg" alt=" " class="rounded-circle ms-end" width="90" height="80">
              </a>
              <span class="ms-end text-light">Pharma</span>
            </div>
            
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="text-light list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fa-solid fa-gauge me-2 text-light"></i>Dashboard</a>
                                            
                <div>
                    <a
                        href="#medicineSubMenu"
                        class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold"
                        data-bs-toggle="collapse">
                        <i class="fa-solid fa-capsules me-1 text-light"></i> Medicine
                    </a>

                    <div class="collapse ps-2" id="medicineSubMenu">
                        <a href="add_medicine.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Add Medicine
                        </a>

                        <a href="manage_medicine.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Manage Medicine
                        </a>

                        <a href="add_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                           Purchase Medicine 
                        </a>

                        <a href="manage_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                          Manage Medicine Stock
                        </a>
                    </div>
                </div>
                        
                <div class="menu-item-wrap">
                    <a href="#invoiceSubMenu" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                        <i class="fa-solid fa-file-invoice me-2 text-light"></i> Invoice
                    </a>

                    <div class="collapse ps-3" id="invoiceSubMenu">
                        <a href="invoice_form.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            New Invoice
                        </a>

                        <a href="manage_invoice.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Manage invoice
                        </a>
                    </div>
                </div>

                <div class="menu-item-wrap">
                    <a href="#reportSubMenu" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold " data-bs-toggle="collapse">
                        <i class="fas fa-paperclip me-2 text-light"></i> Reports
                    </a>

                    <div class="collapse ps-3" id="reportSubMenu">
                        <a href="sales_report.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Sales Report
                        </a>
                    </div>
                </div>

                <div>
                    <a href="#customerSubmenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light" data-bs-toggle="collapse">
                        <i class="fa-solid fa-person-military-pointing me-2 text-light"></i>Customer
                    </a>

                    <div class="collapse ps-3" id="customerSubmenu">
                        <a href="customer_add.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                           Add Customer
                        </a>

                        <a href="customer_manage.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Manage Customer
                        </a>
                    </div>
                </div>

                <div>
                    
                     <a href="#SuplierSubmenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light" data-bs-toggle="collapse"><i
                        class="fa-solid fa-truck-field me-2 text-light"></i>Supplier</a>

                    <div class="collapse ps-3" id="SuplierSubmenu">
                        <a href="add_supplier.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Add Supplier
                        </a>

                        <a href="manage_supplier.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light">
                            Manage Supplier
                        </a>
                    </div>

                </div>
                        
                
                <a href="#" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-magnifying-glass me-2 text-light"></i>Search</a>
                
            </div>
        </div>
        <!-- sidebar-wrapper -->
        <div class="container bg-light">
                <div class="row">
                <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                           

                  <div>
                  <div class="btn-group dropstart">
                        <button class="btn btn-secondary rounded-circle" type="" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear"></i>        
                        </button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                     </div>
                 </div>
                 </li>
                 </ul>
                </div>
            </nav>
            </div>
            <!--dashboard end-->
            <!--add medicine_stock form start-->
            <div class="container">
                        <div class="col-4"></div>
                        <div class="col-8 invoiceW float-center mx-auto d-block">
                        <p class="fs-3 text-center text-light" style="background-color:#121642">Create Invoice</p>
        				<hr style="color:red;">
        <?php $p=0;?>				
		<form method='post' name="myForm" action='#'>
		    <input type="hidden" name="rowlen" id="rowlen"  value="<?php echo $p+1?>"/>
		    <input type="hidden" name="invoice_id" id="invoice_id" />
		    <!--<input type="hidden" name="iid" id="iid" />-->
				<div class='row'>
					<div class='col-md-4'>
						<h5 class='text-success'>Invoice Details</h5>
						<!--<div class='form-group'>-->
						<!--	<label>Invoice No</label>-->
						<!--	<input type='text' name='$fnl'  required class='form-control' disable>-->
						<!--</div>-->
						<div class='form-group me-5'>
						    
						    
                                    
							<label>Invoice Date</label>
							<input type='date' name='invoiceD' id='invoiceD' placeholder="Select Date" class="form-control mt-2">
							
							
							
							
						</div>
						<div class='form-group mt-1 me-5'>
							<label>Sales Type:</label>
							<select name='salesT'class="form-control">
                                    <option>Select Sales Type</option>
                                    <option>Customer</option>
                                    <option>Dealer</option>
							</select>
						</div>
					</div>
					<div class='col-md-8'>
						<h5 class='text-success'>Customer Details</h5>
						<div class='form-group'>
				<label for="cust_id" class="form-label">Customer Name:</label>
					       <select class="form-control" id="Cus_name" name="cust_id">
                                <option>Select Customer Name</option>
                                <?php
                                 $sql="select * from customer";
                                 $query=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($query)){
                                ?>  
                        <option value="<?php echo $row['customer_id']?>">
                            <?php echo $row['customer_name']?></option>
                                     <?php }?>
                          </select>

                   
						</div>
						<div class='form-group'>
							<label>Address</label>
							<input type='text' name='caddress' id="address" required class='form-control'>
						</div>
						<div class='form-group'>
							<label>Phone Number</label>
							<input type='number' name='contactN' id="phone" required class='form-control'>
						</div>
					</div>
				</div>
                <h5 class='text-success'>Medicine Details</h5>
				<div class="row invoice_item" id="add_field">
						
									<div class="col-2">
                                    <label for="medicine_name" class="form-label">Medicine Name:</label>
                                    <select class="form-control" id="medicine_name<?php echo $p+1?>" onchange="medPrice('<?php echo $p+1?>');balanceStock('<?php echo $p+1?>')" name="medi_id[]">
                                      <option>Select Medicine Name</option>
                                      <?php
                                      $sql="select * from medicine";
                                      $query=mysqli_query($conn,$sql);
                                      while($row=mysqli_fetch_array($query)){
                                      ?>  
                                      <option value="<?php echo $row['medicine_id']?>"><?php echo $row['medicine_name']?></option>
                                      <?php }?>
                                    </select>
                                    </div>
									    
									<div class="col-2 ">
									    <label for="uprice"  class="form-label">Price</label>
									    <input type="text"  id="uprice<?php echo $p+1?>" class="form-control"  name="unitP[]" readonly="readonly">
									 </div>
									<div class="col-2">
									    <label for="balanceQ" class="form-label">Stock</label>
									    <input type="number" id="balanceQ<?php echo $p+1?>"  class="form-control" name="balance_qty[]" onkeyup="mycal(<?php echo $p+1?>)" >
									  </div>
									<div  class="col-1">
									    <label for="Qty" class="form-label">Qty</label>
									    <input type="text" class="form-control qty" id="Qty<?php echo $p+1?>"  name="Qty[]" onkeyup="mycal('<?php echo $p+1?>')">
									 </div>
									<div class="col-1">
									    <label for="packingU" class="form-label">Unit</label>
									    <select name="packingU[]" id="packingU" class="form-control"><option value="Box">Box</option><option value="Piece">Piece</option></select>
									  </div>
									<div class="col-2">
									    <label for="total" class="form-label">Total</label>
									    <input type="text"  class="form-control totCount" id="total<?php echo $p+1?>" name="total[]" onkeyup="mycal('<?php echo $p+1?>')" value="" readonly="readonly" >
									 </div>
									<div class="col-1">
                                    <label for="add2" class="form-label">Action</label>
                                    <button type="button" name="add" id="add2" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                    </div>
                </div>
							<script type="text/javascript">
                    $(document).ready(function () {
                   
                var i = 1;
                $('#add2').click(function () {
                    
                    i++;
                    var r=1;
                    var rowlen=parseInt($('#rowlen').val());
                     r+=rowlen;
                    var result='<div class="form-row invoice_item"  id="row2' + i + '"><div class="row mt-2 mb-2 me-end" id="abc">'
                    result+='<div class="col-2"><select class="form-control" id="medicine_name'+r+'" name="medi_id[]" onchange="medPrice('+r+');balanceStock('+r+')"><option>Select Medicine Name</option> <?php  $sql="select * from medicine";$query=mysqli_query($conn,$sql); while($row=mysqli_fetch_array($query)){ ?><option value="<?php echo $row['medicine_id']?>"><?php echo $row['medicine_name']?></option><?php }?></select></div>'
                    result+='<div class="col-2"><input type="text"  id="uprice'+r+'" class="form-control"  name="unitP[]" readonly="readonly"></div>'
                    result+='<div class="col-2"><input type="number" id="balanceQ'+r+'"  class="form-control" name="balance_qty[]" onkeyup="mycal('+r+')"></div>'
                    result+='<div  class="col-1"><input type="text" class="form-control qty" id="Qty'+r+'"  name="Qty[]" onkeyup="mycal('+r+')"></div>'
                    result+='<div class="col-1"><select name="packingU[]" class="form-control"><option value="Box">Box</option><option value="Piece">Piece</option></select></div>'
                    result+='<div class="col-2"><input type="text"  class="form-control totCount" id="total'+r+'" name="total[]" onkeyup="mycal('+r+')" value="" readonly="readonly" ></div>'
                    result+='<div class="col-2"> <button type="button" name="add" class="btn btn-danger btn_remove2" id="' + i + '"><i class="fa fa fa-trash"></i></button></td> </div></div>';
                    $('#add_field').after(result);
                    $('#rowlen').val(r);
                    r++;
                });
                
                $(document).on('click', '.btn_remove2', function () {
                    var button_id = $(this).attr("id");
                    $('#row2' + button_id + '').remove();
                });
            });
                </script>
							
							<div class="row mb-3 mt-3">
                                <div class="col-2 "></div>
                                    <div class='text-left fw-bold col-2'>Sub Total<input type='text' name='subT' id="subT" onkeyup="mycal()" class='form-control' required></div>
                                    <div class="col-2 p-0 text-left fw-bold">Discount</label><input type="number"  class="form-control"  name="disP" id="disP" onkeyup="mycal()"></div>
									<input type="hidden" class="form-control" id="disA" name="disA" value="" readonly="readonly">
									<div class='text-left fw-bold col-2'>Paid<input type='text' name='paid' id="paid" onkeyup="mycal()" class='form-control' required></div>
									<div class='text-left fw-bold col-2'>Due<input type='text' name='due' id="due" class='form-control' required redonly="readonly"></div>
									<div class='text-left fw-bold col-2'>Grand Total<input type='text' name='grand_total' id="grand_total" class='form-control' required redonly="readonly"></div>
                            </div>

						<input type='submit' name='submit' value='Save Invoice' class='btn btn-success float-end'>
						<button class="btn btn-success"><a href="manage_invoice.php" class="text-light">Show Invoice</a></button>
				</div>
			</form>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    
    <script type="text/javascript">
    
    function medPrice(id){
        var medicine=$('#medicine_name'+id).val();
        // alert(medicine);
        $.ajax({
        url:'request.php',
        method:'POST',
        dataType:'html',
        data:{medi:medicine,id:id},
        success:function(data){
            var dat=$.parseJSON(data);
         var get_uprice=dat.cutlet.unit_price;
         
        //  alert(id);
        //  var get_taxA=dat.cutlet.taxA;
           $('#uprice'+id).val(get_uprice);
        //   $('#taxA').val(get_taxA);
        }
    })
    }
    function balanceStock(id){
        var medicine=$('#medicine_name'+id).val();
        // alert(medicine);
        $.ajax({
        url:'balance_stock_data.php',
        method:'POST',
        dataType:'html',
        data:{medi:medicine,id:id},
        success:function(data){
            var dat=$.parseJSON(data);
         var bqty=dat.cutlet.balance_qty;
         
         
        //  alert(id);
        //  var get_taxA=dat.cutlet.taxA;
           $('#balanceQ'+id).val(bqty);
        //   $('#taxA').val(get_taxA);
        }
    })
    }
    
  $(document).ready(function(){
        $('#medicine_name').on('change',function(){
        var value=$(this).val();
       // alert(med_name);
        $.ajax({
        url:'request.php',
        method:'POST',
        dataType:'html',
        data:{medi:value},
        success:function(data){
            var dat=$.parseJSON(data);
         var get_uprice=dat.cutlet.unit_price;
        //  var get_taxA=dat.cutlet.taxA;
           $('#uprice'+r).val(get_uprice);
        //   $('#taxA').val(get_taxA);
        }
    })
        })
    })
    
    
      $(document).ready(function(){
        $('#medicine_name').on('change',function(){
        var value=$(this).val();
       // alert(med_name);
        $.ajax({
        url:'request3.php',
        method:'POST',
        dataType:'html',
        data:{medi:value},
        success:function(data){
            var dat=$.parseJSON(data);
         var get_balance_qty=dat.cutlet.balance_qty;
        //  var get_taxA=dat.cutlet.taxA;
           $('#balanceQ').val(get_balance_qty);
        //   $('#taxA').val(get_taxA);
        }
    })
        })
    })
    
   </script>
   
   
   
    <script type="text/javascript">
  $(document).ready(function(){
        $('#Cus_name').on('change',function(){
        var value=$(this).val();
       // alert(Cus_name);
        $.ajax({
        url:'request2.php',
        method:'POST',
        dataType:'html',
        data:{cus:value},
        success:function(data){
            var dat=$.parseJSON(data);
         var get_address=dat.cutlet.address;
         var get_phone=dat.cutlet.phone;
           $('#address').val(get_address);
          $('#phone').val(get_phone);
        }
    })
        })
    })
    
    
   </script>

			
			
			
 <!--add medicine_stock form end-->
                        </div>
                </div>
            </div>
        </div>

       
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
   
        function mycal(id){
            var due=0;
           var grnd_total=0;
        var unit_price=$('#uprice'+id).val();
        var bqty1=$('#balanceQ'+id).val();
        
        var qty=$('#Qty'+id).val();
        
        var bqty=(bqty1-qty);
        // alert(bqty);
            $('#balanceQ'+id).val(bqty);
        var disP=$('#disP').val();
        var Total=(unit_price*qty)
            $('#total'+id).val(Total);
            var allTotal=0;
            $('.totCount').each(function(){
                var get_value=$(this).val();
                if($.isNumeric(get_value)){
                    allTotal += parseInt(get_value);
                }
            });
            $('#subT').val(allTotal);
            var subTotal=$('#subT').val();
        var dis=((subTotal*disP)/100);
        // alert(dis);
            $('#disA').val(dis);
        var paid=$('#paid').val();
          var grnd_total=(subTotal-dis);
            $('#grand_total').val(grnd_total);
            if(grnd_total==paid){
              var due=0;
          }else{
            var due=(grnd_total-paid);
            $('#due').val(due);
          }
          $('#due').val(due);
       };
       
      
      
    </script>
</body>

</html>
<script>
    function max_id_increment(){
          $.ajax({
              url:'max_id.php',
              method:'POST',
              dataType:'html',
              data:{},
              success:function(data){
                  var dat=$.parseJSON(data);
                  var invoice_id=dat.res;
                //   alert(invoice_id);
                  $('#invoice_id').val(invoice_id);
                   
              }
          });
      }
</script>






