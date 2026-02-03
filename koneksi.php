<?php
session_start();

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$koneksi = mysqli_connect("localhost", "root", "", "db_perpusdigital");

// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>