<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet


class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->model('data_model');
		$this->load->model('fullcalendar_model');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("admin"));
		}

    }

    public function index()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['permohonan'] = $this->data_model->tampil_data();
        $data['jadwal'] = $this->data_model->tampil_data_jadwal();
        $this->load->view("admin/dashboard.php",$data);
    }

    public function act()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        //$this->load->view("fullcalendar/index.php");
        $this->load->view("admin/act.php");
        //$this->load->view("admin/aglo.php");
    }

    public function act_d()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['jadwal'] = $this->data_model->tampil_data_jadwal_act();
        $this->load->view("admin/act_d.php",$data);
        //$this->load->view("admin/aglo.php");
    }

    public function pkk()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/pkk.php");
        //$this->load->view("admin/pkk.php");
    }

    public function pkk_d()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['jadwal'] = $this->data_model->tampil_data_jadwal_pkk();
        $this->load->view("admin/pkk_d.php",$data);
        //$this->load->view("admin/aglo.php");
    }

    public function rr()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/rr.php");
        //$this->load->view("admin/rr.php");
    }

    public function rr_d()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['jadwal'] = $this->data_model->tampil_data_jadwal_rr();
        $this->load->view("admin/rr_d.php",$data);
        //$this->load->view("admin/aglo.php");
    }

    public function pk()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/pk.php");
        //$this->load->view("admin/pk.php");
    }

    public function pk_d()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['jadwal'] = $this->data_model->tampil_data_jadwal_pk();
        $this->load->view("admin/pk_d.php",$data);
        //$this->load->view("admin/aglo.php");
    }

    public function tk()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/tk.php");
        //$this->load->view("admin/pk.php");
    }

    public function tk_d()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $data['jadwal'] = $this->data_model->tampil_data_jadwal_tk();
        $this->load->view("admin/tk_d.php",$data);
        //$this->load->view("admin/aglo.php");
    }

    public function kalender()
    {
        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/kalender.php");
        //$this->load->view("admin/pk.php");
    }

    public function approve($id)
    {
		$config['upload_path'] = './upload/surat_balasan'; //tempat
        $config['allowed_types'] = 'pdf'; //tipe
        $config['max_size'] = 3000; //max size
		$config['file_name'] = $id . '_' . time();

		$this->load->library('upload', $config);

		$pengajuan = $this->data_model->getPostByID2($id);
		$data["a"] = $pengajuan;
		$pengajuan[0]['status'] = 1;
		$data['jadwal'] = $this->data_model->tampil_data_jadwal()->result_array();

		if($this->upload->do_upload('surat_balasan'))
        {
                $file_surat_balasan = $this->upload->data();

                $data = array(
                    'surat' 	=> $pengajuan[0]['surat'],
                    'cv'		=> $pengajuan[0]['cv'],
                    'asal' 		=> $pengajuan[0]['asal'],
                    'nama' 		=> $pengajuan[0]['nama'],
                    'email' 	=> $pengajuan[0]['email'],
                    'notelp' 	=> $pengajuan[0]['notelp'],
                    'pendidikan'=> $pengajuan[0]['pendidikan'],
                    'jurusan' 	=> $pengajuan[0]['jurusan'],
                    'fakultas' 	=> $pengajuan[0]['fakultas'],
                    'nim' 	    => $pengajuan[0]['nim'],
                    'mulai' 	=> $pengajuan[0]['mulai'],
                    'akhir' 	=> $pengajuan[0]['akhir'],
                    'status' 	=> $pengajuan[0]['status'],
                    'surat_balasan' => $file_surat_balasan
                );

            // 		if($this->fullcalendar_model->approve_permohonan($data, $id)) {
            // 			$this->session->set_flashdata('success', '<p>Berhasil melakukan persetujuan <strong></strong></p>');
            // 	   	} else {
            // 			$this->session->set_flashdata('error', '<p>Gagal melakukan persetujuan <strong></strong></p>');
            // 	   	}

            // 		redirect(base_url('dashboard'));
            // 	} else {
            // 		$this->session->set_flashdata('error', $this->upload->display_errors());
            // 		redirect(base_url('dashboard'));
            //    }

            //$this->data_model->approve_permohonan($id);
            //redirect(base_url() . "dashboard");

            //email
            // $this->load->view("admin/topnavbar.php");
            // $this->load->view("admin/sidenavbar.php");
            // $data['jadwal'] = $this->data_model->tampil_data_jadwal()->result_array();
            // $pengajuan = $this->data_model->getPostByID2($id);

            // $this->data_model->insert_event($pengajuan);
            // // $this->load->view("admin/test.php",$data);

            // Konfigurasi email
            // $config = [
            //     'mailtype'  => 'html',
            //     'charset'   => 'utf-8',
            //     'protocol'  => 'smtp',
            //     'smtp_host' => 'smtp.mail.com',
            //     'smtp_user' => 'museumsandi@mail.com',  // Email gmail
            //     'smtp_pass'   => 'ZU6TIH34TMVX4ZHXXYXL',  // Password gmail
            //     'smtp_crypto' => 'ssl',
            //     'smtp_port'   => 465,
            //     'crlf'    => "\r\n",
            //     'newline' => "\r\n"
            // ];

            // // Load library email dan konfigurasinya
            // $this->load->library('email', $config);

            // // Email dan nama pengirim
            // $this->email->from('no-reply', 'Museum Sandi');

            // // Email penerima
            // $this->email->to($pengajuan[0]["email"]); // email tujuan

            // // Lampiran email, isi dengan url/path file
            // //$this->email->attach('');

            // // Subject email
            // $this->email->subject('Permohonan Mulai magang  Museum Sandi');

            // // Isi email
            // $this->email->message("Yth. Bapak/Ibu Pemohon Mulai magang  <br>
            // Museum Sandi <br>di tempat <br><br>

            // Terima kasih telah memberikan kepercayaan kepada Kami untuk bekerja sama dalam hal penggunaan salah satu Tempat dan/  Kami. <br><br>

            // Dengan ini kami beritahukan Surat Permohonan Mulai Tempat dan  di Museum Sandi telah kami tinjau dengan baik. <br><br>

            // Setelah melakukan analisa dan berbagai macam pertimbangan, atas Surat Permohonan Bapak/Ibu dengan senang hati kami sampaikan pengajuan Mulai <strong>disetujui</strong>.<br><br>

            // Sebagai tindak lanjut koordinasi Mulai, dimohon Bapak/Ibu : <br>
            // 1. Datang ke Kantor Museum Sandi dalam kurun waktu 2(dua) hari kerja setelah email ini dikirimkan,<strong>apabila melebihi kurun waktu tanpa koordinasi maka pengajuan dibatalkan</strong><br>
            // 2. Koordinasi dengan Subbagian Umum dan Kepegawaian<br>
            // 3. Mohon surat elektronik(email) ini dicetak sebagai bukti disetujuinya Mulai<br><br>

            // Demikian pemberitahuan dari kami, apabila Bapak/Ibu membutuhkan informasi dan penjelasan lebih lanjut dapat mendatangi kantor Museum Sandi secara langsung.<br><br>

            // Tetap patuhi protokol kesehatan.<br><br>

            // Hormat kami,<br>
            // Museum Sandi");

            // // Tampilkan pesan sukses atau error
            // if ($this->email->send()) {
                $this->fullcalendar_model->approve_permohonan($data, $id);
                $this->session->set_flashdata('success', '<p>Berhasil melakukan persetujuan <strong></strong></p>');
                redirect(base_url('dashboard'));
            // } else {
            //     $this->session->set_flashdata('error', '<p>Gagal melakukan persetujuan <strong></strong></p>');
            //     $this->session->set_flashdata('error', $this->upload->display_errors());
            //     redirect(base_url('dashboard'));
            // }
        }
    }

    public function decline($id)
    {
		$config['upload_path'] = './upload/surat_balasan'; //tempat
        $config['allowed_types'] = 'pdf'; //tipe
        $config['max_size'] = 3000; //max size
		$config['file_name'] = $id . '_' . time();

		$this->load->library('upload', $config);

		$pengajuan = $this->data_model->getPostByID2($id);
		$data["a"] = $pengajuan;
		$pengajuan[0]['status'] = 2;

		if($this->upload->do_upload('surat_balasan')) {
            $file_surat_balasan = $this->upload->data();

			$data = array(
				'surat' 	=> $pengajuan[0]['surat'],
				'cv'		=> $pengajuan[0]['cv'],
				'asal' 		=> $pengajuan[0]['asal'],
				'nama' 		=> $pengajuan[0]['nama'],
				'email' 	=> $pengajuan[0]['email'],
				'notelp' 	=> $pengajuan[0]['notelp'],
				'pendidikan'=> $pengajuan[0]['pendidikan'],
				'jurusan' 	=> $pengajuan[0]['jurusan'],
                'fakultas' 	=> $pengajuan[0]['fakultas'],
                'nim' 	    => $pengajuan[0]['nim'],
				'mulai' 	=> $pengajuan[0]['mulai'],
				'akhir' 	=> $pengajuan[0]['akhir'],
				'status' 	=> $pengajuan[0]['status'],
				'surat_balasan' => $file_surat_balasan
			);
        }

	// 		if($this->fullcalendar_model->decline_permohonan($data, $id)) {
	// 			$this->session->set_flashdata('success', '<p>Berhasil melakukan penolakan <strong></strong></p>');
	// 	   	} else {
	// 			$this->session->set_flashdata('error', '<p>Gagal melakukan penolakan <strong></strong></p>');
	// 	   	}

	// 		redirect(base_url('dashboard?status=sucess'));
	// 	} else {
	// 		$this->session->set_flashdata('error', $this->upload->display_errors());
	// 		redirect(base_url('dashboard?status=failed'));
	//    }

		//$this->data_model->approve_permohonan($id);
        //redirect(base_url() . "dashboard");

        //email
        // $this->load->view("admin/topnavbar.php");
        // $this->load->view("admin/sidenavbar.php");
        // $data['jadwal'] = $this->data_model->tampil_data_jadwal()->result_array();
        // $pengajuan = $this->data_model->getPostByID2($id);

		// $this->data_model->insert_event($pengajuan);
        // // $this->load->view("admin/test.php",$data);

        // Konfigurasi email
        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'smtp.mail.com',
        //     'smtp_user' => 'museumsandi@mail.com',  // Email gmail
        //     'smtp_pass'   => 'ZU6TIH34TMVX4ZHXXYXL',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ];

        // // Load library email dan konfigurasinya
        // $this->load->library('email', $config);

        // // Email dan nama pengirim
        // $this->email->from('no-reply', 'Museum Sandi');

        // // Email penerima
        // $this->email->to($pengajuan[0]["email"]); // email tujuan

        // // Lampiran email, isi dengan url/path file
        // //$this->email->attach('');

        // // Subject email
        // $this->email->subject('Permohonan Mulai magang  Museum Sandi');

        // // Isi email
        // $this->email->message("Yth. Bapak/Ibu Pemohon Mulai magang  <br>
        // Museum Sandi <br>di tempat <br><br>

        // Terima kasih telah memberikan kepercayaan kepada Kami untuk bekerja sama dalam hal penggunaan salah satu Tempat dan/  Kami. <br><br>

        // Dengan ini kami beritahukan Surat Permohonan Mulai Tempat dan  di Museum Sandi telah kami tinjau dengan baik. <br><br>

        // Setelah melakukan analisa dan berbagai macam pertimbangan, atas Surat Permohonan Bapak/Ibu dengan senang hati kami sampaikan pengajuan Mulai <strong>disetujui</strong>.<br><br>

        // Sebagai tindak lanjut koordinasi Mulai, dimohon Bapak/Ibu : <br>
        // 1. Datang ke Kantor Museum Sandi dalam kurun waktu 2(dua) hari kerja setelah email ini dikirimkan,<strong>apabila melebihi kurun waktu tanpa koordinasi maka pengajuan dibatalkan</strong><br>
        // 2. Koordinasi dengan Subbagian Umum dan Kepegawaian<br>
        // 3. Mohon surat elektronik(email) ini dicetak sebagai bukti disetujuinya Mulai<br><br>

        // Demikian pemberitahuan dari kami, apabila Bapak/Ibu membutuhkan informasi dan penjelasan lebih lanjut dapat mendatangi kantor Museum Sandi secara langsung.<br><br>

        // Tetap patuhi protokol kesehatan.<br><br>

        // Hormat kami,<br>
        // Museum Sandi");

        // // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
            $this->fullcalendar_model->decline_permohonan($data, $id);
            $this->session->set_flashdata('success', '<p>Berhasil melakukan penolakan <strong></strong></p>');
            redirect(base_url('dashboard?status=sucess'));
        // } else {
        //     redirect(base_url() . "dashboard?msg=approve_gagal");
        // }
    }

    public function edit($id)
    {
        $data['jadwal'] = $this->data_model->getPostById($id);

        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/edit.php",$data);
    }

    public function delete($id)
    {
        $this->data_model->delete($id);
        redirect(base_url() . "dashboard");
    }

    public function detail($id)
    {
        $data['jadwal'] = $this->data_model->getPostById($id);

        $this->load->view("admin/topnavbar.php");
        $this->load->view("admin/sidenavbar.php");
        $this->load->view("admin/detail.php",$data);
    }

    // Export ke excel
    public function export()
    {
        $sp = $this->data_model->listing();
        //$provinsi = $this->provinsi_model->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Museum Sandi')
        ->setLastModifiedBy('Museum Sandi')
        ->setTitle('rekapan simpan pendaftar magang')
        ->setSubject('rekapan simpan pendaftar magang')
        ->setDescription('rekapan simpan pendaftar magang')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO.')
        ->setCellValue('B1', 'TANGGAL PENGAJUAN')
        ->setCellValue('C1', 'TANGGAL DITERIMA')
        ->setCellValue('D1', 'TANGGAL Mulai')
        ->setCellValue('E1', 'TANGGAL Berakhir')
        ->setCellValue('F1', 'NAMA')
        ->setCellValue('G1', 'PENDIDIKAN')
        ->setCellValue('H1', 'Asal Sekolah/ Universitas')
        ->setCellValue('I1', 'Fakultas')
        ->setCellValue('J1', 'Jurusan')
        ->setCellValue('K1', 'NIM')
        ->setCellValue('L1', 'EMAIL')
        ->setCellValue('M1', 'NO. TELEPON')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; $j=1;foreach($sp as $sp) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $j)
        ->setCellValue('B'.$i, $sp->tgl)
        ->setCellValue('C'.$i, $sp->tanggal_approve)
        ->setCellValue('D'.$i, $sp->mulai)
        ->setCellValue('E'.$i, $sp->akhir)
        ->setCellValue('F'.$i, $sp->nama)
        ->setCellValue('G'.$i, $sp->asal)
        ->setCellValue('H'.$i, $sp->pendidikan)
        ->setCellValue('I'.$i, $sp->fakultas)
        ->setCellValue('J'.$i, $sp->jurusan)
        ->setCellValue('K'.$i, $sp->nim)
        ->setCellValue('L'.$i, $sp->email)
        ->setCellValue('M'.$i, $sp->notelp)
        ;
        $j++;
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekapan Jadwal Diterima'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapan Jadwal Pendaftar Magang '.date('d-m-Y').'.xlsx');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

	public function export_decline()
    {
        $sp = $this->data_model->listing_decline();

        //$provinsi = $this->provinsi_model->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO.')
        ->setCellValue('B1', 'TANGGAL PENGAJUAN')
        ->setCellValue('C1', 'TANGGAL DITOLAK')
        ->setCellValue('D1', 'TANGGAL Mulai')
        ->setCellValue('E1', 'TANGGAL Berakhir')
        ->setCellValue('F1', 'NAMA')
        ->setCellValue('G1', 'PENDIDIKAN')
        ->setCellValue('H1', 'Asal Sekolah/ Universitas')
        ->setCellValue('I1', 'Fakultas')
        ->setCellValue('J1', 'Jurusan')
        ->setCellValue('K1', 'NIM')
        ->setCellValue('L1', 'EMAIL')
        ->setCellValue('M1', 'NO. TELEPON')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; $j=1;foreach($sp as $sp) {

        $spreadsheet->setActiveSheetIndex(0)
     	->setCellValue('A'.$i, $j)
        ->setCellValue('B'.$i, $sp->tgl)
        ->setCellValue('C'.$i, $sp->tanggal_decline)
        ->setCellValue('D'.$i, $sp->mulai)
        ->setCellValue('E'.$i, $sp->akhir)
        ->setCellValue('F'.$i, $sp->nama)
        ->setCellValue('G'.$i, $sp->asal)
        ->setCellValue('H'.$i, $sp->pendidikan)
        ->setCellValue('I'.$i, $sp->fakultas)
        ->setCellValue('J'.$i, $sp->jurusan)
        ->setCellValue('K'.$i, $sp->nim)
        ->setCellValue('L'.$i, $sp->email)
        ->setCellValue('M'.$i, $sp->notelp)
        ;
        $j++;
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekapan Jadwal'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapan Jadwal Pendaftar Magang '.date('d-m-Y').'.xlsx');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function export_act()
    {
        $sp = $this->data_model->listing_act();
        //$provinsi = $this->provinsi_model->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Museum Sandi')
        ->setLastModifiedBy('Museum Sandi')
        ->setTitle('rekapan simpan pendaftar magang')
        ->setSubject('rekapan simpan pendaftar magang')
        ->setDescription('rekapan simpan pendaftar magang')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO.')
        ->setCellValue('B1', 'TANGGAL PENGAJUAN')
        ->setCellValue('C1', 'TANGGAL DITERIMA')
        ->setCellValue('D1', 'TANGGAL Mulai')
        ->setCellValue('E1', 'TANGGAL Berakhir')
        ->setCellValue('F1', 'NAMA')
        ->setCellValue('G1', 'PENDIDIKAN')
        ->setCellValue('H1', 'Asal Sekolah/ Universitas')
        ->setCellValue('I1', 'Fakultas')
        ->setCellValue('J1', 'Jurusan')
        ->setCellValue('K1', 'NIM')
        ->setCellValue('L1', 'EMAIL')
        ->setCellValue('M1', 'NO. TELEPON')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; $j=1;foreach($sp as $sp) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $j)
        ->setCellValue('B'.$i, $sp->tgl)
        ->setCellValue('C'.$i, $sp->tanggal_approve)
        ->setCellValue('D'.$i, $sp->mulai)
        ->setCellValue('E'.$i, $sp->akhir)
        ->setCellValue('F'.$i, $sp->nama)
        ->setCellValue('G'.$i, $sp->asal)
        ->setCellValue('H'.$i, $sp->pendidikan)
        ->setCellValue('I'.$i, $sp->fakultas)
        ->setCellValue('J'.$i, $sp->jurusan)
        ->setCellValue('K'.$i, $sp->nim)
        ->setCellValue('L'.$i, $sp->email)
        ->setCellValue('M'.$i, $sp->notelp)
        ;
        $j++;
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekapan Jadwal'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapan  SMA/MA '.date('d-m-Y').'.xlsx');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function export_pkk()
    {
        $sp = $this->data_model->listing_pkk();
        //$provinsi = $this->provinsi_model->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Museum Sandi')
        ->setLastModifiedBy('Museum Sandi')
        ->setTitle('rekapan simpan pendaftar magang')
        ->setSubject('rekapan simpan pendaftar magang')
        ->setDescription('rekapan simpan pendaftar magang')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO.')
        ->setCellValue('B1', 'TANGGAL PENGAJUAN')
        ->setCellValue('C1', 'TANGGAL DITERIMA')
        ->setCellValue('D1', 'TANGGAL Mulai')
        ->setCellValue('E1', 'TANGGAL Berakhir')
        ->setCellValue('F1', 'NAMA')
        ->setCellValue('G1', 'PENDIDIKAN')
        ->setCellValue('H1', 'Asal Sekolah/ Universitas')
        ->setCellValue('I1', 'Fakultas')
        ->setCellValue('J1', 'Jurusan')
        ->setCellValue('K1', 'NIM')
        ->setCellValue('L1', 'EMAIL')
        ->setCellValue('M1', 'NO. TELEPON')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; $j=1;foreach($sp as $sp) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $j)
        ->setCellValue('B'.$i, $sp->tgl)
        ->setCellValue('C'.$i, $sp->tanggal_approve)
        ->setCellValue('D'.$i, $sp->mulai)
        ->setCellValue('E'.$i, $sp->akhir)
        ->setCellValue('F'.$i, $sp->nama)
        ->setCellValue('G'.$i, $sp->asal)
        ->setCellValue('H'.$i, $sp->pendidikan)
        ->setCellValue('I'.$i, $sp->fakultas)
        ->setCellValue('J'.$i, $sp->jurusan)
        ->setCellValue('K'.$i, $sp->nim)
        ->setCellValue('L'.$i, $sp->email)
        ->setCellValue('M'.$i, $sp->notelp)
        ;
        $j++;
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekapan Jadwal'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapan SMK '.date('d-m-Y').'.xlsx');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function export_rr()
    {
        $sp = $this->data_model->listing_rr();
        //$provinsi = $this->provinsi_model->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Museum Sandi')
        ->setLastModifiedBy('Museum Sandi')
        ->setTitle('rekapan simpan pendaftar magang')
        ->setSubject('rekapan simpan pendaftar magang')
        ->setDescription('rekapan simpan pendaftar magang')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO.')
        ->setCellValue('B1', 'TANGGAL PENGAJUAN')
        ->setCellValue('C1', 'TANGGAL DITERIMA')
        ->setCellValue('D1', 'TANGGAL Mulai')
        ->setCellValue('E1', 'TANGGAL Berakhir')
        ->setCellValue('F1', 'NAMA')
        ->setCellValue('G1', 'PENDIDIKAN')
        ->setCellValue('H1', 'Asal Sekolah/ Universitas')
        ->setCellValue('I1', 'Fakultas')
        ->setCellValue('J1', 'Jurusan')
        ->setCellValue('K1', 'NIM')
        ->setCellValue('L1', 'EMAIL')
        ->setCellValue('M1', 'NO. TELEPON')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; $j=1;foreach($sp as $sp) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $j)
        ->setCellValue('B'.$i, $sp->tgl)
        ->setCellValue('C'.$i, $sp->tanggal_approve)
        ->setCellValue('D'.$i, $sp->mulai)
        ->setCellValue('E'.$i, $sp->akhir)
        ->setCellValue('F'.$i, $sp->nama)
        ->setCellValue('G'.$i, $sp->asal)
        ->setCellValue('H'.$i, $sp->pendidikan)
        ->setCellValue('I'.$i, $sp->fakultas)
        ->setCellValue('J'.$i, $sp->jurusan)
        ->setCellValue('K'.$i, $sp->nim)
        ->setCellValue('L'.$i, $sp->email)
        ->setCellValue('M'.$i, $sp->notelp)
        ;
        $j++;
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekapan Jadwal'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Rekapan Universitas '.date('d-m-Y').'.xlsx');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

}
