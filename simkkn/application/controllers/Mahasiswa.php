<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('mahasiswa_model');
		$this->load->model('login_model');
	}

	// --kormades--
	public function index()
	{
		$this->load->view('mahasiswa/index.php');
	}

	public function kormades()
	{
		// notif pelaporan
		$id_peserta                      = $this->session->userdata('id_peserta');
		$query['laporan_cek']            = $this->mahasiswa_model->cek_pelaporan($id_peserta);
		$query['laporan_diterima_dpl']   = $this->mahasiswa_model->pelaporan_diterima_dpl($id_peserta);
		$query['laporan_diterima_lppm']  = $this->mahasiswa_model->pelaporan_diterima_lppm($id_peserta);		
		$query['laporan_diperbaiki']     = $this->mahasiswa_model->pelaporan_diperbaiki($id_peserta);
		
		// jumlah kelompok
		$id                = $this->session->userdata('id_peserta');
		
		$kelompok          = $this->mahasiswa_model->lihat_kelompok_peserta($id)->result();
		foreach ($kelompok as $kel) {
		$id_kelompok       = $kel->kelompok;			
		}	
		$query['jumlah_anggota']  = $this->mahasiswa_model->jumlah_anggota($id,$id_kelompok);


		// keterangan lokasi
		$lokasi            = $this->mahasiswa_model->lihat_lokasi_posko($id_kelompok)->result();
		foreach ($lokasi as $lok) {
		$kelompok          = $lok->nama_kelompok;
		$kabupaten         = $lok->kabupaten;
		$kecamatan         = $lok->kecamatan;
		}

		$query['kelompok'] = $kelompok;
		$query['kabupaten']= $kabupaten;
		$query['kecamatan']= $kecamatan;

		$this->load->view('mahasiswa/kormades/index.php',$query);
	}

	public function daftar_pelaporan()
	{
		$id                = $this->session->userdata('id_peserta');
		$query['data']     = $this->mahasiswa_model->tampilkan_pelaporan($id)->result();
		$query['kelompok'] = $this->mahasiswa_model->lihat_kelompok_peserta($id)->result();
		$this->load->view('mahasiswa/kormades/pelaporan',$query);	
	}

	public function status_pelaporan()
	{
		$id_peserta        = $this->session->userdata('id_peserta');
		$query['data']     = $this->mahasiswa_model->pelaporan($id_peserta)->result();
		$this->load->view('mahasiswa/kormades/status_pelaporan',$query);
	}

	public function lokasi_kelompok()
	{
		$this->load->view('mahasiswa/kormades/lokasi_kelompok.php');
	}

	public function penilaian_kormades()
	{
		$id               = $this->session->userdata('id_peserta');
		$kelompok         = $this->session->userdata('kelompok');
 		$query['data']    = $this->mahasiswa_model->tampilkan_anggota($id,$kelompok)->result();
		$this->load->view('mahasiswa/kormades/penilaian.php', $query);	
	}

	public function daftar_nilai()
	{
		$id               = $this->session->userdata('id_peserta');
 		$query['data']    = $this->mahasiswa_model->tampilkan_daftar_nilai($id)->result();
		$this->load->view('mahasiswa/kormades/daftar_nilai', $query);	
	}

	public function lihat_lokasi_kelompok()
	{
		$id_peserta       = $this->session->userdata('id_peserta');
		$kelompok         = $this->mahasiswa_model->lihat_kelompok_peserta($id_peserta)->result();
		foreach($kelompok as $kel){
			$id_kelompok  = $kel->kelompok;
		}
		$lokasi           = $this->mahasiswa_model->lihat_posko_peserta($id_kelompok)->result();
		foreach($lokasi as $lok){
			$latitude     = $lok->latitude;
			$longitude    = $lok->longitude;
		}
		$query['latitude']  = $latitude;
		$query['longitude'] = $longitude;
		
		$this->load->view('mahasiswa/kormades/lihat_lokasi_kelompok',$query);
	}


	// --anggota--
	public function anggota(){
		$id               = $this->session->userdata('id_peserta');
		$kelompok         = $this->session->userdata('kelompok');
 		$query['data']    = $this->mahasiswa_model->a_tampilkan_anggota($id,$kelompok)->result();
        $this->load->view('mahasiswa/anggota/index.php',$query);
    }

    public function anggota_daftar_nilai()
	{
		$id               = $this->session->userdata('id_peserta');
 		$query['data']    = $this->mahasiswa_model->a_tampilkan_daftar_nilai($id)->result();
		$this->load->view('mahasiswa/anggota/daftar_nilai', $query);	
	}


	public function penilaian_anggota()
	{
		$id               = $this->session->userdata('id_peserta');
		$query['data']	  = $this->mahasiswa_model->tampilkan_penilaian_anggota($id)->result();
		$this->load->view('mahasiswa/anggota/penilaian.php', $query);
	}

	// kormades
	public function upload_pelaporan()
	{
		
		$this->load->library('upload');
    	$config['file_name']     = $this->input->post('tentatif1');
  		$config['upload_path'] 	 = './upload/laporan/tentatif';
		$config['allowed_types'] = 'pdf';
		$config['max_size']		 = 5000;	
		$config['overwrite']     = TRUE;
		$this->upload->initialize($config);
		$this->upload->do_upload('tentatif');

    	$config1['file_name']     = $this->input->post('definitif1');
		$config1['upload_path']   = './upload/laporan/definitif';
		$config1['allowed_types'] = 'pdf';
		$config1['max_size']	  = 5000;
		$config['overwrite']      = TRUE;
		$this->upload->initialize($config1);
		$this->upload->do_upload('definitif');		


    	$config['file_name']     = $this->input->post('roadmap1');
  		$config['upload_path'] 	 = './upload/laporan/roadmap';
		$config['allowed_types'] = 'pdf';
		$config['max_size']		 = 5000;
		$config['overwrite']     = TRUE;	
		$this->upload->initialize($config);
		$this->upload->do_upload('roadmap');

    	$config1['file_name']     = $this->input->post('lpj1');
		$config1['upload_path']   = './upload/laporan/lpj';
		$config1['allowed_types'] = 'pdf';
		$config1['max_size']	  = 5000;
		$config['overwrite']      = TRUE;
		$this->upload->initialize($config1);
		$this->upload->do_upload('lpj');

		$id_peserta              = $this->input->post('id_peserta');
		$id_kelompok             = $this->input->post('id_kelompok');

		$tentatif 		= $this->input->post('tentatif1');
		$definitif  	= $this->input->post('definitif1');
		$roadmap 		= $this->input->post('roadmap1');
		$lpj  			= $this->input->post('lpj1');

		$data        = array(
					"kormades"      => $id_peserta,
					"kelompok_kkn"	=> $id_kelompok,
					"tentatif"      => $tentatif,
					"definitif"     => $definitif,
					"roadmap"       => $roadmap,
					"lpj"           => $lpj 
					);

		$this->mahasiswa_model->upload_pelaporan($data);

		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diupload <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Mahasiswa/daftar_pelaporan');		
	}

	public function kormades_input_nilai()
	{
		$penilai            = $this->session->userdata('id_peserta');
		$menilai            = $this->input->post('menilai');
		$kelompok			= $this->input->post('kelompok');
		$keaktifan			= $this->input->post('keaktifan');
		$kerjasama			= $this->input->post('kerjasama');
		$disiplin			= $this->input->post('disiplin');
		$tanggung_jawab		= $this->input->post('tanggung_jawab');
		$hitung_nilai       = ($keaktifan+$kerjasama+$disiplin+$tanggung_jawab)/4;
	
		if($hitung_nilai<=50){
			$nilai="E";
		}else if($hitung_nilai<=55){
			$nilai="DE";
		}else if($hitung_nilai<=60){
			$nilai="D";
		}else if($hitung_nilai<=65){
			$nilai="CD";
		}else if($hitung_nilai<=70){
			$nilai="BC";
		}else if($hitung_nilai<=75){
			$nilai="B";
		}else if($hitung_nilai<=80){
			$nilai="AB";
		}else{
			$nilai="A";
		}

		$data    			= array(
							  "penilai"        => $penilai,	
							  "menilai"        => $menilai,
							  "nilai_kelompok" => $kelompok,
							  "keaktifan" 	   => $keaktifan,
							  "kerjasama"      => $kerjasama,
							  "disiplin"       => $disiplin,
							  "tanggung_jawab" => $tanggung_jawab,
							  "nilai"          => $nilai		
		);
		$this->mahasiswa_model->input_penilaian($data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Nilai berhasil di input <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Mahasiswa/daftar_nilai');	
	}


	//anggota
	public function a_input_nilai()
	{
		$penilai            = $this->session->userdata('id_peserta');
		$menilai            = $this->input->post('menilai');
		$kelompok			= $this->input->post('kelompok');
		$keaktifan			= $this->input->post('keaktifan');
		$kerjasama			= $this->input->post('kerjasama');
		$disiplin			= $this->input->post('disiplin');
		$tanggung_jawab		= $this->input->post('tanggung_jawab');
		$hitung_nilai       = ($keaktifan+$kerjasama+$disiplin+$tanggung_jawab)/4;
	
		if($hitung_nilai<50){
			$nilai="E";
		}else if($hitung_nilai<55){
			$nilai="DE";
		}else if($hitung_nilai<60){
			$nilai="D";
		}else if($hitung_nilai<65){
			$nilai="CD";
		}else if($hitung_nilai<70){
			$nilai="BC";
		}else if($hitung_nilai<75){
			$nilai="B";
		}else if($hitung_nilai<80){
			$nilai="AB";
		}else{
			$nilai="A";
		}

		$data    			= array(
							  "penilai"        => $penilai,	
							  "menilai"        => $menilai,
							  "nilai_kelompok" => $kelompok,
							  "keaktifan" 	   => $keaktifan,
							  "kerjasama"      => $kerjasama,
							  "disiplin"       => $disiplin,
							  "tanggung_jawab" => $tanggung_jawab,
							  "nilai"          => $nilai		
		);
		$this->mahasiswa_model->a_input_penilaian($data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Nilai berhasil di input <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Mahasiswa/anggota_daftar_nilai');	
	}

	public function tambah_lokasi()
	{
		$id           = $this->session->userdata('id_peserta');
		$kelompok     = $this->mahasiswa_model->lihat_kelompok_peserta($id)->result();
		foreach ($kelompok as $kel) {
			$id_kelompok  = $kel->id_kelompok;
		}
		
		$latitude     = $this->input->post('lat');
		$longitude    = $this->input->post('lng');

		$data         = array(
					  "latitude"  => $latitude,
					  "longitude" => $longitude	
			          );
		$this->mahasiswa_model->tambah_lokasi($data,$id_kelompok);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Lokasi Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Mahasiswa/lihat_lokasi_kelompok');	

	}
	

	// kormades
	public function hapus_pelaporan($id_pelaporan)
	{
		$id   = array(
	            'id_pelaporan' => $id_pelaporan   
				);

		$this->mahasiswa_model->hapus_pelaporan($id);
		echo "<script>alert('Laporan Berhasil Dihapus !');history.go(-1);</script>";
		// redirect('mahasiswa/daftar_pelaporan');
	}

	public function hapus_penilaian($id_penilaian)
	{
		$id   = array(
	            'id_penilaian' => $id_penilaian   
				);

		$this->mahasiswa_model->hapus_penilaian($id);
		echo "<script>alert('Penilaian Berhasil Dihapus !');history.go(-1);</script>";
		// redirect('mahasiswa/daftar_nilai');
	}
	

	// anggota
	public function anggota_hapus_penilaian($id_penilaian)
	{
		$id   = array(
	            'id_penilaian' => $id_penilaian   
				);

		$this->mahasiswa_model->anggota_hapus_penilaian($id);
		echo "<script>alert('Penilaian Berhasil Dihapus !');history.go(-1);</script>";
		// redirect('mahasiswa/anggota_daftar_nilai');
	}


	public function download_tentatif($id_pelaporan)
	{
		
		
			$data     = $this->mahasiswa_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$tentatif = $da->tentatif;
			}

			$this->load->helper('download');
			$data  = './upload/laporan/tentatif/'.$tentatif;
			force_download($data,NULL);
			redirect('Mahasiswa/daftar_pelaporan');		
	}

	public function download_definitif($id_pelaporan)
	{	
			$data     = $this->mahasiswa_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$definitif = $da->definitif;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/definitif/'.$definitif;
			force_download($data,NULL);
			redirect('Mahasiswa/daftar_pelaporan');		
	}

	public function download_roadmap($id_pelaporan)
	{
		
		
			$data     = $this->mahasiswa_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$roadmap = $da->roadmap;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/roadmap/'.$roadmap;
			force_download($data,NULL);
			redirect('Mahasiswa/daftar_pelaporan');		
	}

	public function download_lpj($id_pelaporan)
	{
		
		
			$data     = $this->mahasiswa_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$lpj = $da->lpj;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/lpj/'.$lpj;
			force_download($data,NULL);
			redirect('Mahasiswa/daftar_pelaporan');		
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}