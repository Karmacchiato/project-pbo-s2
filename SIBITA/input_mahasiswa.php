<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

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
        
        .custom-btn-color-warning {
            background-color: #FC8C14;
            color: white;
        }
        </style>
</head>

<body>
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header custom-color-primary text-white">
                Input Data Mahasiswa
            </div>
            <div class="card-body">
                <div class="table-responsive">    
                    <form action="" method="POST" class="form-item">

                        <div class="form-group">
                            <label for="id_user">NIM</label>
                            <input type="text" name="id_user" class="form-control col-md-9" placeholder="Masukkan NIM">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control col-md-9" placeholder="Masukkan Nama Mahasiswa">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control col-md-9" placeholder="Masukkan Password">
                        </div>

                        
                        
                        <br>
                        <button type="submit" class="btn custom-btn-color-primary" name="tambah">Tambah</button>
                        <button type="reset" class="btn custom-btn-color-danger">Hapus</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include "koneksi.php";

    if(isset($_POST['tambah'])){
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $password = md5($_POST['password']);


        mysqli_query($koneksi, "INSERT INTO tl_user (id_user,nama,password,level) VALUES 
        ('$id_user', '$nama',
        '$password', 'mahasiswa')") or die(mysqli_error($koneksi));

        mysqli_query($koneksi, "INSERT INTO tl_mahasiswa (id_user,nama) VALUES 
        ('$id_user', '$nama')") or die(mysqli_error($koneksi));

        mysqli_query($koneksi, "INSERT INTO tl_dospem (id_user,nama) VALUES 
        ('$id_user', '$nama')") or die(mysqli_error($koneksi));

        mysqli_query($koneksi, "INSERT INTO tl_bimbingan (id_user) VALUES 
        ('$id_user')") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('admin.php?page=inputmahasiswa')</script>";
    }

?>
