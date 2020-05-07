<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoteker extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('apoteker_model', 'apoteker');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Apoteker',
			'apotekers' => $this->apoteker->get(),
			'addon_script' => ['assets/js/pages/apoteker/apoteker.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('apoteker/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah apoteker'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('Apoteker/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nm_apoteker', 'Nama Apoteker', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[apoteker.username]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$data['pass'] = password_hash(123456, PASSWORD_DEFAULT);
			$save = $this->apoteker->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('apoteker');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('apoteker');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$apoteker = $this->apoteker->get_where(['id_apoteker' => $id]);
		$data = [
			'title' => 'Edit Apoteker',
			'apoteker' => $apoteker
		];
		if ($apoteker) {
			$this->load->view('templates/header', $data);
			$this->load->view('apoteker/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			show_404();
		}
	}

	public function update()
	{
		$cekUsername = $this->apoteker->get_where(['id_apoteker' => $this->input->post('id_apoteker'), 'username' => $this->input->post('username')]);
		if (!$cekUsername) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[apoteker.username]');
		}
		$this->form_validation->set_rules('nm_apoteker', 'Nama Apoteker', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_apoteker')));
		} else {
			$data = $this->input->post(null, true);
			$data['pass'] = password_hash(123456, PASSWORD_DEFAULT);
			$id_apoteker = $data['id_apoteker'];
			unset($data['id_apoteker']);
			$update = $this->apoteker->update($data, ['id_apoteker' => $id_apoteker]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('apoteker');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('apoteker');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$apoteker = $this->apoteker->get_where(['id_apoteker' => $id]);

		if ($apoteker) {
			$this->apoteker->delete(['id_apoteker' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('apoteker');
		} else {
			show_404();
		}
	}

	public function profile()
	{
	}
}
