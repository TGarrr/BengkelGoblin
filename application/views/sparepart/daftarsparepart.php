<?= $this->session->flashdata('pesan'); ?>
<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
                <!-- looping products -->
                <?php foreach ($sparepart as $spr) { ?>
                    <div class="col-md-2 col-md-3">
                        <div class="thumbnail" style="height: 370px;">
                            <img src="<?php echo base_url(); ?>assets/img/upload/<?= $spr->image; ?>" style="max-width:100%; maxheight: 100%; height: 200px; width: 180px">
                            <div class="caption">
                                <h5 style="min-height:30px;"><?= $spr->kode ?></h5>
                                <h5><?= $spr->nama_barang ?></h5>
                                <p>
                                    <?php
                                    if ($spr->stok < 1) {
                                        echo "<i class='btn btn-outlineprimary fas fw fa-shopping-cart'> Booking&nbsp;&nbsp 0</i>";
                                    } else {
                                        echo "<a class='btn btn-outlineprimary fas fw fa-shoppingcart' href='" . base_url('booking/tambahBooking/' . $spr->id) . "'> Booking</a>";
                                    }
                                    ?>
                                    <a class="btn btn-outlinewarning fas fw fa-search" href="<?= base_url('home/detailsparepart/' . $sparepart->id); ?>"> Detail</a>
                                </p>
                            </div>
                        </div>
                    </div> <?php } ?>
                <!-- end looping -->
            </div>
        </div>
    </div>
</div>