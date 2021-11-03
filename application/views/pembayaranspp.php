<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-WIXa4ZorDyT_Kxot"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Aplikasi pembayaran spp</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Aplikasi pembayaran spp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
    <div class="container-fluid">
    <div class="row">
        <form id="payment-form" method="post" action="<?=site_url()?>midtrans/snap/finishspp">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Siswa</label>
            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="Nama Siswa" id="nama">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kelas</label>
            <select class="form-control" name="kelas" id="kelas">
                <option value="VII">Kelas 7</option>
                <option value="VIII">Kelas 8</option>
                <option value="XI">Kelas 9</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jumlah Bayar</label>
            <input type="text" class="form-control" name="jmlbayar" id="jmlbayar" aria-describedby="emailHelp" placeholder="Jumlah Bayar">
        </div>
        <button class="btn btn-primary" id="pay-button">Bayar!</button>
        </form><br /><br />
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Gross Amount</th>
                    <th>Payment Type</th>
                    <th>Bank</th>
                    <th>Va Number</th>
                    <th>Transaction Time</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>  
            </thead>  
            <tbody>
                <?php foreach($midtrans as $s){?>
                    <td><?php echo $s->order_id?></td>
                    <td><?php echo $s->nama?></td>
                    <td><?php echo $s->kelas?></td>
                    <td><?php echo $s->gross_amount?></td>
                    <td><?php echo $s->payment_type?></td>
                    <td><?php echo $s->bank?></td>
                    <td><?php echo $s->va_number?></td>
                    <td><?php echo $s->transaction_time?></td>
                    <td>
                        <?php 
                            if($s->status_code == "200"){
                        ?>
                            <span class="badge bg-success">Sukses</span>
                        <?php  }else{?>
                            <span class="badge bg-warning">Pending</span>
                        <?php } ?>    
                    </td>
                    <td>
                        <a href="<?php echo $s->pdf_url?>" target="_blank" class="btn btn-success btn-sm">Download</a>
                    </td>
                <?php }?>
            </tbody>
        </table>    
    </div>    
    </div>
    <script type="text/javascript">
  
        $('#pay-button').click(function (event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var nama = $('#nama').val();
        var kelas = $('#kelas').val();
        var jmlbayar = $('#jmlbayar').val();    
        $.ajax({
        type : "POST",    
        url: '<?=site_url()?>midtrans/snap/tokenspp',
        data : {
            nama : nama,
            kelas : kelas,
            jmlbayar : jmlbayar
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = '+data);
            
            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {
            
            onSuccess: function(result){
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onPending: function(result){
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            }
            });
        }
        });
    });

    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>