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
            events:"<?php echo base_url(); ?>fullcalendar/load_home",
           
        
        });
    });
             
             
    </script>
<div class="mt-3 pt-1">
<div class="card-body mt-5">
    <div class="container-fluid">
    <h1 class="mt-5 mb-4"><b>JADWAL</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Home</a></li>
                            <li class="breadcrumb-item active">Jadwal</li>
                        </ol>
    <div class="card mb-4 mt-2">
                        <div class="card-body">
                        <div id="calendar" ></div>
                        
                        
</div>
</div>           
    </div>
</div>