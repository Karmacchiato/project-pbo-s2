<?php

    include "koneksi.php";
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tl_bimbingan where id_user='$id'");
    $data = mysqli_fetch_array($sql);

?>

<body>
<form method="POST" action="dosen_gambar_aksi.php" enctype="multipart/form-data">
<div class="form-group">
        <label>NIM Mahasiswa </label>
        <input type = "hidden" name="id_user" value="<?php echo $data['id_user']?>"
        class ="form-control">
        <input type="text" name="id_user" value="<?php echo $data['id_user']?>"
        class="form-control" readonly>
    </div>
    
    <div class="form-group">
        <label>Pilih Gambar (maks 2mb)</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <br>
    <input type="submit" class="btn btn-sm btn-primary" value="Tambah Gambar" name="simpan">

</form>

</body>