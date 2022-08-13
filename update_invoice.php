<?php 
    session_start();
require_once 'conn.php';
require_once 'auth.php';
  require_once 'conn.php';
  $id=$_GET['uid'];
  $sql="select * from invoice where invoice_id=$id";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $customerN1=$row['customer_name'];
  $contactN1=$row['contact_number'];
  $invoiceD1=$row['invoice_date'];
  $salesT1=$row['sales_type'];
  $medicineN1=$row['medicine_name'];
  $Qty1=$row['qty'];
  $unitP1=$row['unit_price'];
  $packingU1=$row['packing_unit'];
  $taxP1=$row['tax_percent'];
  $taxA1=$row['tax_amount'];
  $subT1=$row['sub_total'];
  $due1=$row['Due'];
  $paid1=$row['Paid'];
  $grandT1=$row['Grand_total'];
  if(isset($_POST['submit'])){
      $customerN=$_POST['customerN'];
      $contactN=$_POST['contactN'];
      $invoiceD=$_POST['invoiceD'];
      $salesT=$_POST['salesT'];
      $medicineN=$_POST['medicineN'];
      $Qty=$_POST['Qty'];
      $unitP=$_POST['unitP'];
      $packingU=$_POST['packingU'];
      $taxP=$_POST['taxP'];
      $taxA=$_POST['taxA'];
      $subT=$_POST['subT'];
      $due=$_POST['due'];
      $paid=$_POST['paid'];
       $grand_total=$_POST['grand_total'];
       $sql="update invoice set customer_name= '$customerN',contact_number=$contactN,invoice_date='$invoiceD',sales_type='$salesT',medicine_name	='$medicineN',qty= $Qty,unit_price= $unitP,packing_unit='$packingU',tax_percent=$taxP,tax_amount=$taxA,sub_total=$subT,Due=$due,Paid=$paid,Grand_total=$grand_total where invoice_id=$id";
      $query=mysqli_query($conn,$sql);
       if($query){
       header("location:manage_invoice.php");
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

<body>
  <div class="d-flex" id="wrapper">
      <!-- Sidebar start -->
      <div class="bg-white" id="sidebar-wrapper">
          <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
          <a class="navbar-brand" href="#">
                    <img src="image/pharma_logo.jpg" alt=" " class="rounded-circle ms-end" width="90" height="80">
                </a>
                <span class="ms-end">Pharma</span></div>
          
          <div class="list-group list-group-flush my-3">
              <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                      class="fa-solid fa-gauge me-2"></i>Dashboard</a>
                                          
              <div>
                  <a
                      href="#medicineSubMenu"
                      class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                      data-bs-toggle="collapse">
                      <i class="fa-solid fa-capsules me-1"></i> Medicine
                  </a>

                  <div class="collapse ps-2" id="medicineSubMenu">
                      <a href="add_medicine.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Add Medicine
                      </a>

                      <a href="manage_medicine.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Manage Medicine
                      </a>

                      <a href="add_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Purchase Medicine 
                      </a>

                      <a href="manage_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        Manage Medicine Stock
                      </a>
                  </div>
              </div>
                      
              <div class="menu-item-wrap">
                  <a href="#invoiceSubMenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                      <i class="fa-solid fa-file-invoice me-2"></i> Invoice
                  </a>

                  <div class="collapse ps-3" id="invoiceSubMenu">
                      <a href="invoice_form.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          New Invoice
                      </a>

                      <a href="manage_invoice.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Manage invoice
                      </a>
                  </div>
              </div>

              <div class="menu-item-wrap">
                  <a href="#reportSubMenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                      <i class="fas fa-paperclip me-2"></i> Reports
                  </a>

                  <div class="collapse ps-3" id="reportSubMenu">
                       <a href="purchase_report.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Purchase Report
                        </a>
                      <a href="sales_report.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Sales Report
                      </a>
                      <a href="fatch_PReport.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Product Wise Report
                        </a>
                  </div>
              </div>

              <div>
                  <a href="#customerSubmenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                      <i class="fa-solid fa-person-military-pointing me-2"></i>Customer
                  </a>

                  <div class="collapse ps-3" id="customerSubmenu">
                      <a href="customer_add.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                         Add Customer
                      </a>

                      <a href="customer_manage.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Manage Customer
                      </a>
                  </div>
              </div>

              <div>
                  
                   <a href="#SuplierSubmenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse"><i
                      class="fa-solid fa-truck-field me-2"></i>Supplier</a>

                  <div class="collapse ps-3" id="SuplierSubmenu">
                      <a href="add_supplier.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Add Supplier
                      </a>

                      <a href="manage_supplier.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Manage Supplier
                      </a>
                  </div>

              </div>
                      
              
              <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                      class="fa-solid fa-magnifying-glass me-2"></i>Search</a>
              
          </div>
      </div>
      <!-- sidebar-wrapper -->
      <div class="container">
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
                      <p class="fs-3 text-center bg-success text-light">Edit Invoice</p>
                      <hr style="color:red;">
      <form method='post' name="myForm" action='#'>
              <div class='row'>
                  <div class='col-md-4'>
                      <h5 class='text-success'>Invoice Details</h5>
                     
                      <div class='form-group'>
                          
                          
                                  
                          <label>Invoice Date</label>
                          <input type='date' name='invoiceD' id='invoiceD' placeholder="Select Date" class="form-control" value="<?php echo $invoiceD1; ?>">
                          
                          
                          
                          
                      </div>
                      <div class='form-group mt-3'>
                          <label>Sales Type:</label>
                          <select name='salesT' class="form-control"  value="<?php echo $salesT1; ?>">
                                  <option>Select Sales Type</option>
                                  <option>Customer</option>
                                  <option>Dillar</option>
                          </select>
                      </div>
                  </div>
                  <div class='col-md-8'>
                      <h5 class='text-success'>Customer Details</h5>
                      <div class='form-group'>
                          <label>Name</label>
                          <select name='customerN' class="form-control"  value="<?php echo $customerN1; ?>">
                                    <option>Select Customer Name</option>
                                    <?php 
                                    $sql="select * from customer"; 
                                    $query=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($query)){
                                    ?>  
                                    <option value="<?php echo $row['customer_name']?>"><?php echo $row['customer_name']?></option>
                                    <?php }?>

                                  </select>
                      </div>
                      <div class='form-group'>
                          <label>Address</label>
                          <input type='text' name='caddress' required class='form-control' >
                      </div>
                      <div class='form-group'>
                          <label>Contact Number</label>
                          <input type='number' name='contactN' required class='form-control' value="<?php echo $contact1; ?>">
                      </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-12'>
                      <h5 class='text-success'>Medicine Details</h5>
                      <table class='table table-bordered'>
                          <thead>
                              <tr>
                                  <th>Medicine</th>
                                  <th>Unit Price</th>
                                  <th>Qty</th>
                                  <th>Packing Unit</th>
                                  <th>Tax Percent</th>
                                  <th>Tax Amount</th>
                                  <th>Sub Total</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody >
                              <tr>
                                  <td>
                                  <select name='medicineN' class="form-control" >
                                    <option>Please Select Medicine</option>
                                    <?php 
                                    $sql="select * from medicine"; 
                                    $query=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($query)){
                                    ?>  
                                    <option value="<?php echo $row['medicine_name']?>"><?php echo $row['medicine_name']?></option>
                                    
                                    <?php }?>

                                  </select>

                                  </td>
                                  <td><input type='text'  class='form-control' name="unitP" value="<?php echo $unitP1; ?>" onkeyup="mycal()"></td>
                                  <td><input type='text' class='form-control'  name="Qty" value="<?php echo $Qty1; ?> " onkeyup="mycal()"></td>
                                  <td><input type='text'  class='form-control'  name="packingU" value="<?php echo $packingU1; ?>"  onkeyup="mycal()"></td>
                                  <td><input type='text'  class='form-control'  name="taxP" name="taxP" value="<?php echo $taxP1; ?>"  onkeyup="mycal()"></td>
                                  <td><input type='text'  class='form-control' id="taxA" name="taxA" value="<?php echo $taxA1; ?>" readonly="readonly"></td>
                                  <td><input type='text'  class='form-control' id="subT" name="subT" value="<?php echo $subT1; ?> " readonly="readonly" ></td>
                                  <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td>
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                              <td colspan='3'></td>
                                  <td><input type='button' class='btn btn-primary btn-sm' value="Add" ></td>
                                  <td colspan='' class='text-left fw-bold'>Paid<input type='text' name='paid' value="<?php echo $paid1; ?> " onkeyup="mycal()" class='form-control' required></td>
                                  <td colspan='' class='text-left fw-bold'>Due<input type='text' name='due' value="<?php echo $paid1; ?> " id="due" class='form-control' required redonly="readonly"></td>
                                  <td colspan='2' class='text-left fw-bold'>Grand Total<input type='text' name='grand_total' value="<?php echo $grandT1; ?> " id="grand_total" class='form-control' required redonly="readonly"></td>
                              </tr>
                          </tfoot>
                      </table>
                      <input type='submit' name='submit' value='Save Invoice' class='btn btn-success float-end'>
                      <button class="btn btn-success"><a href="manage_invoice.php" class="text-light">Show Invoice</a></button>
                  </div>
              </div>
          </form>
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

      function mycal(){
          var unit_price=document.myForm.unitP.value;
          var qty=document.myForm.Qty.value;
          var packingU=document.myForm.packingU.value;
          var taxP=document.myForm.taxP.value;
          var subT=qty*unit_price;
          var tax=((subT*taxP)/100);
          var paid=document.myForm.paid.value;
          
          var grand_total=subT-tax;
          document.getElementById('subT').value=subT;
          document.getElementById('taxA').value=tax;
          
          document.getElementById('grand_total').value=grand_total;
         if(grand_total==paid){
             due=0;
         }else{
          var due=grand_total-paid;
         }
         document.getElementById('due').value=due;
      }
 
  </script>
</body>

</html>
































  
 