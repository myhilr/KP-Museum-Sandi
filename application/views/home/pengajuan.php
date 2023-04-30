
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
  
<style>
.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}

.cc-selector-2 input{
    position:absolute;
    z-index:999;
}

.visa{background-image:url(<?php echo base_url()?>asset/images/kelas.png);}
.mastercard{background-image:url(<?php echo base_url()?>asset/images/kotak.png);}
.visa1{background-image:url(<?php echo base_url()?>asset/images/openn.png);}
.mastercard1{background-image:url(<?php echo base_url()?>asset/images/teater.png);}
.mastercard2{background-image:url(<?php echo base_url()?>asset/images/free.png);}

.cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:250px;height:250px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);

            
}

#layout{
    display: none;
}

#layout1{
    display: none;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#pendidikan").change(function(){
    if($(this).val() == "SMA/MA"){
      $("#layout").show();
    }
    if($(this).val() == "SMK"){
      $("#layout").show();
    }
    if($(this).val() == "Universitas"){
      $("#layout").show();
    }    
});
    });
</script>

<div class="mt-3 pt-1">
    <div class="card-body mt-5">
        <div class="container-fluid">
            <h1 class="mt-5 mb-4"><b>PENDAFTARAN MAGANG</b></h1>
            
            
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert-success">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Home</a></li>
                            <li class="breadcrumb-item active">Pendaftaran Magang</li>
                        </ol>
                    <div class="card mb-4 mt-2">
                        <div class="card-body">
                        <form action="<?php echo base_url(); ?>fullcalendar/insert_home" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Lengkap <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <label for="exampleFormControlSelect1" >Pendidikan<label class="text-danger">*</label></label> 
                                <select class="custom-select" name="pendidikan" id="pendidikan" required>
                                <option value="">Pilih Pendidikan</option>
                                <option value="SMA/MA">SMA/MA</option>
                                <option value="SMK">SMK</option>
                                <option value="Universitas">Universitas</option>
                                
                                </select>
                            </div>
                            <div id="layout">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Asal Sekolah/ Universitas <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="asal" name="asal" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jurusan <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address <label class="text-danger">*</label></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">No. Telepon <label class="text-danger">*</label></label>
                                <input type="text" class="form-control" id="notelp" name="notelp" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload CV <label class="text-danger">*</label></label>
                                <input type="file" class="form-control-file" id="file1" name="file1" accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Surat Permohonan <label class="text-danger">*</label></label>
                                <input type="file" class="form-control-file" id="file" name="file" accept=".pdf" required>
                            </div>
                        
                            <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Mulai Magang <label class="text-danger">*</label> </label>
                                <div class="col-12">
                                    <input class="form-control" name="mulai" id="mulai" type="date" required>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-datetime-local-input" class="col-3 col-form-label">Tanggal Selesai Magang <label class="text-danger">*</label></label>
                                <div class="col-12">
                                    <input class="form-control" name="akhir" id="akhir" type="date" required>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="test6" data-toggle="modal" data-target="#myModal" required>
                                    Setuju dengan <a href="<?php echo base_url(); ?>home/ketentuan" target="_blank">Syarat dan Ketentuan</a>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="test6" required>
                                    Dengan ini saya bersedia mengikuti aturan dan budaya kerja Museum Sandi
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3 btn-block">KIRIM</button>
                        </form> 
                        
                               
                    </div>
                </div>           
            </div>
        </div>  


        <!-- Modal -->
<div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><b>Silahkan Download Buku Panduan Magang Museum Sandi</b></h4>
      </div>
      <div class="modal-body">
      <a class="btn btn-primary btn-xl js-scroll-trigger ml-3" href="<?php echo base_url().'index.php/Home/panduan' ?>">Download file</a>
      </div>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><b>Proses Pra-Magang Museum Sandi</b></h4>
      </div>
      <div class="modal-body">
                1. Mengirim CV dan surat permohonan internship dari universitas/kampus<br><br>
                2. Wawancara <br><br>
                3. Mendapat surat balasan (diterima atau tidak diterima) <br><br>
                4. Pembekalan <br><br>
                5. Masuk <br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
    
      </div>
    </div>
  </div>
</div>

       