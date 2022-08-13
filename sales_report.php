<?php  require_once 'conn.php'; ?>
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
                        <a href="add_medicine.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold text-light">
                            Add Medicine
                        </a>

                        <a href="manage_medicine.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Manage Medicine
                        </a>

                        <a href="add_medicine_stock.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
                            Purchase Medicine 
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

                        <a href="manage_supplier.php" class="list-group-item list-group-item-action bg-transparent text-light fw-bold">
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
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 d-print-none">
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
                        <div class="col-4 mx-auto w-100" style="background-color:#121642">
                            <p class="fs-3  text-center text-light">Sales Reports</p>
                        </div>
                        <hr style="color:red;">
                 <div class="text-center ms-5 ps-0 fw-bolder d-print-none">
                     
                     
                     
                     
                     
                     
                <script>
                    $(function() {
                    $(".datepicker" ).datepicker({
                     dateFormat:'dd-mm-yy',
                     changeMonth: true,
                    changeYear: true,
                    
                    });
                     });
                </script>
                     <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                      Start Date: <input type="text" class="datepicker" name="start_date" placeholder="Select Start Date"> 
                      End Date: <input type="text" class="datepicker" name="end_date" placeholder="Select End Date">
                      <button type="submit" name="search" style="background-color:#121642" class="text-light" >
                      Search</button>
                    </form>
                
                 </div>
                 <hr style="border-top:2px solid #009800;">
                 <table class="text-center w-100">
                     <thead>
                         <tr>
                         <th>Invoic Number</th>
                         <th>Customer Name</th>
                         <th>Invoice Date</th>
                         <th>Medicine Name</th>
                         <th>Unit</th>   
                         <th>Quantity</th>
                         <th>Total Price</th>
                     </tr>
                     </thead>
                    <!-- <tr style="border: 1px;>-->
                    <!--<div class="input-group bm-3">-->
                    <!--</div>-->
                    <!-- </tr>-->
                    <tbody>
                        <?php 
                         
                          @$start_date=date('Y-m-d',strtotime($_POST['start_date']));
                          @$end_date=date('Y-m-d',strtotime($_POST['end_date']));
                         $sql1="SELECT invoice.invoice_id,invoice.invoice_date,invoice.Grand_total,medicine.medicine_name,medicine.unit_price,customer.customer_name,medicine_stock.issue_qty from invoice   left join medicine on invoice.medicine_id=medicine.medicine_id left join customer on invoice.customer_id=customer.customer_id left join medicine_stock on invoice.medicine_id=medicine_stock.medicine_id  where invoice_date BETWEEN  '$start_date' AND '$end_date'";
                    
                          $query1=mysqli_query($conn,$sql1);
                          if($query1){
                              while( $row=mysqli_fetch_assoc($query1)){
                                $id=$row['invoice_id'];
                                $custN=$row['customer_name'];
                                $invoiceD=$row['invoice_date'];
                                $mediN=$row['medicine_name'];
                                $unitP=$row['unit_price'];
                                $qt=$row['issue_qty'];
                                $grandT=$row['Grand_total'];
                             
                                echo '
                                <th scope="row">'.$id.'</th>
                                <td>'.$custN.'</td>
                                <td>'.$invoiceD.'</td>
                                <td>'.$mediN.'</td>
                                <td>'.$unitP.'</td>
                                <td>'.$qt.'</td>
                                <td>'.$grandT.'</td>
                              </tr>';
                              }
                          };
                          ?>
                          
                    </tbody>
                 </table>
                 <!--<button class="btn btn-success mt-5 ms-3" onclick="printReport('Sales');">-->
                                                    
                         
                     <!--Print</button>-->
                      <div class="my-5 text-end pe-3 mb-5">
                        <div class="btn-group btn-group-sm d-print-none">
                            <a href="javascript:window.print()" class="btn btn-success border text-light-50 shadow-none">
                                <i class="fa fa-print fs-4 ps-0 pe-0 pt-1 pb-1 "></i> Print
                            </a>
                        </div>
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
























