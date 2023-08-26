<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('pendaftaran_model');
    }

    public function index()
    { 
	    $query['data'] = $this->pendaftaran_model->tampil_lokasi()->result();
	    $this->load->view('pendaftaran.php', $query);      
    }

    public function daftar()
    {
    	$this->load->library('upload');

    	$config['file_name']     = $this->input->post('nim');
  		$config['upload_path'] 	 = './upload/pendaftaran/s.kes';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']		 = 5000;	
		$this->upload->initialize($config);
		$this->upload->do_upload('surat_cek_kesehatan');

    	$config1['file_name']     = $this->input->post('nim');
		$config1['upload_path']   = './upload/pendaftaran/b.pend';
		$config1['allowed_types'] = 'jpg|png|jpeg';
		$config1['max_size']	  = 5000;
		$this->upload->initialize($config1);
		$this->upload->do_upload('bukti_pendaftaran');		
			$nama_mahasiswa      = $this->input->post('nama_mahasiswa');
			$nim                 = $this->input->post('nim');
			$password			 = $this->input->post('password');
			$lokasi_kkn          = $this->input->post('lokasi_kkn');
			$surat_cek_kesehatan = $this->input->post('nim');
			$bukti_pendaftaran   = $this->input->post('nim'); 
			$masuk               = $this->input->post('masuk');

			$data                = array(
								"nama_mahasiswa" 		=> $nama_mahasiswa,
								"nim"            		=> $nim,
								"password"		 		=> $password,
								"lokasi_kkn"	 		=> $lokasi_kkn,
								"surat_cek_kesehatan"	=> $surat_cek_kesehatan,
								"bukti_pendaftaran"		=> $bukti_pendaftaran,
								);


			$this->pendaftaran_model->daftar($data);

			// ambil id_peserta passing-> id_peserta 
			$pendaftar           = $this->pendaftaran_model->max_pendaftar()->result();
			foreach($pendaftar as $pen){
				$id_peserta      = $pen->id_peserta;
			}

			// ambil kolom lokasi_kkn
			$lok                 = $this->pendaftaran_model->lokasi($id_peserta)->result();
			foreach($lok as $lk){
				$lokasi_kkn      = $lk->lokasi_kkn;
			}

			// dapet kolom pendaftar berdasarkan id
			$lokasi              = $this->pendaftaran_model->lokasi_pendaftar($lokasi_kkn)->result();
			foreach($lokasi as $lok){
				$pendaftar_s     = $lok->pendaftar;
			}
			
			$data2 = array(
					"pendaftar" => $pendaftar_s+1
				);
		    

			$this->pendaftaran_model->update_pendaftar($lokasi_kkn,$data2);
			$this->session->set_flashdata('status', '<p clas="status alert alert-success">Berkas anda telah berhasil diupload, Anda bisa login ke sistem setelah melalui proses konfirmasi LPPM');
			redirect('Login',$query);
	}	
}
