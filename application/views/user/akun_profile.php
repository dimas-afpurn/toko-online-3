<link href="<?= base_url() ?>assets/css/akun.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
    .containere {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        width: 100%;
    }

    input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 15px;
        left: 20px;
        font-size: 17px;
        color: #b8b8b8;
    }

    .button-wrap {
        position: relative;
    }

    .button {
        display: inline-block;
        background-color: #1d6355;
        border-radius: 10px;
        border: 4px double #cccccc;
        color: #ffffff;
        text-align: center;
        font-size: 12px;
        padding: 8px;
        width: 100px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    .button:hover {
        background-color: #00ab97;
    }
</style>
<div class="single-sec">
    <div class="container _1QwuCJ">
        <div class="_36cLcR">
            <div class="_1_68zU">
                <a class="_2BuJEf" href="/user/account/profile">
                    <div class="shopee-avatar">
                        <div class="shopee-avatar__placeholder">
                            <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-headshot">
                                <g>
                                    <circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle>
                                    <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round" stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="_2uLDqN">
                    <div class="_2lG70n"><span id="membere_nama"></span></div>

                </div>
            </div>
            <div class="_1ZnP-m">
                <div class="stardust-dropdown stardust-dropdown--open">
                    <div class="stardust-dropdown__item-header">
                        <a class="_3aAm2h" href="#">
                            <div class="_21F-bS"><img src="https://cf.shopee.co.id/file/ba61750a46794d8847c3f463c5e71cc4" /></div>
                            <div class="_2i7380"><span class="_3CHLlN">Akun Saya</span></div>
                        </a>
                    </div>
                    <div class="stardust-dropdown__item-body stardust-dropdown__item-body--open" style="opacity: 1;">
                        <div class="_3aiYwk">
                            <a class="_3SsG4j _3SzYTH" onclick="Profil()"><span class="_2PrdXX">Profil</span></a>
                            <a class="_3SsG4j" onclick="Alamat()"><span class="_2PrdXX">Alamat</span></a>
                            <a class="_3SsG4j" onclick="Ubah_password()"><span class="_2PrdXX">Ubah Password</span></a>
                        </div>
                    </div>
                </div>

                <div class="stardust-dropdown">
                    <div class="stardust-dropdown__item-header">
                        <a class="_3aAm2h" href="#">
                            <div class="_21F-bS"><img src="https://cf.shopee.co.id/file/e10a43b53ec8605f4829da5618e0717c" /></div>
                            <div class="_2i7380"><span class="_3CHLlN">Notifikasi</span></div>
                        </a>
                    </div>
                    <div class="stardust-dropdown__item-body">
                        <div class="_3aiYwk">
                            <a class="_3SsG4j" onclick="Status_pesanan()"><span class="_2PrdXX">Status Pesanan</span></a>
                            <!-- <a class="_3SsG4j" onclick="Promo()"><span class="_2PrdXX">Promo Shopee</span></a>
                        <a class="_3SsG4j" onclick="Penilaian()"><span class="_2PrdXX">Penilaian</span></a> -->
                        </div>
                    </div>
                </div>

                <div class="stardust-dropdown">
                    <div class="stardust-dropdown__item-header">
                        <a class="_3aAm2h" href="<?php base_url() ?>logout">
                            <div class="_21F-bS"><img src="https://cf.shopee.co.id/file/e10a43b53ec8605f4829da5618e0717c" /></div>
                            <div class="_2i7380"><span class="_3CHLlN">Logout</span></div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="_3D9BVC">
            <form action="<?= site_url('user/home/update_profile') ?>" id="form-upload" method="POST" name="form" enctype="multipart/form-data">
                <div class="h4QDlo" role="main" id="profil">
                    <div class="_2YiVnW">
                        <div class="_2w2H6X">
                            <h1 class="_3iiDCN">Profil Saya</h1>
                            <div class="TQG40c">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</div>
                        </div>
                        <div class="goiz2O">

                            <div class="pJout2">

                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Username</label></div>
                                        <div class="_2_JugQ">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator"><input type="text" placeholder="" maxlength="255" value="" name="username" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Nama</label></div>
                                        <div class="_2_JugQ">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator"><input type="text" placeholder="" maxlength="255" value="" name="nama_member" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Email</label></div>
                                        <div class="_2_JugQ">
                                            <div class="_2bdFDW">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text" placeholder="" maxlength="255" name="email" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Nomor Telepon</label></div>
                                        <div class="_2_JugQ">
                                            <div class="_2bdFDW">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text" placeholder="" maxlength="255" name="no_telp" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Jenis Kelamin</label></div>
                                        <div class="_2_JugQ">
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="_3BlbUs">
                                    <div class="_1iNZU3">
                                        <div class="_2PfA-y"><label>Tanggal lahir</label></div>
                                        <div class="_2_JugQ">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator"><input type="date" placeholder="" maxlength="255" name="tanggal_lahir" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_31PFen"><button type="submit" id="btnSave" class="btn btn-solid-primary btn--m btn--inline" aria-disabled="false">simpan</button></div>

                            </div>
                            <div class="_1aIEbS">
                                <div class="X1SONv" style="margin-left: 50px;">
                                    <div class="_1FzaUZ">
                                        <div class="YMBffn">
                                            <img id="preview-upload" src="#" style="height: 100px;border: 1px solid #DDC; " />
                                        </div>
                                    </div>
                                    <!-- <div class="containere">
                            <div class="button-wrap">
                            <label class="button" for="upload">Upload File</label>
                            <input class="" type="file" accept=".jpg,.jpeg,.png" name="foto_profil" id="file-upload"/>
                            </div>
                            </div> -->
                                    <div class="containere">
                                        <div class="button-wrap">
                                            <label class="button" for="upload">Upload File</label>
                                            <input id="upload" type="file" name="foto_profil">
                                        </div>
                                    </div>
                                    <div class="_3Jd4Zu">
                                        <div class="_3UgHT6">Ukuran gambar: maks. 1 MB</div>
                                        <div class="_3UgHT6">Format gambar: .JPEG, .PNG</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <div class="h4QDlo" role="main" id="alamat" style="display:none;">
                <div class="my-address-tab">
                    <div></div>
                    <div></div>
                    <div class="my-account-section">
                        <div class="my-account-section__header">
                            <div class="my-account-section__header-left">
                                <div class="my-account-section__header-title">Alamat Saya</div>
                                <div class="my-account-section__header-subtitle"></div>
                            </div>
                            <div class="my-account-section__header-button">
                                <button type="button" onclick="alamat_baru()" class="shopee-button-solid shopee-button-solid--primary shopee-button-solid--address-tab">
                                    <div class="button-with-icon">
                                        <div class="button-with-icon__icon">
                                            <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon icon-plus-sign">
                                                <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                                            </svg>
                                        </div>
                                        <div>Tambah Alamat Baru</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div>
                            <span id="view_alamat"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h4QDlo" role="main" id="ubah_password" style="display:none;">
                <div class="kJiu0u">
                    <div class="ZsX2q-">
                        <h1 class="_2xVij2">Ubah Password</h1>
                        <div class="_2PlnUp">Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</div>
                    </div>
                    <br />
                    <form method="post" action="<?php echo base_url('user/home/update_password') ?>">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Password Saat Ini</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_lama" name="password_lama" onchange="cek_password(this.value)">
                                <div class="form-group">
                                    <div class="md-form" id="dur_pass2">



                                        <label class="btn_2 rounded" for="inputSuccess" id="erpr2" style="display: none;"><i class="fa fa-check label-success"></i> Password Benar</label>

                                    </div>

                                    <label class="btn_1 rounded" for="inputError" id="scpr2" style="display: none;"><i class="fa fa-times label-danger"></i> Password Tidak Sama Dengan Yang Lama</label>

                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password Yang Baru</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Password" name="password_baru" id="password_baru">
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Password" name="konfirmasi_password" id="konfirmasi_password" onchange="konf_password()">
                                <div class="form-group">
                                    <div class="md-form" id="dur_pass23">



                                        <label class="btn_2 rounded" for="inputSuccess" id="erpr23" style="display: none;"><i class="fa fa-check label-success"></i> Konfirmasi Password Sesuai</label>

                                    </div>

                                    <label class="btn_1 rounded" for="inputError" id="scpr23" style="display: none;"><i class="fa fa-times label-danger"></i> Konfirmasi Password Salah</label>

                                </div>
                            </div>
                        </div>
                        <br />
                        <button type="submit" id="spassnext" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>

            <div class="h4QDlo" role="main" id="status_pesanan" style="display:none;">
                <div class="kJiu0u">
                    <div class="w3-row">
                        <a href="javascript:void(0)" onclick="openCity(event, 'London');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red" style="width: 24.33333%;">Menunggu Pembayaran</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 24.33333%;">Sedang Dikemas</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 24.33333%;">Dalam Pengiriman</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'Barang');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 24.33333%;">Barang Sudah Sampai</div>
                        </a>
                    </div>

                    <div id="London" class="w3-container city" style="display:block">
                        <div class="_2e9rzB">
                            <svg width="19px" height="19px" viewBox="0 0 19 19">
                                <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)" stroke-width="2">
                                        <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                            <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                            <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                            </svg>
                            <input autocomplete="off" placeholder="Cari berdasarkan No. Pesanan dalam semua pesanan" value="" id="pencarian_kode">
                        </div>

                        <span id="status_menunggu_pembayaran"></span>

                    </div>

                    <div id="Paris" class="w3-container city" style="display:none">
                        <div class="_2e9rzB">
                            <svg width="19px" height="19px" viewBox="0 0 19 19">
                                <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)" stroke-width="2">
                                        <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                            <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                            <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                            </svg>
                            <input autocomplete="off" placeholder="Cari berdasarkan No. Pesanan dalam semua pesanan" value="" id="pencarian_kode2">
                        </div>

                        <span id="status_sedang_dikemas"></span>
                    </div>

                    <div id="Tokyo" class="w3-container city" style="display:none">
                        <div class="_2e9rzB">
                            <svg width="19px" height="19px" viewBox="0 0 19 19">
                                <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)" stroke-width="2">
                                        <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                            <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                            <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                            </svg>
                            <input autocomplete="off" placeholder="Cari berdasarkan No. Pesanan dalam semua pesanan" value="" id="pencarian_kode3">
                        </div>

                        <span id="status_dalam_pengiriman"></span>
                    </div>
                    <div id="Barang" class="w3-container city" style="display:none">
                        <div class="_2e9rzB">
                            <svg width="19px" height="19px" viewBox="0 0 19 19">
                                <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)" stroke-width="2">
                                        <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                            <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                            <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                            </svg>
                            <input autocomplete="off" placeholder="Cari berdasarkan No. Pesanan dalam semua pesanan" value="" id="pencarian_kode4">
                        </div>

                        <span id="status_sudah_sampai"></span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<script>
    var link_profil = '<?php echo base_url('user/home') ?>';
    var base_url = '<?php echo base_url() ?>';

    function swal_berhasil() {
        swal({
            title: "SUCCESS",
            text: "Berhasil",
            type: "success",
            closeOnConfirm: true
        });
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
        getLokasi();
        setTimeout(function() {
            Profil()
        }, 2000);

        $('#form-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                dataType: 'json',
                data: formData,
                async: true,
                beforeSend: function() {
                    $('#btnSave').text('saving...');
                    $('#btnSave').attr('disabled', true);
                },
                success: function(response) {
                    if (response.status) {
                        Profil();
                        swal_berhasil();
                    } else {
                        swal_error(response.error);
                    }
                },
                complete: function() {
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled', false);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                dataType: 'json',
                data: formData,
                async: true,
                beforeSend: function() {
                    $('#btnAlamat').text('saving...');
                    $('#BtnAlamat').attr('disabled', true);
                },
                success: function(response) {
                    if (response.status) {
                        $('#modal_alamat').modal('hide');
                        swal_berhasil();
                        tampil_alamat();
                    } else {
                        swal_error(response.error);
                    }
                },
                complete: function() {
                    $('#BtnAlamat').text('save');
                    $('#BtnAlamat').attr('disabled', false);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#form-update-alamat').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                dataType: 'json',
                data: formData,
                async: true,
                beforeSend: function() {
                    $('#BtnAlamat2').text('saving...');
                    $('#BtnAlamat2').attr('disabled', true);
                },
                success: function(response) {
                    if (response.status) {
                        $('#modal_alamat_edit').modal('hide');
                        swal_berhasil();
                        tampil_alamat();
                    } else {
                        swal_error(response.error);
                    }
                },
                complete: function() {
                    $('#BtnAlamat2').text('save');
                    $('#BtnAlamat2').attr('disabled', false);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var rd = new FileReader();
                rd.onload = function(e) {
                    $('#preview-upload').attr('src', e.target.result);
                };
                rd.readAsDataURL(input.files[0]);
            }
        }
        $("#upload").change(function() {
            readURL(this);
        });

        $("#prov_tujuan").on("change", function(e) {
            console.log("iki");
            e.preventDefault();

            var option = $('option:selected', this).val();

            var nama_prov = $('option:selected', this).attr('nama_provinsi');

            $('#kota_tujuan option:gt(0)').remove();

            // $('#kurir').val('');



            if (option === '') {

                alert('null');

                $("#kota_tujuan").prop("disabled", true);

                $("#kurir").prop("disabled", true);

            } else {

                $("#kota_tujuan").prop("disabled", false);

                getKota(option);

                document.getElementById("nama_provinsi").value = nama_prov;

            }

        });

        $("#kota_tujuan").on("change", function(e) {

            e.preventDefault();

            var option = $('option:selected', this).val();

            var nama_kota = $('option:selected', this).attr('nama_kota');

            $('#kurir').val('');



            if (option === '') {

                alert('null');

                $("#kurir").prop("disabled", true);

            } else {

                $("#kurir").prop("disabled", false);

                document.getElementById("nama_kota").value = nama_kota;

            }

        });

        $('#desprovince').change(function() {
            $("#kota_kab").prop("disabled", false);
            $('#kota_kab').show();
            var idprovince = $('#desprovince').val();
            var idcity = $('#kota_kab').val();
            loadCity2(idcity, '#kota_kab', idprovince);
            $('#provinsi_id').val(getSelectedText('desprovince'));
        });

        $('#kota_kab').change(function() {
            $('#kota_id').val(getSelectedText('kota_kab'));
            // var idkota = $('#kota_kab').val();
            //	loadKodePos(idkota,'#kode_pos');
        });


    });

    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $('#pencarian_kode').keyup(function(e) {
        // var keyword = $(this).val();
        // var Indexnya = $(this).parent().parent().index();
        // var key = e.which || e.keyCode;

        if (e.which == 13) {
            tampil_status_pembayaran_menunggu($('#pencarian_kode').val());
        }
    });

    $('#pencarian_kode2').keyup(function(e) {
        if (e.which == 13) {
            tampil_status_pembayaran_menunggu($('#pencarian_kode2').val());
        }
    });

    $('#pencarian_kode3').keyup(function(e) {
        if (e.which == 13) {
            tampil_status_dalam_pengiriman($('#pencarian_kode3').val());
        }
    });

    $('#pencarian_kode4').keyup(function(e) {
        if (e.which == 13) {
            tampil_status_sudah_sampai($('#pencarian_kode4').val());
        }
    });

    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-red";
    }

    function Profil() {
        $('#profil').fadeIn('slow');
        $('#alamat').fadeOut('slow');
        $('#ubah_password').fadeOut('slow');
        $('#status_pesanan').fadeOut('slow');


        save_method = 'update';
        $.ajax({
            url: link_profil + "/ajax_edit_profil/",
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                if (result.foto_profil == null) {
                    var img = '<?= base_url(); ?>assets/img/no_image.jpg';
                } else {
                    var img = '<?= base_url(); ?>assets/img/profile/' + result.foto_profil;
                }

                $('[name="username"]').val(result.username);
                $('[name="nama_member"]').val(result.nama_member);
                $('[name="email"]').val(result.email);
                $('[name="no_telp"]').val(result.no_telp);
                $('[name="jenis_kelamin"]').val(result.jenis_kelamin);
                $('[name="tanggal_lahir"]').val(result.tanggal_lahir);
                $('#preview-upload').attr('src', img);
                $('#membere_nama').html(result.nama_member);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function Alamat() {
        $('#profil').fadeOut('slow');
        $('#alamat').fadeIn('slow');
        $('#ubah_password').fadeOut('slow');
        $('#status_pesanan').fadeOut('slow');

        setTimeout(function() {
            tampil_alamat();
        }, 2000);

    }

    function Ubah_password() {
        $('#profil').fadeOut('slow');
        $('#alamat').fadeOut('slow');
        $('#ubah_password').fadeIn('slow');
        $('#status_pesanan').fadeOut('slow');
    }

    function Status_pesanan() {

        $('#profil').fadeOut('slow');
        $('#alamat').fadeOut('slow');
        $('#ubah_password').fadeOut('slow');
        $('#status_pesanan').fadeIn('slow');
        setTimeout(function() {
            tampil_status_pembayaran_menunggu(0);
        }, 2000);
        setTimeout(function() {
            tampil_status_sedang_dikemas(0);
        }, 2000);

        setTimeout(function() {
            tampil_status_dalam_pengiriman(0);
        }, 2000);

        setTimeout(function() {
            tampil_status_sudah_sampai(0);
        }, 2000);
    }

    function tampil_alamat() {
        var alamat = '';
        $.getJSON(link_profil + '/load_alamat', {
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(key, val) {
                    alamat += `
                <div class="address-card">
                            <div></div>
                            <div class="address-display__left">
                                <div class="address-display__field-container address-display__field-container--name">
                                    <div class="address-display__field-label">Nama Lengkap</div>
                                    <div class="address-display__field-content">
                                        <span class="address-display__name-text">${val.nama_lengkap}</span>
                                    </div>
                                </div>
                                <div class="address-display__field-container">
                                    <div class="address-display__field-label">telepon</div>
                                    <div class="address-display__field-content">${val.no_telp}</div>
                                </div>
                                <div class="address-display__field-container">
                                    <div class="address-display__field-label">Email</div>
                                    <div class="address-display__field-content">${val.email}</div>
                                </div>
                                <div class="address-display__field-container address-display__field-container__address">
                                    <div class="address-display__field-label">Alamat</div>
                                    <div class="address-display__field-content">
                                        <span>
                                            ${val.alamat},
                                            ${val.kota},
                                            ${val.provinsi},
                                            ID ${val.kode_pos}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="address-card__buttons">
                                <div class="address-card__button-group">
                                    <button type="button" onclick="ubah_alamat(${val.id_detail_alamat})" class="bacc-secondary-action-btn">Ubah</button>
                                    <button type="button" onclick="hapus_alamat(${val.id_detail_alamat})" class="bacc-secondary-action-btn">Hapus</button>
                                </div>
                                
                            </div>
                        </div>
                `
                });
                //<div class="bacc-default-badge">utama</div>
                // <div class="address-card__button-group"><button type="button" class="btn btn-light btn--s btn--inline btn-light--disabled address-card__button" aria-disabled="true">Atur sebagai utama</button></div>
                var f = document.getElementById("view_alamat");
                f.innerHTML = alamat;
                document.getElementById('view_alamat').style.display = "contents";
            })
    }

    function tampil_status_pembayaran_menunggu(kode) {
        var menunggu_pembayaran = '';
        $.getJSON(link_profil + '/load_status_menunggu_pembayaran/' + kode, {
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(key, val) {
                    menunggu_pembayaran += `
                <div class="_2n4gHk">
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                              
                          
                            </div>
                            <div class="_39XDzv"></div>
                            <a href="${base_url}user/purchase/order/${val.id_order}" style="text-decoration:none;">
                                <div class="_2lVoQ1">
                                    <div class="_1limL3">
                                        <div>
                                            <span class="_1BJEKe">
                                                <div></div>
                                                <div class="_3huAcN">
                                                    <div class="_3btL3m">
                                                        <div class="shopee-image__wrapper">
                                                            <div class="shopee-image__place-holder">
                                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                                                    <g>
                                                                        <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                                                        <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="shopee-image__content" style="background-image: url('${base_url}assets/img/produk_penjual/${val.foto_produk1}');"><div class="shopee-image__content--blur"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY"><span class="_30COVM">${val.nama_produk}</span></div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x${val.jumlah_produk}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_1kvNGb">
                                                    <div><span class="mBERmM">${to_rupiah(val.harga)}</span></div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="_3tEHtP"></div>
                                    </div>
                                </div>
                            </a>
                            <div class="h_Pf2y"></div>
                        </div>
                    </div>
                    <div class="_1J7vLy">
                        <div class="DI-rNr tyOBoQ"></div>
                        <div class="DI-rNr _25igL4"></div>
                    </div>
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z"
                                            fill="url(#paint0_linear)"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z"
                                            fill="#FEFEFE"
                                        ></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F53D2D"></stop>
                                                <stop offset="1" stop-color="#F63"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </span>
                            <div class="_1mmoh8">Total Pesanan:</div>
                            <div class="_1MS3t2">${to_rupiah(val.subtotal)}</div>
                        </div>
                    </div>
                    
                </div>

                `
                })
                var g = document.getElementById("status_menunggu_pembayaran");
                g.innerHTML = menunggu_pembayaran;
                document.getElementById('status_menunggu_pembayaran').style.display = "contents";
            })
    }

    function tampil_status_dalam_pengiriman(kode) {
        var menunggu_pembayaran = '';
        $.getJSON(link_profil + '/load_status_sedang_dikemas/' + kode, {
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(key, val) {
                    menunggu_pembayaran += `
                <div class="_2n4gHk">
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                              
                          
                            </div>
                            <div class="_39XDzv"></div>
                            <a href="${base_url}user/purchase/order/${val.id_order}" style="text-decoration:none;">
                                <div class="_2lVoQ1">
                                    <div class="_1limL3">
                                        <div>
                                            <span class="_1BJEKe">
                                                <div></div>
                                                <div class="_3huAcN">
                                                    <div class="_3btL3m">
                                                        <div class="shopee-image__wrapper">
                                                            <div class="shopee-image__place-holder">
                                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                                                    <g>
                                                                        <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                                                        <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="shopee-image__content" style="background-image: url('${base_url}assets/img/produk_penjual/${val.foto_produk1}');"><div class="shopee-image__content--blur"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY"><span class="_30COVM">${val.nama_produk}</span></div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x${val.jumlah_produk}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_1kvNGb">
                                                    <div><span class="mBERmM">${to_rupiah(val.harga)}</span></div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="_3tEHtP"></div>
                                    </div>
                                </div>
                            </a>
                            <div class="h_Pf2y"></div>
                        </div>
                    </div>
                    <div class="_1J7vLy">
                        <div class="DI-rNr tyOBoQ"></div>
                        <div class="DI-rNr _25igL4"></div>
                    </div>
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z"
                                            fill="url(#paint0_linear)"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z"
                                            fill="#FEFEFE"
                                        ></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F53D2D"></stop>
                                                <stop offset="1" stop-color="#F63"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </span>
                            <div class="_1mmoh8">Total Pesanan:</div>
                            <div class="_1MS3t2">${to_rupiah(val.subtotal)}</div>
                        </div>
                    </div>
                    
                </div>

                `
                })
                var h = document.getElementById("status_sedang_dikemas");
                h.innerHTML = menunggu_pembayaran;
                document.getElementById('status_sedang_dikemas').style.display = "contents";
            })
    }

    function tampil_status_sedang_dikemas(kode) {
        var menunggu_pembayaran = '';
        $.getJSON(link_profil + '/load_status_dalam_pengiriman/' + kode, {
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(key, val) {
                    menunggu_pembayaran += `
                <div class="_2n4gHk">
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                              
                          
                            </div>
                            <div class="_39XDzv"></div>
                            <a href="${base_url}user/purchase/order/${val.id_order}" style="text-decoration:none;">
                                <div class="_2lVoQ1">
                                    <div class="_1limL3">
                                        <div>
                                            <span class="_1BJEKe">
                                                <div></div>
                                                <div class="_3huAcN">
                                                    <div class="_3btL3m">
                                                        <div class="shopee-image__wrapper">
                                                            <div class="shopee-image__place-holder">
                                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                                                    <g>
                                                                        <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                                                        <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="shopee-image__content" style="background-image: url('${base_url}assets/img/produk_penjual/${val.foto_produk1}');"><div class="shopee-image__content--blur"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY"><span class="_30COVM">${val.nama_produk}</span></div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x${val.jumlah_produk}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_1kvNGb">
                                                    <div><span class="mBERmM">${to_rupiah(val.harga)}</span></div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="_3tEHtP"></div>
                                    </div>
                                </div>
                            </a>
                            <div class="h_Pf2y"></div>
                        </div>
                    </div>
                    <div class="_1J7vLy">
                        <div class="DI-rNr tyOBoQ"></div>
                        <div class="DI-rNr _25igL4"></div>
                    </div>
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z"
                                            fill="url(#paint0_linear)"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z"
                                            fill="#FEFEFE"
                                        ></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F53D2D"></stop>
                                                <stop offset="1" stop-color="#F63"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </span>
                            <div class="_1mmoh8">Total Pesanan:</div>
                            <div class="_1MS3t2">${to_rupiah(val.subtotal)}</div>
                        </div>
                    </div>
                    
                </div>

                `
                })
                var i = document.getElementById("status_dalam_pengiriman");
                i.innerHTML = menunggu_pembayaran;
                document.getElementById('status_dalam_pengiriman').style.display = "contents";
            })
    }

    function tampil_status_sudah_sampai(kode) {
        var menunggu_pembayaran = '';
        $.getJSON(link_profil + '/load_status_sudah_sampai/' + kode, {
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(key, val) {
                    menunggu_pembayaran += `
                <div class="_2n4gHk">
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                              
                          
                            </div>
                            <div class="_39XDzv"></div>
                            <a href="${base_url}user/purchase/order/${val.id_order}" style="text-decoration:none;">
                                <div class="_2lVoQ1">
                                    <div class="_1limL3">
                                        <div>
                                            <span class="_1BJEKe">
                                                <div></div>
                                                <div class="_3huAcN">
                                                    <div class="_3btL3m">
                                                        <div class="shopee-image__wrapper">
                                                            <div class="shopee-image__place-holder">
                                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                                                    <g>
                                                                        <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                                                        <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="shopee-image__content" style="background-image: url('${base_url}assets/img/produk_penjual/${val.foto_produk1}');"><div class="shopee-image__content--blur"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY"><span class="_30COVM">${val.nama_produk}</span></div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x${val.jumlah_produk}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_1kvNGb">
                                                    <div><span class="mBERmM">${to_rupiah(val.harga)}</span></div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="_3tEHtP"></div>
                                    </div>
                                </div>
                            </a>
                            <div class="h_Pf2y"></div>
                        </div>
                    </div>
                    <div class="_1J7vLy">
                        <div class="DI-rNr tyOBoQ"></div>
                        <div class="DI-rNr _25igL4"></div>
                    </div>
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z"
                                            fill="url(#paint0_linear)"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z"
                                            fill="#FEFEFE"
                                        ></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F53D2D"></stop>
                                                <stop offset="1" stop-color="#F63"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </span>
                            <div class="_1mmoh8">Total Pesanan:</div>
                            <div class="_1MS3t2">${to_rupiah(val.subtotal)}</div>
                        </div>
                    </div>
                    
                </div>

                `
                })
                var j = document.getElementById("status_sudah_sampai");
                j.innerHTML = menunggu_pembayaran;
                document.getElementById('status_dalam_pengiriman').style.display = "contents";
            })
    }

    function alamat_baru() {
        $('#modal_alamat').modal('show');
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
        return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
    }

    function getLokasi() {

        var $op = $("#prov_asal"),

            $op1 = $("#prov_tujuan");



        $.getJSON("<?php echo base_url() ?>provinsi", function(data) {

            $.each(data, function(i, field) {



                $op.append('<option value="' + field.province_id + '">' + field.province_id + '</option>');

                $op1.append('<option value="' + field.province_id + '" nama_provinsi="' + field.province + '">' + field.province + '</option>');

            });



        });





    }



    getLokasi();







    function getKota(idpro) {

        var $op = $("#kota_tujuan");



        $.getJSON("<?php echo base_url() ?>kota/" + idpro, function(data) {

            $.each(data, function(i, field) {





                $op.append('<option value="' + field.city_id + '" nama_kota="' + field.type + ' ' + field.city_name + '">' + field.type + ' ' + field.city_name + '</option>');



            });



        });



    }

    function ubah_alamat(id) {
        $('#modal_alamat_edit').modal('show');
        $.ajax({
            url: link_profil + "/ajax_edit_alamat/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(result) {

                $('#id_detail_alamat').val(result.id_detail_alamat);
                $('#nama_lengkap_id').val(result.nama_lengkap);
                $('#no_telp_id').val(result.no_telp);
                $('#kode_pos_id').val(result.kode_pos);
                $('#alamat_id').val(result.alamat);
                $('#provinsi_id').val(result.provinsi);
                $('#kota_id').val(result.kota);

                loadProvinsi(result.province_id, '#desprovince');
                loadCity2(result.city_id, '#kota_kab', result.province_id);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function loadProvinsi(idprovince, id) {

        $.ajax({
            url: '<?php echo base_url("user/home/showprovince"); ?>',
            dataType: 'json',
            success: function(response) {
                $(id).html('');
                province = '';
                // province = '<option> -- Pilih Provinsi-- </option>';
                province = province + '';
                $(id).append(province);

                $.each(response['rajaongkir']['results'], function(i, n) {
                    if (idprovince == n['province_id']) {
                        province = '<option value="' + n['province_id'] + '" selected>' + n['province'] + '</option>';
                    } else {
                        province = '<option value="' + n['province_id'] + '">' + n['province'] + '</option>';
                    }
                    province = province + '';
                    $(id).append(province);
                    //$('#nama_provinsi').val(n['province']);
                });
            },
            error: function() {
                alert('ERROR ! Check your internet connection');
                //$(id).html('ERROR');
            }
        });
    }


    function loadCity2(idcity2, id, idprovince2) {

        $.ajax({
            url: '<?php echo base_url("user/home/showcity2"); ?>' + '/' + idprovince2,
            dataType: 'json',
            data: {
                province: idprovince2
            },
            success: function(response) {

                $(id).html('');
                city = '';

                // city = '<option >-- Pilih Kota --</option>';
                city = city + '';
                $(id).append(city);
                $.each(response['rajaongkir']['results'], function(i, n) {
                    console.log('idcity', idcity2);
                    if (idcity2 == n['city_id']) {
                        city = '<option value="' + n['city_id'] + '" selected>' + n['type'] + " " + n['city_name'] + '</option>';
                    } else {
                        city = '<option value="' + n['city_id'] + '">' + n['type'] + " " + n['city_name'] + '</option>';
                    }
                    //console.log('postal_code', n['postal_code']);
                    city = city + '';
                    $(id).append(city);
                    //$('#kode_pos').val(n['postal_code']);
                    //$('#nama_kota').val(n['type']+" "+n['city_name']);
                });
            },
            error: function() {
                $(id).html('ERROR');
            }
        });
    }


    function getSelectedText(elementId) {
        var elt = document.getElementById(elementId);

        if (elt.selectedIndex == -1)
            return null;
        var selected = elt.options[elt.selectedIndex].text;
        return selected;
    }

    function hapus_alamat(id) {
        if (confirm('Are you sure delete this data?')) {
            $.ajax({
                url: "<?php echo site_url('user/home/ajax_delete_alamat') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    swal_berhasil();

                    setTimeout(function() {
                        tampil_alamat();
                    }, 1000);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: "ERROR",
                        text: "Error delete data",
                        type: "warning",
                        closeOnConfirm: true
                    });
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled', false);
                }
            });
        }
    }

    function cek_password(val) {

        // console.log('<?php echo base_url("Registrasi/cekref/"); ?>/'+val);

        $.ajax({

            url: '<?php echo base_url("user/home/cekpassword/"); ?>/' + val,

            dataType: 'json',

            success: function(response) {

                // console.log(response);

                if (response == "true") {

                    document.getElementById('erpr2').removeAttribute('style');

                    document.getElementById('spassnext').removeAttribute('disabled');

                    $("#dur_pass2").attr('class', 'col-sm-10 has-success');

                    $("#scpr2").attr('style', 'display: none;');

                    $('[name="cekemailin"]').val('0');


                    // console.log('benar');

                } else {

                    document.getElementById('scpr2').removeAttribute('style');

                    $("#dur_pass2").attr('class', 'col-sm-10 has-error');

                    $("#erpr2").attr('style', 'display: none;');

                    $('[name="cekemailin"]').val('1');

                    $("#spassnext").attr('disabled', 'disabled');

                    // console.log('salah');

                }

            },

            error: function() {

                alert('ERROR ! Check your internet connection');

                //$(id).html('ERROR');

            }

        });

    }

    function konf_password() {
        var password_baru = $('#password_baru').val();
        var konfirmasi_password = $('#konfirmasi_password').val();

        if (password_baru != konfirmasi_password) {

            document.getElementById('scpr23').removeAttribute('style');

            $("#dur_pass23").attr('class', 'col-sm-10 has-error');

            $("#erpr23").attr('style', 'display: none;');

            //$('[name="cekemailin"]').val('1');

            $("#spassnext").attr('disabled', 'disabled');

        } else {



            document.getElementById('erpr23').removeAttribute('style');

            document.getElementById('spassnext').removeAttribute('disabled');

            $("#dur_pass23").attr('class', 'col-sm-10 has-success');

            $("#scpr23").attr('style', 'display: none;');

            // console.log('salah');

        }
    }
</script>

<div class="modal fade" id="modal_alamat">
    <div class="modal-dialog modal-md">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" style="display: flex;"> Alamat Baru </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-alamat" action="<?php echo base_url('user/home/simpan_alamat') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="fc_kdbooking" id="kode_booking">
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap">
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No Telp" name="no_telp">
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col">
                            <select name="provinsi" id="prov_tujuan" class="form-control" required oninvalid="this.setCustomValidity('Provinsi belum dipilih')" oninput="setCustomValidity('')">

                                <option value="" disabled selected hidden>pilih provinsi</option>

                            </select>
                        </div>
                        <div class="col">
                            <select name="kota_order" id="kota_tujuan" class="form-control" disabled required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">

                                <option value="" disabled selected hidden>pilih kota/kab</option>

                            </select>
                        </div>
                    </div><br />
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Alamat Lengkap..." rows="3" name="alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" id="nama_provinsi" name="nama_provinsi">
                    <input type="hidden" id="nama_kota" name="nama_kota">
                    <button type="submit" id="BtnAlamat" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_alamat_edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" style="display: flex;"> Edit Alamat </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-update-alamat" action="<?php echo base_url('user/home/update_alamat') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_detail_alamat" id="id_detail_alamat">
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" id="nama_lengkap_id">
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No Telp" name="no_telp" id="no_telp_id">
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col">
                            <select name="provinsi" id="desprovince" class="form-control" required oninvalid="this.setCustomValidity('Provinsi belum dipilih')" oninput="setCustomValidity('')">

                                <option value="" disabled selected hidden>pilih provinsi</option>

                            </select>
                            <input type="hidden" name="nama_provinsi" id="provinsi_id">
                        </div>

                        <div class="col">
                            <select name="kota_order" id="kota_kab" class="form-control" disabled required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">

                                <option value="" disabled selected hidden>pilih kota/kab</option>

                            </select>
                            <input type="hidden" name="nama_kota" id="kota_id">
                        </div>
                    </div><br />
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" id="kode_pos_id">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Alamat Lengkap..." rows="3" name="alamat" id="alamat_id"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="BtnAlamat2" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>