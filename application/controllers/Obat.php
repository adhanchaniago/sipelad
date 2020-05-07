<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model', 'obat');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Obat',
			'obats' => $this->obat->get(),
			'addon_script' => ['assets/js/pages/obat/obat.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('obat/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Obat'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('obat/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('nm_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('no_rak', 'No. Rak', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$save = $this->obat->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('obat');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('obat');
			}
		}
	}

	public function edit($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$obat = $this->obat->get_where(['id_obat' => $id]);
		$data = [
			'title' => 'Edit Obat',
			'obat' => $obat
		];
		if ($obat) {
			$this->load->view('templates/header', $data);
			$this->load->view('obat/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			show_404();
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('nm_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('no_rak', 'No. Rak', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->edit(encode($this->input->post('id_obat')));
		} else {
			$data = $this->input->post(null, true);
			$id_obat = $data['id_obat'];
			unset($data['id_obat']);
			$update = $this->obat->update($data, ['id_obat' => $id_obat]);

			if ($update) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('obat');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('obat');
			}
		}
	}

	public function delete($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$obat = $this->obat->get_where(['id_obat' => $id]);

		if ($obat) {
			$this->obat->delete(['id_obat' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('obat');
		} else {
			show_404();
		}
	}
}
