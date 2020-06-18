<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
?>

<div class="col-12">
     <h1 class="text-center my-3">View All Services</h1>
</div>
 <div class="col-12 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Service</th>
                <th scope="col">Requested At</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach(getAll('orders') as $row): ?>
                <tr>
                    <td> <?php type_count(); ?> </td>
                    <td><?php echo $row['order_name']; ?></td>
                    <td scope="col"><?php echo $row['order_email']; ?></td>
                    <td scope="col"><?php echo $row['order_phone']; ?></td>
                    <td scope="col">
                        <?php $city = getOne("cities"," WHERE `city_id`={$row['order_city_id']} ");  ?>
                        <?php echo $city['city_name']; ?>
                    </td>
                    <td scope="col">
                        <?php $serv = getOne("services"," WHERE `ser_id`={$row['order_service_id']} ");  ?>
                        <?php echo $serv['ser_name']; ?>
                    </td>
                    <td scope="col"><b><?php echo date('Y-m-d h:i:A',strtotime($row['order_created_at'])); ?></b></td>

                    <td>
                        <a href="<?php echo AURL.'order/delete.php?id='.$row['order_id']; ?>" class="btn btn-danger delete-record" >Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


 <?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
