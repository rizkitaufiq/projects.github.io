<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpl extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('dpl_model');
        $this->load->database();

		if($this->session->userdata('nama_pengawas')==FALSE){
			redirect('Login');
		}
		$this->load->helper('text');
	}

	public function index()
	{
		$id_pengawas       = $this->session->userdata('id_pengawas');
		$data['pelaporan'] = $this->dpl_model->pelaporan_masuk($id_pengawas);

		$lokasi            = $this->dpl_model->lihat_lokasi_kelompok($id_pengawas)->result();
		foreach ($lokasi as $lok) {
		$kelompok          = $lok->nama_kelompok;
		$kecamatan 		   = $lok->kecamatan;
		$kabupaten         = $lok->kabupaten;			
		}		


		$data['penilaian']		 = $this->dpl_model->total_penilaian($id_pengawas);
		$data['kelompok']		 = $kelompok;
		$data['kecamatan']		 = $kecamatan;
		$data['kabupaten']		 = $kabupaten;	
		$this->load->view('admin/dpl/index', $data);
	}	

	public function pelaporan()
	{
		$id_pengawas       = $this->session->userdata('id_pengawas');
		$query['data']     = $this->dpl_model->lihat_pelaporan($id_pengawas)->result();
		$this->load->view('admin/dpl/pelaporan', $query);
	}

	public function penilaian()
	{
		$id_pengawas       = $this->session->userdata('id_pengawas');
		$query['data']     = $this->dpl_model->penilaian($id_pengawas)->result();
		$this->load->view('admin/dpl/penilaian.php',$query);
	}

	public function lokasi_kelompok()
	{
		$id_pengawas      = $this->session->userdata('id_pengawas');
		// $query['data']    = $this->dpl_model->lokasi_posko($id_pengawas)->result();
		$lok              = $this->dpl_model->lokasi_posko($id_pengawas)->result();
		foreach($lok as $lokasi){
			$latitude  = $lokasi->latitude;
			$longitude = $lokasi->longitude;
		}
		$query['latitude'] = $latitude;
		$query['longitude']= $longitude;

		$this->load->view('admin/dpl/lokasi_kelompok',$query);
	}

	public function status_pelaporan()
	{
		$id_pengawas     = $this->session->userdata('id_pengawas');
		$id_pelaporan    = $this->input->post('id_pelaporan');
		$komentar        = $this->input->post('komentar');
		$status          = $this->input->post('status');

		if($status == 'diterima dpl'){
		$data            = array(
						 "revisi"    => $id_pengawas,
						 "komentar"  => 'diterima dpl',
						 "status"    => $status
						 );

		$this->dpl_model->konfirmasi_status($id_pelaporan,$data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Dpl/pelaporan');
		}else{
		$data            = array(
						 "revisi"    => $id_pengawas,
						 "komentar"  => $komentar,
						 "status"    => $status
						 );

		$this->dpl_model->konfirmasi_status($id_pelaporan,$data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> status berhasil dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Dpl/pelaporan');
		}
	}

	public function download_tentatif($id_pelaporan)
	{
		
		
			$data     = $this->dpl_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$tentatif = $da->tentatif;
			}

			$this->load->helper('download');
			$data  = './upload/laporan/tentatif/'.$tentatif;
			force_download($data,NULL);
			redirect('Dpl/pelaporan');		
	}

	public function download_definitif($id_pelaporan)
	{	
			$data     = $this->dpl_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$definitif = $da->definitif;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/definitif/'.$definitif;
			force_download($data,NULL);
			redirect('Dpl/pelaporan');		
	}

	public function download_roadmap($id_pelaporan)
	{
		
		
			$data     = $this->dpl_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$roadmap = $da->roadmap;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/roadmap/'.$roadmap;
			force_download($data,NULL);
			redirect('Dpl/pelaporan');		
	}

	public function download_lpj($id_pelaporan)
	{
		
		
			$data     = $this->dpl_model->file($id_pelaporan)->result();
			foreach ($data as $da) {
				$lpj = $da->lpj;
			}
			
			$this->load->helper('download');
			$data  = './upload/laporan/lpj/'.$lpj;
			force_download($data,NULL);
			redirect('Dpl/pelaporan');		
	}
}