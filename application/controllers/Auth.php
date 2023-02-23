<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model("UserModel");
    }

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('template/auth/header_auth', $data);
		$this->load->view('auth/login');
		$this->load->view('template/auth/footer_auth');

	}

	public function register()
	{
		$data['title'] = 'Register';
		$this->load->view('template/auth/header_auth', $data);
		$this->load->view('auth/register');
		$this->load->view('template/auth/footer_auth');

	}

	public function registerProses(){
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[konfirmasipassword]');
		$this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]');

		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('min_length', '%s minimal 8 karakter');
		$this->form_validation->set_message('valid_email', '%s tidak valid');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan');
		$this->form_validation->set_message('matches', '%s tidak sesuai');


		if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
			$this->load->view('template/auth/header_auth', $data);
			$this->load->view('auth/register');
			$this->load->view('template/auth/footer_auth');
        } else {

			$enkripsi = PASSWORD_HASH($this->input->post('password'), PASSWORD_BCRYPT);

			$data = [
				"email" => $this->input->post('email'),
				"nama" => $this->input->post('nama'),
				"alamat" => $this->input->post('alamat'),
				"kota" => $this->input->post('kota'),
				"telepon" => $this->input->post('telepon'),
				"latitude" => $this->input->post('lat'),
				"longitude" => $this->input->post('long'),
				"password" => $enkripsi
			];

			$regis = $this->UserModel->createUser($data);
			if ($regis) {
				$this->session->set_flashdata('message', 'Berhasil mendaftar');
                redirect('auth');
			}else{
				$this->session->set_flashdata('message', 'Ada kesalahan');
                redirect('auth/register');
			}
		}


	}

	public function loginProses(){
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Nama', 'required|trim');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
			$this->load->view('template/auth/header_auth', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth/footer_auth');

        } else {

			$admin = $this->UserModel->getDataUser('admin',$email);
			$user = $this->UserModel->getDataUser('user',$email);

			if ($user) {
				if (password_verify($password, $user['password'])) {
					$data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                        'role' => 'user'
					];
					$this->session->set_userdata($data);
					redirect('user');
				}else{
					$this->session->set_flashdata('message', 'Password salah');
					redirect('auth');
				}
			}else if($admin){
				if (password_verify($password, $admin['password'])) {
					$data = [
                        'id' => $admin['id'],
                        'email' => $admin['email'],
                        'nama' => $admin['nama'],
                        'role' => 'admin'
					];
					$this->session->set_userdata($data);
					redirect('admin');
				}else{
					$this->session->set_flashdata('message', 'Password salah');
					redirect('auth');
				}
			}
			else{
				$this->session->set_flashdata('message', 'Email belum terdaftar');
				redirect('auth');
			}

		}

	}

	public function enkripsi(){
		$admin = 'admin123';
		var_dump(PASSWORD_HASH($admin,PASSWORD_BCRYPT));
	}



	public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Anda berhasil keluar</div>');
        redirect('user');
    }

	public function getIp(){
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			return (isset($_SERVER['REMOTE_ADDR'])? $_SERVER['REMOTE_ADDR'] : '' );
		}
	}

	public function lokasi()
	{
		// $ip = $this->getIp();
		// $ip = "";

		$query = @unserialize(file_get_contents('http://ip-api.com/php/',$ip));



		if ($query && $query['status'] == 'success') {
			echo "ISP : ".$query['isp']."<br/>";
			echo "Country : ".$query['country']."<br/>";
			echo "Country Code : ".$query['countryCode']."<br/>";
			echo "Region Name : ".$query['regionName']."<br/>";
			echo "City : ".$query['city']."<br/>";
			echo "ZIP : ".$query['zip']."<br/>";
			echo "Lat : ".$query['lat']."<br/>";
			echo "Long : ".$query['lon']."<br/>";
			echo "Timezone : ".$query['timezone']."<br/>";
			echo "ORG : ".$query['org']."<br/>";
			echo "AS : ".$query['as']."<br/>";
		}else{
			echo "Ada kesalahan";
		}

	}
}
