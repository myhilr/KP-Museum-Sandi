<?php

class Admin_model extends CI_Model
{
    function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function insert_approve($data) {
		$this->db->query('');
	}

}

?>
