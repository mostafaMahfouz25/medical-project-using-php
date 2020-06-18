<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    redirect(URL);
}
$id = $_GET['id'];
if(count(getOne('services'," WHERE `ser_id`='$id' ")) == 0)
{
    redirect(URL);
}
if(deleteRecord('services'," WHERE `ser_id`='$id' "))
{
    $success = "Deleted Success";
}
?>

<div class="col-12">
    <?php  require_once(ADMIN.'inc/messages.php');  ?>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info my-3">Go Back</a>
    <?php header("refresh:3;url=".AURL."service/view.php"); ?> 
    <!-- refactor this function -->
</div>

<?php 

include(ADMIN.'inc'.DS.'footer.php');
?>
