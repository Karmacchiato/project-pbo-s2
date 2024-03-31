<?php
include "koneksi.php";
session_start();

// Pengecekan level
if ($_SESSION['level'] != "dosen") {
    echo "<script language='JavaScript'>
            alert('Maaf!! Anda tidak memiliki hak akses untuk mengakses halaman ini');
            document.location='index.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <script
        src="https://kit.fontawesome.com/YOUR_KIT_ID.js"
        crossorigin="anonymous"
        ></script>
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css"
        />


        <link rel="icon" href="..//assets/img/UIS.png">
        <title>SIBITA</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRss5p9od2F7Wmea09a1KjLScS+1z3N5W5bC5D3ch" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRss5p9od2F7Wmea09a1KjLScS+1z3N5W5bC5D3ch" crossorigin="anonymous">

        <link href="css/styles.css" rel="stylesheet" />
        
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
        .sb-topnav,
        .sb-sidenav,
        .sb-sidenav-footer {
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

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            
            <a class="navbar-brand ps-3" href="dosen.php?page=beranda">
  <img id="logo_sibita" src="assets/img/sibita.png" width="100" height="40" />
</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Welcome</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dosen.php?page=beranda">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">KEGIATAN</div>
                            

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Bimbingan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dosen.php?page=dosen_list_mahasiswa">
                                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>Mahasiswa Bimbingan
                                </a>
                                
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                            <div class="sb-nav-link-icon"><i class="fas fa-microphone"></i></div>
                            Seminar Proposal
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dosen.php?page=dosen_sempro">
                                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>Seminar Proposal
                                </a>
                                
                            </nav>
                        </div>
                 </div>
            </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?php echo htmlentities($_SESSION['nama']);?> <b> </b></div>
                        <b> </b>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h3 class="mt-4"></h3>
                <?php
            if(isset($_GET['page'])){
                $page=$_GET['page'];
                switch($page) {
                    case 'beranda';
                    include "beranda.php";
                    break;
                    
                    case 'dosen_list_mahasiswa';
                    include 'dosen_list_mahasiswa.php';
                    break;

                    case 'jadwalbimbingan';
                    include 'dosen_jadwalbimbingan.php';
                    break;

                    case 'jadwalbimbingan2';
                    include 'dosen_jadwalbimbingan2.php';
                    break;

                    case 'jadwalbimbingan3';
                    include 'dosen_jadwalbimbingan3.php';
                    break;

                    case 'dosengambar';
                    include 'dosen_gambar.php';
                    break;
                    
                    case 'dosengambar2';
                    include 'dosen_gambar2.php';
                    break;

                    case 'dosengambar3';
                    include 'dosen_gambar3.php';
                    break;
                    
                    case 'pilihbimbingan';
                    include 'dosen_pilih_bimbingan.php';
                    break;

                    case 'dosen_sempro';
                    include 'dosen_sempro.php';
                    break;

                        default:
                        echo "Maaf Halaman Tidak Ditemukan";
                }
            } else {
                include "beranda.php";
            } ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FKOM 2022</div>                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
