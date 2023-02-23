<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
		$this->load->model("RasModel");
		$this->load->model("KucingModel");
    }

    public function index(){ 
        if ($this->session->userdata('role') == "user" || $this->session->userdata('role') == "") {
            redirect('user');
        }

        $data['title'] = 'Dashboard';
        $data['jumlahUser'] = $this->UserModel->countUser();
        $data['jumlahKucing'] = $this->KucingModel->countKucing();
        $data['jumlahRas'] = $this->RasModel->countRas();
        $data['kucingTerbaru'] = $this->KucingModel->getKucingTerbaru();
        $data['userTerbaru'] = $this->UserModel->getUserTerbaru();

        // var_dump($data);
    	$this->load->view('template/admin/header_admin', $data);
        $this->load->view('template/admin/sidebar_admin', $data);
        $this->load->view('template/admin/topbar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/admin/footer_admin');
    }

    public function ras(){
        if ($this->session->userdata('role') == "user" || $this->session->userdata('role') == "") {
            redirect('user');
        }
        $data['title'] = 'Ras';
        $data['ras'] = $this->RasModel->getRasAdmin();
        // var_dump($data);

        $this->load->view('template/admin/header_admin', $data);
        $this->load->view('template/admin/sidebar_admin', $data);
        $this->load->view('template/admin/topbar_admin', $data);
        $this->load->view('admin/ras', $data);
        $this->load->view('template/admin/footer_admin');
    }

    public function tambahRas(){
        if ($this->session->userdata('role') == "user" || $this->session->userdata('role') == "") {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama Ras', 'required|trim|is_unique[ras.nama]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('is_unique', '%s sudah ada');

        if ($this->form_validation->run() == false) {
            $this->ras();
        } else {    
            $data = [
                'nama' => $this->input->post('nama')
            ];

            $hasil = $this->RasModel->tambahRas($data);
            
            if ($hasil) {
                $this->session->set_flashdata('message', 'Berhasil menambah ras');
                redirect('admin/ras');
            }else{
                $this->session->set_flashdata('message', 'Ada kesalahan');
                redirect('admin/ras');
            }
        }
    }

    public function ubahRas(){
        if ($this->session->userdata('role') == "user" || $this->session->userdata('role') == "") {
            redirect('user');
        }

        $this->form_validation->set_rules('namaUbah', 'Nama Ras', 'required|trim|is_unique[ras.nama]');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('is_unique', '%s sudah ada');

        if ($this->form_validation->run() == false) {
            $this->ras();
        } else {    
            $data = [
                'id' => $this->input->post('idUbah'),
                'nama' => $this->input->post('namaUbah')
            ];

            $hasil = $this->RasModel->ubahRas($data);
            
            if ($hasil) {
                $this->session->set_flashdata('message', 'Berhasil mengubah ras');
                redirect('admin/ras');
            }else{
                $this->session->set_flashdata('message', 'Ada kesalahan');
                redirect('admin/ras');
            }
        }
    }

}