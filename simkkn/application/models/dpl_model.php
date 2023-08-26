<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpl_model extends CI_Model {

	function pelaporan_masuk($id_pengawas)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('kelompok');
		$query = $this->db->join('pelaporan','kelompok.id_kelompok = pelaporan.kelompok_kkn ');
		$query = $this->db->where('dpl',$id_pengawas);
		$query = $this->db->where('status !=','diterima');
		$query = $this->db->where('status !=','ditolak');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function total_penilaian($id_pengawas)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('kelompok');
		$query = $this->db->join('penilaian','kelompok.id_kelompok = penilaian.nilai_kelompok ');
		$query = $this->db->where('dpl',$id_pengawas);
		$query = $this->db->get();
		return $query->num_rows();

	}

	function lihat_lokasi_kelompok($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('lokasi','kelompok.lokasi = lokasi.id_lokasi ');
		$this->db->where('dpl',$id_pengawas);
		return $this->db->get();
	}

	function lihat_pelaporan($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('pelaporan','kelompok.id_kelompok = pelaporan.kelompok_kkn ');
		$this->db->where('dpl',$id_pengawas);
		$this->db->where('status !=','diterima');
		return $this->db->get();
	}

	function penilaian($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->join('peserta_kkn','penilaian.penilai = peserta_kkn.id_peserta');
		$this->db->join('kelompok','penilaian.nilai_kelompok = kelompok.id_kelompok');	
		$this->db->where('dpl',$id_pengawas);
		$this->db->order_by('nama_mahasiswa','ASC');
		$this->db->order_by('waktu','ASC');
		return $this->db->get();
	}	

	function lokasi_posko($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->where('dpl',$id_pengawas);
		return $this->db->get();
	}

	function konfirmasi_status($id_pelaporan,$data)
	{
		$this->db->where('id_pelaporan',$id_pelaporan);
		$this->db->update('pelaporan',$data);
		return TRUE;
	}

	function file($id_pelaporan)
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->where('id_pelaporan',$id_pelaporan);
		return $this->db->get();
    }
}