<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
    $(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
      

            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:"<?php echo base_url(); ?>fullcalendar/load_home_pkk",
          
            
            
            
            eventClick: function(eventObj) {
                var id = eventObj.id;
                window.open("<?php echo base_url(); ?>dashboard/detail/"+id);
            
            }
        });
    });
             
             
    </script>

<div class="card-body">
    <div class="container-fluid">
    <h1 class="mt-4 mb-4"><b>SMK</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">SMK</li>
                        </ol>
    <div class="card mb-4 mt-2">
                        <div class="card-body">
                            <div id="calendar" ></div>
                        
</div>
</div>           
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog" >
			<!-- konten modal-->
			<div class="modal-content" style="width: 750px;
  margin: auto;">
				<!-- heading modal -->
				<div class="modal-header">
					<h4 class="modal-title">TAMBAH JADWAL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<!-- body modal -->
				<div class="modal-body">
                    <form action="<?php echo base_url(); ?>fullcalendar/insert_admin" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                                <label for="exampleFormControlSelect1">Nama Tempat</label>
                                <select class="custom-select" name="pendidikan" id="pendidikan" required>
                                <option value="">Pilih pendidikan / </option>
                                <option value="SMA/MA"> SMA/MA</option>
                                <option value="SMK">SMK</option>
                                <option value="Universitas">Universitas</option>
                                <option value="Pendopo Kecamatan">Pendopo Kecamatan</option>
                                
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama atau Instansi</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">No. Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">asal</label>
                                <textarea class="form-control" id="asal" name="asal" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Surat Undangan</label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>
                        
                            <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-12">
                                    <input class="form-control" name="mulai" id="mulai" type="datetime-local" required>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">Tanggal Berakhir</label>
                                <div class="col-12">
                                    <input class="form-control" name="akhir" id="akhir" type="datetime-local" required>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?= base_url() ?>dashboard/act" class="btn btn-secondary">Batal</a>
                    </form>
			</div>
		</div>
	</div>
   </div>
</html>
