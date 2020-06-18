<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
include(CORE.'validation.php');
?>


    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Service</h3>

            <?php 

                if(isset($_POST['submit']))
                {
                    $name = san_string(san_input($_POST['name']));
                    if(required_val($name))
                    {
                        $data = ["ser_name"=>$name];
                        if(insertData('services',$data))
                        {
                            $success = "Data Added Successfully";
                        }
                    }
                    else 
                    {$error = "Please Type Service Name";}
                }
            
            ?>
            <div>
                <form class="border p-5 my-3 " method="POST" action="<?php  echo AURL.'service/add.php'; ?>">
                    <?php  require_once(ADMIN.'inc/messages.php'); ?>
                    <div class="form-group">
                        <label for="name"  class="text-dark ">Service Name</label>
                        <input type="text" class="form-control" name="name" value="<?php old('name'); ?>" id="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


<?php 
include(ADMIN.'inc'.DS.'footer.php');
?>
