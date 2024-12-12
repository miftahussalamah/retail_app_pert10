<div class="border-bottom d-flex justify-content-between py-3">
    <h4>Data Barang</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="bi bi-plus"></i>Tambah Barang</button>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="modul/barang/proses.php?aksi=tambah" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="pemasok">Nama Pemasok</label>
                            <select class="form-select" name="pemasok" required>
                                <option value="" disabled selected>Pilih Pemasok</option>
                                <?php
                                $sql_pemasok = "SELECT * FROM pemasok WHERE status=1";
                                $result_pemasok = $mysqli->query($sql_pemasok);
                                while($row_pemasok = $result_pemasok->fetch_assoc()){
                                ?>
                                        <option value="><?= $row_pemasok['id_pemasok'];?>"><?= $row_pemasok
                                        ['nama_pemasok'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_barang">Nama Barang</label>
                            <input class="form-control" type="text" name="nama_barang" placeholder="Contoh : Pensil" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="merk">Merk</label>
                            <input class="form-control" type="text" name="merk" placeholder="Contoh : ABC" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ukuran">Ukuran</label>
                            <input class="form-control" type="text" name="ukuran" placeholder="Contoh : Sedang" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="satuan">Satuan</label>
                            <input class="form-control" type="text" name="satuan" placeholder="Contoh : Pcs" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kategori">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php
                                $sql_kategori = "SELECT * FROM kategori WHERE status=1";
                                $result_kategori = $mysqli->query($sql_kategori);
                                while($row_kategori = $result_kategori->fetch_assoc()){
                                ?>
                                    <option value="><?= $row_kategori['id_kategori'];?>"><?= $row_kategori
                                    ['nama_kategori'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga_beli">Harga Beli</label>
                            <input class="form-control" type="number" name="harga_beli" placeholder="Contoh : 5000" required>
                        </div>
                         <div class="mb-3">
                            <label class="form-label" for="harga_jual">Harga Jual</label>
                            <input class="form-control" type="number" name="harga_jual" placeholder="Contoh : 7000" required>
                        </div>
                         <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <input class="form-control" type="text" name="deskripsi" placeholder="Contoh : Barang Baru" required>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<table id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Pemasok</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Ukuran</th>
            <th>Satuan</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_pemasok = "SELECT * FROM pemasok ORDER BY id_pemasok ASC";
            $result_pemasok = $mysqli->query($sql_pemasok);
            $no = 0;
            while ($row_pemasok = $result_pemasok->fetch_assoc()) {
                $no++;
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row_pemasok['nama_pemasok']; ?></td>
                <td><?= $row_pemasok['alamat']; ?></td>
                <td><?= $row_pemasok['telepon']; ?></td>
                <td><span class="badge <?= $row_pemasok['status'] == 1? 'text-bg-success' : 'text-bg-danger'; ?>"><?= $row_pemasok['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></span></td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row_pemasok['id_pemasok']; ?>" class="text-info">
                        <i class="bi bi-pencil-square"></i></a>
                    <div class="modal fade" id="modalEdit<?= $row_pemasok['id_pemasok']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="modul/pemasok/proses.php?aksi=edit&id=<?= $row_pemasok['id_pemasok']; ?>" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="namapemasok">Nama Pemasok</label>
                                            <input class="form-control" type="text" name="namapemasok" value="<?= $row_pemasok['nama_pemasok']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" value="<?= $row_pemasok['alamat']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="telepon">Telepon</label>
                                            <input class="form-control" type="text" name="telepon" value="<?= $row_pemasok['telepon']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="status">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="" selected disabled>Pilih Status</option>
                                                <option value="1" <?= $row_pemasok['status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                                                <option value="0" <?= $row_pemasok['status'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row_pemasok['id_pemasok']; ?>" class="text-danger">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                    <div class="modal fade" id="modalHapus<?= $row_pemasok['id_pemasok']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">Hapus Data Pemasok</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin akan menghapus data pemasok <?= $row_pemasok['nama_pemasok']; ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="modul/pemasok/proses.php?aksi=hapus&id=<?= $row_pemasok['id_pemasok']; ?>" method="post">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php    
            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>