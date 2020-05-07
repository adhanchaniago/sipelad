<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Profil ' . ucfirst($this->session->userdata('level')),
			// 'apotekers' => $this->apoteker->get(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
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

	public function about()
	{
		echo 'oe';
	}
}
