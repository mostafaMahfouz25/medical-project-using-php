<?php 
require_once('../globals.php');
include(ADMIN.'inc'.DS.'header.php');

$orders = getCount("orders");
$services = getCount("services");
$ordersToDay = getCount("orders","WHERE DATE(order_created_at) = CURDATE() ");
?>



        <div class="col-md-6 my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Orders
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders </h5>
                    <p class="card-text display-3"> <?php echo $orders; ?></p>
                    <a href="<?php echo AURL.'order/view.php'; ?>"  class="btn btn-success">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Services
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Services</h5>
                    <p class="card-text display-3"> <?php echo $services; ?> </p>
                    <a href="<?php echo AURL.'service/view.php'; ?>" class="btn btn-success">Go To Services</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-8 mx-auto my-2">
            <div class="card text-center">
                <div class="card-header">
                    All Orders Today
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders This Day</h5>
                    <p class="card-text display-3"> <?php echo $ordersToDay; ?></p>
                    <a href="<?php echo AURL.'order/view.php'; ?>"  class="btn btn-info">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>


  

<?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
