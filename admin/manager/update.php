<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
include(CORE.'validation.php');


if(isset($_POST['submit']) && $_SESSION['admin_type']=="super_admin")
{
    $name = san_string(san_input($_POST['name']));
    $email = san_email(san_input($_POST['email']));
    $type = san_string(san_input($_POST['type']));
    $password = san_string(san_input($_POST['password']));
    $id = $_POST['id'];
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
                    if(updateData('admins',$data," WHERE `admin_id`='$id' "))
                    {
                        $success = "Data Updated Successfully";
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



<div class="col-12">
    <?php  require_once(ADMIN.'inc/messages.php');  ?>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info my-3">Go Back</a>
</div>

<?php
include(ADMIN.'inc'.DS.'footer.php');
?>
