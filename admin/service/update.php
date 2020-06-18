<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
include(CORE.'validation.php');


if(isset($_POST['submit']))
{
    $name = san_string(san_input($_POST['name']));
    $id = $_POST['id'];
    if(required_val($name) && required_val($id))
    {
   
        $data = ["ser_name"=>$name];
        if(updateData('services',$data," WHERE `ser_id`='$id' "))
        {
            $success = "Data Updated Successfully";
        }
    }
    else 
    {$error = "Please Type Service Name";}
}

?>

<div class="col-12">
    <?php  require_once(ADMIN.'inc/messages.php');  ?>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info my-3">Go Back</a>
</div>

<?php
include(ADMIN.'inc'.DS.'footer.php');
?>
