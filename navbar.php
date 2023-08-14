<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/data Tables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
  </head>
  <body>

  
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >NILKANTH ELETRICAL</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <a href="logout.php"><input
                class="form-control"
                type="button"
                value="logout"
                placeholder=""
                aria-label=""
              /></a>
              <!-- <button class="btn btn-primary" type="submit"> -->
                <!-- <i class="bi bi-search"></i> -->
              <!-- </button> -->
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start bg-dark text-white sidebar-nav "tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-4">
                pviraj@gmail.com
              </div>
            </li>
            <li>
              <a href="dashboard.php" class="nav-link px-3 active mb-2">
                <span class="me-2">
                  <i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- <li class="my-4"><hr class="dropdown-divider bg-light" /></li> -->
            <!-- <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li> -->
            <li>
              <a class="nav-link px-3 sidebar-link"  data-bs-toggle="collapse" href="#layouts">
                <span class="me-2">
                <i class="fa fa-plus-square" aria-hidden="true"></i></span>
                <span>Master</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="addcustomer.php" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></i></span>
                      <span>New Customer</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="allcustomer.php" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></i></span>
                      <span>All Customer</span>
                    </a>
                  </li>
                </ul>
              </div>


            </li>
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
                <span class="me-2">
                <i class="fa fa-handshake-o" aria-hidden="true"></i></span>
                <span>Quotation</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts2">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="newquotation.php" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></span>
                      <span> New Quotation</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="layouts2">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></span>
                      <span>All Quotation</span>
                    </a>
                  </li>
                </ul>
              </div>
            <!-- <li class="my-4"><hr class="dropdown-divider bg-light" /></li> -->
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts3">
                <span class="me-2">
                <i class="fa fa-line-chart" aria-hidden="true"></i></span>
                <span>Invoice</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
            
              <div class="collapse" id="layouts3">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="invoice.php" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></i></span>
                      <span> New Invoice</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="layouts3">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="allinvoice.php" class="nav-link px-3">
                      <span class="me-2"> <i class="fa fa-circle-o" aria-hidden="true"></i></i></span>
                      <span>All Invoice</span>
                    </a>
                  </li>
                </ul>
              </div>
        </nav>
      </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/data Tables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
