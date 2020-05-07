<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model', 'pasien');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Pasien',
			'pasiens' => $this->pasien->get(),
			'addon_script' => ['assets/js/pages/pasien/pasien.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('pasien/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Pasien'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('pasien/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nm_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('nm_keluarga', 'Nama Keluarga', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$save = $this->pasien->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('pasien');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('pasien');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$pasien = $this->pasien->get_where(['id_pasien' => $id]);
		$data = [
			'title' => 'Edit Pasien',
			'pasien' => $pasien
		];
		if ($pasien) {
			$this->load->view('templates/header', $data);
			$this->load->view('pasien/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			show_404();
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('nm_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('nm_keluarga', 'Nama Keluarga', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_pasien')));
		} else {
			$data = $this->input->post(null, true);
			$id_pasien = $data['id_pasien'];
			unset($data['id_pasien']);
			$update = $this->pasien->update($data, ['id_pasien' => $id_pasien]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('pasien');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('pasien');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$pasien = $this->pasien->get_where(['id_pasien' => $id]);

		if ($pasien) {
			$this->pasien->delete(['id_pasien' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('pasien');
		} else {
			show_404();
		}
	}

	public function store_ajax()
	{
		$data = $this->input->post(null, true);

		$save = $this->pasien->insert($data);
		if ($save) {
			$return['data'] = '<option selected value=" ' . $save . '">' . $data['nm_pasien'] . '</option>';
			$return['status'] = 'success';
		}

		echo json_encode($return);
	}
}
