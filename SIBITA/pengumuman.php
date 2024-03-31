<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengumuman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    
    <!-- Harus dicopy terus -->
    <style>
        .sb-topnav,
        .sb-sidenav {
            background-color: #020B1F !important;
        }

        .sb-topnav a.navbar-brand{
            color: #FFFFFF !important;
        }

            .sb-sidenav a.nav-link {
            color: #8F9499 !important; /* Warna teks */
        }


        .sb-sidenav a.nav-link:hover {
            color: #ffffff !important; /* Warna teks saat hover untuk elemen .nav-link di sidenav */
        }

        .sb-topnav .nav-link.dropdown-toggle::after {
            color: #ffffff !important; /* Warna ikon panah dropdown */
        }

        .sb-topnav .navbar-toggler-icon,
        .sb-sidenav .navbar-toggler-icon {
            background-color: #ffffff !important; /* Warna ikon toggler */
        }

        .custom-color-primary {
            background-color: #1177D1;
            color: white;
        }

        .custom-btn-color-primary {
            background-color: #00AFF4;
            color: white;
        }

        .custom-btn-color-danger {
            background-color: #FC2828;
            color: white;
        }

        #abstrak1Counter,#abstrak2Counter,#abstrak3Counter {
            float: right;
        }
        </style>

</head>
<body>
    <div class="container col-md-10">
        <div class="card">
        <div class="card-header custom-color-primary">
                PENGUMUMAN
            </div>
            <div class="card-body">
            <div class="table-responsive">    
                <form action="" method="POST" class="form-item">

                    <!-- Tambahkan input untuk memilih tanggal bimbingan -->
                    <div class="form-group">
                            <label for="pengumuman">Isi Pengumuman</label>
                            <input type="text" name="pengumuman" class="form-control col-md-9">
                        </div>
                    <br>
                        <button type="submit" class="btn custom-btn-color-primary" name="submit">Kumpul</button>

                </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $pengumuman = $_POST['pengumuman'];
    
    mysqli_query($koneksi, "INSERT INTO tl_pengumuman (pengumuman) 
    VALUES ('$pengumuman')") or die(mysqli_error($koneksi));

    echo "<div align='center'><h5>Tunggu.....</h5></div>";
    echo "<script>window.location.replace('kaprodi.php?page=beranda')</script>";
}
?>

