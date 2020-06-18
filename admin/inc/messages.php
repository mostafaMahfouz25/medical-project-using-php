<?php 

if(isset($error) && $error!='')
{
    ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php
}

if(isset($success) && $success!='')
{
    ?>
        <div class="alert alert-success text-center"><?php echo $success; ?></div>
    <?php
}