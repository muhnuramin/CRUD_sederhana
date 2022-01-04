<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h3 class="my-2">Data Mahasiswa</h3>
    <a href="Halaman/pendaftaran" type="button" class="btn btn-primary">Tambah Data</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto Mahasiswa</th>
                <th scope="col">Foto KTP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $m) : ?>
                <tr>
                    <th class="align-middle" scope="row"><?= $i++ ?></th>
                    <td class="align-middle"><?= $m['nim']; ?></td>
                    <td class="align-middle"><?= $m['nama']; ?></td>
                    <td class="align-middle"><img src="/img/foto/<?= $m['foto_mahasiswa']; ?>" alt="" width="70px"></td>
                    <td class="align-middle"><img src="/img/ktp/<?= $m['foto_ktp']; ?>" alt="" width="70px"></td>
                    <td class="align-middle">
                        <a href="/Halaman/delete/<?= $m['id']; ?>" class="btn btn-danger">Delete</a>
                        <a href="/Halaman/edit/<?= $m['id']; ?>" type="button" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>