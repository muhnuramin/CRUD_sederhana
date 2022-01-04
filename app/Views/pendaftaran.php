<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h3>Form Pendaftaran</h3>
            <form action="/Halaman/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="foto_mahasiswa" class="form-label">Foto Mahasiswa</label>
                    <input type="file" class="form-control" id="foto_mahasiswa" name="foto_mahasiswa">
                </div>
                <div class="mb-3">
                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>