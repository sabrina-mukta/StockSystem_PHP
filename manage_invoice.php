<?php
require_once 'conn.php';
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" > </script>
<script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>
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
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent active text-light"><i
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
                 </li>
                 </ul>
                </div>
            </nav>
            </div>
</div>
            <!--dashboard end-->
            <!--add medicine_stock form start-->
            <div class="container">
                <div class="row float-start w-100">
                    <div class="fs-2 text-light text-center w-100 p-2" style="background-color:#121642">Manage Invoice</div>
                    <div class="mb-2 mt-2">
                        <a href="invoice_form.php" class="btn btn-success btn-sm active"  role="button" aria-pressed="true"><i class="fa-solid fa-plus fa-2x style="background-color:#121642" ></i></a>
                     </div>
                    <table class="table table-sm table-striped me-1 " id="table">
                        <thead>
                            <tr>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Medicine Name</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php  
                        
                                $sql1="select invoice.invoice_id,invoice.invoice_date,invoice.grand_total,customer.customer_name,medicine.medicine_name,medicine.unit_price,medicine_stock.balance_qty
                               from invoice left join customer on invoice.customer_id=customer.customer_id 
                                left join medicine on invoice.medicine_id=medicine.medicine_id
                                left join medicine_stock on invoice.medicine_id=medicine_stock.medicine_id ORDER BY invoice.invoice_id ASC";
                                $query1=mysqli_query($conn,$sql1);
                                if($query1) {
                                    while( $row=mysqli_fetch_assoc($query1)){
                                        $id=$row['invoice_id'];
                                        $custN=$row['customer_name'];
                                        $invoiceD=$row['invoice_date'];
                                        $mediN=$row['medicine_name'];
                                        $unitP=$row['unit_price'];
                                        $Qty=$row['balance_qty'];
                                        $totalA=$row['grand_total'];
                                     
                                      echo'
                                        <td>'.$id.'</td>
                                        <td>'.$custN.'</td>
                                        <td>'.$invoiceD.'</td>
                                        <td>'.$mediN.'</td>
                                        <td>'.$unitP.'</td>
                                        <td>'.$Qty.'</td>
                                        <td>'.$totalA.'</td>
                                        <td>
     <a href="update_invoice.php?uid='.$id.'" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
         <a href="delete_invoice.php?did='.$id.'" class="btn btn-danger btn-sm">
                                             <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="invoice_details.php?uid='.$id.'" class="" btn btn-success btn-sm">
                                            <i class="fa-solid  fa-eye"></i>
                                        <a/>
                                        </td>
                               </tr>';
                                }
                             };
                         ?>
                        </tbody>
                    </table>
                     
    
                    
                        <!--add invoice form end-->
                </div>
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









