<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    redirect(URL);
}
$id = $_GET['id'];
$row = getOne('services'," WHERE `ser_id`='$id' ");

if(count($row) == 0)
{
    redirect(URL);
}


?>
<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About Service</h3>
           
            <div>
                <form class="border p-5 my-3 " method="POST" action="<?php echo AURL.'service/update.php'; ?>">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="name" value="<?php echo $row['ser_name']; ?>" class="form-control" id="name">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>


<?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
