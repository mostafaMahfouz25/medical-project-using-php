<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
?>

<div class="col-12">
     <h1 class="text-center my-3">View All Cities</h1>
</div>
 <div class="col-8 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach(getAll('cities') as $row): ?>
                <tr>
                    <td> <?php type_count(); ?> </td>
                    <td><?php echo $row['city_name']; ?></td>
                    <td>
                        <a href="<?php echo AURL.'city/edit.php?id='.$row['city_id']; ?>" class="btn btn-info" >Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo AURL.'city/delete.php?id='.$row['city_id']; ?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
            <?php  endforeach; ?>
        </tbody>
    </table>
</div>


 <?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
