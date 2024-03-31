<?php
    include "koneksi.php";
    
        $id = $_GET['id'];
        $sql = "SELECT * FROM tl_judul WHERE id_user=$id";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Judul</title>
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
                Pengajuan Judul Mahasiswa
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <form action="" method="POST" class="form-item">

                    <div class="form-group">
                        <label for="judul1">Judul Pertama</label>
                        <input type="text" name="judul1" value="<?php echo $data['judul1'] ?>" class="form-control col-md-9" placeholder="Masukkan Judul Pertama" readonly>
                    </div>

                    <div class="form-group">
                        <label for="abstrak1">Abstrak Pertama</label>
                        <input type="text" name="abstrak1" value="<?php echo $data['abstrak1'] ?>" class="form-control col-md-9" placeholder="Masukkan Abstrak Pertama" readonly>
                    </div>

                    <div class="form-group">
                        <label for="komen1">Komen Pertama</label>
                        <input type="text" name="komen1" value="<?php echo $data['komen1'] ?>" class="form-control col-md-9" placeholder="Masukkan Komen Pertama">
                    </div>

                    <div class="form-group">
                        <label for="judul2">Judul Kedua</label>
                        <input type="text" name="judul2" value="<?php echo $data['judul2'] ?>" class="form-control col-md-9" placeholder="Masukkan Judul Kedua" readonly>
                    </div>

                    <div class="form-group">
                        <label for="abstrak2">Abstrak Kedua</label>
                        <input type="text" name="abstrak2" value="<?php echo $data['abstrak2'] ?>" class="form-control col-md-9" placeholder="Masukkan Abstrak Kedua" readonly>
                    </div>

                    
                    <div class="form-group">
                        <label for="komen2">Komen Kedua</label>
                        <input type="text" name="komen2" value="<?php echo $data['komen2'] ?>" class="form-control col-md-9" placeholder="Masukkan Komen Kedua">
                    </div>

                    <div class="form-group">
                        <label for="judul3">Judul Ketiga</label>
                        <input type="text" name="judul3" value="<?php echo $data['judul3'] ?>" class="form-control col-md-9" placeholder="Masukkan Judul Ketiga" readonly>
                    </div>

                    <div class="form-group">
                        <label for="abstrak3">Abstrak Ketiga</label>
                        <input type="text" name="abstrak3" value="<?php echo $data['abstrak3'] ?>" class="form-control col-md-9" placeholder="Masukkan Abstrak Ketiga" readonly>
                    </div>

                    
                    <div class="form-group">
                        <label for="komen3">Komen Ketiga</label>
                        <input type="text" name="komen3" value="<?php echo $data['komen3'] ?>" class="form-control col-md-9" placeholder="Masukkan Komen Ketiga">
                    </div>

                    <br>
                    <button type="submit" class="btn custom-btn-color-primary" name="submit">Simpan</button>
                    <button type="reset" class="btn custom-btn-color-danger">Hapus  </button>
                    <button type="submit" class="btn custom-btn-color-primary" name="status">Verifikasi</button>


                    </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){
        $judul1 = $_POST['judul1'];
        $abstrak1 = $_POST['abstrak1'];
        $komen1 = $_POST['komen1'];
        $judul2 = $_POST['judul2'];
        $abstrak2 = $_POST['abstrak2'];
        $komen2 = $_POST['komen2'];
        $judul3 = $_POST['judul3'];
        $abstrak3 = $_POST['abstrak3'];
        $komen3 = $_POST['komen3'];


        mysqli_query($koneksi, "UPDATE tl_judul SET 
        judul1='$judul1', abstrak1='$abstrak1', komen1='$komen1',
        judul2='$judul2', abstrak2='$abstrak2', komen2='$komen2',
        judul3='$judul3', abstrak3='$abstrak3', komen3='$komen3'
        WHERE id_user='$id'") or die(mysqli_error($koneksi));
    

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('kaprodi.php?page=kaprodilistjudul1')</script>";
    }

    if(isset($_POST['status'])){
        

        mysqli_query($koneksi, "UPDATE tl_judul SET 
        status='1'
        WHERE id_user='$id'") or die(mysqli_error($koneksi));
    

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('kaprodi.php?page=kaprodilistjudul1')</script>";
    }

?>