<?php
    include "koneksi.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM tl_bimbingan WHERE id_user=$id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan");
    }

    // Query untuk mengambil data Dosen Pembimbing dari tabel tl_dosen
    $queryDosen = "SELECT id_user FROM tl_bimbingan";
    $resultDosen = mysqli_query($koneksi, $queryDosen);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal Bimbingan Bimbingan</title>
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
                Jadwal Bimbingan
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <br>
                <br>
                <table class="table table-bordered">
                <form method="post">
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Pilih Tanggal</th>
                            <th>Foto Kegiatan</th>
                        
                        </tr>
                    
                        <?php
                            include "koneksi.php";
                            $no = 1;
                            $tampil = mysqli_query($koneksi,"SELECT * FROM tl_bimbingan where id_user = '$id'");
                            while($data = mysqli_fetch_array($tampil)){{{
                                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['tanggal_bimbingan']; ?></td>
                            <td><?php echo $data['hari_bimbingan']; ?></td>
                            <td><a href="dosen.php?page=jadwalbimbingan&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-calendar"></i></a></td>
                            <td><a href="dosen.php?page=dosengambar&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-plus"></i></a></td>
                            
                        </tr>
                        <?php $no++; } ?> 
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['tanggal_bimbingan2']; ?></td>
                            <td><?php echo $data['hari_bimbingan2']; ?></td>
                            <td><a href="dosen.php?page=jadwalbimbingan2&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-calendar"></i></a></td>
                            <td><a href="dosen.php?page=dosengambar2&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-plus"></i></a></td>
                            
                        </tr>
                        <?php $no++; } ?> 
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['tanggal_bimbingan3']; ?></td>
                            <td><?php echo $data['hari_bimbingan3']; ?></td>
                            <td><a href="dosen.php?page=jadwalbimbingan3&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-calendar"></i></a></td>
                            <td><a href="dosen.php?page=dosengambar3&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning"><i class="fa fa-plus"></i></a></td>
                            
                        </tr>
                            <?php $no++; } ?>   
                            
                        
                </table>
                <button type="submit" class="btn custom-btn-color-primary" name="status">Verifikasi</button>
                            </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['status'])){
        

        mysqli_query($koneksi, "UPDATE tl_bimbingan SET 
        status='1'
        WHERE id_user='$id'") or die(mysqli_error($koneksi));
    

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('dosen.php?page=dosen_list_mahasiswa')</script>";
    }

    ?>