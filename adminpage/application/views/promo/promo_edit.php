<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
    <h2>Ubah Promo</h2>
    <form method=POST action="<?php echo base_url() . 'promo/edit/' ?>" enctype="multipart/form-data">
        <table class='table table-hover'>
            <?php foreach ($edit_promo as $r) : ?>
                <tbody>
                    <tr>
                        <td class='left'>ID Promo</td>
                        <td>
                            <input disabled type=text name='id_promo' id="id_promo" size=60 value="<?php echo $r['id_produk_promo']; ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Nama Produk</td>
                        <td>
                            <input disabled type=text name='produk' id="nama_produk" size=60 value="<?php echo $r['nama_produk']; ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Harga</td>
                        <td>
                            <input disabled type=number min=1 name='harga' id="harga" size=60 value="<?php echo $r['harga']; ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Harga Promo</td>
                        <td>
                            <input type=number min=1 name='harga_promo' id="" size=60 value="<?php echo $r['harga_promo']; ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Tanggal Mulai</td>
                        <td>
                            <input type='text' onfocus="(type='datetime-local')" min=1 name='tgl_mulai' id="" size=60 value="<?php echo $r['tgl_mulai'] ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left'>Tanggal Selesai</td>
                        <td>
                            <input type='text' onfocus="(type='datetime-local')" name='tgl_selesai' id="jumlah" size=10 value="<?php echo $r['tgl_selesai']; ?>" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class='left' colspan=2>
                            <input type=hidden name='id_produk' id="nama" size=60 value="<?php echo $r['id_produk']; ?>" required readonly>
                            <input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
                            <input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
    </form>
    </form>
    </table>
    </form>
</div>
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