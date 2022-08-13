<?php
require_once "conn.php";
if(isset($_POST['save'])){
        $mediN=$_POST['mediN'];
        $brandN=$_POST['brandN'];
        $categoryN=$_POST['categoryN'];
        $supp=$_POST['supp'];
        $purchaseP=$_POST['purchaseP'];
        $packingU=$_POST['packU'];
        $menuFD=$_POST['menuFD'];
        $expireD=$_POST['expireD'];
        $purchaseQ=$_POST['purchQ']; 
        // $issueQ=$_POST['issueQ'];
        $balanceQ=$_POST['balanceQ'];
        $sql1="insert into medicine_stock(medicine_id,brand_id,category_id,supplier_id,purchase_price,packing_unit,manufacture_Date,expire_date,purchase_qty,balance_qty)values($mediN,$brandN,$categoryN,$supp,$purchaseP,'$packingU','$menuFD','$expireD',$purchaseQ,$balanceQ)";
        $query=mysqli_query($conn,$sql1);
        if($query){
             header('location:manage_medicine_stock.php');
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
    <title>Pharmacy</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar start -->
        <div style="background-color:#121642" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
             <a class="navbar-brand" href="#">
                    <img src="image/pharma_logo.jpg" alt=" " class="rounded-circle ms-end" width="90" height="80">
                </a>
                <span class="ms-end text-light">Pharma</span></div>
            
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent text-light active"><i
                        class="fa-solid fa-gauge me-2 text-light"></i>Dashboard</a>
                                            
                <div>
                    <a
                        href="#medicineSubMenu"
                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"
                        data-bs-toggle="collapse">
                        <i class="fa-solid fa-capsules me-1 text-light"></i> Medicine
                    </a>

                    <div class="collapse ps-2" id="medicineSubMenu">
                        <a href="add_medicine.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Purchase Medicine 
                        </a>

                        <a href="manage_medicine.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Manage Medicine
                        </a>

                        <a href="add_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Add Medicine Stock
                        </a>

                        <a href="manage_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                          Manage Medicine Stock
                        </a>
                    </div>
                </div>
                        
                <div class="menu-item-wrap">
                    <a href="#invoiceSubMenu" class="list-group-item list-group-item-action bg-transparent text-light fw-bold" data-bs-toggle="collapse">
                        <i class="fa-solid fa-file-invoice me-2 text-light"></i> Invoice
                    </a>

                    <div class="collapse ps-3" id="invoiceSubMenu">
                        <a href="invoice_form.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            New Invoice
                        </a>

                        <a href="manage_invoice.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Manage invoice
                        </a>
                    </div>
                </div>

                <div class="menu-item-wrap">
                    <a href="#reportSubMenu" class="list-group-item list-group-item-action bg-transparent text-light fw-bold" data-bs-toggle="collapse">
                        <i class="fas fa-paperclip me-2 text-light"></i> Reports
                    </a>

                    <div class="collapse ps-3" id="reportSubMenu">
                         <a href="purchase_report.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Purchase Report
                        </a>
                        <a href="sales_report.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Sales Report
                        </a>
                        <a href="fatch_PReport.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Product Wise Report
                        </a>
                    </div>
                </div>

                <div>
                    <a href="#customerSubmenu" class="list-group-item list-group-item-action bg-transparent text-light fw-bold" data-bs-toggle="collapse">
                        <i class="fa-solid fa-person-military-pointing me-2 text-light"></i>Customer
                    </a>

                    <div class="collapse ps-3" id="customerSubmenu">
                        <a href="customer_add.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                           Add Customer
                        </a>

                        <a href="customer_manage.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Manage Customer
                        </a>
                    </div>
                </div>

                <div>
                    
                     <a href="#SuplierSubmenu" class="list-group-item list-group-item-action bg-transparent text-light fw-bold" data-bs-toggle="collapse"><i
                        class="fa-solid fa-truck-field me-2 text-light"></i>Supplier</a>

                    <div class="collapse ps-3" id="SuplierSubmenu">
                        <a href="add_supplier.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Add Supplier
                        </a>

                        <a href="manage_supplier.p" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Manage Supplier
                        </a>
                    </div>

                </div>
                        
                
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
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
                <p class="fs-2 text-center w-100 text-light" style="background-color:#121642">Purchase Medicine</p>
                    <div class=row>
                        <hr style="color:red;">
            <form  action="#" method="POST" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-6 form-group">
                        <div class="mb-3">
                    <label for="mediN" class="form-label">Medicine Name:</label>
                									    <select class="form-control" id="mediN" name="mediN">
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
                <div class="mb-3">
                                <label for="brandN" class="form-label">Brand Name:</label>
                <select class="form-control" id="brandN" name="brandN">
                                      <option>Select Brand</option>
                                      <?php
                                      $sql="select * from brand";
                                      $query=mysqli_query($conn,$sql);
                                      while($row=mysqli_fetch_array($query)){
                                      ?>  
                                      <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand_name']?></option>
                                      <?php }?>

                                    </select>

                </div>
                
                <div class="mb-3">
                 <label for="categoryN" class="form-label">Category Name:</label>
                <select class="form-control" id="categoryN" name="categoryN">
                                      <option>Select Category</option>
                                      <?php
                                      $sql="select * from medicine_category";
                                      $query=mysqli_query($conn,$sql);
                                      while($row=mysqli_fetch_array($query)){
                                      ?>  
                                      <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                                      <?php }?>

                                    </select>
                </div>
                <div class="mb-3">
                <label for="supp" class="form-label">Supplier:</label>
                       <select class="form-control" id="supp" name="supp">
                                      <option>Select Supplier</option>
                                      <?php
                                      $sql="select * from supplier";
                                      $query=mysqli_query($conn,$sql);
                                      while($row=mysqli_fetch_array($query)){
                                      ?>  
                                      <option value="<?php echo $row['supplier_id']?>"><?php echo $row['supplier_name']?></option>
                                      <?php }?>

                                    </select>
                </div>
                 <div class="mb-3">
                        <label for="purchaseP" class="form-label">Purchase Price:</label>
                        <input type="number" class="form-control" name="purchaseP">
                 </div>
                        <div class="mb-3">
                <label for="packU" class="form-label">Packing Unit:</label>
                        <select class="form-control" name="packU">
                        <option >Please Select Packing Unit</option>
			            <option >Box</option>
			            <option >Piece</option>
                        </select>
                </div>
                  </div>
                    <div class="col-6 form-group ">
                 
                <div class="mb-3">
                        <label for="menuFD" class="form-label">Menufacture_date:</label>
                        <input type="date" class="form-control" name="menuFD">
                 </div>
                 <div class="mb-3">
                        <label for="expireD" class="form-label">Expire_date:</label>
                        <input type="date" class="form-control" name="expireD">
                 </div>
                
                <div class="mb-3">
                        <label for="purchQ" class="form-label">Purchase Quantity:</label>
                        <input type="number" class="form-control" name="purchQ">
                 </div>
                 <!--<div class="mb-3">-->
                 <!--       <label for="issueQ" class="form-label">Issue Quantity:</label>-->
                 <!--       <input type="number" class="form-control" name="issueQ">-->
                 <!--</div>-->
                 <div class="mb-3">
                        <label for="balanceQ" class="form-label">Balance Quantity:</label>
                        <input type="number" class="form-control" name="balanceQ">
                 </div>
                    </div>
                </div>
                    
                 <button type="submit" class="btn btn-primary mt-3 text-center" name="save">Add Stock</button>
                </form>
                
            </div>
        
        

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
    </script>
</body>

</html>






