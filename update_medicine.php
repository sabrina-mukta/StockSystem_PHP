<?php
session_start();
require_once 'conn.php';
require_once 'auth.php';
$id=$_REQUEST['uid'];
$sql1="select  medicine.medicine_id,medicine.medicine_name,medicine.unit_price,medicine.packing_unit,brand.brand_name,medicine_category.category_name from medicine
      LEFT JOIN brand ON medicine.brand_id=brand.brand_id 
    LEFT JOIN medicine_category ON medicine.category_id=medicine_category.category_id where medicine=$id";
  $result=mysqli_query($conn,$sql1);
  $row=@mysqli_fetch_array($result);
  $mediN1=@$row['medicine_name'];
  $categoryN1=@$row['category_name'];
  $brandN1=@$row['brand_name'];
  $unitP1=@$row['unit_price'];
  $packingU1=@$row['packing_unit'];
if(isset($_POST['save'])){
    $mediN=$_POST['mediN'];
  $categoryN=$_POST['categoryN'];
  $brandN=$_POST['brandN'];
  $unitP=$_POST['unitP'];
  $packingU=$_POST['packingU'];
    $sql="update medicine set brand_id='$brandN',category_id=$categoryN,medicine_name='$mediN',unit_price=$unitP,packing_unit='$packingU' where medicine_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header('location:manage_medicine.php');
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

                        <a href="customer_manage.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Manage Customar
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
                        <div class="col-8 float-center mx-auto d-block">
                        <p class="fs-3 text-center bg-success w-100 text-light">Add New Medicine</p>
                         <form  action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="mediN" class="form-label">Medicine Name:</label>
                    <input type="text" class="form-control" name="mediN" value="<?php echo $mediN1; ?>">
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
                        <label for="unitP" class="form-label">Price:</label>
                        <input type="number" class="form-control" name="unitP" <?php echo $unitP1; ?>">
                 </div>
                 
                 
                 <div class="mb-3">
                <label for="packingU" class="form-label">Unit:</label>
                        <select class="form-control" name="packingU">
                        <option >Please Select Unit</option>
			            <option >Box</option>
			            <option >Piece</option>
			            <option >kilogram</option>
			            <option >gram</option>
			             <option >litre</option>
			             <option >millilitre</option>
                        </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3" value="" name="save">Submit</button>
                <a href="manage_medicine.php" type="button" class="btn btn-success mt-3">Show Medicine</a>
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
    </script>
</body>

</html>













