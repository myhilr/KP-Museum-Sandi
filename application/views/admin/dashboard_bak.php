<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->


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

                    <div class="container-fluid">

                        <h1 class="mt-1"><b>Dashboard</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body font-weight-bold">SMA/MA</div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('dashboard/act');?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body font-weight-bold">SMK</div>


                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('dashboard/pkk');?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body font-weight-bold">Universitas</div>


                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('dashboard/rr');?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Permohonan Pendaftaran Peserta Magang Terbaru
                            </div>

                            <div class="card-body">
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">
                            Tambah Jadwal
                            </button>
                           <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Tgl Pengajuan</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <th>Jurusan</th>
                                                <th>Email</th>
                                                <th>No.Telp</th>
                                                <th>CV</th>
                                                <th>Surat</th>
                                                <th>Mulai</th>
                                                <th>Akhir</th>
                                                <th>Aksi</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($permohonan->result_array() as $p) : ?>
                                            <tr>
                                                <td><?= $p['tgl']; ?></td>
                                                <td><?= $p['nama']; ?></td>
                                                <td><?php
                                                    if($p['pendidikan']=='SMA/MA'){
                                                    ?>
                                                           <a href="<?php echo base_url('dashboard/act');?>"> <button type="button"  class="btn btn-primary btn-block">SMA/MA</button></a></td>
                                                    <?php

                                                        }
                                                        else if($p['pendidikan']=='SMK')
                                                        {
                                                    ?>
                                                            <a href="<?php echo base_url('dashboard/pkk');?>"> <button type="button" class="btn btn-warning btn-block">SMK</button></a></td>
                                                    <?php

                                                        }
                                                        else if($p['pendidikan']=='Universitas')
                                                        {
                                                    ?>
                                                            <a href="<?php echo base_url('dashboard/rr');?>"> <button type="button" class="btn btn-success btn-block">Universitas</button></a></td>
                                                    <?php

                                                        }
                                                ?>
                                                </td>
                                                <td><?= $p['asal']; ?></td>
                                                <td><?= $p['jurusan']; ?></td>
                                                <td><?= $p['email']; ?></td>
                                                <td><?= $p['notelp']; ?></td>
                                                <td><a href="<?php echo base_url('upload/' . $p['cv']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                                <td><a href="<?php echo base_url('upload/' . $p['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                                <td><?= $p['mulai']; ?></td>
                                                <td><?= $p['akhir']; ?></td>
                                                <th>
                                                    <?php

                                                            if($p['status']==0){
                                                                echo "Sedang diproses";
                                                            ?>
                                                            </th>
                                                            <td>

                                                                <a href="<?= base_url(); ?>dashboard/approve/<?= $p['id']; ?>">Approve</a>
                                                                |
                                                                <a href="<?= base_url(); ?>dashboard/decline/<?= $p['id']; ?>">Decline</a>


                                                            </td>

                                                            <?php

                                                            }
                                                            else if($p['status']==1)
                                                            {
                                                                echo "Diterima";
                                                                ?>
                                                                <td></td>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                echo "Ditolak";
                                                                ?>
                                                                <td></td>
                                                                <?php
                                                            }
                                                    ?>
                                                </th>
                                                <th>

                                                            <!-- <?php foreach ($jadwal->result_array() as $q) : ?>
                                                                <?php if(($p['pendidikan'] == $q['pendidikan'] && $p['mulai']>$q['mulai'] && $p['mulai']<$q['akhir']) || ($p['pendidikan'] == $q['pendidikan'] && $p['akhir']>$q['mulai'] && $p['akhir']<$q['akhir']))
                                                                { ?>
                                                                   <div class="p-1 mb-1 bg-danger text-white">ADA JADWAL YANG SAMA</div>
                                                                <?php } ?>
                                                            <?php endforeach; ?> -->
                                                </th>

                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Tgl Pengajuan</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <th>Jurusan</th>
                                                <th>Email</th>
                                                <th>No.Telp</th>
                                                <th>CV</th>
                                                <th>Surat</th>
                                                <th>Mulai</th>
                                                <th>Akhir</th>
                                                <th>Aksi</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Daftar Peserta Magang
                            </div>
                            <div class="card-body">
                            <a href="<?php echo base_url() ?>dashboard/export" class="btn btn-primary" style="float:left;">Export Jadwal</a>
                                <div class="table-responsive mt-5">

                                    <table class="table table-bordered" id="tabel-data2" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>Tgl Acc</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <th>Jurusan</th>
                                                <th>Email</th>
                                                <th>No.Telp</th>
                                                <th>CV</th>
                                                <th>Surat</th>
                                                <th>Mulai</th>
                                                <th>Akhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($jadwal->result_array() as $j) : ?>
                                            <tr>
                                                <td><?= $j['tanggal_approve']; ?></td>
                                                <td><?= $j['nama']; ?></td>
                                                <td><?php
                                                    if($j['pendidikan']=='SMA/MA'){
                                                    ?>
                                                           <a href="<?php echo base_url('dashboard/act');?>"> <button type="button"  class="btn btn-primary btn-block">SMA/MA</button></a></td>
                                                    <?php

                                                        }
                                                        else if($j['pendidikan']=='SMK')
                                                        {
                                                    ?>
                                                            <a href="<?php echo base_url('dashboard/pkk');?>"> <button type="button" class="btn btn-warning btn-block">SMK</button></a></td>
                                                    <?php

                                                        }
                                                        else if($j['pendidikan']=='Universitas')
                                                        {
                                                    ?>
                                                            <a href="<?php echo base_url('dashboard/rr');?>"> <button type="button" class="btn btn-success btn-block">Universitas</button></a></td>
                                                    <?php

                                                        }
                                                ?>
                                                </td>
                                                <td><?= $j['asal']; ?></td>
                                                <td><?= $j['jurusan']; ?></td>
                                                <td><?= $j['email']; ?></td>
                                                <td><?= $j['notelp']; ?></td>
                                                <td><a href="<?php echo base_url('upload/' . $j['cv']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                                <td><a href="<?php echo base_url('upload/' . $j['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                                <td><?= $j['mulai']; ?></td>
                                                <td><?= $j['akhir']; ?></td>
                                                <td><a href="<?= base_url(); ?>dashboard/edit/<?= $j['id']; ?>" class="btn btn-success" role="button"><i class="fa  fa-wrench" aria-hidden="true"></i></a> <a href="<?= base_url(); ?>dashboard/delete/<?= $j['id_permohonan']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Yakin ingin menghapus jadwal?')"><i class="fa fa-eraser"></i></a></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Tgl Acc</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <th>Jurusan</th>
                                                <th>Email</th>
                                                <th>No.Telp</th>
                                                <th>CV</th>
                                                <th>Surat</th>
                                                <th>Mulai</th>
                                                <th>Akhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">

                    </div>
                </footer>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable(
                    {
                        "order": [[ 0, "desc" ]]
                    }
                );
            });
        </script>

<script>
            $(document).ready(function(){
                $('#tabel-data2').DataTable(
                    {
                        "order": [[ 0, "desc" ]]
                    }
                );
            });
        </script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 700px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-lg">
      <form action="<?php echo base_url(); ?>fullcalendar/insert_home1" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                                <label for="exampleFormControlSelect1" >Nama Tempat <label class="text-danger">*</label></label>
                                <select class="custom-select" name="pendidikan" id="pendidikan" required>
                                <option value="">Pilih pendidikan / </option>
                                <option value="SMA/MA"> SMA/MA</option>
                                <option value="SMK">SMK</option>
                                <option value="Universitas">Universitas</option>
                                </select>
                            </div>
                            <div id="layout">
                            <label>Jurusan Meja dan Kursi <label class="text-danger">*</label></label>
                            <div class="cc-selector-2 pl-5 ml-2">

                                <input id="visa2" type="radio" name="layout" id="layout" value="kelas.png"/>
                                <label class="drinkcard-cc visa ml-3" for="visa2"></label>

                                <input  id="mastercard2" type="radio" name="layout" id="layout" value="kotak.png" />
                                <label class="drinkcard-cc mastercard ml-5" for="mastercard2"></label>
                                <br>
                                <input id="visa3" type="radio" name="layout" id="layout" value="openn.png" />
                                <label class="drinkcard-cc visa1 ml-5" for="visa3"></label>

                                <input id="mastercard3" type="radio" name="layout" id="layout" value="teater.png" />
                                <label class="drinkcard-cc mastercard1 ml-5" for="mastercard3"></label>
                                <br>
                                <input id="mastercard4" type="radio" name="layout" id="layout" value="free.png" />
                                <label class="drinkcard-cc mastercard2 ml-5" for="mastercard4"></label>
                            </div>
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama atau Instansi <label class="text-danger">*</label></label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
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
                                <label for="exampleFormControlTextarea1">asal <label class="text-danger">*</label></label>
                                <textarea class="form-control" id="asal" name="asal" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto Identitas cv <label class="text-danger">*</label></label>
                                <input type="file" class="form-control-file" id="file1" name="file1" >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Surat Permohonan <label class="text-danger">*</label></label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>

                            <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Mulai <label class="text-danger">*</label> </label>
                                <div class="col-12">
                                    <input class="form-control" name="mulai" id="mulai" type="datetime-local" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Berakhir <label class="text-danger">*</label></label>
                                <div class="col-12">
                                    <input class="form-control" name="akhir" id="akhir" type="datetime-local" required>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="test6" data-toggle="modal" data-target="#myModal" required>
                                    Setuju dengan <a href="<?php echo base_url(); ?>home/ketentuan" target="_blank">Syarat dan Ketentuan</a>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 btn-block">KIRIM</button>
                        </form>
      </div>

    </div>
  </div>
</div>




    </body>
</html>
