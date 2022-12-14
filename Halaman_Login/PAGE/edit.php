<?php
require_once('function/helper.php');
require_once('function/koneksi.php');


if ($_SESSION["id"] == null) {
    header("location: ");
    exit();
}

$error =  isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;
$id =  isset($_GET['id']) ? ($_GET['id']) : false;

$operator = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM operator WHERE id=$id"));


?>

<div class="card">
    <div class="card-body">
        <?php
        if ($error == "true") : ?>
            <div class="alert alert-danger" role="alert">
                Proses gagal, pastikan semuar formulir terisi
            </div>
        <?php endif; ?>
        <form method="POST" action="<?= 'process/process_edit.php' ?>">
            <input name="id" value="<?= $operator['id'] ?>" type="hidden">
            <div class=" mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $operator['nama'] ?>">
            </div>
            <div class="mb-3">
                <label for="noid" class="form-label">Nomor ID</label>
                <input type="number" name="noid" class="form-control" id="noid" value="<?= $operator['noid'] ?>">
            </div>
            <div class=" mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= $operator['email'] ?>">
            </div>
            <div class=" mb-3">
                <label for="nohp" class="form-label">Nomor HP</label>
                <input type="number" name="nohp" class="form-control" id="nohp" value="<?= $operator['nohp'] ?>">
            </div>
            <div class=" mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $operator['alamat'] ?>">
            </div>
            <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>