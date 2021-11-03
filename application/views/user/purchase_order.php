<link href="<?= base_url() ?>assets/css/purchase.css" rel='stylesheet' type='text/css' />
<div class="single-sec">
    <div class="_3D9BVC">
        <div class="_2mSi0S">
            <div class="_1rcMMD">
                <div class="_3odSz_">
                    <div class="_1pKQJd">
                        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon icon-arrow-left"><g><path d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z"></path></g>
                        </svg>
                        <span><a href="<?php echo base_url('user/home/akun')?>" style="text-decoration:none;">KEMBALI</a></span>
                    </div>
                    <div>
                        <span>NO. PESANAN. <?php echo $order->id_order;?></span>
                        <span class="_9aTWMs">|</span>
                        <?php
                        $status1="";
                        $status2="";
                        $status3="";
                        $status4="";
                        ?>
                        <?php if($order->status_order=="1"){
                            $status1 = "stepper__step-icon--finish";
                        ?>
                            <span class="_3HECdl">Menunggu Pembayaran</span>
                            
                        <?php }else if($order->status_order=="2"){
                            $status2 = "stepper__step-icon--finish";
                        ?>    
                            <span class="_3HECdl">Sedang Dikemas</span>
                        <?php }else if($order->status_order=="3"){
                            $status3 = "stepper__step-icon--finish";
                        ?>  
                            <span class="_3HECdl">Dalam Pengiriman</span>  
                        <?php }else if($order->status_order=="4"){
                            $status4 = "stepper__step-icon--finish";
                        ?>   
                            <span class="_3HECdl">Barang Sudah Sampai</span>   
                        <?php } ?>      
                    </div>
                </div>
                <div class="_1J7vLy">
                    <div class="DI-rNr tyOBoQ"> </div>
                    <div class="DI-rNr _25igL4"> </div>
                </div>
                <div class="_2NJbNc">
                    <div class="stepper">
                
                <div class="stepper__step stepper__step--finish">
                    <div class="stepper__step-icon <?php echo $status1?>">
                    <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0" class="shopee-svg-icon icon-order-paid"><g><path clip-rule="evenodd" d="m24 22h-21c-.5 0-1-.5-1-1v-15c0-.6.5-1 1-1h21c .5 0 1 .4 1 1v15c0 .5-.5 1-1 1z" fill="none" fill-rule="evenodd" stroke-miterlimit="10" stroke-width="3"></path><path clip-rule="evenodd" d="m24.8 10h4.2c.5 0 1 .4 1 1v15c0 .5-.5 1-1 1h-21c-.6 0-1-.4-1-1v-4" fill="none" fill-rule="evenodd" stroke-miterlimit="10" stroke-width="3"></path><path d="m12.9 17.2c-.7-.1-1.5-.4-2.1-.9l.8-1.2c.6.5 1.1.7 1.7.7.7 0 1-.3 1-.8 0-1.2-3.2-1.2-3.2-3.4 0-1.2.7-2 1.8-2.2v-1.3h1.2v1.2c.8.1 1.3.5 1.8 1l-.9 1c-.4-.4-.8-.6-1.3-.6-.6 0-.9.2-.9.8 0 1.1 3.2 1 3.2 3.3 0 1.2-.6 2-1.9 2.3v1.2h-1.2z" stroke="none"></path></g></svg>
                </div>
                <div class="stepper__step-text">Menunggu Pembayaran</div>
            </div>
            <div class="stepper__step stepper__step--finish">
                <div class="stepper__step-icon <?php echo $status2?>">
                    <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0" class="shopee-svg-icon icon-order-received"><g><polygon fill="none" points="2 28 2 19.2 10.6 19.2 11.7 21.5 19.8 21.5 20.9 19.2 30 19.1 30 28" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polygon><polyline fill="none" points="21 8 27 8 30 19.1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline><polyline fill="none" points="2 19.2 5 8 11 8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" x1="16" x2="16" y1="4" y2="14"></line><path d="m20.1 13.4-3.6 3.6c-.3.3-.7.3-.9 0l-3.6-3.6c-.4-.4-.1-1.1.5-1.1h7.2c.5 0 .8.7.4 1.1z" stroke="none"></path></g></svg>        
                    
                </div>
                <div class="stepper__step-text">Sedang Dikemas</div>
            </div>
            <div class="stepper__step stepper__step--finish">
                <div class="stepper__step-icon <?php echo $status3?>">
                    <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0" class="shopee-svg-icon icon-order-shipping"><g><line fill="none" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" x1="18.1" x2="9.6" y1="20.5" y2="20.5"></line><circle cx="7.5" cy="23.5" fill="none" r="4" stroke-miterlimit="10" stroke-width="3"></circle><circle cx="20.5" cy="23.5" fill="none" r="4" stroke-miterlimit="10" stroke-width="3"></circle><line fill="none" stroke-miterlimit="10" stroke-width="3" x1="19.7" x2="30" y1="15.5" y2="15.5"></line><polyline fill="none" points="4.6 20.5 1.5 20.5 1.5 4.5 20.5 4.5 20.5 18.4" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline><polyline fill="none" points="20.5 9 29.5 9 30.5 22 24.7 22" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline></g></svg>
                </div>
                <div class="stepper__step-text">Dalam Pengiriman</div>
            </div>
            <div class="stepper__step stepper__step--finish">
                <div class="stepper__step-icon <?php echo $status4?>">
                    <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0" class="shopee-svg-icon icon-order-rating"><polygon fill="none" points="16 3.2 20.2 11.9 29.5 13 22.2 19 24.3 28.8 16 23.8 7.7 28.8 9.8 19 2.5 13 11.8 11.9" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polygon></svg>
                </div>
                <div class="stepper__step-text">Barang Sudah Sampai</div>
            </div>
            <div class="stepper__line">
                <div class="stepper__line-background" style="background: rgb(224, 224, 224);"></div>
                <div class="stepper__line-foreground" style="width: calc((100% - 140px) * 1); background: rgb(45, 194, 88);"></div>
            </div>
        </div>
    </div>
    <div class="_1J7vLy">
        <div class="DI-rNr tyOBoQ"> </div>
        <div class="DI-rNr _25igL4"> </div>
    </div>
   
</div>

<div>
    <div class="j7z7l_">
        <div class="_1AsWWl"></div>
    </div>
    <div class="u-QNyq">
        <div class="_2WaK8H">
            <div class="fE5sHM">alamat pengiriman</div>
            <div class="_4KkgUa">
                <div>
                    <div><?php echo $order->kurir?></div>
                    <div><?php echo $order->paket_kirim?></div>
                </div>
            </div>
        </div>
        <div class="_2wWOHm">
            <div class="_2jj5D3">
                <div class="_2_z46i"><?php echo $order->nama_order?></div>
                <div class="_1J2b7X">
                    <span><?php echo $order->tlp_order?></span>
                    <br><?php echo $order->alamat_order?>, <?php echo $order->kota?>,  <?php echo $order->provinsi?>, ID
                </div>
            </div>
            <div class="_3lh_J3"><div>
                <div class="_38-lLD">Tidak Ada Informasi Pengiriman</div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    foreach($detail_order as $d){
?>
<div>
        <div>
       
        <div class="_24pt-Y"></div>
        <div class="_1limL3"><div>
            <a class="_1BJEKe" href="#" style="text-decoration:none;">
            <div></div>
            <div class="_3huAcN">
                <div class="_3btL3m">
                    <div class="shopee-image__wrapper">
                        <div class="shopee-image__place-holder">
                            <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image"><g><rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line><rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line></g></svg>
                        </div>
                        <div class="shopee-image__content" style="background-image: url(<?php echo base_url('assets/img/produk_penjual/'.$d->foto_produk1) ?>);">
                        <div class="shopee-image__content--blur"> </div>
                    </div>
                </div>
            </div>
            <div class="_1cxKtp"><div>
                <div class="_1xHDVY">
                    <span class="_30COVM"><?php echo $d->nama_produk?></span>
                </div>
            </div>
            <div>
                <div class="_2H6lAy">x<?php echo $d->jumlah_produk?></div>
            </div>
        </div>
    </div>
    <div class="_1kvNGb"><div>
        <span class="mBERmM _2mEJ4q">Rp<?php echo number_format($d->subtotal)?></span>
    </div>
</div>
<div class="_3TCVHw">
    <div class="_2lV1s_">Penilaian Barang</div>
    <div class="IFHv4r">
        <div class="hotel_a">
			<div class="stars-outer">
				<div class="stars-inner"></div>
			</div>
		</div>
    </div>
</div>
</a>
</div>
    <div class="_3tEHtP"></div>
</div>
</div>
<?php } ?>
<div class="_1l8TCL">
        <div class="_1FDuJg">
            <div class="_1bq31i"><span>Subtotal Produk</span></div>
            <div class="_2aXD4G"><div>Rp<?php echo number_format($order->subtotal_order)?></div>
        </div>
</div>
<div class="_1FDuJg">
        <div class="_1bq31i"><span>Pengiriman</span></div>
        <div class="_2aXD4G"><div>Rp<?php echo number_format($order->ongkir)?></div>
</div>
</div>
   
</div>
<div class="_1FDuJg _3WktZ1">
    <div class="_1bq31i _3zO_LL"><span>Total Pesanan</span></div>
    <div class="_2aXD4G">
        <div class="_1gMI9H">Rp<?php echo number_format($order->total_order)?></div>
    </div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>    

<script>
    $(document).ready(function(){  
        const ratings = {
            <?php if ($rating->jml_ulasan != "" && $rating->total_ulasan != 0) { ?>	
                hotel_a : '<?php echo number_format($rating->total_ulasan/$rating->jml_ulasan, 1)?>',
            <?php } else { ?>
                hotel_a : '0.0'
            <?php } ?>	
        }    

        // total number of stars
		const starTotal = 5;

        for(const rating in ratings) {  
        const starPercentage = (ratings[rating] / starTotal) * 100;
        const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
        }
    })    
</script>    