<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lppm_model extends CI_Model {
 

	function jmlh_pendaftar()
	{
		$query  = $this->db->select('*');
		$query  = $this->db->from('peserta_kkn'); 
		$query  = $this->db->where('konfirmasi !=','diterima');
		$query  = $this->db->where('status_peserta !=','3');
		$query  = $this->db->where('status_peserta !=','4');
		$query  = $this->db->get();
		return $query->num_rows();
	}

	function jmlh_kelompok()
	{
		$query = $this->db->get('kelompok');
		return $query->num_rows();
	}

	function jmlh_dpl()
	{
		$query = $this->db->select('*');
		$query = $this->db->where('status_pengawas','2');
		$query = $this->db->get('pengawas');
		return $query->num_rows();
	}

	function jmlh_pelaporan()
	{
		$quer  = $this->db->where('status','diterima dpl');
		$query = $this->db->get('pelaporan');
		return $query->num_rows();
	}

	function max_id_pengawas()
	{
		$this->db->select_max('id_pengawas');
		$this->db->from('pengawas');
		return $this->db->get();
	}

	function data_pendaftar()
	{
		$this->db->select('*');
		$this->db->from('peserta_kkn');
		$this->db->join('lokasi','peserta_kkn.lokasi_kkn = lokasi.id_lokasi');
		$this->db->where('konfirmasi !=','diterima');
		$this->db->where('status_peserta !=','3');
		$this->db->where('status_peserta !=','4');
		$this->db->order_by('nama_mahasiswa','ASC');
		return $this->db->get();
	}

	function tampil_data()
	{
		$this->db->select_max('id_peserta');
		$this->db->from('peserta_kkn');
		return $this->db->get();
	}

	function pengawas()
	{
		$this->db->select_max('id');
		$this->db->from('pengawas');
		return $this->db->get();
	}

	function lihat_kelompok()
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('lokasi','kelompok.lokasi = lokasi.id_lokasi');
		return $this->db->get();
	}

	function lihat_peserta()
	{
		$this->db->select('*');
		$this->db->from('peserta_kkn');
		$this->db->join('lokasi','peserta_kkn.lokasi_kkn = lokasi.id_lokasi');
		// $this->db->join('status','peserta_kkn.status_peserta = status.id_status');
		$this->db->where('konfirmasi =','diterima');
		$this->db->where('konfirmasi !=','peserta');
		$this->db->where('konfirmasi !=','ditolak');
		// $this->db->where('status_peserta =','0');
		return $this->db->get();
	}

	function lihat_status_peserta()
	{
		$this->db->select('*');
		$this->db->from('status');
		$this->db->where('status !=','lppm');
		$this->db->where('status !=','dpl');
		return $this->db->get();
	}

	function kelola_kelompok()
	{
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->join('pengawas','kelompok.dpl = pengawas.id_pengawas');
		$this->db->join('lokasi','kelompok.lokasi = lokasi.id_lokasi');
		$this->db->order_by('lokasi','ASC');
		$this->db->order_by('nama_kelompok','ASC');
		return $this->db->get();
	}

	function kelola_lokasi()
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->order_by('jenis_kkn','ASC');
		$this->db->order_by('kabupaten','ASC');
		$this->db->order_by('kecamatan','ASC');
		return $this->db->get();
	}

	function max_kel()
	{
		$this->db->select_max('id_kelompok');
		$this->db->from('kelompok');
		return $this->db->get();
	}

	function daftar_kelompok()
	{
		$this->db->select('*');
		$this->db->from('peserta_kkn');
		$this->db->join('lokasi','peserta_kkn.lokasi_kkn = lokasi.id_lokasi');
		$this->db->join('kelompok','peserta_kkn.kelompok = kelompok.id_kelompok');
		$this->db->join('status','peserta_kkn.status_peserta = status.id_status');
		$this->db->where('status_peserta','3');
		$this->db->or_where('status_peserta','4');
		$this->db->order_by('kabupaten','ASC');
		$this->db->order_by('nama_kelompok','ASC');
		$this->db->order_by('nama_mahasiswa','ASC');
		return $this->db->get();
	}

	function pelaporan_kelompok_dpl()
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->join('kelompok','pelaporan.kelompok_kkn = kelompok.id_kelompok');
		$this->db->where('status','diterima dpl');
		// $this->db->or_where('status','diperbaiki');
		return $this->db->get();
	}


	function pelaporan_kelompok_lppm()
	{
		$this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->join('kelompok','pelaporan.kelompok_kkn = kelompok.id_kelompok');
		$this->db->where('status','diterima lppm');
		return $this->db->get();
	}

	function tambah_lokasi_kkn($data)
	{
		$this->db->insert('lokasi',$data);
	}

	function tambah_dpl($data)
	{
		$this->db->insert('pengawas',$data);
	}

	function tambah_kolom_dpl($data2)
	{
		$this->db->insert('kelompok',$data2);
	}

	function ubah_kelompok($id, $data)
	{
		$this->db->where('dpl',$id);
		$this->db->update('kelompok',$data);
		return TRUE;
	}

	function ubah_pengawas($id, $data2)
	{
		$this->db->where('id_pengawas',$id);
		$this->db->update('pengawas',$data2);
		return TRUE;
	}

	function ubah_lokasi_kkn($id, $data)
	{
		$this->db->where('id_lokasi',$id);
		$this->db->update('lokasi',$data);
		return TRUE;
	}

	function konfirmasi_daftar($id_peserta, $data)
	{
		$this->db->where('id_peserta',$id_peserta);
		$this->db->update('peserta_kkn',$data);
		return TRUE;
	}

	function pembagian_kelompok_kkn($id_peserta, $data)
	{
		$this->db->where('id_peserta',$id_peserta);
		$this->db->update('peserta_kkn',$data);
		return TRUE;
	}

	function ubah_daftar_kelompok_kkn($id_peserta, $data)
	{
		$this->db->where('id_peserta',$id_peserta);
		$this->db->update('peserta_kkn',$data);
		return TRUE;	
	}


	function hapus_pendaftar($id)
	{
	    $this->db->delete("peserta_kkn", $id);

	}

	function hapus_lokasi_kkn($id)
	{
		$this->db->delete('lokasi',$id);
	}

	function hapus_kelompok($id1)
	{
		$this->db->delete('kelompok',$id1);
	}

	function hapus_pengawas($id2)
	{
		$this->db->delete('pengawas',$id2);
	}

	function ubah_status_pelaporan($id_pelaporan,$data)
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