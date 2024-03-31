<?php
    include "koneksi.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM tl_dospem WHERE id_user=$id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan");
    }

    // Query untuk mengambil data Dosen Pembimbing dari tabel tl_dosen
    $queryDosen = "SELECT nama FROM tl_dosen";
    $resultDosen = mysqli_query($koneksi, $queryDosen);

    // Simpan data Dosen Pembimbing dalam array
    $dosenOptions = array();
    while ($row = mysqli_fetch_assoc($resultDosen)) {
        $dosenOptions[] = $row['nama'];
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Jadwal Pembimbing</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <script>
        function updateHari() {
            var tanggalInput = document.getElementById("tanggal_bimbingan2").value;
            var date = new Date(tanggalInput);
            var hari = date.toLocaleDateString('id-ID', { weekday: 'long' });

            document.getElementById("hari_bimbingan2").value = hari;
        }
    </script>

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
                Jadwal Bimbingan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="POST" class="form-item">
                        <div class="form-group">
                            <label for="id_user">NIM</label>
                            <input type="text" name="id_user" value="<?php echo $data['id_user'] ?>" class="form-control col-md-9" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control col-md-9" readonly>
                        </div>

                        <!-- Tambahkan input untuk memilih tanggal bimbingan -->
                        <div class="form-group">
                            <label for="tanggal_bimbingan2">Tanggal Bimbingan</label>
                            <input type="date" name="tanggal_bimbingan2" id="tanggal_bimbingan2" class="form-control col-md-9" onchange="updateHari()">
                        </div>

                        <!-- Tambahkan input untuk memilih hari bimbingan -->
                        <div class="form-group">
                            <label for="hari_bimbingan2">Hari Bimbingan</label>
                            <input type="text" name="hari_bimbingan2" id="hari_bimbingan2" class="form-control col-md-9" readonly>
                        </div>

                        <div class="form-group">
                        <label for="ruangan2">No. Ruangan</label>
                        <select name="ruangan2" class="form-control col-md-9"required>
                            <option value="">Silahkan Pilih</value>
                            <?php
                                include "koneksi.php";
                                $sql = mysqli_query($koneksi, "SELECT  *  FROM tl_ruangan");
                                WHILE ($ambilData= mysqli_fetch_array($sql)){
                            ?>  <option value="<?php echo $ambilData['ruangan'];?>"><?php
                            echo $ambilData['ruangan']?></option>
                            <?php } ?>
                        </select>
                        </div>

                        <br>
                        <button type="submit" class="btn custom-btn-color-primary" name="submit">Simpan</button>
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

if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $tanggal_bimbingan2 = $_POST['tanggal_bimbingan2'];
    $hari_bimbingan2 = $_POST['hari_bimbingan2'];
    $ruangan2 = $_POST['ruangan2'];

    $sql = "UPDATE tl_bimbingan SET tanggal_bimbingan2='$tanggal_bimbingan2', hari_bimbingan2='$hari_bimbingan2', ruangan2='$ruangan2' WHERE id_user='$id_user'";

    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

    echo "<div align='center'><h5>Tunggu.....</h5></div>";
    echo "<script>window.location.replace('dosen.php?page=dosen_list_mahasiswa')</script>";
}
?>
