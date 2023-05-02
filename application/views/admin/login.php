<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin</title>
<link rel = "icon" href = "<?php echo base_url()?>asset/images/Logo-Museum.png" type = "image/x-icon"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/font.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>


    
</style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo base_url('admin/aksi_login');?>" method="post">
    <div class="container">
  <div class="row">
    <div class="col align-self-center">
    <img src="<?php echo base_url()?>asset/images/Logo-Museum.png"  width="180" height="80" style="float: left;" />
    </div>
    <div class="col align-self-center">
    <div class="semibold">
    <h4 style="margin-bottom:0;"><b>SISTEM PENDAFTARAN <br>KARYAWAN MAGANG</h4> <h4 style="margin : 0; padding-top:0;">MUSEUM SANDI</b></h4><br>
    </div>    
</div>
    <!-- <div class="col align-self-end">
      One of three columns
    </div> -->
  </div>
</div>
    <!-- <div class="justify-content-between">
    <img src="<?php echo base_url()?>asset/images/Logo-Museum.png"  width="180" height="80" style="float: left;" />
    </div>
    <br>
    <div class="semibold">
    <h4 style="margin-bottom:0;"><b>SISTEM PELAYANAN <br>PENDAFTARAN KARYAWAN MAGANG</h4> <h3 style="margin : 0; padding-top:0;">Museum Sandi</b></h3><br>
    <br>
    </div> -->

    
           <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">MASUK</button>
        </div>
          
    </form>
  
</div>
</body>
</html>                                		