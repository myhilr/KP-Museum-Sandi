<div class="card-body">
    <div class="container-fluid">
    <h1 class="mt-4 mb-4"><b>Detail Jadwal</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Jadwal</li>
                        </ol>
    <div class="card mb-4 mt-2">
                        <div class="card-body">
                        <h3>Detail Jadwal</h3>        
                        <div class="table-responsive">
                                    
                                    <hr>
                                <table class="table table-borderless">
                                
                                        <thead>
                                           
                                        </thead>
                                        <tbody>
                                        <?php foreach($jadwal as $j): ?>
                                            <tr>
                                                <th>Tanggal Pengajuan</th>
                                                <td>: <?= $j['tgl']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>: <?= $j['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>pendidikan </th>
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
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <td>: <?= $j['asal']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fakultas</th>
                                                <td>: <?= $j['fakultas']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>: <?= $j['jurusan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIM/ NIS</th>
                                                <td>: <?= $j['nim']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Pemohon</th>
                                                <td>: <?= $j['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Telepon</th>
                                                <td>: <?= $j['notelp']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Diterima</th>
                                                <td>: <?= $j['tanggal_approve']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai</th>
                                                <td>: <?= $j['mulai']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Berakhir</th>
                                                <td>: <?= $j['akhir']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>: 
                                                <a href="<?php echo base_url('asset/images/' . $j['jurusan']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><?= $j['jurusan']; ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Surat</th>
                                                <td>:
                                                <a href="<?php echo base_url('upload/' . $j['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a>

                                                </td>
                                            </tr>

                                            <tr>
                                                <th>CV</th>
                                                <td>:
                                                <a href="<?php echo base_url('upload/' . $j['cv']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="<?= base_url(); ?>dashboard/kalender" class="btn btn-primary" style="float:left;" >Kembali</a></td>
                                            </tr>
                                        <?php endforeach; ?>  
                                        </tbody>
                                    </table>

                                </div>
                            </div>
</div>
                        
                        
                
    </div>
</div>

<script>
           
</script>