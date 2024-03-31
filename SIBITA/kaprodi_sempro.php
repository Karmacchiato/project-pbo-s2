<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Seminar Proposal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script>
        function updateHari() {
            var tanggalInput = document.getElementById("tanggal_sempro").value;
            var date = new Date(tanggalInput);
            var hari = date.toLocaleDateString('id-ID', { weekday: 'long' });

            document.getElementById("hari_sempro").value = hari;
        }
    </script>
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
                Jadwal Seminar Proposal
            </div>
            <div class="card-body">
            <div class="table-responsive">    
                <form action="" method="POST" class="form-item">

                    <!-- Tambahkan input untuk memilih tanggal bimbingan -->
                    <div class="form-group">
                            <label for="tanggal_sempro">Tanggal Seminar Proposal</label>
                            <input type="date" name="tanggal_sempro" id="tanggal_sempro" class="form-control col-md-9" onchange="updateHari()" required>
                        </div>

                        <!-- Tambahkan input untuk memilih hari bimbingan -->
                        <div class="form-group">
                            <label for="hari_sempro">Hari Seminar Proposal</label>
                            <input type="text" name="hari_sempro" id="hari_sempro" class="form-control col-md-9" readonly>
                        </div>

                        <div class="form-group">
                        <label for="id_user">Mahasiswa</label>
                        <select name="id_user" class="form-control col-md-9" required>
                            <option value="0">Silahkan Pilih</option>
                            <?php
                            include "koneksi.php";
                            
                            // Assuming that there is a relationship between tl_bimbingan and tl_mahasiswa based on id_user
                            $sql = mysqli_query($koneksi, "SELECT tl_bimbingan.id_user, tl_mahasiswa.nama 
                                                        FROM tl_bimbingan 
                                                        JOIN tl_mahasiswa ON tl_bimbingan.id_user = tl_mahasiswa.id_user 
                                                        WHERE tl_bimbingan.status='1'");
                                                        
                            while ($ambilData = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $ambilData['id_user']; ?>">
                                    <?php echo $ambilData['nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>


                        <div class="form-group">
                        <label for="ruangan">No. Ruangan</label>
                        <select name="ruangan" class="form-control col-md-9"required>
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

                    <div class="form-group">
                        <label for="waktu">Sesi / Waktu</label>
                        <select name="waktu" class="form-control col-md-9"required>
                            <option value="">Silahkan Pilih</value>
                            <?php
                                include "koneksi.php";
                                $sql = mysqli_query($koneksi, "SELECT  *  FROM tl_sesi");
                                WHILE ($ambilData= mysqli_fetch_array($sql)){
                            ?>  <option value="<?php echo $ambilData['waktu']; ?>"><?php
                            echo "Sesi ",$ambilData['sesi'], "   |  Jam : " ,$ambilData['waktu'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                        <div class="form-group">
                        <label for="dosen_penguji_1">Dosen Penguji 1</label>
                        <select name="dosen_penguji_1" class="form-control col-md-9"required>
                            <option value="">Silahkan Pilih</value>
                            <?php
                                include "koneksi.php";
                                $sql = mysqli_query($koneksi, "SELECT  *  FROM tl_dosen");
                                WHILE ($ambilData= mysqli_fetch_array($sql)){
                            ?>  <option value="<?php echo $ambilData['nama'];?>"><?php
                            echo $ambilData['nama']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dosen_penguji_2">Dosen Penguji 2</label>
                        <select name="dosen_penguji_2" class="form-control col-md-9"required>
                            <option value="">Silahkan Pilih</value>
                            <?php
                                include "koneksi.php";
                                $sql = mysqli_query($koneksi, "SELECT  *  FROM tl_dosen");
                                WHILE ($ambilData= mysqli_fetch_array($sql)){
                            ?>  <option value="<?php echo $ambilData['nama'];?>"><?php
                            echo $ambilData['nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                        </div>
                    <br>                    
                    <br>
                    <button type="submit" class="btn custom-btn-color-primary" name="submit">Selesai</button>
                    <button type="reset" class="btn custom-btn-color-danger">Hapus</button>
                    

                </form>

            </div>
        </div>
    </div>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $tanggal_sempro = $_POST['tanggal_sempro'];
    $hari_sempro = $_POST['hari_sempro'];
    $id_user = $_POST['id_user'];
    $ruangan = $_POST['ruangan'];
    $waktu = $_POST['waktu'];
    $dosen_penguji_1 = $_POST['dosen_penguji_1'];
    $dosen_penguji_2 = $_POST['dosen_penguji_2'];

    mysqli_query($koneksi, "INSERT INTO tl_sempro (tanggal_sempro, hari_sempro,id_user, ruangan,waktu,dosen_penguji_1,dosen_penguji_2) 
    VALUES ('$tanggal_sempro','$hari_sempro','$id_user','$ruangan','$waktu','$dosen_penguji_1','$dosen_penguji_2')") or die(mysqli_error($koneksi));

    echo "<div align='center'><h5>Tunggu......</h5></div>";
    echo "<script>window.location.replace('kaprodi.php?page=kaprodi_list_sempro')</script>";
}
?>

