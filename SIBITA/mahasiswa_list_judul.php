<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Bagian head ... -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mahasiswa</title>
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
                List Judul
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mahasiswaTable">
                        
                        <tr>
                            <th>Shift</th>
                            <th>Judul Pertama</th>
                            <th>Judul Kedua</th>
                            <th>Judul Ketiga</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        <?php
                        include "koneksi.php";

                        // Periksa apakah pengguna sudah login
                        if (!isset($_SESSION['id_user'])) {
                            // Redirect atau tangani kasus ketika pengguna belum login
                            header("Location: login.php");
                            exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
                        }

                        // Ambil id_user dari sesi
                        $id_user = $_SESSION['id_user'];
                        $nama = $_SESSION['nama'];

                        include "koneksi.php";

                        $no = 1;
                        // Ubah query SQL untuk mengambil data dan filter dosen pembimbing
                        $tampil = mysqli_query($koneksi, "SELECT *
                        FROM tl_judul
                        WHERE tl_judul.id_user = '$id_user';
                        ");
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <!-- ... Baris data judul ... -->
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['judul1']; ?></td>
                                <td><?php echo $data['judul2']; ?></td>
                                <td><?php echo $data['judul3']; ?></td>
                                <td><?php
                                    if ($data['status'] == '1') {
                                        echo '<span style="color: #8CBA0E;"><b>Judul Terverifikasi</b></span>';
                                    } else {
                                        echo '<span style="color: #FC8C14;"><b>Judul belum terverifikasi</b></span>';
                                    }
                                    ?></td>
                                <td><a href="mahasiswa.php?page=lihatkomen&id=<?php echo $data['id_user']; ?>"
                                       class="btn btn-sm custom-btn-color-warning" ><i class="fas fa-comment"></i></a></td>


                            </tr>
                            <?php $no++;
                        }

                        // Tambahkan kondisi untuk menentukan apakah tombol "Tambah Judul" harus ditampilkan
                        $queryStatus = mysqli_query($koneksi, "SELECT status FROM tl_judul WHERE id_user = '$id_user'");
                        $dataStatus = mysqli_fetch_assoc($queryStatus);
                        $status = $dataStatus['status'];

                        if ($status != 1) {
                            echo '<a href="mahasiswa.php?page=pengajuanjudul1" class="btn custom-btn-color-primary"><i class="fas fa-plus"></i> Tambah Judul</a><br>';
                        }
                        
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mendengarkan perubahan pada elemen input
        const searchBar = document.getElementById("searchBar");
        const mahasiswaTable = document.getElementById("mahasiswaTable");

        searchBar.addEventListener("input", function () {
            const searchText = searchBar.value.trim().toLowerCase();

            // Menampilkan baris yang sesuai dengan pencarian
            const tableRows = mahasiswaTable.getElementsByTagName("tr");
            for (let i = 1; i < tableRows.length; i++) {
                const row = tableRows[i];
                const nimCell = row.cells[1];
                const namaCell = row.cells[2];

                // Cek apakah pencarian sesuai dengan NIM atau nama
                if (
                    searchText === "" ||
                    nimCell.textContent.trim().toLowerCase().includes(searchText) ||
                    namaCell.textContent.trim().toLowerCase().includes(searchText)
                ) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
    </script>
</body>
</html>
