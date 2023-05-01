<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>asset/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading ml-3"><a href="<?= base_url() ?>"><img src="<?php echo base_url()?>asset/images/Logo-Museum.png" width="180" height="80"></a></div>
                            <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Dashboard
                            </a>

                            <a class="nav-link" href="<?php echo base_url('dashboard/kalender');?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-calendar"></i></div>
                               Kalender
                            </a>

                           
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker"></i></div>
                                PENDIDIKAN
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="<?php echo base_url('dashboard/act');?>" data-toggle="collapse" data-target="#pagesCollapseAGL" aria-expanded="false" aria-controls="pagesCollapseAGL">
                                        SMA/MA
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAGL" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url('dashboard/act');?>">Jadwal</a>
                                            <a class="nav-link" href="<?php echo base_url('dashboard/act_d');?>">Detail</a>
                                            
                                        </nav>
                                    </div>
                                   <a class="nav-link collapsed" href="<?php echo base_url('dashboard/pkk');?>" data-toggle="collapse" data-target="#pagesCollapsePKK" aria-expanded="false" aria-controls="pagesCollapsePKK">
                                        SMK
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapsePKK" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url('dashboard/pkk');?>">Jadwal</a>
                                            <a class="nav-link" href="<?php echo base_url('dashboard/pkk_d');?>">Detail</a>
                                            
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="<?php echo base_url('dashboard/rr');?>" data-toggle="collapse" data-target="#pagesCollapseRR" aria-expanded="false" aria-controls="pagesCollapseRR">
                                        Universitas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseRR" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url('dashboard/rr');?>">Jadwal</a>
                                            <a class="nav-link" href="<?php echo base_url('dashboard/rr_d');?>">Detail</a>
                                            
                                        </nav>
                                    </div>

                                    
                                   
                            
                                </nav>
                                
                            </div>
                                    <a class="nav-link" href="<?php echo base_url('admin/logout');?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                        Sign Out
                                    </a>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                        