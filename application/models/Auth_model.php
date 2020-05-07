<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function get_where($where)
	{
		$admin = $this->db->get_where('admin', $where)->row_array();
		$dokter = $this->db->get_where('dokter', $where)->row_array();
		$apoteker = $this->db->get_where('apoteker', $where)->row_array();

		if ($admin) {
			return [
				$admin,
				'id' => $admin['id_admin'],
				'nama' => $admin['nm_admin'],
				'level' => 'admin'
			];
		} else if ($apoteker) {
			return [
				$apoteker,
				'id' => $apoteker['id_apoteker'],
				'nama' => $apoteker['nm_apoteker'],
				'level' => 'apoteker'
			];
		} else if ($dokter) {
			return [
				$dokter,
				'id' => $dokter['id_dokter'],
				'nama' => $dokter['nm_dokter'],
				'level' => 'dokter'
			];
		} else {
			return false;
		}
	}
}
