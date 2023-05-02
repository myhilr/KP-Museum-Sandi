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

.visa{background-image:url(<?= base_url()?>asset/images/kelas.png);}
.mastercard{background-image:url(<?= base_url()?>asset/images/kotak.png);}
.visa1{background-image:url(<?= base_url()?>asset/images/openn.png);}
.mastercard1{background-image:url(<?= base_url()?>asset/images/teater.png);}
.mastercard2{background-image:url(<?= base_url()?>asset/images/free.png);}

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

.custom-btn-group {
	display: flex;
	gap: 4px;
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
					<a class="small text-white stretched-link" href="<?= base_url('dashboard/act');?>">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body font-weight-bold">SMK</div>


				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="<?= base_url('dashboard/pkk');?>">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body font-weight-bold">Universitas</div>


				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="<?= base_url('dashboard/rr');?>">View Details</a>
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
							<th>Fakultas</th>
							<th>Jurusan</th>
							<th>NIM/ NIS</th>
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
										<a href="<?= base_url('dashboard/act');?>"> <button type="button"  class="btn btn-primary btn-block">SMA/MA</button></a></td>
								<?php

									}
									else if($p['pendidikan']=='SMK')
									{
								?>
										<a href="<?= base_url('dashboard/pkk');?>"> <button type="button" class="btn btn-warning btn-block">SMK</button></a></td>
								<?php

									}
									else if($p['pendidikan']=='Universitas')
									{
								?>
										<a href="<?= base_url('dashboard/rr');?>"> <button type="button" class="btn btn-success btn-block">Universitas</button></a></td>
								<?php

									}
							?>
							</td>
							<td><?= $p['asal']; ?></td>
							<td><?= $p['fakultas']; ?></td>
							<td><?= $p['jurusan']; ?></td>
							<td><?= $p['nim']; ?></td>
							<td><?= $p['email']; ?></td>
							<td><?= $p['notelp']; ?></td>
							<td><a href="<?= base_url('upload/' . $p['cv']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
							<td><a href="<?= base_url('upload/' . $p['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
							<td><?= $p['mulai']; ?></td>
							<td><?= $p['akhir']; ?></td>
							<th>
								<?php

										if($p['status']==0){
											echo "Sedang diproses";
										?>
										</th>
										<td>

											<div class="custom-btn-group">
												<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#approveModal">
												Terima
												</button>
												<button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#declineModal">
												Tolak
												</button>
											</div>
<div class="modal fade" id="approveModal"  role="dialog" aria-labelledby="approveModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width: 700px!important;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Terima Permohonan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<form action="<?= base_url(); ?>dashboard/approve/<?= $p['id']; ?>" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="surat_balasan">Upload Surat Balasan <label class="text-danger">*</label></label>
						<input type="file" class="form-control-file" id="surat_balasan" name="surat_balasan" accept=".pdf" required>
					</div>

					<button type="submit" class="btn btn-primary mt-3 btn-block">KIRIM</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="declineModal"  role="dialog" aria-labelledby="declineModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width: 700px!important;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tolak Permohonan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<form action="<?= base_url(); ?>dashboard/decline/<?= $p['id']; ?>" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="surat_balasan">Upload Surat Balasan <label class="text-danger">*</label></label>
						<input type="file" class="form-control-file" id="surat_balasan" name="surat_balasan" accept=".pdf" required>
					</div>

					<button type="submit" class="btn btn-primary mt-3 btn-block">KIRIM</button>
				</form>
			</div>
		</div>
	</div>
</div>

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
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>NIM/ NIS</th>
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
			<div class="custom-btn-group">
				<a href="<?= base_url() ?>dashboard/export" class="btn btn-primary" style="float:left;">Export Data Diterima</a>
				<a href="<?= base_url() ?>dashboard/export_decline" class="btn btn-primary" style="float:left;">Export Data Tidak Diterima</a>
			</div>
			<div class="table-responsive mt-5">

				<table class="table table-bordered" id="tabel-data2" width="100%" cellspacing="0">
				<thead>
						<tr>
							<th>Tgl Acc</th>
							<th>Nama</th>
							<th>Pendidikan</th>
							<th>Asal Sekolah/ Universitas</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>NIM/ NIS</th>
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
										<a href="<?= base_url('dashboard/act');?>"> <button type="button"  class="btn btn-primary btn-block">SMA/MA</button></a></td>
								<?php

									}
									else if($j['pendidikan']=='SMK')
									{
								?>
										<a href="<?= base_url('dashboard/pkk');?>"> <button type="button" class="btn btn-warning btn-block">SMK</button></a></td>
								<?php

									}
									else if($j['pendidikan']=='Universitas')
									{
								?>
										<a href="<?= base_url('dashboard/rr');?>"> <button type="button" class="btn btn-success btn-block">Universitas</button></a></td>
								<?php

									}
							?>
							</td>
							<td><?= $j['asal']; ?></td>
							<td><?= $j['fakultas']; ?></td>
							<td><?= $j['jurusan']; ?></td>
							<td><?= $j['nim']; ?></td>
							<td><?= $j['email']; ?></td>
							<td><?= $j['notelp']; ?></td>
							<td><a href="<?= base_url('upload/' . $j['cv']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
							<td><a href="<?= base_url('upload/' . $j['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
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
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>NIM/ NIS</th>
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
				<form action="<?= base_url(); ?>fullcalendar/insert_home1" enctype="multipart/form-data" method="POST">
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
