<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->model("data_model");
       
        // Load helpers
        $this->load->helper('url');
        $this->load->helper(array('url','download'));

        // Load libraries
        $this->load->library('session');
        $this->load->library('form_validation');  
        
    }

    public function index()
    {
        $this->load->view("home/index.php");
    }

    public function jadwal()
    {
        $this->load->view("home/topnavbar_home.php");
        $this->load->view("home/jadwal.php");
    }

    public function pengajuan()
    {
        $this->load->view("home/topnavbar_home.php");
        $this->load->view("home/pengajuan.php");
    }

    public function cekstatus()
    {
        $this->load->view("home/topnavbar_home.php");
        $this->load->view("home/cekstatus.php");
    }

    public function hasil()
	{
        $this->load->view("home/topnavbar_home.php");
		$data2['cari'] = $this->data_model->cari_data();
		$this->load->view('home/cekstatus2.php', $data2);
	}

    public function ketentuan()
    {
        $this->load->view("home/topnavbar_home.php");
        $this->load->view("home/ketentuan.php");
    }

    public function panduan(){				
		force_download('panduan/panduan.pdf',NULL);
	}	
}
