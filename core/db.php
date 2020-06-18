<?php 


define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB_NAME","php_medical");

// Create connection
$conn = new mysqli(HOST, USER, PASS,DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


/**
 * 
 * get all data from table 
 * @param string $table - > name of table in database
 * @return array
 */
function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM {$table} ";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        return (object) $result->fetch_all(MYSQLI_ASSOC);
    }
    else 
    {
        return [];
    }

}

/**
 * 
 * get all data from table where condition
 * @param string $table - > name of table in database
 * @param string $where - > condition to get data from table
 * @return array
 */
function getWhere(string $table,string $where)
{
    global $conn;
    $query = "SELECT * FROM {$table} {$where} ";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        return (object) $result->fetch_all(MYSQLI_ASSOC);
    }
    else 
    {
        return [];
    }

}


/**
 * 
 * get all one record from table where condition 
 * @param string $table - > name of table in database
 * @param string $where - > condition to get data from table
 * @return array
 */
function getOne(string $table,string $where)
{
    global $conn;
    $query = "SELECT * FROM {$table} {$where}";
    $result = $conn->query($query);
    if($conn->affected_rows > 0)
    {
        return $result->fetch_assoc();
    }
    else 
    {
        return [];
    }

}


/**
 * insert data into table 
 * @param string $table  => name of table 
 * @param array $data => data will be insert into table 
 * @return bool
 */
function insertData(string $table,array $data)
{
    global $conn;
    $fileds = '';
    $values = '';

    foreach($data as $f => $v)
    {
        $fileds .="`$f`,";
        $values .="'$v',";
    }
   
    // remove ,
    $fileds = substr($fileds,0,-1);
    $values = substr($values,0,-1);

    $query = " INSERT INTO `$table`({$fileds}) VALUES ({$values}) ";
    $result = $conn->query($query);
    if($this->conn->affected_rows > 0)
    {
        return true;
    }
    else 
    {
        get_error();
    }
}


/**
 * update data into table 
 * @param string $table  => name of table 
 * @param array $data => data will be insert into table 
 * @param string $where => condition to edit data
 * @return bool
 */

function updateData(string $table,array $data,string $where)
{
    global $conn;
    $q = '';

    foreach($data as $f => $v)
    {
        $q .=" `$f` = '{$v}',";
    }
   
    // remove ,
    $q = substr($q,0,-1);

    $query = "UPDATE `$table` SET {$q}  {$where} ";
    $result = $conn->query($query);
    if($result)
    {
        return true;
    }
    else 
    {
        get_error();
    }
}



function getCount($table,$where='')
{
    global $conn;
    $query = "SELECT * FROM {$table} {$where} ";
    $result = $conn->query($query);
    if($conn->affected_rows > 0)
    {
        return $result->num_rows;
    }
    else 
    {
        get_error();
    }
    

}


// delete recored 
function deleteRecord($table,$where)
{
    global $conn;
    $query = "DELETE FROM {$table} {$where} ";
    $result = $conn->query($query);
    if($conn->affected_rows > 0)
    {
        return true;
    }
    else 
    {
        get_error();
    }
}



// type error that happen in query 
function get_error()
{
    global $conn;
    return die("Error Occurre : ".$conn->error);
}

// type counter when loop  throgh data 
function type_count()
{
    static $count=1;
    echo $count;
    $count++;

}