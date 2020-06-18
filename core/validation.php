<?php 

$success = '';
$errors = '';

// sanitization

// sanitize input 
function san_input($val)
{
    return htmlspecialchars(trim($val));
}

// sanitize string 
function san_string(string $string)
{
    $string = san_input($string);
    return filter_var($string,FILTER_SANITIZE_STRING);
}

// sanitize string 
function san_email(string $email)
{
    $email = san_input($email);
    return filter_var($email,FILTER_SANITIZE_EMAIL);
}

// sanitize string 
function san_number(string $num)
{
    $num = (int) san_input($num);
    return filter_var($num,FILTER_SANITIZE_NUMBER_INT);
}


// validation 

function required_val($val):bool
{
    if(strlen($val) > 0)
    {
        return true;
    }
    return false;
}

// validate email 
function v_email(string $email) : bool
{
    $email = san_email($email);
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}



// validate email 
function v_url(string $url) : bool
{
    $url = trim($url);
    $url = filter_var($url,FILTER_SANITIZE_URL);
    if(filter_var($url,FILTER_VALIDATE_URL))
    {
        return true;
    }
    return false;
}


// minimum number of string
function min_val_str(string $value, int $min) : bool
{
    $value = trim($value);
    if(strlen($value) > $min)
    {
        return true;
    }
    return false;
}


// maximum number of string
function max_val_str(string $value, int $max) : bool
{
    $value = trim($value);
    if(strlen($value) < $max)
    {
        return true;
    }
    return false;
}


// chaeck if two values identecal or not
function same_val($value1,$value2) : bool
{
    $value1 = trim($value1);
    $value2 = trim($value2);
    if($value1 ===  $value2)
    {
        return true;
    }
    return false;
}

// minimum number of number
function min_val_num(float $value,float $min) : bool
{
    $value = trim($value);
    if($value > $min)
    {
        return true;
    }
    return false;
}


// maximum number of number
function max_val_num(float $value, float $max) : bool
{
    $value = trim($value);
    if($value < $max)
    {
        return true;
    }
    return false;
}


// check in array 
function in_arr($value,array $array)
{
    if(in_array($value,$array))
    {
        return true;
    }
    return false;
}

// get old val from request and put it in the input value

function old($val)
{
    global $success;
    if(isset($_REQUEST[$val]))
    {
        if($success)
        {
            echo '';
        }
        else 
        {
            echo $_REQUEST[$val];
        }
        
    }
    else 
    {
        echo '';
    }
}



