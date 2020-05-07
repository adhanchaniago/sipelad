<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekammedis_model', 'rekam_medis');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Rekam Medis',
			'rekam_medis' => $this->rekam_medis->get_join(),
			'addon_script' => ['assets/js/pages/rekam_medis/rekam_medis.js', 'assets/js/pages/checkbox.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rekam_medis/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);
		$data = [
			'title' => 'Detail Rekam Medis',
			'rm' => $this->rekam_medis->get_join_where($id),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rekam_medis/detail', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Rekam Medis',
			'pasiens' => $this->get_pasien(),
			'addon_script' => ['assets/js/pages/select2.js', 'assets/js/pages/pasien/modal_add.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rekam_medis/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
		$this->form_validation->set_rules('resep_obat', 'Resep Obat', 'required');
		$this->form_validation->set_rules('kesimpulan', 'Kesimpulan', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);
			$data['id_dokter'] = $this->session->userdata('id');
			$data['tanggal'] = date('Y-m-d');

			$save = $this->rekam_medis->insert($data);

			if ($save) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('rekam-medis');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('rekam-medis');
			}
		}
	}

	public function print($id = '')
	{
		if ($id === '') {
			show_404();
		}

		$id = decode($id);

		$data = [
			'title' => 'Detail Rekam Medis',
			'rm' => $this->rekam_medis->get_join_where($id),
			'addon_script' => ['assets/js/pages/select2.js']
		];
		$this->load->view('rekam_medis/print', $data);
	}

	private function get_pasien()
	{
		$pasiens = $this->db->get('pasien');
		return $pasiens;
	}
}
