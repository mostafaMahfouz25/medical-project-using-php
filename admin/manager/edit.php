<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_SESSION['admin_type']=="admin")
{
    redirect(URL);
}
$id = $_GET['id'];
$row = getOne('admins'," WHERE `admin_id`='$id' ");

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
            <h3 class="text-center">Edit Info About Admin</h3>
            <div>
                <form class="border p-5 my-3 " method="POST" action="<?php  echo AURL.'manager/update.php'; ?>">
                    <?php  require_once(ADMIN.'inc/messages.php'); ?>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="name"  class="text-dark "> Name</label>
                        <input type="text" name="name"  value="<?php echo $row['admin_name']; ?>" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email"  class="text-dark "> Email</label>
                        <input type="email" name="email" value="<?php echo $row['admin_email'];  ?>" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="type"  class="text-dark "> Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="admin" <?php if($row['admin_type'] == "admin")echo "selected"; ?> >Admin </option>
                            <option value="super_admin" <?php if($row['admin_type'] == "super_admin")echo "selected"; ?> >Super Admin </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Password</label>
                        <input type="password" name="password"  class="form-control" id="name">
                    </div>

                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


<?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
