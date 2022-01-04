<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h3>Edit Form Pendaftaran</h3>
            <form action="/Halaman/update/<?= $mhs['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs['nim']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'] ?>">
                </div>
                <div class="mb-3">
                    <!-- <label for="foto_mahasiswa" class="form-label">Foto Mahasiswa</label> -->
                    <label for="foto_mahasiswa" class="custom-file-label">Tes</label>
                    <input type="file" class="form-control" id="foto_mahasiswa" name="foto_mahasiswa" value="<?= $mhs['foto_mahasiswa'] ?>">
                </div>
                <div class="mb-3">
                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" value="<?= $mhs['foto_ktp'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>