<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body ">
    <h2>Tambah Promo</h2>
    <form method=POST action="<?php echo base_url() . 'promo/save' ?>" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class='table'>
                <tbody>
                    <tr>
                        <td class='left'>Kategori Produk</td>
                        <td>
                            <select name="kategori_produk" id="kategori" class="form-control" required>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="" disabled selected hidden>pilih kategori produk</option>
                                    <option value="<?php echo $k['id_kategori_produk'] ?>"><?php echo ucwords($k['nama_kategori_produk']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Nama Produk</td>
                        <td><select name="produk" id="produk" class="form-control">
                                <option value="" disabled selected hidden>pilih produk</option>
                            </select></td>
                        <!-- <td><input type=text name='nama_produk' id="nama" class="form-control" required placeholder="nama produk"></td> -->
                    </tr>
                    <tr>
                        <td class='left'>Harga Produk</td>
                        <td><input type=number name='harga_produk' id="harga_produk" class="form-control" required placeholder="harga produk"></td>
                    </tr>
                    <tr>
                        <td class='left'>Harga Promo</td>
                        <td><input type=number min=1 name='harga_promo' class="form-control" required placeholder="harga promo"></td>
                    </tr>
                    <tr>
                        <td class='left'>Tanggal Mulai</td>
                        <td><input type="text" onfocus="(type='datetime-local')" name='tgl_mulai' id="harga" class="form-control" required placeholder="Tanggal mulai promo"></td>
                    </tr>
                    <tr>
                        <td class='left'>Tanggal Selesai</td>
                        <td><input type="text" onfocus="(type='datetime-local')" name='tgl_selesai' id="harga" class="form-control" required placeholder="Tanggal selesai promo"></td>
                    </tr>
                    <tr>
                        <td class='left' colspan=2>
                            <input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
                            <input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#kategori").change(function() {

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("promo/get_produk"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id: $("#kategori").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    $("#produk").html(response.list_produk).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
        $("#produk").change(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("promo/get_harga"); ?>",
                data: {
                    id: $("#produk").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {

                    var harga = response.harga;
                    document.getElementById("harga_produk").value = harga;
                    // document.getElementById("harga").disabled = true;
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>

<script>
    function readURL(id, input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id)
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
            $("#" + id).show();
        }
    }
</script>