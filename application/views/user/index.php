<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Jadi member sejak: <br><b><?= date('d F Y', $user['tanggal_input']); ?></b></small></p>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('user/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sparepartBaruModal"><i class="fas fa-file-alt"></i> Sparepart Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga Modal</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $a = 1;
                    foreach ($sparepart as $spr) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $spr['kode']; ?></td>
                            <td><?= $spr['nama_barang']; ?></td>
                            <td><?= $spr['stok']; ?></td>
                            <td><?= $spr['H_modal']; ?></td>
                            <td><?= $spr['H_jual']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $spr['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td>
                                <a href="<?= base_url('user/ubahuser/') . $spr['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('user/hapususer/') . $spr['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $spr['kode']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->