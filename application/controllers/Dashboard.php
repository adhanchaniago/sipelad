<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model', 'dashboard');
		is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$tanggal = date('Y-m-d');

		$data = [
			'title' => 'Dashboard',
			'obat' => $this->dashboard->count('rawat_jalan'),
			'pasien' => $this->dashboard->count('pasien'),
			'dokter' => $this->dashboard->count('dokter'),
			'apoteker' => $this->dashboard->count('apoteker'),
			'total_obat' => $this->dashboard->select_sum('rawat_jalan', ['tanggal' => date('Y-m-d')], 'total'),
			'addon_style' => ['assets/css/dashboard.css'],
		];
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
