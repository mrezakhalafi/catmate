<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model("UserModel");
		$this->load->model("RasModel");
		$this->load->model("KucingModel");
    }

	public function index()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$data['kucing'] = $this->KucingModel->getAllCats();
		$data['ras'] = $this->RasModel->getRas();
		$data['rasLimit'] = $this->RasModel->getRasLimit();

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('template/user/jumbotron_user');
		$this->load->view('user/index', $data);
		$this->load->view('template/user/footer_user');
	}

	public function profile(){
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$data['profil'] = $this->UserModel->getProfilUser($this->session->userdata('id'));
		
		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/profile', $data);
		$this->load->view('template/user/footer_user');
	}

	public function ubahProfil(){
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');

		$this->form_validation->set_message('required', '%s harus diisi');

		if ($this->form_validation->run() == false) {
				$this->profile();
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kota' => $this->input->post('kota'),
				'telepon' => $this->input->post('telepon')
			];

			$result = $this->UserModel->ubahUser($this->session->userdata('id'),$data);
			if ($result) {
				$this->session->set_flashdata('message','Berhasil mengubah profil');
				redirect('user/profile');
			}else{
				$this->session->set_flashdata('message','Ada kesalahan');
				redirect('user/profile');
			}

		}
	}

	public function ubahPassword(){
		$this->form_validation->set_rules('passwordlama', 'Password lama', 'required|trim');
		$this->form_validation->set_rules('passwordbaru', 'Password Konfirmasi', 'required|min_length[8]|trim|matches[passwordkonfirmasi]');
		$this->form_validation->set_rules('passwordkonfirmasi', 'Password konfirmasi', 'required|min_length[8]|trim|matches[passwordbaru]');

		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('matches', '%s tidak sama');
		$this->form_validation->set_message('min_length', '%s minimal 8 karakter');

		if ($this->form_validation->run() == false) {
				$this->profile();
		} else {

			$user = $this->UserModel->getProfilUser($this->session->userdata('id'));
			$check  = password_verify($this->input->post('passwordlama'),$user['password']);
			$enkripsi = password_hash($this->input->post('passwordbaru'),PASSWORD_BCRYPT);


			if ($check) {
				$data = [
					'password' => $enkripsi
				];

				$result = $this->UserModel->ubahUser($this->session->userdata('id'),$data);
				if ($result) {
					$this->session->set_flashdata('message','Berhasil mengubah password');
					redirect('user/profile');
				}else{
					$this->session->set_flashdata('message','Ada kesalahan');
					redirect('user/profile');
				}
			}else{
				$this->session->set_flashdata('message','Password lama salah');
				redirect('user/profile');
			}

			

		}

	}

	public function mycats()
	{
		if ($this->session->userdata('role') == "admin" || $this->session->userdata('role') == "") {
            redirect('user');
        }

		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		$kucing = $this->KucingModel->getMyCats($this->session->userdata('id'));
		$datakucing['kucing'] = $kucing;

		$ras = $this->KucingModel->getRas($this->session->userdata('id'));
		$datakucing['ras'] = $ras;

		$count = $this->KucingModel->countCats($this->session->userdata('id'));
		$datakucing['count'] = $count;

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/mycats',$datakucing);
		$this->load->view('template/user/footer_user');
	}


	public function getKategori()
	{
		$this->db->select("kucing.*,user.id");
		$this->db->from("kucing");
		$this->db->join("user","kucing.user_id = user.id");
		$this->db->where("ras_id", $this->input->post('id'));
		$this->db->where("user.id", $this->input->post("user"));
		$query = $this->db->get();
		$result = $query->result_array();

		echo json_encode($result);
	}

	public function getKategoriAll()
	{
		$this->db->select("kucing.*,user.id");
		$this->db->from("kucing");
		$this->db->join("user","kucing.user_id = user.id");
		$this->db->where("user.id", $this->input->post("user"));
		$query = $this->db->get();
		$result = $query->result_array();

		echo json_encode($result);
	}


	public function filterKucing(){
		$jk = $this->input->post('jk');
		$kota = $this->input->post('kota');
		$ras = $this->input->post('ras');

		if($kota != null){
			if ($jk == null && $ras==null) {
				// kota
				$kucing = $this->KucingModel->filterKota($kota);
				$data = $kucing;
			}else if($jk == null){
				//kota ras
				$kucing = $this->KucingModel->filterKotaRas($kota, $ras);
				$data = $kucing;
			}else if($ras == null){
				$kucing = $this->KucingModel->filterKotaJK($kota, $jk);
				$data = $kucing;
			}else{
				//Semua
				$kucing = $this->KucingModel->filterAll($kota, $jk, $ras);
				$data = $kucing;
			}
			
		}else {
			if ($jk == null) {
				// ras
				$kucing = $this->KucingModel->filterRas($ras);
				$data = $kucing;
			}else if($ras == null){
				// jk
				$kucing = $this->KucingModel->filterJK($jk);
				$data = $kucing;
			}else{
				//ras jk
				$kucing = $this->KucingModel->filterRasJK($jk,$ras);
				$data = $kucing;
			}
			
		}

		

		echo json_encode($data);
	}


	public function tambahKucingProses(){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('ras_id', 'Ras', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
			$this->form_validation->set_rules('biodata', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('sosial_media', 'Sosial media', 'required|trim');
			
			if (empty($_FILES['foto']['name'])) {
				$this->form_validation->set_rules('foto', 'Foto', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s harus diisi');

			if ($this->form_validation->run() == false) {
				$this->tambahKucing();
        	} else {

				$foto = $_FILES['foto']['name'];

				$belah = explode('.',$foto);
				$ekstensi = strtolower(end($belah));
				
				$namaBaru = $this->session->userdata('id');
				$namaBaru .= $belah[0];
				$namaBaruDB = $namaBaru.".".$ekstensi;
		
				$config['file_name'] = $namaBaru;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img_kucing/';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message',$error['error']);
					redirect('user/tambahKucing');
				}
				else{
					
					$data = [
						"user_id" => $this->input->post("user_id"),
						"ras_id" => $this->input->post("ras_id"),
						"nama" => $this->input->post("nama"),
						"jk" => $this->input->post("jk"),
						"tanggal_lahir" => $this->input->post("tanggal_lahir"),
						"foto" => '/assets/img_kucing/'.$namaBaruDB,
						"biodata" => $this->input->post("biodata"),
						"sosial_media" => $this->input->post("sosial_media"),
					];

					$result = $this->UserModel->tambahKucing($data);

					if ($result) {
						$this->session->set_flashdata('message', 'Kucing berhasil ditambah');
						redirect('user/mycats');
					}else{
						$this->session->set_flashdata('message', 'Ada kesalahan');
						redirect('user/tambahKucing');
					}
				}

				
			}




	}

	public function ubahKucingProses(){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('ras_id', 'Ras', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
			$this->form_validation->set_rules('biodata', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('sosial_media', 'Sosial media', 'required|trim');

			$this->form_validation->set_message('required', '%s harus diisi');

			if ($this->form_validation->run() == false) {
				$this->ubahKucing();
        	} else {

        		if (empty($_FILES['foto']['name'])){
					$foto = $this->input->post("old_foto");
        		}else{

	        		unlink(FCPATH . $this->input->post("old_foto"));
	        		$foto = $_FILES['foto']['name'];

					$belah = explode('.',$foto);
					$ekstensi = strtolower(end($belah));
					
					$namaBaru = $this->session->userdata('id');
					$namaBaru .= $belah[0];
					$namaBaruDB = $namaBaru.".".$ekstensi;
					$foto = '/assets/img_kucing/'.$namaBaruDB;

					$config = array();
					$config['file_name'] = $namaBaru;
					$config['allowed_types'] = 'jpg|png|pdf|doc';
					$config['max_size'] = '2048';
					$config['upload_path'] = 'assets/img_kucing';

					$this->load->library('upload', $config, 'fotokucing');
					$this->fotokucing->initialize($config);
					$this->fotokucing->do_upload('foto');
				}

				$data = [
					"ras_id" => $this->input->post("ras_id"),
					"nama" => $this->input->post("nama"),
					"jk" => $this->input->post("jk"),
					"tanggal_lahir" => $this->input->post("tanggal_lahir"),
					"foto" => $foto,
					"biodata" => $this->input->post("biodata"),
					"sosial_media" => $this->input->post("sosial_media"),
				];

				$id = $this->input->post("id_kucing");
				$result = $this->UserModel->ubahKucing($data,$id);

				if ($result) {
					$this->session->set_flashdata('message', 'Kucing berhasil diubah');
					redirect('user/mycats');
				}else{
					$this->session->set_flashdata('message', 'Ada kesalahan');
					redirect('user/ubahKucing');
				}
			}




	}

	public  function detailkucing($id)
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';

		// $id = $this->input->get('id');
		$data['kucing'] = $this->KucingModel->getDetailCats($id);
		$data['kucinglainnya'] = $this->KucingModel->getKucingLainnya();

		// var_dump($data);

		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/detailkucing', $data);
		$this->load->view('template/user/footer_user');
	}


	public function tambahkucing()
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$data['ras'] = $this->RasModel->getRas();


		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/tambahkucing', $data);
		$this->load->view('template/user/footer_user');
	}

	public function hapusKucing($id)
	{

		$this->db->where("id",$id);
		$this->db->delete("kucing");


		$this->session->set_flashdata('message', 'Kucing berhasil dihapus');
		redirect('user/mycats');
	}

	public function ubahKucing($id)
	{
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$data['ras'] = $this->RasModel->getRas();

		$this->db->select("*");
		$this->db->from("kucing");
		$this->db->where('id',$id);
		$data['kucing'] = $this->db->get()->row_array();


		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('user/ubahkucing', $data);
		$this->load->view('template/user/footer_user');
	}


	public function carikucing(){
		$data['title'] = 'Catmate | Aplikasi pencarian jodoh untuk kucing';
		$this->load->view('template/user/header_user', $data);
		$this->load->view('template/user/menu_user');
		$this->load->view('template/user/searchengine');
		$this->load->view('user/carikucing');
		$this->load->view('template/user/footer_user');
	}


}
