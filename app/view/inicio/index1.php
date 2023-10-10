<!DOCTYPE html>
<html lang="pt-br">
<?php 

session_start();

if (isset($_SESSION["url_aplicativo"])){
  $unisen_url = $_SESSION["url_aplicativo"];
}


?>
<?php

  $path =  $_SERVER['DOCUMENT_ROOT'];
  $path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
  include_once($path);

?>

<!-- partial:partials/_header.html -->

<?php

  $path =  $_SERVER['DOCUMENT_ROOT'];
  $path .= $unisen_url . 'app/includes/UI/header.php';
  include_once($path);

?>

<body>
  <div class=" container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php 
    
      $path =  $_SERVER['DOCUMENT_ROOT'];
      $path .= $unisen_url . 'app/includes/UI/navbar.php';
      include_once($path);

    ?>
   
    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
    
        <!-- partial:partials/_sidebar.html -->
        <?php    

          $path =  $_SERVER['DOCUMENT_ROOT'];
          $path .= $unisen_url . 'app/includes/UI/sidebar.php';
          include_once($path);
                
        ?>
          
        <!-- partial -->
        <div class="content-wrapper">
          <h3 class="page-heading mb-4">Dashboard</h3>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-danger">
                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Visitors</p>
                      <h4 class="bold-text">65,650</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i> <?php echo $unisen_url; ?>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Orders</p>
                      <h4 class="bold-text">656</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Revenue</p>
                      <h4 class="bold-text">$65656</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Followers</p>
                      <h4 class="bold-text">+62,500</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Orders</h5>
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Pending orders</p>
                        <div class="progress progress-slim">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Shipped orders</p>
                        <div class="progress progress-slim">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Returned orders</p>
                        <div class="progress progress-slim">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Cancelled orders</p>
                        <div class="progress progress-slim">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Cancelled orders</p>
                        <div class="progress progress-slim">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <p class="text-muted mb-0">
                        Note: Order details get updated every 10 minutes
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Sales</h5>
                  <div class="custom-legend-container w-75 mx-auto">
                    <canvas id="sales-chart"></canvas>
                  </div>
                  <div id="sales-chart-legend" class="legend-right"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sales region</h5>
                  <div class="table-responsive table-sales">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">
                            Country
                          </th>
                          <th class="text-right">
                            Sales
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-us"></i>
                            </div>
                          </td>
                          <td>USA</td>
                          <td class="text-right">
                            2.920
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-in"></i>
                            </div>
                          </td>
                          <td>India</td>
                          <td class="text-right">
                            8.265
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-id"></i>
                            </div>
                          </td>
                          <td>Indonesia</td>
                          <td class="text-right">
                            787
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-gb"></i>
                            </div>
                          </td>
                          <td>United Kingdom</td>
                          <td class="text-right">
                            690
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-ro"></i>
                            </div>
                          </td>
                          <td>Romania</td>
                          <td class="text-right">
                            600
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <i class="flag-icon flag-icon-br"></i>
                            </div>
                          </td>
                          <td>Brasil</td>
                          <td class="text-right">
                            550
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Last Billings</h5>
                <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="text-primary">
                        <th>Order No</th>
                        <th>Product Name</th>
                        <th>Purchased On</th>
                        <th>Shipping Status</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                        <td>034</td>
                        <td>Iphone 7</td>
                        <td>12 May 2017</td>
                        <td>Dispatched</td>
                        <td>Credit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>035</td>
                        <td>Galaxy S8</td>
                        <td>15 May 2017</td>
                        <td>Dispatched</td>
                        <td>Internet banking</td>
                        <td><label class="badge badge-warning">Pending</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>036</td>
                        <td>Amazon Echo</td>
                        <td>17 May 2017</td>
                        <td>Dispatched</td>
                        <td>Credit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>037</td>
                        <td>Google Pixel</td>
                        <td>17 May 2017</td>
                        <td>Dispatched</td>
                        <td>Cash on delivery</td>
                        <td><label class="badge badge-danger">Rejected</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                      <tr class="">
                        <td>038</td>
                        <td>Mac Mini</td>
                        <td>19 May 2017</td>
                        <td>Dispatched</td>
                        <td>Debit card</td>
                        <td><label class="badge badge-success">Approved</label></td>
                        <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                        <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- partial:partials/_footer.html -->
        <?php 
          
          $path =  $_SERVER['DOCUMENT_ROOT'];
          $path .= $unisen_url . 'app/includes/UI/footer.php';
          include_once($path);
      
        ?>   

        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="../../includes/dist/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../includes/dist/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../includes/dist/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../includes/dist/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../../includes/dist/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="../../includes/dist/js/off-canvas.js"></script>
  <script src="../../includes/dist/js/hoverable-collapse.js"></script>
  <script src="../../includes/dist/js/misc.js"></script>
  <script src="../../includes/dist/js/chart.js"></script>
  <script src="../../includes/dist/js/maps.js"></script>
</body>

</html>
