<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($data)
	{
		$query = $this->db->get_where('pengawas', $data);
		return $query;
  	}

  	public function cek_peserta($data)
	{
		$query = $this->db->get_where('peserta_kkn', $data);
		return $query;
  	}
}