<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/select2.min.css">

<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/produk-detail.css">	 -->

<div class="single-sec">

	<div class="container">

		<ol class="breadcrumb">

			<li><a href="<?= base_url('user/Home') ?>">Home</a></li>

			<li class="active">Detail Produk</li>
			<li class="active"><?= $detail_produk[0]['nama_produk'] ?></li>

		</ol>

		<!-- start content -->

		<div class="col-md-12 det" style="margin-bottom: 80px;">

			<div class="single_left">

				<div class="grid images_3_of_2">

					<ul id="etalage">

						<li style="width: 300px;">

							<a href="">

								<?php if ($detail_produk[0]['foto_produk1'] == null) : ?>



								<?php else : ?>

									<img class="etalage_thumb_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk1'] ?>" class="img-responsive" />

									<img class="etalage_source_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk1'] ?>" class="img-responsive" title="" />

								<?php endif; ?>

							</a>

						</li>

						<li style="width: 300px;">

							<?php if ($detail_produk[0]['foto_produk2'] == null) : ?>



							<?php else : ?>

								<img class="etalage_thumb_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk2'] ?>" class="img-responsive" />

								<img class="etalage_source_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk2'] ?>" class="img-responsive" title="" />

							<?php endif; ?>

						<li style="width: 300px;">

							<?php if ($detail_produk[0]['foto_produk3'] == null) : ?>



							<?php else : ?>

								<img class="etalage_thumb_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk3'] ?>" class="img-responsive" />

								<img class="etalage_source_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk3'] ?>" class="img-responsive" title="" />

							<?php endif; ?>

						</li>

					</ul>

					<div class="clearfix"></div>

				</div>

			</div>

			<div class="single-right">

				<h3><?= $detail_produk[0]['nama_produk'] ?></h3>

				<div class="id">

					<h4>ID: <?= $detail_produk[0]['id_produk'] ?></h4>

					<h4>Berat Bersih: <?php echo $detail_produk[0]['berat_bersih'] ?> gram</h4>

					<?php if ($detail_produk[0]['jumlah_stok'] > 0) : ?>

						<h4>Stok: <?php echo $detail_produk[0]['jumlah_stok'] ?> items</h4>

					<?php else : ?>

						<h4>Stok: 0 items</h4>

					<?php endif; ?>

				</div>

				<div class="cost" style="margin-top: 20px;">

					<div class="prdt-cost">

						<ul>

							<li>

								<h4>Harga per Satuan</h4>

							</li>

							<?php if (isset($detail_produk[0]['harga_promo'])) : ?>

								<li class="active">Rp. <s><span id="harga_jual_old"></span></s> <span id="harga_jual"></span></li>

								<li>

									<h4>Subtotal </h4>

								</li>

								<li class="active">Rp. <span id="subtotal"></span> </li>

							<?php else : ?>
								<li class="active">Rp. <span id="harga_jual"></span> </li>

								<li>

									<h4>Subtotal </h4>

								</li>

								<li class="active">Rp. <span id="subtotal"></span> </li>

							<?php endif; ?>

							<form method="POST" action="<?= base_url() ?>user/Home/keranjang_belanja">

								<!-- <form id="formAksi"> -->

								<input type="hidden" value="1" name="quantity">

								<input type="hidden" name="harga">

								<input type="hidden" name="harga_jumlah">

								<input type="hidden" name="harga_term">

								<input type="hidden" name="potongan">

								<input type="hidden" name="id_produk" value="<?php echo $detail_produk[0]['id_produk'] ?>">

								<input type="hidden" name="jumlah_stok" value="<?php echo $detail_produk[0]['jumlah_stok'] ?>">

								<input type="hidden" name="berat_kotor" value="<?php echo $detail_produk[0]['berat_kotor'] ?>">

								<input type="hidden" name="ip_number" value="<?php echo $this->session->userdata('id_kpesan'); ?>">

								<div style="display: flex;">

									<button type="button" id="minus_jumlah" class="btn btn-success pull-left" style="padding: 2px 5px 0;"><i class="fa fa-minus fa-fw"></i></button>

									<input required type="text" class="form-control col-md" id="jumlah_beli" name="jumlah_beli" style="width: 50px; margin: 0 5px; height: 28px; padding: 0 8px; text-align: center; border-radius: 6px;" value="1">

									<button type="button" id="plus_jumlah" class="btn btn-success pull-left" style="padding: 2px 5px 0"><i class="fa fa-plus fa-fw"></i></button>

								</div>

								<br />

								<?php foreach ($voucher as $v) { ?>

									<div class="css-7k2jum" data-testid="PDPDetailVoucher[0]" onclick="cek_voucher(<?php echo $v->id ?>)">

										<div class="css-10wy6qd" id="merchant-voucher-ANNVPM24" data-testid="MerchantVoucher">

											<div class="css-17w967y">



											</div>

											<div class="css-7yj588">

												<p data-unify="Typography" class="css-19gt17v-unf-heading-unf-heading e1qvo2ff8" data-testid="MerchantVoucherType"></p>

												<h2 class="css-whbpyf" data-testid="MerchantVoucherValue"><?php echo 'Rp ' . number_format($v->nominal) ?></h2>

												<p class="css-uswdof">min. Pembelian <strong data-testid="MerchantVoucherMinSpend"><?php echo $v->keterangan_syarat ?></strong></p>

											</div>

											<div class="css-1fgyps7 e1qur15t0"></div>

											<div class="css-dlnyqv"></div>

										</div>

									</div>

								<?php } ?>

								<br />

								<?php if ($detail_produk[0]['jumlah_stok'] <= 0) : ?>

									<button type="submit" disabled>Maaf produk sudah habis</button>

								<?php else : ?>

									<button type="submit" id="btn_save" onclick="save()">Tambah ke keranjang</button>

								<?php endif; ?>

							</form>

						</ul>

					</div>



					<div class="clearfix"></div>

				</div>

				<div class="single-bottom1">

					<h6>Details</h6>

					<p class="prod-desc"><?= $detail_produk[0]['deskripsi'] ?></p>



				</div>

			</div>

			<div class="clearfix"></div>

			<hr />

			<h2 data-testid="sumTotalReview" class="css-ddjk3l">

				Ulasan(<?php echo $rating->jml_ulasan ?>)<br>

				<p class="css-1s46cvt"><?= $detail_produk[0]['nama_produk'] ?></p>

			</h2>

			<h5 class="css-zeq6c8" data-testid="txtRatingScore">

				<?php $tot_rating = $rating->jml_ulasan;  ?>

				<?php

				if ($rating->jml_ulasan != "" && $rating->total_ulasan != 0) {

					echo number_format($rating->total_ulasan / $rating->jml_ulasan, 0);
				} else {

					echo "0.0";
				} ?><span>/5</span></h5>

			<!-- <div id="stars-existing" class="starrr glyphicon-3x" data-rating='<?php echo number_format($rating->total_ulasan / $rating->jml_ulasan, 0) ?>' style="color: yellow;" disabled></div> -->

			<div class="hotel_a">

				<div class="stars-outer">

					<div class="stars-inner"></div>

				</div>

			</div>

			<h2 class="css-pcuskv" data-testid="lblAllReview">Semua Ulasan (<?php echo $rating->jml_ulasan ?>)</h2>

			<?php if ($query == true) { ?>

				<?php foreach ($query as $u) { ?>

					<div class="css-1jetg87">

						<div class="css-l4kq1m">

							<div data-testid="pdpFlexWrapperContainer" class="css-7smpge e1ufc1ph1">

								<div class="css-53duzp e1ufc1ph0">

									<div class="css-snjfsc eaj5cj71">

										<picture class="css-1ew46s1-unf-img e11hknjr0">

											<img src="https://accounts.tokopedia.com/image/v1/u/16297369/user_thumbnail/desktop" alt="Ellen" data-unify="Image" class="css-1nxyhqh e11hknjr1">

										</picture>

									</div>

								</div>

								<div class="css-3efjn4 e1ufc1ph0">

									<a data-unify="Link" font-size="12" class="css-xige44-unf-link en8iawh0" data-testid="txtCustFullNameFilter0"><?php echo $u->nama_review ?></a>

								</div>

							</div>

							<div class="css-17gqcdy">

								<div class="komen_<?php echo $u->id_review ?>">

									<div class="stars-outer">

										<div class="stars-inner2"></div>

									</div>

								</div>

								<p data-unify="Typography" data-testid="txtReviewFilter0" class="css-s4w7lz-unf-heading-unf-heading e1qvo2ff8" style="overflow-wrap: break-word;">

									<span><?php echo $u->komentar ?></span>

								</p>

							</div>

						</div>



					</div>

				<?php } ?>

				<div class="col-md-9">

					<div class="blog-page__content">

						<?php echo @$data; ?>

						<div class="page__pagination">

							<?php echo $halaman; ?>

						</div>

					</div>

				</div>

			<?php } else { ?>

				<div class="css-1hpmleg">

					<div class="css-1q47ojj-unf-emptystate e1lf3yex0" data-unify="EmptyState" data-testid="icnEmptyReview">

						<div class="unf-emptystate-img"><img alt="Toped Illustration" src="<?php echo base_url() ?>assets/img/logo_1626198027.png">

						</div>

						<div>

							<h3 data-unify="Typography" class="css-qdo48k-unf-heading-unf-heading e1qvo2ff3"></h3>

							<p data-unify="Typography" class="css-a9wblb-unf-heading-unf-heading e1qvo2ff8">

							<p data-unify="Typography" data-testid="txtEmptyReview" class="css-1pyp478-unf-heading-unf-heading e1qvo2ff8">Belum ada ulasan untuk produk ini</p>

							<p data-unify="Typography" data-testid="txtBeFirstReview" class="css-a9wblb-unf-heading-unf-heading e1qvo2ff8">Jadilah yang pertama membeli produk ini dan memberikan ulasan</p>

							</p>

						</div>

					</div>

				</div>

			<?php } ?>

		</div>

	</div>

	<div class="clearfix"></div>

</div>

</div>



<script>
	var link = "<?php echo site_url('user/home') ?>";

	var id_produk = "<?php echo $detail_produk[0]['id_produk'] ?>";



	function swal_berhasil() {

		swal("Ditambahkan ke keranjang !", "success");

	}



	function swal_berhasil_delet() {

		swal("Barang Berhasil Di Hapus !", "success");

	}



	function swal_gagal_voucher() {

		swal("Nominal Kurang Dari Harga Yang Ditentukan !");

	}



	function swal_berhasil_update() {

		swal("keranjang Belanja Telah Di Perbaharui !", "success");

	}



	function swal_error(msg) {

		swal({

			title: "ERROR",

			text: msg,

			type: "warning",

			closeOnConfirm: true

		});

	}



	$(document).ready(function() {

		detail_stok();

		edit(id_produk);



		const ratings = {

			<?php if ($rating->jml_ulasan != "" && $rating->total_ulasan != 0) { ?>

				hotel_a: '<?php echo number_format($rating->total_ulasan / $rating->jml_ulasan, 1) ?>',

			<?php } else { ?>

				hotel_a: '0.0'

			<?php } ?>

		};



		// total number of stars

		const starTotal = 5;



		for (const rating in ratings) {

			const starPercentage = (ratings[rating] / starTotal) * 100;

			const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;

			document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;

		}



		const ratings2 = {

			<?php foreach ($query as $u) { ?>

				komen_<?php echo $u->id_review ?>: '<?php echo number_format($u->rate_star, 1) ?>',

			<?php } ?>

		};



		const starTotal2 = 5;



		for (const rating2 in ratings2) {

			const starPercentage2 = (ratings2[rating2] / starTotal2) * 100;

			const starPercentageRounded2 = `${(Math.round(starPercentage2 / 10) * 10)}%`;

			document.querySelector(`.${rating2} .stars-inner2`).style.width = starPercentageRounded2;

		}

	});



	function detail_stok() {

		$('#stok').load("<?php echo base_url(); ?>user/home/load_stok/<?php echo $detail_produk[0]['id_produk'] ?>");

	}



	function save() {



		var url;

		url = link + "/keranjang_belanja";



		//tinyMCE.triggerSave();

		$.ajax({

			url: url,

			type: "POST",

			data: $('#formAksi').serialize(),

			dataType: "JSON",

			beforeSend: function() {

				$('#btnSave').text('saving...');

				$('#btnSave').attr('disabled', true);

			},

			success: function(response) {

				if (response.status) {



					swal_berhasil();

					cek();

					detail_stok();

				} else {

					swal_error(response.error);

				}



			},

			complete: function() {

				$('#btn_save').text('Tambah Ke Keranjang');

				$('#btnSave').attr('disabled', false);

			},

		});







	}



	function edit(id) {



		$.ajax({

			url: link + "/ajax_get_id/" + id,

			type: "GET",

			dataType: "JSON",

			success: function(result) {

				if (result.harga_promo == null) {

					$('[name="harga"]').val(result.harga);

					$('[name="harga_jumlah"]').val(result.harga);

					$('[name="harga_term"]').val(result.harga);

					$('#harga_jual').html(to_rupiah(result.harga));

					$('#subtotal').html(to_rupiah(result.harga));

				} else {

					$('[name="harga"]').val(result.harga_promo);

					$('[name="harga_jumlah"]').val(result.harga_promo);

					$('[name="harga_term"]').val(result.harga_promo);

					$('#harga_jual_old').html(to_rupiah(result.harga));
					$('#harga_jual').html(to_rupiah(result.harga_promo));

					$('#subtotal_old').html(to_rupiah(result.harga));
					$('#subtotal').html(to_rupiah(result.harga_promo));

				}




			},

			error: function(jqXHR, textStatus, errorThrown) {

				alert('Error get data from ajax');

			}

		});

	}



	$(document).on('click', '#plus_jumlah', function() {

		let input = $(this).parent().find('#jumlah_beli');

		let jumlah_stok = $('[name="jumlah_stok"]').val();

		//let max = $(this).parent().parent().parent().find('#stok_min').val();



		if (Number(input.val()) < Number(jumlah_stok)) {

			input.val(Number(input.val()) + 1);

			let it = $(this).parent().parent().parent().parent().parent().parent();

			console.log('input', it);

			jumlahChange(it);

		};

	});



	$(document).on('click', '#minus_jumlah', function() {

		let input = $(this).parent().find('#jumlah_beli');

		if (Number(input.val()) > 1) {

			input.val(Number(input.val()) - 1);

		};

		let it = $(this).parent().parent().parent().parent().parent().parent();

		jumlahChange(it);

	});



	function jumlahChange(it) {

		var jumlah_beli = $('#jumlah_beli').val();

		var harga = $('[name="harga"]').val();



		var jumlah = jumlah_beli * harga;



		$('[name="harga_jumlah"]').val(jumlah);

		$('[name="harga_term"]').val(jumlah);

		$('#subtotal').html(to_rupiah(jumlah));

	}



	function cek_voucher(id) {

		var harga_jumlah = $('[name="harga_jumlah"]').val();

		var harga_term = $('[name="harga_term"]').val();

		$.ajax({

			url: link + "/ajax_get_voucher/" + id,

			type: "GET",

			dataType: "JSON",

			success: function(result) {



				if (harga_term <= result.nominal_syarat) {

					swal_gagal_voucher();

				} else {

					let jumlah_promo = harga_jumlah - result.nominal;

					let jumlah_promo_text = harga_term - result.nominal;

					let hargaText = to_rupiah(jumlah_promo_text) + "<strike  style='font-size: 8pt'>" + to_rupiah(harga_term) + "</strike>";

					$('[name="harga_jumlah"]').val(jumlah_promo);

					$('[name="potongan"]').val(result.nominal);

					$('#subtotal').html(hargaText);

				}







			},

			error: function(jqXHR, textStatus, errorThrown) {

				alert('Error get data from ajax');

			}

		});

	}



	function to_rupiah(angka) {

		var rev = parseInt(angka, 10).toString().split('').reverse().join('');

		var rev2 = '';

		for (var i = 0; i < rev.length; i++) {

			rev2 += rev[i];

			if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {

				rev2 += '.';

			}

		}

		return rev2.split('').reverse().join('') + ',-';

	}
</script>