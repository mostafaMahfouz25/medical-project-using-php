<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_SESSION['admin_type']=="admin")
{
    redirect(URL);
}
$id = $_GET['id'];
if(count(getOne('admins'," WHERE `admin_id`='$id' ")) == 0)
{
    redirect(URL);
}
if(deleteRecord('admins'," WHERE `admin_id`='$id' "))
{
    $success = "Deleted Success";
}
?>

<div class="col-12">
    <?php  require_once(ADMIN.'inc/messages.php');  ?>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info my-3">Go Back</a>
    <?php header("refresh:3;url=".AURL."manager/view.php"); ?> 

</div>

<?php 

include(ADMIN.'inc'.DS.'footer.php');
?>
