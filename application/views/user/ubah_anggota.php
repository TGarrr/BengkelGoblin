<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($sparepart as $spr) { ?>
                <form action="<?= base_url('sparepart/ubahsparepart'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $spr['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="kode" name="kode" placeholder="Masukkan Kode Barang" value="<?= $spr['kode']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?= $spr['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan Nominal stok" value="<?= $spr['stok']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="H_modal" name="H_modal" placeholder="Masukkan Harga Modal" value="<?= $spr['H_modal']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="H_jual" name="H_jual" placeholder="Masukkan Harga Jual" value="<?= $spr['H_jual']; ?>">
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($spr['image'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $spr['image']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $spr['image']; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>