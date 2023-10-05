<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
        <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Tambah Peminjaman</a><br>
    </br>

    <form action="<?= BASE_URL;?>/buku/cari" method="post" >
    <div class="input-group mb-3">
        <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="tcari" >
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="bcari">Cari</button>
    </form>
                <a href="<?= BASE_URL;?>/buku/index"><button type="button" class="btn btn-outline-danger">Reset</button></a>
            </div>
    </div>

    <br>
    <table class="table table-succes table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['buku'] as $row ) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjaman']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td>
                <?php
                    $tgl_kembali = strtotime($row['tgl_kembali']);
                    $tgl_pinjam = strtotime($row['tgl_pinjam']);

                    $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                    if ($selisih_hari == 0 || $selisih_hari == 1 || $selisih_hari > 2)
                    {
                        echo  "<div class='badge text-bg-success font-bold'>Sudah Kembali</div>";
                    } else 
                        echo "<div class='badge text-bg-danger font-bold'>Belum Kembali</div>";
                ?>
                <td>
                <?php
                    $tgl_kembali = strtotime($row['tgl_kembali']);
                    $tgl_pinjam = strtotime($row['tgl_pinjam']);

                    $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                    if ($selisih_hari == 2 && $selisih_hari >= 2){
                        echo '<a href="' . BASE_URL . '/buku/edit/' . $row['id'] . '" class="btn btn-primary">Edit</a>';
                    } else
                ?>
                    <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id']?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>      
                </td>   
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>