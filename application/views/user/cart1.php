<div class="cart_main" style="margin-bottom:80px;">

    <div class="container">
        <?= $this->session->flashdata('message'); ?>


        <ol class="breadcrumb">

            <li><a href="<?= base_url() ?>">Home</a></li>

            <li class="active">Cart</li>

        </ol>

        <?php

        if ($this->session->flashdata('cart')) {

            $msg = $this->session->flashdata('cart');

            echo $msg;
        }

        ?>

        <div class="cart-items">

            <h2>Keranjang belanja (<?php if ($total[0]['total_jumlah'] == null) {

                                        echo '0';
                                    } else {

                                        echo $total[0]['total_jumlah'];
                                    } ?>)</h2>

            <?php foreach ($cart as $ca) : ?>
                <div class="cart-header">

                    <a class="close1" href="<?php echo base_url() ?>user/home/remove_keranjang_belanja/<?php echo $ca['id'] ?>"></a>

                    <div class="cart-sec">

                        <div class="cart-item cyc">

                            <?php if ($ca['foto_produk1'] == null) : ?>

                                <img src="<?= base_url() ?>assets/img/default.jpg" />

                            <?php else : ?>

                                <img src="<?= base_url() ?>assets/img/produk_penjual/<?= $ca['foto_produk1'] ?>" />

                            <?php endif; ?>

                        </div>

                        <div class="cart-item-info" style="margin-top: 30px;">

                            <h3><?= ucwords($ca['nama_produk']) ?><span>ID: <?= $ca['id_produk'] ?></span></h3>

                            <?php if (isset($ca['harga_promo'])) : ?>

                                <h4><span>Rp. </span><s><?= number_format($ca['harga'], 0, ',', '.') ?></s> <?= number_format($ca['harga_promo'], 0, ',', '.') ?></h4>

                            <?php else : ?>

                                <h4><span>Rp. </span><?= number_format($ca['harga_promo'], 0, ',', '.') ?></h4>

                            <?php endif; ?>

                            <div class="row" style="margin-top: 20px;">

                                <form action="<?= base_url() ?>user/home/update_keranjang_belanja?>" method="POST">

                                    <div class="col-md-2" style="margin-top: 0px;">

                                        <input type="hidden" name="id_keranjang_belanja" value="<?= $ca['id_keranjang_belanja'] ?>">

                                        <input type="hidden" name="id_produk" value="<?= $ca['id_produk'] ?>">

                                        <input type="number" class="form-control" name="quantity" value="<?= $ca['jumlah_produk'] ?>" min="1">

                                    </div>

                                    <div class="col-md-5">

                                        <button type="submit" class="btn btn-primary">Update Keranjang</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>



        <div class="cart-total">

            <div class="price-details">

                <h3>Harga</h3>

                <!-- <span>Total</span> -->

                <!-- <span class="total">Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></span> -->

                <div class="clearfix"></div>

            </div>

            <h4 class="last-price">TOTAL</h4>

            <span class="total final">Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></span>

            <div class="clearfix"></div>

            <a class="order" href="<?= base_url('user/Home/checkout') ?>">Lanjutkan</a>

        </div>

    </div>

</div>

</div>