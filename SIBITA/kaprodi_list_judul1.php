<!-- (Bagian HTML) -->
<body>
    <div class="container col-md-10">
        <div class="card">
            <!-- Bagian lain dari card... -->

            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        <!-- Input untuk pencarian NIM -->
                        <label for="searchBar">Cari NIM:</label>
                        <input type="text" id="searchBar" placeholder="Masukkan NIM..." />

                        <!-- Dropdown untuk memilih tahun ajaran -->
                        <label for="yearFilter">Tahun Ajaran:</label>
                        <select id="yearFilter">
                            <!-- Pilihan untuk semua tahun -->
                            <option value="">Semua</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <!-- Tambahkan opsi tahun lainnya jika diperlukan -->
                        </select>

                        <!-- Choicebox untuk memfilter judul -->
                        <label for="verificationChoice">Status Verifikasi:</label>
                        <select id="verificationChoice">
                            <option value="all">Semua</option>
                            <option value="verified">Terverifikasi</option>
                            <option value="unverified">Belum Terverifikasi</option>
                        </select>
                    </div>
                    <br>

                    <!-- Tabel judul mahasiswa -->
                    <table class="table table-bordered" id="mahasiswaTable">
                        <!-- Struktur tabel (thead) -->
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Judul 1</th>
                            <th>Aksi</th>
                            <th>Status Judul</th>
                        </tr>

                        <!-- Loop untuk menampilkan data judul -->
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tl_judul");
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <!-- Isi kolom tabel -->
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_user']; ?></td>
                                <td><?php echo $data['judul1']; ?></td>
                                <td>
                                    <!-- Tombol aksi (Proses Judul) -->
                                    <a href="kaprodi.php?page=cekjudul&id=<?php echo $data['id_user']; ?>" class="btn btn-sm custom-btn-color-warning">Proses Judul</a>
                                </td>
                                <td>
                                    <!-- Tampilkan status judul dengan warna sesuai status -->
                                    <?php
                                    if ($data['status'] == '1') {
                                        echo '<span style="color: #8CBA0E;"><b>Judul Terverifikasi</b></span>';
                                    } else {
                                        echo '<span style="color: #FC8C14;"><b>Judul belum terverifikasi</b></span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php $no++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

   <!-- (Bagian JavaScript) -->
<script>
    // Mendengarkan perubahan pada elemen input dan choicebox
    const searchBar = document.getElementById("searchBar");
    const yearFilter = document.getElementById("yearFilter");
    const verificationChoice = document.getElementById("verificationChoice");
    const mahasiswaTable = document.getElementById("mahasiswaTable");

    searchBar.addEventListener("input", filterTable);
    yearFilter.addEventListener("change", filterTable);
    verificationChoice.addEventListener("change", filterTable);

    function filterTable() {
        const searchText = searchBar.value.trim().toLowerCase();
        const selectedYear = yearFilter.value;
        const selectedChoice = verificationChoice.value;

        // Menampilkan baris yang sesuai dengan filter
        const tableRows = mahasiswaTable.getElementsByTagName("tr");
        for (let i = 1; i < tableRows.length; i++) {
            const row = tableRows[i];
            const nimCell = row.cells[1];
            const namaCell = row.cells[2];
            const statusCell = row.cells[4];

            // Cek apakah baris sesuai dengan filter
            const matchesSearch = (
                searchText === "" ||
                nimCell.textContent.trim().toLowerCase().includes(searchText) ||
                namaCell.textContent.trim().toLowerCase().includes(searchText)
            );

            const matchesYear = (
                selectedYear === "" ||
                nimCell.textContent.startsWith(selectedYear)
            );

            const matchesStatus = (
                // Jika selectedChoice "all", tampilkan semua status
                selectedChoice === "all" ||
                // Jika selectedChoice "verified", tampilkan hanya status 1 (terverifikasi)
                (selectedChoice === "verified" && statusCell.textContent.includes("Terverifikasi")) ||
                // Jika selectedChoice "unverified", tampilkan hanya status 0 (belum terverifikasi)
                (selectedChoice === "unverified" && statusCell.textContent.includes("belum terverifikasi"))
            );

            // Menyesuaikan tampilan baris berdasarkan filter
            if (matchesSearch && matchesYear && matchesStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
</script>

</body>
</html>
