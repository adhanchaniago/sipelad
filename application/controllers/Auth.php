<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
	}

	public function index()
	{
		$this->_logged_in();
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$user = $this->auth->get_where(['username' => $username]);

			// cek user di database
			// jika berhasil
			if ($user) {
				// cek password
				// password berhasil
				if (password_verify($password, $user[0]['pass'])) {
					$data = [
						'id' => $user['id'],
						'nama' => $user['nama'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				}
				// password gagal
				else {
					$this->session->set_flashdata('message', 'Password salah!!');
					redirect('auth');
				}
			}
			// jika gagal
			else {
				$this->session->set_flashdata('message', 'Username tidak terdaftar!!');
				redirect('auth');
			}
		}
	}

	public function register()
	{
		echo hash_password();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function show_403()
	{
		$this->load->view('errors/html/error_403');
	}

	private function _logged_in()
	{
		if ($this->session->userdata('level')) {
			redirect('dashboard');
		}
	}
}
