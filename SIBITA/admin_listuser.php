<!-- (Bagian HTML) -->
<body>
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header custom-color-primary text-white">
                List User
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        <label for="searchBar">Cari NIM:</label>
                        <input type="text" id="searchBar" placeholder="Masukkan NIM..." />

                        <!-- Choicebox untuk memfilter user berdasarkan level -->
                        <label for="levelFilter">Pilih Level:</label>
                        <select id="levelFilter">
                            <option value="all">Semua</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="kaprodi">Kaprodi</option>
                        </select>
                    </div>
                    <br>
                    <a href="admin.php?page=inputmahasiswa" class="btn btn-primary"><i class='fas fa-plus'></i> Tambah Mahasiswa</a>
                    <a href="admin.php?page=inputdosen" class="btn btn-primary"><i class='fas fa-plus'></i> Tambah Dosen</a>
                    <table class="table table-bordered" id="mahasiswaTable">
                        <br>
                        <br>
                        <tr>
                            <th>NO</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tl_user");
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_user']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td>
                                    <a href="admin.php?page=adminedituser&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="admin_deleteuser.php?id_user=<?php echo $data['id_user'];?>" class="btn btn-sm btn-danger">Hapus</a>
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
        const levelFilter = document.getElementById("levelFilter");
        const mahasiswaTable = document.getElementById("mahasiswaTable");

        searchBar.addEventListener("input", filterTable);
        levelFilter.addEventListener("change", filterTable);

        function filterTable() {
            const searchText = searchBar.value.trim().toLowerCase();
            const selectedLevel = levelFilter.value;

            // Menampilkan baris yang sesuai dengan filter
            const tableRows = mahasiswaTable.getElementsByTagName("tr");
            for (let i = 1; i < tableRows.length; i++) {
                const row = tableRows[i];
                const nimCell = row.cells[1];
                const namaCell = row.cells[2];
                const levelCell = row.cells[3];

                // Cek apakah baris sesuai dengan filter
                const matchesSearch = (
                    searchText === "" ||
                    nimCell.textContent.trim().toLowerCase().includes(searchText) ||
                    namaCell.textContent.trim().toLowerCase().includes(searchText)
                );

                const matchesLevel = (
                    selectedLevel === "all" ||
                    levelCell.textContent.toLowerCase() === selectedLevel
                );

                // Menyesuaikan tampilan baris berdasarkan filter
                if (matchesSearch && matchesLevel) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
