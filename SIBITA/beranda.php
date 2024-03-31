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
            Pengumuman
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    
                    <table class="table table-bordered" id="mahasiswaTable">
                    
                        <tr>
                            
                            <th>Pengumuman</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                       
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tl_pengumuman");
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                
                                <td><?php echo $data['pengumuman']; ?></td>
                                
                            </tr>
                            <?php
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
