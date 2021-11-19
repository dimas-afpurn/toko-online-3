<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-WIXa4ZorDyT_Kxot"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php if ($data_order[0]['status_order'] == 5) : ?>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
  <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
  <script src="<?= base_url() ?>assets/src/bootstrap4-rating-input.js"></script>

<?php endif; ?>

<div class="container">
  <ol class="breadcrumb">
    <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
    <li class="active">Form Konfirmasi Pembayaran</li>
  </ol>
  <div class="row mb-invoice-3">
    <div class="col-md-12">
      <h3 style="margin-bottom:10px">No Pemesanan : <?= $data_order[0]['id_order'] ?></h3>
      <h4 style="margin-bottom:10px">Informasi Pemesanan</h4>
      <table class="table  table-striped">
        <tr>
          <td>Nama Penerima</td>
          <td>: <?= $data_order[0]['nama_order'] ?></td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td>: <?= $data_order[0]['tlp_order'] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>: <?= $data_order[0]['email_order'] ?></td>
        </tr>
        <tr>
          <td>Alamat Penerima</td>
          <td>: <?= $data_order[0]['alamat_order'] ?>, <?= $data_order[0]['kota'] ?>, <?= $data_order[0]['provinsi'] ?></td>
        </tr>
        <tr>
          <td>Ekspedisi</td>
          <td>: <?= strtoupper($data_order[0]['kurir']) ?> | <?= ucwords($data_order[0]['paket_kirim']) ?></td>
        </tr>
        <tr>
          <td>Lama Pengiriman</td>
          <td>: <?= $data_order[0]['lama_kirim'] ?> hari</td>
        </tr>
        <tr>
          <td>Status Order</td>
          <td>: <?= $status_order ?></td>
        </tr>
        <?php
        $tgl_order = strtotime($data_order[0]['tgl_order']);
        $batas = "+" . $expired[0]['waktu'] . " " . $expired[0]['mode'];
        if ($data_order[0]['status_order'] == 1) :
        ?>
          <tr>
            <td>Batas Waktu Pembayaran</td>
            <td>: <?= tgl_indo(date("d-m-Y, h:i:s", strtotime($batas, $tgl_order))) ?> WIB</td>
          </tr>
        <?php endif; ?>
        <tr>
          <?php if ($data_order[0]['status_order'] == 4) : ?>
            <td colspan=2>
              <a id="konfirmasi_barang" type="button" class="btn btn-block btn-success">Barang Sudah Sampai</a>
            </td>
          <?php endif; ?>
        </tr>
      </table>
      <?php
      if ($expired[0]['mode'] == 'day') {
        $satuan = 'hari';
      } elseif ($expired[0]['mode'] == 'hour') {
        $satuan = 'jam';
      } elseif ($expired[0]['mode'] == 'minute') {
        $satuan = 'menit';
      }
      if ($data_order[0]['status_bayar'] == 0) :
      ?>
        <h5 style="margin-top:14px;"><span style="color:red;">*</span>Apabila pembayaran tidak dilakukan dalam <?= $expired[0]['waktu'] . " " . $satuan ?> maka pesanan anda akan dihapus</h5>
      <?php endif; ?>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row mb-invoice-3">
    <div class="col-md-12">
      <h3 style="margin-bottom:10px">Detail Barang</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">Produk</th>
              <!-- <th>Foto Barang</th> -->
              <th class="text-center">Harga</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Subtotal</th>
              <?php if ($data_order[0]['status_order'] == 5) : ?>
                <th class="text-center">Opsi</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_penjual as $penjual) : foreach ($penjual as $produk) : ?>
                <tr>
                  <!-- <td><?= $produk['nama_produk'] ?></td> -->
                  <?php if ($produk['foto_produk1'] == null) : ?>
                    <td><img style="margin-right: 20px;" src="<?php echo base_url() ?>assets/img/default.jpg" alt="img" width="180" height="180"><?= $produk['nama_produk'] ?></td>
                  <?php else : ?>
                    <td><img style="margin-right: 20px;" src="<?php echo base_url() ?>assets/img/produk_penjual/<?= $produk['foto_produk1'] ?>" alt="img" width="180" height="180"><?= $produk['nama_produk'] ?></td>
                  <?php endif; ?>
                  <td class="text-right">Rp <?= number_format($produk['harga'], 0, ',', '.') ?>,00</td>
                  <td class="text-center"><?= $produk['jumlah_produk'] ?> item</td>
                  <th class="text-right">Rp <?= number_format($produk['harga'] * $produk['jumlah_produk'], 0, ',', '.') ?>,00</th>
                  <?php if ($data_order[0]['status_order'] == 5) : ?>
                    <?php if ($produk['status_detail_komplain'] == 1) : ?>
                      <td class="text-center">
                        <a href="<?= base_url("user/order/komplain_barang/" . $produk['id_detail_order']) ?>" class="btn btn-secondary">Detail Komplain Barang</a>
                      </td>
                    <?php else : ?>
                      <td class="text-center">
                        <a href="<?= base_url('user/order/komplain_barang/' . $produk['id_detail_order']) ?>" class="btn btn-danger">Komplain</a>
                      </td>
                  <?php endif;
                  endif; ?>
                </tr>
            <?php endforeach;
            endforeach; ?>
            <tr>
              <th colspan="3" class="text-right" scope="col">Ongkir</th>
              <th class="text-right">Rp <?= number_format($data_order[0]['ongkir'], 0, ',', '.') ?>,00</th>
              <?php if ($data_order[0]['status_order'] == 5) : ?>
                <th class="text-center"></th>
              <?php endif; ?>
            </tr>
            <tr>
              <th colspan="3" class="text-right">Total</th>
              <!-- <td><?= number_format($data_order[0]['jumlah_order'], 0, ',', '.') ?></td> -->
              <th class="text-right">Rp <?= number_format($data_order[0]['total_order'], 0, ',', '.') ?>,00</th>
              <?php if ($data_order[0]['status_order'] == 5) : ?>
                <th class="text-center"></th>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row mb-invoice-3">
    <div class="col-md-12">
      <?php if (isset($transaksi[0]['id_order']) == null) : ?>
        <div class="mt-5 text-center">
          <form id="payment-form" method="post" action="<?= site_url() ?>midtrans/snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
          </form>
          <button id="pay_button" class="btn btn-primary">Pembayaran</button>
        </div>
      <?php else : ?>
        <h3 class="mt-3" style="margin-bottom:10px">Data Transaksi</h3>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" scope="col">No Pemesanan</th>
                <th class="text-center" scope="col">Total Bayar</th>
                <th class="text-center" scope="col">Jenis Pembayaran</th>
                <!-- <th scope="col">Bank</th> -->
                <!-- <th scope="col">VA Number</th> -->
                <th class="text-center" scope="col">Waktu Transaksi</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"><?= $transaksi[0]['id_order'] ?></td>
                <td class="text-center">Rp <?= number_format($transaksi[0]['gross_amount'], 0, ',', '.') ?>,00</td>
                <td class="text-center">
                  <?php if ($transaksi[0]['payment_type'] == "bank_transfer") {
                    echo "Bank Transfer";
                  } elseif ($transaksi[0]['payment_type'] == "gopay") {
                    echo "Gopay";
                  }
                  ?>
                </td>
                <td class="text-center"><?= tgl_indo(date("d-m-Y, h:i:s", strtotime($transaksi[0]['transaction_time']))) ?> WIB</td>
                <td class="text-center">
                  <?php if ($transaksi[0]['status_code'] == 200) : ?>
                    <label class="label label-success">Berhasil</label>
                  <?php else : ?>
                    <label class="label label-danger">Belum Bayar</label>
                  <?php endif; ?>
                </td>
                <td class="text-center">
                  <?php if ($transaksi[0]['pdf_url'] != null) : ?>
                    <a href="<?= $transaksi[0]['pdf_url'] ?>" role="button" target="_blank" class="btn btn-primary">Download</a>
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
      <?php if ($data_order[0]['status_order'] == 5) : ?>
        <div class="col-md-12 text-center">
          <ol class="breadcrumb"></ol>
          <h2>Penilaian Produk</h2><br>
          <div class="form-row">
            <div class="form-group col-md-3"></div>
            <div class="form-group col-md-6">
              <form method="POST" action="<?= base_url() ?>user/Order/save_review">
                <input type="hidden" name="id_order" value="<?= $data_order[0]['id_order'] ?>">
                <input type="number" name="rate_star" id="rating-empty-clearable" class="rating text-warning" />
                <input type="text" class="form-control" name="nama_review" value="<?= $data_order[0]['nama_order'] ?>" placeholder="masukkan nama Anda" required><br>
                <input type="email" class="form-control" name="email_review" value="<?= $data_order[0]['email_order'] ?>" placeholder="masukkan email Anda" required><br>
                <select name="id_produk" id="" class="form-control mb-4" required>
                  <option value="" disabled selected hidden>pilih produk yang dinilai</option>
                  <?php foreach ($data_penjual as $penjual) : foreach ($penjual as $produk) : ?>
                      <option value="<?= $produk['id_produk'] ?>"><?= ucwords($produk['nama_produk']) ?></option>
                  <?php endforeach;
                  endforeach; ?>
                </select>
                <textarea class="form-control" style="height: 150px;" name="komentar" placeholder="komentar" required></textarea><br>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </form>
            </div>
            <div class="form-group col-md-3"></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
  function readURL(id, input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#' + id)
          .attr('src', e.target.result)
          .width(200)
          .height(250);
      };

      reader.readAsDataURL(input.files[0]);
      $("#" + id).show();
    }
  }
</script>
<script>
  $('#konfirmasi_barang').click(function(event) {
    $.ajax({
      url: '<?= base_url() . 'user/Order/konfirmasi_barang/' . $data_order[0]['id_order'] ?>',
      type: 'POST',
      success: function(result) {
        location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error get data from ajax');
      }
    })
  })
</script>
<script type="text/javascript">
  $('#pay_button').click(function(event) {
    event.preventDefault();

    var id = '<?= $data_order[0]['id_order']; ?>'
    console.log('id', id);
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>midtrans/Snap/token',
      data: {
        id: id
      },
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = ' + data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type, data) {
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result) {
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result) {
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>