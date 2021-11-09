<?php echo $this->session->flashdata('item'); ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsepanduan" aria-expanded="true" aria-controls2">
          Panduan
        </a>
      </h4>
    </div>
    <div id="collapsepanduan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <form action="<?php echo base_url('profil/update_panduan/1') ?>" method="POST">
          <textarea name='panduan' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data3[0]->panduan ?></textarea>
          <br>
          <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading2">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse_deskripsi" aria-expanded="true" aria-controls="collapse2">
          Deskripsi
        </a>
      </h4>
    </div>
    <div id="collapse_deskripsi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
      <div class="panel-body">
        <form action="<?php echo base_url('profil/update_deskripsi/1') ?>" method="POST">
          <textarea name='deskripsi' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data1[0]->tentang ?></textarea>
          <br>
          <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Contact
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url('profil/update_contact') ?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
            <div class="col-sm-10">
              <input type="number" name="telp" class="form-control" required="" id="inputEmail3" placeholder="No Telp" value="<?php echo $data[0]['no_telp'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
              <textarea name="alamat" class="form-control" required=""><?php echo $data[0]['alamat'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>
            <div class="col-sm-10">
              <select name="provinsi" id="prov_tujuan" class="form-control" required oninvalid="this.setCustomValidity('Provinsi belum dipilih')" oninput="setCustomValidity('')">
                <option value="" disabled selected hidden>pilih provinsi</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kota/Kab</label>
            <div class="col-sm-10">
              <select name="kota" id="kota_tujuan" class="form-control" required oninvalid="this.setCustomValidity('Kota/Kab belum dipilih')" oninput="setCustomValidity('')">
                <option value="" disabled selected hidden>pilih kota</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" required="" placeholder="Email" value="<?php echo $data[0]['Email'] ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function getLokasi() {
    var $op1 = $("#prov_tujuan");

    $.getJSON("provinsi", function(data) {
      $.each(data, function(i, field) {

        var provinsi = '<?php echo $data[0]['provinsi'] ?>';
        if (field.province_id == provinsi) {
          $op1.append('<option value="' + field.province_id + '"selected >' + field.province + '</option>');
        } else {
          $op1.append('<option value="' + field.province_id + '">' + field.province + '</option>');
        }

      });

    });

  }
  getLokasi();

  $("#prov_tujuan").on("change", function(e) {
    e.preventDefault();
    var provinsi = $('option:selected', this).attr('nama_provinsi');
    var option = $('option:selected', this).val();
    $('#kota_tujuan option:gt(0)').remove();

    $("input[name=lbl_prov]").val(provinsi);

    if (option === '') {
      alert('null');
      $("#kota_tujuan").prop("disabled", true);
      $("#kurir").prop("disabled", true);
    } else {
      $("#kota_tujuan").prop("disabled", false);
      getKota(option);
    }
  });

  $("#kota_tujuan").on("change", function(e) {
    e.preventDefault();
    var kota = $('option:selected', this).attr('nama_kota');
    $('#kurir').val('');

    $("input[name=lbl_kota]").val(kota);
    // var prov = $('option:selected', this).val();

  });

  function getKota(idpro) {
    var $op = $("#kota_tujuan");

    $.getJSON("kota/" + idpro, function(data) {
      $.each(data, function(i, field) {

        $op.append('<option value="' + field.city_id + '"nama_kota="' + field.type + ' ' + field.city_name + '">' + field.type + ' ' + field.city_name + '</option>');

      });

    });

  }
  var prov_ = document.getElementById('prov_tujuan').value;
  getKota(prov_);
</script>