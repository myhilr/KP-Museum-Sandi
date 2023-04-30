<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
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
    // if($(this).val() == "Pendopo Kecamatan"){
    //   $("#layout").show();
    // }
    // if($(this).val() == "SMA/MA"){
    //   $("#layout").show();
    // }
    // if($(this).val() == "Taman Keluarga"){ 
    //     $("#layout").show();
    // }
    
});
    });
</script>
             
             


<div class="card-body">
    <div class="container-fluid">
    <h1 class="mt-4 mb-4"><b>Ubah Jadwal</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ubah Jadwal</li>
                        </ol>
                        <?php foreach($jadwal as $j): ?>
                    <div class="card mb-4 mt-2">
                        <div class="card-body">
                        <form action="<?php echo base_url(); ?>fullcalendar/edit/<?= $j['id_permohonan']; ?>" enctype="multipart/form-data" method="POST">
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
                                <label for="exampleFormControlInput1">Fakultas <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jurusan <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">NIM/ NIS <label class="text-danger">*</label></label> 
                                <input type="text" class="form-control" id="nim" name="nim" required>
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
                                <label for="exampleFormControlFile1">Upload CV</label><br>
                                <iframe src="<?php echo base_url('upload/'.$j['cv'])?>" width="1090" height="842"><br></iframe>
                                <span class="badge badge-danger">Biarkan kosong jika tidak diganti</span><br>
                                <input type="file" class="form-control-file mt-2 mb-1" id="file1" name="file1" >File sebelumnya : <?= $j['cv'] ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Surat Permohonan</label><br>
                                <iframe src="<?php echo base_url('upload/'.$j['surat'])?>" width="1090" height="842"><br></iframe>
                                <span class="badge badge-danger">Biarkan kosong jika tidak diganti</span><br>
                                <input type="file" class="form-control-file mt-2 mb-1" id="file" name="file" >File sebelumnya : <?= $j['surat'] ?>
                            </div>
                        
                            <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-12">
                                    <input class="form-control" name="mulai" id="mulai" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime($j['mulai'])); ?>">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Berakhir</label>
                                <div class="col-12">
                                    <input class="form-control" name="akhir" id="akhir" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime($j['akhir'])); ?>" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 btn-block">UBAH</button>
                        </form>

                        </div>
                    </div> 
                    <?php endforeach; ?>          
         </div>
</div>


</html>
