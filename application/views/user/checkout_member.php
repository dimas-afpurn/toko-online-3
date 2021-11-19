<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<div class="single-sec">



    <div class="container">

        <ol class="breadcrumb">



            <li><a href="<?= base_url('user/Home') ?>">Home</a></li>



            <li class="active">Checkout</li>



        </ol>



        <form action="<?= base_url('user/order/simpan') ?>" method="post">



            <div class="card">

                <div class="card-body">

                    <h5 class="card-title"> Alamat Pengiriman</h5>

                    <div class="container">

                        <div class="row">

                            <?php if (isset($member)) : ?>

                                <div id="alamat_utama">

                                    <div class="col-lg-12" style="width: 126%;max-width:130%;">

                                        <div class="col-sm-3">

                                            <span id="nama_lengkap"></span> | <span id="no_telp"></span>
                                            <span id="email"></span>

                                        </div>

                                        <div class="col-sm-7">

                                            <span id="alamat"></span>, <span id="kota"></span> , <span id="provinsi"></span> <span id="kode_pos"></span>

                                        </div>

                                        <div class="col-sm-2">

                                            <span id="aksi"></span>

                                        </div>

                                    </div>

                                </div>

                                <div id="alamat_ubah" style="display:none;">



                                    <div id="tampilkan_alamat_member"></div>

                                    </ul>

                                </div>
                            <?php else : ?>

                                <div class="col-lg-6" style="width: 126%;max-width:130%;">

                                    <span class="badge badge-warning">
                                        <h6>Alamat belum ditambahkan</h6>
                                    </span>

                                </div>

                                <div class="col-lg-4">
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url() ?>user/Home/akun">Lihat Profil</a>
                                    <!-- <button type="button" onclick="alamat_baru()" class="btn btn-info btn-sm">Tambah Alamat</button> -->
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>



                </div>

            </div>

            <br />

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title"> Jasa Pengiriman</h5>

                    <div class="container">

                        <div class="row">

                            <select id="service<?php echo $this->session->userdata('id_member') ?>" name="kurir" onchange="cekHarga('<?php echo $this->session->userdata('id_member') ?>')" class="form-control">

                                <option value="" disabled="Silahkan Pilih" selected="">- Silahkan Pilih Kurir -</option>

                                <option value="jne">JNE</option>

                                <option value="pos">POS</option>

                                <option value="tiki">TIKI</option>

                            </select>

                            <input type="hidden" name="ori_city" id="oricity<?php echo  $this->session->userdata('id_member') ?>" value="255">

                            <input type="hidden" name="berat" id="berat<?php echo $this->session->userdata('id_member') ?>" value="<?= $jumlah[0]['total_berat'] ?>">

                            <input type="hidden" name="paket_kirim" id="jenis_layanan_ongkir">

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <table class="table table-condensed">

                                    <tbody id="resultsbox<?php echo $this->session->userdata('id_member') ?>"></tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>
                <span class="text-info ml-3 mb-3">
                    <h6>*Barang akan dikirim dari <?php echo $lokasi[0]['nama_kota'] ?></h6>
                </span>

            </div>

            <br />

            <div class="card">

                <div class="card-body">

                    <input name="nama_lengkap" type="hidden" class="form-control" id="nama_lengkap_field">

                    <input name="no_hp" type="hidden" class="form-control" id="no_hp_field">

                    <input name="email" type="hidden" class="form-control" id="email_field">

                    <input name="city_id" type="hidden" class="form-control" id="city_id_field">

                    <input name="province_id" type="hidden" class="form-control" id="province_id_field">

                    <input type="hidden" id="nama_provinsi" class="form-control" name="nama_provinsi">

                    <input type="hidden" id="nama_kota" class="form-control" name="nama_kota">

                    <input type="hidden" id="alamat_field" class="form-control" name="alamat_lengkap">

                    <div class="table-responsive">



                        <div class="mt-0">



                            <p class="text-center"><strong>INFORMASI PRODUK</strong></p>



                            <table class="table table-bordered">



                                <thead>



                                    <tr>



                                        <th scope="col" class="text-center">Produk</th>



                                        <th scope="col" class="text-center">Items</th>



                                        <!-- <th scope="col" class="text-center">Berat Bersih/Item</th> -->



                                        <th scope="col" class="text-center">Total</th>



                                    </tr>



                                </thead>



                                <tbody>



                                    <?php foreach ($cart as $keranjang) : ?>



                                        <tr>



                                            <td class="text-center"><?= ucwords(substr($keranjang['nama_produk'], 0, 15)) ?>..</td>



                                            <td class="text-center"><?= $keranjang['jumlah_produk'] ?> item</td>



                                            <!-- <td class="text-center"><?= $keranjang['berat_bersih'] ?> gram</td> -->



                                            <!-- <td class="text-center"><?= $jumlah_berat ?></td> -->



                                            <td class="text-center">Rp. <?= number_format($keranjang['subtotal_belanja'], 0, ',', '.') ?></td>



                                            <!-- <input type="hidden" value="<?= $jumlah_berat ?>"> -->



                                        </tr>







                                    <?php endforeach; ?>



                                    <tr>



                                        <th scope="col" class="text-center">Total Belanja</th>



                                        <td class="text-center"><b><?= $total[0]['total_jumlah'] ?> item</b></td>







                                        <td class="text-center" colspan="2"><b>Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></b></td>



                                    </tr>

                                    <tr>



                                        <th scope="col" class="text-center">Ongkir</th>





                                        <td class="text-center" colspan="3"><b><span id="ongkoskirim<?php echo $this->session->userdata('id_member') ?>">Silakan Cek Ongkir</span></b></td>



                                    </tr>



                                    <tr>



                                        <td colspan=4>



                                            <!-- <input type="hidden" id="nama_provinsi" name="nama_provinsi">



                                <input type="hidden" id="nama_kota" name="nama_kota"> -->



                                            <input type="hidden" id="ongkos_penjual<?php echo $this->session->userdata('id_member') ?>" name="ongkir">



                                            <input type="hidden" name="ongkos_penjual2" id="ongkos_penjual2<?php echo  $this->session->userdata('id_member') ?>">



                                            <input type="hidden" id="lama_kirim" name="lama_kirim">



                                            <input name="total_harga" id="total_harga" type="hidden" value="<?= $total[0]['total_harga'] ?>">



                                            <input name="total_jumlah" id="total_jumlah" type="hidden" value="<?= $total[0]['total_jumlah'] ?>">



                                            <input name="total_harga_sub" id="total_harga_sub" type="hidden" value="<?= $total[0]['total_harga'] ?>">



                                            <button id="btn_beli" type="submit" class="btn btn-success btn-block">Beli</button>



                                        </td>



                                    </tr>



                                </tbody>



                            </table>



                            <!-- <div id="tampil"></div> -->



                        </div>



                    </div>

                </div>

            </div>

        </form>

    </div>

</div>



<script>
    var link_profil = '<?php echo base_url('user/home') ?>';



    $(document).ready(function() {



        $.ajax({

            url: link_profil + "/ajax_get_alamat_profil/",

            type: "GET",

            dataType: "JSON",

            success: function(result) {



                $('#nama_lengkap').html(result.nama_lengkap);

                $('#no_telp').html(result.no_telp);

                $('#alamat').html(result.alamat);

                $('#email').html(result.email);

                $('#kota').html(result.kota);

                $('#provinsi').html(result.provinsi);

                $('#kode_pos').html(result.kode_pos);

                $('#aksi').html('<a href="javascript:void(0)" onclick="ubah_alamat()">Ubah</a>');



                $('#nama_lengkap_field').val(result.nama_lengkap);

                $('#no_hp_field').val(result.no_telp);

                $('#email_field').val(result.email);

                $('#alamat_field').val(result.alamat);

                $('#city_id_field').val(result.city_id);

                $('#province_id_field').val(result.province_id);



                $('#nama_provinsi').val(result.provinsi);

                $('#nama_kota').val(result.kota);



            },
            error: function(jqXHR, textStatus, errorThrown) {

                alert('Error get data from ajax');

            }

        });





    })



    function ubah_alamat() {

        $('#alamat_utama').slideUp(500, 'swing');

        $('#alamat_ubah').fadeIn(1000);

        tampil_alamat_member();

    }



    function tampil_alamat_member() {

        var alamat = '';

        var alamat_atas = '<ul class="list-group">';

        var alamat_bawah = '</ul> ';

        var button = '<br /><button type="button" onclick="pilih()" class="btn btn-primary pilih">Pilih</button>';

        $.getJSON(link_profil + '/load_alamat_member/', {

                format: "json"

            })

            .done(function(data) {

                $.each(data, function(key, val) {

                    alamat += `

                <li class="list-group-item">

                <div class="col-lg-12" >

                        <div class="col-lg-1">

                        <input class="check-item" type="checkbox" name="id" id="id" value="${val.id_detail_alamat}">

                        </div>

                        <div class="col-lg-5">

                            ${val.nama_lengkap} (+62) ${val.no_telp}

                        </div>

                        <div class="col-lg-6">

                        ${val.alamat},  ${val.kota} , ${val.provinsi}, ID ${val.kode_pos}

                        </div>

                        

                </div>

                </li> 

                 

                `

                })

                var j = document.getElementById("tampilkan_alamat_member");

                j.innerHTML = alamat_atas + alamat + alamat_bawah + button;

                document.getElementById('tampilkan_alamat_member').style.display = "block";

            })

    }



    function pilih() {

        var checkedValue = $(".check-item:checked").val();

        console.log('checked', checkedValue);

        $.ajax({

            url: link_profil + "/ajax_get_alamat_profil_id/" + checkedValue,

            type: "GET",

            dataType: "JSON",

            success: function(result) {



                $('#nama_lengkap').html(result.nama_lengkap);

                $('#no_telp').html(result.no_telp);

                $('#alamat').html(result.alamat);

                $('#kota').html(result.kota);

                $('#provinsi').html(result.provinsi);

                $('#kode_pos').html(result.kode_pos);

                $('#aksi').html('<a href="javascript:void(0)" onclick="ubah_alamat()">Ubah</a>');



                $('#nama_lengkap_field').val(result.nama_lengkap);

                $('#no_hp_field').val(result.no_telp);

                $('#email_field').val(result.email);

                $('#city_id_field').val(result.city_id);

                $('#province_id_field').val(result.province_id);

                $('#alamat_lengkap').val(result.alamat);



                $('#nama_provinsi').val(result.provinsi);

                $('#nama_kota').val(result.kota);



            },
            error: function(jqXHR, textStatus, errorThrown) {

                alert('Error get data from ajax');

            }

        });

        $('#alamat_ubah').slideUp(500, 'swing');

        $('#alamat_utama').fadeIn(1000);

        var trigger = "<?php echo $this->session->userdata('id_member') ?>";

        $('#resultsbox' + trigger).html("");

    }



    function cekHarga(trigger) {

        var origin = $('#oricity' + trigger).val();

        var destination = $('#city_id_field').val();

        var weight = $('#berat' + trigger).val();

        var courier = $('#service' + trigger).val();

        ///var pelapak = $('#pelapak').val();



        var jenis_layanan = $("#jenis_layanan_ongkir" + trigger);



        jenis_layanan.val("");



        //  $("#loading").modal('show');



        // console.log('<?php echo base_url("ongkir/cost"); ?>'+'?origin='+origin+'?destination='+destination+'?weight='+weight+'?courier='+courier+'?trigger='+trigger);

        //var jenis_layanan=$("#jenis_layanan_ongkir"+trigger);

        $.ajax({

            url: '<?php echo base_url("user/home/cost"); ?>' + '?origin=' + origin + '?destination=' + destination + '?weight=' + weight + '?courier=' + courier + '?trigger=' + trigger,

            data: {
                origin: origin,
                destination: destination,
                weight: weight,
                courier: courier,
                trigger: trigger
            },

            success: function(response) {

                $('#resultsbox' + trigger).html(response);

                //$("#loading").modal('hide');





            },

            error: function() {

                //$('#resultsbox'+trigger).html('ERROR');

                //$("#loading").modal('hide');

            }

        });

    }



    function pilihOngkir(id_penjual, kurir, etd) {

        //var jenis_layanan=$("#jenis_layanan_ongkir"+id_penjual);

        var radios = document.getElementsByName('tarif');

        var tarif, totaltarif;

        var total = <?php echo $total[0]['total_harga'] ?>;

        var totalsub = <?php echo $total[0]['total_harga'] ?>;

        var totalberat = <?php echo $total[0]['total_berat'] ?>;

        for (var i = 0, length = radios.length; i < length; i++) {

            if (radios[i].checked) {

                tarif = radios[i].value;

                totaltarif = parseInt(tarif);

                total = parseInt(total) + parseInt(totaltarif);

                alert(total);

                $('#ongkoskirim' + id_penjual).html('');

                $('#ongkoskirim' + id_penjual).html("Rp. " + totaltarif);

                $('#ongkos_penjual' + id_penjual).val(totaltarif);

                $('#ongkos_penjual2' + id_penjual).val(totaltarif);

                $('#total_harga').val(total);

                $('#total_harga_sub').val(totalsub);

                $('#lama_kirim').val(etd);

                //      $('#totalsimpan').val(total);

                //      $('#totalsimpan').val(total);

                //$('#ongkos').val(totaltarif);



                //jenis_layanan.val("");

                console.log('kurir', kurir);

                $("#jenis_layanan_ongkir").val(kurir);

            }

        }

    }
</script>