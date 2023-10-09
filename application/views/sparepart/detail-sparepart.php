<div class="x_panel" align="center">
    <div class="x_content">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="thumbnail" style="height: auto; position: relative; left: 100%; width: 200%">
                    <img src="<?php echo base_url(); ?>assets/img/upload/<?= $gambar; ?>" style="max-width:100%; max-height: 100%; height: 150px; width: 120px">
                    <div class="caption">
                        <h5 style="min-height:40px;" align="center"><?= $kode ?></h5>
                        <center>
                            <table class="table table-stripped">
                                <tr>
                                    <th nowrap>Kode Sparepart : </th>
                                    <td nowrap><?= $kode; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <th nowrap>Nama Barang: </th>
                                    <td><?= $nama_barang ?></td>
                                    <td>&nbsp;</td>
                                    <th>Harga Modal: </th>
                                    <td><?= $H_modal ?></td>
                                </tr>
                                <tr>
                                    <th>Harga Jual: </th>
                                    <td><?= $H_jual ?></td>
                                    <td>&nbsp;</td>
                                    <th>Tersedia: </th>
                                    <td><?= $stok ?></td>
                                </tr>
                            </table>
                        </center>
                        <p>
                            <a class="btn btn-outline-primary fas fw fa-shoppingcart" href="<?= base_url('booking/tambahBooking/' . $id); ?>"> Booking</a>
                            <span class="btn btn-outline-secondary fas fw fareply" onclick="window.history.go(-1)"> Kembali</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>