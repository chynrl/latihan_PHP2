<?php
$hostname = 'localhost';
$user = 'root';
$password= '';
$db_name = 'db_warga';

// Global variable connection
$connection = mysqli_connect($hostname, $user, $password, $db_name);

//var_dump($connection)

function myquery($query){
    global $connection;
    $res = mysqli_query($connection, $query);
    $return = [];

    while($data = mysqli_fetch_assoc($res)){
        $return[] = $data;
    }

    return $return;
}


//mengambil data (fecthing)
//mysqli_fecth_row()
//mysqli_fecth_assoc()
//mysqli_fecth_array() : untuk data double
//mysqli_fecth_object()

?>