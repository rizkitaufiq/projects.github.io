<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('login_model');
    }

    public function index()
    { 
     $this->load->view('index');       
    }

    public function ceklogin()
    {

       $data = array('nama_pengawas' => $this->input->post('nama_pengawas',TRUE),
                     'password'      => $this->input->post('pass',TRUE));
       $this->load->model('login_model');
       $hasil = $this->login_model->cek($data);
       foreach($hasil->result()as $sess){
            $sess_data['logged_in']          = 'Sudah Loggin';
            $sess_data['id_pengawas']        = $sess->id_pengawas;
            $sess_data['nama_pengawas']      = $sess->nama_pengawas;
            $sess_data['status_pengawas']    = $sess->status_pengawas;
            $this->session->set_userdata($sess_data);
        }
        if($this->session->userdata('status_pengawas')=='1'){
            redirect('Lppm');
        }else if($this->session->userdata('status_pengawas')=='2'){
            echo "<script>alert('Berhasil Login');history.go(-1);</script>";
            redirect('dpl');
        }else{
           echo "<script>alert('Gagal login: Username atau password salah !');history.go(-1);</script>";
        }
    }

    public function ceklogin_peserta()
    {

       $data = array('nim'      => $this->input->post('nim',TRUE),
                     'password' => $this->input->post('password',TRUE));
       $this->load->model('login_model');
       $hasil = $this->login_model->cek_peserta($data);
       foreach($hasil->result()as $sess){
            $sess_data['logged_in']       = 'Sudah Loggin';
            $sess_data['id_peserta']      = $sess->id_peserta;
            $sess_data['nim']             = $sess->nim;
            $sess_data['status_peserta']  = $sess->status_peserta;
            $sess_data['kelompok']        = $sess->kelompok; 
            $this->session->set_userdata($sess_data);
        }
        if($this->session->userdata('status_peserta')=='3'){
            redirect('Mahasiswa/kormades');
        }elseif($this->session->userdata('status_peserta')=='4'){
            // echo "<script>alert('Berhasil Login');history.go(-1);</script>";
            redirect('Mahasiswa/anggota');
        }else{
            echo "<script>alert('Gagal login: Anda belum terdaftar sebagai peserta KKN !');history.go(-1);</script>";
        }
    }
    

    public function pengawas()
    {
        $this->load->view('admin/index.php');
    }
    
    public function dpl()
    {
        $this->load->view('dpl');
    }

    public function Mahasiswa()
    {
        $this->load->view('mahasiswa/index.php');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function pelaporan()
    {
        $this->load->view('kormades/pelaporan.php');
    }
}