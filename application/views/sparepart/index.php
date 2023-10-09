<!-- Begin Page Content -->
<div class="container-fluid">

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
                                <a href="<?= base_url('sparepart/ubahsparepart/') . $spr['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('sparepart/hapussparepart/') . $spr['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $spr['kode']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Modal Tambah sparepart baru-->
<div class="modal fade" id="sparepartBaruModal" tabindex="-1" role="dialog" aria-labelledby="sparepartBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sparepartBaruModalLabel">Tambah sparepart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('sparepart'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode" name="kode" placeholder="Masukkan Kode sparepart">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="H_modal" name="H_modal" placeholder="Masukkan Harga Modal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="H_jual" name="H_jual" placeholder="Masukkan Harga Jual">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->