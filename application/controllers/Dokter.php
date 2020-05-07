<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model', 'dokter');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Dokter',
			'dokters' => $this->dokter->get(),
			'addon_script' => ['assets/js/pages/dokter/dokter.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('dokter/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Dokter'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('dokter/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nm_dokter', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[dokter.username]');
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
		$this->form_validation->set_rules('tlp_dokter', 'Nomor Telepone', 'required|is_numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$data['pass'] = password_hash(123456, PASSWORD_DEFAULT);
			$save = $this->dokter->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('dokter');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('dokter');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$dokter = $this->dokter->get_where(['id_dokter' => $id]);
		$data = [
			'title' => 'Edit Dokter',
			'dokter' => $dokter
		];
		if ($dokter) {
			$this->load->view('templates/header', $data);
			$this->load->view('dokter/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			show_404();
		}
	}

	public function update()
	{
		$cekUsername = $this->dokter->get_where(['id_dokter' => $this->input->post('id_dokter'), 'username' => $this->input->post('username')]);
		if (!$cekUsername) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[dokter.username]');
		}
		$this->form_validation->set_rules('nm_dokter', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
		$this->form_validation->set_rules('tlp_dokter', 'Nomor Telepone', 'required|is_numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_dokter')));
		} else {
			$data = $this->input->post(null, true);
			$data['pass'] = password_hash(123456, PASSWORD_DEFAULT);
			$id_dokter = $data['id_dokter'];
			unset($data['id_dokter']);
			$update = $this->dokter->update($data, ['id_dokter' => $id_dokter]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('dokter');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('dokter');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$dokter = $this->dokter->get_where(['id_dokter' => $id]);

		if ($dokter) {
			$this->dokter->delete(['id_dokter' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('dokter');
		} else {
			show_404();
		}
	}
}
