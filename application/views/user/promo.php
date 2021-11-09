<div class="product-model">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li class="active">Promo</li>
        </ol>
        <h2>Produk Kami</h2>
        <div class="col-md-9 product-model-sec">
            <?php foreach ($produk as $prod) : ?>
                <?php if (isset($prod['harga_promo'])) : ?>
                    <?php date_default_timezone_set("Asia/Jakarta");
                    $now = date('Y-m-d H:i:s');
                    $now = date('Y-m-d H:i:s', strtotime($now));

                    $mulai = date('Y-m-d H:i:s', strtotime($prod['tgl_mulai']));
                    $selesai = date('Y-m-d H:i:s', strtotime($prod['tgl_selesai']));

                    if (($now >= $mulai) && ($now <= $selesai)) : ?>
                        <a href="<?= base_url($prod['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>">
                            <div class="product-grid love-grid">
                                <div class="more-product"><span> </span></div>
                                <div class="product-img b-link-stripe b-animate-go  thickbox">
                                    <img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $prod['foto_produk1'] ?>" class="img-responsive" alt="" />
                                    <div class="b-wrapper">
                                        <h4 class="b-animate b-from-left  b-delay03">
                                            <button class="btn">Lihat Detail</button>
                                            <!-- <button class="btn"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Lihat</button> -->
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-info simpleCart_shelfItem">
                                    <div class="product-info-cust prt_name">
                                        <h4><?= substr($prod['nama_produk'], 0, 18) . "...." ?></h4>
                                        <!-- <p>Id: <?= $prod['id_produk'] ?></p> -->
                                        <p></p>
                                        <span class="item_price">Rp. <s><?= number_format($prod['harga'], 0, ',', '.') ?></s> <?= number_format($prod['harga_promo'], 0, ',', '.') ?></span>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </a>
            <?php endif;
                endif;
            endforeach; ?>
        </div>
        <div class="rsidebar span_1_of_left">
            <section class="sky-form">
                <div class="product_right">
                    <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Kategori</h4>
                    <?php foreach ($kategori as $kate) : ?>
                        <div class="tab1">
                            <ul class="place">
                                <li class="sort"><a href="<?= base_url($kate['url_slug_kategori']) ?>"><?= ucwords($kate['nama_kategori_produk']) ?></a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="product_right">
                    <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Filter</h4>
                    <div class="tab1">
                        <ul class="place">
                            <li class="sort"><a href="<?= base_url('produk/produk-terbaru') ?>">Produk Terbaru</a></li>
                            <div class="clearfix"> </div>
                        </ul>
                        <ul class="place">
                            <li class="sort"><a href="<?= base_url('produk/produk-termurah') ?>">Produk Termurah</a></li>
                            <div class="clearfix"> </div>
                        </ul>
                        <ul class="place">
                            <li class="sort"><a href="<?= base_url('produk/produk-terlaris') ?>">Produk Terlaris</a></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>