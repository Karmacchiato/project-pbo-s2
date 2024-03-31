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
    <title>Hasil Bimbingan</title>
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

        .popup-img-container {
            display: none;
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 999;
            transition: all 0.3s ease-in-out;
        }

        .popup-img-container:hover {
            opacity: 1;
        }

        .popup-img-container img {
            width: 500px; /* Set the width to 100% to fill the container */
            height: 250px; /* Maintain the aspect ratio */
        }

        .img img,
        .img2 img,
        .img3 img {
    display: block; /* Pastikan elemen img memiliki display block */
    max-width: 100%; /* Lebar maksimum gambar adalah 100% dari lebar wadah */
    height: auto !important;  /* Menjaga rasio aspek gambar */ 
}
    </style>
</head>

<body>
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header custom-color-primary text-white">
                Hasil Bimbingan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Ruangan</th>
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
                                <td><?php echo $data['ruangan']; ?></td>
                                <td style="position: relative;">
                                    <?php echo "<img src='gambar/{$data['hasil_foto']}' width='50px' height='25px'>"?>
                                    <div class="img tooltip" style="position: absolute; top: 0; left: 0;">
                                        <?php echo "<img src='gambar/{$data['hasil_foto']}' width='50px' height='25px'>"?>
                                        <div class="popup-img-container" style="position: absolute; top: 0; left: 0;">
                                            <?php echo "<img src='gambar/{$data['hasil_foto']}' alt='Foto Kegiatan'>"?>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php $no++; } ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['tanggal_bimbingan2']; ?></td>
                            <td><?php echo $data['hari_bimbingan2']; ?></td>
                            <td><?php echo $data['ruangan2']; ?></td>
                            <td style="position: relative;">
                                    <?php echo "<img src='gambar/{$data['hasil_foto2']}' width='50px' height='25px'>"?>
                                    <div class="img tooltip" style="position: absolute; top: 0; left: 0;">
                                        <?php echo "<img src='gambar/{$data['hasil_foto2']}' width='50px' height='25px'>"?>
                                        <div class="popup-img-container" style="position: absolute; top: 0; left: 0;">
                                            <?php echo "<img src='gambar/{$data['hasil_foto2']}' alt='Foto Kegiatan'>"?>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        <?php $no++; } ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['tanggal_bimbingan3']; ?></td>
                            <td><?php echo $data['hari_bimbingan3']; ?></td>
                            <td><?php echo $data['ruangan3']; ?></td>
                            <td style="position: relative;">
                                    <?php echo "<img src='gambar/{$data['hasil_foto3']}' width='50px' height='25px'>"?>
                                    <div class="img tooltip" style="position: absolute; top: 0; left: 0;">
                                        <?php echo "<img src='gambar/{$data['hasil_foto3']}' width='50px' height='25px'>"?>
                                        <div class="popup-img-container" style="position: absolute; top: 0; left: 0;">
                                            <?php echo "<img src='gambar/{$data['hasil_foto3']}' alt='Foto Kegiatan'>"?>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        <?php $no++; } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
       <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cardBioImg = document.querySelectorAll('.img.tooltip, .img2.tooltip, .img3.tooltip');

        cardBioImg.forEach(function (imgContainer) {
            const popupImgContainer = document.createElement('div');
            popupImgContainer.classList.add('popup-img-container');
            document.body.appendChild(popupImgContainer);

            imgContainer.addEventListener('mouseenter', function () {
                const imgUrl = this.querySelector('img').src;
                const popupImg = document.createElement('img');
                popupImg.src = imgUrl;
                popupImg.alt = 'Foto Kegiatan';
                popupImgContainer.innerHTML = '';
                popupImgContainer.appendChild(popupImg);
                popupImgContainer.style.display = 'block';
            });

            imgContainer.addEventListener('mouseleave', function () {
                popupImgContainer.style.display = 'none';
            });
        });
    });
</script>


    
</body>
</html>
