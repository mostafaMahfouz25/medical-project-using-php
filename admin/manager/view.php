<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
?>

<div class="col-12">
     <h1 class="text-center my-3">View All Managers</h1>
</div>
 <div class="col-10 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Eamil</th>
                <th scope="col">Type</th>
                <?php if($_SESSION['admin_type'] == "super_admin"): ?> 
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <?php endif; ?> 
            </tr>
        </thead>
        <tbody>
        <?php if($_SESSION['admin_type'] == "super_admin"): ?> 
            <?php foreach(getAll('admins') as $row): ?>
                <tr>
                    <td>  <?php type_count(); ?> </td>
                    <td><?php echo $row['admin_name']; ?></td>
                    <td><?php echo $row['admin_email']; ?></td>
                    <td><?php echo $row['admin_type']; ?></td>

                    <td>
                        <a href="<?php echo AURL.'manager/edit.php?id='.$row['admin_id']; ?>" class="btn btn-info" >Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo AURL.'manager/delete.php?id='.$row['admin_id']; ?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php  else: ?>
            <?php foreach(getAll('admins') as $row): ?>
                <tr>
                    <td>  <?php type_count(); ?> </td>
                    <td><?php echo $row['admin_name']; ?></td>
                    <td><?php echo $row['admin_email']; ?></td>
                    <td><?php echo $row['admin_type']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?> 

        </tbody>
    </table>
</div>


 <?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
