<?php
session_start();
include "koneksi.php";

$id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM tl_user WHERE id_user='$id_user' AND password='$password'");

$cekdata = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);

if ($cekdata > 0) {
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['nama'] = $data['nama'];

    if ($data['level'] == "mahasiswa") {
        header("Location: mahasiswa.php");
    } elseif ($data['level'] == "kaprodi") {
        header("Location: kaprodi.php");
    } elseif ($data['level'] == "dosen") {
        header("Location: dosen.php");
    } elseif ($data['level'] == "admin") {
        header("Location: admin.php");
    }
} else {
    // Redirect to index.php with an error message
    header("Location: index.php?error=1");
}
?>
