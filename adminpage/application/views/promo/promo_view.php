<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.css') ?>" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">
    <!-- Latest compiled and minified Locales -->
    <script src="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>

    <?php echo $this->session->flashdata('item'); ?>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h2 style="margin-top:0px">Promo</h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('promo/add'), 'Tambah Promo', 'class="btn btn-primary"'); ?>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover" data-toggle="table" data-url="<?php echo site_url('promo/get_promo'); ?>" data-search="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true">
        <thead>
            <tr>
                <th data-formatter="number_counter">No</th>
                <th data-field="id_promo" data-sort-order="DESC">ID Promo</th>
                <th data-field="id_produk">ID Produk</th>
                <th data-field="nama_produk">Nama Produk</th>
                <th data-field="harga">Harga</th>
                <th data-field="harga_promo">Harga Promo</th>
                <th data-field="tgl_mulai">Tanggal Mulai</th>
                <th data-field="tgl_selesai">Tanggal Selesai</th>
                <!-- <th data-field="status">Status</th> -->
                <th class="text-center" data-field="id_produk | nama_produk" data-formatter="action_promo" data-width="150">Opsi</th>
            </tr>
        </thead>
    </table>


    <script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>

    <script type="text/javascript">
        function number_counter(value, row, index) {
            return index + 1;
        }

        function action_promo(value, row, index) {
            var edit = "<?= base_url("promo/edit_promo/") ?>/" + row.id_produk;
            return '<div class="btn-group" role="group" aria-label="..."><a href="' + edit + '" class="btn btn-success">Edit</div>'
        }

        function set_modal(id_produk, nama_produk) {
            console.log('<button onclick="set_modal(\'' + id_produk + '\',\'' + nama_produk + '\')" class="btn btn-warning" >');

            $("#id_produk_pajak").val(id_produk);
            $("#nama_produk_pajak").val(nama_produk);
            $("#modal_pajak").modal('show');
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var t = $('#mytable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo site_url('produk/ajax_tabel'); ?>",
                "columns": [{
                        "data": null,
                        "class": "text-center",
                        "orderable": false
                    },
                    //  {"data": ""},   
                    {
                        "data": "id_produk"
                    },
                    {
                        "data": "nama_produk"
                    },
                    {
                        "data": "kode_produk"
                    },
                    {
                        "data": "nama_kategori_produk"
                    },
                    {
                        "data": "harga"
                    },
                    {
                        "data": "berat"
                    },
                    {
                        "data": "deskripsi"
                    },
                    {
                        "data": "stok"
                    },
                    {
                        "data": "jumlah"
                    },
                    {
                        "class": "text-center",
                        "data": "foto"
                    },
                    {
                        "class": "text-center",
                        "data": "aksi"
                    }
                    // {
                    //  "class": "text-center",
                    //  "data": "hapus"
                    // }
                ],
                "order": [
                    [1, 'asc']
                ],
                "rowCallback": function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }

            });
        });
    </script>
</body>

</html>