<?php
    include "koneksi.php";
    $id = $_GET['id_user'];
    $ambilData = mysqli_query($koneksi, "DELETE  FROM tl_user WHERE id_user='$id'");
    echo "<script>window.location.replace('admin.php?page=adminlistuser')</script>";
    ?>