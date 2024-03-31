<?php
    include "koneksi.php";
    
$id = $_GET['id'];
$sql = "SELECT * FROM tl_user WHERE id_user=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
if(mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan");
}
?>


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
                            <label for="id_user">NIM/NIDN</label>
                            <input type="text" name="id_user" class="form-control col-md-9" value="<?php echo $data['id_user'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa/Dosen</label>
                            <input type="text" name="nama" class="form-control col-md-9" value="<?php echo $data['nama'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="" class="form-control col-md-9" value="<?php echo $data['password'] ?> "disabled>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control col-md-9" placeholder="Masukkan password baru">
                        </div>

                        
                        
                        <br>
                        <button type="submit" class="btn custom-btn-color-primary" name="tambah">Simpan</button>
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
        
        $password = md5($_POST['password']);
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        


        mysqli_query($koneksi, "UPDATE tl_user 
        SET   password='$password',
        nama='$nama' WHERE id_user='$id'") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('admin.php?page=adminlistuser')</script>";
    }

?>