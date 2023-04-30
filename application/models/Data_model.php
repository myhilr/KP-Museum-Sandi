<?php

class Data_model extends CI_Model{
	function tampil_data(){

		$hasil=$this->db->query("SELECT  * FROM permohonan ORDER BY id DESC");
        return $hasil;
	}

	function tampil_data_jadwal(){

		$hasil2=$this->db->query("SELECT jadwal.id,jadwal.id_permohonan,jadwal.tanggal_approve,permohonan.tgl,permohonan.asal,permohonan.nama,permohonan.asal,permohonan.email,permohonan.notelp,permohonan.surat,permohonan.surat,permohonan.cv,permohonan.pendidikan,permohonan.jurusan,permohonan.fakultas,permohonan.nim,permohonan.mulai,permohonan.akhir,permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan");
        return $hasil2;
	}

	function tampil_data_jadwal_act(){

		$hasil2=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='SMA/MA'");
        return $hasil2;
	}

	function tampil_data_jadwal_pkk(){

		$hasil2=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='SMK'");
        return $hasil2;
	}

	function tampil_data_jadwal_rr(){

		$hasil2=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Universitas'");
        return $hasil2;
	}

	function tampil_data_jadwal_pk(){

		$hasil2=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Pendopo Kecamatan'");
        return $hasil2;
	}

	// function tampil_data_jadwal_tk(){

	// 	$hasil2=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Taman Keluarga'");
    //     return $hasil2;
	// }

	public function cari_data()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data2 = $this->db->query("SELECT * FROM permohonan where email like '$cari' OR notelp like '$cari'");
		return $data2;
	}

	public function approve_permohonan($id)
	{
		$data = array(
			'status' => 1
		);
		$this->db
		->where('id',$id)
		->update('permohonan',$data);

		$this->db->query("INSERT INTO jadwal (id_permohonan) SELECT (id) FROM permohonan WHERE id = $id");

		$this->db->query("UPDATE jadwal SET tanggal_approve=now() WHERE id_permohonan=$id");
	}

	public function decline_permohonan($id)
	{
		$data = array(
			'status' => 2
		);
		$this->db
		->where('id',$id)
		->update('permohonan',$data);
		$this->db->query("INSERT INTO jadwal_dec (id_permohonan) SELECT (id) FROM permohonan WHERE id = $id");

		$this->db->query("UPDATE jadwal_dec SET tanggal_decline=now() WHERE id_permohonan=$id");
	}

	public function getPostByID($id)
	{
		$hasil3=$this->db->query("SELECT *  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE jadwal.id=$id");
        return $hasil3->result_array();
	}

	public function getPostByID2($id)
	{
		$hasil3=$this->db->query("SELECT * FROM permohonan WHERE id=$id");
        return $hasil3->result_array();
	}

	public function delete($id)
	{
		$this->db->query("INSERT INTO jadwal_dec (id_permohonan) VALUES ($id)");
		$this->db->query("UPDATE jadwal_dec SET tanggal_decline=now() WHERE id_permohonan=$id");

		$this->db->query("UPDATE permohonan INNER JOIN jadwal ON jadwal.id_permohonan = permohonan.id SET status=2 WHERE jadwal.id_permohonan=$id");
		$this->db->where('id_permohonan', $id);
		$this->db->delete('jadwal');

	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
		$this->db->order_by('id_permohonan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_decline()
	{
		$this->db->select('*');
		$this->db->from('permohonan');
		$this->db->order_by('id', 'ASC');
		$this->db->where('status', 2);
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_act()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
		$this->db->where('pendidikan','SMA/MA');
		$this->db->order_by('id_permohonan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}


	public function listing_pkk()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
		$this->db->where('pendidikan','SMK');
		$this->db->order_by('id_permohonan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_rr()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
		$this->db->where('pendidikan','Universitas');
		$this->db->order_by('id_permohonan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// public function listing_pk()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('jadwal');
	// 	$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
	// 	$this->db->where('pendidikan','Pendopo Kecamatan');
	// 	$this->db->order_by('id_permohonan', 'ASC');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function listing_tk()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('jadwal');
	// 	$this->db->join('permohonan','permohonan.id=jadwal.id_permohonan');
	// 	$this->db->where('pendidikan','Taman Keluarga');
	// 	$this->db->order_by('id_permohonan', 'ASC');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }


}
?>
