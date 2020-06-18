<?php 
session_start();
if(isset($_SESSION['admin_name']))
{
    header("location:../index.php");
}
require_once('../globals.php');
include(ADMIN.'inc'.DS.'headerLogin.php');
include(CORE.'db.php');
include(CORE.'validation.php');

?>


<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                    <?php 

                if(isset($_POST['submit']))
                {
                    $email = san_email($_POST['email']);
                    $password = san_string($_POST['password']);

                    if(required_val($email) &&  required_val($password))
                    {
                        
                        $row = getOne('admins'," WHERE `admin_email`='$email' ORDER BY `admin_id` DESC LIMIT 1 ");
                        if(count($row))
                        {
                            if(password_verify($password,$row['admin_password']))
                            {
                                $_SESSION['admin_name'] = $row['admin_name'];
                                $_SESSION['admin_email'] = $row['admin_email'];
                                $_SESSION['admin_type'] = $row['admin_type'];
                                header("location:".AURL);
                            }
                            else 
                            {
                                $error = "Email Or Password Not Correct !";
                            }
                        }
                        else 
                        {
                            $error = "This Email Dose Not Exist !";
                        }
                    }
                    else 
                    {$error = "Please Fill All Fields";}
                }
            
            ?>
                    <div>
                        <form class="border p-5 my-3 " method="POST" action="<?php  echo $_SERVER['PHP_SELF'];  ?>">
                        <?php  require_once(ADMIN.'inc/messages.php'); ?>
                            <div class="form-group">
                                <label for="email"  class="text-dark ">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 
include(ADMIN.'inc'.DS.'footerLogin.php');
?>
