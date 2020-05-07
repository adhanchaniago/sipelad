<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_obat2 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('penjualanobat_model', 'penjualan_obat');
		// is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Penjualan Obat',
			// 'rawat_jalan' => $this->rawat_jalan->get_join(),
			// 'addon_script' => ['assets/js/pages/rawat_jalan/rawat_jalan.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('laporan/penjualan_obat/index', $data);
		$this->load->view('templates/footer');
	}
}
