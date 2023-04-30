<!-- <div class="card-body">
    <div class="container-fluid">
    <h1 class="mt-4 mb-4"><b>Taman Keluarga</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Taman Keluarga</li>
                        </ol>
    <div class="card mb-4 mt-2">
                        <div class="card-body">
                        <a href="<?php echo base_url() ?>dashboard/export_tk" class="btn btn-primary" style="float:left;">Export Jadwal</a>
                              
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>asal</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No. Telepon</th>
                                                <th>Surat</th>
                                                <th>Mulai</th>
                                                <th>Akhir</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        </thead>
                                       
                                        <?php foreach ($jadwal->result_array() as $p) : ?>
                                            <tr>
                                                <td><?= $p['tgl']; ?></td>
                                                <td><?= $p['asal']; ?></td>
                    
                                                <td><?= $p['nama']; ?></td>
                                                <td><?= $p['email']; ?></td>
                                                <td><?= $p['notelp']; ?></td>
                                                <td><a href="<?php echo base_url('upload/' . $p['surat']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Lihat</a></td>
                                                <td><?= $p['mulai']; ?></td>
                                                <td><?= $p['akhir']; ?></td>
                                                <td><a href="<?php echo base_url('asset/images/' . $p['jurusan']) ?>" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><?= $p['jurusan']; ?></a></td>
                                                
                                                
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</div>
                        
                        
                
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
</script> -->