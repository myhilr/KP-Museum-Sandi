<?php

class Fullcalendar_model extends CI_Model
{
	function fetch_all_event(){
		$this->db->order_by('id');
		return $this->db->get('events');
	}

	function insert_event($data)
	{
		$this->db->insert('events', $data);
	}

	function update_event($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
	}

	function fetch_all_event_home(){
		$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan");
		return $jadwal;
	}

	function fetch_all_event_act(){
		$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='SMA/MA'");
		return $jadwal;
	}

	function fetch_all_event_pkk(){
		$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='SMK'");
		return $jadwal;
	}

	function fetch_all_event_rr(){
		$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Universitas'");
		return $jadwal;
	}

	// function fetch_all_event_pk(){
	// 	$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Pendopo Kecamatan'");
	// 	return $jadwal;
	// }

	// function fetch_all_event_tk(){
	// 	$jadwal=$this->db->query("SELECT jadwal.id, jadwal.id_permohonan, permohonan.tgl , permohonan.asal , permohonan.nama , permohonan.email , permohonan.notelp , permohonan.surat , permohonan.pendidikan , permohonan.mulai , permohonan.akhir , permohonan.status  FROM jadwal JOIN permohonan ON permohonan.id=jadwal.id_permohonan WHERE permohonan.pendidikan='Taman Keluarga'");
	// 	return $jadwal;
	// }

	function insert_event_home($data)
	{
		$this->db->set('tgl', 'NOW()', FALSE);
		$this->db->insert('permohonan', $data);
	}

	function insert_event_admin($data)
	{
		$this->db->set('tgl', 'NOW()', FALSE);
		$this->db->insert('permohonan', $data);
		$insert_id = $this->db->insert_id();
		$this->db->query("INSERT INTO jadwal (id_permohonan) SELECT (id) FROM permohonan WHERE id = $insert_id");
		$this->db->query("UPDATE jadwal SET tanggal_approve=now() WHERE id_permohonan=$insert_id");
	}

	function edit_event_admin($data,$id)
	{
		$this->db->set('tgl', 'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('permohonan', $data);
	}

	function approve_permohonan($data, $id)
	{
		$surat_balasan = $data['surat_balasan']['file_name'];
		$this->db->query("UPDATE permohonan SET status=1, surat_balasan='$surat_balasan' WHERE id=$id");

		$this->db->query("INSERT INTO jadwal (id_permohonan) SELECT (id) FROM permohonan WHERE id = $id");
		$this->db->query("UPDATE jadwal SET tanggal_approve=now() WHERE id_permohonan=$id");
	}

	function decline_permohonan($data, $id)
	{
		$surat_balasan = $data['surat_balasan']['file_name'] ;
		$this->db->query("UPDATE permohonan SET status=2, surat_balasan='$surat_balasan' WHERE id=$id");
	}
}

?>
