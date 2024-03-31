<?php
    include "koneksi.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM tl_judul WHERE id_user=$id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan");
    }

    // Query untuk mengambil data Dosen Pembimbing dari tabel tl_dosen
    $queryDosen = "SELECT id_user FROM tl_judul";
    $resultDosen = mysqli_query($koneksi, $queryDosen);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Komentar</title>
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
                Komentar
            </div>
            <div class="card-body">
            <div class="table-responsive">    
                <form action="" method="POST" class="form-item">

                    <!-- Tambahkan input untuk memilih tanggal bimbingan -->
                    <div class="form-group">
                            <label for="komen1">Komentar Judul Pertama</label>
                            <input type="text" name="komen1" class="form-control col-md-9" value="<?php echo $data['komen1'] ?>"disabled>
                        </div>

                        <div class="form-group">
                            <label for="komen2">Komentar Judul Kedua</label>
                            <input type="text" name="komen2" class="form-control col-md-9" value="<?php echo $data['komen2'] ?>"disabled>
                        </div>

                        <div class="form-group">
                            <label for="komen3">Komentar Judul Ketiga</label>
                            <input type="text" name="komen3" class="form-control col-md-9" value="<?php echo $data['komen3'] ?>" disabled>
                        </div>
                    <br>
                        

                </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $komen = $_POST['komen'];
    
    mysqli_query($koneksi, "UPDATE tl_dospem SET komen='$komen' WHERE id_user='$id'") or die(mysqli_error($koneksi));


    echo "<div align='center'><h5>Tunggu.....</h5></div>";
    echo "<script>window.location.replace('mahasiswa.php?page=dosenpembimbing')</script>";
}
?>

