<?php
require_once 'conn.php';
if(isset($_POST['save'])){
    $mediN=$_POST['mediN'];
    $brandN=$_POST['brandN'];
    $categoryN=$_POST['categoryN'];
    $unitP=$_POST['unitP'];
    $packingU=$_POST['packingU'];
    $sql="insert into medicine(brand_id,category_id,medicine_name,unit_price,packing_unit)values($brandN,$categoryN,'$mediN',$unitP,'$packingU')";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/css/boxicons.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://kit.fontawesome.com/90686a9797.js" crossorigin="anonymous"></script>
     
    <title>Pharmacy</title>
</head>

<body >
    <div class="d-flex" id="wrapper">
        <!-- Sidebar start -->
        <div style="background-color:#121642" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <a class="navbar-brand" href="#">
                    <img src="image/pharma_logo.jpg" alt=" " class="rounded-circle ms-end" width="90" height="80">
                </a>
                <span class="ms-end text-light">Pharma</span></div>
            
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent text-light second-text active"><i
                        class="fa-solid fa-gauge me-2"></i>Dashboard</a>
                                           
                <div>
                    <a
                        href="#medicineSubMenu"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light"
                        data-bs-toggle="collapse">
                        <i class="fa-solid fa-capsules me-1 text-light"></i> Medicine
                    </a>

                    <div class="collapse ps-2" id="medicineSubMenu">
                        <a href="add_medicine.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Add Medicine
                        </a>

                        <a href="manage_medicine.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Manage Medicine
                        </a>

                        <a href="add_medicine_stock.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Purchase Medicine 
                        </a>

                        <a href="manage_medicine_stock.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                          Manage Medicine Stock
                        </a>
                    </div>
                </div>
              
                    
                <div class="menu-item-wrap">
                    <a href="#invoiceSubMenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light" data-bs-toggle="collapse">
                        <i class="fa-solid fa-file-invoice me-2 text-light"></i> Invoice
                    </a>

                    <div class="collapse ps-3" id="invoiceSubMenu">
                        <a href="invoice_form.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            New Invoice
                        </a>

                        <a href="manage_invoice.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Manage invoice
                        </a>
                    </div>
                </div>

                <div class="menu-item-wrap">
                    <a href="#reportSubMenu" class="list-group-item text-light list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                        <i class="fas fa-paperclip me-2 text-light"></i> Reports
                    </a>

                    <div class="collapse ps-3" id="reportSubMenu">
                         
                        <a href="purchase_report.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Purchase Report
                        </a>
                        <a href="sales_report.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Sales Report
                        </a>
                        <a href="fatch_PReport.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Product Wise Report
                        </a>
                    </div>
                </div>

                <div>
                    <a href="#customerSubmenu" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse">
                        <i class="fa-solid fa-person-military-pointing me-2 text-light"></i>Customer
                    </a>

                    <div class="collapse ps-3" id="customerSubmenu">
                        <a href="customer_add.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                           Add Customer
                        </a>

                        <a href="customer_manage.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Manage Customer
                        </a>
                    </div>
                </div>

                <div>
                    
                     <a href="#SuplierSubmenu" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse"><i
                        class="fa-solid fa-truck-field me-2 text-light"></i>Supplier</a>

                    <div class="collapse ps-3" id="SuplierSubmenu">
                        <a href="add_supplier.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            Add Supplier
                        </a>

                        <a href="manage_supplier.php" class="text-light list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
            <div class="container bg-light" style="">
                        <div class="col-4"></div>
                        <div class="col-8 float-center mx-auto d-block">
                        <p class="fs-3 text-center text-light " style="background-color:#121642">Add New Medicine</p>
        <hr style="color:red;">
            <form  action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="mediN" class="form-label">Medicine Name:</label>
                    <input type="text" class="form-control" name="mediN">
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
    <!--                                        <a href="#" id="brand" type="text" class=" text-primary ps-0 pe-0 text-decoration-none " data-bs-target="#addb" data-bs-toggle="modal">New Brand <i class="fa-solid fa-circle-plus"></i></a>-->
         
    	<!-- Add Modal Start -->
    <!--<div id="addb" class="modal fade show" role="dialog">-->
    <!--    <div class="modal-dialog modal-lg">-->
    <!--        <form id="saveb_data" method="post">-->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-header">Add Brand</div>-->
    <!--                <div class="modal-body">-->
    <!--                   <input type="text" placeholder="Brand Name" name="brand_name" class="form-control form-control-sm" id="brand_name" />-->
    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <button type="button" onclick="saveb()" class="btn btn-primary btn-sm">Save</button>-->
    <!--                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </form>   -->
    <!--    </div>-->
    <!--</div>-->
    <!-- Add Modal End -->
            
      <!--add and save brand start -->


 <!--add and save brand end-->
         
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
                                        <!--<button type="button" data-bs-toggle="modal" data-bs-target="#addC" class="btn btn-success bx bx-message-square-add"></button>-->
    <!--                                     <a href="#" id="category" type="text" class=" text-primary ps-0 pe-0 text-decoration-none " data-bs-target="#addC" data-bs-toggle="modal">New Category <i class="fa-solid fa-circle-plus"></i></a>-->
                                    
                                    	<!-- Add Category Modal Start -->
    <!--<div id="addC" class="modal fade show" role="dialog">-->
    <!--    <div class="modal-dialog modal-lg">-->
    <!--        <form id="saveC_data" method="post">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">Add Category</div>-->
    <!--            <div class="modal-body">-->
    <!--                <input type="text" placeholder="Category" name="category_name" class="form-control form-control-sm" id="category_name" />-->
                    
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <button type="button" onclick="saveC()" class="btn btn-primary btn-sm">Save</button>-->
    <!--                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        </form>   -->
        <!--</div>-->
    <!--</div>-->
    <!-- Add Category Modal End -->
            
    
                                     
                </div>
                <div class="mb-3">
                        <label for="unitP" class="form-label">Price:</label>
                        <input type="number" class="form-control" name="unitP">
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
                <button type="submit" class="btn btn-primary mt-3" value="sa" name="save">Add</button>
                <a href="manage_medicine.php" type="button" class="btn text-light mt-3" style="background-color:#121642">Show Medicine</a>
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
<!--        <script>-->
        
<!--        // Add brandfunction-->
<!--                function saveb(){-->
<!--//     event.preventDefault();-->
<!--    $.ajax({-->
<!--        url:'brand_save.php', // Data Send & Action-->
<!--        type:'POST',-->
<!--        data: {brand_name: $('#brand_name').val()},-->
<!--        success:function (res) {-->
<!--            // Data Return-->
<!--            $('#brand_name').val('');-->
<!--            $('#addb').modal('hide');-->
<!--            $('#brandN').html(res);-->
<!--        }-->
        
<!--    })-->
    
<!--}-->
<!--// Add Categoryfunction-->
<!--               function saveC(){-->
<!--//     event.preventDefault();-->
<!--    var fd1=$('#saveC_data').get(0);-->
<!--    $.ajax({-->
<!--        url:'category_save.php', // Data Send & Action-->
<!--        method:'POST',-->
<!--        data: {category_name: $('#category_name').val()},-->
<!--        success:function(res){-->
<!--            // Data Return-->
<!--            $('#addC').modal('hide');-->
<!--            $('#category_name').val('');-->
<!--            $('#categoryN').html(res);-->
<!--        }-->
        
<!--    })-->
<!--}-->






<!--    </script>-->
<!--</body>-->

<!--</html>-->







