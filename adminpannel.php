<?php 
$uid=$_GET['uid'];
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body background="images.jpg")>
<?php
include('includes/header.php');?> 


<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Welcome Admin</h1>
    <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        <a href="../adminlogin.php?uid=<?php echo $uid;?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Logout</a>

  </div>
  <div class="row">

    <!-- Clients Details -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">clients</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <a href="cust.php?uid=<?php echo $uid; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Total customer:+ DETAILS
                </a> 


              </div>
            </div>
             <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Order details -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">order details</div>
              <a href="order.php?uid=<?php echo $uid; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> order+payment +DETAILS</a>
            </div>
             <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Add Customer</div>
              <a href="custinfo.php?uid=<?php echo $uid; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-edit"></span> New customer</a>

            </div>
             <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-blue-grey text-uppercase mb-1">Stocks</div>
              <a href="stocks.php?uid=<?php echo $uid; ?>"class="btn btn-secondary btn-sm"><span class="glyphicon glyphicon-edit"></span>Add stocks</a>
            </div>
             <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New orders</div>
              <a href="new_order.php?uid=<?php echo $uid; ?>"class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span>Add order+payment</a>
            </div>
             <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <div class="container">
<?php
include('includes/footer.php');
?>
</div>
</body>
</html>