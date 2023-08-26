<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
    
    // kormades
	function cek_pelaporan($id_peserta)
	{
		$query = $this->db->select('waktu');
    	$query = $this->db->from('pelaporan');
    	$query = $this->db->where('kormades',$id_peserta);
    	$query = $this->db->get();
    	return $query->num_rows();
	}

    function pelaporan_diterima_dpl($id_peserta)
    {
    	$query = $this->db->select('waktu');
    	$query = $this->db->from('pelaporan');
    	$query = $this->db->where('kormades',$id_peserta);
    	$query = $this->db->where('status','diterima dpl');
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    function pelaporan_diterima_lppm($id_peserta)
    {
    	$query = $this->db->select('waktu');
    	$query = $this->db->from('pelaporan');
    	$query = $this->db->where('kormades',$id_peserta);
    	$query = $this->db->where('status','diterima lppm');
    	$query = $this->db->get();
    	return $query->num_rows();
    }


    function pelaporan_diperbaiki($id_peserta)
    {
    	$query = $this->db->select('waktu');
    	$query = $this->db->from('pelaporan');
    	$query = $this->db->where('kormades',$id_peserta);
    	$query = $this->db->where('status','diperbaiki');
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    function jumlah_anggota($id,$id_kelompok)
    {
    	$query = $this->db->select('*');
    	$query = $this->db->from('kelompok');
    	$query = $this->db->join('peserta_kkn','kelompok.id_kelompok = peserta_kkn.kelompok');
    	$query = $this->db->where('id_kelompok',$id_kelompok);
    	$query = $this->db->where('id_peserta !=',$id);
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    function lihat_lokasi_posko($id_kelompok)
    {
    	$this->db->select('*');
    	$this->db->from('kelompok');
    	$this->db->join('lokasi','kelompok.lokasi = lokasi.id_lokasi');
    	$this->db->where('id_kelompok',$id_kelompok);
    	return $this->db->get();
    }

	function tampilkan_pelaporan($id)
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->join('kelompok','pelaporan.kelompok_kkn = kelompok.id_kelompok');
		$this->db->where('kormades',$id);
		$this->db->where('status !=','ditolak');
		$this->db->where('status !=','diterima');
		return $this->db->get();
	}

	function pelaporan($id_peserta)
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->join('kelompok','pelaporan.kelompok_kkn = kelompok.id_kelompok');
		$this->db->join('pengawas','pelaporan.revisi = pengawas.id_pengawas');
		$this->db->where('kormades',$id_peserta);
		$this->db->where('status','diterima dpl');
		$this->db->or_where('status','diterima lppm');
		$this->db->or_where('status','diperbaiki');
		return $this->db->get();
	}

	function lihat_kelompok_peserta($id)
	{
		$this->db->select('*');
		$this->db->from('peserta_kkn');
		$this->db->join('kelompok','peserta_kkn.kelompok = kelompok.id_kelompok');
		$this->db->where('id_peserta',$id);
		return $this->db->get();
	}

	function tampilkan_anggota($id,$kelompok)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('peserta_kkn','kelompok.id_kelompok = peserta_kkn.kelompok');
		$this->db->where('kelompok',$kelompok);
		$this->db->where('id_peserta !=' ,$id);
		return $this->db->get();
	}

	function tampilkan_daftar_nilai($id)
	{
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->join('peserta_kkn','penilaian.penilai = peserta_kkn.id_peserta');
		$this->db->where('penilai',$id);
		$this->db->order_by('menilai','ASC');
		$this->db->order_by('waktu','ASC');
		return $this->db->get();
	}

	function lihat_posko_peserta($id_kelompok)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->where('id_kelompok',$id_kelompok);
		return $this->db->get();
	}

	
	// anggota
	function a_tampilkan_anggota($id,$kelompok)
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('peserta_kkn','kelompok.id_kelompok = peserta_kkn.kelompok');
		$this->db->where('kelompok',$kelompok);
		$this->db->where('id_peserta !=' ,$id);
		return $this->db->get();
	}

	function a_tampilkan_daftar_nilai($id)
	{
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->join('peserta_kkn','penilaian.penilai = peserta_kkn.id_peserta');
		$this->db->where('penilai',$id);
		return $this->db->get();
	}


	// kormades
	function upload_pelaporan($data)
	{
		$this->db->insert('pelaporan',$data);
		return TRUE;
	}

	function input_penilaian($data)
	{
		$this->db->insert('penilaian', $data);
		return TRUE;
	}

	function tambah_lokasi($data,$id_kelompok)
	{
		$this->db->where('id_kelompok',$id_kelompok);
		$this->db->update('kelompok', $data);
		return TRUE;
	}


	// anggota
	function a_input_penilaian($data)
	{
		$this->db->insert('penilaian', $data);
		return TRUE;
	}  


	// kormades
	function hapus_pelaporan($id)
	{
		$this->db->delete("pelaporan", $id);
	}

	function hapus_penilaian($id)
	{
		$this->db->delete("penilaian", $id);
	}


	// anggota
	function anggota_hapus_penilaian($id)
	{
		$this->db->delete("penilaian", $id);
	}

	function file($id_pelaporan)
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->where('id_pelaporan',$id_pelaporan);
		return $this->db->get();
    }


}