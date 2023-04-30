
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    

<div class="mt-3 pt-1">
<div class="card-body mt-5">
<div class="container-fluid">
<h1 class="mt-5 mb-4"><b>CEK STATUS PENGAJUAN </b></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Home</a></li>
                        <li class="breadcrumb-item active">Cek Status</li>
                    </ol>
<div class="card mb-4 mt-2">
                    <div class="card-body">
                    <form action="<?php echo base_url('home/hasil')?>" action="GET">
                    
                        <div class="row ml-0">
                            <div class="column"><input type="text" class="form-control" id="cari" name="cari" placeholder="masukan email atau nomor telepon" required="required"></div>
                            <div class="column ml-2"> <button type="submit"  class="btn btn-primary mb-2">Cek</button></div>
                        </div>
                    </form>
                    <hr>
                   
                    
                    
                    </div>
</div>           
</div>
</div>