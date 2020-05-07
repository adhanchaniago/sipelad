<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatJalan_model extends CI_Model
{
	protected $table = 'rawat_jalan';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function get_join($id = '')
	{
		$this->db->select('p.*, rj.*, a.nm_apoteker, a.alamat as alamat_aptk');
		$this->db->from($this->table . ' rj');
		$this->db->join('pasien p', 'p.id_pasien = rj.id_pasien');
		$this->db->join('apoteker a', 'a.id_apoteker = rj.id_apoteker');
		if ($id !== '') {
			$this->db->where('rj.id_rawat_jalan', $id);
		}
		return $this->db->get();
	}

	public function get_join_where($id)
	{
		$this->db->select('o.nm_obat, drj.*');
		$this->db->from($this->table . ' rj');
		$this->db->join('detail_rawat_jalan drj', 'drj.id_rawat = rj.id_rawat_jalan');
		$this->db->join('obat o', 'o.id_obat = drj.id_obat');
		$this->db->where('drj.id_rawat', $id);
		return $this->db->get();
	}

	public function insert($data)
	{
		$save = $this->db->insert($this->table, $data);
		return $save ? $this->db->insert_id() : false;
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
