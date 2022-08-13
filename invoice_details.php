<?php
    require_once 'conn.php';
    
    $id = $_GET['uid'];
  $sqlall="select invoice.invoice_id,invoice.invoice_date,invoice.sales_type,invoice.Unit_price,invoice.Issue_quantity,invoice.sub_total,invoice.dis_amount,invoice.total,invoice.Paid,invoice.Due,invoice.Grand_total,customer.customer_name,customer.phone,customer.address,medicine.medicine_name
            from invoice left join customer on invoice.customer_id=customer.customer_id 
             left join medicine on invoice.medicine_id=medicine.medicine_id where invoice_id = $id";

    $queryall=mysqli_query($conn, $sqlall);
    $data=mysqli_fetch_assoc($queryall);
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
            <div class="container">
                <div class="row float-start w-100">
                    <div class="fs-5 text-light  text-center w-100 p-2" style="background-color:#121642">Invoice Details</div>
                    
                    <div class="row bg-light ms-0">
                        <div class="col-sm-6"><strong>Date:</strong> <?php echo $data['invoice_date'] ?? ''; ?></div>
                        <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> <?php echo $data['invoice_id'] ?? ''; ?></div>

                    <hr>

                   
                        <div class="col-12">
                            <strong>Invoiced To:</strong>
                            <address>
                                <b>Name:</b> <?php echo $data['customer_name'] ?? ''; ?><br />
                                <b>Contact:</b> <?php echo $data['phone'] ?? ''; ?><br />
                                
                                <b>Sales Type:</b> <?php echo $data['sales_type'] ?? ''; ?><br /><br/>
                            </address>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="card-header">
                                        <tr>
                                            <td><strong>Medicine </strong></td>
                                            <td class="text-center"><strong>Unit Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-end"><strong>Total Price</strong></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                         $queryall=mysqli_query($conn, $sqlall);
                                         while($prod_data=mysqli_fetch_array($queryall)){
                                             ?>
                                         
                                        <tr>
                                            <td><?php echo $prod_data['medicine_name']?></td>
                                            <td class="text-center"><?php echo $prod_data['Unit_price']?></td>
                                            <td class="text-center"><?php echo $prod_data['Issue_quantity']?></td>
                                            <td class="text-end"><?php echo $prod_data['total']?></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot class="card-footer">
                                        
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Sub Total:</strong></td>
                                            <td class="text-end"><?php echo $data['sub_total'] ?? ''; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Discount Amount:</strong></td>
                                            <td class="text-end"><?php echo $data['dis_amount']?></td>
                                        </tr>
                                         <tr>
                                            <td colspan="3" class="text-end"><strong>Paid:</strong></td>
                                            <td class="text-end"><?php echo $data['Paid']?></td>
                                        </tr>
                                         <tr>
                                            <td colspan="3" class="text-end"><strong>Due:</strong></td>
                                            <td class="text-end"><?php echo $data['Due']?></td>
                                        </tr>
                                      
                                          <tr>
                                            <td colspan="3" class="text-end border-bottom-0"><strong> Grand Total:</strong></td>
                                            <td class="text-end border-bottom-0"><?php echo $data['Grand_total']?></td>
                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="my-5 text-center">
                        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
                        <div class="btn-group btn-group-sm d-print-none">
                            <a href="javascript:window.print()" class="btn btn-success border text-light-50 shadow-none">
                                <i class="fa fa-print"></i> Print
                            </a>
                            
                            <!--<a href="" class="btn btn-light border text-black-50 shadow-none">-->
                            <!--    <i class="fa fa-download"></i> Download-->
                            <!--</a>-->
                        </div>
                    </div>
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