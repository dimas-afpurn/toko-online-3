<!-- Slider -->

<div class="content">

	<div class="container">

		<div class="slider">

			<ul class="rslides" id="slider1">

				<?php

				$slider = $this->toko_online_model->get_table('slider');

				foreach ($slider as $slide) :

				?>

					<li><img src="<?= base_url() ?>assets/img/slider/<?= $slide['gambar'] ?>" alt="slider"></li>

				<?php endforeach; ?>

			</ul>

		</div>

	</div>

</div>

<!-- End Slider -->



<!-- Content -->

<div class="top-sellers">

	<div class="container">

		<br>

		<h3>Produk Terbaru</h3>

		<div class="seller-grids mb-invoice-3">

			<?php foreach ($produk_terbaru as $prod) : ?>

				<div class="col-md-3 seller-grid">

					<?php foreach ($kategori as $ktg) :



						if ($prod['kategori_produk'] == $ktg['id_kategori_produk']) : ?>



							<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>">

								<?php if ($prod['foto_produk1'] == null) : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/default.jpg" alt="" title="Lihat Detail" />

								<?php else : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $prod['foto_produk1'] ?>" alt="" title="Lihat Detail" />

								<?php endif; ?>

							</a>

							<h4>

								<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>"><?= substr($prod['nama_produk'], 0, 20) . "...." ?></a>

							</h4>

							<p style="margin-bottom: 10px;">Rp. <?= number_format($prod['harga'], 0, ',', '.') ?></p>

							<?php if (isset($prod['jumlah_terjual']) != null) : ?>

								<h5>terjual <?= $prod['jumlah_terjual'] ?></h5>

							<?php else : ?>

								<h5>terjual 0</h5>

							<?php endif; ?>

							<div class="item-info">

								<div class="color 2">

									<form method="POST" action="<?= base_url() ?>user/Home/keranjang_belanja">

										<!-- <form id="formAksi"> -->

										<input type="hidden" value="1" name="jumlah_beli">

										<input type="hidden" name="harga" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="id_produk" value="<?= $prod['id_produk'] ?>">

										<input type="hidden" name="berat_kotor" value="<?= $prod['berat_kotor'] ?>">

										<input type="hidden" value="1" name="quantity">

										<input type="hidden" name="harga_jumlah" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="harga_term">

										<input type="hidden" name="potongan">

										<input type="hidden" name="ip_number" value="<?php echo $this->session->userdata('id_kpesan'); ?>">

										<!-- <a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>" style="color: white; margin-bottom: 30px;">Detail</a> -->

										<!-- <a href="javascript:{}" onclick="document.getElementById('keranjang').submit();" style="color: white; margin-bottom: 30px;">Beli</a> -->

										<button type="button" style="background-color: #046464;margin-bottom:50px;" onclick="window.location.href='<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>'" class="btn btn-success" style="background-color: #046464;">Detail</button>

										<button type="submit" class="btn btn-success" style="background-color: #046464;margin-bottom:50px;">Beli</button>

									</form>

								</div>

							</div>

					<?php

						endif;

					endforeach; ?>

				</div>

			<?php endforeach; ?>

			<div class="clearfix"></div>

			<center>

				<div class="item-info"><a href="<?= base_url('produk/produk-terbaru') ?>" style="color:white;">Lihat Semua</a></div>

				<!-- <div class="item-info"><button onclick="tambah()" style="color:white;">Lihat Semua</button></div> -->

				<center>

		</div>

	</div>

</div>

<div class="top-sellers">

	<div class="container">

		<br>

		<h3>Produk Termurah</h3>

		<div class="seller-grids mb-invoice-3">

			<?php foreach ($produk_termurah as $prod) : ?>

				<div class="col-md-3 seller-grid">

					<?php foreach ($kategori as $ktg) :

						if ($prod['kategori_produk'] == $ktg['id_kategori_produk']) : ?>

							<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>">

								<?php if ($prod['foto_produk1'] == null) : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/default.jpg" alt="" />

								<?php else : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $prod['foto_produk1'] ?>" alt="" />

								<?php endif; ?>

							</a>

							<h4>

								<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>"><?= substr($prod['nama_produk'], 0, 20) . "...." ?></a>

							</h4>

							<p style="margin-bottom: 10px;">Rp. <?= number_format($prod['harga'], 0, ',', '.') ?></p>

							<?php if (isset($prod['jumlah_terjual']) != null) : ?>

								<h5>terjual <?= $prod['jumlah_terjual'] ?></h5>

							<?php else : ?>

								<h5>terjual 0</h5>

							<?php endif; ?>

							<div class="item-info">

								<div class="color 2">

									<form method="POST" action="<?= base_url() ?>user/Home/keranjang_belanja">

										<input type="hidden" value="1" name="jumlah_beli">

										<input type="hidden" name="harga" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="id_produk" value="<?= $prod['id_produk'] ?>">

										<input type="hidden" name="berat_kotor" value="<?= $prod['berat_kotor'] ?>">

										<input type="hidden" value="1" name="quantity">

										<input type="hidden" name="harga_jumlah" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="harga_term">

										<input type="hidden" name="potongan">

										<input type="hidden" name="ip_number" value="<?php echo $this->session->userdata('id_kpesan'); ?>">

										<!-- <a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>" style="color: white; margin-bottom: 30px;">Detail</a> -->

										<!-- <a href="javascript:{}" onclick="document.getElementById('keranjang').submit();" style="color: white; margin-bottom: 30px;">Beli</a> -->

										<button type="button" style="background-color: #046464;margin-bottom:50px;" onclick="window.location.href='<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>'" class="btn btn-success" style="background-color: #046464;">Detail</button>

										<button type="submit" class="btn btn-success" style="background-color: #046464;margin-bottom:50px;">Beli</button>

									</form>

								</div>

							</div>

					<?php endif;

					endforeach; ?>

				</div>

			<?php endforeach; ?>

			<div class="clearfix"></div>

			<center>

				<div class="item-info"><a href="<?= base_url('produk/produk-termurah') ?>" style="color:white;">Lihat Semua</a></div>

				<!-- <div class="item-info"><button onclick="tambah()" style="color:white;">Lihat Semua</button></div> -->

				<center>

		</div>

	</div>

</div>

<div class="top-sellers">

	<div class="container">

		<br>

		<h3>Produk Terlaris</h3>

		<div class="seller-grids mb-invoice-3">

			<?php foreach ($produk_terlaris as $prod) : ?>

				<div class="col-md-3 seller-grid">

					<?php foreach ($kategori as $ktg) :

						if ($ktg['id_kategori_produk'] == $prod['kategori_produk']) : ?>

							<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>">

								<?php if ($prod['foto_produk1'] == null) : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/default.jpg" alt="" />

								<?php else : ?>

									<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $prod['foto_produk1'] ?>" alt="" />

								<?php endif; ?>

							</a>

							<h4>

								<a href="<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>"><?= substr($prod['nama_produk'], 0, 20) . "...." ?></a>

							</h4>

							<p style="margin-bottom: 10px;">Rp. <?= number_format($prod['harga'], 0, ',', '.') ?></p>

							<?php if (isset($prod['jumlah_terjual']) != null) : ?>

								<h5>terjual <?= $prod['jumlah_terjual'] ?></h5>

							<?php else : ?>

								<h5>terjual 0</h5>

							<?php endif; ?>

							<div class="item-info">

								<div class="color 2">

									<form method="POST" action="<?= base_url() ?>user/Home/keranjang_belanja">

										<input type="hidden" value="1" name="jumlah_beli">

										<input type="hidden" name="harga" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="id_produk" value="<?= $prod['id_produk'] ?>">

										<input type="hidden" name="berat_kotor" value="<?= $prod['berat_kotor'] ?>">

										<input type="hidden" value="1" name="quantity">

										<input type="hidden" name="harga_jumlah" value="<?= $prod['harga'] ?>">

										<input type="hidden" name="harga_term">

										<input type="hidden" name="potongan">

										<input type="hidden" name="ip_number" value="<?php echo $this->session->userdata('id_kpesan'); ?>">

										<!-- <a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>" style="color: white; margin-bottom: 30px;">Detail</a> -->

										<!-- <a href="javascript:{}" onclick="document.getElementById('keranjang').submit();" style="color: white; margin-bottom: 30px;">Beli</a> -->

										<button type="button" style="background-color: #046464;margin-bottom:50px;" onclick="window.location.href='<?= base_url($ktg['url_slug_kategori'] . '/' . $prod['url_slug_produk']) ?>'" class="btn btn-success" style="background-color: #046464;">Detail</button>

										<button type="submit" class="btn btn-success" style="background-color: #046464;margin-bottom:50px;">Beli</button>

									</form>
								</div>

							</div>

					<?php endif;

					endforeach; ?>

				</div>

			<?php endforeach; ?>

			<div class="clearfix"></div>

			<center>

				<div class="item-info"><a href="<?= base_url('produk/produk-terlaris') ?>" style="color:white;">Lihat Semua</a></div>

				<!-- <div class="item-info"><button onclick="tambah()" style="color:white;">Lihat Semua</button></div> -->

				<center>

		</div>

	</div>

</div>

<!-- End Content -->



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



				$('[name="harga"]').val(result.harga);

				$('[name="harga_jumlah"]').val(result.harga);

				$('[name="harga_term"]').val(result.harga);

				$('#harga_jual').html(to_rupiah(result.harga));

				$('#subtotal').html(to_rupiah(result.harga));



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

		//if(Number(input.val()) > 1) {

		input.val(Number(input.val()) - 1);

		let it = $(this).parent().parent().parent().parent().parent().parent();

		jumlahChange(it);

		//};

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