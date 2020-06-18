<?php require_once('globals.php'); ?>
<?php require_once(CORE.'db.php'); ?>
<?php require_once(CORE.'validation.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Medical Services</title>
  </head>
  <body >


    <h1 class="text-center py-3 my-3 ">Reservation Form</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <img src="assets/images/5.png" alt="" style="max-width:100%">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                <?php 

                        if(isset($_POST['submit']))
                        {
                            $name = san_string(san_input($_POST['name']));
                            $email = san_email(san_input($_POST['email']));
                            $phone = san_string(san_input($_POST['phone']));
                            $city_id = san_number(san_input($_POST['city_id']));
                            $ser_id = san_number(san_input($_POST['ser_id']));
                            if(required_val($name) && required_val($email) && required_val($phone) && required_val($city_id) && required_val($ser_id))
                            {
                                if(min_val_str($name,3))
                                {
                                    if(v_email($email))
                                    {
  
                                        $data = [
                                            "order_name"=>$name,
                                            "order_email"=>$email,
                                            "order_phone"=>$phone,
                                            "order_city_id"=>$city_id,
                                            "order_service_id"=>$ser_id
                                        ];
                                        if(insertData('orders',$data))
                                        {
                                            $success = "Data Added Successfully </br> We will Contact With You Soon :)";
                                        }
                       
                                    }
                                    else 
                                    {$error = "Please Type a Valid Email";}
                                }
                                else 
                                {$error = "Please Type Correct Name";}
                                
                            }
                            else 
                            {$error = "Please Fill All Fields";}
                        }

                ?>
                </div>
                <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <?php  require_once(ADMIN.'inc/messages.php'); ?>
                    <div class="form-group">
                        <label for="name"  class="text-white">Your Name</label>
                        <input type="text" name="name"  value="<?php old('name'); ?>" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name"  class="text-white">Your Email</label>
                        <input type="text" name="email" value="<?php old('email'); ?>" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="name"  class="text-white">Your Phone</label>
                        <input type="text" name="phone" value="<?php old('phone'); ?>" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="city"  class="text-white">Your City</label>
                        <select name="city_id" class="form-control" id="city">
                        <?php foreach(getAll('cities') as $row): ?>
                            <option value="<?php  echo $row['city_id']; ?> "> <?php  echo $row['city_name']; ?> </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group"  >
                        <label for="ser"  class="text-white">Choose Service</label>
                        <select name="ser_id" class="form-control" id="ser">
                        <?php foreach(getAll('services') as $row): ?>
                            <option value="<?php  echo $row['ser_id']; ?> "> <?php  echo $row['ser_name']; ?> </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>

            </div>
            
        </div>
    </div>

  
  
  </body>
</html>