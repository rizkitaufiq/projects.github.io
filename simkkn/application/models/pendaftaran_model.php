<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

	function daftar($data)
	{
		$this->db->insert('peserta_kkn', $data);
	} 

	function tampil_lokasi()
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		return $this->db->get();
	}

	function max_pendaftar()
	{
		$this->db->select_max('id_peserta');
		$this->db->from('peserta_kkn');
		return $this->db->get();
	}

	function lokasi($id_peserta)
	{
		$this->db->select('lokasi_kkn');
		$this->db->from('peserta_kkn');
		$this->db->where('id_peserta',$id_peserta);
		return $this->db->get();
	}
	function lokasi_pendaftar($lokasi_kkn)
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->where('id_lokasi',$lokasi_kkn);
		return $this->db->get();
	}


	function update_pendaftar($lokasi_kkn,$data2)
	{
		$this->db->where('id_lokasi', $lokasi_kkn);
		$this->db->update('lokasi', $data2);
	}

	public function hapus($id)
	{
		$query = $this->db->delete("peserta_kkn", $id);
	}

}