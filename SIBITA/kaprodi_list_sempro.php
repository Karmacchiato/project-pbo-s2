<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Proposal</title>
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
            Seminar Proposal
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    <a href="kaprodi.php?page=kaprodisempro" class="btn btn-primary"><i class='fas fa-plus'></i> Tambah </a>
                    <table class="table table-bordered" id="mahasiswaTable">
                    <br>
                    <br>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal Seminar Proposal</th>
                            <th>Hari Seminar Proposal</th>
                            <th>Mahasiswa</th>
                            <th>No. Ruangan</th>
                            <th>Waktu</th>
                            <th>Dosen Penguji 1</th>
                            <th>Dosen Penguji 2</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tl_sempro");
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['tanggal_sempro']; ?></td>
                                <td><?php echo $data['hari_sempro']; ?></td>
                                <td><?php echo $data['id_user']; ?></td>
                                <td><?php echo $data['ruangan']; ?></td>
                                <td><?php echo $data['waktu']; ?></td>
                                <td><?php echo $data['dosen_penguji_1']; ?></td>
                                <td><?php echo $data['dosen_penguji_2']; ?></td>
                                
                            </tr>
                            <?php $no++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mendengarkan perubahan pada elemen select
        const yearFilter = document.getElementById("yearFilter");
        const mahasiswaTable = document.getElementById("mahasiswaTable");

        yearFilter.addEventListener("change", function () {
            const selectedYear = yearFilter.value;

            // Menyembunyikan semua baris tabel
            const tableRows = mahasiswaTable.getElementsByTagName("tr");
            for (let i = 1; i < tableRows.length; i++) {
                tableRows[i].style.display = "none";
            }

            // Menampilkan baris yang sesuai dengan tahun yang dipilih
            for (let i = 1; i < tableRows.length; i++) {
                const row = tableRows[i];
                const idUserCell = row.cells[1];
                if (selectedYear === "" || idUserCell.textContent.startsWith(selectedYear)) {
                    row.style.display = "";
                }
            }
        });
    </script>
</body>
</html>
