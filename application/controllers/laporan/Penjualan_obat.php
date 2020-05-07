<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_obat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penjualanobat_model', 'penjualan_obat');
		// is_access($this->uri->segment(1), $this->session->userdata('level'));
	}

	public function index()
	{
		$data = [
			'title' => 'Penjualan Obat',
			// 'addon_style' => ['global_assets/js/plugins/datepicker/css/datepicker.min.css', 'global_assets/js/plugins/datepicker/css/daterangepicker.css'],
			'addon_script' => ['assets/js/pages/laporan/obat.js', 'assets/js/pages/laporan/obat_list.js', 'assets/js/pages/laporan/report_obat_list.js']
		];
		$this->load->view('templates/header', $data);
		$this->load->view('laporan/penjualan_obat/index', $data);
		$this->load->view('templates/footer');
	}

	public function get_list()
	{
		$start = $this->input->post('start');
		$length = $this->input->post('length') - 1; //dikurang 1 untuk list terakhir adalah total
		$order = $this->input->post('order')[0];

		$draw = intval($this->input->post('draw'));
		$filter = $this->input->post('filter');
		$filter['period'] = explode(' - ', $filter['period']);
		$filter['from'] = $filter['period'][0];
		$filter['to'] = $filter['period'][1];
		unset($filter['period']);
		$output['data'] = [];
		$output['total'] = 0;
		$datas = $this->penjualan_obat->get_all($start, $length, $filter, $order);

		if ($datas->num_rows()) {
			$total = 0;
			$no = 1;
			$data = (object) [];
			foreach ($datas->result() as $key => $data) {
				$no = $key += 1;
				$output['data'][] = array(
					$no,
					$data->tanggal,
					format_rupiah($data->total),
				);
				$total += $data->total;
			}
			$output['total'] = format_rupiah($total);
		}

		$output['draw'] = $draw++;
		$output['recordsFiltered'] = $this->penjualan_obat->count_all($filter);
		$output['recordsTotal'] = $output['recordsFiltered'];
		echo json_encode($output);
	}
}
