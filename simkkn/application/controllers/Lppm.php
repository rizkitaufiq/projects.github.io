<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lppm extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('lppm_model');
        $this->load->model('pendaftaran_model');
        $this->load->database();

		if($this->session->userdata('nama_pengawas')==FALSE){
			redirect('Login');
		}
		$this->load->helper('text');
	}

	public function login()
	{
		$this->load->view('admin/index.php');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['peserta']  = $this->lppm_model->jmlh_pendaftar();
		$data['kelompok'] = $this->lppm_model->jmlh_kelompok();
		$data['dpl']      = $this->lppm_model->jmlh_dpl();	
		$data['pelaporan']= $this->lppm_model->jmlh_pelaporan();	
		$this->load->view('admin/administrator', $data);
	}

	public function pendaftar()
	{
		$query['data'] = $this->lppm_model->data_pendaftar()->result();
		$this->load->view('admin/pendaftar.php',$query);	
	}

	public function pengawas()
	{
		$query['data'] = $this->lppm_model->pengawas()->result();
		$this->load->view('admin/kelola_kelompok.php',$query);
	}

	public function kelola_lokasi()
	{
		$query['data'] = $this->lppm_model->kelola_lokasi()->result();
		$this->load->view('admin/kelola_lokasi.php',$query);
	}

	public function kelola_kelompok()
	{
		$query['data']   = $this->lppm_model->kelola_kelompok()->result();
		$query['lokasi'] = $this->lppm_model->kelola_lokasi()->result();
		$this->load->view('admin/kelola_kelompok.php', $query);
	}

	public function pembagian_kelompok()
	{
		$query['data']           = $this->lppm_model->lihat_peserta()->result();
		$query['kelompok']       = $this->lppm_model->lihat_kelompok()->result();
		$query['status_peserta'] = $this->lppm_model->lihat_status_peserta()->result();
		$this->load->view('admin/pembagian_kelompok.php', $query);
	}

	public function daftar_kelompok()
	{
		$query['data']     = $this->lppm_model->daftar_kelompok()->result();
		$query['kelompok'] = $this->lppm_model->lihat_kelompok()->result();
		$query['status_peserta'] = $this->lppm_model->lihat_status_peserta()->result();
		$this->load->view('admin/daftar_kelompok.php', $query);
	}

	public function pelaporan_disahkan_dpl()
	{
		$query['data'] = $this->lppm_model->pelaporan_kelompok_dpl()->result();
		$this->load->view('admin/pelaporan_disahkan_dpl.php', $query);	
	}

	public function pelaporan_disahkan_lppm()
	{
		$query['data'] = $this->lppm_model->pelaporan_kelompok_lppm()->result();
		$this->load->view('admin/pelaporan_disahkan_lppm.php', $query);	
	}

	public function tambah_lokasi_kkn()
	{
	    $jenis_kkn           = $this->input->post('jenis_kkn');
		$kabupaten           = $this->input->post('kabupaten');
		$kecamatan           = $this->input->post('kecamatan');  
		$kuota               = $this->input->post('kuota');


		$data          = array(
			            "jenis_kkn"     => $jenis_kkn,
						"kabupaten"     => $kabupaten,
						"kecamatan"     => $kecamatan,
						"kuota"         => $kuota
			           );

		$this->lppm_model->tambah_lokasi_kkn($data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/kelola_lokasi');		
	}

	public function tambah_kelompok_kkn()
	{
	    
		$nama_kelompok	     = $this->input->post('nama_kelompok');
		$nama_pengawas       = $this->input->post('nama_pengawas');
		$lokasi              = $this->input->post('lokasi');
		$status_pengawas     = $this->input->post('status_pengawas'); 
		$alamat              = $this->input->post('alamat'); 

		$data          = array(
						"nama_pengawas"    => $nama_pengawas,
						"password"         => $nama_pengawas,
						"status_pengawas"  => $status_pengawas,
						"alamat"           => $alamat           
						);

		$this->lppm_model->tambah_dpl($data);

		$pengawas      = $this->lppm_model->max_id_pengawas()->result();
		foreach($pengawas as $row){
		$id_pengawas   = $row->id_pengawas;	
		} 

		$data2         = array(
			            "nama_kelompok"	=> $nama_kelompok,
			            "lokasi"        => $lokasi,
						"dpl"           => $id_pengawas
			           );

		$this->lppm_model->tambah_kolom_dpl($data2);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/kelola_kelompok');		
	}


	public function konfirmasi_pendaftar()
	{
		$id_peserta			 = $this->input->post('id_peserta');
		$nama_mahasiswa	     = $this->input->post('nama_mahasiswa');
		$nim                 = $this->input->post('nim');
		// $surat_cek_kesehatan = $this->input->post('surat_cek_kesehatan');
		// $bukti_pendaftaran	 = $this->input->post('bukti_pendaftaran');	
		$konfirmasi          = $this->input->post('konfirmasi');

		$data           = array(
						"konfirmasi" => $konfirmasi
						);
		$this->lppm_model->konfirmasi_daftar($id_peserta,$data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/pendaftar');	
	}

	public function ubah_lokasi_kkn()
	{
		$id                  = $this->input->post('id_lokasi');
		// $jenis_kkn           = $this->input->post('jenis_kkn');
		$kabupaten   	     = $this->input->post('kabupaten');
		$kecamatan   	     = $this->input->post('kecamatan');
		$kuota               = $this->input->post('kuota');

		$data               = array(
							// "jenis_kkn"      => $jenis_kkn,
							"kabupaten"      => $kabupaten,	
							"kecamatan"      => $kecamatan,
							"kuota"          => $kuota
			                );

		$this->lppm_model->ubah_lokasi_kkn($id,$data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/kelola_lokasi');	
	}

	public function ubah_kelompok_kkn()
	{
		$id          		 = $this->input->post('id_pengawas');
		$nama_kelompok	     = $this->input->post('nama_kelompok');
		$lokasi     	     = $this->input->post('lokasi');
		$nama_pengawas       = $this->input->post('nama_pengawas');
		$alamat              = $this->input->post('alamat');
		
		$data                = array(
							"nama_kelompok"  => $nama_kelompok,
							"lokasi"         => $lokasi
							);

		$data2               = array(
							"nama_pengawas"  => $nama_pengawas,
							"alamat"         => $alamat
							);

		$this->lppm_model->ubah_kelompok($id,$data);		
		$this->lppm_model->ubah_pengawas($id,$data2);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/kelola_kelompok');	
	}

	public function pembagian_kelompok_kkn()
	{
		$id_peserta			 = $this->input->post('id_peserta');
		$nama_mahasiswa	     = $this->input->post('nama_mahasiswa');
		$nim                 = $this->input->post('nim');
		$surat_cek_kesehatan = $this->input->post('surat_cek_kesehatan');
		$bukti_pendaftaran	 = $this->input->post('bukti_pendaftaran');	
		$status_peserta      = $this->input->post('status_peserta');
		$kelompok            = $this->input->post('kelompok');

		$data           = array(
						"status_peserta"  => $status_peserta,
						"konfirmasi"      => 'peserta',
						"kelompok"        => $kelompok 
						);
		$this->lppm_model->pembagian_kelompok_kkn($id_peserta,$data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/daftar_kelompok');	
	}

	public function ubah_daftar_kelompok_kkn()
	{
		$id_peserta         = $this->input->post('id_peserta');
		$status_peserta     = $this->input->post('status_peserta');
		$kelompok           = $this->input->post('kelompok');

		$data           = array(
						"status_peserta"  => $status_peserta,
						"kelompok"        => $kelompok
			            );
	    $this->lppm_model->ubah_daftar_kelompok_kkn($id_peserta,$data); 
	    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Lppm/daftar_kelompok');
	}

	public function hapus_lokasi_kkn($id_lokasi)
	{
		$id['id_lokasi'] = $this->uri->segment(3);
		$this->lppm_model->hapus_lokasi_kkn($id);
		// redirect('Lppm/kelola_lokasi');
		echo "<script>alert('Lokasi Berhasil Dihapus !');history.go(-1);</script>";
	}


	public function hapus_kelompok_kkn($id_pengawas)
	{
			$id1 = array(
            'dpl' => $id_pengawas   
			);

			$id2 = array(
            'id_pengawas' => $id_pengawas 
			);
		$this->lppm_model->hapus_kelompok($id1);
		$this->lppm_model->hapus_pengawas($id2);
		// redirect('Lppm/kelola_kelompok');
		echo "<script>alert('Kelompok Berhasil Dihapus !');history.go(-1);</script>";
	}


	public function hapus_pendaftar($id_peserta)
	{
		$id['id_peserta'] = $this->uri->segment(3);
		$this->lppm_model->hapus_pendaftar($id);
		// redirect('Lppm/pendaftar');
		echo "<script>alert('Pendaftar Berhasil Dihapus !');history.go(-1);</script>";
	}

	public function status_pelaporan($id_pelaporan)
	{
		$id_pengawas       = $this->session->userdata('id_pengawas');
		$id_pelaporan      = $this->input->post('id_pelaporan');
		$komentar          = $this->input->post('komentar');
		$status            = $this->input->post('status');

		if($status == 'diterima lppm'){
		$data              = array(
							"komentar" => 'disahkan',
							"status"   => $status,
							"revisi"   => $id_pengawas
							);
		$this->lppm_model->ubah_status_pelaporan($id_pelaporan,$data);
		redirect('Lppm/pelaporan_disahkan_dpl');
		}else{
		$data	          = array(
							"komentar" => $komentar,
							"status"   => $status,
							"revisi"   => $id_pengawas
							);

		$this->lppm_model->ubah_status_pelaporan($id_pelaporan,$data);
		redirect('Lppm/pelaporan_disahkan_dpl');
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index');
    }

    public function download_tentatif($id_pelaporan)
	{
		
		
			$data     = $this->lppm_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$tentatif = $da->tentatif;
			}

			$this->load->helper('download');
			$data  = './upload/laporan/tentatif/'.$tentatif;
			force_download($data,NULL);
			redirect('Lppm/pelaporan_kelompok');		
	}

	public function download_definitif($id_pelaporan)
	{	
			$data     = $this->lppm_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$definitif = $da->definitif;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/definitif/'.$definitif;
			force_download($data,NULL);
			redirect('Lppm/pelaporan_kelompok');		
	}

	public function download_roadmap($id_pelaporan)
	{
		
		
			$data     = $this->lppm_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$roadmap = $da->roadmap;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/roadmap/'.$roadmap;
			force_download($data,NULL);
			redirect('Lppm/pelaporan_kelompok');		
	}

	public function download_lpj($id_pelaporan)
	{
		
		
			$data     = $this->lppm_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$lpj = $da->lpj;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/lpj/'.$lpj;
			force_download($data,NULL);
			redirect('Lppm/pelaporan_kelompok');		
	}
}