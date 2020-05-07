<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_jalan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rawatjalan_model', 'rawat_jalan');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Rawat Jalan',
			'rawat_jalan' => $this->rawat_jalan->get_join(),
			'addon_script' => ['assets/js/pages/rawat_jalan/index.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rawat_jalan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id = '')
	{
		if ($id == '') {
			show_404();
		}

		$id = decode($id);

		$data = [
			'title' => 'Detail Rawat Jalan',
			'rj' => $this->rawat_jalan->get_join($id)->row_array(),
			'detail' => $this->rawat_jalan->get_join_where($id),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rawat_jalan/detail', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Rawat Jalan',
			'pasiens' => $this->get_pasien(),
			'obats' => $this->get_obat(),
			'addon_script' => ['assets/js/pages/select2.js', 'assets/js/pages/rawat_jalan/rawat_jalan.js', 'assets/js/pages/rawat_jalan/create.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('rawat_jalan/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$data = $this->input->post(null, true);

			$list = [];
			$i = 0;

			$data_rj = [
				'id_pasien' => $this->input->post('id_pasien'),
				'id_apoteker' => $this->session->userdata('id'),
				'tanggal' => date('Y-m-d'),
				'total' => $data['total']
			];

			$save = $this->rawat_jalan->insert($data_rj);

			if ($save) {
				foreach ($data['obat'] as $obat) {
					// echo $obat['id_obat'];
					// echo $obat['harga'];
					// echo $obat['subtotal'];
					if ($obat['id_obat']) {
						array_push($list, [
							'id_rawat' => $save,
							'id_obat' => $obat['id_obat'],
							'harga' => $obat['harga'],
							'jumlah' => $obat['jumlah'],
							'total_harga' => $obat['subtotal'],
						]);
					}
					$i++;
				}

				$this->db->insert_batch('detail_rawat_jalan', $list);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('rawat-jalan');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data gagal disimpan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('rekam_medis');
			}
		}
	}

	private function get_pasien()
	{
		$pasiens = $this->db->get('pasien');
		return $pasiens;
	}

	private function get_obat()
	{
		$obat = $this->db->get('obat');
		return $obat;
	}

	public function get_ajax()
	{
		$q = $this->input->get('q');

		if (isset($q)) {
			$this->db->like('nm_obat', $q);
		}
		$obat = $this->db->get('obat');
		$data = [];
		if ($obat->num_rows() > 0) {
			foreach ($obat->result_array() as $row) {
				$id = $row['id_obat'];
				$nama = $row['nm_obat'];

				$data[] = [
					'id' => $id,
					'text' => $nama
				];
			}
		} else {
			$data[] = [
				'id' => 0,
				'text' => 'Not Found'
			];
		}

		echo json_encode($data);
	}

	public function ajax_get_obat()
	{
		$id_obat = $this->input->get('id');
		$obat = $this->db->get_where('obat', ['id_obat' => $id_obat])->row();

		echo json_encode($obat);
	}
}
