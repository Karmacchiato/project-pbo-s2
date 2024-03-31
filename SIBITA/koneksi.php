<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "sibita";

$koneksi = mysqli_connect($host, $user,$password,$database);

if (!$koneksi){
    die("GAGAL TERHUBUNG KE DATABASE" . mysqli_connect_error());
}

