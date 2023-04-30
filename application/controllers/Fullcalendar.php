<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fullcalendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fullcalendar_model');
        $this->load->model('admin_model');

		// Load helpers
		$this->load->helper('url');

		// Load libraries
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	function load()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['title'],
				'start'	=>	$row['start_event'],
				'end'	=>	$row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insert()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'		=>	$this->input->post('title'),
				'start_event'=>	$this->input->post('start'),
				'end_event'	=>	$this->input->post('end')
			);
			$this->fullcalendar_model->insert_event($data);
		}
		redirect(base_url("dashboard"));
	}

	function update()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'start_event'	=>	$this->input->post('start'),
				'end_event'		=>	$this->input->post('end')
			);

			$this->fullcalendar_model->update_event($data, $this->input->post('id'));
		}
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			$this->fullcalendar_model->delete_event($this->input->post('id'));
		}
	}

	function load_home()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_home();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function load_home_act()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_act();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function load_home_pkk()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_pkk();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function load_home_rr()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_rr();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function load_home_pk()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_pk();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function load_home_tk()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event_tk();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['nama'],
				'start'	=>	$row['mulai'],
				'end'	=>	$row['akhir']
			);
		}
		echo json_encode($data);
	}

	function insert_home()
	{
		$config['upload_path'] = './upload'; //tempat
        $config['allowed_types'] = 'pdf'; //tipe
        $config['max_size'] = 3000; //max size

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file')) {

            $fileData = $this->upload->data();

			if($this->upload->do_upload('file1')) {
				$fileData1 = $this->upload->data();
				$data = array(
				'surat' => $fileData['file_name'],
				'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 0,
			);

			if($this->fullcalendar_model->insert_event_home($data)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah pengajuan <strong></strong></p>');
		   	} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah pengajuan <strong></strong></p>');
		   	}

		   redirect(base_url("home/pengajuan"));
			}
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('home/pengajuan'));
	   }
	}

	function insert_home1()
	{
		$config['upload_path'] = './upload'; //tempat
        $config['allowed_types'] = 'pdf'; //tipe
        $config['max_size'] = 3000; //max size

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file')) {

            $fileData = $this->upload->data();

			if($this->upload->do_upload('file1')) {

				$fileData1 = $this->upload->data();
				$data = array(
				'surat' => $fileData['file_name'],
				'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 0,
			);

			if($this->fullcalendar_model->insert_event_home($data)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah pengajuan <strong></strong></p>');
		   	} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah pengajuan <strong></strong></p>');
		   	}

		   redirect(base_url("dashboard/index"));
			}
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('dashboard/index'));
	   }
	}

	// function insert_admin()
	// {
	// 	$config['upload_path'] = './upload';
    //     $config['allowed_types'] = 'jpg|jpeg|png|svg|pdf|zip|rar|docx|doc';
    //     $config['max_size'] = 3000;

    //     $this->load->library('upload', $config);

    //     if($this->upload->do_upload('file')) {

    //         $fileData = $this->upload->data();

	// 		$data = array(
	// 			'surat' => $fileData['file_name'],
	// 			'asal' => $this->input->post('asal'),
	// 			'nama' => $this->input->post('nama'),
	// 			'email' => $this->input->post('email'),
	// 			'notelp' => $this->input->post('notelp'),
	// 			//'surat' => $this->input->post('surat'),
	// 			'pendidikan' => $this->input->post('pendidikan'),
	// 			'mulai' => $this->input->post('mulai'),
	// 			'akhir' => $this->input->post('akhir'),
	// 			'status' => 1,
	// 		);

	// 		if($this->fullcalendar_model->insert_event_admin($data)) {
	// 			$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

	// 		} else {
	// 			$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

	// 		}

	// 	   redirect(base_url("dashboard/kalender"));
	// 	} else {
	// 		$this->session->set_flashdata('error', $this->upload->display_errors());
	// 		redirect(base_url('dashboard'));
	//    }
	// }

	function edit($id)
	{
		$config['upload_path'] = './upload';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);


		if($this->upload->do_upload('file1')) {

			$fileData1 = $this->upload->data();
			if($this->upload->do_upload('file')) {

				$fileData = $this->upload->data();
				$data = array(
				'surat' => $fileData['file_name'],
				'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}

		   redirect(base_url("dashboard"));
			} else {
				$data = array(
				//'surat' => $fileData['file_name'],
				'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}

		   redirect(base_url("dashboard"));


			}
		} else {
			$data = array(

				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}
			redirect(base_url("dashboard"));
	   }


	   //uhuy




		if($this->upload->do_upload('file')) {

			$fileData = $this->upload->data();
			if($this->upload->do_upload('file1')) {

				$fileData1 = $this->upload->data();
				$data = array(
				'surat' => $fileData['file_name'],
				'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}

		   redirect(base_url("dashboard"));
			} else {
				$data = array(
				'surat' => $fileData['file_name'],
				//'cv' => $fileData1['file_name'],
				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}

		   redirect(base_url("dashboard"));


			}
		} else {
			$data = array(

				'asal' => $this->input->post('asal'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'notelp' => $this->input->post('notelp'),
				//'surat' => $this->input->post('surat'),
				'pendidikan' => $this->input->post('pendidikan'),
				'mulai' => $this->input->post('mulai'),
				'akhir' => $this->input->post('akhir'),
				'status' => 1,
			);

			if($this->fullcalendar_model->edit_event_admin($data,$id)) {
				$this->session->set_flashdata('success', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			} else {
				$this->session->set_flashdata('error', '<p>Berhasil mengunggah permohonan <strong></strong></p>');

			}
			redirect(base_url("dashboard"));
	   }
	}

}

?>
