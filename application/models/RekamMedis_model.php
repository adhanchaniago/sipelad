<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis_model extends CI_Model
{
	protected $table = 'rekam_medis';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function get_join()
	{
		$this->db->select('p.nm_pasien, rm.*');
		$this->db->from($this->table . ' rm');
		$this->db->join('pasien p', 'p.id_pasien = rm.id_pasien');
		return $this->db->get();
	}

	public function get_join_where($id)
	{
		$this->db->select('p.*, rm.*, d.tlp_dokter, d.alamat as alamat_dktr');
		$this->db->from($this->table . ' rm');
		$this->db->join('pasien p', 'p.id_pasien = rm.id_pasien');
		$this->db->join('dokter d', 'd.id_dokter = rm.id_dokter');
		$this->db->where('rm.id_rekam_medis', $id);
		return $this->db->get()->row_array();
	}

	public function insert($data)
	{
		$save = $this->db->insert($this->table, $data);
		if ($save) {
			return true;
		}
	}

	public function get_where($where)
	{
		return $this->db->get_where($this->table, $where)->row_array();
	}

	public function update($data, $where)
	{
		$update = $this->db->update($this->table, $data, $where);
		if ($update) {
			return true;
		}
	}

	public function delete($where)
	{
		$this->db->delete($this->table, $where);
	}
}
