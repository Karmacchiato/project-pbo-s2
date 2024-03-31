<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Judul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

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
                Pengajuan Judul Shift Satu
            </div>
            <div class="card-body">
            <div class="table-responsive">    
                <form action="" method="POST" class="form-item">

                <div class="form-group">
                        <label for="judul1">NIM</label>
                        <input type="text" name="id_user" class="form-control col-md-9" value="<?php echo htmlentities($_SESSION['id_user']);?>" readonly>
                    </div>

                    <div class="form-group">
                    <label for="judul1">Judul Pertama</label>
                    <textarea name="judul1" class="form-control col-md-9" placeholder="Masukkan Judul Pertama" rows="2" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="abstrak1">Abstrak Pertama</label>
                        <textarea name="abstrak1" class="form-control col-md-9" placeholder="Masukkan Abstrak Pertama" rows="7" oninput="countWords(this, 'abstrak1Counter')" required></textarea>
                        <span id="abstrak1Counter">0 kata</span>
                    </div>

                    <br>

                    <div class="form-group">
                    <label for="judul1">Judul Kedua</label>
                    <textarea name="judul2" class="form-control col-md-9" placeholder="Masukkan Judul Kedua" rows="2"required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="abstrak2">Abstrak Kedua</label>
                        <textarea name="abstrak2" class="form-control col-md-9" placeholder="Masukkan Abstrak Kedua" rows="7" oninput="countWords(this, 'abstrak2Counter')"required></textarea>
                        <span id="abstrak2Counter">0 kata</span>
                    </div>
                    <br>

                    <div class="form-group">
                    <label for="judul1">Judul Ketiga</label>
                    <textarea name="judul3" class="form-control col-md-9" placeholder="Masukkan Judul Ketiga" rows="2"required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="abstrak3">Abstrak Ketiga</label>
                        <textarea name="abstrak3" class="form-control col-md-9" placeholder="Masukkan Abstrak Ketiga" rows="7" oninput="countWords(this, 'abstrak3Counter')"required></textarea>
                        <span id="abstrak3Counter">0 kata</span>
                    </div>
                    <br>                    
                    <br>
                    <button type="submit" class="btn custom-btn-color-primary" name="submit">Kumpul</button>
                    <button type="reset" class="btn custom-btn-color-danger">Hapus</button>
                    

                </form>

            </div>
        </div>
    </div>
    </div>

    <!-- Bagian HTML -->

<script>
function countWords(input, counterId) {
    var words = input.value.split(/\s+/).filter(function(word) {
        return word.length > 0;
    });

    // Batasi jumlah kata pada abstrak menjadi 150
    var maxWords = 150;
    if (words.length > maxWords) {
        // Jika melebihi batas, tampilkan pesan peringatan
        alert("Jumlah kata melebihi batas maksimal (150 kata)!");
        words = words.slice(0, maxWords);
        input.value = words.join(" ");
    }

    var count = words.length;
    document.getElementById(counterId).innerHTML = count + (count === 1 ? ' kata' : ' kata');

    // Sesuaikan tinggi form dengan jumlah kata (misalnya, 10 kata setinggi 20px)
    var minHeight = 20;
    var height = minHeight + count * 2; // Sesuaikan faktor sesuai kebutuhan
    input.style.height = height + 'px';
}
</script>

    
</body>
</html>

<!-- Bagian PHP -->

<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $judul1 = $_POST['judul1'];
    $abstrak1 = $_POST['abstrak1'];
    $judul2 = $_POST['judul2'];
    $abstrak2 = $_POST['abstrak2'];
    $judul3 = $_POST['judul3'];
    $abstrak3 = $_POST['abstrak3'];

    // Periksa apakah jumlah kata di setiap abstrak tidak melebihi 150
    if (str_word_count($abstrak1) > 150 || str_word_count($abstrak2) > 150 || str_word_count($abstrak3) > 150) {
        echo "Jumlah kata melebihi batas maksimal (150 kata)!";
    } else {
        mysqli_query($koneksi, "INSERT INTO tl_judul (id_user, judul1, abstrak1, judul2, abstrak2, judul3, abstrak3) 
        VALUES ('$id_user','$judul1','$abstrak1','$judul2 ', '$abstrak2','$judul3','$abstrak3')") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5>Silahkan Tunggu....</h5></div>";
        echo "<script>window.location.replace('mahasiswa.php?page=mahasiswa_list_judul')</script>";
    }
}
?>
