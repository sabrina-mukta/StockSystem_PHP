<?php
    session_start();
    require_once 'conn.php';
    require_once 'auth.php';
?>

<?php
$total_stcok_query="select * from medicine_stock  ";
$total_stcok_query_run=mysqli_query($conn,$total_stcok_query);
if($post_total_stcok=mysqli_num_rows($total_stcok_query_run))
{
    $totalStock=$post_total_stcok;
}
else{

    $totalStock=0;
}


//total customer counting
$dash_customers_query="select * from customer ";
$dash_customers_query_run =mysqli_query($conn,$dash_customers_query);
if($post_total_customers=mysqli_num_rows($dash_customers_query_run))
{
  $totalCustomer=$post_total_customers;
}
else{

    $totalCustomer=0;
}

//total quantity counting
$sql="SELECT SUM(balance_qty) AS value_sum FROM medicine_stock";
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_assoc($result); 
$sum =$row['value_sum'];






$dash_supplier_query="select * from supplier ";
$dash_supplier_query_run =mysqli_query($conn,$dash_supplier_query);
if($post_total_supplier=mysqli_num_rows($dash_supplier_query_run))
{
   $totalsupplier=$post_total_supplier;
}
else{

    $totalsupplier=0;
}

$query = mysqli_query($conn,"SELECT MAX(invoice_id) as max FROM invoice"); 
$row = mysqli_fetch_array($query); 
$highest_id = $row['max'];

if($highest_id)
{
   $totalinvoice=$highest_id;
}
else{

    $totalinvoice=0;
}

//total user counting
$dash_user_query="select * from user ";
$dash_user_query_run =mysqli_query($conn,$dash_user_query);
if($post_total_user=mysqli_num_rows($dash_user_query_run))
{
  $totaluser=$post_total_user;
}
else{

    $totaluser=0;
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/styles.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
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
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent text-light second-text active"><i
                        class="fa-solid fa-gauge me-2"></i>Dashboard</a>
                <?php if ($user_role_id == 1):?>                        
                <div>
                    <a
                        href="#medicineSubMenu"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light"
                        data-bs-toggle="collapse">
                        <i class="fa-solid fa-capsules me-1 mt-4 text-light"></i> Medicine
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
                <?php endif; ?>   
                    
                <div class="menu-item-wrap">
                    <a href="#invoiceSubMenu" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-light" data-bs-toggle="collapse">
                        <i class="fa-solid fa-file-invoice me-2 mt-4 text-light"></i> Invoice
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
                        <i class="fas fa-paperclip me-2 mt-4 text-light"></i> Reports
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
                        <i class="fa-solid fa-person-military-pointing me-2 mt-4 text-light"></i>Customer
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
                        class="fa-solid fa-truck-field me-2 mt-4 text-light"></i>Supplier</a>

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
                        class="fa-solid fa-magnifying-glass me-2 mt-4 text-light"></i>Search</a>
                
            </div>
        </div>
    
        <!--sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-4">
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
                      </li>
                    </ul>
                </div>
           </nav>
        

            <div class="container-fluid bg-light">
                <!--1st row start-->
                <div class="row">
                    <?php if ($user_role_id == 1): ?>
                        <div class=" col-sm-12 mt-2 col-md-4 col-lg-4">
                            <a href="manage_medicine_stock.php" class="text-dark text-decoration-none"><div class="tb p-3  shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2 text-light"><?php echo  $sum; ?></h3>
                                    <p class="fs-5 text-light">Total Balance Quantity</p>
                                </div>
                                <i class="fa-solid fa-mountain-sun fs-1 me-3 rounded-full bg-light p-3 fs-1"></i>
                            </div></a>
                        </div>
                    <?php endif; ?>

                    <?php if ($user_role_id == 1):?>
                    <div class="col-sm-12 mt-2 col-md-4 col-lg-4 " >
                        <a href="manage_medicine_stock.php" class="text-decoration-none"><div class="tsi text-dark p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2 text-light"><?php echo $totalStock;?></h3>
                                <p class="fs-5 text-light">Total Stock Item</p>
                            </div>
                            <i class="fa-regular fa-layer-group rounded-full bg-light p-3 fs-1"></i>
                        </div></a>
                    </div>
                    <?php endif; ?>
                     <?php if ($user_role_id == 1):?>
                    <div class="col-sm-12 mt-2 col-md-4 col-lg-4">
                      <a href="customer_manage.php" class="text-dark text-decoration-none">
                         <div class="tc p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2 text-light"><?php echo $totalCustomer;?></h3>
                                    <p class="fs-5 text-light">Total Customar</p>
                                </div>
                             <i class="fa-solid fa-person-military-pointing rounded-full bg-light p-3 fs-1"></i>
                          </div>
                      </a>
                    </div>
                    <?php endif; ?>
                    </div>
                    <!--1st row start-->

                    <!--2nd row start-->
                    <div class="row mt-5">
                        <div class="col-sm-12 mt-2 col-md-4 col-lg-4">
                        <a href="manage_supplier.php" class="text-dark text-decoration-none"><div class="ts p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2 text-light"><?php echo $totalsupplier;?></h3>
                                    <p class="fs-5 text-light">Total Supplier</p>
                                </div>
                                
                                <i class="fa-brands fa-supple  rounded-full bg-light p-3 fs-1"></i>
                            </div></a>
                        </div>
                        <div class="col-sm-12 mt-2 col-md-4 col-lg-4">
                            <a href="dashboard.php" class="text-dark text-decoration-none"><div class="em p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2 text-light">0</h3>
                                    <p class="fs-5 text-light">Expired Medicine</p>
                                </div>
                                
                                <i class="fa-solid fa-truck-fast rounded-full bg-light p-3 fs-1"></i>
                            </div></a>
                        </div>
                        <div class="col-sm-12 mt-2 col-md-4 col-lg-4">
                            <a href="manage_invoice.php" class="text-dark text-decoration-none"><div class="ti p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2 text-light"><?php echo  $totalinvoice;?></h3>
                                    <p class="fs-5 text-light">Total Invoice</p>
                                </div>
                            
                                <i class="fa-solid fa-cart-shopping fs-1 rounded-full bg-light p-3"></i>
                            </div></a>
                        </div>
                    </div>
                    
                    <!--2nd row end-->
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4"></div>
                            
                <!--<div class="col md-12 col lg-4 ms-12 mt-5 mb-4">-->
                <!--    <a href="dashboard.php" class="text-dark text-decoration-none">-->
                <!--       <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">--->
                <!--          <div>-->
                <!--             <h3 class="fs-2">0</h3>-->
                <!--             <p class="fs-5">User</p>-->
                <!--          </div>-->
                            
                <!--          <i class="fa-solid fa-users rounded-full secondary-bg p-3 fs-1"> </i>-->
                <!--        </div>-->
                <!--    </a>---->
                <!--</div>-->
                    
                            <div class="col-4"></div>
                        </div>
                    </div>
                    
                    <hr class="bg-danger p-0 mt-5 mb-5">
                    
                    
                    <!----Start After Horizontal Line item---->
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                              <a href="add_medicine.php" class="text-decoration-none text-light ">
                               <div class="col-12 p-5 mt-3 ms-0 me-5 text-light d-flex justify-content-around em">
                                  <div class="p-3 d-flex">
                                      <div>
                                          <i class="fa-solid fa-plus fa-2x"></i>
                                           <span class="fw-bold">Add Medicine       </span>
                                      </div>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        
                        <div class="col-4">
                              <a href="invoice_form.php" class="text-decoration-none text-light ti">
                               <div class="col-12 p-5 mt-3 ms-0 me-2 text-light d-flex justify-content-around ti">
                                  <div class="p-3 d-flex">
                                    <div>
                                     <i class="fa-solid fa-marker fa-2x"></i>
                                        <span class="fw-bold">Create Invoice</span>
                                      </div>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        
                        <div class="col-4">
                              <a href="fatch_PReport.php" class="text-decoration-none text-light">
                               <div class="col-12 p-5 mt-3 ms-0 me-5 text-light d-flex justify-content-around em">
                                  <div class="p-3 d-flex">
                                    <div>
                                     <i class="fa-solid fa-eye fa-2x"></i>
                                        <span class="fw-bold">Show Report</span>
                                    </div>
                                     <b></b>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        
                        <div class="col-4">
                              <a href="add_supplier.php" class="text-decoration-none text-light">
                               <div class="col-12 p-5 mt-3 ms-0 me-2 text-light d-flex justify-content-around ti">
                                  <div class="p-3 d-flex">
                                     <div>
                                         <i class="fa-solid fa-plus fa-2x"></i>
                                         <span class="fw-bold">Add Supplier      </span>
                                      </div>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        
                        <div class="col-4">
                              <a href="user.php" class="text-decoration-none text-light">
                               <div class="col-12 p-5 mt-3 ms-0 me-2 mb-5 text-light d-flex justify-content-around em">
                                  <div  >
                                       <div class="p-3 d-flex">
                                         <i class="fa-solid fa-user fa-2x"></i>
                                         <span class="fw-bold p-2"><?php echo $totaluser; ?>User</span>
                                      </div>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        
                        <div class="col-4">
                              <a href="customer_add.php" class="text-decoration-none text-light">
                               <div class="col-12 p-5 mt-3 ms-0 me-2 mb-3 text-light d-flex justify-content-around ti">
                                  <div class="p-3 d-flex">
                                        <div>
                                         <i class="fa-solid fa-plus fa-2x"></i>
                                         <span class="fw-bold">Add Customer      </span>
                                      </div>
                                  </div>
                               </div>
                            </a>  
                        </div>
                        <!----End Item---->
                        <!--Start Footer-->
                        
                       
                              
                      </div>
                </div>
                <div class="row bg-light text-center p-2 ft">
                    <footer>
                        <a href="#" class="text-decoration-none text-light">AUTHOR : PHARMA LTD,   @ Copyright By PHARMA</a>
                    </footer>
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