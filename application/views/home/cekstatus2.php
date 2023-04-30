
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
                            <div class="column"><input type="email" class="form-control" id="cari" name="cari" placeholder="masukan email" required="required"></div>
                            <div class="column ml-2"> <button type="submit"  class="btn btn-primary mb-2">Cek</button></div>
                        </div>
                    </form>
                    <hr>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                                <th>Asal Sekolah/ Universitas</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Status</th>
                                                <th>Surat Balasan</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($cari->result_array() as $c) : ?>
                                            <tr>
                                                <td><?= $c['tgl']; ?></td>
                                                <td><?= $c['nama']; ?></td>
                                                <td>
                                                <?php

                                                        if($c['pendidikan']=='SMA/MA'){
                                                ?>
                                                           SMA/MA</td>
                                                    <?php

                                                        }
                                                        else if($c['pendidikan']=='SMK')
                                                        {
                                                    ?>
                                                            SMK</td>
                                                    <?php

                                                        }
                                                        else if($c['pendidikan']=='Universitas')
                                                        {
                                                    ?>
                                                            Universitas</td>
                                                    <?php

                                                        }
                                                ?>


                                                <td><?= $c['asal']; ?></td>
                                                <td><?= $c['mulai']; ?></td>
                                                <td><?= $c['akhir']; ?></td>
                                                <th>
                                                <?php

                                                        if($c['status']==0){
                                                            echo "Sedang diproses";
                                                        }
                                                        else if($c['status']==1)
                                                        {
                                                            echo "Diterima";
                                                        }
                                                        else
                                                        {
                                                            echo "Ditolak";
                                                        }
                                                ?>
                                                </th>

												<td><a href="<?= base_url('upload/surat_balasan/' . $c['surat_balasan']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>




                    </div>
</div>
</div>
</div>
