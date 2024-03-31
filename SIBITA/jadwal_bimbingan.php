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
    <title>Jadwal Bimbingan</title>
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
                    
                        <tr>
                            <th>NO</th>
                            <th></th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Ruangan</th>
                        
                        </tr>
                    
                        <?php
                            include "koneksi.php";
                            $no = 1;
                            $tampil = mysqli_query($koneksi,"SELECT * FROM tl_bimbingan where id_user = '$id'");
                            while($data = mysqli_fetch_array($tampil)){{{
                                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo "Bimbingan Pertama"?></td>
                            <td><?php echo $data['tanggal_bimbingan']; ?></td>
                            <td><?php echo $data['hari_bimbingan']; ?></td>
                            <td><?php echo $data['ruangan']; ?></td>
                            
                            
                        </tr>
                        <?php $no++; } ?> 
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo "Bimbingan Kedua"?></td>
                            <td><?php echo $data['tanggal_bimbingan2']; ?></td>
                            <td><?php echo $data['hari_bimbingan2']; ?></td>
                            <td><?php echo $data['ruangan2']; ?></td>
                            
                            
                        </tr>
                        <?php $no++; } ?> 
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo "Bimbingan Ketiga"?></td>
                            <td><?php echo $data['tanggal_bimbingan3']; ?></td>
                            <td><?php echo $data['hari_bimbingan3']; ?></td>
                            <td><?php echo $data['ruangan3']; ?></td>
                            
                            
                        </tr>
                            <?php $no++; } ?>     
                </table>

            </div>
        </div>
    </div>
</body>
</html>

