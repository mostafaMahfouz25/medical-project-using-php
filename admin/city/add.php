<?php 
require_once('../../globals.php');
include(ADMIN.'inc'.DS.'header.php');
include(CORE.'validation.php');
?>


    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New City</h3>

            <?php 

                if(isset($_POST['submit']))
                {
                    $name = san_string(san_input($_POST['name']));
                    if(required_val($name))
                    {
                        $data = ["city_name"=>$name];
                        if(insertData('cities',$data))
                        {
                            $success = "Data Added Successfully";
                        }
                    }
                    else 
                    {$error = "Please Type City Name";}
                }
            
            ?>
            <div>
                <form class="border p-5 my-3 " method="POST" action="<?php  echo AURL.'city/add.php'; ?>">
                    <?php  require_once(ADMIN.'inc/messages.php'); ?>
                    <div class="form-group">
                        <label for="name"  class="text-dark ">City Name</label>
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
