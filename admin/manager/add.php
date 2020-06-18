<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
include(CORE.'validation.php');

?>
<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Admin</h3>

            <?php 

                if(isset($_POST['submit']))
                {
                    $name = san_string(san_input($_POST['name']));
                    $email = san_email(san_input($_POST['email']));
                    $type = san_string(san_input($_POST['type']));
                    $password = san_string(san_input($_POST['password']));
                    if(required_val($name) && required_val($email) && required_val($type) && required_val($password))
                    {
                        if(min_val_str($name,3))
                        {
                            $types = ['admin','super_admin'];
                            if(in_arr($type,$types))
                            {
                                if(min_val_str($password,6))
                                {
                                    $password = password_hash($password,PASSWORD_DEFAULT);
                                    $data = [
                                        "admin_name"=>$name,
                                        "admin_email"=>$email,
                                        "admin_type"=>$type,
                                        "admin_password"=>$password
                                    ];
                                    if(insertData('admins',$data))
                                    {
                                        $success = "Data Added Successfully";
                                    }
                                }
                                else 
                                {$error = "Password Must be Grater Than 6 Chars";}
                            }
                            else 
                            {$error = "Please Choose Valid Type";}
                        }
                        else 
                        {$error = "Please Type Correct Name";}
                        
                    }
                    else 
                    {$error = "Please Fill All Fields";}
                }
            
            ?>


            <div>
                <form class="border p-5 my-3 " method="POST" action="<?php  echo AURL.'manager/add.php'; ?>">
                    <?php  require_once(ADMIN.'inc/messages.php'); ?>
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name</label>
                        <input type="text" name="name" value="<?php old('name'); ?>" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email"  class="text-dark "> Email</label>
                        <input type="email" name="email" value="<?php old('email'); ?>" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="type"  class="text-dark "> Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="admin">Admin </option>
                            <option value="super_admin">Super Admin </option>
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
