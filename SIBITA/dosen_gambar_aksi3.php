<html>
    <head>
        <title>Notice..</title>
    </head>
    <style>
        body {background: linear-gradient(90deg, #4b6cb7, #182848);}
    </style>

<?php
    if(isset($_POST['simpan'])){
        $id = $_POST['id_user'];
        include "koneksi.php";
        $rand = rand();
        $ekstensi = array('png','jpg','jpeg','gif','pdf');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array($ukuran, $ekstensi)){
            echo "gagal menyimpan gambar";
    } else {
        if($ukuran < 1044070){
            $ft = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'],'gambar/'.$rand.'_'.$filename);
            mysqli_query($koneksi,"UPDATE tl_bimbingan SET hasil_foto3='$ft' where id_user = '$id'");
            echo"<h1>Berhasil menyimpan gambar</h1>";
            
            echo "<script>window.location.replace('dosen.php?page=dosen_list_mahasiswa')</script>";
        } else {
            echo "ukuran terlalu besar";
            ;
        }
    }
    }

?>
</html>